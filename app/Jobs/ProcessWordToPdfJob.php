<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessWordToPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 2;
    public int $timeout = 300;

    public function __construct(
        public readonly array  $fileUrls,
        public readonly string $jobId,
        public readonly string $locale,
    ) {}

    public function handle(): void
    {
        Log::info('[ProcessWordToPdfJob] Starting', ['job_id' => $this->jobId]);

        try {
            $response = Http::timeout(240)->withHeaders([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ])->post('https://pdfprocdn.com/api/word_to_pdf', [
                'file_urls'          => $this->fileUrls,
                'request_secret_key' => 'Hira-unique-key-1',
            ]);

            if ($response->failed()) {
                throw new \RuntimeException('API returned status ' . $response->status() . ': ' . $response->body());
            }

            $responseData  = $response->json();
            $processedData = [];

            if (isset($responseData['data'])) {
                if (is_array($responseData['data']) && isset($responseData['data']['successful_uploads'])) {
                    $processedData = $responseData['data']['successful_uploads'];
                } elseif (is_array($responseData['data']) && ! empty($responseData['data']) && isset($responseData['data'][0]['file_url'])) {
                    $processedData = $responseData['data'];
                }
            }

            if (empty($processedData) && ! empty($responseData['download_urls'])) {
                foreach ($responseData['download_urls'] as $url) {
                    $processedData[] = ['file_url' => $url, 'filename' => basename($url)];
                }
            }

            $downloadUrls = isset($responseData['download_urls'])
                ? $responseData['download_urls']
                : array_column($processedData, 'file_url');

            if (empty($downloadUrls)) {
                throw new \RuntimeException('API returned no converted files.');
            }

            $finalResponse         = $responseData;
            $finalResponse['data'] = $processedData;

            Cache::put('word_pdf_job_' . $this->jobId, [
                'status'         => 'completed',
                'api_response'   => $finalResponse,
                'uploaded_files' => $this->fileUrls,
                'download_urls'  => $downloadUrls,
                'locale'         => $this->locale,
            ], now()->addMinutes(30));

            Log::info('[ProcessWordToPdfJob] Done', ['job_id' => $this->jobId]);

        } catch (\Throwable $e) {
            Log::error('[ProcessWordToPdfJob] Failed', ['job_id' => $this->jobId, 'error' => $e->getMessage()]);

            Cache::put('word_pdf_job_' . $this->jobId, [
                'status' => 'failed',
                'error'  => 'Conversion failed. Please try again.',
            ], now()->addMinutes(10));

            throw $e;
        }
    }

    public function failed(\Throwable $e): void
    {
        Cache::put('word_pdf_job_' . $this->jobId, [
            'status' => 'failed',
            'error'  => 'Conversion failed after multiple attempts. Please try again.',
        ], now()->addMinutes(10));
    }
}
