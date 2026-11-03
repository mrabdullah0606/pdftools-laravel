@extends('main')
@section('title', __('optimizing-pdfs-for-web-guide-2026.title'))
@section('description', __('optimizing-pdfs-for-web-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('optimizing-pdfs-for-web-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/optimizing-pdfs-for-web-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Optimizing PDFs for the web" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 85])

                <section class="mb-5">
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.intro-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.why-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.why-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.why-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.why-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.why-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.reducing-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression</a>',
                            __('optimizing-pdfs-for-web-guide-2026.reducing-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.reducing-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.reducing-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.reducing-p4')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.reducing-p5')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.reducing-p6')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.mobile-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mobile-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mobile-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mobile-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mobile-p4')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mobile-p5')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mobile-p6')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-p4')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-p5')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-p6')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.accessibility-p7')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__OCR_LINK__',
                            '<a href="' . localized_route('blog_post84') . '" class="text-gradient fw-semibold">OCR</a>',
                            __('optimizing-pdfs-for-web-guide-2026.accessibility-p8')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.hosting-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.hosting-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.hosting-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.hosting-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.hosting-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.seo-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.seo-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.seo-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.seo-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.seo-p4')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.seo-p5')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.seo-p6')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.measuring-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.measuring-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.measuring-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.measuring-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.measuring-p4')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.measuring-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.mistakes-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mistakes-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mistakes-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mistakes-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mistakes-p4')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.mistakes-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.alternatives-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.alternatives-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__WORD_LINK__', '__IMAGES_LINK__'],
                            [
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">converting to Word format</a>',
                                '<a href="' . localized_route('jpg-to-pdf') . '" class="text-gradient fw-semibold">converting images to PDF</a>'
                            ],
                            __('optimizing-pdfs-for-web-guide-2026.alternatives-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.alternatives-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.alternatives-p4')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('optimizing-pdfs-for-web-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.conclusion-p2')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.conclusion-p3')</p>
                    <p class="text-gray">@lang('optimizing-pdfs-for-web-guide-2026.conclusion-p4')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 85])
                @include('components.related-posts', ['postId' => 85])
            </article>
        </div>
    </div>
@endsection
