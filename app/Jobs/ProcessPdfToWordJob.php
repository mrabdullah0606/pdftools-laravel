<?php

namespace App\Jobs;

use App\Services\PdfToWordService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * ProcessPdfToWordJob
 *
 * Handles PDF → Word conversion asynchronously via Laravel's queue system.
 * This eliminates PHP request timeouts for large files and batch processing.
 *
 * Flow:
 *   1. Controller saves PDFs, dispatches this job, redirects immediately.
 *   2. Queue worker picks up the job and calls the API in the background.
 *   3. Result (success or failure) is stored in Laravel Cache keyed by $jobId.
 *   4. Frontend polls /pdf-to-word/check-status until status is 'completed'.
 *   5. On completion, frontend reloads — controller reads from Cache and renders results.
 */
class ProcessPdfToWordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Maximum number of attempts before the job is marked as permanently failed.
     * The RetryMiddleware inside PdfToWordService handles per-request retries (3x),
     * so this controls full job-level retries.
     */
    public int $tries = 2;

    /**
     * Maximum seconds this job may run before it is considered timed out.
     * Set to 10 minutes to comfortably handle very large PDF files.
     */
    public int $timeout = 600;

    /**
     * @param  string[]  $fileUrls      Public URLs of the uploaded source PDFs
     * @param  string    $format        Output format ('docx' or 'doc')
     * @param  string    $jobId         Unique identifier — used as the Cache key
     * @param  string[]  $uploadedUrls  Same as $fileUrls; kept separate for display
     * @param  string    $locale        Active locale for the redirect on completion
     */
    public function __construct(
        public readonly array  $fileUrls,
        public readonly string $format,
        public readonly string $jobId,
        public readonly array  $uploadedUrls,
        public readonly string $locale,
    ) {}

    /**
     * Execute the job: convert PDFs via the API and cache the result.
     */
    public function handle(PdfToWordService $service): void
    {
        Log::info('[ProcessPdfToWordJob] Starting', [
            'job_id'     => $this->jobId,
            'file_count' => count($this->fileUrls),
            'format'     => $this->format,
        ]);

        try {
            $convertedFiles = $service->convert($this->fileUrls, $this->format);

            if (empty($convertedFiles)) {
                throw new \RuntimeException(
                    'API completed successfully but returned no converted files.'
                );
            }

            $downloadUrls = array_column($convertedFiles, 'file_url');

            $result = [
                'status'         => 'completed',
                'api_response'   => [
                    'detail' => 'Conversion successful',
                    'data'   => $convertedFiles,
                ],
                'uploaded_files' => $this->uploadedUrls,
                'download_urls'  => $downloadUrls,
                'locale'         => $this->locale,
            ];

            Cache::put('ptw_job_' . $this->jobId, $result, now()->addMinutes(30));

            Log::info('[ProcessPdfToWordJob] Completed successfully', [
                'job_id'          => $this->jobId,
                'converted_count' => count($convertedFiles),
            ]);

            // Clean up source files only on success — retries need the files to still exist
            $service->cleanupFiles($this->uploadedUrls);

        } catch (\Throwable $e) {
            Log::error('[ProcessPdfToWordJob] Conversion failed', [
                'job_id'  => $this->jobId,
                'message' => $e->getMessage(),
                'attempt' => $this->attempts(),
            ]);

            // Write failed state so the polling frontend shows an error immediately.
            // If there are retries remaining Laravel will call handle() again with the
            // files still on disk (no cleanup yet), so the next attempt can try again.
            Cache::put('ptw_job_' . $this->jobId, [
                'status' => 'failed',
                'error'  => 'Conversion failed. Please try again.',
            ], now()->addMinutes(30));

            // Re-throw so Laravel honours the $tries count
            throw $e;
        }
        // No finally block — cleanup is intentionally deferred to success or failed()
    }

    /**
     * Called by Laravel after ALL retry attempts are exhausted.
     * Safe to clean up files here because no more retries will run.
     */
    public function failed(\Throwable $e): void
    {
        Log::error('[ProcessPdfToWordJob] Permanently failed after all attempts', [
            'job_id'  => $this->jobId,
            'message' => $e->getMessage(),
        ]);

        Cache::put('ptw_job_' . $this->jobId, [
            'status' => 'failed',
            'error'  => 'Conversion failed after multiple attempts. Please try again.',
        ], now()->addMinutes(30));

        // Clean up here since handle() no longer has a finally block
        app(PdfToWordService::class)->cleanupFiles($this->uploadedUrls);
    }
}
