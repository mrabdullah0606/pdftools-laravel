<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Exception;


class ExceltoPdfController extends Controller
{
    public function index()
    {
        return view('pages.excel-to-pdf');
    }

    public function excelToPdf(Request $request)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'files' => 'required|array|min:1',
                'files.*' => 'required|file|mimes:xls,xlsx|max:51200',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            if (!$request->hasFile('files')) {
                return response()->json([
                    'success' => false,
                    'message' => 'No files uploaded'
                ], 422);
            }

            $urls = [];
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . uniqid() . '_' . preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . ($file->getClientOriginalExtension() ?: 'xlsx');

                // Save locally to public/uploads/excel
                $uploadPath = public_path('uploads/excel');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $file->move($uploadPath, $fileName);
                $absolutePath = $uploadPath . '/' . $fileName;
                $urls[] = $absolutePath;
            }

            // Prepare payload for local Python API (matching excel_to_pdf_route.py)
            $payload = [
                "file_urls"          => $urls,
                "request_secret_key" => "Hira-unique-key-1",
            ];

            // Send to LOCAL API (mapped to pdfprocdn.com via proxy or locally)
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ])->timeout(120)->post('https://pdfprocdn.com/api/excel_to_pdf', $payload);

            if ($response->successful()) {
                $responseData = $response->json();

                if (isset($responseData['data'])) {
                    return view('pages.excel-to-pdf', [
                        'uploaded_files' => $urls,
                        'api_response' => $responseData
                    ]);
                }
            } else {
                return back()->withErrors(['api_error' => 'Conversion API failed: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            Log::error('Unexpected error excelToPdf', ['error' => $e->getMessage()]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unexpected error. Try again.'
                ], 500);
            }
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

    public function downloadPdf(Request $request)
    {
        $fileUrl = $request->query('url');
        $filename = $request->query('filename', 'converted.pdf');

        try {
            $localPath = $fileUrl;
            if (strpos($fileUrl, 'http') === 0) {
                $pathOnly = parse_url($fileUrl, PHP_URL_PATH);
                $localPath = public_path($pathOnly);
                Log::info('ExcelToPdf: URL converted to local path', ['url' => $fileUrl, 'local' => $localPath]);
            }

            // If it's a local absolute path, download directly
            if (strpos($localPath, '/var/www/html') !== false || strpos($localPath, ':\\') !== false) {
                if (file_exists($localPath)) {
                    return response()->download($localPath);
                }
                Log::error("ExcelToPdf: Local file not found for download", ['path' => $localPath]);
            }

            // Fallback (OLD LOGIC)
            $response = Http::get($fileUrl);
            if ($response->successful()) {
                return response($response->body(), 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
            }
        } catch (\Exception $e) {
            Log::error('Download failed', ['error' => $e->getMessage()]);
        }

        return redirect()->back()->with('error', 'File could not be downloaded.');
    }
}
