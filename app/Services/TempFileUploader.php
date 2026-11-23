<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils as PromiseUtils;
use Illuminate\Support\Facades\Log;

class TempFileUploader
{
    protected static function log(string $level, string $message, array $context = []): void
    {
        try {
            Log::$level($message, $context);
        } catch (\Throwable $e) {
            // Silently ignore if logging facade not booted
        }
    }
    protected static function getClient(int $timeout = 60): Client
    {
        return new Client([
            'timeout'         => $timeout,
            'connect_timeout' => 15,
            'verify'          => false,
            'http_errors'     => false,
            'curl'            => [defined('CURLOPT_IPRESOLVE') ? CURLOPT_IPRESOLVE : 113 => 1], // IPv4
        ]);
    }

    /**
     * Upload a single local file to a temporary public host and return direct download URL.
     */
    public static function upload(string $filePath, ?string $filename = null, ?string $mime = null): ?string
    {
        if (! file_exists($filePath)) {
            self::log('error', "[TempFileUploader] File does not exist: {$filePath}");
            return null;
        }

        $filename = $filename ?: basename($filePath);
        $client   = self::getClient(120);

        try {
            self::log('info', "[TempFileUploader] Uploading to tmpfiles.org", ['file' => $filename]);

            $response = $client->post('https://tmpfiles.org/api/v1/upload', [
                'multipart' => [[
                    'name'     => 'file',
                    'contents' => fopen($filePath, 'r'),
                    'filename' => $filename,
                    'headers'  => $mime ? ['Content-Type' => $mime] : [],
                ]],
            ]);

            $body = (string) $response->getBody();
            $data = json_decode($body, true);

            if (! empty($data['status']) && $data['status'] === 'success' && ! empty($data['data']['url'])) {
                $pageUrl = $data['data']['url'];

                // Fetch page to extract the direct tokenized download link
                $pageResponse = $client->get($pageUrl);
                $html = (string) $pageResponse->getBody();

                if (preg_match('/<a[^>]+href=["\'](https:\/\/tmpfiles\.org\/dl\/[^"\']+)["\']/i', $html, $matches)) {
                    $directUrl = $matches[1];
                    self::log('info', "[TempFileUploader] Extracted direct download URL", ['url' => $directUrl]);
                    return $directUrl;
                }

                // Fallback if regex didn't match (e.g. if URL pattern changes)
                $fallbackUrl = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $pageUrl);
                self::log('warning', "[TempFileUploader] Regex did not match download link, using fallback", ['url' => $fallbackUrl]);
                return $fallbackUrl;
            }

            self::log('warning', "[TempFileUploader] tmpfiles.org unexpected response", ['body' => substr($body, 0, 300)]);
        } catch (\Throwable $e) {
            self::log('error', "[TempFileUploader] Upload to tmpfiles.org failed: " . $e->getMessage());
        }

        return null;
    }

    /**
     * Upload multiple files in parallel and return direct download URLs in matching order.
     *
     * @param array $fileInfos Array of ['path' => ..., 'filename' => ..., 'mime' => ...]
     * @return array Array of URLs (null on failure)
     */
    public static function uploadMultiple(array $fileInfos): array
    {
        $client   = self::getClient(90);
        $promises = [];

        foreach ($fileInfos as $i => $info) {
            $path     = $info['path'] ?? $info['filepath'] ?? null;
            $filename = $info['filename'] ?? ($path ? basename($path) : "file_{$i}");
            $mime     = $info['mime'] ?? 'application/octet-stream';

            if (! $path || ! file_exists($path)) {
                $promises[$i] = null;
                continue;
            }

            $promises[$i] = $client->postAsync('https://tmpfiles.org/api/v1/upload', [
                'multipart' => [[
                    'name'     => 'file',
                    'contents' => fopen($path, 'r'),
                    'filename' => $filename,
                    'headers'  => ['Content-Type' => $mime],
                ]],
            ]);
        }

        $results = PromiseUtils::settle(array_filter($promises))->wait();
        $pageUrls = [];

        foreach ($promises as $i => $promise) {
            if (! isset($results[$i]) || $results[$i]['state'] !== 'fulfilled') {
                $pageUrls[$i] = null;
                continue;
            }

            $body = (string) $results[$i]['value']->getBody();
            $data = json_decode($body, true);
            $pageUrls[$i] = (! empty($data['data']['url'])) ? $data['data']['url'] : null;
        }

        // Now fetch pages in parallel to extract direct download URLs
        $pagePromises = [];
        foreach ($pageUrls as $i => $pageUrl) {
            if ($pageUrl) {
                $pagePromises[$i] = $client->getAsync($pageUrl);
            } else {
                $pagePromises[$i] = null;
            }
        }

        $pageResults = PromiseUtils::settle(array_filter($pagePromises))->wait();
        $directUrls  = [];

        foreach ($pageUrls as $i => $pageUrl) {
            if (! $pageUrl || ! isset($pageResults[$i]) || $pageResults[$i]['state'] !== 'fulfilled') {
                // If page fetch failed, try fallback
                $directUrls[$i] = $pageUrl ? str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $pageUrl) : null;
                continue;
            }

            $html = (string) $pageResults[$i]['value']->getBody();
            if (preg_match('/<a[^>]+href=["\'](https:\/\/tmpfiles\.org\/dl\/[^"\']+)["\']/i', $html, $matches)) {
                $directUrls[$i] = $matches[1];
            } else {
                $directUrls[$i] = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $pageUrl);
            }
        }

        return $directUrls;
    }
}
