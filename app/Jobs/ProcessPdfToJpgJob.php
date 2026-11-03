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

class ProcessPdfToJpgJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 2;
    public int $timeout = 300;

    public function __construct(
        public readonly array  $fileUrls,
        public readonly string $imageFormat,
        public readonly string $imageQuality,
        public readonly string $conversionType,
        public readonly string $jobId,
        public readonly string $locale,
    ) {}

    public function handle(): void
    {
        Log::info('[ProcessPdfToJpgJob] Starting', ['job_id' => $this->jobId]);

        try {
            $client = new Client([
                'timeout'         => 300,
                'connect_timeout' => 10,
                'http_errors'     => false,
                'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
            ]);

            $payload = [
                'file_urls'          => $this->fileUrls,
                'image_format'       => $this->imageFormat,
                'image_quality'      => $this->imageQuality,
                'conversion_type'    => $this->conversionType,
                'request_secret_key' => 'Hira-unique-key-1',
            ];

            $response   = $client->post('https://pdfprocdn.com/api/pdf_to_images', ['json' => $payload]);
            $statusCode = $response->getStatusCode();
            $apiData    = json_decode((string) $response->getBody(), true);

            if ($statusCode < 200 || $statusCode >= 300 || ! $apiData) {
                throw new \RuntimeException('PDF-to-JPG API returned status ' . $statusCode);
            }

            $downloadUrls    = $this->normalizeUrls($apiData);
            $convertedFiles  = array_map(fn($u) => ['file_url' => $u], $downloadUrls);

            if (empty($convertedFiles)) {
                throw new \RuntimeException('API returned no image files.');
            }

            Cache::put('jpg_job_' . $this->jobId, [
                'status'          => 'completed',
                'api_response'    => ['detail' => 'Conversion successful', 'data' => $convertedFiles],
                'uploaded_files'  => $this->fileUrls,
                'download_urls'   => $downloadUrls,
                'selected_format' => $this->imageFormat,
                'selected_quality'=> $this->imageQuality,
                'selected_type'   => $this->conversionType,
                'locale'          => $this->locale,
            ], now()->addMinutes(30));

            Log::info('[ProcessPdfToJpgJob] Done', ['job_id' => $this->jobId, 'images' => count($convertedFiles)]);

        } catch (\Throwable $e) {
            Log::error('[ProcessPdfToJpgJob] Failed', ['job_id' => $this->jobId, 'error' => $e->getMessage()]);

            Cache::put('jpg_job_' . $this->jobId, [
                'status' => 'failed',
                'error'  => 'Conversion failed. Please try again.',
            ], now()->addMinutes(10));

            throw $e;
        }
    }

    public function failed(\Throwable $e): void
    {
        Cache::put('jpg_job_' . $this->jobId, [
            'status' => 'failed',
            'error'  => 'Conversion failed after multiple attempts. Please try again.',
        ], now()->addMinutes(10));
    }

    private function normalizeUrls(array $apiData): array
    {
        if (! empty($apiData['download_urls'])) {
            return $apiData['download_urls'];
        }
        if (! empty($apiData['data']['images'])) {
            return array_column($apiData['data']['images'], 'file_url');
        }
        if (! empty($apiData['data']['download_urls'])) {
            return $apiData['data']['download_urls'];
        }
        return [];
    }
}
