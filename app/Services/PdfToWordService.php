<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * PdfToWordService
 *
 * Encapsulates all communication with the pdfprocdn.com API.
 * Provides clean, reusable methods for conversion, file management, and streaming.
 */
class PdfToWordService
{
    protected string $apiKey  = 'Hira-unique-key-1';
    protected string $apiBase = 'https://pdfprocdn.com/api/';

    protected Client $client;

    public function __construct()
    {
        $this->client = $this->buildClient();
    }

    /**
     * Build a shared Guzzle client with RetryMiddleware (exponential backoff)
     * and optimized connection settings for large PDF payloads.
     */
    protected function buildClient(): Client
    {
        // Decide whether to retry a request
        $decider = function (
            int               $retries,
            RequestInterface  $request,
            ?ResponseInterface $response  = null,
            ?\Throwable       $exception  = null
        ): bool {
            // Never exceed 3 attempts total
            if ($retries >= 3) {
                return false;
            }

            // Always retry on connection failures
            if ($exception instanceof ConnectException) {
                return true;
            }

            // Retry on server-side errors (5xx)
            if ($response !== null && $response->getStatusCode() >= 500) {
                return true;
            }

            return false;
        };

        // Exponential backoff: 500ms → 1s → 2s
        $delay = fn (int $retries): int => (int) (500 * (2 ** ($retries - 1)));

        $stack = HandlerStack::create();
        $stack->push(Middleware::retry($decider, $delay));

        return new Client([
            'handler'         => $stack,
            'timeout'         => 600,   // 10 minutes — handles very large files
            'connect_timeout' => 10,    // Fail fast on bad connections
            'http_errors'     => false, // Handle non-2xx manually
            'verify'          => false, // Skip SSL verification for speed
            'headers'         => [
                'Connection' => 'keep-alive',
                'Accept'     => 'application/json',
            ],
        ]);
    }

    // ──────────────────────────────────────────────────────────────────────────
    // File Management
    // ──────────────────────────────────────────────────────────────────────────

    /**
     * Save uploaded PDF files to public storage and return their public URLs.
     *
     * @param  \Illuminate\Http\UploadedFile[]  $files
     * @return string[]  Public URLs accessible by the external API
     */
    public function saveUploadedFiles(array $files): array
    {
        $uploadPath = storage_path('app/public/uploads/pdfs');

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $urls = [];

        foreach ($files as $file) {
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension    = $file->getClientOriginalExtension() ?: 'pdf';
            $cleanName    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName);
            $filename     = time() . '_' . uniqid('', true) . '_' . $cleanName . '.' . $extension;

            $file->move($uploadPath, $filename);

            $urls[] = url('/storage/uploads/pdfs/' . $filename);
        }

