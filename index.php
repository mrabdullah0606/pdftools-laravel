<?php
/**
 * Custom index.php for shared hosting
 * Place this file in your domain's root directory (public_html)
 * This will redirect all requests to the Laravel public directory
 */

// Get the request URI
$request = $_SERVER['REQUEST_URI'];

// Remove query string if present
$request = strtok($request, '?');

// Check if the request is for the public directory
if (strpos($request, '/public/') === 0) {
    // Remove /public/ from the beginning
    $newRequest = substr($request, 7);
    
    // Redirect to the root
    header("Location: /$newRequest", true, 301);
    exit();
}

// Check if the requested file exists in the public directory
$publicPath = __DIR__ . '/public' . $request;

// If it's a file and exists, serve it directly
if (is_file($publicPath)) {
    // Get the file extension
    $extension = pathinfo($publicPath, PATHINFO_EXTENSION);
    
    // Set appropriate content type
    switch (strtolower($extension)) {
        case 'css':
            header('Content-Type: text/css');
            break;
        case 'js':
            header('Content-Type: application/javascript');
            break;
        case 'json':
            header('Content-Type: application/json');
            break;
        case 'png':
            header('Content-Type: image/png');
            break;
        case 'jpg':
        case 'jpeg':
            header('Content-Type: image/jpeg');
            break;
        case 'gif':
            header('Content-Type: image/gif');
            break;
        case 'svg':
            header('Content-Type: image/svg+xml');
            break;
        case 'ico':
            header('Content-Type: image/x-icon');
            break;
        default:
            // Let the server determine the content type
            break;
    }
    
    readfile($publicPath);
    exit();
}

// Forward the request to Laravel's public/index.php
require_once __DIR__ . '/public/index.php';
