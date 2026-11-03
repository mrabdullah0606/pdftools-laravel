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

class ProcessMergePdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 2;
    public int $timeout = 300;

    public function __construct(
        public readonly array  $fileUrls,
        public readonly string $mergeType,
        public readonly string $jobId,
        public readonly string $locale,
    ) {}

    public function handle(): void
    {
        Log::info('[ProcessMergePdfJob] Starting', ['job_id' => $this->jobId]);

        try {
            $client = new Client([
                'timeout'         => 300,
                'connect_timeout' => 10,
                'http_errors'     => false,
                'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
            ]);

            $payload = [
                'file_urls'          => $this->fileUrls,
                'merge_type'         => $this->mergeType,
                'request_secret_key' => 'Hira-unique-key-1',
            ];

            $response   = $client->post('https://pdfprocdn.com/api/merge_pdf', ['json' => $payload]);
            $statusCode = $response->getStatusCode();
            $apiData    = json_decode((string) $response->getBody(), true);

            if ($statusCode < 200 || $statusCode >= 300 || ! $apiData) {
                throw new \RuntimeException('Merge API returned status ' . $statusCode);
            }

            $mergedFiles = $this->normalizeFiles($apiData);

            if (empty($mergedFiles)) {
                throw new \RuntimeException('API returned no merged files.');
            }

            Cache::put('merge_job_' . $this->jobId, [
                'status'         => 'completed',
                'api_response'   => ['detail' => 'Merge successful', 'data' => $mergedFiles],
                'uploaded_files' => $this->fileUrls,
                'download_urls'  => array_column($mergedFiles, 'file_url'),
                'merge_type'     => $this->mergeType,
                'locale'         => $this->locale,
            ], now()->addMinutes(30));

            Log::info('[ProcessMergePdfJob] Done', ['job_id' => $this->jobId]);

        } catch (\Throwable $e) {
            Log::error('[ProcessMergePdfJob] Failed', ['job_id' => $this->jobId, 'error' => $e->getMessage()]);

            Cache::put('merge_job_' . $this->jobId, [
                'status' => 'failed',
                'error'  => 'Merge failed. Please try again.',
            ], now()->addMinutes(10));

            throw $e;
        }
    }

    public function failed(\Throwable $e): void
    {
        Cache::put('merge_job_' . $this->jobId, [
            'status' => 'failed',
            'error'  => 'Merge failed after multiple attempts. Please try again.',
        ], now()->addMinutes(10));
    }

    private function normalizeFiles(array $apiData): array
    {
        $files = [];

        if (! empty($apiData['download_urls'])) {
            foreach ($apiData['download_urls'] as $url) {
                $files[] = ['file_url' => $url, 'filename' => basename($url)];
            }
        } elseif (! empty($apiData['data']['successful_uploads'])) {
            foreach ($apiData['data']['successful_uploads'] as $upload) {
                $files[] = ['file_url' => $upload['file_url'] ?? null, 'filename' => $upload['filename'] ?? 'merged.pdf'];
            }
        } elseif (! empty($apiData['data']) && is_array($apiData['data'])) {
            foreach ($apiData['data'] as $item) {
                if (! empty($item['file_url'])) {
                    $files[] = ['file_url' => $item['file_url'], 'filename' => basename($item['file_url'])];
                }
            }
        }

        return $files;
    }
}
