<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ConverterController extends Controller
{

    public function convertFile(Request $request)
    {
        try {
            // Debug logging
            Log::info('PDF Convert Request Started', [
                'request_method' => $request->method(),
                'has_file' => $request->hasFile('files'), // Check both ways
                'has_single_file' => $request->hasFile('fileInput'),
                'all_files' => $request->allFiles(),
                'form_data' => $request->except(['files'])
            ]);

            // Handle both single file and multiple files
            $files = [];
            
            // Check for files[] (from JavaScript FormData)
            if ($request->hasFile('files')) {
                $files = $request->file('files');
            }
            // Check for single file upload
            else if ($request->hasFile('fileInput')) {
                $files = [$request->file('fileInput')];
            }
            // Check for any file input
            else {
                $allFiles = $request->allFiles();
                if (!empty($allFiles)) {
                    $files = array_values($allFiles)[0]; // Get first file array
                    if (!is_array($files)) {
                        $files = [$files]; // Convert single file to array
                    }
                }
            }

            if (empty($files)) {
                Log::error('No files found in request');
                return response()->json([
                    'success' => false,
                    'message' => 'Koi file upload nahi hui. Please file select kariye.'
                ], 400);
            }

            // Convert to array if single file
            if (!is_array($files)) {
                $files = [$files];
            }

            // Validate files
            foreach ($files as $file) {
                $validator = Validator::make(['file' => $file], [
                    'file' => 'required|file|mimes:pdf|max:51200' // 50MB max
                ]);

                if ($validator->fails()) {
                    Log::error('File Validation Failed', [
                        'file_name' => $file->getClientOriginalName(),
                        'errors' => $validator->errors()->toArray()
                    ]);
                    return response()->json([
                        'success' => false,
                        'message' => 'File validation error: ' . $validator->errors()->first(),
                        'errors' => $validator->errors()
                    ], 422);
                }
            }

            // External API URL
            $apiUrl = 'http://63.250.41.43/api/convertPdfToWord';
            $convertedFiles = [];

            // Process each file
            foreach ($files as $index => $file) {
                
                Log::info("Processing File #{$index}", [
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime_type' => $file->getMimeType(),
                    'path' => $file->getRealPath()
                ]);

                $fileName = $file->getClientOriginalName();
                $fileContent = file_get_contents($file->getRealPath());
                
                if (!$fileContent) {
                    Log::error("Could not read file content for: {$fileName}");
                    continue;
                }

                // Make API request with proper error handling
                try {
                    $response = Http::timeout(180) // 3 minutes timeout
                        ->retry(2, 2000) // Retry 2 times with 2 second delay
                        ->attach('pdf', $fileContent, $fileName)
                        ->post($apiUrl);

                    Log::info('External API Response', [
                        'status' => $response->status(),
                        'headers' => $response->headers(),
                        'response_size' => strlen($response->body()),
                        'file_processed' => $fileName
                    ]);

                    if ($response->successful()) {
                        $responseData = $response->json();
                        
                        Log::info('API Response Data', [
                            'response_structure' => $responseData,
                            'data_exists' => isset($responseData['data']),
                            'data_type' => isset($responseData['data']) ? gettype($responseData['data']) : 'not_set'
                        ]);

                        // Process the API response - Enhanced handling
                        if (isset($responseData['data']) && is_array($responseData['data'])) {
                            foreach ($responseData['data'] as $dataItem) {
                                if (isset($dataItem['Result'])) {
                                    $convertedFiles[] = [
                                        'convertedFilePath' => $dataItem['Result'],
                                        'originalFileName' => $fileName,
                                        'downloadUrl' => $dataItem['Result']
                                    ];
                                    
                                    Log::info('File conversion successful', [
                                        'original' => $fileName,
                                        'converted_path' => $dataItem['Result']
                                    ]);
                                }
                            }
                        } 
                        // Handle direct Result in response
                        else if (isset($responseData['Result'])) {
                            $convertedFiles[] = [
                                'convertedFilePath' => $responseData['Result'],
                                'originalFileName' => $fileName,
                                'downloadUrl' => $responseData['Result']
                            ];
                            
                            Log::info('File conversion successful (direct result)', [
                                'original' => $fileName,
                                'converted_path' => $responseData['Result']
                            ]);
                        }
                        // Handle case where response has download link
                        else if (isset($responseData['download_link'])) {
                            $convertedFiles[] = [
                                'convertedFilePath' => $responseData['download_link'],
                                'originalFileName' => $fileName,
                                'downloadUrl' => $responseData['download_link']
                            ];
                        }
                        // Handle success with message but no direct download
                        else if (isset($responseData['success']) && $responseData['success']) {
                            // Sometimes API returns success without direct download link
                            $convertedFiles[] = [
                                'convertedFilePath' => 'generated', // Placeholder
                                'originalFileName' => $fileName,
                                'downloadUrl' => '#', // Will be handled by frontend
                                'message' => $responseData['message'] ?? 'Conversion successful'
                            ];
                        }
                        else {
                            Log::warning('Unexpected API response structure', [
                                'response' => $responseData,
                                'file' => $fileName
                            ]);
                            
                            // Try to extract any URL-like string from response
                            $responseString = json_encode($responseData);
                            if (preg_match('/https?:\/\/[^\s"]+/', $responseString, $matches)) {
                                $convertedFiles[] = [
                                    'convertedFilePath' => $matches[0],
                                    'originalFileName' => $fileName,
                                    'downloadUrl' => $matches[0]
                                ];
                            }
                        }
                        
                    } else {
                        // API returned error
                        Log::error('External API Error', [
                            'status' => $response->status(),
                            'response_body' => $response->body(),
                            'file' => $fileName
                        ]);

                        return response()->json([
                            'success' => false,
                            'message' => "External API error (Status: {$response->status()}). Service temporarily unavailable.",
                            'debug_info' => [
                                'api_status' => $response->status(),
                                'api_response' => $response->body()
                            ]
                        ], 500);
                    }

                } catch (\Illuminate\Http\Client\RequestException $e) {
                    Log::error('HTTP Request Exception', [
                        'message' => $e->getMessage(),
                        'file' => $fileName
                    ]);
                    
                    return response()->json([
                        'success' => false,
                        'message' => 'Network error: Could not connect to conversion service. Please try again.'
                    ], 500);
                } catch (\Exception $e) {
                    Log::error('File Processing Exception', [
                        'message' => $e->getMessage(),
                        'file' => $fileName,
                        'line' => $e->getLine()
                    ]);
                    continue; // Continue with next file
                }
            }

            // Check if any files were converted
            if (empty($convertedFiles)) {
                Log::error('No files were converted successfully');
                return response()->json([
                    'success' => false,
                    'message' => 'No files could be converted. Please check file format and try again.'
                ], 500);
            }

            Log::info('Conversion Process Completed Successfully', [
                'total_converted' => count($convertedFiles),
                'files' => $convertedFiles
            ]);

            return response()->json([
                'success' => true,
                'convertedFiles' => $convertedFiles,
                'message' => count($convertedFiles) . ' file(s) successfully converted to Word format!',
                'total_files' => count($convertedFiles)
            ]);

        } catch (\Exception $e) {
            Log::error('Unexpected Error in PDF Conversion', [
                'error_message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred: ' . $e->getMessage(),
                'debug_info' => [
                    'error_file' => $e->getFile(),
                    'error_line' => $e->getLine()
                ]
            ], 500);
        }
    }


    // public function wordToPdf(Request $request)
    // {
    //     // Validate that 'files' and 'compressionLevel' are provided
    //     $request->validate([
    //         'files.*' => 'required|mimes:doc,docx|max:52428800', // Ensure only Word files are allowed
    //     ]);

    //     // API URL
    //     $apiUrl = 'http://63.250.41.43/api/convertWordToPdf';

    //     $responses = [];

    //     // Loop through each uploaded file
    //     foreach ($request->file('files') as $file) {
    //         $fileName = $file->getClientOriginalName();
    //         $filePath = $file->getRealPath();

    //         // Make the API request
    //         $response = Http::timeout(120)->attach(
    //             'word', file_get_contents($filePath), $fileName
    //             )->post($apiUrl);
                
    //             if ($response->successful()) {
    //             $responses[] = $response->json();
                
    //         } else {
    //             // Log error and return back with a message
    //             \Log::error('Conversion API error:', [
    //                 'status' => $response->status(),
    //                 'body' => $response->body(),
    //             ]);
    //             return back()->withErrors(['message' => 'Conversion failed. Please try again.']);
    //         }
    //     }

    //     // Parse response
    //     $convertedFiles = [];
    //     foreach ($responses as $response) {
    //         if (isset($response['data']) && is_array($response['data'])) {
    //             foreach ($response['data'] as $data) {
    //                 if (isset($data['pdfFilePath'])) { // Adjust based on your API response
    //                     $convertedFiles[] = [
    //                         'convertedFilePath' => $data['pdfFilePath'], // PDF download link
    //                         'originalFilePath' => $data['originalFilePath'], // Original file name
    //                         'originalFileName' => basename($data['originalFilePath']), // Extract original file name
    //                     ];
    //                 }
    //             }
    //         }
    //     }

    //     // Pass data to the view
    //     return redirect()->back()->with('convertedFiles', $convertedFiles);
    // }
}

