@extends('main')
@section('title', __('summarize-pdf.title'))
@section('description', __('summarize-pdf.description'))

@push('head')
<link rel="stylesheet" href="{{ asset('css/pdfsummarize.css') }}">
@endpush


@section('page')
<!-- Hero Section -->
<form action="{{ localized_route('pdf.summerize.process') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="hero-section">
        <div class="container text-center py-4">
            <h1 class="hero-title mb-3">{{ __('summarize-pdf.hero-title') }}</h1>

            <p class="lead mb-5">{{ __('summarize-pdf.hero-description') }}</p>
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
                        <h3 class="mb-2">{{ __('summarize-pdf.drop-file') }}</h3>
                        <p class="text-muted mb-4">{{ __('summarize-pdf.or-select-file') }}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-primary btn-upload" type="button" id="uploadBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                                </svg> {{ __('summarize-pdf.upload-pdf') }}
                            </button>
                            <input type="file" name="files[]" id="fileInput" accept=".pdf" class="d-none" multiple>
                        </div>

                        <!-- Preview Area -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4" id="filePreview"></div>

                        <!-- URL Input Container -->
                        <div class="url-input-container" id="urlInputContainer">
                            <div class="url-input-group">
                                <input type="text" class="url-input" id="urlInput" placeholder="{{ __('summarize-pdf.enter-pdf-url') }}">
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
                        <img src="{{asset('images/drivelogo.svg')}}"
                            alt="Google Drive" width="22" height="22">
                        <span>{{ __('summarize-pdf.google-drive') }}</span>
                    </div>
                    <div class="source-item" id="dropboxBtn">
                        <img src="{{asset('images/Drop-icon.svg')}}" alt="Dropbox"
                            width="22" height="22" style="vertical-align:middle;">
                        <span>{{ __('summarize-pdf.dropbox') }}</span>
                    </div>
                    <div class="source-item" id="urlSourceBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path
                                d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                            <path
                                d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                        </svg>
                        <span>{{ __('summarize-pdf.from-url') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Result Section --}}
    @if (!empty($api_response) && !empty($api_response['data']))
    <section class="result-section resultnew" id="resultSection" style="display: block;">
        <div class="result-header">
            <h4><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                    class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                </svg>{{ __('summarize-pdf.summary-result') }}</h4>
            <div class="d-flex gap-2">
                <a href="{{ localized_route('pdf.summerize.process') }}" class="btn btn-sm btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                    </svg> {{ __('summarize-pdf.summarize-another') }}
                </a>
            </div>
        </div>

        <div class="result-content mt-3">
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg> {{ __('summarize-pdf.success-message') }}
            </div>

            @foreach ($api_response['data'] as $index => $file)
            @php
            $originalName = basename($uploaded_files[$index] ?? '');
            $originalName = urldecode($originalName);
            $originalName = preg_replace('/^\d+_/', '', $originalName);

            $summaryText = $file['summary_text'] ?? __('summarize-pdf.api-warning');
            $rawSummaryForPDF = $summaryText;

            $summaryText = preg_replace('/^\|.*\|$/m', '', $summaryText);
            $summaryText = preg_replace('/^\|[-:\s]+\|$/m', '', $summaryText);
            $summaryText = preg_replace('/^### (.+)$/m', '<h5 class="heading-3">$1</h5>', $summaryText);
            $summaryText = preg_replace('/^## (.+)$/m', '<h4 class="heading-2">$1</h4>', $summaryText);
            $summaryText = preg_replace('/^# (.+)$/m', '<h3 class="heading-1">$1</h3>', $summaryText);
            $summaryText = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $summaryText);
            $summaryText = preg_replace('/\*(.+?)\*/s', '<em>$1</em>', $summaryText);
            $summaryText = preg_replace('/^[-•]\s+(.+)$/m', '<li>$1</li>', $summaryText);
            $summaryText = preg_replace(
                '~(<li>.*?</li>\s*)+~s',
                '<ul class="custom-list">$0</ul>',
                $summaryText,
            );
            $summaryText = preg_replace(
                '/^>\s*(.+)$/m',
                '<div class="blockquote-box">$1</div>',
                $summaryText,
            );
            $summaryText = preg_replace('/^-{3,}$/m', '', $summaryText);
            $summaryText = preg_replace('/\n{3,}/', "\n\n", $summaryText);
            $summaryText = nl2br($summaryText);
            $summaryText = preg_replace_callback(
                '~<(h[3-5]|li)[^>]*>.*?</\1>~s',
                function ($match) {
                    return str_replace(['<br />', '<br>'], '', $match[0]);
                },
                $summaryText,
            );
            @endphp

                            <div class="row mt-3">
                                {{-- Original PDF Box --}}
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-header text-white text-center"
                                            style="background: linear-gradient(135deg, #f82b35 0%, #764ba2 100%);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                                <path fill-rule="evenodd"
                                                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                                            </svg>
                                            <strong>{{ __('summarize-pdf.original-pdf') }}</strong>
                                            <div class="mt-1 small">{{ __('summarize-pdf.page-of') }}</div>
                                        </div>
                                        <div class="card-body p-0" style="background-color: #f8f9fa;">
                                            <div class="pdf-preview-container" style="height: 500px; overflow: hidden;">
                                                <iframe src="{{ $file['file_url'] ?? '#' }}"
                                                    style="width: 100%; height: 100%; border: none;" frameborder="0"
                                                    title="PDF Preview - {{ $originalName }}">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Summary Box --}}
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-header text-white text-center"
                                            style="background: linear-gradient(135deg, #f82b35 0%, #764ba2 100%);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                            </svg>
                                            <strong>{{ __('summarize-pdf.converted-summary') }}</strong>
                                            <div class="mt-1 small">{{ __('summarize-pdf.page-of') }}</div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="summary-text bg-white rounded border"
                                                id="summary-display-{{ $index }}"
                                                style="max-height: 500px; overflow-y: auto; padding: 15px;">
                                                {!! $summaryText !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Download Button --}}
                            <div class="row">
                                <div class="col-12 text-center mb-4">
                                    <button type="button" class="btn btn-success btn-lg"
                                        onclick="downloadSummaryAsPDF({{ $index }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                                        </svg> {{ __('summarize-pdf.download-summary-pdf') }}
                                    </button>
                                </div>
                            </div>

                            {{-- Hidden data for PDF (plain text) --}}
                            <textarea id="summary-raw-{{ $index }}" style="display: none;">{{ $rawSummaryForPDF }}</textarea>
                            <input type="hidden" id="file-name-{{ $index }}" value="{{ $originalName }}">
                            @endforeach
        </div>
    </section>

    <div class="share-options mt-4">
        <h5 class="mb-3 text-center">{{ __('summarize-pdf.save-or-share') }}</h5>
        <div class="d-flex flex-wrap gap-2 justify-content-center">
            <button class="btn share-btn" type="button" id="saveToDrive" title="{{ __('summarize-pdf.save-to-drive') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/da/Google_Drive_logo.png"
                    alt="Google Drive">
            </button>

            <button class="btn share-btn" type="button" id="saveToDropbox" title="{{ __('summarize-pdf.save-to-dropbox') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Dropbox_Icon.svg" alt="Dropbox">
            </button>

            <button class="btn share-btn" type="button" id="shareOnWhatsApp" title="{{ __('summarize-pdf.share-on-whatsapp') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
            </button>

            <button class="btn share-btn" type="button" id="qrBtn"
                @php
                $qrUrl='' ;
                if (!empty($api_response['data'][0]['file_url'])) {
                $qrUrl=route('pdf.summarizer.download', ['download_url'=> $api_response['data'][0]['file_url']]);
                }
                @endphp
                onclick="openQrModal('{{ $qrUrl }}')" title="{{ __('summarize-pdf.get-qr-code') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M3 3h8v8H3V3zm2 2v4h4V5H5zm6-2h8v8h-8V3zm2 2v4h4V5h-4zM3 13h8v8H3v-8zm2 2v4h4v-4H5zm10 0h2v2h-2v-2zm-2 2h2v2h-2v-2zm4 0h2v2h-2v-2zm-2 2h2v2h-2v-2zm4 0h2v6h-6v-2h4v-4zm-8 2h2v2h-2v-2zm2 2h2v2h-2v-2z" />
                </svg>
            </button>

        </div>
    </div>
    @elseif(!empty($api_response) && empty($api_response['data']))
    <div class="alert alert-warning mt-3">
        <i class="fas fa-exclamation-triangle me-2"></i>
        {{ __('summarize-pdf.no-summary-generated') }}
    </div>
    @endif

    <!-- Conversion Section -->
    <section class="conversion-section" id="conversionSection">
        <div class="container">
            <div class="text-center mb-4">
                <h3><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                    </svg> {{ __('summarize-pdf.summarize-options') }}</h3>
                <p class="text-muted">{{ __('summarize-pdf.customize-summary') }}</p>
            </div>
            <div class="conversion-options d-flex flex-column align-items-center text-center">

                <div class="option-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                    </svg>
                    <span>{{ __('summarize-pdf.summary-length') }}</span>
                </div>

                <div class="btn-group w-100 format-options d-flex justify-content-center" role="group"
                    aria-label="Summary Length">

                    <input type="radio" class="btn-check" name="summary_length" id="briefSummary" value="brief"
                        checked>
                    <label class="btn btn-outline-primary format-option" for="briefSummary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                        </svg> {{ __('summarize-pdf.brief') }}
                    </label>

                    <input type="radio" class="btn-check" name="summary_length" id="comprehensiveSummary"
                        value="comprehensive">
                    <label class="btn btn-outline-secondary format-option" for="comprehensiveSummary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                        </svg> {{ __('summarize-pdf.comprehensive') }}
                    </label>

                    <input type="radio" class="btn-check" name="summary_length" id="detailedSummary"
                        value="detailed">
                    <label class="btn btn-outline-success format-option" for="detailedSummary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                        </svg> {{ __('summarize-pdf.detailed') }}
                    </label>

                </div>
            </div>
            <div class="option-group">
                <button class="btn convert-btn" id="convertBtn" type="submit">
                    <i class="fas fa-file-lines me-1" style="opacity:1; visibility:visible; color: inherit;"></i>
                    {{ __('summarize-pdf.summarize-pdf-button') }}
                </button>
            </div>
        </div>
    </section>
