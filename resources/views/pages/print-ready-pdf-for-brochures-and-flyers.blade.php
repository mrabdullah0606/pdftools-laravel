@extends('main')
@section('title', __('print-ready-pdf-for-brochures-and-flyers.title'))
@section('description', __('print-ready-pdf-for-brochures-and-flyers.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('print-ready-pdf-for-brochures-and-flyers.main-heading')</h1>
                <img src="{{ asset('img/print-ready-pdf-for-brochures-and-flyers.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Print-ready PDF for brochures and flyers step by step" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 103])

                <section class="mb-5">
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.intro-p1')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.what-heading')</h2>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.what-p1')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.what-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.setup-heading')</h2>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.setup-p1')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.setup-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.resolution-heading')</h2>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.resolution-p1')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.resolution-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.color-heading')</h2>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.color-p1')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.color-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.export-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF converter</a>',
                            __('print-ready-pdf-for-brochures-and-flyers.export-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.export-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.checking-heading')</h2>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.checking-p1')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.checking-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.reducing-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('print-ready-pdf-for-brochures-and-flyers.reducing-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.reducing-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.images-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_JPG_LINK__',
                            '<a href="' . localized_route('pdf-to-jpg') . '" class="text-gradient fw-semibold">PDF to JPG converter</a>',
                            __('print-ready-pdf-for-brochures-and-flyers.images-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.combine-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('print-ready-pdf-for-brochures-and-flyers.combine-p1')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.problems-heading')</h2>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.problems-p1')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.problems-p2')</p>
                    <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.problems-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('print-ready-pdf-for-brochures-and-flyers.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('print-ready-pdf-for-brochures-and-flyers.faq1-q')</h4>
                        <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('print-ready-pdf-for-brochures-and-flyers.faq2-q')</h4>
                        <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('print-ready-pdf-for-brochures-and-flyers.faq3-q')</h4>
                        <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('print-ready-pdf-for-brochures-and-flyers.faq4-q')</h4>
                        <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('print-ready-pdf-for-brochures-and-flyers.faq5-q')</h4>
                        <p class="text-gray">@lang('print-ready-pdf-for-brochures-and-flyers.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 103])
                @include('components.related-posts', ['postId' => 103])
            </article>
        </div>
    </div>
@endsection
