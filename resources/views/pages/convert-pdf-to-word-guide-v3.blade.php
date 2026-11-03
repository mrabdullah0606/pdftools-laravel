@extends('main')
@section('title', __('convert-pdf-to-word-guide-v3.title'))
@section('description', __('convert-pdf-to-word-guide-v3.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('convert-pdf-to-word-guide-v3.main-heading')</h1>
                <img src="{{ asset('img/convert-pdf-to-word-guide-v3.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="How to convert PDF to Word without losing formatting" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 80])

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.intro-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.intro-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.what-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.what-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.what-p2')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.what-p3')</p>
                </section>

                <!-- Method 1 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.method1-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('convert-pdf-to-word-guide-v3.method1-intro')
                        ) !!}
                    </p>
                    <ol class="text-gray">
                        <li>@lang('convert-pdf-to-word-guide-v3.method1-step1')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method1-step2')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method1-step3')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method1-step4')</li>
                    </ol>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_CONVERSION_GUIDE_LINK__',
                            '<a href="' . localized_route('blog') . '" class="text-gradient fw-semibold">complete PDF conversion guide</a>',
                            __('convert-pdf-to-word-guide-v3.method1-note')
                        ) !!}
                    </p>
                </section>

                <!-- Method 2 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.method2-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.method2-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('convert-pdf-to-word-guide-v3.method2-step1')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method2-step2')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method2-step3')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method2-step4')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method2-step5')</li>
                    </ol>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.method2-note')</p>
                </section>

                <!-- Method 3 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.method3-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.method3-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('convert-pdf-to-word-guide-v3.method3-step1')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method3-step2')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method3-step3')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method3-step4')</li>
                    </ol>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.method3-note')</p>
                </section>

                <!-- Method 4 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.method4-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.method4-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('convert-pdf-to-word-guide-v3.method4-step1')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method4-step2')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method4-step3')</li>
                        <li>@lang('convert-pdf-to-word-guide-v3.method4-step4')</li>
                    </ol>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.method4-note')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Improving results -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.improving-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.improving-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.improving-p2')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.improving-p3')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.improving-p4')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__WORD_TO_PDF_LINK__', '__WORD_TO_PDF_GUIDE_LINK__'],
                            [
                                '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF tool</a>',
                                '<a href="' . localized_route('blog_post78') . '" class="text-gradient fw-semibold">blog guide on converting Word to PDF without changing fonts</a>'
                            ],
                            __('convert-pdf-to-word-guide-v3.improving-p5')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-pdf-to-word-guide-v3.conclusion-heading')</h2>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.conclusion-p1')</p>
                    <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.conclusion-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__PDF_TO_WORD_LINK__', '__PDF_CONVERSION_GUIDE_LINK__', '__WORD_TO_PDF_LINK__'],
                            [
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                                '<a href="' . localized_route('blog') . '" class="text-gradient fw-semibold">complete PDF conversion guide</a>',
                                '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF tool</a>'
                            ],
                            __('convert-pdf-to-word-guide-v3.conclusion-p3')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('convert-pdf-to-word-guide-v3.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-guide-v3.faq1-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-guide-v3.faq2-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-guide-v3.faq3-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-guide-v3.faq4-q')</h4>
                        <p class="text-gray">@lang('convert-pdf-to-word-guide-v3.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-pdf-to-word-guide-v3.faq5-q')</h4>
                        <p class="text-gray">
                            {!! str_replace(
                                '__WORKFLOW_TIPS_LINK__',
                                '<a href="' . localized_route('blog_post70') . '" class="text-gradient fw-semibold">guidance on PDF workflow tools and productivity tips</a>',
                                __('convert-pdf-to-word-guide-v3.faq5-a')
                            ) !!}
                        </p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 80])
                @include('components.related-posts', ['postId' => 80])
            </article>
        </div>
    </div>
@endsection
