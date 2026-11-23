@extends('main')
@section('title', __('convert-pdf-to-word-to-edit-documents-safely.title'))
@section('description', __('convert-pdf-to-word-to-edit-documents-safely.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('convert-pdf-to-word-to-edit-documents-safely.main-heading')</h1>
                <img src="{{ asset('img/convert-pdf-to-word-to-edit-documents-safely.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Convert PDF to Word to edit documents safely" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 94])

                <section class="mb-5">
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.intro-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.understanding-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.understanding-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.understanding-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.steps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('convert-pdf-to-word-to-edit-documents-safely.steps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.steps-p2')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.steps-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.layout-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.layout-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.layout-p2')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.layout-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.scanned-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.scanned-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.scanned-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.reexport-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF converter</a>',
                            __('convert-pdf-to-word-to-edit-documents-safely.reexport-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('convert-pdf-to-word-to-edit-documents-safely.reexport-p2')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.reviewing-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__SUMMARIZE_LINK__',
                            '<a href="' . localized_route('pdf.summerize') . '" class="text-gradient fw-semibold">AI PDF summarizer</a>',
                            __('convert-pdf-to-word-to-edit-documents-safely.reviewing-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.legal-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.legal-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.legal-p2')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('convert-pdf-to-word-to-edit-documents-safely.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-to-edit-documents-safely.faq1-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-to-edit-documents-safely.faq2-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-to-edit-documents-safely.faq3-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-to-edit-documents-safely.faq4-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-to-edit-documents-safely.faq5-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-to-edit-documents-safely.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 94])
                @include('components.related-posts', ['postId' => 94])
            </article>
        </div>
    </div>
@endsection
