@extends('main')
@section('title', __('pages-to-pdf.title'))
@section('description', __('pages-to-pdf.description'))

@push('head')
<link rel="stylesheet" href="{{ asset('css/wordtopdf.css') }}">
@endpush

@section('page')
<!-- Hero Section -->
<form action="{{ route('convert.pages') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="hero-section">
        <div class="container text-center py-4">
            <h1 class="hero-title mb-3">{{__('pages-to-pdf.wordtopdf_heading')}}</h1>

            <p class="lead mb-5">{{__('pages-to-pdf.heading-des')}}</p>
        </div>
        <!-- Upload Section -->
        <div class="upload-section" id="upload">
            <div class="container">
                <div class="upload-area" id="dropZone">
                    <div class="text-center" id="initialUpload">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#795ef1"
                            class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                        </svg>
                        <h3 class="mb-2">{{__('pages-to-pdf.droped')}}</h3>
                        <p class="text-muted mb-4">{{__('pages-to-pdf.upload')}}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-primary btn-upload" type="button" id="uploadBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                                </svg> {{__('pages-to-pdf.upload_files')}}
                            </button>
                            <input type="file" name="files[]" id="fileInput" accept=".pages" class="d-none"
                                multiple>

                        </div>

                        <!-- Preview Area -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4" id="filePreview"></div>

                        <!-- URL Input Container -->
                        <div class="url-input-container" id="urlInputContainer">
                            <div class="url-input-group">
                                <input type="text" class="url-input" id="urlInput" placeholder="Enter pages URL...">
                                <button class="url-close-btn" type="button" id="urlCloseBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </button>
                                <button class="url-submit-btn" type="button" id="urlSubmitBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="files-grid-container" id="filesGridContainer" style="width: 100%;"></div>

                <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                    <div class="source-item" id="googleDriveBtn">
                        <img src="{{ asset('images/drivelogo.svg') }}" alt="Google Drive" width="22" height="22">
                        <span>{{__('pages-to-pdf.g-drive')}}</span>
                    </div>
                    <div class="source-item" id="dropboxBtn">
                        <img src="{{ asset('images/Drop-icon.svg') }}" alt="Dropbox" width="22" height="22"
                            style="vertical-align:middle;">
                        <span>{{__('pages-to-pdf.dropbox')}}</span>
                    </div>
                    <div class="source-item" id="urlSourceBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path
                                d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                            <path
                                d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                        </svg>
                        <span>{{__('pages-to-pdf.url')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Result Section --}}
    @if (!empty($api_response) && !empty($api_response['data']))
    <section class="result-section resultnew" id="resultSection" style="display: block;">
        <div class="result-header">
            <h4><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1#795ef1"
                    class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                </svg> {{__('pages-to-pdf.result')}}</h4>
            <div class="d-flex gap-2">
                <a href="{{ route('download.pages.pdf', ['download_url' => $api_response['data'][0]['file_url'] ?? ($api_response['download_urls'][0] ?? '')]) }}" class="btn btn-sm btn-outline-primary"
                    target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path
                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                    </svg> {{__('pages-to-pdf.preview')}}
                </a>
                <a href="{{ route('pages-to-pdf') }}" class="btn btn-sm btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                    </svg> {{__('pages-to-pdf.Convert-an')}}
                </a>
            </div>
        </div>

        <div class="result-content mt-3">
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg> {{__('pages-to-pdf.msg')}}
            </div>

            @foreach ($api_response['data'] as $index => $file)
            <div class="row align-items-center mt-3">
                <!-- Original File -->
                <div class="col-5">
                    <h6 class="mb-1">{{__('pages-to-pdf.original')}}</h6>
                    <p class="text-muted mb-0 word-wrap">
                        @php
                        $originalName = basename($uploaded_files[$index] ?? '');
                        $originalName = urldecode($originalName);
                        $originalName = preg_replace('/^\d+_/', '', $originalName);
                        @endphp
                        {{ $originalName }}
                    </p>
                </div>

                <!-- Arrow -->
                <div class="col-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                        fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg>
                </div>

                <!-- Converted File -->
                <div class="col-5 text-end">
                    <h6 class="mb-1">{{__('pages-to-pdf.Converted')}}</h6>
                    <a href="{{ route('download.pages.pdf', ['download_url' => $file['file_url']]) }}"
                        class="btn btn-sm btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="#795ef1#795ef1" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                        </svg> {{__('pages-to-pdf.dn')}}
                    </a>

                </div>
            </div>
            @endforeach
        </div>
        </div>
        <div class="share-options mt-4">
            <h5 class="mb-3 text-center">{{__('pages-to-pdf.share')}}</h5>
            <div class="d-flex flex-wrap gap-2 justify-content-center">

                <button class="btn share-btn" id="saveToDrive" type="button" title="Save to Google Drive">
                    <img src="{{ asset('images/google-drive.svg') }}"
                        alt="Google Drive">
                </button>

                <button class="btn share-btn" id="saveToDropbox" type="button" title="Save to Dropbox">
                    <img src="{{ asset('images/dropbox.svg') }}"
                        alt="Dropbox">
                </button>

                <button class="btn share-btn" id="shareOnWhatsApp" type="button" title="Share on WhatsApp">
                    <img src="{{ asset('images/whatsapp.svg') }}" alt="WhatsApp">
                </button>

                <button class="btn share-btn" id="qrBtn" type="button"
                    @php
                    $qrUrl='' ;
                    $fileUrl = $api_response['data'][0]['file_url'] ?? ($api_response['download_urls'][0] ?? null);
                    if ($fileUrl) {
                        $qrUrl=route('download.pages.pdf', ['download_url'=> $fileUrl]);
                    }
                    @endphp
                    onclick="openQrModal('{{ $qrUrl }}')" title="Get shareable URL with QR Code">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M3 3h8v8H3V3zm2 2v4h4V5H5zm6-2h8v8h-8V3zm2 2v4h4V5h-4zM3 13h8v8H3v-8zm2 2v4h4v-4H5zm10 0h2v2h-2v-2zm-2 2h2v2h-2v-2zm4 0h2v2h-2v-2zm-2 2h2v2h-2v-2zm4 0h2v6h-6v-2h4v-4zm-8 2h2v2h-2v-2zm2 2h2v2h-2v-2z" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
    {{-- Scroll to resultSection --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const resultSection = document.getElementById('resultSection');
            if (resultSection) {
                resultSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    </script>
    @elseif(!empty($api_response) && empty($api_response['data']))
    {{-- ❌ Case 2: Response exists but no data --}}
    {{-- ❌ Case 2: Response exists but no data --}}
    <div id="error_alert" class="custom-toast">The API responded but no converted files were returned.</div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toast = document.getElementById('error_alert');
            if (toast) {
                toast.style.display = 'block';
                setTimeout(() => toast.style.display = 'none', 5000); // hide after 5s
            }
        });
    </script>
    @else
    {{-- ❌ Case 1: No response at all --}}
    <div class="alert alert-danger p-3 error_alert d-none" id="error_alert">
        We are unable to process your request for the time being!
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('error_alert')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    </script>
    @endif


    <!-- Conversion Section -->
    <section class="conversion-section" id="conversionSection">
        <div class="container">
            <div class="text-center mb-4">
                <h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1#795ef1"
                        class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                    </svg>{{__('pages-to-pdf.options')}}</h3>
                <p class="text-muted">{{__('pages-to-pdf.options-des')}}</p>
            </div>
            <div class="conversion-options d-flex flex-column align-items-center text-center">

                <div class="option-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#795ef1"
                        class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                    </svg>
                    <span>{{__('pages-to-pdf.format')}}</span>
                </div>

                <div class="format-options d-flex justify-content-center">
                    <div class="format-option active" id="pdfOption">
                        <input type="radio" id="pdfFormat" value="pdf" name="format" checked>
                        <label for="pdfFormat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                            </svg>{{__('pages-to-pdf.pdf')}}
                        </label>
                    </div>
                </div>

            </div>


            <div class="option-group">
                {{-- <div class="option-title">
                        <i class="fas fa-cog"></i>
                        <span>Conversion Settings</span>
                    </div> --}}

                {{-- <div class="option-card active">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="preserveFormatting" checked>
                            <label class="form-check-label" for="preserveFormatting">Preserve original formatting</label>
                        </div>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="extractImages" checked>
                            <label class="form-check-label" for="extractImages">Extract images</label>
                        </div>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="ocrOption">
                            <label class="form-check-label" for="ocrOption">Enable OCR for scanned PDFs</label>
                        </div>
                    </div>
                </div> --}}
                <button class="btn convert-btn" id="convertBtn" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true" role="img"
                        width="20" height="20"
                        style="vertical-align:middle; display:inline-block; fill:currentColor;">
                        <!-- right-pointing arrow (top) -->
                        <path
                            d="M497 273.3 383 361.6c-9.7 6.9-22.7 4.4-29.6-5.2s-4.4-22.7 5.2-29.6L408 256H104c-13.3 0-24-10.7-24-24s10.7-24 24-24h304L358.6 185.2c-9.6-6.9-12.1-19.9-5.2-29.6s19.9-12.1 29.6-5.2L497 238.7c8 5.7 8 17.7 0 23z" />
                        <!-- left-pointing arrow (bottom) -->
                        <path
                            d="M15 238.7 129 150.4c9.7-6.9 22.7-4.4 29.6 5.2s4.4 22.7-5.2 29.6L104 256h304c13.3 0 24 10.7 24 24s-10.7 24-24 24H104l75.4 47.6c9.6 6.9 12.1 19.9 5.2 29.6s-19.9 12.1-29.6 5.2L15 273.3c-8-5.7-8-17.7 0-23z" />
                    </svg>{{__('pages-to-pdf.convert-pdf')}}
                </button>
            </div>
        </div>
    </section>
</form>


<!-- Progress Bar Section for PDF to Word -->
<section class="progress-section" id="progressSectionWord" style="display: none;">
    <div class="container">
        <div class="upload-section">
            <div class="text-center">
                <h4 class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-arrow-repeat rotate-icon" viewBox="0 0 16 16">
                        <path
                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                        <path fill-rule="evenodd"
                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                    </svg>
                    {{__('pages-to-pdf.converting')}}
                </h4>

                <div class="progress-container" style="width: 100%; max-width: 600px; margin: 0 auto;">
                    <div class="progress"
                        style="height: 25px; border-radius: 15px; background-color: var(--light-gray);">
                        <div class="progress-bar" id="wordProgressBar"
                            style="background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%); 
                                    border-radius: 15px; 
                                    transition: width 0.3s ease;
                                    width: 0%;"
                            role="progressbar">
                        </div>
                    </div>

                    <div class="progress-text mt-3">
                        <p class="text-muted" id="wordProgressText">{{__('pages-to-pdf.preparing')}}</p>
                        <small class="text-muted" id="wordProgressPercentage">0%</small>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">{{__('pages-to-pdf.cnvrt')}}</span>
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
            <h2 class="fw-bold mb-3">{{__('pages-to-pdf.related_tools')}}</h2>
            {{-- <p class="text-muted">Discover our full suite of document utilities</p> --}}
        </div>

        <div class="row g-4">
            <div class="col-md-4 col-lg-2">
                <a href="{{ localized_route('pdf-to-word') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                            </svg>
                            <h3 class="card-title">{{__('pages-to-pdf.pDF-to-word')}}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-lg-2">
                <a href="{{ localized_route('jpg-to-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                <path
                                    d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                <path fill-rule="evenodd"
                                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                            </svg>
                            <h3 class="card-title">{{__('pages-to-pdf.jPG-to-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2">
                <a href="{{ localized_route('pdf-to-jpg') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                <path
                                    d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1z" />
                            </svg>
                            <h3 class="card-title">{{__('pages-to-pdf.pDF-to-jpg')}}</h3>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-4 col-lg-2">
                <a href="{{ localized_route('compress-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
                                <path
                                    d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438z" />
                                <path
                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                            </svg>
                            <h3 class="card-title">{{__('pages-to-pdf.compress-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2">
                <a href="{{ localized_route('merge-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-intersect" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2z" />
                            </svg>
                            <h3 class="card-title">{{__('pages-to-pdf.merge-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2">
                <a href="{{ localized_route('pdf.summerize') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
                            </svg>
                            <h3 class="card-title">{{__('pages-to-pdf.summarize-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
<div class="col">
                <a href="{{ localized_route('ppt-to-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-intersect" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2z" />
                            </svg>
                            <h3 class="card-title">{{__('pages-to-pdf.ppt-to-pdf')}}</h3>
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
            <h2 class="section-title">{{__('pages-to-pdf.steps')}}</h2>
            <p class="section-subtitle">{{__('pages-to-pdf.steps-des')}}</p>
        </div>

        <div class="timeline">
            <div class="step-card left">
                <div class="step-number">1</div>
                <h3 class="step-title">{{__('pages-to-pdf.file-source')}}</h3>
                <p class="step-text">{{__('pages-to-pdf.file-source-des')}}</p>
            </div>

            <div class="step-card right">
                <div class="step-number">2</div>
                <h3 class="step-title">{{__('pages-to-pdf.upload-file')}}</h3>
                <p class="step-text">{{__('pages-to-pdf.upload-file-des')}}</p>
            </div>

            <div class="step-card left">
                <div class="step-number">3</div>
                <h3 class="step-title">{{__('pages-to-pdf.preview-file')}}</h3>
                <p class="step-text">{{__('pages-to-pdf.preview-file-des')}}

                </p>
            </div>
            <div class="step-card right">
                <div class="step-number">4</div>
                <h3 class="step-title">{{__('pages-to-pdf.save')}}</h3>
                <p class="step-text">{{__('pages-to-pdf.save-des')}}
                </p>
            </div>
        </div>
    </div>
</section>


<section class="section bg-light">
    <div class="container p-5">
        <div class="col-12 bg-white rounded-3 p-4 shadow">
            <h2>{{__('pages-to-pdf.why-convert')}}</h2>

            <p>{{__('pages-to-pdf.why-convert-des')}}</p>

            <p>{{__('pages-to-pdf.why-convert-des2')}}</p>

            <p>{{__('pages-to-pdf.why-convert-des3')}}</p>

            <h2>{{__('pages-to-pdf.best-converter')}}</h2>

            <p>{{__('pages-to-pdf.best-converter-des')}}</p>

            <p>
                {{__('pages-to-pdf.best-converter-des2')}}
                <a href="{{ localized_route('word-to-pdf') }}">{{__('pages-to-pdf.best-converter-des2-1')}}</a>
            </p>

            <p>{{__('pages-to-pdf.best-converter-des3')}}</p>

            <p>{{__('pages-to-pdf.best-converter-des4')}}</p>

            <p>{{__('pages-to-pdf.best-converter-des5')}}</p>

            <h2>{{__('pages-to-pdf.key-feature')}}</h2>

            <h3 class="fs-5">{{__('pages-to-pdf.feature1')}}</h3>

            <p>{{__('pages-to-pdf.feature1-des')}}</p>

            <h3 class="fs-5">{{__('pages-to-pdf.feature2')}}</h3>


            <p>{{__('pages-to-pdf.feature2-des')}}</p>

        </div>
    </div>
</section>


<!-- Features Section -->
<section class="section bg-light">
    <div class="container p-5">
        <div class="text-center mb-5">
            <h2 class="section-title">{{__('pages-to-pdf.f')}}</h2>
            <p class="section-subtitle">{{__('pages-to-pdf.f1-des')}}</p>
        </div>

        <div class="features-grid">
            {{-- <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-magic" viewBox="0 0 16 16">
                            <path
                                d="M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707zM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1zM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707zM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0z" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Perfect Formatting</h3>
                    <p class="feature-text">Preserves fonts, tables, images, and layout from your original PDF with
                        industry-leading accuracy.</p>
                </div> --}}

            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                        <path
                            d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f1')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f1-des')}}
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-file-lock2-fill" viewBox="0 0 16 16">
                        <path d="M7 6a1 1 0 0 1 2 0v1H7z" />
                        <path
                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f2')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f2-des')}}</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path
                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f3')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f3-des')}} <a href="https://www.pdftools.net/">{{__('pages-to-pdf.a')}}</a> {{__('pages-to-pdf.f3-des2')}}</p>
            </div>



            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f4')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f4-des')}}
                </p>
            </div>



            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f5')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f5-des')}}
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f6')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f6-des')}}
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-file-earmark-lock-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 7a1 1 0 0 1 2 0v1H7zM6 9.3c0-.042.02-.107.105-.175A.64.64 0 0 1 6.5 9h3a.64.64 0 0 1 .395.125c.085.068.105.133.105.175v2.4c0 .042-.02.107-.105.175A.64.64 0 0 1 9.5 12h-3a.64.64 0 0 1-.395-.125C6.02 11.807 6 11.742 6 11.7z" />
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f7')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f7-des')}}</p>
            </div>


            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-tablet" viewBox="0 0 16 16">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </div>
                <h3 class="feature-title">{{__('pages-to-pdf.f8')}}</h3>
                <p class="feature-text">{{__('pages-to-pdf.f8-des')}}</p>
            </div>


        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container p-5">
        <div class="col-12 bg-white rounded-3 p-4 shadow">
            <h2>{{__('pages-to-pdf.benifits')}}</h2>
            <ul>
                <li>
                    <p>{{__('pages-to-pdf.benifits1')}}</p>
                </li>
            </ul>
            <ul>
                <li>
                    <p>{{__('pages-to-pdf.benifits2')}}</p>
                </li>
            </ul>
            <ul>
                <li>
                    <p>{{__('pages-to-pdf.benifits3')}}</p>
                </li>
            </ul>

            <h2>{{__('pages-to-pdf.benifits4')}}</h2>
            <p>{{__('pages-to-pdf.benifits5')}}</p>
            <p>{{__('pages-to-pdf.benifits6')}}</p>


        </div>

    </div>
