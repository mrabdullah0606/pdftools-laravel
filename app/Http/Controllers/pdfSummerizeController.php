<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Utils as PromiseUtils;

class pdfSummerizeController extends Controller
{
    protected $apiKey  = 'Hira-unique-key-1';
    protected $apiBase = 'https://pdfprocdn.com/api/';

    protected function getGuzzleClient(): Client
    {
        return new Client([
            'timeout'         => 120,
            'connect_timeout' => 10,
            'http_errors'     => false,
            'verify'          => false,
            'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
        ]);
    }

    protected function isLocalhost(): bool
    {
        $appUrl = config('app.url');
        $host   = request()->getHost();
        return str_contains($appUrl, 'localhost') || str_contains($appUrl, '127.0.0.1') || in_array($host, ['127.0.0.1', 'localhost', '::1'], true) || str_starts_with($host, '192.168.') || str_starts_with($host, '10.');
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

        $urls = [];
        foreach ($fileInfos as $i => $info) {
            $url = null;

            // Primary for Summarizer: try tmpfiles.org (URL contains filename ending in .pdf, required by this specific API)
            try {
                Log::info('Summarize: uploading to tmpfiles.org (primary for pdf extensions)...');
                $response = $client->post('https://tmpfiles.org/api/v1/upload', [
                    'multipart' => [[
                        'name'     => 'file',
                        'contents' => file_get_contents($info['path']),
                        'filename' => $info['filename'],
                        'headers'  => ['Content-Type' => 'application/pdf'],
                    ]],
                ]);
                if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                    $body = (string) $response->getBody();
                    $data = json_decode($body, true);
                    $url  = $data['data']['url'] ?? null;
                    if ($url) {
                        $url = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $url);
                        $url = str_replace('http://', 'https://', $url);
                        Log::info('Summarize: tmpfiles.org upload success', ['url' => $url]);
                    }
                }
            } catch (\Exception $e) {
                Log::warning('Summarize: tmpfiles.org primary upload failed: ' . $e->getMessage());
            }

