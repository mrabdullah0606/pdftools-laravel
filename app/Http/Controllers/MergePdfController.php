<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Utils as PromiseUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MergePdfController extends Controller
{
    private string $apiKey  = 'Hira-unique-key-1';
    private string $apiBase = 'https://pdfprocdn.com/api/';

    private function getGuzzleClient(): Client
    {
        return new Client([
            'timeout'         => 300,
            'connect_timeout' => 30,
            'http_errors'     => false,
            'verify'          => false,
            'curl'            => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
        ]);
    }

    protected function parseSizeToBytes(string $size): int
    {
        $size  = strtoupper(trim($size));
        $value = (float) $size;
        if (str_contains($size, 'GB')) return (int) ($value * 1024 * 1024 * 1024);
        if (str_contains($size, 'MB')) return (int) ($value * 1024 * 1024);
        if (str_contains($size, 'KB')) return (int) ($value * 1024);
        return (int) $value;
    }

    private function isLocalhost(): bool
    {
        $appUrl = config('app.url') ?? '';
        return str_contains($appUrl, 'localhost') || str_contains($appUrl, '127.0.0.1') || str_contains($appUrl, '::1');
    }

    public function index(Request $request)
    {
        Log::info('Merge PDF: Index method called');
        $download_urls  = $request->input('download_urls') ?? session()->pull('merge_download_urls');
        $uploaded_files = $request->input('uploaded_files') ?? session()->pull('merge_uploaded_files');

        return view('pages.merge-pdf', [
            'api_response'    => session()->pull('merge_api_response'),
            'download_urls'   => $download_urls,
            'uploaded_files'  => $uploaded_files,
            'selected_option' => session()->pull('merge_selected_option'),
        ]);
    }

    public function merge(Request $request)
    {
        set_time_limit(600);
        Log::info('=== PDF MERGE STARTED ===', ['files_count' => $request->hasFile('files') ? count($request->file('files')) : 0]);

        $locale = $request->route('locale') ?? app()->getLocale();

        try {
            $request->validate([
                'files'      => 'required|array|min:2',
                'files.*'    => 'required|file|mimes:pdf|max:102400',
                'merge_type' => 'required|in:all_pages,same_pages',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Merge PDF: Validation failed', ['errors' => $e->errors()]);
            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        }

        $storageDir = storage_path('app/public/uploads/pdfs');
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0775, true);
        }

        $uploadedUrls = [];
        $fileInfos    = [];

        foreach ($request->file('files') as $file) {
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $cleanName    = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName);
            $filename     = time() . '_' . uniqid('', true) . '_' . $cleanName . '.pdf';
            $file->move($storageDir, $filename);

            $localPath    = $storageDir . '/' . $filename;
            $publicUrl    = url('/storage/uploads/pdfs/' . $filename);
            $uploadedUrls[] = $publicUrl;

            $fileInfos[] = [
                'path'     => $localPath,
                'filename' => $filename,
                'mime'     => 'application/pdf',
            ];
        }

        Log::info('Merge: Saved files locally', ['count' => count($uploadedUrls)]);

        try {
            $fileUrls = $this->resolvePublicUrls($uploadedUrls);

            $client   = $this->getGuzzleClient();
            $response = $client->post($this->apiBase . 'merge_pdf', [
                'json' => [
                    'file_urls'          => $fileUrls,
                    'merge_type'         => $request->input('merge_type'),
                    'request_secret_key' => $this->apiKey,
                ],
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            ]);

            $status = $response->getStatusCode();
            $body   = (string) $response->getBody();
            $data   = json_decode($body, true);

            Log::info('Merge: API response received', [
                'status'  => $status,
                'preview' => substr($body, 0, 300),
            ]);

            if ($status < 200 || $status >= 300) {
                $detail = $data['detail'] ?? '';
                if ($status === 400 && str_contains($detail, 'exceeds')) {
                    throw new \RuntimeException('One or more files exceed the size limit.');
                }
                throw new \RuntimeException("API returned HTTP {$status}: " . substr($body, 0, 200));
            }

            $downloadUrls = $this->extractDownloadUrls($data ?? []);

            if (empty($downloadUrls)) {
                throw new \RuntimeException('API returned no converted files.');
            }

            $this->cleanupFiles($uploadedUrls);

            Log::info('Merge: Successful', ['files_count' => count($downloadUrls)]);

            session([
                'merge_api_response'    => $data,
                'merge_uploaded_files'  => $uploadedUrls,
                'merge_download_urls'   => $downloadUrls,
                'merge_selected_option' => $request->input('merge_type'),
            ]);

        } catch (\Throwable $e) {
            Log::error('Merge failed', ['message' => $e->getMessage()]);
            $this->cleanupFiles($uploadedUrls);

            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Merge failed. Please try again.'], 500);
            }
            return back()->withErrors(['api_error' => 'Merge failed: ' . $e->getMessage()])->withInput();
        }

        if ($request->ajax()) {
            $html = view('pages.merge-pdf', [
                'uploaded_files'  => $uploadedUrls,
                'download_urls'   => $downloadUrls,
                'api_response'    => null,
                'selected_option' => $request->input('merge_type'),
            ])->render();

            return response()->json([
                'success'       => true,
                'status'        => 'completed',
                'download_urls' => $downloadUrls,
                'html'          => $html,
            ]);
        }

        if ($locale && $locale !== 'en') {
            return redirect()->route('localized.merge-pdf', ['locale' => $locale]);
        }
        return redirect()->route('merge-pdf');
    }

    public function mergeFromUrl(Request $request)
    {
        $request->validate([
            'file_urls'   => 'required|array|min:2',
            'file_urls.*' => 'required|url',
            'merge_type'  => 'required|in:all_pages,same_pages',
        ]);

        try {
            $client   = $this->getGuzzleClient();
            $response = $client->post($this->apiBase . 'merge_pdf', [
                'json' => [
                    'file_urls'          => $request->input('file_urls'),
                    'merge_type'         => $request->input('merge_type'),
                    'request_secret_key' => $this->apiKey,
                ],
            ]);

            $data         = json_decode((string) $response->getBody(), true);
            $downloadUrls = $this->extractDownloadUrls($data ?? []);

            return response()->json(['success' => true, 'data' => $data, 'download_urls' => $downloadUrls]);

        } catch (\Throwable $e) {
            Log::error('mergeFromUrl failed', ['message' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function checkStatus(Request $request)
    {
        return response()->json(['success' => false, 'status' => 'failed', 'message' => 'No active job.'], 400);
    }

    public function downloadMergedFile(Request $request)
    {
        $url = $request->input('download_url');
        if (!$url) {
            return abort(404);
        }

        if (str_starts_with($url, '/')) {
            return file_exists($url)
                ? response()->download($url, 'merged_' . time() . '.pdf')
                : abort(404);
        }

        if (str_starts_with($url, '//')) {
            $url = 'https:' . $url;
        }

        $client   = $this->getGuzzleClient();
        $response = $client->get($url, ['stream' => true]);

        return response()->stream(function () use ($response) {
            $body = $response->getBody();
            while (!$body->eof()) {
                echo $body->read(1024);
            }
        }, 200, [
            'Content-Type'        => $response->getHeaderLine('Content-Type') ?: 'application/pdf',
            'Content-Disposition' => 'attachment; filename="merged_' . time() . '.pdf"',
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
        $filePath = storage_path('app/public/uploads/pdfs/' . $filename);

        try {
            return $this->uploadToFileIo($filePath);
        } catch (\Throwable $e) {
            Log::warning('Merge PDF: file.io failed, trying tmpfiles.org', ['error' => $e->getMessage()]);
        }

        return $this->uploadToTmpfilesOrg($filePath);
    }

    private function uploadToFileIo(string $filePath): string
    {
        Log::info('Merge PDF: Uploading to file.io', ['file' => basename($filePath)]);

        $client   = $this->getGuzzleClient();
        $response = $client->post('https://file.io', [
            'multipart' => [[
                'name'     => 'file',
                'contents' => fopen($filePath, 'r'),
                'filename' => basename($filePath),
            ]],
        ]);

        $body = (string) $response->getBody();
        $data = json_decode($body, true);

        if (empty($data['success']) || !$data['success'] || empty($data['link'])) {
            throw new \RuntimeException('file.io upload failed: ' . substr($body, 0, 200));
        }

        Log::info('Merge PDF: file.io upload succeeded', ['url' => $data['link']]);
        return $data['link'];
    }

    private function uploadToTmpfilesOrg(string $filePath): string
    {
        Log::info('Merge PDF: Uploading to tmpfiles.org', ['file' => basename($filePath)]);

        $client   = $this->getGuzzleClient();
        $response = $client->post('https://tmpfiles.org/api/v1/upload', [
            'multipart' => [[
                'name'     => 'file',
                'contents' => fopen($filePath, 'r'),
                'filename' => basename($filePath),
            ]],
        ]);

        $body = (string) $response->getBody();
        $data = json_decode($body, true);

        if (empty($data['status']) || $data['status'] !== 'success' || empty($data['data']['url'])) {
            throw new \RuntimeException('tmpfiles.org upload failed: ' . substr($body, 0, 200));
        }

        $url = str_replace('tmpfiles.org/', 'tmpfiles.org/dl/', $data['data']['url']);
        Log::info('Merge PDF: tmpfiles.org upload succeeded', ['url' => $url]);
        return $url;
    }

    private function extractDownloadUrls(array $data): array
    {
        if (!empty($data['url'])) return [$data['url']];
        if (!empty($data['file_url'])) return [$data['file_url']];

        if (!empty($data['data']) && is_array($data['data'])) {
            if (!empty($data['data']['url'])) return [$data['data']['url']];
            if (!empty($data['data']['file_url'])) return [$data['data']['file_url']];
        }

        if (!empty($data['data']['files']) && is_array($data['data']['files'])) {
            return array_values(array_filter(array_map(
                fn ($f) => $f['url'] ?? $f['file_url'] ?? null,
                $data['data']['files']
            )));
        }

        if (!empty($data['data']['successful_uploads'])) {
            return array_values(array_filter(array_column($data['data']['successful_uploads'], 'file_url')));
        }

        if (!empty($data['data']) && is_array($data['data']) && isset($data['data'][0]['file_url'])) {
            return array_values(array_filter(array_column($data['data'], 'file_url')));
        }

        if (!empty($data['download_urls']) && is_array($data['download_urls'])) {
            return array_values(array_filter($data['download_urls']));
        }

        if (!empty($data['files']) && is_array($data['files'])) {
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
                $path     = storage_path('app/public/uploads/pdfs/' . $filename);
                if (file_exists($path)) {
                    @unlink($path);
                }
            } catch (\Throwable $e) {
                // silent
            }
        }
    }
}
