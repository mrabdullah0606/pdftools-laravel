@extends('main')
@section('title', __('pdf-vs-word-when-to-use-each-format.title'))
@section('description', __('pdf-vs-word-when-to-use-each-format.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-vs-word-when-to-use-each-format.main-heading')</h1>
                <img src="{{ asset('img/pdf-vs-word-when-to-use-each-format.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="PDF vs Word format comparison" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 76])

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.intro-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.pdf-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.pdf-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.pdf-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.word-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.word-p1')</p>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.word-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- When PDF -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.whenpdf-heading')</h2>

                    <h3 class="fw-bold text-dark h5 mt-4">@lang('pdf-vs-word-when-to-use-each-format.whenpdf-sub1-heading')</h3>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.whenpdf-sub1-p')</p>

                    <h3 class="fw-bold text-dark h5 mt-4">@lang('pdf-vs-word-when-to-use-each-format.whenpdf-sub2-heading')</h3>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.whenpdf-sub2-p')</p>

                    <h3 class="fw-bold text-dark h5 mt-4">@lang('pdf-vs-word-when-to-use-each-format.whenpdf-sub3-heading')</h3>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.whenpdf-sub3-p')</p>
                </section>

                <!-- When Word -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.whenword-heading')</h2>

                    <h3 class="fw-bold text-dark h5 mt-4">@lang('pdf-vs-word-when-to-use-each-format.whenword-sub1-heading')</h3>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.whenword-sub1-p')</p>

                    <h3 class="fw-bold text-dark h5 mt-4">@lang('pdf-vs-word-when-to-use-each-format.whenword-sub2-heading')</h3>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.whenword-sub2-p')</p>

                    <h3 class="fw-bold text-dark h5 mt-4">@lang('pdf-vs-word-when-to-use-each-format.whenword-sub3-heading')</h3>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.whenword-sub3-p')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Converting -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.converting-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('pdf-vs-word-when-to-use-each-format.converting-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF tool</a>',
                            __('pdf-vs-word-when-to-use-each-format.converting-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__WORD_TO_PDF_GUIDE_LINK__', '__PDF_CONVERSION_GUIDE_LINK__'],
                            [
                                '<a href="' . localized_route('blog_post8') . '" class="text-gradient fw-semibold">Word to PDF guide</a>',
                                '<a href="' . localized_route('blog') . '" class="text-gradient fw-semibold">complete PDF conversion guide</a>'
                            ],
                            __('pdf-vs-word-when-to-use-each-format.converting-p3')
                        ) !!}
                    </p>
                    <p class="text-gray fw-semibold">@lang('pdf-vs-word-when-to-use-each-format.converting-rule')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.conclusion-heading')</h2>
                    <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__PDF_TO_WORD_LINK__', '__WORD_TO_PDF_LINK__', '__BEST_TOOLS_LINK__'],
                            [
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word tool</a>',
                                '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF tool</a>',
                                '<a href="' . localized_route('blog_post34') . '" class="text-gradient fw-semibold">best free online PDF tools comparison</a>'
                            ],
                            __('pdf-vs-word-when-to-use-each-format.conclusion-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('pdf-vs-word-when-to-use-each-format.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-when-to-use-each-format.faq1-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-when-to-use-each-format.faq2-q')</h4>
                        <p class="text-gray">
                            {!! str_replace(
                                '__PDF_TO_WORD_LINK__',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                                __('pdf-vs-word-when-to-use-each-format.faq2-a')
                            ) !!}
                        </p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-when-to-use-each-format.faq3-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-vs-word-when-to-use-each-format.faq4-q')</h4>
                        <p class="text-gray">@lang('pdf-vs-word-when-to-use-each-format.faq4-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 76])
                @include('components.related-posts', ['postId' => 76])
            </article>
        </div>
    </div>
@endsection
