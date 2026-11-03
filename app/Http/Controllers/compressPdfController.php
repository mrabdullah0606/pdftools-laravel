<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Utils as PromiseUtils;

class compressPdfController extends Controller
{
    protected $apiKey = 'Hira-unique-key-1';
    protected $apiBase = 'https://pdfprocdn.com/api/';

    protected function getGuzzleClient()
    {
        return new Client([
            'timeout'         => 120,
            'connect_timeout' => 10,
            'http_errors'     => false,
            'verify'          => false,
            'curl'            => [
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            ],
        ]);
    }

    protected function uploadAllToTempHost(array $fileInfos): array
    {
        $client = new Client([
            'timeout'         => 60,
            'connect_timeout' => 10,
            'http_errors'     => false,
            'verify'          => false,
            'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
        ]);

        $promises = [];
        foreach ($fileInfos as $i => $info) {
            $promises[$i] = $client->postAsync('https://tmpfiles.org/api/v1/upload', [
                'multipart' => [[
                    'name'     => 'file',
                    'contents' => file_get_contents($info['path']),
                    'filename' => $info['filename'],
                    'headers'  => ['Content-Type' => $info['mime'] ?? 'application/pdf'],
                ]],
            ]);
        }

        $results = PromiseUtils::settle($promises)->wait();
        $urls    = [];

        foreach ($results as $i => $result) {
            if ($result['state'] !== 'fulfilled') {
                Log::warning('Compress: temp upload failed for file ' . $i);
                $urls[$i] = null;
                continue;
            }
            $body = (string) $result['value']->getBody();
            $url  = json_decode($body, true)['data']['url'] ?? null;
            if ($url) {
                $url = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $url);
            }
            Log::info('Compress: temp host upload success', ['url' => $url]);
            $urls[$i] = $url;
        }

