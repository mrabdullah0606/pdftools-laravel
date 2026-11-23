@extends('main')
@section('title', __('pitch-deck-to-pdf-for-investors.title'))
@section('description', __('pitch-deck-to-pdf-for-investors.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pitch-deck-to-pdf-for-investors.main-heading')</h1>
                <img src="{{ asset('img/pitch-deck-to-pdf-for-investors.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Convert your pitch deck to PDF for investors" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 101])

                <section class="mb-5">
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.intro-p1')</p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.why-heading')</h2>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.why-p1')</p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.why-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.steps-heading')</h2>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.steps-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PPT_TO_PDF_LINK__',
                            '<a href="' . localized_route('ppt-to-pdf') . '" class="text-gradient fw-semibold">PowerPoint to PDF converter</a>',
                            __('pitch-deck-to-pdf-for-investors.steps-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.checking-heading')</h2>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.checking-p1')</p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.checking-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.filesize-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('pitch-deck-to-pdf-for-investors.filesize-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.filesize-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.combine-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('pitch-deck-to-pdf-for-investors.combine-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.combine-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.images-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_JPG_LINK__',
                            '<a href="' . localized_route('pdf-to-jpg') . '" class="text-gradient fw-semibold">PDF to JPG converter</a>',
                            __('pitch-deck-to-pdf-for-investors.images-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.mistakes-heading')</h2>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.mistakes-p1')</p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.mistakes-p2')</p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.mistakes-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pitch-deck-to-pdf-for-investors.checklist-heading')</h2>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.checklist-p1')</p>
                    <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.checklist-p2')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('pitch-deck-to-pdf-for-investors.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pitch-deck-to-pdf-for-investors.faq1-q')</h4>
                        <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pitch-deck-to-pdf-for-investors.faq2-q')</h4>
                        <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pitch-deck-to-pdf-for-investors.faq3-q')</h4>
                        <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pitch-deck-to-pdf-for-investors.faq4-q')</h4>
                        <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pitch-deck-to-pdf-for-investors.faq5-q')</h4>
                        <p class="text-gray">@lang('pitch-deck-to-pdf-for-investors.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 101])
                @include('components.related-posts', ['postId' => 101])
            </article>
        </div>
    </div>
@endsection
