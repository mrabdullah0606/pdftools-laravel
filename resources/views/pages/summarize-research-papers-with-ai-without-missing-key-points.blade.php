@extends('main')
@section('title', __('summarize-research-papers-with-ai-without-missing-key-points.title'))
@section('description', __('summarize-research-papers-with-ai-without-missing-key-points.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('summarize-research-papers-with-ai-without-missing-key-points.main-heading')</h1>
                <img src="{{ asset('img/summarize-research-papers-with-ai-without-missing-key-points.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Summarize research papers with AI without missing key points" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 97])

                <section class="mb-5">
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.intro-p1')</p>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.how-heading')</h2>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.how-p1')</p>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.how-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.steps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__SUMMARIZE_LINK__',
                            '<a href="' . localized_route('pdf.summerize') . '" class="text-gradient fw-semibold">PDF summarizer</a>',
                            __('summarize-research-papers-with-ai-without-missing-key-points.steps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.steps-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.verifying-heading')</h2>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.verifying-p1')</p>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.verifying-p2')</p>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.verifying-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.reviews-heading')</h2>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.reviews-p1')</p>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.reviews-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.complex-heading')</h2>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.complex-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PAGES_TO_PDF_LINK__',
                            '<a href="' . localized_route('pages-to-pdf') . '" class="text-gradient fw-semibold">pages to PDF tool</a>',
                            __('summarize-research-papers-with-ai-without-missing-key-points.complex-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('summarize-research-papers-with-ai-without-missing-key-points.complex-p3')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.combining-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('summarize-research-papers-with-ai-without-missing-key-points.combining-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.when-heading')</h2>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.when-p1')</p>
                    <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.when-p2')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq1-q')</h4>
                        <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq2-q')</h4>
                        <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq3-q')</h4>
                        <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq4-q')</h4>
                        <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq5-q')</h4>
                        <p class="text-gray">@lang('summarize-research-papers-with-ai-without-missing-key-points.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 97])
                @include('components.related-posts', ['postId' => 97])
            </article>
        </div>
    </div>
@endsection
