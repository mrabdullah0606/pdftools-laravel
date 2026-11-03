<?php

namespace App\Http\Controllers;

use App\Services\PdfToWordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class pdftoWordController extends Controller
{
    public function __construct(protected PdfToWordService $service) {}

    public function index()
    {
        return view('pages.pdf-to-word', [
            'api_response'   => session()->pull('api_response'),
            'uploaded_files' => session()->pull('uploaded_files'),
            'download_urls'  => session()->pull('download_urls'),
            'is_processing'  => false,
            'job_id'         => null,
        ]);
    }

    public function convert(Request $request)
    {
        Log::info('[pdftoWordController] Conversion request received', [
            'files_count' => $request->hasFile('files') ? count($request->file('files')) : 0,
            'is_ajax'     => $request->ajax(),
            'format'      => $request->input('format', 'docx'),
        ]);

        $locale = $request->route('locale') ?? app()->getLocale();

        try {
            $request->validate([
                'files'   => 'required|array|min:1',
                'files.*' => 'required|file|mimes:pdf|max:102400',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('[pdftoWordController] Validation failed', ['errors' => $e->errors()]);

            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }

            return back()->withErrors($e->errors())->withInput();
        }

        $format       = ltrim($request->input('format', 'docx'), '.');
        $uploadedUrls = $this->service->saveUploadedFiles($request->file('files'));

        Log::info('[pdftoWordController] Files saved to storage', ['count' => count($uploadedUrls)]);

        // Allow up to 10 minutes for large file conversions
        set_time_limit(600);

        try {
            $convertedFiles = $this->service->convert($uploadedUrls, $format);

            if (empty($convertedFiles)) {
                throw new \RuntimeException('API completed successfully but returned no converted files.');
            }

            $downloadUrls = array_column($convertedFiles, 'file_url');
            $apiResponse  = ['detail' => 'Conversion successful', 'data' => $convertedFiles];

            $this->service->cleanupFiles($uploadedUrls);

            Log::info('[pdftoWordController] Conversion completed', [
                'converted_count' => count($convertedFiles),
            ]);

        } catch (\Throwable $e) {
            Log::error('[pdftoWordController] Conversion failed', ['message' => $e->getMessage()]);
            $this->service->cleanupFiles($uploadedUrls);

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'status'  => 'failed',
                    'message' => 'Conversion failed. Please try again.',
                ], 500);
            }

            return back()->withErrors(['files' => 'Conversion failed. Please try again.'])->withInput();
        }

        if ($request->ajax()) {
            $html = view('pages.pdf-to-word', [
                'api_response'   => $apiResponse,
                'uploaded_files' => $uploadedUrls,
                'download_urls'  => $downloadUrls,
                'is_processing'  => false,
                'job_id'         => null,
            ])->render();

            return response()->json([
                'success'       => true,
                'status'        => 'completed',
                'download_urls' => $downloadUrls,
                'html'          => $html,
            ]);
        }

        session([
            'api_response'   => $apiResponse,
            'uploaded_files' => $uploadedUrls,
            'download_urls'  => $downloadUrls,
        ]);

        if ($locale && $locale !== 'en') {
            return redirect()->route('localized.pdf-to-word', ['locale' => $locale]);
        }

        return redirect()->route('pdf-to-word');
    }

    public function checkStatus(Request $request)
    {
        return response()->json(['success' => false, 'status' => 'failed', 'message' => 'No active job.'], 400);
    }

    public function proxyDownload(Request $request)
    {
        $url = $request->input('url');

        if (! $url) {
            return abort(404);
        }

        $filename = basename(parse_url($url, PHP_URL_PATH)) ?: 'converted_' . time() . '.docx';

        return $this->service->streamDownload($url, $filename);
    }

    public function downloadFile(Request $request)
    {
        $url = $request->input('download_url');

        if (! $url) {
            return abort(404);
        }

        $filename = basename(parse_url($url, PHP_URL_PATH)) ?: 'converted_' . time() . '.docx';

        return $this->service->streamDownload($url, $filename);
    }

    public function convertFromUrl(Request $request)
    {
        $request->validate([
            'file_urls'   => 'required|array|min:1',
            'file_urls.*' => 'required|url',
        ]);

        $format   = ltrim($request->input('format', 'docx'), '.');
        $fileUrls = $request->input('file_urls');

        Log::info('[pdftoWordController] convertFromUrl called', ['file_count' => count($fileUrls)]);

        try {
            $convertedFiles = $this->service->convert($fileUrls, $format);

            return response()->json([
                'success'       => true,
                'data'          => $convertedFiles,
                'download_urls' => array_column($convertedFiles, 'file_url'),
                'file_count'    => count($fileUrls),
            ]);

        } catch (\Throwable $e) {
            Log::error('[pdftoWordController] convertFromUrl failed', ['message' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'error'   => 'Conversion failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
