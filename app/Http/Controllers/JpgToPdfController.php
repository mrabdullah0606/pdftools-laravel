<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Utils as PromiseUtils;

class JpgToPdfController extends Controller
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
        $appUrl = config('app.url');
        $host   = request()->getHost();
        return str_contains($appUrl, 'localhost') || str_contains($appUrl, '127.0.0.1') || in_array($host, ['127.0.0.1', 'localhost', '::1'], true) || str_starts_with($host, '192.168.') || str_starts_with($host, '10.');
    }

    /**
     * Upload multiple files to tmpfiles.org IN PARALLEL using Guzzle promises.
     * Returns indexed array of public URLs matching input order, or null on failure.
     */
    protected function uploadAllToTempHost(array $fileInfos): array
    {
        $client = new Client([
            'timeout'         => 60,
            'connect_timeout' => 10,
            'http_errors'     => false,
            'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
        ]);

        $promises = [];
        foreach ($fileInfos as $i => $info) {
            $promises[$i] = $client->postAsync('https://tmpfiles.org/api/v1/upload', [
                'multipart' => [[
                    'name'     => 'file',
                    'contents' => file_get_contents($info['path']),
                    'filename' => $info['filename'],
                    'headers'  => ['Content-Type' => $info['mime']],
                ]],
            ]);
        }

        $results = PromiseUtils::settle($promises)->wait();
        $urls    = [];

        foreach ($results as $i => $result) {
            if ($result['state'] !== 'fulfilled') {
                Log::warning('JpgToPdf: temp upload failed for file ' . $i);
                $urls[$i] = null;
                continue;
            }
            $body = (string) $result['value']->getBody();
            $url  = json_decode($body, true)['data']['url'] ?? null;
            if ($url) {
                $url = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $url);
            }
            Log::info('JpgToPdf: temp host upload success', ['url' => $url]);
            $urls[$i] = $url;
        }

        return $urls;
    }

    protected function getMimeType(string $extension): string
    {
        return match (strtolower($extension)) {
            'png'  => 'image/png',
            'gif'  => 'image/gif',
            'bmp'  => 'image/bmp',
            'webp' => 'image/webp',
            default => 'image/jpeg',
        };
    }

    public function index(Request $request)
    {
        $data = [
            'api_response'   => session('jpg_api_response'),
            'uploaded_files' => session('jpg_uploaded_files'),
            'download_urls'  => session('jpg_download_urls'),
        ];

        if (session()->has('jpg_api_response')) {
            session()->forget(['jpg_api_response', 'jpg_uploaded_files', 'jpg_download_urls']);
        }

        return view('pages.jpg-to-pdf', $data);
    }

    public function convert(Request $request)
    {
        Log::info('=== JPG TO PDF STARTED ===');

        $locale = $request->route('locale') ?? app()->getLocale();

        try {
            $request->validate([
                'files'            => 'required|array|min:1',
                'files.*'          => 'required|file|mimes:jpg,jpeg,png,gif,bmp,webp|max:25600',
                'page_orientation' => 'required|string',
                'page_size'        => 'required|string',
                'margin_size'      => 'required|string',
                'output_type'      => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('JpgToPdf: validation failed', ['errors' => $e->errors()]);
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'status'  => 'failed',
                    'message' => 'Validation failed: ' . implode(', ', collect($e->errors())->flatten()->toArray()),
                ], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        }

        $uploadPath = public_path('uploads');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $urls     = [];
        $useTemp  = $this->isLocalhost();
        $fileInfos = [];
        Log::info('JpgToPdf: useTemp=' . ($useTemp ? 'true' : 'false'));

        // Save all files first
        foreach ($request->file('files') as $file) {
            $ext       = $file->getClientOriginalExtension() ?: 'jpg';
            $cleanName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'image';
            $filename  = time() . '_' . uniqid() . '_' . $cleanName . '.' . $ext;

            $file->move($uploadPath, $filename);
            $savedPath = $uploadPath . DIRECTORY_SEPARATOR . $filename;
            Log::info('JpgToPdf: file saved', ['path' => $savedPath]);

            $fileInfos[] = [
                'path'     => $savedPath,
                'filename' => $filename,
                'mime'     => $this->getMimeType($ext),
            ];
        }

        if ($useTemp) {
            // Upload all files to tmpfiles.org in parallel
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
                Log::info('JpgToPdf: file URL ready', ['url' => $url]);
                $urls[] = $url;
            }
        } else {
            foreach ($fileInfos as $info) {
                $publicUrl = rtrim(config('app.url'), '/') . '/uploads/' . basename($info['path']);
                Log::info('JpgToPdf: file URL ready', ['url' => $publicUrl]);
                $urls[] = $publicUrl;
            }
        }

        $payload = [
            'file_urls'          => $urls,
            'page_orientation'   => $request->input('page_orientation', 'portrait'),
            'page_size'          => $request->input('page_size', 'A4'),
            'margin_size'        => $request->input('margin_size', 'Small'),
            'output_type'        => $request->input('output_type', 'MERGE_ALL'),
            'request_secret_key' => $this->apiKey,
        ];

        Log::info('JpgToPdf: sending API request', ['urls' => $urls]);

        $client      = $this->getGuzzleClient();
        $maxRetries  = 2;
        $apiResponse = null;

        for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
            try {
                $response = $client->post($this->apiBase . 'images_to_pdf', [
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
                    Log::info('JpgToPdf: API success', ['status' => $statusCode, 'body' => substr($responseBody, 0, 500)]);
                    break;
                }

                $detail = json_decode($responseBody, true)['detail'] ?? '';
                if ($statusCode === 400 && str_contains($detail, 'exceeds')) {
                    if ($request->ajax()) {
                        return response()->json([
                            'success' => false,
                            'status'  => 'failed',
                            'message' => 'One or more files exceed the 25 MB limit.',
                        ], 400);
                    }
                    return back()->withErrors(['api_error' => 'One or more files exceed the 25 MB limit.']);
                }

                Log::warning("JpgToPdf: API attempt $attempt failed", ['status' => $statusCode, 'response' => $responseBody]);
            } catch (RequestException $e) {
                Log::error("JpgToPdf: API attempt $attempt exception: " . $e->getMessage());
            }

            if ($attempt < $maxRetries) {
                usleep(500000);
            }
        }

        if (!$apiResponse) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'status'  => 'failed',
                    'message' => 'Conversion service failed. Please try again.',
                ], 500);
            }
            return back()->withErrors(['api_error' => 'Conversion service failed. Please try again.']);
        }

        Log::info('JpgToPdf: full API response', ['response' => $apiResponse]);

        // API returns data.files[].url
        $downloadUrls = [];
        foreach (($apiResponse['data']['files'] ?? []) as $item) {
            if (!empty($item['url'])) {
                $downloadUrls[] = $item['url'];
            }
        }

        // Fallback: flat download_urls array
        if (empty($downloadUrls) && !empty($apiResponse['download_urls'])) {
            $downloadUrls = array_values($apiResponse['download_urls']);
        }

        Log::info('JpgToPdf: parsed download URLs', ['count' => count($downloadUrls)]);

        if ($request->ajax()) {
            $html = view('pages.jpg-to-pdf', [
                'api_response'   => $apiResponse,
                'uploaded_files' => $urls,
                'download_urls'  => $downloadUrls,
            ])->render();

            return response()->json([
                'success' => true,
                'html'    => $html,
            ]);
        }

        session([
            'jpg_api_response'   => $apiResponse,
            'jpg_uploaded_files' => $urls,
            'jpg_download_urls'  => $downloadUrls,
        ]);

        if ($locale && $locale !== 'en') {
            return redirect()->route('localized.jpg-to-pdf', ['locale' => $locale]);
        }

        return redirect()->route('jpg-to-pdf');
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
        }, 'converted_' . time() . '.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function convertFromUrl(Request $request)
    {
        try {
            $request->validate([
                'file_urls'        => 'required|array|min:1',
                'file_urls.*'      => 'required|url',
                'page_orientation' => 'required|in:portrait,landscape',
                'page_size'        => 'required|in:A4,US Letter,Fit',
                'margin_size'      => 'required|in:Small,No margin,Big',
                'output_type'      => 'required|in:MERGE_ALL,SEPARATE_PDFS',
            ]);

            $payload = [
                'file_urls'          => $request->input('file_urls'),
                'page_orientation'   => $request->input('page_orientation'),
                'page_size'          => $request->input('page_size'),
                'margin_size'        => $request->input('margin_size'),
                'output_type'        => $request->input('output_type'),
                'request_secret_key' => $this->apiKey,
            ];

            $client   = $this->getGuzzleClient();
            $response = $client->post($this->apiBase . 'images_to_pdf', [
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
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