            // Fallback: try file.io
            if (!$url) {
                try {
                    Log::info('Summarize: falling back to file.io...');
                    $response = $client->post('https://file.io', [
                        'multipart' => [[
                            'name'     => 'file',
                            'contents' => file_get_contents($info['path']),
                            'filename' => $info['filename'],
                        ]],
                    ]);
                    if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                        $body = (string) $response->getBody();
                        $data = json_decode($body, true);
                        if (!empty($data['link'])) {
                            $url = $data['link'];
                            Log::info('Summarize: file.io fallback upload success', ['url' => $url]);
                        }
                    }
                } catch (\Exception $e) {
                    Log::error('Summarize: file.io fallback failed: ' . $e->getMessage());
                }
            }

            $urls[$i] = $url;
        }

        return $urls;
    }

    public function index()
    {
        return view('pages.pdf-summarize');
    }

    public function summarize(Request $request)
    {
        Log::info('=== PDF SUMMARIZE STARTED ===', [
            'files_count'    => $request->hasFile('files') ? count($request->file('files')) : 0,
            'summary_length' => $request->input('summary_length'),
        ]);

        try {
            $request->validate([
                'files'          => 'required|array|min:1',
                'files.*'        => 'required|file|mimes:pdf|max:25600',
                'summary_length' => 'required|in:brief,comprehensive,detailed',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Summarize: validation failed', ['errors' => $e->errors()]);
            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        }

        $uploadPath = public_path('uploads');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $fileInfos     = [];
        $originalNames = [];
        $useTemp       = true; // Always upload to temp hosting so live servers bypass Cloudflare/SSL issues

        // Save all files first
        foreach ($request->file('files') as $file) {
            $cleanName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $filename  = time() . '_' . uniqid() . '_' . $cleanName . '.pdf';

            $file->move($uploadPath, $filename);
            $savedPath = $uploadPath . DIRECTORY_SEPARATOR . $filename;
            Log::info('Summarize: file saved', ['path' => $savedPath]);

            $originalNames[] = $file->getClientOriginalName();
            $fileInfos[]     = ['path' => $savedPath, 'filename' => $filename];
        }

        // Get public URLs (parallel upload if localhost)
        $publicUrls = [];
        if ($useTemp) {
            $tempUrls = $this->uploadAllToTempHost($fileInfos);
            foreach ($tempUrls as $url) {
                if (!$url) {
                    if ($request->ajax()) {
                        return response()->json([
                            'success' => false,
                            'status'  => 'failed',
                            'message' => 'Could not reach temporary file host. Please try again.',
                        ], 500);
                    }
                    return back()->withErrors(['api_error' => 'Could not reach temporary file host. Please try again.']);
                }
                $publicUrls[] = $url;
            }
        } else {
            foreach ($fileInfos as $info) {
                $publicUrls[] = rtrim(config('app.url'), '/') . '/uploads/' . basename($info['path']);
            }
        }

        $client  = $this->getGuzzleClient();
        $results = [];
        $lastErrorMsg = null;

        // Summarize each file individually (one summary per PDF)
        foreach ($publicUrls as $i => $publicUrl) {
            $payload = [
                'file_urls'          => [$publicUrl],
                'summary_type'       => 'comprehensive',
                'summary_length'     => $request->input('summary_length', 'comprehensive'),
                'request_secret_key' => $this->apiKey,
            ];

            Log::info('Summarize: sending API request', ['payload' => $payload]);

            $apiResponse = null;

            for ($attempt = 0; $attempt <= 2; $attempt++) {
                try {
                    $response = $client->post($this->apiBase . 'pdf_summarizer', [
                        'body'    => json_encode($payload),
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'Accept'       => 'application/json',
                        ],
                    ]);

                    $statusCode   = $response->getStatusCode();
                    $responseBody = (string) $response->getBody();

                    Log::info("Summarize: API response attempt $attempt", [
                        'status' => $statusCode,
                        'body'   => substr($responseBody, 0, 600),
                    ]);

                    if ($statusCode >= 200 && $statusCode < 300) {
                        $apiResponse = json_decode($responseBody, true);
                        break;
                    } else {
                        $errData = json_decode($responseBody, true);
                        if (!empty($errData['detail'])) {
                            $lastErrorMsg = $errData['detail'];
                        } elseif (!empty($errData['message'])) {
                            $lastErrorMsg = $errData['message'];
                        } elseif (!empty($errData['error'])) {
                            $lastErrorMsg = $errData['error'];
                        }
                    }

                    Log::warning("Summarize: API attempt $attempt failed", ['status' => $statusCode, 'body' => $responseBody]);
                } catch (RequestException $e) {
                    Log::error("Summarize: API attempt $attempt exception: " . $e->getMessage());
                }

                if ($attempt < 2) usleep(500000);
            }

            if (!$apiResponse) {
                Log::warning('Summarize: no API response for file', ['url' => $publicUrl]);
                continue;
            }

            // Extract summary text — try multiple possible response keys
            $summaryText = $apiResponse['summary']
                ?? $apiResponse['data']['summary']
                ?? $apiResponse['data']['text']
                ?? $apiResponse['text']
                ?? null;

            // If data.files[] structure (like other tools)
            if (!$summaryText && !empty($apiResponse['data']['files'])) {
                $summaryText = $apiResponse['data']['files'][0]['summary']
                    ?? $apiResponse['data']['files'][0]['text']
                    ?? $apiResponse['data']['files'][0]['content']
                    ?? null;
            }

            Log::info('Summarize: extracted summary', ['length' => strlen($summaryText ?? ''), 'keys' => array_keys($apiResponse)]);

            if ($summaryText) {
                $localUrl = asset('uploads/' . $fileInfos[$i]['filename']);
                $results[] = [
                    'original_file' => $publicUrl,
                    'summary_text'  => $summaryText,
                    'file_url'      => $localUrl,
                ];
            } else {
                Log::warning('Summarize: no summary text found in response', ['response' => $apiResponse]);
            }
        }

        if (empty($results)) {
            $errMsg = $lastErrorMsg ?: 'The summarization service could not process this document. Please try again.';
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'status'  => 'failed',
                    'message' => $errMsg,
                ], 500);
            }
            return back()->withErrors(['api_error' => $errMsg]);
        }

        if ($request->ajax()) {
            $html = view('pages.pdf-summarize', [
                'uploaded_files' => $publicUrls,
                'api_response'   => ['success' => true, 'data' => $results],
            ])->render();

            return response()->json([
                'success' => true,
                'status'  => 'completed',
                'html'    => $html,
            ]);
        }

        return view('pages.pdf-summarize', [
            'uploaded_files' => $publicUrls,
            'api_response'   => ['success' => true, 'data' => $results],
        ]);
    }

    public function downloadFile(Request $request)
    {
        $downloadUrl = $request->input('download_url');
        if (!$downloadUrl) return abort(404);

        return response()->streamDownload(function () use ($downloadUrl) {
            $client   = new Client(['timeout' => 120, 'curl' => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4]]);
            $response = $client->get($downloadUrl, ['stream' => true]);
            $body     = $response->getBody();
            while (!$body->eof()) {
                echo $body->read(1024 * 32);
                if (connection_aborted()) break;
            }
        }, 'summary_' . time() . '.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function summarizeFromUrl(Request $request)
    {
        $request->validate([
            'file_url'       => 'required|url',
            'summary_length' => 'nullable|in:brief,comprehensive,detailed',
        ]);

        $payload = [
            'file_urls'          => [$request->input('file_url')],
            'summary_type'       => $request->input('summary_type', 'comprehensive'),
            'summary_length'     => $request->input('summary_length', 'brief'),
            'request_secret_key' => $this->apiKey,
        ];

        $client = $this->getGuzzleClient();
        try {
            $response = $client->post($this->apiBase . 'pdf_summarizer', [
                'body'    => json_encode($payload),
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            ]);

            $apiData     = json_decode((string) $response->getBody(), true);
            $summaryText = $apiData['summary'] ?? $apiData['data']['summary'] ?? $apiData['data']['text'] ?? null;

            return response()->json([
                'success' => $response->getStatusCode() < 300,
                'data'    => $summaryText ? [['summary_text' => $summaryText, 'file_url' => $request->input('file_url')]] : [],
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
