@php
    $currentLocale = app()->getLocale();
    $isLocalized    = ($currentLocale !== 'en');
    $pageRoute      = $isLocalized ? route('localized.pdf-to-word', ['locale' => $currentLocale])  : route('pdf-to-word');
@endphp

        <div class="result-header">
            <h4><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                    class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                </svg> {{__('pdf-to-word.result')}}</h4>
            <div class="d-flex gap-2">
                @php
                    $firstFileUrl = $api_response['data'][0]['file_url'] ?? ($api_response['download_urls'][0] ?? '');
                    $downloadRouteName = $isLocalized ? 'localized.pdf.word.download' : 'pdf.word.download';
                    $downloadParams    = $isLocalized
                        ? ['locale' => $currentLocale, 'download_url' => $firstFileUrl]
                        : ['download_url' => $firstFileUrl];
                @endphp
                <a href="{{ route($downloadRouteName, $downloadParams) }}" class="btn btn-sm btn-outline-primary"
                    target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cloud-download-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708z" />
                    </svg> {{__('pdf-to-word.download')}}
                </a>
                <a href="{{ $pageRoute }}" class="btn btn-sm btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                    </svg> {{__('pdf-to-word.Convert-an')}}
                </a>
            </div>
        </div>

        <div class="result-content mt-3">
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>{{ $api_response['detail'] ?? __('pdf-to-word.msg') }}
            </div>

            @foreach ($api_response['data'] as $index => $file)
            <div class="row align-items-center mt-3">
                <!-- Original File -->
                <div class="col-5">
                    <h6 class="mb-1">{{__('pdf-to-word.msg')}}</h6>
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
                    <h6 class="mb-1">{{__('pdf-to-word.Converted')}}</h6>
                    @php
                        $fileDownloadParams = $isLocalized
                            ? ['locale' => $currentLocale, 'download_url' => $file['file_url']]
                            : ['download_url' => $file['file_url']];
                    @endphp
                    <a href="{{ route($downloadRouteName, $fileDownloadParams) }}" class="btn btn-sm btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12"
                            fill="#795ef1" class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                        </svg> {{__('pdf-to-word.dn')}}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
