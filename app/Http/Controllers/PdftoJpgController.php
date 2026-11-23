<?php

namespace App\Http\Controllers;

use App\Services\TempFileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Utils as PromiseUtils;

class PdftoJpgController extends Controller
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

    protected function uploadAllToTempHost(array $fileInfos): array
    {
        return TempFileUploader::uploadMultiple($fileInfos);
    }

    public function index()
    {
        return view('pages.pdf-to-jpg');
    }

    public function convert(Request $request)
    {
        Log::info('=== PDF TO JPG STARTED ===', [
            'files_count' => $request->hasFile('files') ? count($request->file('files')) : 0,
        ]);

        try {
            $request->validate([
                'files'           => 'required|array|min:1',
                'files.*'         => 'required|file|mimes:pdf|max:25600',
                'image_format'    => 'nullable|in:jpg,png,jpeg',
                'image_quality'   => 'nullable|in:normal,high',
                'conversion_type' => 'nullable|in:page_to_image,extract_images',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('PdfToJpg: validation failed', ['errors' => $e->errors()]);
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

        $urls      = [];
        $fileInfos = [];
        $useTemp   = $this->isLocalhost();

        foreach ($request->file('files') as $file) {
            $cleanName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'document';
            $filename  = time() . '_' . uniqid() . '_' . $cleanName . '.pdf';

            $file->move($uploadPath, $filename);
            $savedPath = $uploadPath . DIRECTORY_SEPARATOR . $filename;
            Log::info('PdfToJpg: file saved', ['path' => $savedPath]);

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
                    if ($request->ajax()) {
                        return response()->json([
                            'success' => false,
                            'status'  => 'failed',
                            'message' => 'Could not reach temporary file host. Please try again.',
                        ], 500);
                    }
                    return back()->withErrors(['api_error' => 'Could not reach temporary file host. Please try again.']);
                }
                Log::info('PdfToJpg: file URL ready', ['url' => $url]);
                $urls[] = $url;
            }
        } else {
            foreach ($fileInfos as $info) {
                $publicUrl = rtrim(config('app.url'), '/') . '/uploads/' . basename($info['path']);
                Log::info('PdfToJpg: file URL ready', ['url' => $publicUrl]);
                $urls[] = $publicUrl;
            }
        }

        $imageFormat    = $request->input('image_format', 'jpg');
        $imageQuality   = $request->input('image_quality', 'normal');
        $conversionType = $request->input('conversion_type', 'page_to_image');

        $payload = [
            'file_urls'          => $urls,
            'image_format'       => $imageFormat,
            'image_quality'      => $imageQuality,
            'conversion_type'    => $conversionType,
            'request_secret_key' => $this->apiKey,
        ];

        Log::info('PdfToJpg: sending API request', ['urls' => $urls]);

        $client      = $this->getGuzzleClient();
        $maxRetries  = 2;
        $apiResponse = null;

        for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
            try {
                $response = $client->post($this->apiBase . 'pdf_to_images', [
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
                    Log::info('PdfToJpg: API success', ['status' => $statusCode, 'body' => substr($responseBody, 0, 500)]);
                    break;
                }

                $detail = json_decode($responseBody, true)['detail'] ?? '';
                if ($statusCode === 400 && str_contains($detail, 'exceeds')) {
                    if ($request->ajax()) {
                        return response()->json([
                            'success' => false,
                            'status'  => 'failed',
                            'message' => 'File exceeds the 25 MB limit. Please use a smaller PDF.',
                        ], 400);
                    }
                    return back()->withErrors(['api_error' => 'File exceeds the 25 MB limit. Please use a smaller PDF.']);
                }

                Log::warning("PdfToJpg: API attempt $attempt failed", ['status' => $statusCode, 'response' => $responseBody]);
            } catch (RequestException $e) {
                Log::error("PdfToJpg: API attempt $attempt exception: " . $e->getMessage());
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

        Log::info('PdfToJpg: full API response', ['response' => $apiResponse]);

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

        Log::info('PdfToJpg: parsed URLs', ['count' => count($downloadUrls)]);

        if ($request->ajax()) {
            $html = view('pages.pdf-to-jpg', [
                'uploaded_files'   => $urls,
                'api_response'     => $apiResponse,
                'download_urls'    => $downloadUrls,
                'selected_format'  => $imageFormat,
                'selected_quality' => $imageQuality,
                'selected_type'    => $conversionType,
            ])->render();

            return response()->json([
                'success' => true,
                'html'    => $html,
            ]);
        }

        return view('pages.pdf-to-jpg', [
            'uploaded_files'   => $urls,
            'api_response'     => $apiResponse,
            'download_urls'    => $downloadUrls,
            'selected_format'  => $imageFormat,
            'selected_quality' => $imageQuality,
            'selected_type'    => $conversionType,
        ]);
    }

    public function downloadFile(Request $request)
    {
        $downloadUrl = $request->input('download_url');
        $format      = $request->input('format', 'jpg');

        if (empty($downloadUrl)) {
            return abort(404, 'No download URL provided');
        }

        $contentType = match($format) {
            'png'   => 'image/png',
            'jpeg'  => 'image/jpeg',
            default => 'image/jpeg',
        };

        return response()->streamDownload(function () use ($downloadUrl) {
            $client   = new Client(['timeout' => 120, 'curl' => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4]]);
            $response = $client->get($downloadUrl, ['stream' => true]);
            $body     = $response->getBody();
            while (!$body->eof()) {
                echo $body->read(1024 * 32);
                if (connection_aborted()) break;
            }
        }, 'converted_' . time() . '.' . $format, [
            'Content-Type' => $contentType,
        ]);
    }
}
