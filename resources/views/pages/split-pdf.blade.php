@extends('main')
@section('title', __('split-to-pdf.title'))
@section('description', __('split-to-pdf.description'))

@push('head')
<link rel="stylesheet" href="{{ asset('css/splitpdf.css') }}">
<link rel="stylesheet" href="{{ asset('css/mergepdf.css') }}">
@endpush

@section('page')
@php
    $currentLocale = app()->getLocale();
    $isLocalized    = ($currentLocale !== 'en');
    $processRoute   = $isLocalized ? route('localized.split.pdf.process', ['locale' => $currentLocale]) : route('split.pdf.process');
    $pageRoute      = $isLocalized ? route('localized.split-pdf', ['locale' => $currentLocale])  : route('split-pdf');
    $downloadRouteName = $isLocalized ? 'localized.split.download' : 'split.download';
    $downloadZipRoute = route('split.download.zip');
    
    $files = [];
    if (!empty($api_response['data']['files'])) {
        $files = $api_response['data']['files'];
    } elseif (!empty($download_urls)) {
        foreach($download_urls as $idx => $url) {
            $files[] = [
                'filename' => 'split_part_' . ($idx + 1) . '.pdf',
                'url'      => $url,
                'size'     => '',
            ];
        }
    }
    $firstFileUrl = $files[0]['url'] ?? '';
    $firstFileName = $files[0]['filename'] ?? 'split_part_1.pdf';
    $firstDownloadParams = $isLocalized 
        ? ['locale' => $currentLocale, 'download_url' => $firstFileUrl, 'filename' => $firstFileName] 
        : ['download_url' => $firstFileUrl, 'filename' => $firstFileName];
@endphp

