<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Merge extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'pdf_files.*' => 'required|file|mimes:pdf',
        ]);
    
        $client = new Client();
        $files = $request->file('pdf_files');
        
        $multipart = [];
        foreach ($files as $file) {
            $multipart[] = [
                'name' => 'pdf_files[]',
                'contents' => fopen($file->getPathname(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ];
        }
    
        $response = $client->post('http://63.250.41.43/api/mergepdf', [
            'multipart' => $multipart,
        ]);
    
        return response()->json(['message' => 'Files sent to Python backend', 'response' => json_decode($response->getBody())]);
    }
}
