@extends('main')
@section('title', __('convert-pdf-pages-to-jpg-for-social-media-and-websites.title'))
@section('description', __('convert-pdf-pages-to-jpg-for-social-media-and-websites.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.main-heading')</h1>
                <img src="{{ asset('img/convert-pdf-pages-to-jpg-for-social-media-and-websites.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Convert PDF pages to JPG for social media and websites" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 96])

                <section class="mb-5">
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.intro-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.when-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.when-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.when-p2')</p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.when-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.steps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_JPG_LINK__',
                            '<a href="' . localized_route('pdf-to-jpg') . '" class="text-gradient fw-semibold">PDF to JPG converter</a>',
                            __('convert-pdf-pages-to-jpg-for-social-media-and-websites.steps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.steps-p2')</p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.steps-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.dimensions-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.dimensions-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.dimensions-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.avoiding-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.avoiding-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.avoiding-p2')</p>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.avoiding-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.carousel-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.carousel-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__JPG_TO_PDF_LINK__',
                            '<a href="' . localized_route('jpg-to-pdf') . '" class="text-gradient fw-semibold">JPG to PDF tool</a>',
                            __('convert-pdf-pages-to-jpg-for-social-media-and-websites.carousel-p2')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.filesize-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.filesize-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('convert-pdf-pages-to-jpg-for-social-media-and-websites.filesize-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.pagesneeded-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PAGES_TO_PDF_LINK__',
                            '<a href="' . localized_route('pages-to-pdf') . '" class="text-gradient fw-semibold">pages to PDF tool</a>',
                            __('convert-pdf-pages-to-jpg-for-social-media-and-websites.pagesneeded-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq1-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq2-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq3-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq4-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq5-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-pages-to-jpg-for-social-media-and-websites.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 96])
                @include('components.related-posts', ['postId' => 96])
            </article>
        </div>
    </div>
@endsection