<!-- Main Form -->
<form action="{{ $processRoute }}" method="POST" enctype="multipart/form-data" id="splitPdfForm">
    @csrf

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center py-4">
            <h1 class="hero-title mb-3">{{ __('split-to-pdf.split_heading') }}</h1>
            <p class="lead mb-5">{{ __('split-to-pdf.heading-des') }}</p>
        </div>

        <!-- Upload Section -->
        <div class="upload-section" id="upload">
            <div class="container">
                <div class="upload-area" id="dropZone">
                    <div class="text-center" id="initialUpload">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#795ef1" class="bi bi-scissors mb-3" viewBox="0 0 16 16">
                            <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.66a2.5 2.5 0 1 1-.794.604L8 9.274l-1.572 2.6a2.5 2.5 0 1 1-.794-.604l1.556-2.66zm-.252 7.744a1.5 1.5 0 1 0 2.121 2.122 1.5 1.5 0 0 0-2.121-2.122m7.504 0a1.5 1.5 0 1 0 2.122 2.122 1.5 1.5 0 0 0-2.122-2.122"/>
                        </svg>
                        <h3 class="mb-2">{{ __('split-to-pdf.droped') }}</h3>
                        <p class="text-muted mb-4">{{ __('split-to-pdf.upload') }}</p>
                        
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-primary btn-upload" type="button" id="uploadBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill me-1" viewBox="0 0 16 16">
                                    <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                                </svg> {{ __('split-to-pdf.upload_files') }}
                            </button>
                            <input type="file" name="files[]" id="fileInput" accept=".pdf" class="d-none">
                        </div>

                        <!-- Preview Area -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4" id="filePreview"></div>

                        <!-- URL Input Container -->
                        <div class="url-input-container mt-3" id="urlInputContainer">
                            <div class="url-input-group">
                                <input type="text" class="url-input" id="urlInput" placeholder="Enter PDF URL (https://...)...">
                                <button class="url-close-btn" type="button" id="urlCloseBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </button>
                                <button class="url-submit-btn" type="button" id="urlSubmitBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Files Grid Container -->
                <div class="files-grid-container" id="filesGridContainer" style="width: 100%;"></div>

                <!-- Cloud & URL Source buttons -->
                <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                    <div class="source-item" id="googleDriveBtn">
                        <img src="{{ asset('images/drivelogo.svg') }}" alt="Google Drive" width="22" height="22">
                        <span>{{ __('split-to-pdf.g-drive') }}</span>
                    </div>
                    <div class="source-item" id="dropboxBtn">
                        <img src="{{ asset('images/Drop-icon.svg') }}" alt="Dropbox" width="22" height="22" style="vertical-align:middle;">
                        <span>{{ __('split-to-pdf.dropbox') }}</span>
                    </div>
                    <div class="source-item" id="urlSourceBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                        </svg>
                        <span>{{ __('split-to-pdf.url') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Error Alert -->
    @if (isset($errors) && $errors->any())
        <div class="container my-3" style="max-width: 900px;">
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- Result Section -->
    @if (!empty($files))
        <section class="result-section resultnew" id="resultSection" style="display: block;">
            <div class="result-header">
                <h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#795ef1" class="bi bi-filetype-pdf me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                    </svg>
                    {{ __('split-to-pdf.result') }}
                </h4>
                <div class="d-flex gap-2">
                    @if (!empty($firstFileUrl))
                        <a href="{{ route($downloadRouteName, $firstDownloadParams) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill me-1" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg> {{ __('split-to-pdf.preview') }}
                        </a>
                    @endif
                    <a href="{{ $pageRoute }}" class="btn btn-sm btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                        </svg> {{ __('split-to-pdf.Convert-an') }}
                    </a>
                </div>
            </div>

            <div class="result-content mt-3">
                <div class="alert alert-success d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <span>{{ $api_response['detail'] ?? __('split-to-pdf.msg') }}</span>
                </div>

                <div class="row align-items-center mt-3">
                    <!-- Original File -->
                    <div class="col-md-5">
                        <h6 class="mb-2 fw-bold text-dark">{{ __('split-to-pdf.original') }}</h6>
                        <div class="d-flex align-items-center gap-2 p-2 rounded bg-light border">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#e53e3e" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.33-.598.57-.89.57-.354 0-.495-.27-.495-.538 0-.436.446-1.043 1.376-1.538m4.957-2.143q.228-.352.387-.798a2.5 2.5 0 0 0-.582-.05q-.764 0-1.452.232c.163.354.34.694.525.962a4 4 0 0 0 1.122-.346m-4.04 1.688q.3-.399.633-.858-.475-.02-.953-.02a4 4 0 0 0-.255.424c-.1.18-.12.31-.12.38 0 .15.084.234.184.234q.24 0 .511-.16"/>
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a7 7 0 0 0-1.99.28c-.466.13-.8.4-.8.74 0 .55.57.98 1.43.98.81 0 1.5-.47 2.05-1.12.3-.35.58-.75.83-1.18.5-.2.98-.38 1.48-.52.4-.11.83-.18 1.25-.18.8 0 1.5.3 1.5.9 0 .4-.3.7-.8.85-.4.12-.9.15-1.4.15-.3 0-.6-.02-.9-.05-.2.25-.4.5-.6.78-.3.4-.6.8-.9 1.15a10 10 0 0 0-1.2 1.35c-.4.4-.8.7-1.3.7-.6 0-1.1-.3-1.1-.8 0-.4.3-.8.7-1 .4-.2.8-.3 1.3-.3q.3 0 .6.03"/>
                            </svg>
                            <div class="overflow-hidden">
                                <div class="text-truncate fw-semibold" style="font-size: 0.95rem;">
                                    {{ $original_filename ?? 'Document.pdf' }}
                                </div>
                                <small class="text-muted">PDF Document</small>
                            </div>
                        </div>
                    </div>

                    <!-- Arrow -->
                    <div class="col-md-2 text-center my-3 my-md-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-right-short text-primary" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg>
                        <span class="d-block badge bg-primary-subtle text-primary mt-1">{{ count($files) }} file{{ count($files) > 1 ? 's' : '' }}</span>
                    </div>

                    <!-- Split Output Files -->
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 fw-bold text-dark">{{ __('split-to-pdf.split_files') }}</h6>
                            @if (count($files) > 1)
                                <button type="button" class="btn btn-sm btn-primary" id="downloadAllZipBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-file-earmark-zip-fill me-1" viewBox="0 0 16 16">
                                        <path d="M5.5 9.438V8.5h1v.938a1 1 0 0 0 .03.243l.4 1.598-.93.62-.93-.62.4-1.598a1 1 0 0 0 .03-.243"/>
                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-4-.5V2h-1V1H6v1h1v1H6v1h1v1H6v1h1v1H5.5V6h-1V5h1V4h-1V3zm0 4.5h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.109 0l-.93-.62a1 1 0 0 1-.415-1.074l.4-1.599V8.5a1 1 0 0 1 1-1"/>
                                    </svg> {{ __('split-to-pdf.download_all') }}
                                </button>
                            @endif
                        </div>

                        <div class="split-files-container" style="max-height: 250px; overflow-y: auto;">
                            @foreach ($files as $idx => $f)
                                @php
                                    $fUrl = $f['url'] ?? '';
                                    $fName = $f['filename'] ?? ('split_part_' . ($idx + 1) . '.pdf');
                                    $fSize = $f['size'] ?? '';
                                    $fParams = $isLocalized 
                                        ? ['locale' => $currentLocale, 'download_url' => $fUrl, 'filename' => $fName] 
                                        : ['download_url' => $fUrl, 'filename' => $fName];
                                @endphp
                                <div class="d-flex align-items-center justify-content-between p-2 mb-2 rounded bg-light border">
                                    <div class="d-flex align-items-center gap-2 overflow-hidden me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#795ef1" class="bi bi-file-earmark-pdf flex-shrink-0" viewBox="0 0 16 16">
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                        </svg>
                                        <div class="overflow-hidden">
                                            <div class="text-truncate fw-semibold" style="font-size: 0.875rem;">{{ $fName }}</div>
                                            @if(!empty($fSize))
                                                <small class="text-muted">{{ $fSize }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex gap-1 flex-shrink-0">
                                        <a href="{{ route($downloadRouteName, $fParams) }}" class="btn btn-sm btn-outline-success" title="Download">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                            </svg>
                                        </a>
                                        @if(!empty($fUrl))
                                            <a href="{{ $fUrl }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="Preview">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Share and Save Options -->
            <div class="share-options mt-4">
                <h5 class="mb-3 text-center">{{ __('split-to-pdf.share') }}</h5>
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    <button class="btn share-btn" type="button" id="saveToDrive" title="Save to Google Drive">
                        <img src="{{ asset('images/google-drive.svg') }}" alt="Google Drive">
                    </button>

                    <button class="btn share-btn" type="button" id="saveToDropbox" title="Save to Dropbox">
                        <img src="{{ asset('images/dropbox.svg') }}" alt="Dropbox">
                    </button>

                    <button class="btn share-btn" type="button" id="shareOnWhatsApp" title="Share on WhatsApp">
                        <img src="{{ asset('images/whatsapp.svg') }}" alt="WhatsApp">
                    </button>

                    @php
                        $qrUrl = !empty($firstFileUrl) ? route($downloadRouteName, $firstDownloadParams) : '';
                    @endphp
                    <button class="btn share-btn" type="button" id="qrBtn" onclick="openQrModal('{{ $qrUrl }}')" title="Get shareable URL with QR Code">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3h8v8H3V3zm2 2v4h4V5H5zm6-2h8v8h-8V3zm2 2v4h4V5h-4zM3 13h8v8H3v-8zm2 2v4h4v-4H5zm10 0h2v2h-2v-2zm-2 2h2v2h-2v-2zm4 0h2v2h-2v-2zm-2 2h2v2h-2v-2zm4 0h2v6h-6v-2h4v-4zm-8 2h2v2h-2v-2zm2 2h2v2h-2v-2z" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- Scroll to resultSection & ZIP submit --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const resultSection = document.getElementById('resultSection');
                if (resultSection) {
                    resultSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }

                // Download all zip trigger
                document.getElementById('downloadAllZipBtn')?.addEventListener('click', function() {
                    const urls = @json($download_urls ?? []);
                    if (!urls.length) return;

                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ $downloadZipRoute }}';
                    
                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';
                    form.appendChild(csrf);

                    urls.forEach(url => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'urls[]';
                        input.value = url;
                        form.appendChild(input);
                    });

                    document.body.appendChild(form);
                    form.submit();
                    document.body.removeChild(form);
                });
            });
        </script>
    @endif

    <!-- Conversion Section -->
    <section class="conversion-section" id="conversionSection">
        <div class="container">
            <div class="text-center mb-4">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#795ef1" class="bi bi-scissors me-2" viewBox="0 0 16 16">
                        <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.66a2.5 2.5 0 1 1-.794.604L8 9.274l-1.572 2.6a2.5 2.5 0 1 1-.794-.604l1.556-2.66zm-.252 7.744a1.5 1.5 0 1 0 2.121 2.122 1.5 1.5 0 0 0-2.121-2.122m7.504 0a1.5 1.5 0 1 0 2.122 2.122 1.5 1.5 0 0 0-2.122-2.122"/>
                    </svg>
                    {{ __('split-to-pdf.options') }}
                </h3>
                <p class="text-muted">{{ __('split-to-pdf.options-des') }}</p>
            </div>

            <div class="conversion-options">
                <!-- Split Mode Radio Buttons -->
                <div class="option-group mt-3">
                    <div class="option-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#795ef1" class="bi bi-gear-fill me-1" viewBox="0 0 16 16">
                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                        </svg>
                        <span>Select Split Mode</span>
                    </div>

                    <div class="row g-3">
                        <!-- Mode 1: Custom Ranges -->
                        <div class="col-md-4">
                            <label class="w-100 h-100">
                                <input type="radio" name="split_mode" value="ranges" class="d-none" id="modeRanges" checked>
                                <div class="split-mode-card active" id="cardRanges">
                                    <div class="split-mode-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-layout-split" viewBox="0 0 16 16">
                                            <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.5-1v12H14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm-1 0H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h5.5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="split-mode-title">{{ __('split-to-pdf.mode_ranges') }}</div>
                                        <p class="split-mode-desc">{{ __('split-to-pdf.mode_ranges_des') }}</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Mode 2: Fixed Ranges (Every N Pages) -->
                        <div class="col-md-4">
                            <label class="w-100 h-100">
                                <input type="radio" name="split_mode" value="fixed_range" class="d-none" id="modeFixed">
                                <div class="split-mode-card" id="cardFixed">
                                    <div class="split-mode-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                                            <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="split-mode-title">{{ __('split-to-pdf.mode_fixed') }}</div>
                                        <p class="split-mode-desc">{{ __('split-to-pdf.mode_fixed_des') }}</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Mode 3: Remove Pages -->
                        <div class="col-md-4">
                            <label class="w-100 h-100">
                                <input type="radio" name="split_mode" value="remove_pages" class="d-none" id="modeRemove">
                                <div class="split-mode-card" id="cardRemove">
                                    <div class="split-mode-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="split-mode-title">{{ __('split-to-pdf.mode_remove') }}</div>
                                        <p class="split-mode-desc">{{ __('split-to-pdf.mode_remove_des') }}</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Input Panel -->
                <div class="split-input-panel mt-3">
                    <!-- Panel 1: Ranges -->
                    <div id="panelRanges">
                        <label class="form-label fw-bold">{{ __('split-to-pdf.ranges_label') }}</label>
                        <input type="text" name="ranges" id="inputRanges" class="form-control form-control-lg" placeholder="{{ __('split-to-pdf.ranges_placeholder') }}" value="1-3">
                        <small class="text-muted d-block mt-2">{{ __('split-to-pdf.ranges_help') }}</small>
                        
                        <div class="form-check form-switch mt-3">
                            <input class="form-check-input" type="checkbox" name="merge_after" id="mergeAfter" value="1">
                            <label class="form-check-label fw-semibold" for="mergeAfter">
                                {{ __('split-to-pdf.merge_after_label') }}
                            </label>
                            <small class="text-muted d-block">{{ __('split-to-pdf.merge_after_help') }}</small>
                        </div>
                    </div>

                    <!-- Panel 2: Fixed Interval -->
                    <div id="panelFixed" class="d-none">
                        <label class="form-label fw-bold">{{ __('split-to-pdf.fixed_label') }}</label>
                        <input type="number" name="fixed_range" id="inputFixed" class="form-control form-control-lg" min="1" max="1000" placeholder="{{ __('split-to-pdf.fixed_placeholder') }}" value="1" disabled>
                        <small class="text-muted d-block mt-2">{{ __('split-to-pdf.fixed_help') }}</small>
                    </div>

                    <!-- Panel 3: Remove Pages -->
                    <div id="panelRemove" class="d-none">
                        <label class="form-label fw-bold">{{ __('split-to-pdf.remove_label') }}</label>
                        <input type="text" name="remove_pages" id="inputRemove" class="form-control form-control-lg" placeholder="{{ __('split-to-pdf.remove_placeholder') }}" disabled>
                        <small class="text-muted d-block mt-2">{{ __('split-to-pdf.remove_help') }}</small>
                    </div>
                </div>

                <!-- Action Submit Button -->
                <button class="btn convert-btn" id="convertBtn" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true" role="img" width="20" height="20" style="vertical-align:middle; display:inline-block; fill:currentColor; margin-right: 8px;">
                        <path d="M497 273.3 383 361.6c-9.7 6.9-22.7 4.4-29.6-5.2s-4.4-22.7 5.2-29.6L408 256H104c-13.3 0-24-10.7-24-24s10.7-24 24-24h304L358.6 185.2c-9.6-6.9-12.1-19.9-5.2-29.6s19.9-12.1 29.6-5.2L497 238.7c8 5.7 8 17.7 0 23z" />
                        <path d="M15 238.7 129 150.4c9.7-6.9 22.7-4.4 29.6 5.2s4.4 22.7-5.2 29.6L104 256h304c13.3 0 24 10.7 24 24s-10.7 24-24 24H104l75.4 47.6c9.6 6.9 12.1 19.9 5.2 29.6s-19.9 12.1-29.6 5.2L15 273.3c-8-5.7-8-17.7 0-23z" />
                    </svg>
                    {{ __('split-to-pdf.btn_split') }}
                </button>
            </div>
        </div>
    </section>
