@extends('main')
@section('title', __('pdf-accessibility-inclusive-documents-guide-2026.title'))
@section('description', __('pdf-accessibility-inclusive-documents-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-accessibility-inclusive-documents-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/pdf-accessibility-inclusive-documents-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Creating accessible PDFs for inclusive documents" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 90])

                <section class="mb-5">
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.intro-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.why-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.why-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.why-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.why-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.why-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-p5')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-p6')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.barriers-p7')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.word-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.word-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.word-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.word-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.word-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.word-p5')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.word-p6')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.improving-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.improving-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.improving-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.improving-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.improving-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.improving-p5')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.improving-p6')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.ocr-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__OCR_LINK__',
                            '<a href="' . localized_route('blog_post84') . '" class="text-gradient fw-semibold">OCR</a>',
                            __('pdf-accessibility-inclusive-documents-guide-2026.ocr-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.ocr-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.ocr-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.ocr-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.ocr-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.fonts-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.fonts-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.fonts-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.fonts-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.fonts-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.fonts-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.forms-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.forms-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.forms-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.forms-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.forms-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.forms-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.testing-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.testing-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.testing-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.testing-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.testing-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.compliance-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.compliance-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.compliance-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.compliance-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.compliance-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.compliance-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.types-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.types-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.types-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.types-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.types-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.benefits-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.benefits-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.benefits-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.benefits-p3')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merging</a>',
                            __('pdf-accessibility-inclusive-documents-guide-2026.benefits-p4')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.mistakes-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.mistakes-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.mistakes-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.mistakes-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.mistakes-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.mistakes-p5')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-accessibility-inclusive-documents-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.conclusion-p2')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.conclusion-p3')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.conclusion-p4')</p>
                    <p class="text-gray">@lang('pdf-accessibility-inclusive-documents-guide-2026.conclusion-p5')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 90])
                @include('components.related-posts', ['postId' => 90])
            </article>
        </div>
    </div>
@endsection
