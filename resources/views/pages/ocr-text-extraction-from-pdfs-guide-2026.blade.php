@extends('main')
@section('title', __('ocr-text-extraction-from-pdfs-guide-2026.title'))
@section('description', __('ocr-text-extraction-from-pdfs-guide-2026.description'))

@push('head')
    <style>
        .text-gray {
            color: #666;
        }
    </style>
@endpush

@section('page')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-9 col-lg-8 mx-auto text-center">
                <h1 class="text-center fw-bold display-5 mb-3">@lang('ocr-text-extraction-from-pdfs-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/ocr-text-extraction-from-pdfs-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="OCR technology: from scans to searchable text" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 84])

                <section class="mb-5">
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.intro-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.how-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.how-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.how-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.how-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.how-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.value-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.value-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.value-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.value-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.value-p4')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.value-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.factors-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.factors-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.factors-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.factors-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.factors-p4')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.factors-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.improving-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.improving-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.improving-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.improving-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.improving-p4')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.improving-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.workflows-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.workflows-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.workflows-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.workflows-p3')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__MERGE_LINK__', '__CONVERT_LINK__'],
                            [
                                '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">Merge</a>',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">converting</a>'
                            ],
                            __('ocr-text-extraction-from-pdfs-guide-2026.workflows-p4')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.accuracy-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.accuracy-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.accuracy-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.accuracy-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.accuracy-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.difficult-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.difficult-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.difficult-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.difficult-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.difficult-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.postocr-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.postocr-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.postocr-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.postocr-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.postocr-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.optimization-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.optimization-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.optimization-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.optimization-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.optimization-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.trends-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.trends-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.trends-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.trends-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.trends-p4')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('ocr-text-extraction-from-pdfs-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.conclusion-p2')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.conclusion-p3')</p>
                    <p class="text-gray">@lang('ocr-text-extraction-from-pdfs-guide-2026.conclusion-p4')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 84])
                @include('components.related-posts', ['postId' => 84])
            </article>
        </div>
    </div>
@endsection