        return $urls;
    }

    protected function parseSizeToBytes(string $size): int
    {
        $size  = strtoupper(trim($size));
        $value = (float) $size;
        if (str_contains($size, 'GB')) return (int) ($value * 1024 * 1024 * 1024);
        if (str_contains($size, 'MB')) return (int) ($value * 1024 * 1024);
        if (str_contains($size, 'KB')) return (int) ($value * 1024);
        return (int) $value;
    }

    protected function isLocalhost(): bool
    {
        $appUrl = config('app.url');
        $host   = request()->getHost();
        return str_contains($appUrl, 'localhost') || str_contains($appUrl, '127.0.0.1') || in_array($host, ['127.0.0.1', 'localhost', '::1'], true) || str_starts_with($host, '192.168.') || str_starts_with($host, '10.');
    }

    public function index()
    {
        $data = [
            'api_response'   => session('compress_api_response'),
            'download_urls'  => session('compress_download_urls'),
            'uploaded_files' => session('compress_uploaded_files'),
            'original_sizes' => session('compress_original_sizes'),
        ];

        if (session()->has('compress_api_response')) {
            session()->forget([
                'compress_api_response',
                'compress_download_urls',
                'compress_uploaded_files',
                'compress_original_sizes',
            ]);
        }

        return view('pages.compress-pdf', $data);
    }

    public function compress(Request $request)
    {
        Log::info('=== PDF COMPRESSION STARTED ===');

        $locale = $request->route('locale') ?? app()->getLocale();

        try {
            $request->validate([
                'files'       => 'required|array|min:1',
                'files.*'     => 'required|file|max:51200',
                'compression' => 'required|in:high,medium,low',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        }

        $compressionMapping = [
            'high'   => 'basic',
            'medium' => 'intermediate',
            'low'    => 'advanced',
        ];
        $apiCompressionLevel = $compressionMapping[$request->input('compression')] ?? 'intermediate';

        $uploadPath = public_path('uploads');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $urls          = [];
        $fileSizes     = [];
        $originalNames = [];
        $fileInfos     = [];
        $useTemp = true; // Always upload to temp hosting so live servers bypass Cloudflare/SSL issues
        Log::info('Compress: useTemp=' . ($useTemp ? 'true' : 'false'));

        foreach ($request->file('files') as $file) {
            $cleanName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $filename  = time() . '_' . uniqid() . '_' . $cleanName . '.pdf';

            $fileSizes[]     = $file->getSize();
            $originalNames[] = $file->getClientOriginalName();

            $file->move($uploadPath, $filename);
            $savedPath = $uploadPath . DIRECTORY_SEPARATOR . $filename;
            Log::info('Compress: file saved', ['path' => $savedPath, 'exists' => file_exists($savedPath)]);

            $fileInfos[] = [
                'path'     => $savedPath,
                'filename' => $filename,
                'mime'     => 'application/pdf',
            ];
        }

        if ($useTemp) {
            $tempUrls = $this->uploadAllToTempHost($fileInfos);
            foreach ($tempUrls as $url) {
                if (!$url) {
                    return back()->withErrors(['api_error' => 'Could not reach temporary file host. Please try again.']);
                }
                Log::info('Compress: file URL ready', ['url' => $url]);
                $urls[] = $url;
            }
        } else {
            foreach ($fileInfos as $info) {
                $publicUrl = rtrim(config('app.url'), '/') . '/uploads/' . basename($info['path']);
                Log::info('Compress: file URL ready', ['url' => $publicUrl]);
                $urls[] = $publicUrl;
            }
        }

        $payload = [
            'file_urls'          => $urls,
            'compression_level'  => $apiCompressionLevel,
            'request_secret_key' => $this->apiKey,
        ];

        Log::info('Compress JSON request', ['urls' => $urls, 'level' => $apiCompressionLevel]);

        $client      = $this->getGuzzleClient();
        $maxRetries  = 2;
        $apiResponse = null;

        for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
            try {
                $response = $client->post($this->apiBase . 'pdf_compression', [
                    'body'    => json_encode($payload),
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept'       => 'application/json',
                    ],
                ]);

                $statusCode   = $response->getStatusCode();
                $responseBody = (string) $response->getBody();

                if ($statusCode >= 200 && $statusCode < 300) {
                    $apiResponse = json_decode($responseBody, true);
                    Log::info('Compress: API success', ['status' => $statusCode, 'body' => substr($responseBody, 0, 500)]);
                    break;
                }

                Log::warning("PDF Compression API attempt $attempt failed with status $statusCode", ['response' => $responseBody]);
            } catch (RequestException $e) {
                Log::error("PDF Compression API attempt $attempt exception: " . $e->getMessage());
            }

            if ($attempt < $maxRetries) {
                usleep(500000);
            }
        }

        if (!$apiResponse) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'The compression service is currently busy. Please try again in a few moments.'], 500);
            }
            return back()->withErrors(['api_error' => 'The compression service is currently busy. Please try again in a few moments.']);
        }

        Log::info('Compress: full API response', ['response' => $apiResponse]);

        try {
            $compressedFiles = [];

            // API returns: {"data": {"files": [{"url":"...","filename":"...","size":"0.07 MB","success":true}]}}
            $files = $apiResponse['data']['files'] ?? [];

            foreach ($files as $index => $item) {
                if (empty($item['url']) || empty($item['success'])) continue;

                // Convert "0.07 MB" string to bytes
                $sizeStr       = $item['size'] ?? '0';
                $sizeBytes     = $this->parseSizeToBytes($sizeStr);

                $compressedFiles[] = [
                    'file_url'        => $item['url'],
                    'filename'        => $item['filename'] ?? ($originalNames[$index] ?? 'compressed.pdf'),
                    'compressed_size' => $sizeBytes,
                    'original_size'   => $fileSizes[$index] ?? 0,
                ];
            }

            Log::info('Compress: parsed files', ['count' => count($compressedFiles), 'files' => $compressedFiles]);

            $apiResponse['data'] = $compressedFiles;

            session([
                'compress_api_response'   => $apiResponse,
                'compress_uploaded_files' => $originalNames,
                'compress_download_urls'  => array_column($compressedFiles, 'file_url'),
                'compress_original_sizes' => $fileSizes,
            ]);
        } catch (\Throwable $e) {
            Log::error('Compress: response parsing failed — ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Compression succeeded but result could not be read. Please try again.'], 500);
            }
            return back()->withErrors(['api_error' => 'Compression succeeded but result could not be read. Please try again.']);
        }

        if ($request->ajax()) {
            $html = view('pages.compress-pdf', [
                'api_response'   => $apiResponse,
                'uploaded_files' => $originalNames,
                'download_urls'  => array_column($compressedFiles, 'file_url'),
                'original_sizes' => $fileSizes,
                'is_processing'  => false,
                'job_id'         => null,
            ])->render();

            return response()->json([
                'success'       => true,
                'status'        => 'completed',
                'download_urls' => array_column($compressedFiles, 'file_url'),
                'html'          => $html,
            ]);
        }

        if ($locale && $locale !== 'en') {
            return redirect()->route('localized.compress-pdf', ['locale' => $locale]);
        }

        return redirect()->route('compress-pdf');
    }

    public function compressFromUrl(Request $request)
    {
        $request->validate([
            'file_urls'   => 'required|array|min:1',
            'file_urls.*' => 'required|url',
            'compression' => 'required|in:high,medium,low',
        ]);

        $compressionMapping = [
            'high'   => 'basic',
            'medium' => 'intermediate',
            'low'    => 'advanced',
        ];
        $apiCompressionLevel = $compressionMapping[$request->input('compression')] ?? 'intermediate';

        $payload = [
            'file_urls'          => $request->input('file_urls'),
            'compression_level'  => $apiCompressionLevel,
            'request_secret_key' => $this->apiKey,
        ];

        $client = $this->getGuzzleClient();
        try {
            $response = $client->post($this->apiBase . 'pdf_compression', [
                'body'    => json_encode($payload),
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            ]);
            $data = json_decode((string) $response->getBody(), true);

            return response()->json([
                'success'       => $response->getStatusCode() < 300,
                'data'          => $data,
                'download_urls' => $data['download_urls'] ?? [],
                'file_count'    => count($payload['file_urls']),
            ]);
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function checkStatus(Request $request)
    {
        $payload = [
            'job_id'             => $request->input('job_id'),
            'request_secret_key' => $this->apiKey,
        ];

        $client = $this->getGuzzleClient();
        try {
            $response = $client->post($this->apiBase . 'check_status', [
                'body'    => json_encode($payload),
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            ]);
            return response()->json(json_decode((string) $response->getBody(), true));
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function downloadFile(Request $request)
    {
        $url = $request->input('download_url');
        if (empty($url)) {
            return abort(404, 'No download URL provided');
        }

        return response()->streamDownload(function () use ($url) {
            $client   = new Client([
                'timeout' => 300, 
                'verify'  => false, 
                'curl'    => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4]
            ]);
            $response = $client->get($url, ['stream' => true]);
            $body     = $response->getBody();
            while (!$body->eof()) {
                echo $body->read(1024 * 32);
                if (connection_aborted()) break;
            }
        }, 'compressed_' . time() . '.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