        return $urls;
    }

    /**
     * Delete temporary PDF files from storage after conversion.
     *
     * @param  string[]  $publicUrls
     */
    public function cleanupFiles(array $publicUrls): void
    {
        foreach ($publicUrls as $url) {
            try {
                $filename = basename(parse_url($url, PHP_URL_PATH));
                $path     = storage_path('app/public/uploads/pdfs/' . $filename);

                if (file_exists($path)) {
                    @unlink($path);
                }
            } catch (\Throwable $e) {
                Log::warning('[PdfToWordService] Cleanup failed for: ' . $url);
            }
        }
    }

    // ──────────────────────────────────────────────────────────────────────────
    // API Communication
    // ──────────────────────────────────────────────────────────────────────────

    /**
     * Convert a batch of PDF files to Word using the pdfprocdn.com API.
     *
     * Auto-detects local/private URLs (127.0.0.1, localhost) and switches to
     * direct multipart file upload so local dev works without a tunnel.
     * On production (public URLs) it uses the faster URL-based approach.
     *
     * @param  string[]  $fileUrls  Public URLs or local storage URLs of the PDFs
     * @param  string    $format    Output format: 'docx' or 'doc'
     * @return array     Normalized result: [['file_url' => 'https://...'], ...]
     *
     * @throws \RuntimeException  When the API fails after all retry attempts
     */
    public function convert(array $fileUrls, string $format = 'docx'): array
    {
        if ($this->hasLocalUrls($fileUrls)) {
            // Local dev: the external API can't reach 127.0.0.1 — upload bytes directly
            $paths = $this->localUrlsToFilePaths($fileUrls);
            return $this->convertByFilePaths($paths, $format);
        }

        return $this->convertByUrls($fileUrls, $format);
    }

    // Detect localhost / private-network URLs
    private function hasLocalUrls(array $urls): bool
    {
        foreach ($urls as $url) {
            $host = parse_url($url, PHP_URL_HOST) ?? '';
            if (in_array($host, ['127.0.0.1', 'localhost', '::1'], true)
                || str_starts_with($host, '192.168.')
                || str_starts_with($host, '10.')
            ) {
                return true;
            }
        }
        return false;
    }

    // Re-derive the storage path from a local storage URL
    private function localUrlsToFilePaths(array $urls): array
    {
        return array_map(function (string $url): string {
            $filename = basename(parse_url($url, PHP_URL_PATH));
            return storage_path('app/public/uploads/pdfs/' . $filename);
        }, $urls);
    }

    // Upload each file to a temp public host, then use URL-based conversion flow
    private function convertByFilePaths(array $filePaths, string $format): array
    {
        $publicUrls = [];

        foreach ($filePaths as $path) {
            if (! file_exists($path)) {
                throw new \RuntimeException('Source PDF not found: ' . basename($path));
            }
            $publicUrls[] = $this->uploadToTempPublic($path);
        }

        Log::info('[PdfToWordService] Files staged on temp host for local dev', [
            'count' => count($publicUrls),
        ]);

        return $this->convertByUrls($publicUrls, $format);
    }

    // Try tmpfiles.org first, fall back to transfer.sh
    private function uploadToTempPublic(string $filePath): string
    {
        try {
            return $this->uploadToTmpfilesOrg($filePath);
        } catch (\Throwable $e) {
            Log::warning('[PdfToWordService] tmpfiles.org failed, trying transfer.sh', [
                'error' => $e->getMessage(),
            ]);
        }

        return $this->uploadToTransferSh($filePath);
    }

    private function uploadToTmpfilesOrg(string $filePath): string
    {
        Log::info('[PdfToWordService] Uploading to tmpfiles.org', [
            'file' => basename($filePath),
            'size' => round(filesize($filePath) / 1024, 1) . ' KB',
        ]);

        $tempClient = new \GuzzleHttp\Client([
            'timeout'         => 120,
            'connect_timeout' => 15,
            'verify'          => false,
        ]);

        $response = $tempClient->post('https://tmpfiles.org/api/v1/upload', [
            'multipart' => [[
                'name'     => 'file',
                'contents' => fopen($filePath, 'r'),
                'filename' => basename($filePath),
                'headers'  => ['Content-Type' => 'application/pdf'],
            ]],
        ]);

        $body = (string) $response->getBody();
        $data = json_decode($body, true);

        if (empty($data['status']) || $data['status'] !== 'success' || empty($data['data']['url'])) {
            throw new \RuntimeException('tmpfiles.org upload failed: ' . substr($body, 0, 200));
        }

        // Convert page URL to direct download URL:
        // https://tmpfiles.org/1234/file.pdf  →  https://tmpfiles.org/dl/1234/file.pdf
        $url = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $data['data']['url']);

        Log::info('[PdfToWordService] tmpfiles.org upload succeeded', ['url' => $url]);

        return $url;
    }

    private function uploadToTransferSh(string $filePath): string
    {
        Log::info('[PdfToWordService] Uploading to transfer.sh', [
            'file' => basename($filePath),
            'size' => round(filesize($filePath) / 1024, 1) . ' KB',
        ]);

        $tempClient = new \GuzzleHttp\Client([
            'timeout'         => 120,
            'connect_timeout' => 15,
            'verify'          => false,
        ]);

        $response = $tempClient->put(
            'https://transfer.sh/' . rawurlencode(basename($filePath)),
            [
                'body'    => fopen($filePath, 'r'),
                'headers' => ['Content-Type' => 'application/pdf'],
            ]
        );

        $url = trim((string) $response->getBody());

        if (empty($url) || ! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \RuntimeException('transfer.sh returned invalid URL: ' . substr($url, 0, 200));
        }

        Log::info('[PdfToWordService] transfer.sh upload succeeded', ['url' => $url]);

        return $url;
    }

    // Standard URL-based conversion (production)
    private function convertByUrls(array $fileUrls, string $format): array
    {
        $payload = [
            'file_urls'          => $fileUrls,
            'output_format'      => '.' . ltrim($format, '.'),
            'request_secret_key' => $this->apiKey,
        ];

        Log::info('[PdfToWordService] URL-based conversion request', [
            'file_count' => count($fileUrls),
            'format'     => $format,
        ]);

        return $this->callApi(['json' => $payload, 'headers' => ['Content-Type' => 'application/json']]);
    }

    // Shared API call + response handling
    private function callApi(array $guzzleOptions): array
    {
        try {
            $response   = $this->client->post($this->apiBase . 'pdf_to_word', $guzzleOptions);
            $statusCode = $response->getStatusCode();
            $body       = (string) $response->getBody();

            Log::info('[PdfToWordService] API response received', [
                'status'  => $statusCode,
                'preview' => substr($body, 0, 300),
            ]);

            if ($statusCode < 200 || $statusCode >= 300) {
                throw new \RuntimeException(
                    "API returned HTTP {$statusCode}: " . substr($body, 0, 200)
                );
            }

            $data = json_decode($body, true);

            if (! is_array($data)) {
                throw new \RuntimeException('API returned an unparsable non-JSON response.');
            }

            $normalized = $this->normalizeResponse($data);

            Log::info('[PdfToWordService] Conversion successful', [
                'converted_files' => count($normalized),
            ]);

            return $normalized;

        } catch (RequestException $e) {
            Log::error('[PdfToWordService] Guzzle request exception', [
                'message' => $e->getMessage(),
            ]);
            throw new \RuntimeException(
                'Conversion API request failed: ' . $e->getMessage(), 0, $e
            );
        }
    }

    /**
     * Normalize different API response structures into a consistent format.
     *
     * Supported response shapes:
     *   - { download_urls: ['https://...'] }
     *   - { data: { successful_uploads: [{ file_url: '...' }] } }
     *   - { data: [{ file_url: '...' }] }
     *
     * @return array  [['file_url' => 'https://...'], ...]
     */
    public function normalizeResponse(array $apiResponse): array
    {
        $files = [];

        // Shape 1: top-level download_urls array
        if (! empty($apiResponse['download_urls']) && is_array($apiResponse['download_urls'])) {
            foreach ($apiResponse['download_urls'] as $url) {
                if (is_string($url) && ! empty($url)) {
                    $files[] = ['file_url' => $url];
                }
            }
            return $files;
        }

        // Shape 2: data.successful_uploads
        if (! empty($apiResponse['data']['successful_uploads']) && is_array($apiResponse['data']['successful_uploads'])) {
            foreach ($apiResponse['data']['successful_uploads'] as $upload) {
                if (! empty($upload['file_url'])) {
                    $files[] = ['file_url' => $upload['file_url']];
                }
            }
            return $files;
        }

        // Shape 3: data as flat array of file objects
        if (! empty($apiResponse['data']) && is_array($apiResponse['data'])) {
            // Shape 3a: data.files[].url  (e.g. pdfprocdn response)
            if (! empty($apiResponse['data']['files']) && is_array($apiResponse['data']['files'])) {
                foreach ($apiResponse['data']['files'] as $item) {
                    $url = $item['url'] ?? $item['file_url'] ?? null;
                    if (! empty($url)) {
                        $files[] = ['file_url' => $url];
                    }
                }
                return $files;
            }

            // Shape 3b: data as flat array of file objects with file_url key
            foreach ($apiResponse['data'] as $item) {
                if (is_array($item) && ! empty($item['file_url'])) {
                    $files[] = ['file_url' => $item['file_url']];
                }
            }
        }

        return $files;
    }

    // ──────────────────────────────────────────────────────────────────────────
    // Streaming Download
    // ──────────────────────────────────────────────────────────────────────────

    /**
     * Stream a converted file from an external CDN URL back to the browser.
     * Transfers in 64KB chunks — never loads the full file into PHP memory.
     *
     * @param  string  $externalUrl  The CDN URL of the converted Word document
     * @param  string  $filename     The filename to use in Content-Disposition
     */
    public function streamDownload(string $externalUrl, string $filename): StreamedResponse
    {
        $client = $this->client;

        return response()->streamDownload(
            function () use ($externalUrl, $client) {
                try {
                    $response = $client->get($externalUrl, ['stream' => true]);
                    $body     = $response->getBody();

                    while (! $body->eof()) {
                        echo $body->read(65536); // 64KB per chunk
                        flush();
                    }
                } catch (\Throwable $e) {
                    Log::error('[PdfToWordService] Stream download failed', [
                        'url'     => $externalUrl,
                        'message' => $e->getMessage(),
                    ]);
                }
            },
            $filename,
            [
                'Content-Type'        => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );
    }
}
