<?php

namespace App\Http\Controllers;

use App\Services\TempFileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Utils as PromiseUtils;

class PagestoPdfController extends Controller
{
    protected $apiKey  = 'Hira-unique-key-1';
    protected $apiBase = 'https://pdfprocdn.com/api/';

    protected function getGuzzleClient(): Client
    {
        return new Client([
            'timeout'         => 120,
            'connect_timeout' => 10,
            'http_errors'     => false,
            'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
        ]);
    }

    protected function isLocalhost(): bool
    {
        $url = config('app.url');
        return str_contains($url, 'localhost') || str_contains($url, '127.0.0.1');
    }

    protected function uploadAllToTempHost(array $fileInfos): array
    {
        return TempFileUploader::uploadMultiple($fileInfos);
    }

    protected function getMimeType(string $extension): string
    {
        return match (strtolower($extension)) {
            'pages' => 'application/octet-stream',
            'pdf'   => 'application/pdf',
            default => 'application/octet-stream',
        };
    }

    public function index()
    {
        return view('pages.pages-to-pdf');
    }

    public function convert(Request $request)
    {
        Log::info('=== PAGES TO PDF STARTED ===', [
            'files_count' => $request->hasFile('files') ? count($request->file('files')) : 0,
        ]);

        try {
            $request->validate([
                'files'   => 'required|array|min:1',
                'files.*' => 'required|file|max:51200',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('PagesToPdf: validation failed', ['errors' => $e->errors()]);
            return back()->withErrors($e->errors())->withInput();
        }

        $uploadPath = public_path('uploads');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $urls      = [];
        $fileInfos = [];
        $useTemp   = $this->isLocalhost();

        foreach ($request->file('files') as $file) {
            $ext       = $file->getClientOriginalExtension() ?: 'pages';
            $cleanName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'document';
            $filename  = time() . '_' . uniqid() . '_' . $cleanName . '.' . $ext;

            $file->move($uploadPath, $filename);
            $savedPath = $uploadPath . DIRECTORY_SEPARATOR . $filename;
            Log::info('PagesToPdf: file saved', ['path' => $savedPath]);

            $fileInfos[] = [
                'path'     => $savedPath,
                'filename' => $filename,
                'mime'     => $this->getMimeType($ext),
            ];
        }

        if ($useTemp) {
            $tempUrls = $this->uploadAllToTempHost($fileInfos);
            foreach ($tempUrls as $url) {
                if (!$url) {
                    return back()->withErrors(['api_error' => 'Could not reach temporary file host. Please try again.']);
                }
                Log::info('PagesToPdf: file URL ready', ['url' => $url]);
                $urls[] = $url;
            }
        } else {
            foreach ($fileInfos as $info) {
                $publicUrl = rtrim(config('app.url'), '/') . '/uploads/' . basename($info['path']);
                Log::info('PagesToPdf: file URL ready', ['url' => $publicUrl]);
                $urls[] = $publicUrl;
            }
        }

        $payload = [
            'file_urls'          => $urls,
            'request_secret_key' => $this->apiKey,
        ];

        Log::info('PagesToPdf: sending API request', ['urls' => $urls]);

        $client      = $this->getGuzzleClient();
        $maxRetries  = 2;
        $apiResponse = null;

        for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
            try {
                $response = $client->post($this->apiBase . 'pages_to_pdf', [
                    'body'    => json_encode($payload),
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept'       => 'application/json',
                    ],
                ]);

                $statusCode   = $response->getStatusCode();
                $responseBody = (string) $response->getBody();

                Log::info("PagesToPdf: API response attempt $attempt", [
                    'status' => $statusCode,
                    'body'   => substr($responseBody, 0, 600),
                ]);

                if ($statusCode >= 200 && $statusCode < 300) {
                    $apiResponse = json_decode($responseBody, true);
                    break;
                }

                $detail = json_decode($responseBody, true)['detail'] ?? '';
                if ($statusCode === 400 && str_contains($detail, 'exceeds')) {
                    return back()->withErrors(['api_error' => 'File exceeds the size limit. Please use a smaller file.']);
                }

                Log::warning("PagesToPdf: API attempt $attempt failed", ['status' => $statusCode, 'body' => $responseBody]);
            } catch (RequestException $e) {
                Log::error("PagesToPdf: API attempt $attempt exception: " . $e->getMessage());
            }

            if ($attempt < $maxRetries) {
                usleep(500000);
            }
        }

        if (!$apiResponse) {
            return back()->withErrors(['api_error' => 'Conversion service failed. Please try again.']);
        }

        Log::info('PagesToPdf: full API response', ['response' => $apiResponse]);

        // Parse download URLs — try data.files[].url first, then fallbacks
        $downloadUrls = [];
        foreach (($apiResponse['data']['files'] ?? []) as $item) {
            if (!empty($item['url'])) {
                $downloadUrls[] = $item['url'];
            }
        }

        if (empty($downloadUrls) && !empty($apiResponse['download_urls'])) {
            $downloadUrls = array_values($apiResponse['download_urls']);
        }

        if (empty($downloadUrls) && !empty($apiResponse['data']) && is_array($apiResponse['data'])) {
            foreach ($apiResponse['data'] as $item) {
                $u = $item['file_url'] ?? $item['url'] ?? null;
                if ($u) $downloadUrls[] = $u;
            }
        }

        Log::info('PagesToPdf: parsed URLs', ['count' => count($downloadUrls)]);

        return view('pages.pages-to-pdf', [
            'uploaded_files' => $urls,
            'api_response'   => $apiResponse,
            'download_urls'  => $downloadUrls,
        ]);
    }

    public function convertFromUrl(Request $request)
    {
        try {
            $request->validate([
                'file_urls'   => 'required|array|min:1',
                'file_urls.*' => 'required|url',
            ]);

            $payload = [
                'file_urls'          => $request->input('file_urls'),
                'request_secret_key' => $this->apiKey,
            ];

            $client   = $this->getGuzzleClient();
            $response = $client->post($this->apiBase . 'pages_to_pdf', [
                'body'    => json_encode($payload),
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            ]);

            $data         = json_decode((string) $response->getBody(), true);
            $downloadUrls = [];
            foreach (($data['data']['files'] ?? []) as $item) {
                if (!empty($item['url'])) $downloadUrls[] = $item['url'];
            }

            return response()->json([
                'success'       => $response->getStatusCode() < 300,
                'data'          => $data,
                'download_urls' => $downloadUrls,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function checkStatus(Request $request)
    {
        $client = $this->getGuzzleClient();
        try {
            $response = $client->post($this->apiBase . 'check_status', [
                'body'    => json_encode(['job_id' => $request->input('job_id'), 'request_secret_key' => $this->apiKey]),
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
        if (!$url) return abort(404);

        return response()->streamDownload(function () use ($url) {
            $client   = new Client(['timeout' => 120, 'curl' => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4]]);
            $response = $client->get($url, ['stream' => true]);
            $body     = $response->getBody();
            while (!$body->eof()) {
                echo $body->read(1024 * 32);
                if (connection_aborted()) break;
            }
        }, 'converted_' . time() . '.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
