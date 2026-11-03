<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WordConverterController extends Controller
{
    private string $apiKey  = 'Hira-unique-key-1';
    private string $apiBase = 'https://pdfprocdn.com/api/';

    public function index(Request $request)
    {
        $download_urls  = $request->input('download_urls') ?? session()->pull('word_download_urls');
        $uploaded_files = $request->input('uploaded_files') ?? session()->pull('word_uploaded_files');

        return view('pages.word-to-pdf', [
            'api_response'   => session()->pull('word_api_response'),
            'download_urls'  => $download_urls,
            'uploaded_files' => $uploaded_files,
            'is_processing'  => false,
            'job_id'         => null,
        ]);
    }

    public function convert(Request $request)
    {
        set_time_limit(600);

        Log::info('[WordConverterController] Conversion request received', [
            'files_count' => $request->hasFile('files') ? count($request->file('files')) : 0,
        ]);

        $locale = $request->route('locale') ?? app()->getLocale();

        try {
            $request->validate([
                'files'   => 'required|array|min:1',
                'files.*' => 'required|file|max:102400',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        }

        // Save uploaded files to public storage
        $storageDir = storage_path('app/public/uploads/words-input');
        if (! is_dir($storageDir)) {
            mkdir($storageDir, 0775, true);
        }

        $uploadedUrls = [];
        foreach ($request->file('files') as $file) {
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension    = $file->getClientOriginalExtension() ?: 'docx';
            $cleanName    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName);
            $filename     = time() . '_' . uniqid('', true) . '_' . $cleanName . '.' . $extension;
            $file->move($storageDir, $filename);
            $uploadedUrls[] = url('/storage/uploads/words-input/' . $filename);
        }

        Log::info('[WordConverterController] Files saved', ['count' => count($uploadedUrls)]);

        try {
            $fileUrls = $this->resolvePublicUrls($uploadedUrls);

            $client   = $this->buildClient();
            $response = $client->post($this->apiBase . 'word_to_pdf', [
                'json' => [
                    'file_urls'          => $fileUrls,
                    'request_secret_key' => $this->apiKey,
                ],
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            ]);

            $status = $response->getStatusCode();
            $body   = (string) $response->getBody();
            $data   = json_decode($body, true);

            Log::info('[WordConverterController] API response', [
                'status'  => $status,
                'preview' => substr($body, 0, 300),
            ]);

            if ($status < 200 || $status >= 300) {
                throw new \RuntimeException("API returned HTTP {$status}: " . substr($body, 0, 200));
            }

            $downloadUrls = $this->extractDownloadUrls($data ?? []);

            if (empty($downloadUrls)) {
                throw new \RuntimeException('API returned no converted files.');
            }

            $this->cleanupFiles($uploadedUrls);

            Log::info('[WordConverterController] Conversion successful', ['files' => count($downloadUrls)]);

            session([
                'word_api_response'   => $data,
                'word_uploaded_files' => $uploadedUrls,
                'word_download_urls'  => $downloadUrls,
            ]);

        } catch (\Throwable $e) {
            Log::error('[WordConverterController] Conversion failed', ['message' => $e->getMessage()]);
            $this->cleanupFiles($uploadedUrls);

            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Conversion failed. Please try again.'], 500);
            }
            return back()->withErrors(['api_error' => 'Conversion failed. Please try again.'])->withInput();
        }

        if ($request->ajax()) {
            $html = view('pages.word-to-pdf', [
                'uploaded_files' => $uploadedUrls,
                'download_urls'  => $downloadUrls,
'api_response'   => null,
                'is_processing'  => false,
                'job_id'         => null,
            ])->render();

            return response()->json([
                'success'       => true,
                'status'        => 'completed',
                'download_urls' => $downloadUrls,
                'html'          => $html,
            ]);
        }

        if ($locale && $locale !== 'en') {
            return redirect()->route('localized.word-to-pdf', [
                'locale'         => $locale,
                'download_urls'  => $downloadUrls,
                'uploaded_files' => $uploadedUrls,
            ]);
        }
        return redirect()->route('word-to-pdf', [
            'download_urls'  => $downloadUrls,
            'uploaded_files' => $uploadedUrls,
        ]);
    }

    public function checkStatus(Request $request)
    {
        return response()->json(['success' => false, 'status' => 'failed', 'message' => 'No active job.'], 400);
    }

    public function convertFromUrl(Request $request)
    {
        $request->validate([
            'file_urls'   => 'required|array|min:1',
            'file_urls.*' => 'required|url',
        ]);

        try {
            $client   = $this->buildClient();
            $response = $client->post($this->apiBase . 'word_to_pdf', [
                'json' => [
                    'file_urls'          => $request->input('file_urls'),
                    'request_secret_key' => $this->apiKey,
                ],
            ]);

            $data         = json_decode((string) $response->getBody(), true);
            $downloadUrls = $this->extractDownloadUrls($data ?? []);

            return response()->json(['success' => true, 'data' => $data, 'download_urls' => $downloadUrls]);

        } catch (\Throwable $e) {
            Log::error('[WordConverterController] convertFromUrl failed', ['message' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function downloadFile(Request $request)
    {
        $url = $request->input('download_url');
        if (! $url) {
            return abort(404);
        }

        // Local filesystem path
        if (str_starts_with($url, '/')) {
            return file_exists($url)
                ? response()->download($url, 'converted_' . time() . '.pdf')
                : abort(404);
        }

        if (str_starts_with($url, '//')) {
            $url = 'https:' . $url;
        }

        $client   = $this->buildClient();
        $response = $client->get($url, ['stream' => true]);
        $body     = $response->getBody();

        return response()->streamDownload(
            function () use ($body) {
                while (! $body->eof()) {
                    echo $body->read(65536);
                    flush();
                }
            },
            'converted_' . time() . '.pdf',
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="converted_' . time() . '.pdf"',
            ]
        );
    }

    // ── Private helpers ──────────────────────────────────────────────────────

    private function buildClient(): Client
    {
        return new Client([
            'timeout'         => 300,
            'connect_timeout' => 15,
            'verify'          => false,
            'http_errors'     => false,
            'headers'         => ['Accept' => 'application/json'],
        ]);
    }

    private function resolvePublicUrls(array $urls): array
    {
        return array_map(function (string $url): string {
            $host    = parse_url($url, PHP_URL_HOST) ?? '';
            $isLocal = in_array($host, ['127.0.0.1', 'localhost', '::1'], true)
                || str_starts_with($host, '192.168.')
                || str_starts_with($host, '10.');

            return $isLocal ? $this->uploadToTempPublic($url) : $url;
        }, $urls);
    }

    private function uploadToTempPublic(string $fileUrl): string
    {
        $filename = basename(parse_url($fileUrl, PHP_URL_PATH));
        $filePath = storage_path('app/public/uploads/words-input/' . $filename);

        try {
            return $this->uploadToTmpfilesOrg($filePath);
        } catch (\Throwable $e) {
            Log::warning('[WordConverterController] tmpfiles.org failed, trying transfer.sh', [
                'error' => $e->getMessage(),
            ]);
        }

        return $this->uploadToTransferSh($filePath);
    }

    private function uploadToTmpfilesOrg(string $filePath): string
    {
        Log::info('[WordConverterController] Uploading to tmpfiles.org', [
            'file' => basename($filePath),
            'size' => round(filesize($filePath) / 1024, 1) . ' KB',
        ]);

        $client   = new Client(['timeout' => 120, 'connect_timeout' => 15, 'verify' => false]);
        $response = $client->post('https://tmpfiles.org/api/v1/upload', [
            'multipart' => [[
                'name'     => 'file',
                'contents' => fopen($filePath, 'r'),
                'filename' => basename($filePath),
            ]],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        if (empty($data['status']) || $data['status'] !== 'success' || empty($data['data']['url'])) {
            throw new \RuntimeException('tmpfiles.org upload failed: ' . substr((string) $response->getBody(), 0, 200));
        }

        $url = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $data['data']['url']);
        Log::info('[WordConverterController] tmpfiles.org upload succeeded', ['url' => $url]);
        return $url;
    }

    private function uploadToTransferSh(string $filePath): string
    {
        Log::info('[WordConverterController] Uploading to transfer.sh', ['file' => basename($filePath)]);

        $client   = new Client(['timeout' => 120, 'connect_timeout' => 15, 'verify' => false]);
        $response = $client->put(
            'https://transfer.sh/' . rawurlencode(basename($filePath)),
            ['body' => fopen($filePath, 'r'), 'headers' => ['Content-Type' => 'application/octet-stream']]
        );

        $url = trim((string) $response->getBody());

        if (empty($url) || ! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \RuntimeException('transfer.sh returned invalid URL: ' . substr($url, 0, 200));
        }

        Log::info('[WordConverterController] transfer.sh upload succeeded', ['url' => $url]);
        return $url;
    }

    private function extractDownloadUrls(array $data): array
    {
        // 1. Top-level url or file_url
        if (! empty($data['url'])) {
            return [$data['url']];
        }
        if (! empty($data['file_url'])) {
            return [$data['file_url']];
        }

        // 2. data.url or data.file_url
        if (! empty($data['data']) && is_array($data['data'])) {
            if (! empty($data['data']['url'])) {
                return [$data['data']['url']];
            }
            if (! empty($data['data']['file_url'])) {
                return [$data['data']['file_url']];
            }
        }

        // 3. Shape 1: data.files[].url  (pdfprocdn standard response)
        if (! empty($data['data']['files']) && is_array($data['data']['files'])) {
            return array_values(array_filter(array_map(
                fn ($f) => $f['url'] ?? $f['file_url'] ?? null,
                $data['data']['files']
            )));
        }

        // 4. Shape 2: data.successful_uploads[].file_url
        if (! empty($data['data']['successful_uploads'])) {
            return array_values(array_filter(array_column($data['data']['successful_uploads'], 'file_url')));
        }

        // 5. Shape 3: data[].file_url  (flat array)
        if (! empty($data['data']) && is_array($data['data']) && isset($data['data'][0]['file_url'])) {
            return array_values(array_filter(array_column($data['data'], 'file_url')));
        }

        // 6. Shape 4: top-level download_urls
        if (! empty($data['download_urls']) && is_array($data['download_urls'])) {
            return array_values(array_filter($data['download_urls']));
        }

        // 7. top-level files (array of strings or arrays)
        if (! empty($data['files']) && is_array($data['files'])) {
            return array_values(array_filter(array_map(
                fn ($f) => is_array($f) ? ($f['url'] ?? $f['file_url'] ?? null) : $f,
                $data['files']
            )));
        }

        return [];
    }

    private function cleanupFiles(array $publicUrls): void
    {
        foreach ($publicUrls as $url) {
            try {
                $filename = basename(parse_url($url, PHP_URL_PATH));
                $path     = storage_path('app/public/uploads/words-input/' . $filename);
                if (file_exists($path)) {
                    @unlink($path);
                }
            } catch (\Throwable $e) {
                // silent
            }
        }
    }
}
