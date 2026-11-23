@extends('main')
@section('title', __('pdf-vs-word-vs-jpg-which-file-format-should-you-use.title'))
@section('description', __('pdf-vs-word-vs-jpg-which-file-format-should-you-use.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.main-heading')</h1>
                <img src="{{ asset('img/pdf-vs-word-vs-jpg-which-file-format-should-you-use.jpg') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="PDF vs Word vs JPG: which file format should you use" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 100])

                <section class="mb-5">
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.understanding-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.understanding-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.understanding-p2')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.understanding-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.word-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.word-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.word-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.pdf-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.pdf-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.pdf-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.jpg-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.jpg-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.jpg-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.converting-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.converting-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('pdf-vs-word-vs-jpg-which-file-format-should-you-use.converting-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF converter</a>',
                            __('pdf-vs-word-vs-jpg-which-file-format-should-you-use.converting-p3')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__PDF_TO_JPG_LINK__', '__JPG_TO_PDF_LINK__'],
                            [
                                '<a href="' . localized_route('pdf-to-jpg') . '" class="text-gradient fw-semibold">PDF to JPG converter</a>',
                                '<a href="' . localized_route('jpg-to-pdf') . '" class="text-gradient fw-semibold">JPG to PDF tool</a>'
                            ],
                            __('pdf-vs-word-vs-jpg-which-file-format-should-you-use.converting-p4')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.decision-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.decision-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.decision-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.mistakes-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.mistakes-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.mistakes-p2')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.mistakes-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.maintaining-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.maintaining-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.maintaining-p2')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq1-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq2-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq3-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq4-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq5-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-vs-jpg-which-file-format-should-you-use.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 100])
                @include('components.related-posts', ['postId' => 100])
            </article>
        </div>
    </div>
@endsection
