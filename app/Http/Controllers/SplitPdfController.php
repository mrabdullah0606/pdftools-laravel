<?php

namespace App\Http\Controllers;

use App\Services\TempFileUploader;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ZipArchive;

class SplitPdfController extends Controller
{
    protected string $apiKey       = 'Hira-unique-key-1';
    protected string $apiBase      = 'https://pdfprocdn.com/api/';
    protected string $originDomain = 'https://www.pdftools.net';

    protected function getGuzzleClient(): Client
    {
        return new Client([
            'timeout'         => 300,
            'connect_timeout' => 30,
            'http_errors'     => false,
            'verify'          => false,
            'headers'         => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            ],
            'curl'            => [defined('CURLOPT_IPRESOLVE') ? CURLOPT_IPRESOLVE : 113 => 1], // IPv4
        ]);
    }

    protected function getApiHeaders(): array
    {
        return [
            'Origin'       => $this->originDomain,
            'Referer'      => $this->originDomain . '/',
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
            'User-Agent'   => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        ];
    }

    public function index(Request $request)
    {
        Log::info('[SplitPdfController] Index called');

        return view('pages.split-pdf', [
            'api_response'      => session()->pull('split_api_response'),
            'download_urls'     => session()->pull('split_download_urls'),
            'uploaded_files'    => session()->pull('split_uploaded_files'),
            'original_filename' => session()->pull('split_original_filename', 'Document.pdf'),
            'split_mode'        => session()->pull('split_mode', 'ranges'),
            'ranges'            => session()->pull('split_ranges', ''),
            'fixed_range'       => session()->pull('split_fixed_range', 1),
            'remove_pages'      => session()->pull('split_remove_pages', ''),
            'merge_after'       => session()->pull('split_merge_after', false),
        ]);
    }

    public function split(Request $request)
    {
        set_time_limit(600);
        Log::info('=== PDF SPLIT STARTED ===');

        $locale = $request->route('locale') ?? app()->getLocale();

        // 1. Validation
        try {
            $rules = [
                'files'      => 'required',
                'files.*'    => 'required|file|mimes:pdf|max:102400', // 100MB max
                'split_mode' => 'required|in:ranges,fixed_range,remove_pages',
            ];

            $mode = $request->input('split_mode');
            if ($mode === 'ranges') {
                $rules['ranges'] = 'required|string|max:255';
            } elseif ($mode === 'fixed_range') {
                $rules['fixed_range'] = 'required|integer|min:1';
            } elseif ($mode === 'remove_pages') {
                $rules['remove_pages'] = 'required|string|max:255';
            }

            $request->validate($rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('[SplitPdfController] Validation failed', ['errors' => $e->errors()]);
            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        }

        // 2. Save uploaded file locally
        $storageDir = storage_path('app/public/uploads/pdfs');
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0775, true);
        }

        $uploadedFiles = $request->file('files');
        $file = is_array($uploadedFiles) ? $uploadedFiles[0] : $uploadedFiles;

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $cleanName    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName);
        $filename     = time() . '_' . uniqid('', true) . '_' . $cleanName . '.pdf';
        $file->move($storageDir, $filename);

        $localPath   = $storageDir . '/' . $filename;
        $publicUrl   = url('/storage/uploads/pdfs/' . $filename);
        $savedUrls   = [$publicUrl];

        Log::info('[SplitPdfController] File saved locally', ['path' => $localPath, 'url' => $publicUrl]);

        // 3. Resolve public URL for remote API
        try {
            $resolvedFileUrl = $this->resolvePublicUrl($publicUrl, $localPath);

            $payload = [
                'file_url'           => $resolvedFileUrl,
                'request_secret_key' => $this->apiKey,
            ];

            if ($mode === 'ranges') {
                $payload['ranges']      = trim($request->input('ranges'));
                $payload['merge_after'] = $request->boolean('merge_after', false);
            } elseif ($mode === 'fixed_range') {
                $payload['fixed_range'] = (int) $request->input('fixed_range');
                $payload['merge_after'] = false;
            } elseif ($mode === 'remove_pages') {
                $payload['remove_pages'] = trim($request->input('remove_pages'));
                $payload['merge_after']  = false;
            }

            Log::info('[SplitPdfController] Sending request to API', [
                'endpoint' => $this->apiBase . 'pdf_split',
                'payload'  => array_merge($payload, ['request_secret_key' => '***']),
            ]);

            $client = $this->getGuzzleClient();
            $response = $client->post($this->apiBase . 'pdf_split', [
                'json'    => $payload,
                'headers' => $this->getApiHeaders(),
            ]);

            $status = $response->getStatusCode();
            $body   = (string) $response->getBody();
            $data   = json_decode($body, true);

            Log::info('[SplitPdfController] API response received', [
                'status'  => $status,
                'preview' => substr($body, 0, 300),
            ]);

            if ($status < 200 || $status >= 300) {
                $msg = $data['detail'] ?? ($data['message'] ?? 'API failed with status ' . $status);
                throw new \RuntimeException($msg);
            }

            $files = $data['data']['files'] ?? [];
            if (empty($files)) {
                throw new \RuntimeException('Split process completed but no files were produced.');
            }

            $downloadUrls = array_values(array_filter(array_map(fn ($f) => $f['url'] ?? null, $files)));

            // Clean up temporary uploaded source file
            $this->cleanupFiles($savedUrls);

            session([
                'split_api_response'      => $data,
                'split_uploaded_files'    => $savedUrls,
                'split_original_filename' => $file->getClientOriginalName(),
                'split_download_urls'     => $downloadUrls,
                'split_mode'              => $mode,
                'split_ranges'            => $request->input('ranges', ''),
                'split_fixed_range'       => $request->input('fixed_range', 1),
                'split_remove_pages'      => $request->input('remove_pages', ''),
                'split_merge_after'       => $request->boolean('merge_after', false),
            ]);

            if ($request->ajax()) {
                $html = view('pages.split-pdf', [
                    'uploaded_files'    => $savedUrls,
                    'download_urls'     => $downloadUrls,
                    'api_response'      => $data,
                    'original_filename' => $file->getClientOriginalName(),
                    'split_mode'        => $mode,
                ])->render();

                return response()->json([
                    'success'       => true,
                    'status'        => 'completed',
                    'data'          => $data,
                    'download_urls' => $downloadUrls,
                    'html'          => $html,
                ]);
            }

            if ($locale && $locale !== 'en') {
                return redirect()->route('localized.split-pdf', ['locale' => $locale]);
            }
            return redirect()->route('split-pdf');

        } catch (\Throwable $e) {
            Log::error('[SplitPdfController] Split failed', ['error' => $e->getMessage()]);
            $this->cleanupFiles($savedUrls);

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Split failed: ' . $e->getMessage(),
                ], 500);
            }

            return back()->withErrors(['api_error' => 'Split failed: ' . $e->getMessage()])->withInput();
        }
    }

    public function splitFromUrl(Request $request)
    {
        $request->validate([
            'file_url'   => 'required|url',
            'split_mode' => 'required|in:ranges,fixed_range,remove_pages',
        ]);

        $mode = $request->input('split_mode');
        $payload = [
            'file_url'           => $request->input('file_url'),
            'request_secret_key' => $this->apiKey,
        ];

        if ($mode === 'ranges') {
            $payload['ranges']      = trim($request->input('ranges', ''));
            $payload['merge_after'] = $request->boolean('merge_after', false);
        } elseif ($mode === 'fixed_range') {
            $payload['fixed_range'] = (int) $request->input('fixed_range', 1);
            $payload['merge_after'] = false;
        } elseif ($mode === 'remove_pages') {
            $payload['remove_pages'] = trim($request->input('remove_pages', ''));
            $payload['merge_after']  = false;
        }

        try {
            $client   = $this->getGuzzleClient();
            $response = $client->post($this->apiBase . 'pdf_split', [
                'json'    => $payload,
                'headers' => $this->getApiHeaders(),
            ]);

            $data = json_decode((string) $response->getBody(), true);
            $files = $data['data']['files'] ?? [];
            $downloadUrls = array_values(array_filter(array_map(fn ($f) => $f['url'] ?? null, $files)));

            return response()->json([
                'success'       => true,
                'data'          => $data,
                'download_urls' => $downloadUrls,
            ]);
        } catch (\Throwable $e) {
            Log::error('[SplitPdfController] splitFromUrl failed', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function downloadFile(Request $request)
    {
        $url = $request->input('download_url');
        if (!$url) {
            abort(404, 'Download URL is required.');
        }

        $filename = $request->input('filename') ?: ('split_' . time() . '.pdf');

        if (str_starts_with($url, '//')) {
            $url = 'https:' . $url;
        }

        $client   = $this->getGuzzleClient();
        $response = $client->get($url, [
            'stream'  => true,
            'headers' => [
                'Referer' => $this->originDomain . '/',
            ],
        ]);

        return response()->stream(function () use ($response) {
            $body = $response->getBody();
            while (!$body->eof()) {
                echo $body->read(1024);
            }
        }, 200, [
            'Content-Type'        => $response->getHeaderLine('Content-Type') ?: 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . addslashes($filename) . '"',
        ]);
    }

    public function downloadZip(Request $request)
    {
        $urls = $request->input('urls', []);
        if (empty($urls) || !is_array($urls)) {
            abort(400, 'No file URLs provided for ZIP download.');
        }

        $zipFileName = 'split_pdfs_' . time() . '.zip';
        $tempZipPath = storage_path('app/public/uploads/pdfs/' . $zipFileName);

        $zip = new ZipArchive();
        if ($zip->open($tempZipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            abort(500, 'Unable to create ZIP archive.');
        }

        $client = $this->getGuzzleClient();
        foreach ($urls as $i => $url) {
            try {
                if (str_starts_with($url, '//')) {
                    $url = 'https:' . $url;
                }
                $fileContent = $client->get($url, [
                    'headers' => [
                        'Referer' => $this->originDomain . '/',
                    ],
                ])->getBody()->getContents();
                $entryName   = basename(parse_url($url, PHP_URL_PATH)) ?: ("split_page_" . ($i + 1) . ".pdf");
                $zip->addFromString($entryName, $fileContent);
            } catch (\Throwable $e) {
                Log::warning('[SplitPdfController] Failed adding file to zip', ['url' => $url, 'error' => $e->getMessage()]);
            }
        }
        $zip->close();

        return response()->download($tempZipPath, $zipFileName)->deleteFileAfterSend(true);
    }

    public function checkStatus(Request $request)
    {
        return response()->json(['success' => false, 'status' => 'failed', 'message' => 'No active job.'], 400);
    }

    private function resolvePublicUrl(string $url, string $localPath): string
    {
        $host    = parse_url($url, PHP_URL_HOST) ?? '';
        $isLocal = in_array($host, ['127.0.0.1', 'localhost', '::1'], true)
            || str_starts_with($host, '192.168.')
            || str_starts_with($host, '10.');

        if (!$isLocal) {
            return $url;
        }

        Log::info('[SplitPdfController] Uploading local file to temporary public host', ['path' => $localPath]);
        $tempUrl = TempFileUploader::upload($localPath);
        if ($tempUrl) {
            return $tempUrl;
        }

        throw new \RuntimeException('Failed to obtain a public URL for the file to pass to the conversion engine.');
    }

    private function cleanupFiles(array $publicUrls): void
    {
        foreach ($publicUrls as $url) {
            try {
                $filename = basename(parse_url($url, PHP_URL_PATH));
                $path     = storage_path('app/public/uploads/pdfs/' . $filename);
                if (file_exists($path)) {
                    @unlink($path);
                }
            } catch (\Throwable $e) {
                // silent
            }
        }
    }
}
