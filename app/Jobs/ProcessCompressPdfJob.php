<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class ProcessCompressPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 2;
    public int $timeout = 300;

    public function __construct(
        public readonly array  $fileUrls,
        public readonly string $compressionLevel,
        public readonly string $jobId,
        public readonly array  $originalSizes,
        public readonly string $locale,
    ) {}

    public function handle(): void
    {
        Log::info('[ProcessCompressPdfJob] Starting', ['job_id' => $this->jobId]);

        try {
            $client = new Client([
                'timeout'         => 120,
                'connect_timeout' => 10,
                'http_errors'     => false,
                'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
            ]);

            $payload = [
                'file_urls'          => $this->fileUrls,
                'compression_level'  => $this->compressionLevel,
                'request_secret_key' => 'Hira-unique-key-1',
            ];

            $response   = $client->post('https://pdfprocdn.com/api/pdf_compression', ['json' => $payload]);
            $statusCode = $response->getStatusCode();
            $apiData    = json_decode((string) $response->getBody(), true);

            if ($statusCode < 200 || $statusCode >= 300 || ! $apiData) {
                throw new \RuntimeException('API returned status ' . $statusCode);
            }

            $compressedFiles = $this->normalizeFiles($apiData);

            if (empty($compressedFiles)) {
                throw new \RuntimeException('API returned no compressed files.');
            }

            Cache::put('compress_job_' . $this->jobId, [
                'status'         => 'completed',
                'api_response'   => ['detail' => 'Compression successful', 'data' => $compressedFiles],
                'uploaded_files' => $this->fileUrls,
                'download_urls'  => array_column($compressedFiles, 'file_url'),
                'original_sizes' => $this->originalSizes,
                'locale'         => $this->locale,
            ], now()->addMinutes(30));

            Log::info('[ProcessCompressPdfJob] Done', ['job_id' => $this->jobId, 'files' => count($compressedFiles)]);

        } catch (\Throwable $e) {
            Log::error('[ProcessCompressPdfJob] Failed', ['job_id' => $this->jobId, 'error' => $e->getMessage()]);

            Cache::put('compress_job_' . $this->jobId, [
                'status' => 'failed',
                'error'  => 'Compression failed. Please try again.',
            ], now()->addMinutes(10));

            throw $e;
        }
    }

    public function failed(\Throwable $e): void
    {
        Cache::put('compress_job_' . $this->jobId, [
            'status' => 'failed',
            'error'  => 'Compression failed after multiple attempts. Please try again.',
        ], now()->addMinutes(10));
    }

    private function normalizeFiles(array $apiData): array
    {
        $files        = [];
        $sourceData   = $apiData['data']['successful_uploads'] ?? $apiData['data'] ?? [];
        $downloadUrls = $apiData['download_urls'] ?? [];

        if (! empty($downloadUrls) && is_array($downloadUrls)) {
            foreach ($downloadUrls as $i => $url) {
                $item    = $sourceData[$i] ?? [];
                $files[] = [
                    'file_url'        => $url,
                    'filename'        => $item['filename'] ?? basename($this->fileUrls[$i] ?? 'compressed.pdf'),
                    'compressed_size' => $item['compressed_size'] ?? $item['size'] ?? 0,
                    'original_size'   => $this->originalSizes[$i] ?? 0,
                ];
            }
        } elseif (is_array($sourceData)) {
            foreach ($sourceData as $i => $item) {
                if (! empty($item['file_url'])) {
                    $files[] = [
                        'file_url'        => $item['file_url'],
                        'filename'        => $item['filename'] ?? 'compressed.pdf',
                        'compressed_size' => $item['compressed_size'] ?? $item['size'] ?? 0,
                        'original_size'   => $this->originalSizes[$i] ?? 0,
                    ];
                }
            }
        }

        return $files;
    }
}
