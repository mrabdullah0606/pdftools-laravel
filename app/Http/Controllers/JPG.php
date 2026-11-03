<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JPG extends Controller
{
    // Show the Blade page
    public function index()
    {
        return view('pages.jpg-to-pdf');
    }

    // Handle JPG upload & send to external API
    public function jpg_to_pdf_final(Request $request)
    {
        // Validate files (up to 5 images, each max 25 MB)
        $request->validate([
            'files'   => 'required',
            'files.*' => 'mimes:jpg,jpeg,png|max:25600', // 25 MB per file
        ]);

        $httpRequest = Http::asMultipart();

        // Attach all files
        foreach ($request->file('files') as $file) {
            $httpRequest->attach('files[]', file_get_contents($file->getRealPath()), $file->getClientOriginalName());
        }

        // Send to API (you gave me this endpoint)
        $response = $httpRequest->post('http://63.250.41.43/api/jpdtopdf');

        if ($response->successful()) {
            $responseData = $response->json();

            return redirect()->back()->with('JPGTOPDF', [
                'downloadUrl' => 'http://63.250.41.43/downloadJPG/' . $responseData['originalName'],
            ]);
        } else {
            return back()->withErrors(['error' => 'Failed to convert JPG to PDF. Please try again.']);
        }
    }

    // Handle file download
    public function finaldownload(Request $request)
    {
        $url = $request->input('url');

        try {
            $fileContent = file_get_contents($url);

            if ($fileContent === false) {
                throw new \Exception("Unable to fetch the file content.");
            }

            $fileName = basename($url);

            return response($fileContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
        } catch (\Exception $e) {
            \Log::error('File download error:', [
                'url' => $url,
                'error_message' => $e->getMessage(),
            ]);

            return back()->withErrors(['message' => 'File download failed. Please try again.']);
        }
    }
}
