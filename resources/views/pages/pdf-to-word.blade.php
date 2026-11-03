@extends('main')
@section('title', __('pdf-to-word.title'))
@section('description', __('pdf-to-word.description'))

@push('head')
<link rel="stylesheet" href="{{ asset('css/pdftoword.css') }}">
@endpush


@section('page')
@php
    $currentLocale = app()->getLocale();
    $isLocalized    = ($currentLocale !== 'en');
    $convertRoute   = $isLocalized ? route('localized.convert.pdf', ['locale' => $currentLocale]) : route('convert.pdf');
    $pageRoute      = $isLocalized ? route('localized.pdf-to-word', ['locale' => $currentLocale])  : route('pdf-to-word');
    $downloadRouteName = $isLocalized ? 'localized.pdf.word.download' : 'pdf.word.download';
@endphp
<!-- Hero Section -->
<form action="{{ $convertRoute }}" method="POST" enctype="multipart/form-data" id="pdfToWordForm">
    @csrf
    <section class="hero-section">
        <div class="container text-center py-4">
            <h1 class="hero-title mb-3">{{__('pdf-to-word.pdftoword_heading')}}</h1>

            <p class="lead mb-5">{{__('pdf-to-word.heading-des')}}</p>
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
                        <h3 class="mb-2">{{__('pdf-to-word.droped')}}</h3>
                        <p class="text-muted mb-4">{{__('pdf-to-word.upload')}}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-primary btn-upload" type="button" id="uploadBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                                </svg> {{__('pdf-to-word.upload_files')}}
                            </button>
                            <input type="file" name="files[]" id="fileInput" accept=".pdf" class="d-none" multiple>
                        </div>

                        <!-- Preview Area -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4" id="filePreview"></div>

                        <!-- URL Input Container -->
                        <div class="url-input-container" id="urlInputContainer">
                            <div class="url-input-group">
                                <input type="text" class="url-input" id="urlInput" placeholder="Enter PDF URL...">
                                <button class="url-close-btn" type="button" id="urlCloseBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </button>
                                <button class="url-submit-btn" type="button" id="urlSubmitBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
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

                    <!-- Google Drive -->
                    <div class="source-item" id="googleDriveBtn">
                        <img src="{{ asset('images/drivelogo.svg') }}" alt="Google Drive" width="22" height="22">
                        <span>{{__('pdf-to-word.g-drive')}}</span>
                    </div>

                    <!-- Dropbox -->
                    <div class="source-item" id="dropboxBtn">
                        <img src="{{ asset('images/Drop-icon.svg') }}" alt="Dropbox" width="22" height="22"
                            style="vertical-align:middle;">

                        <span>{{__('pdf-to-word.dropbox')}}</span>
                    </div>

                    <!-- From URL -->
                    <div class="source-item" id="urlSourceBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path
                                d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                            <path
                                d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                        </svg>
                        <span>{{__('pdf-to-word.url')}}</span>
                    </div>
                </div>


            </div>
        </div>
    </section>

    {{-- Result Section --}}
    @if (!empty($api_response) && !empty($api_response['data']))
    <section class="result-section resultnew" id="resultSection" style="display: block;">
        @include('pages.pdf-to-word-partial')
    </section>
        <div class="share-options mt-4">
            <h5 class="mb-3 text-center">{{__('pdf-to-word.share')}}</h5>
            <div class="d-flex flex-wrap gap-2 justify-content-center">

                <button class="btn btn-outline-primary share-btn" type="button" id="saveToDrive"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Save to Google Drive">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/da/Google_Drive_logo.png"
                        alt="Google Drive">
                </button>

                <button class="btn btn-outline-primary share-btn" type="button" id="saveToDropbox"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Save to Dropbox">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Dropbox_Icon.svg"
                        alt="Dropbox">
                </button>

                <button class="btn btn-outline-primary share-btn" type="button" id="shareOnWhatsApp"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Share on WhatsApp">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
                </button>

                <button class="btn btn-outline-primary share-btn" type="button" id="qrBtn"
                    @php
                    $qrUrl = '';
                    if (!empty($api_response['data'][0]['file_url'])) {
                        $qrDownloadParams = $isLocalized
                            ? ['locale' => $currentLocale, 'download_url' => $api_response['data'][0]['file_url']]
                            : ['download_url' => $api_response['data'][0]['file_url']];
                        $qrUrl = route($downloadRouteName, $qrDownloadParams);
                    }
                    @endphp
                    onclick="openQrModal('{{ $qrUrl }}')"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Get shareable URL with QR Code">
                    <!-- QR Code Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor">
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
    @elseif(!empty($api_response) && empty($api_response['data']) && empty($is_processing))
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
    @elseif(empty($is_processing))
    {{-- ❌ Case 1: No response at all --}}
    <div class="alert alert-danger p-3 error_alert d-none" id="error_alert">
        We are unable to process your request for the time being!
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Only scroll if it's actually shown not d-none
            const alert = document.getElementById('error_alert');
            if (alert && !alert.classList.contains('d-none')) {
                alert.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    </script>
    @endif


    <!-- Conversion Section -->
    <section class="conversion-section" id="conversionSection">
        <div class="container">
            <div class="text-center mb-4">
                <h3> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1#795ef1"
                        class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                    </svg>{{__('pdf-to-word.options')}}</h3>
                <p class="text-muted">{{__('pdf-to-word.options-des')}}</p>
            </div>

            <div class="conversion-options">
                <div class="option-group">
                    <div class="option-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#795ef1"
                            class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                        </svg>
                        <span>{{__('pdf-to-word.format')}}</span>
                    </div>

                    <div class="btn-group w-100 format-options" role="group" aria-label="Output Format">
                        <input type="radio" class="btn-check" name="format" id="docxFormat" value="docx"
                            checked>
                        <label class="btn btn-outline-primary format-option" for="docxFormat" id="docxOption">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#795ef1#795ef1" class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                            </svg>{{__('pdf-to-word.docx')}}
                        </label>

                        <input type="radio" class="btn-check" name="format" id="docFormat" value="doc">
                        <label class="btn btn-outline-primary format-option" for="docFormat" id="docOption">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#795ef1#795ef1" class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                            </svg>{{__('pdf-to-word.doc')}}
                        </label>
                    </div>
                </div>

                <div class="option-group">
                    {{-- <div class="option-title">
                            <i class="fas fa-cog"></i>
                            <span>Conversion Settings</span>
                        </div> --}}
                    {{--
                        <div class="option-card active">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="preserveFormatting" checked>
                                <label class="form-check-label" for="preserveFormatting">Preserve original
                                    formatting</label>
                            </div> --}}
                    {{-- <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="extractImages" checked>
                                <label class="form-check-label" for="extractImages">Extract images</label>
                            </div> --}}
                    {{-- <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="ocrOption">
                                <label class="form-check-label" for="ocrOption">Enable OCR for scanned PDFs</label>
                            </div> --}}
                    {{-- </div>
                    </div> --}}
                    <button class="btn convert-btn" id="convertBtn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true"
                            role="img" width="20" height="20"
                            style="vertical-align:middle; display:inline-block; fill:currentColor;">
                            <!-- right-pointing arrow (top) -->
                            <path
                                d="M497 273.3 383 361.6c-9.7 6.9-22.7 4.4-29.6-5.2s-4.4-22.7 5.2-29.6L408 256H104c-13.3 0-24-10.7-24-24s10.7-24 24-24h304L358.6 185.2c-9.6-6.9-12.1-19.9-5.2-29.6s19.9-12.1 29.6-5.2L497 238.7c8 5.7 8 17.7 0 23z" />
                            <!-- left-pointing arrow (bottom) -->
                            <path
                                d="M15 238.7 129 150.4c9.7-6.9 22.7-4.4 29.6 5.2s4.4 22.7-5.2 29.6L104 256h304c13.3 0 24 10.7 24 24s-10.7 24-24 24H104l75.4 47.6c9.6 6.9 12.1 19.9 5.2 29.6s-19.9 12.1-29.6 5.2L15 273.3c-8-5.7-8-17.7 0-23z" />
                        </svg>{{__('pdf-to-word.convert-word')}}
                    </button>
                </div>


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
                    {{__('pdf-to-word.converting')}}
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
                        <p class="text-muted" id="wordProgressText">{{__('pdf-to-word.preparing')}}</p>
                        <small class="text-muted" id="wordProgressPercentage">0%</small>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">{{__('pdf-to-word.cnvrt')}}</span>
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
            <h2 class="fw-bold mb-3">{{__('pdf-to-word.related_tools')}}</h2>
            {{-- <p class="text-muted">Discover our full suite of document utilities</p> --}}
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-4 justify-content-center">
            <div class="col">
                <a href="{{ localized_route('word-to-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                <path
                                    d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                <path fill-rule="evenodd"
                                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                            </svg>
                            <h3 class="card-title">{{__('pdf-to-word.word-to-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('jpg-to-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-pdf fa-2x mb-3"></i><svg xmlns="http://www.w3.org/2000/svg"
                                width="35" height="35" fill="#795ef1" class="bi bi-file-earmark-pdf-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                <path fill-rule="evenodd"
                                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                            </svg>
                            <h3 class="card-title">{{__('pdf-to-word.jPG-to-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('pdf-to-jpg') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                <path
                                    d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1z" />
                            </svg>
                            <h3 class="card-title">{{__('pdf-to-word.pDF-to-jpg')}}</h3>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col">
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
                            <h3 class="card-title">{{__('pdf-to-word.compress-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('merge-pdf') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-intersect" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2z" />
                            </svg>
                            <h3 class="card-title">{{__('pdf-to-word.merge-pDF')}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ localized_route('pdf.summerize') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#795ef1"
                                class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
                            </svg>
                            <h3 class="card-title">{{__('pdf-to-word.summarize-pDF')}}</h3>
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
                            <h3 class="card-title">{{__('pdf-to-word.ppt-to-pdf')}}</h3>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- Use Cases Section -->
<section class="use-cases-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{__('pdf-to-word.why-convert')}}</h2>
            <p class="text-muted">{{__('pdf-to-word.why-convert-des')}}</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                    </div>
                    <h3>{{__('pdf-to-word.easy')}}</h3>
                    <p class="text-muted">{{__('pdf-to-word.easy-des')}}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </div>
                    <h3>{{__('pdf-to-word.Easy_search')}}</h3>
                    <p class="text-muted">{{__('pdf-to-word.Easy_search-des')}}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                    </div>
                    <h3>{{__('pdf-to-word.team')}}</h3>
                    <p class="text-muted">{{__('pdf-to-word.team-des')}}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section">
    <div class="container p-5">
        <div class="text-center mb-5">
            <h2 class="section-title">{{__('pdf-to-word.how-convert')}}</h2>
            <p class="section-subtitle"> {{__('pdf-to-word.how-convert-des')}} <a href="https://www.pdftools.net">{{__('pdf-to-word.a')}}</a> {{__('pdf-to-word.how-convert-des2')}}
            </p>
        </div>

        <div class="timeline">
            <div class="step-card left">
                <div class="step-number">1</div>
                <p class="step-text">{{__('pdf-to-word.1s')}}</p>
            </div>

            <div class="step-card right">
                <div class="step-number">2</div>
                <p class="step-text">{{__('pdf-to-word.2nd')}}</p>
            </div>

            <div class="step-card left">
                <div class="step-number">3</div>
                <p class="step-text">{{__('pdf-to-word.3rd')}}</p>
            </div>
            <div class="step-card right">
                <div class="step-number">4</div>
                <p class="step-text">{{__('pdf-to-word.4th')}}</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section bg-light">
    <div class="container p-5">
        <div class="text-center mb-5">
            <h2 class="section-title">{{__('pdf-to-word.why choose')}}</h2>

        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.file')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-file-earmark-lock2-fill" viewBox="0 0 16 16">
                        <path d="M7 7a1 1 0 0 1 2 0v1H7z" />
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0" />
                    </svg>
                </div>
                <p class="feature-text">{{__('pdf-to-word.file-des')}}
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.cross')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                        <path
                            d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                    </svg>
                </div>

                <p class="feature-text">{{__('pdf-to-word.cross-des')}}
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.unlimited')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-file-lock2-fill" viewBox="0 0 16 16">
                        <path d="M7 6a1 1 0 0 1 2 0v1H7z" />
                        <path
                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0" />
                    </svg>
                </div>

                <p class="feature-text">{{__('pdf-to-word.unlimited-des')}}
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.globally')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path
                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                    </svg>
                </div>

                <p class="feature-text">{{__('pdf-to-word.globally-des')}}
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.watermark')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-tablet" viewBox="0 0 16 16">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </div>

                <p class="feature-text">{{__('pdf-to-word.watermark-des')}}</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.Quick')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>

                <p class="feature-text">{{__('pdf-to-word.Quick-des')}}
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.versatile')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-tablet" viewBox="0 0 16 16">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </div>

                <p class="feature-text">{{__('pdf-to-word.versatile-des')}}
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.restrictions')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>
                <p class="feature-text">{{__('pdf-to-word.restrictions-des')}}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.smart')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>
                <p class="feature-text">{{__('pdf-to-word.smart-des')}}
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <h3 class="card-title">{{__('pdf-to-word.Mobile')}}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>

                <p class="feature-text">{{__('pdf-to-word.Mobile-DES')}}</p>
            </div>
        </div>
    </div>
</section>


<section class="section bg-light">
    <div class="container p-5">
        <div class="col-12 bg-white rounded-3 p-4 shadow">

            <h2 class="">{{__('pdf-to-word.challenges')}}</h2>
            <p class="">{{__('pdf-to-word.challenges-des')}}</p>
            <h3 class="fs-5"> <span class="me-2">1.</span>{{__('pdf-to-word.challenge-1-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-1-desc')}}</p>
            <p> {{__('pdf-to-word.challenge-1-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">2.</span>{{__('pdf-to-word.challenge-2-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-2-desc')}}</p>
            <p> {{__('pdf-to-word.challenge-2-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">3.</span>{{__('pdf-to-word.challenge-3-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-3-desc')}}</p>
            <p> {{__('pdf-to-word.challenge-3-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">4.</span>{{__('pdf-to-word.challenge-4-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-4-desc')}}</p>
            <p> {{__('pdf-to-word.challenge-4-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">5.</span>{{__('pdf-to-word.challenge-5-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-5-desc')}}</p>
            <p>{{__('pdf-to-word.challenge-5-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">6.</span>{{__('pdf-to-word.challenge-6-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-6-desc')}}</p>
            <p>{{__('pdf-to-word.challenge-6-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">7.</span>{{__('pdf-to-word.challenge-7-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-7-desc')}}
            </p>
            <p>{{__('pdf-to-word.challenge-7-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">8.</span>{{__('pdf-to-word.challenge-8-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-8-desc')}}</p>
            <p> {{__('pdf-to-word.challenge-8-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">9.</span>{{__('pdf-to-word.challenge-9-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-9-desc')}}
            </p>
            <p>{{__('pdf-to-word.challenge-9-solution')}}</p>
            <h3 class="fs-5"> <span class="me-2">10.</span>{{__('pdf-to-word.challenge-10-A-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-10-A-des')}}</p>
            <p> {{__('pdf-to-word.challenge-10-A-sol')}}</p>
            <h2>{{__('pdf-to-word.general-tips')}}</h2>
            <h3 class="fs-5"> <span class="me-2">a.</span>{{__('pdf-to-word.challenge-10-title')}}</h3>
            <p>{{__('pdf-to-word.challenge-10-desc')}} </p>
            <h3 class="fs-5"> <span class="me-2">b.</span>{{__('pdf-to-word.challenge-10-b')}}</h3>
            <p>{{__('pdf-to-word.b-des')}}</p>
            <h3 class="fs-5"> <span class="me-2">c.</span>{{__('pdf-to-word.c')}}</h3>
            <p>{{__('pdf-to-word.c-des')}}</p>
            <p>{{__('pdf-to-word.c-des-des')}}</p>
            <h3 class="fs-5"> <span class="me-2">d.</span>{{__('pdf-to-word.d')}}</h3>
            <p>{{__('pdf-to-word.d-des')}}</p>
            <h3 class="fs-5"> <span class="me-2">e.</span>{{__('pdf-to-word.e')}}</h3>
            <p>{{__('pdf-to-word.e-des')}}</p>

        </div>
    </div>
</section>



<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{__('pdf-to-word.faq-title')}}</h2>

        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pdf-to-word.faq-1-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pdf-to-word.faq-1-answer')}}
                        </p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pdf-to-word.faq-2-question')}}
                        </h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pdf-to-word.faq-2-answer')}}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3 class="card-title">{{__('pdf-to-word.faq-3-question')}}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{__('pdf-to-word.faq-3-answer')}}</p>
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="https://apis.google.com/js/api.js"></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs"
    data-app-key="1sf5bictc5t4exu"></script>
<script>
    console.log('PDF to Word Script Starting...');
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
            const pdfFiles = droppedFiles.filter(file => file.type === 'application/pdf' || file.name
                .toLowerCase().endsWith('.pdf'));

            if (pdfFiles.length === 0) {
                alert('Please drop only PDF files!');
                return;
            }

            if (pdfFiles.length < droppedFiles.length) {
                alert('Only PDF files will be uploaded. Other files were ignored.');
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
        const invalidFiles = files.filter(file => !file.type.includes('pdf') && !file.name.toLowerCase()
            .endsWith('.pdf'));
        if (invalidFiles.length > 0) {
            alert('Please select only PDF files!');
            fileInput.value = '';
            currentFiles = [];
            return;
        }

        // Hide dropzone
        dropZone.style.display = "none";

        filesGridContainer.innerHTML = ""; // reset container

        pdfjsLib.GlobalWorkerOptions.workerSrc =
            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        // Function to render PDF first page preview
        async function renderPDFPreview(file, canvasId) {
            try {
                const arrayBuffer = await file.arrayBuffer();
                const pdf = await pdfjsLib.getDocument({
                    data: arrayBuffer
                }).promise;
                const page = await pdf.getPage(1);

                const canvas = document.getElementById(canvasId);
                const context = canvas.getContext('2d');

                // Set desired dimensions
                const desiredWidth = 170;
                const viewport = page.getViewport({
                    scale: 1
                });
                const scale = desiredWidth / viewport.width;
                const scaledViewport = page.getViewport({
                    scale: scale
                });

                canvas.width = scaledViewport.width;
                canvas.height = scaledViewport.height;

                const renderContext = {
                    canvasContext: context,
                    viewport: scaledViewport
                };

                await page.render(renderContext).promise;
            } catch (error) {
                console.error('Error rendering PDF preview:', error);
            }
        }

        const summaryHTML = `
    <div class="files-summary" style="text-align: center; margin-bottom: 20px;">
        <i class="fas fa-file-pdf" style="color: #dc3545; font-size: 2rem; margin-bottom: 10px;"></i>
        <h4 style="color: #333; margin-bottom: 5px;">
            ${files.length} PDF File${files.length > 1 ? "s" : ""} Selected
        </h4>
        <p style="color: #6c757d; margin-bottom: 0;">
            Ready for conversion to Word format
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
        <button class="change-files-btn btn btn-outline-secondary btn-sm" id="changeFilesBtn" type="button" style="
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
            <canvas id="pdfCanvas-${index}" style="
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
            "></canvas>
            <div class="loading-spinner" id="loading-${index}" style="
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            ">
                <i class="fas fa-spinner fa-spin" style="font-size: 24px; color: #dc3545;"></i>
            </div>
            <div style="position: absolute; bottom: 5px; right: 8px; background: rgba(220, 53, 69, 0.9); color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px; z-index: 1; font-weight: 600;">
                PDF
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

            // Render PDF preview after card is added to DOM
            setTimeout(() => {
                renderPDFPreview(file, `pdfCanvas-${index}`).then(() => {
                    const loadingSpinner = document.getElementById(`loading-${index}`);
                    if (loadingSpinner) {
                        loadingSpinner.style.display = 'none';
                    }
                });
            }, 100);
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
                        `${currentFiles.length} PDF File${currentFiles.length !== 1 ? "s" : ""} Selected`;
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

    // ============ PDF TO WORD — ASYNC CONVERSION WITH REAL PROGRESS ============
    let wordProgressInterval;
    let wordCurrentProgress = 0;
    let activePollingInterval = null;

    const wordForm = document.getElementById('pdfToWordForm');
    if (wordForm) {
        wordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const fileInput = document.getElementById('fileInput');

            if ((!fileInput || !fileInput.files || fileInput.files.length === 0) && currentFiles.length === 0) {
                alert('Please select a PDF file to convert');
                return false;
            }

            if (fileInput && fileInput.files.length === 0 && currentFiles.length > 0) {
                fileInput.files = createFileList(currentFiles);
            }

            showWordProgressBar();

            const formData = new FormData(this);
            const xhr = new XMLHttpRequest();

            // Real upload progress: 0% → 40%
            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    const pct = Math.round((e.loaded / e.total) * 40);
                    updateWordProgress(pct, pct < 40 ? 'Uploading file...' : 'Upload complete. Converting...');
                }
            });

            xhr.addEventListener('load', function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    try {
                        const data = JSON.parse(xhr.responseText);
                        if (data.success && data.status === 'completed' && data.html) {
                            updateWordProgress(100, 'Conversion Complete!');
                            finishConversion(data.html);
                        } else if (data.success && data.job_id) {
                            updateWordProgress(45, 'Converting your PDF...');
                            startJobPolling(data.job_id);
                        } else {
                            showConversionError(data.message || data.error || 'Conversion failed. Please try again.');
                        }
                    } catch (ex) {
                        showConversionError('Unexpected server response. Please try again.');
                    }
                } else {
                    try {
                        const err = JSON.parse(xhr.responseText);
                        showConversionError(err.message || err.error || 'Server error (' + xhr.status + '). Please try again.');
                    } catch (ex) {
                        showConversionError('Server error (' + xhr.status + '). Please try again.');
                    }
                }
            });

            xhr.addEventListener('error', function() {
                showConversionError('Network error. Please check your connection and try again.');
            });

            xhr.open('POST', this.action);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('input[name="_token"]').value);
            xhr.send(formData);
        });
    }

    function startJobPolling(jobId) {
        if (activePollingInterval) clearInterval(activePollingInterval);

        const statusUrl  = "{{ route('pdf.checkStatus') }}";
        const csrfToken  = document.querySelector('input[name="_token"]').value;
        const messages   = [
            'Converting your PDF...',
            'Extracting document content...',
            'Building Word document...',
            'Formatting content...',
            'Almost done...'
        ];
        let pollCount = 0;
        const maxPolls = 150; // 5 min at 2 s intervals

        activePollingInterval = setInterval(function() {
            pollCount++;

            // Animate 45% → 88% during processing
            if (wordCurrentProgress < 88) {
                wordCurrentProgress = Math.min(88, 45 + (pollCount / maxPolls) * 172);
                updateWordProgress(wordCurrentProgress, messages[Math.min(Math.floor(pollCount / 10), messages.length - 1)]);
            }

            if (pollCount >= maxPolls) {
                clearInterval(activePollingInterval);
                showConversionError('Conversion is taking too long. Please try again with a smaller file.');
                return;
            }

            const body = new URLSearchParams({ job_id: jobId });
            fetch(statusUrl, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: body.toString()
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                if (data.status === 'completed' && data.html) {
                    clearInterval(activePollingInterval);
                    finishConversion(data.html);
                } else if (data.status === 'failed') {
                    clearInterval(activePollingInterval);
                    showConversionError(data.message || 'Conversion failed. Please try again.');
                }
                // status === 'processing' → keep polling
            })
            .catch(function() {}); // silently ignore transient network hiccups
        }, 2000);
    }

    function finishConversion(html) {
        updateWordProgress(100, 'Conversion Complete!');

        setTimeout(function() {
            const progressSection = document.getElementById('progressSectionWord');
            if (progressSection) progressSection.style.display = 'none';

            // Parse the returned HTML string using DOMParser
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newResultSection = doc.getElementById('resultSection');

            if (newResultSection) {
                let resultSection = document.getElementById('resultSection');
                if (!resultSection) {
                    resultSection = document.createElement('section');
                    resultSection.id = 'resultSection';
                    resultSection.className = 'result-section resultnew';
                    const heroSection = document.querySelector('.hero-section');
                    if (heroSection) {
                        heroSection.parentNode.insertBefore(resultSection, heroSection.nextSibling);
                    } else {
                        document.getElementById('pdfToWordForm').prepend(resultSection);
                    }
                }

                resultSection.innerHTML = newResultSection.innerHTML;
                resultSection.style.display = 'block';
                resultSection.scrollIntoView({ behavior: 'smooth', block: 'start' });

                [].slice.call(resultSection.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(el) {
                    return new bootstrap.Tooltip(el);
                });
            }
        }, 400);
    }

    function showConversionError(message) {
        if (wordProgressInterval) clearInterval(wordProgressInterval);
        if (activePollingInterval) clearInterval(activePollingInterval);

        const progressSection = document.getElementById('progressSectionWord');
        if (progressSection) progressSection.style.display = 'none';

        const conversionSection = document.getElementById('conversionSection');
        if (conversionSection) conversionSection.style.display = 'block';

        showNotification(message, 'danger');
    }

    function showWordProgressBar() {
        const conversionSection = document.getElementById('conversionSection');
        if (conversionSection) conversionSection.style.display = 'none';

        const progressSection = document.getElementById('progressSectionWord');
        if (progressSection) {
            progressSection.style.display = 'block';
            progressSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        wordCurrentProgress = 0;
        updateWordProgress(0, 'Preparing upload...');
    }

    function updateWordProgress(percentage, message) {
        const bar  = document.getElementById('wordProgressBar');
        const text = document.getElementById('wordProgressText');
        const pct  = document.getElementById('wordProgressPercentage');

        if (bar)  bar.style.width   = percentage + '%';
        if (text) text.textContent  = message;
        if (pct)  pct.textContent   = Math.round(percentage) + '%';

        wordCurrentProgress = percentage;
    }

    function completeWordProgress() {
        if (wordProgressInterval) clearInterval(wordProgressInterval);
        updateWordProgress(100, 'Success!');
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

    // ============ GOOGLE DRIVE INTEGRATION (Modern GIS API) ============
    const DRIVE_CLIENT_ID = "1084655307660-8ad4qpb1prr46gbebbtteb25napr78kd.apps.googleusercontent.com";
    const DRIVE_API_KEY = "AIzaSyA8s9vg7KVtkSzPjeAVsvii8gINjJ9_ep8";
    const DRIVE_SCOPES = 'https://www.googleapis.com/auth/drive.file';

    let pickerApiLoaded = false;
    let oauthToken = null;
    let tokenClient = null;
    let pendingDriveAction = null; // 'pick' or 'save'
    let filesToSave = [];

    // Initialize Google Identity Services Token Client
    function initTokenClient() {
        console.log('Initializing Google GIS Token Client...');
        if (typeof google === 'undefined' || !google.accounts || !google.accounts.oauth2) {
            console.error('Google Identity Services library not yet loaded or failed to load');
            return;
        }

        try {
            tokenClient = google.accounts.oauth2.initTokenClient({
                client_id: DRIVE_CLIENT_ID,
                scope: DRIVE_SCOPES,
            callback: function(tokenResponse) {
                if (tokenResponse && tokenResponse.access_token) {
                    oauthToken = tokenResponse.access_token;
                    console.log('Google Access Token acquired. Granted scopes:', tokenResponse.scope);
                    
                    if (pendingDriveAction === 'pick') {
                        createPicker();
                    } else if (pendingDriveAction === 'save') {
                        saveFilesToGoogleDrive(filesToSave, oauthToken);
                    }
                    pendingDriveAction = null;
                } else {
                    console.error('Google OAuth failed or was cancelled:', tokenResponse);
                    if (tokenResponse.error === 'access_denied') {
                        showNotification('Permission denied. Please check all boxes on the consent screen.', 'warning');
                    } else {
                        showNotification('Google Sign-In failed. Please try again.', 'danger');
                    }
                    pendingDriveAction = null;
                }
            },
        });
        console.log('Google GIS Token Client successfully initialized');
        } catch (err) {
            console.error('Error in initTokenClient:', err);
        }
    }

    // Load the Picker API
    function loadPicker() {
        console.log('Loading Google Picker API...');
        if (typeof gapi !== 'undefined') {
            gapi.load('picker', function() {
                pickerApiLoaded = true;
            });
        }
    }

    // Open Google Picker
    function createPicker() {
        if (pickerApiLoaded && oauthToken) {
            // Create a view that shows PDF documents and Google Docs (to export as PDF)
            const docsView = new google.picker.DocsView(google.picker.ViewId.DOCS)
                .setMimeTypes('application/pdf,application/vnd.google-apps.document')
                .setMode(google.picker.DocsViewMode.LIST);

            const picker = new google.picker.PickerBuilder()
                .addView(docsView)
                .setOAuthToken(oauthToken)
                .setDeveloperKey(DRIVE_API_KEY)
                .setCallback(pickerCallback)
                .setOrigin(window.location.protocol + '//' + window.location.host)
                .setTitle('Select a PDF Document')
                .enableFeature(google.picker.Feature.NAV_HIDDEN)
                .build();
            picker.setVisible(true);
        } else if (!pickerApiLoaded) {
            loadPicker();
            setTimeout(createPicker, 500);
        } else if (!oauthToken) {
            pendingDriveAction = 'pick';
            tokenClient.requestAccessToken();
        }
    }

    // Handle file selected from picker
    function pickerCallback(data) {
        if (data.action === google.picker.Action.PICKED) {
            const driveFile = data.docs[0];
            const fileId = driveFile.id;
            const fileName = driveFile.name || 'drive-file.pdf';
            const mimeType = driveFile.mimeType;

            console.log('Selected Drive file:', fileName, fileId, 'Mime:', mimeType);

            showNotification('Downloading file from Google Drive...', 'info');

            // Determine the download URL based on file type
            let downloadUrl;
            if (mimeType.includes('application/vnd.google-apps.')) {
                // Google App file — export as PDF
                downloadUrl = `https://www.googleapis.com/drive/v3/files/${fileId}/export?mimeType=application/pdf`;
            } else {
                // Regular file — download direct
                downloadUrl = `https://www.googleapis.com/drive/v3/files/${fileId}?alt=media`;
            }

            // Fetch the actual file bytes using the access token
            fetch(downloadUrl, {
                    headers: {
                        'Authorization': 'Bearer ' + oauthToken
                    }
                })
                .then(res => {
                    if (!res.ok) {
                        return res.text().then(text => {
                            let errorMessage = `Status: ${res.status}`;
                            try {
                                const errData = JSON.parse(text);
                                errorMessage = errData.error?.message || errorMessage;
                            } catch (e) {
                                errorMessage = text || errorMessage;
                            }
                            throw new Error(errorMessage);
                        });
                    }
                    return res.blob();
                })
                .then(blob => {
                    // Ensure filename has .pdf extension
                    let safeFileName = fileName;
                    if (!safeFileName.toLowerCase().endsWith('.pdf')) {
                        safeFileName += '.pdf';
                    }

                    const file = new File([blob], safeFileName, {
                        type: 'application/pdf'
                    });

                    // Add to current files and update input
                    currentFiles.push(file);
                    fileInput.files = createFileList(currentFiles);
                    fileInput.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));

                    showNotification('File successfully loaded from Google Drive!', 'success');
                })
                .catch(err => {
                    console.error('Error downloading file from Drive:', err);

                    // If it's a permission error, clear the token so the user is forced to re-re-consent
                    if (err.message.includes('403') || err.message.toLowerCase().includes('permission')) {
                        console.warn('Permission error detected. Clearing cached token.');
                        oauthToken = null;
                        if (typeof google !== 'undefined' && google.accounts && google.accounts.oauth2) {
                            // This will force the next click to show the consent screen again
                            google.accounts.oauth2.revoke(oauthToken, () => {});
                        }
                    }

                    // Show detailed error to user
                    setTimeout(() => {
                        let detailedMsg = 'Could not download the file from Google Drive.\n\n' +
                            'Error: ' + err.message + '\n\n' +
                            'CRITICAL: When the Google permission screen appears, you MUST check the box to "View and download all your Google Drive files" or the download will fail.';
                        
                        alert(detailedMsg);
                    }, 500);

                    showNotification('Failed to download from Drive. Please re-try and check all permission boxes.', 'danger');
                });
        }
    }

    // Button click handler — request token then open picker
    const googleDriveBtn = document.getElementById("googleDriveBtn");
    if (googleDriveBtn) {
        console.log('Attaching click listener to Google Drive button');
        googleDriveBtn.addEventListener("click", function(e) {
            console.log('Google Drive button clicked');
            if (tokenClient) {
                pendingDriveAction = 'pick';
                if (!oauthToken) {
                    console.log('Requesting access token...');
                    tokenClient.requestAccessToken();
                } else {
                    console.log('Token already available, creating picker');
                    createPicker();
                }
            } else {
                console.warn('Token client not ready, attempting re-init');
                initTokenClient();
                setTimeout(() => {
                    if (tokenClient) {
                        googleDriveBtn.click();
                    } else {
                        alert('Google Drive client is still loading. Please wait a few seconds and try again.');
                    }
                }, 1000);
            }
        });
    }

    // Initialize on load
    window.addEventListener('load', function() {
        loadPicker();
        // Delay GIS init slightly to ensure script is ready
        setTimeout(initTokenClient, 800);
    });

    // ============ DROPBOX INTEGRATION ============
    const dropboxBtn = document.getElementById("dropboxBtn");
    if (dropboxBtn) {
        dropboxBtn.addEventListener("click", function() {
            if (typeof Dropbox !== 'undefined') {
                Dropbox.choose({
                    linkType: "direct",
                    multiselect: true,
                    extensions: [".pdf"],

                    success: function(files) {
                        files.forEach(file => {
                            fetch(file.link)
                                .then(res => res.blob())
                                .then(blob => {
                                    const dropboxFile = new File([blob], file.name, {
                                        type: 'application/pdf'
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

    // ============ URL INPUT SUBMIT - WITH ENHANCED LOADING ============
    const urlSubmitBtn = document.getElementById('urlSubmitBtn');
    if (urlSubmitBtn) {
        urlSubmitBtn.addEventListener('click', function() {
            const urlInput = document.getElementById('urlInput');
            const url = urlInput ? urlInput.value.trim() : '';

            if (!url) {
                showNotification('Please enter a valid PDF URL', 'warning');
                return;
            }

            if (!url.toLowerCase().includes('.pdf') && !url.includes('.pdf?')) {
                showNotification('The URL does not appear to be a PDF file', 'warning');
                return;
            }

            // Show loading overlay
            showURLLoadingOverlay('PDF');

            // Show loading state on button
            const originalBtnHTML = urlSubmitBtn.innerHTML;
            urlSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            urlSubmitBtn.disabled = true;

            // Try multiple methods to fetch the PDF
            fetchPDFFromURL(url)
                .then(blob => {
                    // Update loading message
                    updateURLLoadingMessage('Processing PDF file...');

                    // Get filename from URL or use default
                    const urlParts = url.split('/');
                    let filename = urlParts[urlParts.length - 1].split('?')[0] || 'downloaded.pdf';

                    // Ensure .pdf extension
                    if (!filename.toLowerCase().endsWith('.pdf')) {
                        filename += '.pdf';
                    }

                    // Create File object
                    const file = new File([blob], filename, {
                        type: 'application/pdf'
                    });

                    // Add to currentFiles array
                    currentFiles.push(file);

                    // Update file input
                    const dataTransfer = new DataTransfer();
                    currentFiles.forEach(f => dataTransfer.items.add(f));
                    fileInput.files = dataTransfer.files;

                    // Final loading message
                    updateURLLoadingMessage('PDF loaded successfully!');

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

                        showNotification('PDF successfully loaded from URL!', 'success');
                    }, 800);
                })
                .catch(error => {
                    console.error('Error fetching PDF from URL:', error);

                    // Reset button
                    urlSubmitBtn.innerHTML = originalBtnHTML;
                    urlSubmitBtn.disabled = false;

                    // Hide loading overlay
                    hideURLLoadingOverlay();

                    // Show user-friendly error with solution
                    showNotification('Failed to load PDF from URL', 'danger');

                    setTimeout(() => {
                        alert('Failed to load PDF from URL.\n\nPossible solutions:\n1. Check if the URL is correct and accessible\n2. Try downloading the PDF first, then upload it\n3. Some URLs require authentication and cannot be loaded directly\n\nError: ' +
                            error.message);
                    }, 300);
                });
        });
    }

    // Function to show URL loading overlay
    function showURLLoadingOverlay(fileType = 'PDF') {
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
        if (!document.getElementById('urlLoadingStyles')) {
            const style = document.createElement('style');
            style.id = 'urlLoadingStyles';
            style.textContent = `
                #urlLoadingOverlay {
                    position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                    background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(5px);
                    z-index: 9999; display: flex; align-items: center; justify-content: center;
                    animation: fadeIn 0.3s ease-in;
                }
                .url-loading-content {
                    background: white; border-radius: 16px; padding: 40px;
                    max-width: 400px; width: 90%; text-align: center;
                    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3); animation: slideUp 0.4s ease-out;
                }
                .url-loading-text h5 { color: #333; font-weight: 600; margin-bottom: 10px; font-size: 1.3rem; }
                .url-loading-text p { color: #6c757d; margin-bottom: 25px; font-size: 0.95rem; }
                @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
                @keyframes slideUp { from { transform: translateY(30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
            `;
            document.head.appendChild(style);
        }
    }

    function updateURLLoadingMessage(message) {
        const messageElement = document.getElementById('urlLoadingMessage');
        if (messageElement) {
            messageElement.textContent = message;
        }
    }

    function hideURLLoadingOverlay() {
        const overlay = document.getElementById('urlLoadingOverlay');
        if (overlay) {
            overlay.remove();
        }
    }

    async function fetchPDFFromURL(url) {
        // Method 1: Local Proxy (Most reliable for bypassing CORS)
        try {
            updateURLLoadingMessage('Fetching via secure server...');
            const proxyUrl = "{{ route('pdf.proxy.download') }}?url=" + encodeURIComponent(url);
            const response = await fetch(proxyUrl);
            if (response.ok) {
                const blob = await response.blob();
                if (blob.size > 0) return blob;
            }
        } catch (error) { console.log('Local proxy failed'); }

        // Method 2: Direct fetch
        try {
            updateURLLoadingMessage('Attempting direct download...');
            const response = await fetch(url);
            if (response.ok) {
                const blob = await response.blob();
                if (blob.size > 0) return blob;
            }
        } catch (error) { console.log('Direct fetch failed'); }

        // Method 3: Public proxies
        const fallbackProxies = [
            'https://api.allorigins.win/raw?url=',
            'https://corsproxy.io/?'
        ];

        for (const proxy of fallbackProxies) {
            try {
                updateURLLoadingMessage('Trying alternative download method...');
                const response = await fetch(proxy + encodeURIComponent(url));
                if (response.ok) {
                    const blob = await response.blob();
                    if (blob.size > 0) return blob;
                }
            } catch (e) {
                console.log('Proxy failed:', proxy);
            }
        }

        throw new Error('All download methods failed. The file may be restricted or require authentication.');
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

    // Make functions globally available
    window.showURLLoadingOverlay = showURLLoadingOverlay;
    window.hideURLLoadingOverlay = hideURLLoadingOverlay;
    window.updateURLLoadingMessage = updateURLLoadingMessage;
    window.fetchPDFFromURL = fetchPDFFromURL;

    // ============ SAVE TO GOOGLE DRIVE ============
    const saveToDrive = document.getElementById("saveToDrive");
    if (saveToDrive) {
        saveToDrive.addEventListener("click", function() {
            const convertedFiles = [];
            const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');

            downloadLinks.forEach((link, index) => {
                const fileUrl = link.href;
                const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')
                    ?.textContent.trim();
                const fileName = originalFileName ? originalFileName.replace('.pdf', '.docx') :
                    `converted_file_${index + 1}.docx`;

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

            if (typeof google !== 'undefined' && google.accounts) {
                if (!tokenClient) {
                    initTokenClient();
                }
                if (tokenClient) {
                    pendingDriveAction = 'save';
                    filesToSave = convertedFiles;
                    tokenClient.requestAccessToken({
                        prompt: 'consent'
                    });
                }
            } else {
                alert('Google Identity Services not loaded. Please refresh the page.');
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
        saveToDropbox.addEventListener("click", function() {
            const convertedFiles = [];
            const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');

            downloadLinks.forEach((link, index) => {
                const fileUrl = link.href;
                const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')
                    ?.textContent.trim();
                const fileName = originalFileName ? originalFileName.replace('.pdf', '.docx') :
                    `converted_file_${index + 1}.docx`;

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
                        'Files have been downloaded to your computer.\n\n' +
                        'Click OK to open Dropbox upload page where you can drag & drop the downloaded files.\n\n' +
                        'Check your Downloads folder for the files.'
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
        shareOnWhatsApp.addEventListener("click", function() {
            const downloadLinks = document.querySelectorAll('.result-content .btn-outline-success');

            if (downloadLinks.length === 0) {
                alert('No files found to share!');
                return;
            }

            let message = "My PDF files have been successfully converted to Word format!\n\n";

            downloadLinks.forEach((link, index) => {
                const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')?.textContent.trim();
                const fileName = originalFileName ? originalFileName.replace('.pdf', '.docx') : `File ${index + 1}`;
                const downloadUrl = link.href;

                message += `File ${index + 1}: ${fileName}\n`;
                message += `Download: ${downloadUrl}\n\n`;
            });

            message += "Converted using PDF to Word Converter";

            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/?text=${encodedMessage}`;
            window.open(whatsappUrl, '_blank');
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

    // Add animation styles
    if (!document.getElementById('notificationStyles')) {
        const animationStyle = document.createElement('style');
        animationStyle.id = 'notificationStyles';
        animationStyle.textContent = `
        @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        @keyframes slideOutRight { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
    `;
        document.head.appendChild(animationStyle);
    }

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
            const fileName = originalFileName ? originalFileName.replace('.pdf', '.docx') :
                `converted_file_${index + 1}.docx`;

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
    function isPDFFile(file) {
        return file.type === 'application/pdf' ||
            file.name.toLowerCase().endsWith('.pdf');
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
    console.log('PDF to Word Converter - JavaScript Loaded Successfully');
    console.log('Drag & Drop: Enabled');
    console.log('URL Upload: Enabled with CORS Proxy fallback');
    console.log('Current Files Array: Ready');

    // ============ ASYNC POLLING ============
    @if(!empty($is_processing) && !empty($job_id))
    document.addEventListener("DOMContentLoaded", function() {
        const jobId = "{{ $job_id }}";
        const progressSection = document.getElementById('progressSectionWord');
        const progressBar = document.getElementById('wordProgressBar');
        const progressText = document.getElementById('wordProgressText');
        const progressPercentage = document.getElementById('wordProgressPercentage');

        if (progressSection) {
            progressSection.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
            progressSection.style.display = 'block';
        }

        let pollCount = 0;
        const maxPolls = 120; // 10 minutes (5s interval)
        const pollInterval = 5000;

        function checkStatus() {
            if (pollCount >= maxPolls) {
                progressText.innerHTML = "Conversion is taking longer than expected. Please check back later.";
                return;
            }

            fetch("{{ route('pdf.checkStatus') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        job_id: jobId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    pollCount++;

                    if (data.success) {
                        const status = data.status.toLowerCase();

                        if (status === 'completed' || status === 'success') {
                            progressBar.style.width = '100%';
                            progressPercentage.innerHTML = '100%';
                            progressText.innerHTML = 'Conversion complete! Redirecting...';

                            // Small delay to show 100% then refresh to show results from session
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);

                        } else if (status === 'failed' || status === 'error') {
                            progressText.innerHTML = 'Conversion failed: ' + (data.message || 'Unknown error');
                            progressBar.classList.remove('bg-primary');
                            progressBar.classList.add('bg-danger');
                        } else {
                            // Still processing
                            let progress = Math.min(pollCount * 5, 95);
                            progressBar.style.width = progress + '%';
                            progressPercentage.innerHTML = Math.round(progress) + '%';
                            progressText.innerHTML = 'Converting your files... (' + status + ')';

                            setTimeout(checkStatus, pollInterval);
                        }
                    } else {
                        console.error('Status check failed:', data.message);
                        setTimeout(checkStatus, pollInterval);
                    }
                })
                .catch(error => {
                    console.error('Error polling status:', error);
                    setTimeout(checkStatus, pollInterval);
                });
        }

        // Make sure progress bar is visible
        const conversionSection = document.getElementById('conversionSection');
        if (conversionSection) conversionSection.style.display = 'none';

        setTimeout(checkStatus, 2000);
    });
    @endif


    // ============ FAQ TOGGLE ============
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