</section>


<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{__('pages-to-pdf.faq-title')}}</h2>

        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pages-to-pdf.faq-1-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p> <a href="https://www.pdftools.net/">{{__('pages-to-pdf.a')}}</a> {{__('pages-to-pdf.faq-1-answer')}}
                        </p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pages-to-pdf.faq-2-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pages-to-pdf.faq-2-answer')}} </p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pages-to-pdf.faq-3-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pages-to-pdf.faq-3-answer')}}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pages-to-pdf.faq-4-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pages-to-pdf.faq-4-answer')}}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pages-to-pdf.faq-5-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pages-to-pdf.faq-5-answer')}}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pages-to-pdf.faq-6-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pages-to-pdf.faq-6-answer')}}</p>
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
                <!-- Input box with URL and Copy Button -->
                <div class="input-group mb-3">
                    <input type="text" id="fileUrlInput" class="form-control" readonly>
                    <button class="btn btn-outline-secondary" type="button" onclick="copyUrl()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path
                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </button>
                </div>
                <!-- QR Code will be shown here -->
                <div id="qrcode" class="text-center"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- QRCode Library -->
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

<script src="https://apis.google.com/js/api.js"></script>
<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs"
    data-app-key="1sf5bictc5t4exu"></script>
<script>
    const uploadBtn = document.getElementById("uploadBtn");
    const fileInput = document.getElementById("fileInput");
    const dropZone = document.getElementById("dropZone");
    const urlSourceBtn = document.getElementById('urlSourceBtn');
    const filesGridContainer = document.getElementById("filesGridContainer");

    // ============ DRAG AND DROP FUNCTIONALITY ============
    let dragCounter = 0;
    let currentFiles = []; // Keep track of files in memory

    // Prevent default drag behaviors on the entire document
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        document.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight drop zone when file is dragged over it
    dropZone.addEventListener('dragenter', function(e) {
        dragCounter++;
        dropZone.classList.add('drag-over');
    }, false);

    dropZone.addEventListener('dragover', function(e) {
        dropZone.classList.add('drag-over');
    }, false);

    dropZone.addEventListener('dragleave', function(e) {
        dragCounter--;
        if (dragCounter === 0) {
            dropZone.classList.remove('drag-over');
        }
    }, false);

    // Handle dropped files - FIXED VERSION
    dropZone.addEventListener('drop', function(e) {
        dragCounter = 0;
        dropZone.classList.remove('drag-over');

        const dt = e.dataTransfer;
        const droppedFiles = Array.from(dt.files);

        if (droppedFiles.length > 0) {
            // Validate PDF files
            const pdfFiles = droppedFiles.filter(file => file.type ===
                'application/vnd.apple.pages' ||
                file.type === 'application/x-iwork-pages-sffpages' || file.name
                .toLowerCase().endsWith('.pages') || file.name.toLowerCase().endsWith('.pages'));

            if (pdfFiles.length === 0) {
                alert('Please drop only pages files!');
                return;
            }

            if (pdfFiles.length < droppedFiles.length) {
                alert('Only pages files will be uploaded. Other files were ignored.');
            }

            // Update current files array
            currentFiles = pdfFiles;

            // Update file input
            const dataTransfer = new DataTransfer();
            pdfFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;

            console.log('Files after drop:', fileInput.files.length); // Debug log

            // Trigger change event to show preview
            const event = new Event('change', {
                bubbles: true
            });
            fileInput.dispatchEvent(event);
        }
    }, false);

    // Add CSS for drag-over state
    const style = document.createElement('style');
    style.textContent = `
    .drag-over {
        border: 3px dashed #795ef1 !important;
        background: rgba(121, 94, 241, 0.05) !important;
        transform: scale(1.02);
        transition: all 0.3s ease;
    }
    
    .upload-area {
        transition: all 0.3s ease;
    }
`;
    document.head.appendChild(style);

    // Trigger input on button click
    uploadBtn.addEventListener("click", () => fileInput.click());

    // User for clicking on from url
    if (document.getElementById('urlSourceBtn')) {
        document.getElementById('urlSourceBtn').addEventListener('click', function() {
            document.getElementById('urlInputContainer').style.display = 'block';
        });
    }

    if (document.getElementById('urlCloseBtn')) {
        document.getElementById('urlCloseBtn').addEventListener('click', function() {
            document.getElementById('urlInputContainer').style.display = 'none';
        });
    }

    // Show styled preview on file selection - UPDATED VERSION
    fileInput.addEventListener("change", (event) => {
        const files = Array.from(event.target.files);

        console.log('Change event triggered, files:', files.length); // Debug log

        if (!files.length) return;

        // Store files in memory
        currentFiles = files;

        // Validate file types
        // Validate file types for Pages files
        const invalidFiles = files.filter(file =>
            file.type !== 'application/vnd.apple.pages' &&
            file.type !== 'application/x-iwork-pages-sffpages' &&
            !file.name.toLowerCase().endsWith('.pages')
        );
        if (invalidFiles.length > 0) {
            alert('Please select only pages files!');
            fileInput.value = '';
            currentFiles = [];
            return;
        }


        // Hide dropzone
        dropZone.style.display = "none";

        filesGridContainer.innerHTML = ""; // reset container

        // Summary + grid
        const summaryHTML = `
        <div class="files-summary" style="text-align: center; margin-bottom: 20px;">
            <i class="fas fa-file-pdf" style="color: #dc3545; font-size: 2rem; margin-bottom: 10px;"></i>
            <h4 style="color: #333; margin-bottom: 5px;">
                ${files.length} Pages File${files.length > 1 ? "s" : ""} Selected
            </h4>
            <p style="color: #6c757d; margin-bottom: 0;">
                Ready for conversion to PDF format
            </p>
        </div>
        <div class="file-cards-grid" style="
            display: flex; 
            gap: 15px; 
            flex-wrap: wrap; 
            justify-content: center;
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
        " id="fileCardsGrid"></div>
        <div class="action-buttons" style="margin-top: 25px; text-align: center;">
            <button class="change-files-btn btn btn-outline-secondary btn-sm" id="changeFilesBtn" style="
                padding: 8px 20px;
                border-radius: 20px;
                font-weight: 500;
            ">
                <i class="fas fa-sync-alt" style="margin-right: 6px;"></i>
                Change Files
            </button>
            <div style="margin-top: 10px; font-size: 12px; color: #6c757d;">
                Click on cards to preview • Use remove (×) to delete individual files
            </div>
        </div>
    `;
        filesGridContainer.insertAdjacentHTML("beforeend", summaryHTML);

        const fileCardsGrid = document.getElementById("fileCardsGrid");

        // Create each file card
        files.forEach((file, index) => {
            let sizeText;
            if (file.size >= 1024 * 1024) {
                sizeText = (file.size / (1024 * 1024)).toFixed(2) + " MB";
            } else {
                sizeText = (file.size / 1024).toFixed(2) + " KB";
            }

            const shortName = file.name.length > 20 ? file.name.slice(0, 20) + "..." : file.name;

            const cardHTML = `
        <div class="file-preview-card" data-file-index="${index}" style="
            border: 2px solid #e9ecef; 
            border-radius: 12px; 
            padding: 15px; 
            margin: 8px; 
            width: 200px; 
            text-align: center;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        ">
           <button class="remove-file-btn" data-file-index="${index}" style="
    position: absolute;
    top: 8px;
    right: 8px;
    width: 24px;
    height: 24px;
    border: none;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    font-size: 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
" title="Remove this file">
    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 14 14" fill="none">
        <path d="M1 1L13 13M13 1L1 13" stroke="white" stroke-width="4" stroke-linecap="round"/>
    </svg>
</button>


            <div class="file-preview-image" style="
                width: 100%; 
                height: 120px; 
                background: linear-gradient(135deg, #dc3545, #fd7e86); 
                border-radius: 8px; 
                display: flex; 
                align-items: center; 
                justify-content: center; 
                margin-bottom: 10px; 
                position: relative; 
                overflow: hidden;
            ">
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);"></div>
                <svg style="width: 48px; height: 48px; color: white; z-index: 1;" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M11,4V16L14.5,13.5L18,16V4H11Z"></path>
                </svg>
                <div style="position: absolute; bottom: 5px; right: 8px; background: rgba(0,0,0,0.6); color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px; z-index: 1;">
                    Pages
                </div>
            </div>

            <div class="file-info" style="text-align: center;">
                <div class="file-name" title="${file.name}" style="
                    font-weight: 600; 
                    color: #333; 
                    font-size: 14px;
                    margin-bottom: 5px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                ">${shortName}</div>
                <div class="file-size" style="
                    color: #6c757d; 
                    font-size: 12px;
                    margin-bottom: 8px;
                ">${sizeText}</div>
                <div class="file-status" style="
                    padding: 4px 8px;
                    background: #d4edda;
                    color: #155724;
                    border-radius: 20px;
                    font-size: 11px;
                    font-weight: 500;
                ">
                    <i class="fas fa-check-circle" style="margin-right: 4px;"></i>
                    Ready to Convert
                </div>
            </div>
        </div>
    `;
            fileCardsGrid.insertAdjacentHTML("beforeend", cardHTML);
        });

        const conversionSection = document.getElementById("conversionSection");
        if (conversionSection) {
            conversionSection.style.display = "block";
            conversionSection.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        }

        // Handle remove file button
        fileCardsGrid.querySelectorAll(".remove-file-btn").forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.stopPropagation();
                const idx = parseInt(e.currentTarget.dataset.fileIndex);

                // Remove from current files array
                currentFiles.splice(idx, 1);

                // Update file input
                fileInput.files = createFileList(currentFiles);

                // Remove card
                btn.closest(".file-preview-card").remove();

                // Update file card indices
                fileCardsGrid.querySelectorAll(".file-preview-card").forEach((card,
                    newIndex) => {
                    card.dataset.fileIndex = newIndex;
                    card.querySelector(".remove-file-btn").dataset.fileIndex = newIndex;
                });

                // Update summary count
                const summary = filesGridContainer.querySelector(".files-summary h4");
                if (summary) {
                    summary.textContent =
                        `${currentFiles.length} Pages File${currentFiles.length !== 1 ? "s" : ""} Selected`;
                }

                // If no files left, show dropzone
                if (!currentFiles.length) {
                    filesGridContainer.innerHTML = "";
                    dropZone.style.display = "block";
                    const conversionSection = document.getElementById("conversionSection");
                    if (conversionSection) {
                        conversionSection.style.display = "none";
                    }
                }
            });
        });

        // Change Files button
        const changeFilesBtn = document.getElementById("changeFilesBtn");
        if (changeFilesBtn) {
            changeFilesBtn.addEventListener("click", () => {
                dropZone.style.display = "block";
                filesGridContainer.innerHTML = "";
                fileInput.value = "";
                currentFiles = [];
                const conversionSection = document.getElementById("conversionSection");
                if (conversionSection) {
                    conversionSection.style.display = "none";
                }
                document.querySelector(".hero-section")?.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            });
        }
    });

    // Helper to update FileList after removal
    function createFileList(files) {
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        return dataTransfer.files;
    }

    // ============ PDF TO WORD PROGRESS BAR ============
    let wordProgressInterval;
    let wordCurrentProgress = 0;

    // Convert to Word button click event - FIXED VERSION
    const convertBtn = document.getElementById('convertBtn');
    if (convertBtn) {
        convertBtn.addEventListener('click', function(e) {
            const fileInput = document.getElementById('fileInput');

            console.log('Convert button clicked');
            console.log('Files in input:', fileInput.files.length);
            console.log('Files in memory:', currentFiles.length);

            // Check both fileInput and currentFiles array
            if ((!fileInput.files || fileInput.files.length === 0) && currentFiles.length === 0) {
                alert('Please select a Pages file to convert');
                e.preventDefault();
                return false;
            }

            // If fileInput is empty but currentFiles has files, update fileInput
            if (fileInput.files.length === 0 && currentFiles.length > 0) {
                fileInput.files = createFileList(currentFiles);
                console.log('Updated fileInput with currentFiles');
            }

            showWordProgressBar();
            startWordProgress();
        });
    }

    function showWordProgressBar() {
        const conversionSection = document.getElementById('conversionSection');
        if (conversionSection) {
            conversionSection.style.display = 'none';
        }

        const progressSection = document.getElementById('progressSectionWord');
        if (progressSection) {
            progressSection.style.display = 'block';
            progressSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        wordCurrentProgress = 0;
        updateWordProgress(0, 'Preparing Pages for conversion...');
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
            'Preparing Pages for conversion...',
            'Uploading Pages to server...',
            'Analyzing document structure...',
            'Converting text and formatting...',
            'Processing images and tables...',
            'Generating PDF document...',
            'Finalizing conversion...'
        ];

        wordProgressInterval = setInterval(() => {
            wordCurrentProgress += Math.random() * 7 + 3;

            if (wordCurrentProgress >= 88) {
                wordCurrentProgress = 88;
                clearInterval(wordProgressInterval);
            }

            const messageIndex = Math.min(Math.floor(wordCurrentProgress / 13), messages.length - 1);
            updateWordProgress(wordCurrentProgress, messages[messageIndex]);
        }, 1200);
    }

    function completeWordProgress() {
        if (wordProgressInterval) {
            clearInterval(wordProgressInterval);
        }

        updateWordProgress(100, 'Conversion completed successfully!');

        setTimeout(() => {
            const progressSection = document.getElementById('progressSectionWord');
            if (progressSection) {
                progressSection.style.display = 'none';
            }
        }, 2000);
    }

    // ============ PAGE LOAD HANDLERS ============
    document.addEventListener('DOMContentLoaded', function() {
        const resultSection = document.getElementById('resultSection');

        if (resultSection && resultSection.style.display === 'block') {
            setTimeout(() => {
                const progressSection = document.getElementById('progressSectionWord');
                if (progressSection && progressSection.style.display === 'block') {
                    completeWordProgress();
                }
            }, 800);
        }

        const downloadLinks = document.querySelectorAll('.btn-outline-success');
        if (downloadLinks.length > 0) {
            setTimeout(() => {
                const progressSection = document.getElementById('progressSectionWord');
                if (progressSection && progressSection.style.display === 'block') {
                    completeWordProgress();
                }
            }, 800);
        }

        // Tooltip initialization
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Debug function
        setTimeout(debugFiles, 2000);
    });

    // ============ GOOGLE DRIVE INTEGRATION ============
    const CLIENT_ID = "453547203634-gq6s8qhh8havv73180v715hgqe615f2g.apps.googleusercontent.com";
    const API_KEY = "AIzaSyA8s9vg7KVtkSzPjeAVsvii8gINjJ9_ep8";
    const SCOPES = 'https://www.googleapis.com/auth/drive.file';

    let pickerApiLoaded = false;
    let oauthToken;

    function loadAuth() {
        if (typeof gapi !== 'undefined') {
            gapi.load('auth2', function() {
                gapi.auth2.init({
                    client_id: CLIENT_ID
                });
            });
        }
    }

    function loadPicker() {
        if (typeof gapi !== 'undefined') {
            gapi.load('picker', {
                'callback': function() {
                    pickerApiLoaded = true;
                }
            });
        }
    }

    const googleDriveBtn = document.getElementById("googleDriveBtn");
    if (googleDriveBtn) {
        googleDriveBtn.addEventListener("click", function() {
            if (typeof gapi !== 'undefined') {
                gapi.auth2.getAuthInstance().signIn().then(function(googleUser) {
                    oauthToken = googleUser.getAuthResponse().access_token;
                    createPicker();
                });
            } else {
                alert('Google Drive API not loaded. Please refresh the page.');
            }
        });
    }

    function createPicker() {
        if (pickerApiLoaded && oauthToken) {
            const picker = new google.picker.PickerBuilder()
                .addView(google.picker.ViewId.DOCS)
                .setOAuthToken(oauthToken)
                .setDeveloperKey(API_KEY)
                .setCallback(pickerCallback)
                .build();
            picker.setVisible(true);
        }
    }

    function pickerCallback(data) {
        if (data.action === google.picker.Action.PICKED) {
            const file = data.docs[0];
            const fileUrl = file.url;
            console.log("Selected File URL: ", fileUrl);

            const uploadArea = document.getElementById("fileInput");
            if (uploadArea) {
                uploadArea.value = fileUrl;
            }
        }
    }

    loadAuth();
    loadPicker();

    // ============ DROPBOX INTEGRATION ============
    const dropboxBtn = document.getElementById("dropboxBtn");
    if (dropboxBtn) {
        dropboxBtn.addEventListener("click", function() {
            if (typeof Dropbox !== 'undefined') {
                Dropbox.choose({
                    linkType: "direct",
                    multiselect: true,
                    extensions: [".pages"],

                    success: function(files) {
                        files.forEach(file => {
                            fetch(file.link)
                                .then(res => res.blob())
                                .then(blob => {
                                    const dropboxFile = new File([blob], file.name, {
                                        type: 'application/vnd.apple.pages'
                                    });

                                    currentFiles.push(dropboxFile);
                                    fileInput.files = createFileList(currentFiles);
                                    fileInput.dispatchEvent(new Event("change"));
                                });
                        });
                    },
                    cancel: function() {
                        console.log("Dropbox selection cancelled");
                    }
                });
            } else {
                alert('Dropbox API not loaded. Please refresh the page.');
            }
        });
    }

    // ============ URL INPUT SUBMIT - WITH ENHANCED LOADING FOR WORD FILES ============
    const urlSubmitBtn = document.getElementById('urlSubmitBtn');
    if (urlSubmitBtn) {
        urlSubmitBtn.addEventListener('click', function() {
            const urlInput = document.getElementById('urlInput');
            const url = urlInput ? urlInput.value.trim() : '';

            if (!url) {
                showNotification('Please enter a valid Pages URL', 'warning');
                return;
            }

            if (
                !url.toLowerCase().endsWith('.pages') &&
                !url.includes('.pages?')
            ) {
                showNotification('Please enter a valid pages file URL', 'warning');
                return;
            }

            // Show loading overlay
            showURLLoadingOverlay('Pages');

            // Show loading state on button
            const originalBtnHTML = urlSubmitBtn.innerHTML;
            urlSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            urlSubmitBtn.disabled = true;

            // Try multiple methods to fetch the Pages file
            fetchWordFromURL(url)
                .then(blob => {
                    // Update loading message
                    updateURLLoadingMessage('Processing Pages file...');

                    // Get filename from URL or use default
                    const urlParts = url.split('/');
                    let filename = urlParts[urlParts.length - 1].split('?')[0] || 'downloaded.pages';

                    // Ensure .pages extension
                    if (
                        !filename.toLowerCase().endsWith('.pages')
                    ) {
                        filename += '.pages';
                    }

                    // Create File object
                    const file = new File([blob], filename, {
                        type: 'application/vnd.apple.pages'
                    });

                    // Add to currentFiles array
                    currentFiles.push(file);

                    // Update file input
                    const dataTransfer = new DataTransfer();
                    currentFiles.forEach(f => dataTransfer.items.add(f));
                    fileInput.files = dataTransfer.files;

                    // Final loading message
                    updateURLLoadingMessage('Pages file loaded successfully!');

                    // Small delay for user to see success message
                    setTimeout(() => {
                        // Trigger change event
                        fileInput.dispatchEvent(new Event("change"));

                        // Reset URL input
                        urlInput.value = '';
                        document.getElementById('urlInputContainer').style.display = 'none';

                        // Reset button
                        urlSubmitBtn.innerHTML = originalBtnHTML;
                        urlSubmitBtn.disabled = false;

                        // Hide loading overlay
                        hideURLLoadingOverlay();

                        showNotification('Pages file successfully loaded from URL!', 'success');
                    }, 800);
                })
                .catch(error => {
                    console.error('Error fetching Pages file from URL:', error);

                    // Reset button
                    urlSubmitBtn.innerHTML = originalBtnHTML;
                    urlSubmitBtn.disabled = false;

                    // Hide loading overlay
                    hideURLLoadingOverlay();

                    // Show user-friendly error with solution
                    showNotification('Failed to load Pages file from URL', 'danger');

                    setTimeout(() => {
                        alert('Failed to load Pages file from URL.\n\nPossible solutions:\n1. Check if the URL is correct and accessible\n2. Try downloading the Pages file first, then upload it\n3. Some URLs require authentication and cannot be loaded directly\n\nError: ' +
                            error.message);
                    }, 300);
                });
        });
    }

    // Function to show URL loading overlay
    function showURLLoadingOverlay(fileType = 'Pages') {
        // Remove existing overlay if any
        const existingOverlay = document.getElementById('urlLoadingOverlay');
        if (existingOverlay) {
            existingOverlay.remove();
        }

        const overlay = document.createElement('div');
        overlay.id = 'urlLoadingOverlay';
        overlay.innerHTML = `
        <div class="url-loading-content">
            <div class="url-loading-spinner">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="url-loading-text">
                <h5 id="urlLoadingTitle">Fetching ${fileType} file from URL...</h5>
                <p id="urlLoadingMessage">Please wait while we download your file</p>
            </div>
            <div class="url-loading-progress">
                <div class="progress" style="height: 4px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" 
                         role="progressbar" 
                         style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
    `;

        document.body.appendChild(overlay);

        // Add styles
        const style = document.createElement('style');
        style.id = 'urlLoadingStyles';
        style.textContent = `
        #urlLoadingOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-in;
        }

        .url-loading-content {
            background: white;
            border-radius: 16px;
            padding: 40px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.4s ease-out;
        }

        .url-loading-spinner {
            margin-bottom: 25px;
        }

        .url-loading-text h5 {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .url-loading-text p {
            color: #6c757d;
            margin-bottom: 25px;
            font-size: 0.95rem;
        }

        .url-loading-progress {
            margin-top: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }
    `;

        const existingStyle = document.getElementById('urlLoadingStyles');
        if (existingStyle) {
            existingStyle.remove();
        }
        document.head.appendChild(style);
    }

    // Function to update loading message
    function updateURLLoadingMessage(message) {
        const messageElement = document.getElementById('urlLoadingMessage');
        if (messageElement) {
            messageElement.textContent = message;
            messageElement.style.animation = 'pulse 0.5s ease';
        }
    }

    // Function to hide URL loading overlay
    function hideURLLoadingOverlay() {
        const overlay = document.getElementById('urlLoadingOverlay');
        if (overlay) {
            overlay.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                overlay.remove();
                const style = document.getElementById('urlLoadingStyles');
                if (style) {
                    style.remove();
                }
            }, 300);
        }
    }

    // Function to fetch Pages file with multiple fallback methods and loading updates
    async function fetchWordFromURL(url) {
        // Method 1: Direct fetch
        try {
            console.log('Trying direct fetch...');
            updateURLLoadingMessage('Attempting direct download...');

            const response = await fetch(url);
            if (response.ok) {
                const blob = await response.blob();
                if (blob.size > 0) {
                    console.log('Direct fetch successful');
                    return blob;
                }
            }
            throw new Error('Direct fetch failed');
        } catch (error) {
            console.log('Direct fetch failed:', error.message);
        }

        // Method 2: Fetch with cors mode
        try {
            console.log('Trying fetch with CORS mode...');
            updateURLLoadingMessage('Trying alternative method...');

            const response = await fetch(url, {
                mode: 'cors'
            });
            if (response.ok) {
                const blob = await response.blob();
                if (blob.size > 0) {
                    console.log('CORS fetch successful');
                    return blob;
                }
            }
            throw new Error('CORS fetch failed');
        } catch (error) {
            console.log('CORS fetch failed:', error.message);
        }

        // Method 3: Try with CORS proxy
        const corsProxies = [
            'https://api.allorigins.win/raw?url=',
            'https://corsproxy.io/?',
            'https://cors-anywhere.herokuapp.com/'
        ];

        for (let i = 0; i < corsProxies.length; i++) {
            const proxy = corsProxies[i];
            try {
                console.log(`Trying with proxy: ${proxy}`);
                updateURLLoadingMessage(`Using proxy server (${i + 1}/${corsProxies.length})...`);

                const response = await fetch(proxy + encodeURIComponent(url));
                if (response.ok) {
                    const blob = await response.blob();
                    if (blob.size > 0) {
                        console.log('Proxy fetch successful');
                        return blob;
                    }
                }
            } catch (error) {
                console.log(`Proxy ${proxy} failed:`, error.message);
            }
        }

        throw new Error('All fetch methods failed. The URL may require authentication or may not be accessible.');
    }

    // Also allow Enter key to submit URL
    const urlInput = document.getElementById('urlInput');
    if (urlInput) {
        urlInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const submitBtn = document.getElementById('urlSubmitBtn');
                if (submitBtn && !submitBtn.disabled) {
                    submitBtn.click();
                }
            }
        });
    }

    // Enhanced notification function
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed`;
        notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 10000;
        min-width: 300px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        animation: slideInRight 0.3s ease-out;
    `;

        const icon = type === 'success' ? 'check-circle' :
            type === 'warning' ? 'exclamation-triangle' :
            'exclamation-circle';

        notification.innerHTML = `
        <i class="fas fa-${icon} me-2"></i>
        ${message}
        <button type="button" class="btn-close float-end" onclick="this.parentElement.remove()"></button>
    `;

        document.body.appendChild(notification);

        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.animation = 'slideOutRight 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    }

    // Add notification animation styles if not already present
    if (!document.getElementById('notificationStyles')) {
        const notifStyle = document.createElement('style');
        notifStyle.id = 'notificationStyles';
        notifStyle.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
        document.head.appendChild(notifStyle);
    }

    // Make functions globally available
    window.showURLLoadingOverlay = showURLLoadingOverlay;
    window.hideURLLoadingOverlay = hideURLLoadingOverlay;
    window.updateURLLoadingMessage = updateURLLoadingMessage;
    window.fetchWordFromURL = fetchWordFromURL;
    window.showNotification = showNotification;

    // ============ SAVE TO GOOGLE DRIVE ============
    const saveToDrive = document.getElementById("saveToDrive");
    if (saveToDrive) {
        saveToDrive.addEventListener("click", function(e) {
            e.preventDefault();
            const convertedFiles = [];
            const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');

            downloadLinks.forEach((link, index) => {
                const fileUrl = link.href;
                const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')
                    ?.textContent.trim();
                const fileName = originalFileName ? originalFileName.replace('.pages', '.pdf').replace(
                        '.pages', '.pdf') :
                    `converted_file_${index + 1}.pdf`;

                convertedFiles.push({
                    url: fileUrl,
                    name: fileName
                });
            });

            console.log('Found converted files:', convertedFiles);

            if (convertedFiles.length === 0) {
                alert('No files found to save!');
                return;
            }

            if (typeof gapi !== 'undefined') {
                gapi.auth2.getAuthInstance().signIn().then(function(googleUser) {
                    const accessToken = googleUser.getAuthResponse().access_token;
                    saveFilesToGoogleDrive(convertedFiles, accessToken);
                }).catch(function(error) {
                    console.error('Google Drive authentication failed:', error);
                    alert('Failed to authenticate with Google Drive. Please try again.');
                });
            } else {
                alert('Google Drive API not loaded. Please refresh the page.');
            }
        });
    }

    function saveFilesToGoogleDrive(files, accessToken) {
        let savedCount = 0;
        const totalFiles = files.length;

        const saveBtn = document.getElementById("saveToDrive");
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
        saveBtn.disabled = true;

        files.forEach((file, index) => {
            fetch(file.url)
                .then(response => response.blob())
                .then(blob => {
                    const metadata = {
                        name: file.name,
                        parents: []
                    };

                    const form = new FormData();
                    form.append('metadata', new Blob([JSON.stringify(metadata)], {
                        type: 'application/json'
                    }));
                    form.append('file', blob);

                    fetch('https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart', {
                            method: 'POST',
                            headers: new Headers({
                                'Authorization': `Bearer ${accessToken}`
                            }),
                            body: form
                        })
                        .then(response => response.json())
                        .then(data => {
                            savedCount++;
                            console.log(`File ${savedCount} saved to Google Drive:`, data);

                            if (savedCount === totalFiles) {
                                saveBtn.innerHTML = '<i class="fas fa-check"></i> Saved to Drive!';
                                saveBtn.classList.remove('btn-outline-primary');
                                saveBtn.classList.add('btn-success');

                                setTimeout(() => {
                                    saveBtn.innerHTML = originalText;
                                    saveBtn.classList.remove('btn-success');
                                    saveBtn.classList.add('btn-outline-primary');
                                    saveBtn.disabled = false;
                                }, 3000);

                                alert(`Successfully saved ${totalFiles} file(s) to Google Drive!`);
                            }
                        })
                        .catch(error => {
                            console.error('Error saving to Google Drive:', error);
                            saveBtn.innerHTML = originalText;
                            saveBtn.disabled = false;
                            alert('Error saving files to Google Drive. Please try again.');
                        });
                })
                .catch(error => {
                    console.error('Error fetching file:', error);
                    saveBtn.innerHTML = originalText;
                    saveBtn.disabled = false;
                    alert('Error downloading files. Please try again.');
                });
        });
    }

    // ============ SAVE TO DROPBOX ============
    const saveToDropbox = document.getElementById("saveToDropbox");
    if (saveToDropbox) {
        saveToDropbox.addEventListener("click", function(e) {
            e.preventDefault();
            const convertedFiles = [];
            const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');

            downloadLinks.forEach((link, index) => {
                const fileUrl = link.href;
                const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')
                    ?.textContent.trim();
                const fileName = originalFileName ? originalFileName.replace('.pages', '.pdf').replace(
                        '.pages', '.pdf') :
                    `converted_file_${index + 1}.pdf`;

                convertedFiles.push({
                    url: fileUrl,
                    name: fileName
                });
            });

            console.log('Found converted files for Dropbox:', convertedFiles);

            if (convertedFiles.length === 0) {
                alert('No files found to save!');
                return;
            }

            saveFilesToDropbox(convertedFiles);
        });
    }

    function saveFilesToDropbox(files) {
        const saveBtn = document.getElementById("saveToDropbox");
        const originalText = saveBtn.innerHTML;

        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Connecting to Dropbox...';
        saveBtn.disabled = true;

        processDropboxFileWithAuth(files, 0, saveBtn, originalText);
    }

    function processDropboxFileWithAuth(files, index, saveBtn, originalText) {
        if (index >= files.length) {
            saveBtn.innerHTML = '<i class="fas fa-check"></i> All Files Saved!';
            saveBtn.classList.remove('btn-outline-primary');
            saveBtn.classList.add('btn-success');

            setTimeout(() => {
                saveBtn.innerHTML = originalText;
                saveBtn.classList.remove('btn-success');
                saveBtn.classList.add('btn-outline-primary');
                saveBtn.disabled = false;
            }, 3000);

            alert(
                `Successfully initiated save for ${files.length} file(s) to Dropbox! Please check your Dropbox account.`
            );
            return;
        }

        const file = files[index];
        saveBtn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Processing ${index + 1}/${files.length}...`;

        console.log(`Attempting to save file: ${file.name} from URL: ${file.url}`);
        tryDropboxSave(file, index, files, saveBtn, originalText);
    }

    function tryDropboxSave(file, index, files, saveBtn, originalText) {
        console.log('Trying Method 1: Direct URL save');

        if (typeof Dropbox === 'undefined') {
            alert('Dropbox API not loaded. Please refresh the page.');
            saveBtn.innerHTML = originalText;
            saveBtn.disabled = false;
            return;
        }

        Dropbox.save({
            files: [{
                url: file.url,
                filename: file.name
            }],
            success: function() {
                console.log(`File "${file.name}" successfully saved to Dropbox via direct URL`);

                setTimeout(() => {
                    processDropboxFileWithAuth(files, index + 1, saveBtn, originalText);
                }, 1500);
            },
            error: function(errorMessage) {
                console.log('Method 1 failed, trying Method 2: Fetch and create blob URL');
                fetchAndSaveToDropbox(file, index, files, saveBtn, originalText);
            },
            cancel: function() {
                console.log('User cancelled Dropbox save');
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
                alert('Dropbox save cancelled by user.');
            }
        });
    }

    function fetchAndSaveToDropbox(file, index, files, saveBtn, originalText) {
        const fetchOptions = [{
                mode: 'cors'
            },
            {
                mode: 'no-cors'
            },
            {}
        ];

        let fetchAttempt = 0;

        function tryFetch() {
            if (fetchAttempt >= fetchOptions.length) {
                console.log('All fetch methods failed, trying Method 3: Force download');
                forceDownloadMethod(file, index, files, saveBtn, originalText);
                return;
            }

            const options = fetchOptions[fetchAttempt];
            console.log(`Fetch attempt ${fetchAttempt + 1} with options:`, options);

            fetch(file.url, options)
                .then(response => {
                    if (!response.ok && response.type !== 'opaque') {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                    }
                    return response.blob();
                })
                .then(blob => {
                    console.log('Successfully fetched blob, size:', blob.size);

                    if (blob.size === 0) {
                        throw new Error('Empty file received');
                    }

                    const blobUrl = URL.createObjectURL(blob);

                    Dropbox.save({
                        files: [{
                            url: blobUrl,
                            filename: file.name
                        }],
                        success: function() {
                            console.log(
                                `File "${file.name}" successfully saved to Dropbox via blob URL`);
                            URL.revokeObjectURL(blobUrl);

                            setTimeout(() => {
                                processDropboxFileWithAuth(files, index + 1, saveBtn,
                                    originalText);
                            }, 1500);
                        },
                        error: function(errorMessage) {
                            console.error('Dropbox save error with blob URL:', errorMessage);
                            URL.revokeObjectURL(blobUrl);

                            fetchAttempt++;
                            tryFetch();
                        },
                        cancel: function() {
                            console.log('User cancelled Dropbox save');
                            URL.revokeObjectURL(blobUrl);
                            saveBtn.innerHTML = originalText;
                            saveBtn.disabled = false;
                            alert('Dropbox save cancelled by user.');
                        }
                    });
                })
                .catch(error => {
                    console.error(`Fetch attempt ${fetchAttempt + 1} failed:`, error);
                    fetchAttempt++;
                    tryFetch();
                });
        }

        tryFetch();
    }

    function forceDownloadMethod(file, index, files, saveBtn, originalText) {
        console.log('Using Method 3: Force download and manual upload');

        const tempLink = document.createElement('a');
        tempLink.href = file.url;
        tempLink.download = file.name;
        tempLink.target = '_blank';
        tempLink.style.display = 'none';

        document.body.appendChild(tempLink);
        tempLink.click();
        document.body.removeChild(tempLink);

        console.log(`Initiated download for: ${file.name}`);

        setTimeout(() => {
            if (index + 1 < files.length) {
                processDropboxFileWithAuth(files, index + 1, saveBtn, originalText);
            } else {
                saveBtn.innerHTML = '<i class="fas fa-download"></i> Files Downloaded!';
                saveBtn.classList.remove('btn-outline-primary');
                saveBtn.classList.add('btn-warning');

                setTimeout(() => {
                    saveBtn.innerHTML = originalText;
                    saveBtn.classList.remove('btn-warning');
                    saveBtn.classList.add('btn-outline-primary');
                    saveBtn.disabled = false;
                }, 5000);

                setTimeout(() => {
                    const openDropbox = confirm(
                        'Files have been downloaded to your computer. You can now manually upload them to your Dropbox account.'
                    );

                    if (openDropbox) {
                        window.open('https://www.dropbox.com/upload', '_blank');
                    }
                }, 1000);
            }
        }, 2000);
    }

    // ============ WHATSAPP SHARE ============
    const shareOnWhatsApp = document.getElementById("shareOnWhatsApp");
    if (shareOnWhatsApp) {
        shareOnWhatsApp.addEventListener("click", function(e) {
            e.preventDefault();
            const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');

            if (downloadLinks.length === 0) {
                alert('No files found to share!');
                return;
            }

            let message = "My Pages files have been successfully converted to PDF format!\n\n";

            downloadLinks.forEach((link, index) => {
                const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')
                    ?.textContent.trim();
                const fileName = originalFileName ? originalFileName.replace('.pages', '.pdf').replace(
                        '.pages', '.pdf') :
                    `converted_file_${index + 1}.pdf`;

                message += `File ${index + 1}: ${fileName}\n`;
                message += `Download: ${link.href}\n\n`;
            });

            message += "Converted using Pages to PDF Converter";

            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/?text=${encodedMessage}`;
            window.open(whatsappUrl, '_blank');
        });
    }

    // ============ QR CODE BUTTON ============
    const qrBtn = document.getElementById("qrBtn");
    if (qrBtn) {
        qrBtn.addEventListener("click", function(e) {
            e.preventDefault();
            const downloadLink = document.querySelector('.result-content .btn-outline-success');
            if (downloadLink) {
                openQrModal(downloadLink.href);
            } else {
                alert('No files found to share!');
            }
        });
    }

    // ============ QR CODE MODAL ============
    function openQrModal(fileUrl) {
        const fileUrlInput = document.getElementById("fileUrlInput");
        if (fileUrlInput) {
            fileUrlInput.value = fileUrl;
        }

        const qrcodeDiv = document.getElementById("qrcode");
        if (qrcodeDiv) {
            qrcodeDiv.innerHTML = "";

            if (typeof QRCode !== 'undefined') {
                new QRCode(qrcodeDiv, {
                    text: fileUrl,
                    width: 180,
                    height: 180
                });
            }
        }

        const qrModal = document.getElementById('qrModal');
        if (qrModal && typeof bootstrap !== 'undefined') {
            const modal = new bootstrap.Modal(qrModal);
            modal.show();
        }
    }

    function copyUrl() {
        const urlInput = document.getElementById("fileUrlInput");
        if (urlInput) {
            urlInput.select();
            urlInput.setSelectionRange(0, 99999); // For mobile devices

            // Try modern clipboard API first
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(urlInput.value)
                    .then(() => {
                        showNotification('URL copied to clipboard!', 'success');
                    })
                    .catch(() => {
                        // Fallback to execCommand
                        document.execCommand("copy");
                        showNotification('URL copied to clipboard!', 'success');
                    });
            } else {
                // Fallback to execCommand
                document.execCommand("copy");
                showNotification('URL copied to clipboard!', 'success');
            }
        }
    }

    // ============ UTILITY FUNCTIONS ============
    function ensureApisLoaded() {
        if (typeof gapi === 'undefined') {
            console.error('Google API not loaded');
            return false;
        }

        if (typeof Dropbox === 'undefined') {
            console.error('Dropbox API not loaded');
            return false;
        }

        return true;
    }

    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed`;
        notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        animation: slideInRight 0.3s ease-out;
    `;
        notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close float-end" onclick="this.parentElement.remove()"></button>
    `;

        document.body.appendChild(notification);

        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.animation = 'slideOutRight 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    }

    // Add animation styles
    const animationStyle = document.createElement('style');
    animationStyle.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
    document.head.appendChild(animationStyle);

    // ============ DEBUG FUNCTION ============
    function debugFiles() {
        console.log('=== DEBUG: Checking file detection ===');
        console.log('Files in fileInput:', fileInput.files.length);
        console.log('Files in currentFiles array:', currentFiles.length);

        const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');
        console.log('Found download links:', downloadLinks.length);

        downloadLinks.forEach((link, index) => {
            const row = link.closest('.row');
            const fileNameElement = row ? row.querySelector('.col-5 p.text-muted') : null;

            console.log(`Link ${index + 1}:`, {
                href: link.href,
                text: link.textContent,
                originalFile: fileNameElement ? fileNameElement.textContent : 'Not found'
            });
        });
    }

    // ============ ALTERNATIVE DROPBOX SAVE ============
    function alternativeDropboxSave() {
        const convertedFiles = [];
        const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');

        downloadLinks.forEach((link, index) => {
            const fileUrl = link.href;
            const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')?.textContent
                .trim();
            const fileName = originalFileName ? originalFileName.replace('.pages', '.pdf').replace('.pages',
                    '.pdf') :
                `converted_file_${index + 1}.pdf`;

            const tempLink = document.createElement('a');
            tempLink.href = fileUrl;
            tempLink.download = fileName;
            tempLink.style.display = 'none';
            document.body.appendChild(tempLink);
            tempLink.click();
            document.body.removeChild(tempLink);
        });

        setTimeout(() => {
            alert(
                'Files are being downloaded to your computer. You can now manually upload them to your Dropbox account.'
            );
            window.open('https://www.dropbox.com/upload', '_blank');
        }, 2000);
    }

    // ============ MAKE FUNCTIONS GLOBALLY AVAILABLE ============
    window.openQrModal = openQrModal;
    window.copyUrl = copyUrl;
    window.showNotification = showNotification;
    window.debugFiles = debugFiles;
    window.alternativeDropboxSave = alternativeDropboxSave;
    window.currentFiles = currentFiles; // For debugging

    // ============ ADDITIONAL HELPER FUNCTIONS ============

    // Function to validate if file is actually a PDF
    function isWordFile(file) {
        return (
            file.type === 'application/vnd.apple.pages' ||
            file.name.toLowerCase().endsWith('.pages')
        );
    }

    // Function to format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }

    // Console log for debugging on load
    console.log('Pages to PDF Converter - JavaScript Loaded Successfully');
    console.log('Drag & Drop: Enabled');
    console.log('URL Upload: Enabled with CORS Proxy fallback');
    console.log('Current Files Array: Ready');



    function toggleFaq(element) {
        const faqCard = element.parentElement;
        const content = faqCard.querySelector('.faq-content');
        const icon = element.querySelector('svg');

        // Close all other FAQs
        document.querySelectorAll('.faq-content').forEach(c => {
            if (c !== content) c.style.maxHeight = null;
        });
        document.querySelectorAll('.faq-header svg').forEach(i => {
            if (i !== icon) i.style.transform = 'rotate(0deg)';
        });

        // Toggle current FAQ
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.style.transform = 'rotate(0deg)';
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.style.transform = 'rotate(180deg)';
        }
    }
</script>

@endsection

@section('schema')
@verbatim
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "Is the Pages to PDF conversion accurate?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Pages to PDF conversion preserves layout, fonts, and images accurately across devices. The tool ensures content consistency and document clarity during conversion without altering the original structure or visual presentation."
            }
        }, {
            "@type": "Question",
            "name": "How to convert Pages into PDF?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Users upload a Pages file using the Pages to PDF converter interface. The tool processes the document instantly and provides a downloadable PDF file with preserved formatting and content accuracy."
            }
        }, {
            "@type": "Question",
            "name": "Is this Pages to PDF conversion tool free?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The Pages to PDF converter works completely free without registration requirements. Users convert unlimited Pages files without subscriptions, payments, or watermark additions on generated PDF documents."
            }
        }, {
            "@type": "Question",
            "name": "Can large Pages files be converted?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Large Pages files convert smoothly using the Pages to PDF converter. The tool handles complex layouts and extensive content while maintaining performance, speed, and document formatting consistency."
            }
        }, {
            "@type": "Question",
            "name": "How fast is the conversion from Pages to PDF?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The Pages to PDF conversion finishes within seconds after upload. Processing speed remains consistent regardless of file size while ensuring layout accuracy and high-quality PDF output."
            }
        }, {
            "@type": "Question",
            "name": "Will my formatting stay the same in the PDF?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The Pages to PDF converter preserves original formatting, fonts, spacing, and images. The final PDF matches the Pages document layout without distortion or unwanted visual changes."
            }
        }]
    }
</script>
@endverbatim
@endsection