</form>

<!-- Progress Bar Section -->
<section class="progress-section" id="progressSectionWord" style="display: none;">
    <div class="container">
        <div class="upload-section">
            <div class="text-center">
                <h4 class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-repeat rotate-icon" viewBox="0 0 16 16">
                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                    </svg>
                    {{ __('split-to-pdf.splitting') }}
                </h4>

                <div class="progress-container" style="width: 100%; max-width: 600px; margin: 0 auto;">
                    <div class="progress" style="height: 25px; border-radius: 15px; background-color: var(--light-gray);">
                        <div class="progress-bar" id="wordProgressBar"
                            style="background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%); 
                                     border-radius: 15px; 
                                     transition: width 0.3s ease;
                                     width: 0%;"
                            role="progressbar">
                        </div>
                    </div>

                    <div class="progress-text mt-3">
                        <p class="text-muted" id="wordProgressText">{{ __('split-to-pdf.preparing') }}</p>
                        <small class="text-muted" id="wordProgressPercentage">0%</small>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">{{ __('split-to-pdf.loading') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Tools Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{ __('split-to-pdf.related_tools') }}</h2>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-4 justify-content-center">
            <div class="col">
                <a href="{{ localized_route('merge-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1" class="bi bi-union" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2z"/>
                            </svg>
                            <h3 class="card-title mt-2">{{ __('split-to-pdf.merge-pDF') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('compress-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1" class="bi bi-file-earmark-zip-fill" viewBox="0 0 16 16">
                                <path d="M5.5 9.438V8.5h1v.938a1 1 0 0 0 .03.243l.4 1.598-.93.62-.93-.62.4-1.598a1 1 0 0 0 .03-.243" />
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-4-.5V2h-1V1H6v1h1v1H6v1h1v1H6v1h1v1H5.5V6h-1V5h1V4h-1V3zm0 4.5h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.109 0l-.93-.62a1 1 0 0 1-.415-1.074l.4-1.599V8.5a1 1 0 0 1 1-1" />
                            </svg>
                            <h3 class="card-title mt-2">{{ __('split-to-pdf.compress-pDF') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('pdf-to-word') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1" class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                            </svg>
                            <h3 class="card-title mt-2">{{ __('split-to-pdf.pDF-to-word') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('word-to-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                            </svg>
                            <h3 class="card-title mt-2">{{ __('split-to-pdf.word-to-pDF') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('jpg-to-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .616-.054l2.24 1.493 2.05-2.05a.5.5 0 0 1 .637-.056L13 10.5V4.5h-3A1.5 1.5 0 0 1 8.5 3V1z"/>
                            </svg>
                            <h3 class="card-title mt-2">{{ __('split-to-pdf.jPG-to-pDF') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('pdf-to-jpg') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                            </svg>
                            <h3 class="card-title mt-2">{{ __('split-to-pdf.pDF-to-jpg') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section">
    <div class="container p-5">
        <div class="text-center mb-5">
            <h2 class="section-title">{{ __('split-to-pdf.how_split_title') }}</h2>
            <p class="section-subtitle">{{ __('split-to-pdf.heading-des') }}</p>
        </div>

        <div class="timeline">
            <div class="step-card left">
                <div class="step-number">1</div>
                <h3 class="step-title">{{ __('split-to-pdf.step1_title') }}</h3>
                <p class="step-text">{{ __('split-to-pdf.step1_desc') }}</p>
            </div>

            <div class="step-card right">
                <div class="step-number">2</div>
                <h3 class="step-title">{{ __('split-to-pdf.step2_title') }}</h3>
                <p class="step-text">{{ __('split-to-pdf.step2_desc') }}</p>
            </div>

            <div class="step-card left">
                <div class="step-number">3</div>
                <h3 class="step-title">{{ __('split-to-pdf.step3_title') }}</h3>
                <p class="step-text">{{ __('split-to-pdf.step3_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Overview / Guide Article Section -->
<section class="section bg-light">
    <div class="container p-5">
        <div class="col-12 bg-white rounded-3 p-4 shadow">
            <h2>Split PDF Files Online — Simple, Fast & Secure</h2>
            <p>PDF documents are essential in professional and academic environments. However, handling oversized PDFs or sharing documents that contain unnecessary pages can be cumbersome.</p>
            <p>With PDFTools Split PDF, you can easily extract specific page ranges (such as pages 1-3, 5, 8-10), divide your file into equal multi-page sections, or delete unwanted pages in seconds. Everything is processed directly in your web browser with enterprise-grade encryption and total privacy.</p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section bg-light">
    <div class="container p-5">
        <div class="text-center mb-5">
            <h2 class="section-title">{{ __('split-to-pdf.features_title') }}</h2>
            <p class="section-subtitle">{{ __('split-to-pdf.heading-des') }}</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1" class="bi bi-magic" viewBox="0 0 16 16">
                        <path d="M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707zM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1zM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707zM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('split-to-pdf.feat1_title') }}</h3>
                <p class="feature-text">{{ __('split-to-pdf.feat1_desc') }}</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1" class="bi bi-shield-check" viewBox="0 0 16 16">
                        <path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                        <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('split-to-pdf.feat2_title') }}</h3>
                <p class="feature-text">{{ __('split-to-pdf.feat2_desc') }}</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1" class="bi bi-laptop" viewBox="0 0 16 16">
                        <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"/>
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('split-to-pdf.feat3_title') }}</h3>
                <p class="feature-text">{{ __('split-to-pdf.feat3_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{ __('split-to-pdf.faq_title') }}</h2>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{ __('split-to-pdf.faq1_q') }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('split-to-pdf.faq1_a') }}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{ __('split-to-pdf.faq2_q') }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('split-to-pdf.faq2_a') }}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{ __('split-to-pdf.faq3_q') }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('split-to-pdf.faq3_a') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QR Code Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrModalLabel">Download via URL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" id="fileUrlInput" class="form-control" readonly>
                    <button class="btn btn-outline-secondary" type="button" onclick="copyUrl()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </button>
                </div>
                <div id="qrcode" class="text-center"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Libraries -->
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script src="https://apis.google.com/js/api.js"></script>
<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="1sf5bictc5t4exu"></script>

<!-- JavaScript Interactivity -->
<script>
    const uploadBtn = document.getElementById("uploadBtn");
    const fileInput = document.getElementById("fileInput");
    const dropZone = document.getElementById("dropZone");
    const filesGridContainer = document.getElementById("filesGridContainer");
    const conversionSection = document.getElementById("conversionSection");
    const convertBtn = document.getElementById("convertBtn");

    let dragCounter = 0;
    let currentFiles = [];

    // PDF.js worker
    if (typeof pdfjsLib !== 'undefined') {
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    }

    // Update convert button state
    function updateConvertButtonState() {
        if (!convertBtn) return;
        if (currentFiles.length === 0) {
            convertBtn.disabled = true;
            convertBtn.style.opacity = '0.6';
            convertBtn.style.cursor = 'not-allowed';
        } else {
            convertBtn.disabled = false;
            convertBtn.style.opacity = '1';
            convertBtn.style.cursor = 'pointer';
        }
    }

    // Drag and Drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        document.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
        }, false);
    });

    dropZone?.addEventListener('dragenter', function(e) {
        dragCounter++;
        dropZone.classList.add('drag-over');
    }, false);

    dropZone?.addEventListener('dragover', function(e) {
        dropZone.classList.add('drag-over');
    }, false);

    dropZone?.addEventListener('dragleave', function(e) {
        dragCounter--;
        if (dragCounter === 0) {
            dropZone.classList.remove('drag-over');
        }
    }, false);

    dropZone?.addEventListener('drop', function(e) {
        dragCounter = 0;
        dropZone.classList.remove('drag-over');
        const dt = e.dataTransfer;
        const droppedFiles = Array.from(dt.files || []);

        if (droppedFiles.length > 0) {
            const pdfFiles = droppedFiles.filter(file => file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf'));
            if (pdfFiles.length === 0) {
                alert('Please select only PDF files!');
                return;
            }
            currentFiles = [pdfFiles[0]];
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(pdfFiles[0]);
            fileInput.files = dataTransfer.files;

            renderCurrentFilesList();
        }
    }, false);

    // Upload button click
    uploadBtn?.addEventListener("click", () => fileInput.click());

    // File input change
    fileInput?.addEventListener("change", function(e) {
        const files = Array.from(e.target.files || []);
        if (!files.length) return;

        const pdfFiles = files.filter(f => f.type.includes('pdf') || f.name.toLowerCase().endsWith('.pdf'));
        if (pdfFiles.length === 0) {
            alert('Please select a valid PDF file!');
            fileInput.value = '';
            return;
        }

        currentFiles = [pdfFiles[0]];
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(pdfFiles[0]);
        fileInput.files = dataTransfer.files;

        renderCurrentFilesList();
    });

    // Render PDF preview thumbnail
    async function renderPDFPreview(file, canvasId) {
        try {
            if (typeof pdfjsLib === 'undefined') return;
            const arrayBuffer = await file.arrayBuffer();
            const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;
            const page = await pdf.getPage(1);

            const canvas = document.getElementById(canvasId);
            if (!canvas) return;
            const context = canvas.getContext('2d');

            const desiredWidth = 170;
            const viewport = page.getViewport({ scale: 1 });
            const scale = desiredWidth / viewport.width;
            const scaledViewport = page.getViewport({ scale: scale });

            canvas.width = scaledViewport.width;
            canvas.height = scaledViewport.height;

            await page.render({ canvasContext: context, viewport: scaledViewport }).promise;
        } catch (error) {
            console.error('Error rendering PDF preview:', error);
        }
    }

    // Render Files List in #filesGridContainer
    function renderCurrentFilesList() {
        if (!filesGridContainer) return;
        filesGridContainer.innerHTML = "";

        if (currentFiles.length === 0) {
            if (dropZone) dropZone.style.display = "block";
            if (conversionSection) conversionSection.style.display = "none";
            updateConvertButtonState();
            return;
        }

        if (dropZone) dropZone.style.display = "none";

        const file = currentFiles[0];
        let sizeText = file.size >= 1024 * 1024
            ? (file.size / (1024 * 1024)).toFixed(2) + " MB"
            : (file.size / 1024).toFixed(2) + " KB";

        const shortName = file.name.length > 25 ? file.name.slice(0, 22) + "..." : file.name;

        const summaryHTML = `
            <div class="files-summary" style="text-align: center; margin-bottom: 20px;">
                <i class="fas fa-file-pdf" style="color: #dc3545; font-size: 2.2rem; margin-bottom: 10px;"></i>
                <h4 style="color: #333; margin-bottom: 5px;">1 PDF File Selected</h4>
                <p style="color: #6c757d; margin-bottom: 0;">Ready to split into multiple documents</p>
            </div>
            <div class="file-cards-grid d-flex justify-content-center" id="fileCardsGrid">
                <div class="file-preview-card" style="
                    border: 2px solid #e9ecef; 
                    border-radius: 12px; 
                    padding: 15px; 
                    margin: 8px; 
                    width: 220px; 
                    text-align: center; 
                    background: white; 
                    box-shadow: 0 4px 12px rgba(0,0,0,0.06); 
                    position: relative;
                ">
                    <button type="button" class="remove-file-btn" id="removeFileCardBtn" style="
                        position: absolute; 
                        top: 8px; 
                        right: 8px; 
                        width: 24px; 
                        height: 24px; 
                        border: none; 
                        background: #dc3545; 
                        color: white; 
                        border-radius: 50%; 
                        font-size: 14px; 
                        line-height: 1;
                        cursor: pointer; 
                        display: flex; 
                        align-items: center; 
                        justify-content: center; 
                        z-index: 2;
                    " title="Remove File">&times;</button>

                    <div class="file-preview-image" style="
                        width: 100%; 
                        height: 130px; 
                        background: #f8f9fa; 
                        border-radius: 8px; 
                        display: flex; 
                        align-items: center; 
                        justify-content: center; 
                        margin-bottom: 10px; 
                        position: relative; 
                        overflow: hidden; 
                        border: 1px solid #dee2e6;
                    ">
                        <canvas id="pdfCanvas-0" style="max-width: 100%; max-height: 100%; object-fit: contain;"></canvas>
                        <div class="loading-spinner" id="loading-0" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <i class="fas fa-spinner fa-spin" style="font-size: 24px; color: #795ef1;"></i>
                        </div>
                        <div style="position: absolute; bottom: 5px; right: 8px; background: rgba(121, 94, 241, 0.9); color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px; z-index: 1; font-weight: 600;">
                            PDF
                        </div>
                    </div>

                    <div class="file-info text-center">
                        <div class="file-name" title="${file.name}" style="font-weight: 600; color: #333; font-size: 14px; margin-bottom: 4px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${shortName}</div>
                        <div class="file-size" style="color: #6c757d; font-size: 12px; margin-bottom: 8px;">${sizeText}</div>
                        <div class="file-status" style="padding: 4px 8px; background: #d4edda; color: #155724; border-radius: 20px; font-size: 11px; font-weight: 500;">
                            <i class="fas fa-check-circle me-1"></i> Ready to Split
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-buttons mt-3 text-center">
                <button type="button" class="btn btn-outline-secondary btn-sm" id="changeFileBtn" style="padding: 6px 18px; border-radius: 20px; font-weight: 500;">
                    <i class="fas fa-sync-alt me-1"></i> Change File
                </button>
            </div>
        `;
        filesGridContainer.insertAdjacentHTML("beforeend", summaryHTML);

        setTimeout(() => {
            renderPDFPreview(file, 'pdfCanvas-0').then(() => {
                const spinner = document.getElementById('loading-0');
                if (spinner) spinner.style.display = 'none';
            });
        }, 100);

        if (conversionSection) {
            conversionSection.style.display = "block";
            conversionSection.scrollIntoView({ behavior: "smooth", block: "start" });
        }

        document.getElementById("removeFileCardBtn")?.addEventListener("click", () => {
            currentFiles = [];
            fileInput.value = "";
            renderCurrentFilesList();
        });

        document.getElementById("changeFileBtn")?.addEventListener("click", () => {
            currentFiles = [];
            fileInput.value = "";
            renderCurrentFilesList();
            dropZone?.scrollIntoView({ behavior: "smooth", block: "start" });
        });

        updateConvertButtonState();
    }

    // Split Mode Toggle Logic
    const cardRanges = document.getElementById('cardRanges');
    const cardFixed  = document.getElementById('cardFixed');
    const cardRemove = document.getElementById('cardRemove');
    const modeRanges = document.getElementById('modeRanges');
    const modeFixed  = document.getElementById('modeFixed');
    const modeRemove = document.getElementById('modeRemove');

    const panelRanges = document.getElementById('panelRanges');
    const panelFixed  = document.getElementById('panelFixed');
    const panelRemove = document.getElementById('panelRemove');

    const inputRanges = document.getElementById('inputRanges');
    const inputFixed  = document.getElementById('inputFixed');
    const inputRemove = document.getElementById('inputRemove');

    function setSplitMode(mode) {
        [cardRanges, cardFixed, cardRemove].forEach(c => c?.classList.remove('active'));
        [panelRanges, panelFixed, panelRemove].forEach(p => p?.classList.add('d-none'));

        if (inputRanges) inputRanges.disabled = true;
        if (inputFixed) inputFixed.disabled = true;
        if (inputRemove) inputRemove.disabled = true;

        if (mode === 'ranges') {
            if (modeRanges) modeRanges.checked = true;
            cardRanges?.classList.add('active');
            panelRanges?.classList.remove('d-none');
            if (inputRanges) {
                inputRanges.disabled = false;
                inputRanges.focus();
            }
        } else if (mode === 'fixed_range') {
            if (modeFixed) modeFixed.checked = true;
            cardFixed?.classList.add('active');
            panelFixed?.classList.remove('d-none');
            if (inputFixed) {
                inputFixed.disabled = false;
                inputFixed.focus();
            }
        } else if (mode === 'remove_pages') {
            if (modeRemove) modeRemove.checked = true;
            cardRemove?.classList.add('active');
            panelRemove?.classList.remove('d-none');
            if (inputRemove) {
                inputRemove.disabled = false;
                inputRemove.focus();
            }
        }
    }

    cardRanges?.addEventListener('click', () => setSplitMode('ranges'));
    cardFixed?.addEventListener('click', () => setSplitMode('fixed_range'));
    cardRemove?.addEventListener('click', () => setSplitMode('remove_pages'));

    // Progress Bar Animation
    let wordProgressInterval;
    let wordCurrentProgress = 0;

    function showWordProgressBar() {
        if (conversionSection) conversionSection.style.display = 'none';
        const progressSection = document.getElementById('progressSectionWord');
        if (progressSection) {
            progressSection.style.display = 'block';
            progressSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        wordCurrentProgress = 0;
        updateWordProgress(0, 'Preparing PDF for splitting...');
    }

    function updateWordProgress(percentage, message) {
        const progressBar = document.getElementById('wordProgressBar');
        const progressText = document.getElementById('wordProgressText');
        const progressPercentage = document.getElementById('wordProgressPercentage');

        if (progressBar && progressText && progressPercentage) {
            progressBar.style.width = percentage + '%';
            progressText.textContent = message;
            progressPercentage.textContent = Math.round(percentage) + '%';
        }
    }

    function startWordProgress() {
        const messages = [
            'Preparing PDF for splitting...',
            'Uploading PDF to processing server...',
            'Analyzing document pages & bookmarks...',
            'Extracting selected page ranges...',
            'Generating split PDF documents...',
            'Finalizing output files...'
        ];

        wordProgressInterval = setInterval(() => {
            wordCurrentProgress += Math.random() * 8 + 4;
            if (wordCurrentProgress >= 90) {
                wordCurrentProgress = 90;
                clearInterval(wordProgressInterval);
            }
            const messageIndex = Math.min(Math.floor(wordCurrentProgress / 18), messages.length - 1);
            updateWordProgress(wordCurrentProgress, messages[messageIndex]);
        }, 1100);
    }

    // Convert Button submit handling
    convertBtn?.addEventListener('click', function(e) {
        if (currentFiles.length === 0 && (!fileInput.files || fileInput.files.length === 0)) {
            alert('Please select a PDF file to split');
            e.preventDefault();
            return false;
        }

        const selectedMode = document.querySelector('input[name="split_mode"]:checked')?.value || 'ranges';
        if (selectedMode === 'ranges' && !inputRanges.value.trim()) {
            alert('Please specify the page ranges to extract (e.g. 1-3, 5)');
            inputRanges.focus();
            e.preventDefault();
            return false;
        }

        if (selectedMode === 'fixed_range' && (!inputFixed.value || parseInt(inputFixed.value) < 1)) {
            alert('Please enter a valid page number per split (at least 1)');
            inputFixed.focus();
            e.preventDefault();
            return false;
        }

        if (selectedMode === 'remove_pages' && !inputRemove.value.trim()) {
            alert('Please enter page numbers to remove (e.g. 2, 4-6)');
            inputRemove.focus();
            e.preventDefault();
            return false;
        }

        showWordProgressBar();
        startWordProgress();
    });

    // URL source handlers
    const urlSourceBtn = document.getElementById('urlSourceBtn');
    const urlInputContainer = document.getElementById('urlInputContainer');
    const urlCloseBtn = document.getElementById('urlCloseBtn');
    const urlSubmitBtn = document.getElementById('urlSubmitBtn');
    const urlInput = document.getElementById('urlInput');

    urlSourceBtn?.addEventListener('click', () => {
        if (urlInputContainer) {
            urlInputContainer.style.display = urlInputContainer.style.display === 'block' ? 'none' : 'block';
            if (urlInputContainer.style.display === 'block') urlInput?.focus();
        }
    });

    urlCloseBtn?.addEventListener('click', () => {
        if (urlInputContainer) {
            urlInputContainer.style.display = 'none';
            if (urlInput) urlInput.value = '';
        }
    });

    urlSubmitBtn?.addEventListener('click', () => {
        const url = urlInput ? urlInput.value.trim() : '';
        if (!url || (!url.toLowerCase().endsWith('.pdf') && !url.includes('.pdf?'))) {
            alert('Please enter a valid PDF URL (https://...)');
            return;
        }

        showURLLoadingOverlay('PDF');
        fetchPDFFromURL(url)
            .then(blob => {
                const urlParts = url.split('/');
                let filename = urlParts[urlParts.length - 1].split('?')[0] || 'remote_document.pdf';
                if (!filename.toLowerCase().endsWith('.pdf')) filename += '.pdf';

                const file = new File([blob], filename, { type: 'application/pdf' });
                currentFiles = [file];
                const dt = new DataTransfer();
                dt.items.add(file);
                fileInput.files = dt.files;

                setTimeout(() => {
                    hideURLLoadingOverlay();
                    if (urlInput) urlInput.value = '';
                    if (urlInputContainer) urlInputContainer.style.display = 'none';
                    renderCurrentFilesList();
                    showNotification('PDF successfully loaded from URL!', 'success');
                }, 600);
            })
            .catch(err => {
                hideURLLoadingOverlay();
                alert('Failed to load PDF from URL: ' + err.message);
            });
    });

    async function fetchPDFFromURL(url) {
        try {
            const resp = await fetch(url);
            if (resp.ok) {
                const blob = await resp.blob();
                if (blob.size > 0) return blob;
            }
        } catch (e) {}

        const proxies = [
            'https://api.allorigins.win/raw?url=',
            'https://corsproxy.io/?'
        ];
        for (let p of proxies) {
            try {
                const resp = await fetch(p + encodeURIComponent(url));
                if (resp.ok) {
                    const blob = await resp.blob();
                    if (blob.size > 0) return blob;
                }
            } catch (e) {}
        }
        throw new Error('Could not download file from the provided URL.');
    }

    function showURLLoadingOverlay(fileType = 'PDF') {
        const overlay = document.createElement('div');
        overlay.id = 'urlLoadingOverlay';
        overlay.innerHTML = `
            <div style="background: white; border-radius: 16px; padding: 40px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 40px rgba(0,0,0,0.3);">
                <div class="spinner-border text-primary mb-3" style="width: 3rem; height: 3rem;" role="status"></div>
                <h5 class="fw-bold mb-2">Fetching ${fileType} from URL...</h5>
                <p class="text-muted mb-0">Please wait while we download your file</p>
            </div>
        `;
        overlay.style.cssText = 'position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); backdrop-filter: blur(5px); z-index: 9999; display: flex; align-items: center; justify-content: center;';
        document.body.appendChild(overlay);
    }

    function hideURLLoadingOverlay() {
        document.getElementById('urlLoadingOverlay')?.remove();
    }

    // Google Drive Integration
    const MERGE_CLIENT_ID = "1084655307660-8ad4qpb1prr46gbebbtteb25napr78kd.apps.googleusercontent.com";
    const MERGE_API_KEY   = "AIzaSyA8s9vg7KVtkSzPjeAVsvii8gINjJ9_ep8";
    let MERGE_oauthToken;
    let MERGE_tokenClient;
    let MERGE_pickerApiLoaded = false;
    let MERGE_pendingAction = null;

    function initializeGISClient() {
        if (typeof google !== 'undefined' && google.accounts && google.accounts.oauth2) {
            MERGE_tokenClient = google.accounts.oauth2.initTokenClient({
                client_id: MERGE_CLIENT_ID,
                scope: 'https://www.googleapis.com/auth/drive.file',
                callback: (tokenResponse) => {
                    if (tokenResponse && tokenResponse.access_token) {
                        MERGE_oauthToken = tokenResponse.access_token;
                        if (MERGE_pendingAction === 'picker') createDrivePicker();
                        else if (MERGE_pendingAction === 'save') handleSaveToDriveAction();
                        MERGE_pendingAction = null;
                    }
                },
            });
        }
    }

    function loadGooglePicker() {
        if (typeof gapi !== 'undefined') {
            gapi.load('picker', { 'callback': () => { MERGE_pickerApiLoaded = true; } });
        }
    }

    function createDrivePicker() {
        if (MERGE_pickerApiLoaded && MERGE_oauthToken && typeof google !== 'undefined' && google.picker) {
            const docsView = new google.picker.DocsView(google.picker.ViewId.DOCS)
                .setMimeTypes('application/pdf')
                .setMode(google.picker.DocsViewMode.LIST);

            const picker = new google.picker.PickerBuilder()
                .addView(docsView)
                .setOAuthToken(MERGE_oauthToken)
                .setDeveloperKey(MERGE_API_KEY)
                .setCallback(pickerCallback)
                .setTitle('Select a PDF to Split')
                .build();
            picker.setVisible(true);
        }
    }

    function pickerCallback(data) {
        if (data.action === google.picker.Action.PICKED) {
            const doc = data.docs[0];
            const fileId = doc.id;
            let fileName = doc.name;
            if (!fileName.toLowerCase().endsWith('.pdf')) fileName += '.pdf';

            showNotification('Downloading from Google Drive...', 'info');
            fetch(`https://www.googleapis.com/drive/v3/files/${fileId}?alt=media`, {
                headers: { 'Authorization': `Bearer ${MERGE_oauthToken}` }
            })
            .then(res => res.blob())
            .then(blob => {
                const file = new File([blob], fileName, { type: 'application/pdf' });
                currentFiles = [file];
                const dt = new DataTransfer();
                dt.items.add(file);
                fileInput.files = dt.files;
                renderCurrentFilesList();
                showNotification('File successfully loaded from Google Drive!', 'success');
            })
            .catch(err => {
                showNotification('Error loading Google Drive file', 'danger');
            });
        }
    }

    document.getElementById("googleDriveBtn")?.addEventListener("click", function() {
        if (MERGE_tokenClient) {
            MERGE_pendingAction = 'picker';
            if (!MERGE_oauthToken) MERGE_tokenClient.requestAccessToken();
            else createDrivePicker();
        } else {
            alert('Google Drive client initializing, please try again in a moment.');
        }
    });

    // Save to Google Drive
    document.getElementById("saveToDrive")?.addEventListener("click", function() {
        if (MERGE_tokenClient) {
            MERGE_pendingAction = 'save';
            if (!MERGE_oauthToken) MERGE_tokenClient.requestAccessToken();
            else handleSaveToDriveAction();
        } else {
            alert('Google Drive client initializing, please try again in a moment.');
        }
    });

    function handleSaveToDriveAction() {
        const downloadLinks = document.querySelectorAll('.split-files-container a.btn-outline-success');
        if (downloadLinks.length === 0) {
            alert('No output files found to save!');
            return;
        }

        const saveBtn = document.getElementById("saveToDrive");
        const originalHTML = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        downloadLinks.forEach((link, idx) => {
            fetch(link.href)
                .then(r => r.blob())
                .then(blob => {
                    const metadata = { name: `split_file_${idx + 1}.pdf`, parents: [] };
                    const form = new FormData();
                    form.append('metadata', new Blob([JSON.stringify(metadata)], { type: 'application/json' }));
                    form.append('file', blob);

                    fetch('https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart', {
                        method: 'POST',
                        headers: new Headers({ 'Authorization': `Bearer ${MERGE_oauthToken}` }),
                        body: form
                    }).then(() => {
                        saveBtn.innerHTML = originalHTML;
                        showNotification('File saved to Google Drive!', 'success');
                    });
                });
        });
    }

    // Dropbox Chooser
    document.getElementById("dropboxBtn")?.addEventListener("click", function() {
        if (typeof Dropbox !== 'undefined') {
            Dropbox.choose({
                linkType: "direct",
                multiselect: false,
                extensions: [".pdf"],
                success: function(files) {
                    if (files.length > 0) {
                        fetch(files[0].link)
                            .then(res => res.blob())
                            .then(blob => {
                                const file = new File([blob], files[0].name, { type: 'application/pdf' });
                                currentFiles = [file];
                                const dt = new DataTransfer();
                                dt.items.add(file);
                                fileInput.files = dt.files;
                                renderCurrentFilesList();
                                showNotification('File successfully loaded from Dropbox!', 'success');
                            });
                    }
                }
            });
        } else {
            alert('Dropbox API not loaded. Please refresh the page.');
        }
    });

    // Save to Dropbox
    document.getElementById("saveToDropbox")?.addEventListener("click", function() {
        const downloadLinks = document.querySelectorAll('.split-files-container a.btn-outline-success');
        if (downloadLinks.length === 0) {
            alert('No output files found to save!');
            return;
        }
        if (typeof Dropbox !== 'undefined') {
            const filesToSave = Array.from(downloadLinks).map((link, i) => ({
                url: link.href,
                filename: `split_document_${i + 1}.pdf`
            }));
            Dropbox.save({
                files: filesToSave,
                success: function() { showNotification('Files saved to Dropbox!', 'success'); },
                cancel: function() {}
            });
        }
    });

    // WhatsApp Share
    document.getElementById("shareOnWhatsApp")?.addEventListener("click", function() {
        let msg = "Check out my split PDF documents created with PDFTools:\n\n";
        document.querySelectorAll('.split-files-container a.btn-outline-success').forEach((l, i) => {
            msg += `Part ${i + 1}: ${l.href}\n`;
        });
        window.open(`https://wa.me/?text=${encodeURIComponent(msg)}`, '_blank');
    });

    // QR Code Modal
    window.openQrModal = function(url) {
        if (!url) return;
        const fileUrlInput = document.getElementById("fileUrlInput");
        if (fileUrlInput) fileUrlInput.value = url;

        const qrcodeDiv = document.getElementById("qrcode");
        if (qrcodeDiv) {
            qrcodeDiv.innerHTML = "";
            if (typeof QRCode !== 'undefined') {
                new QRCode(qrcodeDiv, { text: url, width: 180, height: 180 });
            }
        }
        const qrModal = document.getElementById('qrModal');
        if (qrModal && typeof bootstrap !== 'undefined') {
            new bootstrap.Modal(qrModal).show();
        }
    };

    window.copyUrl = function() {
        const input = document.getElementById("fileUrlInput");
        if (input) {
            input.select();
            navigator.clipboard.writeText(input.value)
                .then(() => showNotification('URL copied to clipboard!', 'success'))
                .catch(() => {
                    document.execCommand("copy");
                    showNotification('URL copied to clipboard!', 'success');
                });
        }
    };

    function showNotification(message, type = 'success') {
        const n = document.createElement('div');
        n.className = `alert alert-${type} position-fixed shadow-sm`;
        n.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 280px; animation: slideInRight 0.3s ease-out;';
        n.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} me-2"></i> ${message}`;
        document.body.appendChild(n);
        setTimeout(() => n.remove(), 4000);
    }

    // FAQ Accordion Toggle
    window.toggleFaq = function(element) {
        const faqCard = element.closest('.faq-card');
        const content = faqCard.querySelector('.faq-content');
        const icon = element.querySelector('svg');

        document.querySelectorAll('.faq-content').forEach(c => {
            if (c !== content) c.style.maxHeight = null;
        });
        document.querySelectorAll('.faq-header svg').forEach(i => {
            if (i !== icon) i.style.transform = 'rotate(0deg)';
        });

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.style.transform = 'rotate(0deg)';
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.style.transform = 'rotate(180deg)';
        }
    };

    // Initialize GIS and Picker
    window.addEventListener('load', () => {
        initializeGISClient();
        loadGooglePicker();
        updateConvertButtonState();
    });
</script>
@endsection
