@extends('main')
@section('title', __('convert-apple-pages-documents-to-pdf-for-easy-sharing.title'))
@section('description', __('convert-apple-pages-documents-to-pdf-for-easy-sharing.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.main-heading')</h1>
                <img src="{{ asset('img/convert-apple-pages-documents-to-pdf-for-easy-sharing.jpg') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Convert Apple Pages documents to PDF for easy sharing" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 98])

                <section class="mb-5">
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.intro-p1')</p>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.why-heading')</h2>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.why-p1')</p>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.why-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.steps-heading')</h2>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.steps-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PAGES_TO_PDF_LINK__',
                            '<a href="' . localized_route('pages-to-pdf') . '" class="text-gradient fw-semibold">Pages to PDF converter</a>',
                            __('convert-apple-pages-documents-to-pdf-for-easy-sharing.steps-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.steps-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.checking-heading')</h2>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.checking-p1')</p>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.checking-p2')</p>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.checking-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.combining-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('convert-apple-pages-documents-to-pdf-for-easy-sharing.combining-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.combining-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.word-heading')</h2>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.word-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF converter</a>',
                            __('convert-apple-pages-documents-to-pdf-for-easy-sharing.word-p2')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.printing-heading')</h2>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.printing-p1')</p>
                    <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.printing-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.filesize-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('convert-apple-pages-documents-to-pdf-for-easy-sharing.filesize-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq1-q')</h4>
                        <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq2-q')</h4>
                        <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq3-q')</h4>
                        <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq4-q')</h4>
                        <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq5-q')</h4>
                        <p class="text-gray">@lang('convert-apple-pages-documents-to-pdf-for-easy-sharing.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 98])
                @include('components.related-posts', ['postId' => 98])
            </article>
        </div>
    </div>
@endsection