</form>


<!-- Progress Bar Section for PDF Summarizer -->
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
                    {{ __('summarize-pdf.summarizing-pdf') }}
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
                        <p class="text-muted" id="wordProgressText">{{ __('summarize-pdf.preparing-pdf') }}</p>
                        <small class="text-muted" id="wordProgressPercentage">0%</small>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">{{ __('summarize-pdf.summarizing') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Related Tools Section --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{ __('summarize-pdf.related-tools') }}</h2>
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
                            <h3 class="card-title">{{ __('summarize-pdf.pdf-to-word') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2">
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
                            <h3 class="card-title">{{ __('summarize-pdf.word-to-pdf') }}</h3>
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
                            <h3 class="card-title">{{ __('summarize-pdf.pdf-to-images') }}</h3>
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
                            <h3 class="card-title">{{ __('summarize-pdf.jpg-to-pdf') }}</h3>
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
                            <h3 class="card-title">{{ __('summarize-pdf.compress-pdf') }}</h3>
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
                            <h3 class="card-title">{{ __('summarize-pdf.merge-pdf') }}</h3>
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
                            <h3 class="card-title">{{__('summarize-pdf.ppt-to-pdf')}}</h3>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- Features Section -->
<section class="section bg-light">
    <div class="container p-5">
        <div class="text-center mb-5">
            <h2 class="section-title">{{ __('summarize-pdf.why-choose-title') }}</h2>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-magic" viewBox="0 0 16 16">
                        <path
                            d="M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707zM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1zM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707zM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('summarize-pdf.accurate-formatting') }}</h3>
                <p class="feature-text">{{ __('summarize-pdf.accurate-formatting-desc') }}</p>
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
                <h3 class="feature-title">{{ __('summarize-pdf.safe-private') }}</h3>
                <p class="feature-text">{{ __('summarize-pdf.safe-private-desc') }}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                        <path
                            d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('summarize-pdf.flexible-summaries') }}</h3>
                <p class="feature-text">{{ __('summarize-pdf.flexible-summaries-desc') }}</p>
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
                <h3 class="feature-title">{{ __('summarize-pdf.works-any-device') }}</h3>
                <p class="feature-text">{{ __('summarize-pdf.works-any-device-desc') }}</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                        class="bi bi-infinity" viewBox="0 0 16 16">
                        <path
                            d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                    </svg>
                </div>
                <h3 class="feature-title">{{ __('summarize-pdf.no-limits') }}</h3>
                <p class="feature-text">{{ __('summarize-pdf.no-limits-desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section">
    <div class="container p-5">
        <div class="text-center mb-5">
            <h2 class="section-title">{{ __('summarize-pdf.how-it-works') }}</h2>
            <p class="section-subtitle">{{ __('summarize-pdf.how-it-works-subtitle') }}</p>
        </div>

        <div class="timeline">
            <div class="step-card left">
                <div class="step-number">1</div>
                <h3 class="step-title">{{ __('summarize-pdf.step-1-title') }}</h3>
                <p class="step-text">{{ __('summarize-pdf.step-1-desc') }}</p>
            </div>

            <div class="step-card right">
                <div class="step-number">2</div>
                <h3 class="step-title">{{ __('summarize-pdf.step-2-title') }}</h3>
                <p class="step-text">{{ __('summarize-pdf.step-2-desc') }}</p>
            </div>

            <div class="step-card left">
                <div class="step-number">3</div>
                <h3 class="step-title">{{ __('summarize-pdf.step-3-title') }}</h3>
                <p class="step-text">{{ __('summarize-pdf.step-3-desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Use Cases Section -->
<section class="use-cases-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{ __('summarize-pdf.why-summarize-title') }}</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-file-earmark-medical-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0m-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1m0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1" />
                        </svg>
                    </div>
                    <h3>{{ __('summarize-pdf.saves-time') }}</h3>
                    <p class="text-muted">{{ __('summarize-pdf.saves-time-desc') }}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                            <path
                                d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                        </svg>
                    </div>
                    <h3>{{ __('summarize-pdf.easy-understand') }}</h3>
                    <p class="text-muted">{{ __('summarize-pdf.easy-understand-desc') }}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5" />
                            <path
                                d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z" />
                        </svg>
                    </div>
                    <h3>{{ __('summarize-pdf.focus-key-points') }}</h3>
                    <p class="text-muted">{{ __('summarize-pdf.focus-key-points-desc') }}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>
                    </div>
                    <h3>{{ __('summarize-pdf.better-decisions') }}</h3>
                    <p class="text-muted">{{ __('summarize-pdf.better-decisions-desc') }}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="use-case-card">
                    <div class="use-case-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#795ef1"
                            class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                            <path
                                d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z" />
                        </svg>
                    </div>
                    <h3>{{ __('summarize-pdf.convenient-sharing') }}</h3>
                    <p class="text-muted">{{ __('summarize-pdf.convenient-sharing-desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">{{ __('summarize-pdf.faq-title') }}</h2>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <span>{{ __('summarize-pdf.faq-1-question') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('summarize-pdf.faq-1-answer') }}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <span>{{ __('summarize-pdf.faq-2-question') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('summarize-pdf.faq-2-answer') }}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <span>{{ __('summarize-pdf.faq-3-question') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('summarize-pdf.faq-3-answer') }}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <span>{{ __('summarize-pdf.faq-4-question') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('summarize-pdf.faq-4-answer') }}</p>
                    </div>
                </div>

                <div class="faq-card">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <span>{{ __('summarize-pdf.faq-5-question') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="faq-content">
                        <p>{{ __('summarize-pdf.faq-5-answer') }}</p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<!-- Google Identity Services (GIS) for OAuth 2.0 -->
<script src="https://accounts.google.com/gsi/client" async defer></script>
<!-- Google API Loader for Picker -->
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

        console.log('Change event triggered, files:', files.length);

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

        // ✅ ADD THIS: Validate file sizes (5MB limit)
        const maxSize = 5 * 1024 * 1024; // 5MB in bytes
        const oversizedFiles = files.filter(file => file.size > maxSize);

        if (oversizedFiles.length > 0) {
            const fileNames = oversizedFiles.map(f => `${f.name} (${(f.size / (1024 * 1024)).toFixed(2)} MB)`).join('\n');
            alert(`The following files exceed the 5MB limit:\n\n${fileNames}\n\nPlease select files under 5MB.`);
            fileInput.value = '';
            currentFiles = [];
            return;
        }

        // Hide dropzone
        dropZone.style.display = "none";

        filesGridContainer.innerHTML = ""; // reset container

        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

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
                Ready to Summarize
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
                alert('Please select a PDF file to compress');
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
        updateWordProgress(0, 'Preparing PDF for compression...');
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
            'Preparing PDF for compression...',
            'Uploading PDF to server...',
            'Analyzing document structure...',
            'Converting text and formatting...',
            'Processing images and tables...',
            'Generating Compressed PDF...',
            'Finalizing compression...'
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

        updateWordProgress(100, 'Compression completed successfully!');

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
    const CLIENT_ID = "1084655307660-8ad4qpb1prr46gbebbtteb25napr78kd.apps.googleusercontent.com";
    const API_KEY = "AIzaSyA8s9vg7KVtkSzPjeAVsvii8gINjJ9_ep8";
    const SCOPES = 'https://www.googleapis.com/auth/drive.file';

    let pickerApiLoaded = false;
    let oauthToken;
    let tokenClient;
    let pendingAction = null; // 'picker' or 'save'

    // Initialize Google Identity Services Token Client
    function initializeGISClient() {
        tokenClient = google.accounts.oauth2.initTokenClient({
            client_id: CLIENT_ID,
            scope: SCOPES,
            callback: (tokenResponse) => {
                if (tokenResponse && tokenResponse.access_token) {
                    oauthToken = tokenResponse.access_token;
                    if (pendingAction === 'picker') {
                        createPicker();
                    } else if (pendingAction === 'save') {
                        handleSaveToDriveAction();
                    }
                    pendingAction = null;
                }
            },
        });
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
            if (tokenClient) {
                pendingAction = 'picker';
                if (!oauthToken) {
                    tokenClient.requestAccessToken();
                } else {
                    createPicker();
                }
            } else {
                alert('Google Drive client not initialized. Please refresh the page.');
            }
        });
    }

    function createPicker() {
        if (pickerApiLoaded && oauthToken) {
            // Create a view that shows PDF documents and Google Docs (to export as PDF)
            const docsView = new google.picker.DocsView(google.picker.ViewId.DOCS)
                .setMimeTypes('application/pdf,application/vnd.google-apps.document')
                .setMode(google.picker.DocsViewMode.LIST);

            const picker = new google.picker.PickerBuilder()
                .addView(docsView)
                .setOAuthToken(oauthToken)
                .setDeveloperKey(API_KEY)
                .setCallback(pickerCallback)
                .setTitle('Select a PDF Document')
                .build();
            picker.setVisible(true);
        }
    }

    function pickerCallback(data) {
        if (data.action === google.picker.Action.PICKED) {
            const file = data.docs[0];
            const fileId = file.id;
            const fileName = file.name;
            const mimeType = file.mimeType;
            console.log("Selected File:", fileName, "ID:", fileId, "Type:", mimeType);

            // Show loading notification
            showNotification('Downloading file from Google Drive...', 'info');

            // Determine the download URL based on file type
            let downloadUrl;
            if (mimeType === 'application/vnd.google-apps.document') {
                // Google Doc - export as PDF
                downloadUrl = `https://www.googleapis.com/drive/v3/files/${fileId}/export?mimeType=application/pdf`;
            } else {
                // Regular PDF file - download directly
                downloadUrl = `https://www.googleapis.com/drive/v3/files/${fileId}?alt=media`;
            }

            // Download the file from Google Drive using the access token
            fetch(downloadUrl, {
                    headers: {
                        'Authorization': `Bearer ${oauthToken}`
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        if (response.status === 403) {
                            throw new Error('Permission denied. Please ensure the Google Drive API is enabled and you have granted file access permission.');
                        }
                        throw new Error(`Failed to download file from Google Drive (${response.status})`);
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Ensure filename has .pdf extension
                    let finalFileName = fileName;
                    if (!finalFileName.toLowerCase().endsWith('.pdf')) {
                        finalFileName += '.pdf';
                    }

                    // Create a File object from the blob
                    const driveFile = new File([blob], finalFileName, {
                        type: 'application/pdf'
                    });

                    // Add to currentFiles array
                    currentFiles.push(driveFile);

                    // Update file input
                    const dataTransfer = new DataTransfer();
                    currentFiles.forEach(f => dataTransfer.items.add(f));
                    fileInput.files = dataTransfer.files;

                    // Trigger change event to show preview
                    fileInput.dispatchEvent(new Event("change"));

                    showNotification('File successfully loaded from Google Drive!', 'success');
                })
                .catch(error => {
                    console.error('Error downloading from Google Drive:', error);
                    showNotification('Failed to download file: ' + error.message, 'danger');

                    // Show detailed error to user
                    setTimeout(() => {
                        alert('Failed to download file from Google Drive.\n\n' +
                            'Error: ' + error.message + '\n\n' +
                            'Possible solutions:\n' +
                            '1. Make sure the file is a PDF document\n' +
                            '2. Check that you have permission to access this file\n' +
                            '3. Try downloading the file manually and uploading it instead');
                    }, 500);
                });
        }
    }

    // Initialize GIS and Picker
    window.addEventListener('load', () => {
        initializeGISClient();
        loadPicker();
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

    // ============ URL INPUT SUBMIT - WITH ENHANCED LOADING FOR PDF ============
    const urlSubmitBtn = document.getElementById('urlSubmitBtn');
    if (urlSubmitBtn) {
        urlSubmitBtn.addEventListener('click', function() {
            const urlInput = document.getElementById('urlInput');
            const url = urlInput ? urlInput.value.trim() : '';

            if (!url) {
                showNotification('Please enter a valid PDF URL', 'warning');
                return;
            }

            if (!url.toLowerCase().endsWith('.pdf') && !url.includes('.pdf?')) {
                showNotification('Please enter a valid PDF URL', 'warning');
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
                <div class="spinner-border text-danger" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="url-loading-text">
                <h5 id="urlLoadingTitle">Fetching ${fileType} file from URL...</h5>
                <p id="urlLoadingMessage">Please wait while we download your file</p>
            </div>
            <div class="url-loading-progress">
                <div class="progress" style="height: 4px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" 
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
            from { opacity: 0; }
            to { opacity: 1; }
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
            from { opacity: 1; }
            to { opacity: 0; }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
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

    // Function to fetch PDF with multiple fallback methods and loading updates
    async function fetchPDFFromURL(url) {
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

    // ============ HELPER FUNCTION TO GET ALL DOWNLOADABLE FILES ============
    function getAllDownloadableFiles() {
        const files = [];

        // Get compressed PDF files (from compression feature)
        const compressedLinks = document.querySelectorAll('.result-content .btn-outline-success');
        compressedLinks.forEach((link, index) => {
            const originalFileName = link.closest('.row')?.querySelector('.col-5 p.text-muted')?.textContent.trim();
            const fileName = originalFileName ? originalFileName.replace('.pdf', '_compressed.pdf') : `compressed_file_${index + 1}.pdf`;

            files.push({
                url: link.href,
                name: fileName,
                type: 'compressed'
            });
        });

        // Get summary PDF files (from summarize feature)
        const summaryButtons = document.querySelectorAll('button[onclick^="downloadSummaryAsPDF"]');
        summaryButtons.forEach((button, index) => {
            const onclickAttr = button.getAttribute('onclick');
            const match = onclickAttr.match(/downloadSummaryAsPDF\((\d+)\)/);
            if (match) {
                const summaryIndex = match[1];
                const fileNameInput = document.getElementById('file-name-' + summaryIndex);
                if (fileNameInput) {
                    const fileName = fileNameInput.value;
                    const summaryFileName = 'Summary_' + fileName.replace('.pdf', '') + '.pdf';

                    files.push({
                        url: null,
                        name: summaryFileName,
                        type: 'summary',
                        index: summaryIndex
                    });
                }
            }
        });

        return files;
    }

    // ============ GENERATE SUMMARY PDF BLOB ============
    async function generateSummaryPDFBlob(summaryIndex) {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF('p', 'mm', 'a4');

        const summaryDisplay = document.getElementById('summary-display-' + summaryIndex);
        const fileName = document.getElementById('file-name-' + summaryIndex).value;

        const pageWidth = doc.internal.pageSize.getWidth();
        const pageHeight = doc.internal.pageSize.getHeight();
        const margin = 20;
        const maxWidth = pageWidth - (margin * 2);
        let yPosition = margin;

        doc.setFontSize(20);
        doc.setFont(undefined, 'bold');
        doc.setTextColor(121, 94, 241);
        const cleanedTitle = intelligentTextClean(fileName);
        const titleLines = doc.splitTextToSize(cleanedTitle, maxWidth);
        doc.text(titleLines, margin, yPosition);
        yPosition += titleLines.length * 8 + 6;

        doc.setDrawColor(200, 200, 200);
        doc.setLineWidth(0.5);
        doc.line(margin, yPosition, pageWidth - margin, yPosition);
        yPosition += 10;

        processContent(doc, summaryDisplay, margin, yPosition, maxWidth, pageHeight);

        return doc.output('blob');
    }



    // ============ SAVE TO GOOGLE DRIVE WITH LOADING ============
    const saveToDrive = document.getElementById("saveToDrive");
    if (saveToDrive) {
        saveToDrive.addEventListener("click", function() {
            if (tokenClient) {
                pendingAction = 'save';
                if (!oauthToken) {
                    tokenClient.requestAccessToken();
                } else {
                    handleSaveToDriveAction();
                }
            } else {
                alert('Google Drive client not initialized. Please refresh the page.');
            }
        });
    }

    async function handleSaveToDriveAction() {
        const files = getAllDownloadableFiles();

        console.log('Found files for Google Drive:', files);

        if (files.length === 0) {
            showNotification('No files found to save!', 'warning');
            return;
        }

        showDriveSaveLoadingOverlay(files.length);
        await saveFilesToGoogleDrive(files, oauthToken);
    }

    async function saveFilesToGoogleDrive(files, accessToken) {
        let savedCount = 0;
        const totalFiles = files.length;

        const saveBtn = document.getElementById("saveToDrive");
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
        saveBtn.disabled = true;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            updateDriveSaveProgress(savedCount, totalFiles, `Uploading ${file.name}...`);

            try {
                let blob;

                if (file.type === 'summary') {
                    blob = await generateSummaryPDFBlob(file.index);
                } else {
                    const response = await fetch(file.url);
                    blob = await response.blob();
                }

                const metadata = {
                    name: file.name,
                    parents: []
                };

                const form = new FormData();
                form.append('metadata', new Blob([JSON.stringify(metadata)], {
                    type: 'application/json'
                }));
                form.append('file', blob);

                const uploadResponse = await fetch('https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart', {
                    method: 'POST',
                    headers: new Headers({
                        'Authorization': `Bearer ${accessToken}`
                    }),
                    body: form
                });

                const data = await uploadResponse.json();
                savedCount++;
                console.log(`File ${savedCount} saved to Google Drive:`, data);

                updateDriveSaveProgress(savedCount, totalFiles, `Saved ${savedCount}/${totalFiles} files`);

                if (savedCount === totalFiles) {
                    setTimeout(() => {
                        hideDriveSaveLoadingOverlay();

                        saveBtn.innerHTML = '<i class="fas fa-check"></i> Saved to Drive!';
                        saveBtn.classList.remove('btn-outline-primary');
                        saveBtn.classList.add('btn-success');

                        setTimeout(() => {
                            saveBtn.innerHTML = originalText;
                            saveBtn.classList.remove('btn-success');
                            saveBtn.classList.add('btn-outline-primary');
                            saveBtn.disabled = false;
                        }, 3000);

                        showNotification(`Successfully saved ${totalFiles} file(s) to Google Drive!`, 'success');
                    }, 500);
                }
            } catch (error) {
                console.error('Error saving to Google Drive:', error);
                hideDriveSaveLoadingOverlay();
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
                showNotification('Error saving files to Google Drive', 'danger');
                break;
            }
        }
    }

    // Function to show Google Drive save loading overlay
    function showDriveSaveLoadingOverlay(totalFiles) {
        const existingOverlay = document.getElementById('driveSaveLoadingOverlay');
        if (existingOverlay) {
            existingOverlay.remove();
        }

        const overlay = document.createElement('div');
        overlay.id = 'driveSaveLoadingOverlay';
        overlay.innerHTML = `
        <div class="drive-save-loading-content">
            <div class="drive-save-icon">
                <i class="fab fa-google-drive" style="font-size: 3rem; color: #4285f4;"></i>
            </div>
            <div class="drive-save-text">
                <h5 id="driveSaveTitle">Saving to Google Drive</h5>
                <p id="driveSaveMessage">Preparing files...</p>
            </div>
            <div class="drive-save-progress">
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                         role="progressbar" 
                         id="driveSaveProgressBar"
                         style="width: 0%">
                    </div>
                </div>
                <p class="mt-2 mb-0" id="driveSaveCount" style="color: #6c757d; font-size: 0.9rem;">
                    0 of ${totalFiles} files saved
                </p>
            </div>
        </div>
    `;

        document.body.appendChild(overlay);

        const style = document.createElement('style');
        style.id = 'driveSaveLoadingStyles';
        style.textContent = `
        #driveSaveLoadingOverlay {
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

        .drive-save-loading-content {
            background: white;
            border-radius: 16px;
            padding: 40px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.4s ease-out;
        }

        .drive-save-icon {
            margin-bottom: 25px;
            animation: bounce 2s infinite;
        }

        .drive-save-text h5 {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .drive-save-text p {
            color: #6c757d;
            margin-bottom: 25px;
            font-size: 0.95rem;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    `;

        const existingStyle = document.getElementById('driveSaveLoadingStyles');
        if (existingStyle) {
            existingStyle.remove();
        }
        document.head.appendChild(style);
    }

    // Function to update Google Drive save progress
    function updateDriveSaveProgress(saved, total, message) {
        const progressBar = document.getElementById('driveSaveProgressBar');
        const messageElement = document.getElementById('driveSaveMessage');
        const countElement = document.getElementById('driveSaveCount');

        if (progressBar) {
            const percentage = (saved / total) * 100;
            progressBar.style.width = percentage + '%';
        }

        if (messageElement) {
            messageElement.textContent = message;
        }

        if (countElement) {
            countElement.textContent = `${saved} of ${total} files saved`;
        }
    }

    // Function to hide Google Drive save loading overlay
    function hideDriveSaveLoadingOverlay() {
        const overlay = document.getElementById('driveSaveLoadingOverlay');
        if (overlay) {
            overlay.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                overlay.remove();
                const style = document.getElementById('driveSaveLoadingStyles');
                if (style) {
                    style.remove();
                }
            }, 300);
        }
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

    // Add notification animation styles
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
    window.fetchPDFFromURL = fetchPDFFromURL;
    window.showDriveSaveLoadingOverlay = showDriveSaveLoadingOverlay;
    window.hideDriveSaveLoadingOverlay = hideDriveSaveLoadingOverlay;
    window.updateDriveSaveProgress = updateDriveSaveProgress;
    window.showNotification = showNotification;

    // ============ SAVE TO DROPBOX ============
    const saveToDropbox = document.getElementById("saveToDropbox");
    if (saveToDropbox) {
        saveToDropbox.addEventListener("click", async function() {
            const files = getAllDownloadableFiles(); // CHANGE

            console.log('Found files for Dropbox:', files);

            if (files.length === 0) {
                showNotification('No files found to save!', 'warning');
                return;
            }

            await saveFilesToDropbox(files); // CHANGE: await add kiya
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

    async function tryDropboxSave(file, index, files, saveBtn, originalText) {
        console.log('Trying Dropbox save for:', file.name);

        if (typeof Dropbox === 'undefined') {
            showNotification('Dropbox API not loaded. Please refresh the page.', 'danger');
            saveBtn.innerHTML = originalText;
            saveBtn.disabled = false;
            return;
        }

        try {
            let blob;

            if (file.type === 'summary') {
                blob = await generateSummaryPDFBlob(file.index);
            } else {
                const response = await fetch(file.url);
                blob = await response.blob();
            }

            const blobUrl = URL.createObjectURL(blob);

            Dropbox.save({
                files: [{
                    url: blobUrl,
                    filename: file.name
                }],
                success: function() {
                    console.log(`File "${file.name}" successfully saved to Dropbox`);
                    URL.revokeObjectURL(blobUrl);
                    setTimeout(() => {
                        processDropboxFileWithAuth(files, index + 1, saveBtn, originalText);
                    }, 1500);
                },
                error: function(errorMessage) {
                    console.error('Dropbox save error:', errorMessage);
                    URL.revokeObjectURL(blobUrl);
                    setTimeout(() => {
                        processDropboxFileWithAuth(files, index + 1, saveBtn, originalText);
                    }, 1000);
                },
                cancel: function() {
                    console.log('User cancelled Dropbox save');
                    URL.revokeObjectURL(blobUrl);
                    saveBtn.innerHTML = originalText;
                    saveBtn.disabled = false;
                    showNotification('Dropbox save cancelled by user.', 'info');
                }
            });
        } catch (error) {
            console.error('Error preparing file for Dropbox:', error);
            setTimeout(() => {
                processDropboxFileWithAuth(files, index + 1, saveBtn, originalText);
            }, 1000);
        }
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
            const files = getAllDownloadableFiles(); // CHANGE: ye line add ki

            if (files.length === 0) {
                showNotification('No files found to share!', 'warning'); // CHANGE: alert ko notification se replace kiya
                return;
            }

            let message = "My PDF files have been successfully processed!\n\n"; // CHANGE: message update kiya

            files.forEach((file, index) => { // CHANGE: forEach loop update kiya
                if (file.type === 'summary') {
                    message += `📄 File ${index + 1}: ${file.name} (Summary PDF)\n`;
                    message += `✅ Summary generated successfully\n\n`;
                } else {
                    message += `📄 File ${index + 1}: ${file.name}\n`;
                    message += `📥 Download: ${file.url}\n\n`;
                }
            });

            message += "🔧 Processed using PDF Tools"; // CHANGE: message footer update kiya

            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/?text=${encodedMessage}`;
            window.open(whatsappUrl, '_blank');
        });
    }

    // js for saving summary as pdf
    // Load jsPDF
    function downloadSummaryAsPDF(index) {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF('p', 'mm', 'a4');

        // Get the displayed HTML content
        const summaryDisplay = document.getElementById('summary-display-' + index);
        const fileName = document.getElementById('file-name-' + index).value;

        // Page settings
        const pageWidth = doc.internal.pageSize.getWidth();
        const pageHeight = doc.internal.pageSize.getHeight();
        const margin = 20;
        const maxWidth = pageWidth - (margin * 2);
        let yPosition = margin;

        // Title section
        doc.setFontSize(20);
        doc.setFont(undefined, 'bold');
        doc.setTextColor(121, 94, 241);
        const cleanedTitle = intelligentTextClean(fileName);
        const titleLines = doc.splitTextToSize(cleanedTitle, maxWidth);
        doc.text(titleLines, margin, yPosition);
        yPosition += titleLines.length * 8 + 6;

        // Separator line
        doc.setDrawColor(200, 200, 200);
        doc.setLineWidth(0.5);
        doc.line(margin, yPosition, pageWidth - margin, yPosition);
        yPosition += 10;

        // Process content recursively
        processContent(doc, summaryDisplay, margin, yPosition, maxWidth, pageHeight);

        // Save PDF
        const pdfFileName = 'Summary_' + cleanedTitle.replace('.pdf', '') + '.pdf';
        doc.save(pdfFileName);
    }

    // Main content processor
    function processContent(doc, container, margin, startY, maxWidth, pageHeight) {
        let yPosition = startY;
        const elements = container.children;

        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];

            // Check for page break
            if (yPosition > pageHeight - 40) {
                doc.addPage();
                yPosition = margin;
            }

            // Process element based on type
            const result = processElement(doc, element, margin, yPosition, maxWidth, pageHeight);
            yPosition = result.yPosition;
        }
    }

    // Process individual element dynamically
    function processElement(doc, element, margin, yPosition, maxWidth, pageHeight) {
        const tagName = element.tagName.toLowerCase();
        const classList = Array.from(element.classList || []);

        // Handle headings dynamically
        if (tagName.match(/^h[1-6]$/)) {
            return processHeading(doc, element, tagName, margin, yPosition, maxWidth);
        }

        // Handle lists
        if (tagName === 'ul' || tagName === 'ol') {
            return processList(doc, element, tagName, margin, yPosition, maxWidth, pageHeight);
        }

        // Handle blockquotes
        if (tagName === 'blockquote' || classList.includes('blockquote-box')) {
            return processBlockquote(doc, element, margin, yPosition, maxWidth, pageHeight);
        }

        // Handle line breaks
        if (tagName === 'br') {
            return {
                yPosition: yPosition + 4
            };
        }

        // Handle divs, spans, and paragraphs
        if (tagName === 'div' || tagName === 'p' || tagName === 'span') {
            return processParagraph(doc, element, margin, yPosition, maxWidth, pageHeight);
        }

        // Default: treat as text
        const text = element.textContent.trim();
        if (text) {
            return processParagraph(doc, element, margin, yPosition, maxWidth, pageHeight);
        }

        return {
            yPosition: yPosition + 3
        };
    }

    // Process headings dynamically based on level
    function processHeading(doc, element, tagName, margin, yPosition, maxWidth) {
        // Extract heading level
        const level = parseInt(tagName.replace('h', ''));

        // Dynamic font sizes and spacing based on heading level
        const headingConfig = {
            1: {
                fontSize: 18,
                spaceBefore: 6,
                spaceAfter: 8
            },
            2: {
                fontSize: 16,
                spaceBefore: 5,
                spaceAfter: 7
            },
            3: {
                fontSize: 14,
                spaceBefore: 4,
                spaceAfter: 6
            },
            4: {
                fontSize: 12,
                spaceBefore: 3,
                spaceAfter: 5
            },
            5: {
                fontSize: 11,
                spaceBefore: 2,
                spaceAfter: 4
            },
            6: {
                fontSize: 10,
                spaceBefore: 2,
                spaceAfter: 3
            }
        };

        const config = headingConfig[level] || headingConfig[3];

        // Add space before heading
        yPosition += config.spaceBefore;

        // Set heading style
        doc.setFontSize(config.fontSize);
        doc.setFont(undefined, 'bold');

        // Dynamic color based on level
        const grayScale = 51 + (level * 10);
        doc.setTextColor(grayScale, grayScale, grayScale);

        // Clean and render text
        const text = intelligentTextClean(element.textContent);
        const lines = doc.splitTextToSize(text, maxWidth);
        doc.text(lines, margin, yPosition);

        // Add space after heading
        yPosition += lines.length * (config.fontSize * 0.4) + config.spaceAfter;

        return {
            yPosition
        };
    }

    // Process lists dynamically
    function processList(doc, element, listType, margin, yPosition, maxWidth, pageHeight) {
        const listItems = element.querySelectorAll('li');
        let itemNumber = 1;

        for (let li of listItems) {
            // Check page break
            if (yPosition > pageHeight - 40) {
                doc.addPage();
                yPosition = margin;
            }

            doc.setFontSize(11);
            doc.setFont(undefined, 'normal');
            doc.setTextColor(68, 68, 68);

            // Get marker based on list type
            const marker = listType === 'ol' ? `${itemNumber}. ` : '• ';

            // Extract and clean text with formatting
            const formattedText = extractFormattedText(li);
            const cleanedText = intelligentTextClean(formattedText);

            // Render with marker
            yPosition = renderFormattedText(doc, marker + cleanedText, margin, yPosition, maxWidth, 5);
            yPosition += 5;

            itemNumber++;
        }

        // Extra space after list
        yPosition += 3;

        return {
            yPosition
        };
    }

    // Process blockquotes
    function processBlockquote(doc, element, margin, yPosition, maxWidth, pageHeight) {
        yPosition += 3;

        doc.setFontSize(11);
        doc.setFont(undefined, 'italic');
        doc.setTextColor(100, 100, 100);

        const text = intelligentTextClean(element.textContent);
        const formattedText = extractFormattedText(element);
        const cleanedText = intelligentTextClean(formattedText);

        // Render with indentation
        yPosition = renderFormattedText(doc, cleanedText, margin + 10, yPosition, maxWidth - 10, 0);
        yPosition += 4;

        doc.setFont(undefined, 'normal');

        return {
            yPosition
        };
    }

    // Process paragraphs and text content
    function processParagraph(doc, element, margin, yPosition, maxWidth, pageHeight) {
        const text = element.textContent.trim();

        if (!text) {
            return {
                yPosition: yPosition + 3
            };
        }

        doc.setFontSize(11);
        doc.setFont(undefined, 'normal');
        doc.setTextColor(68, 68, 68);

        const formattedText = extractFormattedText(element);
        const cleanedText = intelligentTextClean(formattedText);

        if (cleanedText) {
            yPosition = renderFormattedText(doc, cleanedText, margin, yPosition, maxWidth, 0);
            yPosition += 6;
        }

        return {
            yPosition
        };
    }

    // Intelligent text cleaning - handles all spacing issues dynamically
    function intelligentTextClean(text) {
        if (!text) return '';

        // Step 1: Normalize all whitespace
        text = text.replace(/\s+/g, ' ').trim();

        // Step 2: Fix character-level spacing (e.g., "t h i r d" -> "third")
        // This regex finds patterns where single chars are separated by spaces
        text = text.replace(/\b([a-zA-Z])\s+(?=[a-zA-Z]\s|[a-zA-Z]\b)/g, '$1');

        // Step 3: Fix remaining single-space patterns between chars
        // Continue fixing until no more patterns found
        let previousText;
        let iterations = 0;
        const maxIterations = 10;

        do {
            previousText = text;
            text = text.replace(/\b([a-zA-Z])\s+([a-zA-Z])\b/g, '$1$2');
            iterations++;
        } while (text !== previousText && iterations < maxIterations);

        // Step 4: Clean up any double spaces created
        text = text.replace(/\s{2,}/g, ' ');

        // Step 5: Fix common punctuation spacing
        text = text.replace(/\s+([.,;:!?])/g, '$1');
        text = text.replace(/([.,;:!?])\s{2,}/g, '$1 ');

        // Step 6: Trim and return
        return text.trim();
    }

    // Extract formatted text from HTML element
    function extractFormattedText(element) {
        let result = '';

        function processNode(node) {
            if (node.nodeType === Node.TEXT_NODE) {
                return node.textContent;
            } else if (node.nodeType === Node.ELEMENT_NODE) {
                const tag = node.tagName.toLowerCase();
                let content = '';

                for (let child of node.childNodes) {
                    content += processNode(child);
                }

                // Preserve formatting markers
                if (tag === 'strong' || tag === 'b') {
                    return '**' + content + '**';
                } else if (tag === 'em' || tag === 'i') {
                    return '*' + content + '*';
                } else if (tag === 'br') {
                    return ' ';
                } else {
                    return content;
                }
            }
            return '';
        }

        for (let child of element.childNodes) {
            result += processNode(child);
        }

        return result.trim();
    }

    // Render text with formatting - FIXED VERSION
    function renderFormattedText(doc, text, x, y, maxWidth, indent = 0) {
        const actualMaxWidth = maxWidth - indent;
        const lineHeight = 6;
        const startX = x + indent;

        const segments = parseFormattedSegments(text);

        let currentLine = [];
        let currentLineWidth = 0;

        // Calculate space width with normal font for consistency
        doc.setFont(undefined, 'normal');
        const spaceWidth = doc.getTextWidth(' ');

        for (let seg of segments) {
            if (!seg.text) continue;

            const words = seg.text.split(/\s+/).filter(w => w.length > 0);

            for (let word of words) {
                // *** CRITICAL FIX: Set font BEFORE measuring width ***
                setFont(doc, seg.bold, seg.italic);
                const wordWidth = doc.getTextWidth(word);

                // Calculate space before this word (if not first word in line)
                const spaceBeforeWord = currentLine.length > 0 ? spaceWidth : 0;
                const totalWidth = currentLineWidth + spaceBeforeWord + wordWidth;

                // Check if word fits on current line
                if (totalWidth > actualMaxWidth && currentLine.length > 0) {
                    // Render current line
                    y = renderLineSegments(doc, currentLine, startX, y);
                    y += lineHeight;

                    // Check for page break
                    if (y > doc.internal.pageSize.getHeight() - 35) {
                        doc.addPage();
                        y = 20;
                    }

                    // Start new line with current word
                    currentLine = [{
                        text: word,
                        bold: seg.bold,
                        italic: seg.italic
                    }];
                    currentLineWidth = wordWidth;
                } else {
                    // Add word to current line
                    currentLine.push({
                        text: word,
                        bold: seg.bold,
                        italic: seg.italic
                    });
                    currentLineWidth = totalWidth;
                }
            }
        }

        // Render final line if any words remain
        if (currentLine.length > 0) {
            y = renderLineSegments(doc, currentLine, startX, y);
            y += lineHeight;
        }

        return y;
    }

    // Set font style
    function setFont(doc, bold, italic) {
        if (bold && italic) {
            doc.setFont(undefined, 'bolditalic');
        } else if (bold) {
            doc.setFont(undefined, 'bold');
        } else if (italic) {
            doc.setFont(undefined, 'italic');
        } else {
            doc.setFont(undefined, 'normal');
        }
    }

    // Parse formatted segments
    function parseFormattedSegments(text) {
        const segments = [];
        const markers = [];

        // Find bold (**text**)
        let boldRegex = /\*\*(.+?)\*\*/g;
        let match;

        while ((match = boldRegex.exec(text)) !== null) {
            markers.push({
                start: match.index,
                end: match.index + match[0].length,
                text: match[1],
                type: 'bold'
            });
        }

        // Find italic (*text*)
        let italicRegex = /(?<!\*)\*([^*]+?)\*(?!\*)/g;

        while ((match = italicRegex.exec(text)) !== null) {
            const insideBold = markers.some(m =>
                match.index >= m.start && match.index < m.end
            );
            if (!insideBold) {
                markers.push({
                    start: match.index,
                    end: match.index + match[0].length,
                    text: match[1],
                    type: 'italic'
                });
            }
        }

        markers.sort((a, b) => a.start - b.start);

        let lastEnd = 0;

        for (let marker of markers) {
            if (marker.start > lastEnd) {
                const plain = text.substring(lastEnd, marker.start);
                if (plain) {
                    segments.push({
                        text: plain,
                        bold: false,
                        italic: false
                    });
                }
            }

            segments.push({
                text: marker.text,
                bold: marker.type === 'bold',
                italic: marker.type === 'italic'
            });

            lastEnd = marker.end;
        }

        if (lastEnd < text.length) {
            const plain = text.substring(lastEnd);
            if (plain) {
                segments.push({
                    text: plain,
                    bold: false,
                    italic: false
                });
            }
        }

        if (segments.length === 0 && text) {
            segments.push({
                text: text,
                bold: false,
                italic: false
            });
        }

        return segments;
    }

    // Render line segments - FIXED VERSION
    function renderLineSegments(doc, segments, x, y) {
        let currentX = x;

        for (let i = 0; i < segments.length; i++) {
            const seg = segments[i];

            // Add space before word (except first word)
            if (i > 0) {
                // Calculate space width with normal font for consistency
                doc.setFont(undefined, 'normal');
                currentX += doc.getTextWidth(' ');
            }

            // Set correct font for this segment
            setFont(doc, seg.bold, seg.italic);

            // Render the text
            doc.text(seg.text, currentX, y);

            // Move position forward by the width of the rendered text
            currentX += doc.getTextWidth(seg.text);
        }

        return y;
    }
    //Scroll to resultSection

    document.addEventListener("DOMContentLoaded", function() {
        const resultSection = document.getElementById('resultSection');
        if (resultSection) {
            resultSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });

    function openQrModal(fileUrl) {
        // Set input field value
        document.getElementById("fileUrlInput").value = fileUrl;

        // Clear old QR
        document.getElementById("qrcode").innerHTML = "";

        // Generate QR
        new QRCode(document.getElementById("qrcode"), {
            text: fileUrl,
            width: 180,
            height: 180
        });

        // Open modal
        var qrModal = new bootstrap.Modal(document.getElementById('qrModal'));
        qrModal.show();
    }
    //for tooltip
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });

    function copyUrl() {
        const urlInput = document.getElementById("fileUrlInput");
        urlInput.select();
        document.execCommand("copy");

        // Optional: Show feedback
        alert("URL copied to clipboard!");
    }



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