@extends('main')
@section('title', __('how-to-convert-word-to-pdf-blog.title'))
@section('description', __('how-to-convert-word-to-pdf-blog.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('how-to-convert-word-to-pdf-blog.main-heading')</h1>
                <img src="{{ asset('img/how-to-convert-word-to-pdf-blog.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="How to convert Word to PDF without changing the font or layout" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 78])

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.intro-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.intro-p1')</p>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.why-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.why-p1')</p>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.why-p2')</p>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.why-p3')</p>
                </section>

                <!-- Method 1 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.method1-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.method1-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-convert-word-to-pdf-blog.method1-step1')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method1-step2')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method1-step3')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method1-step4')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method1-step5')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.method1-note')</p>
                </section>

                <!-- Method 2 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.method2-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF converter</a>',
                            __('how-to-convert-word-to-pdf-blog.method2-intro')
                        ) !!}
                    </p>
                    <ol class="text-gray">
                        <li>@lang('how-to-convert-word-to-pdf-blog.method2-step1')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method2-step2')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method2-step3')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method2-step4')</li>
                    </ol>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__WORD_TO_PDF_GUIDE_LINK__', '__PDF_CONVERSION_GUIDE_LINK__'],
                            [
                                '<a href="' . localized_route('blog_post8') . '" class="text-gradient fw-semibold">Word to PDF conversion guide</a>',
                                '<a href="' . localized_route('blog') . '" class="text-gradient fw-semibold">complete PDF conversion guide</a>'
                            ],
                            __('how-to-convert-word-to-pdf-blog.method2-note')
                        ) !!}
                    </p>
                </section>

                <!-- Method 3 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.method3-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.method3-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-convert-word-to-pdf-blog.method3-step1')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method3-step2')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method3-step3')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method3-step4')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method3-step5')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.method3-note')</p>
                </section>

                <!-- Method 4 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.method4-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.method4-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-convert-word-to-pdf-blog.method4-step1')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method4-step2')</li>
                        <li>@lang('how-to-convert-word-to-pdf-blog.method4-step3')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.method4-note')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Checking output -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.checking-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.checking-p1')</p>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.checking-p2')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-word-to-pdf-blog.conclusion-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__WORD_TO_PDF_LINK__', '__COMPRESS_LINK__', '__PDF_TO_WORD_LINK__'],
                            [
                                '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF tool</a>',
                                '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">compress PDF tool</a>',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>'
                            ],
                            __('how-to-convert-word-to-pdf-blog.conclusion-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('how-to-convert-word-to-pdf-blog.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-word-to-pdf-blog.faq1-q')</h4>
                        <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-word-to-pdf-blog.faq2-q')</h4>
                        <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-word-to-pdf-blog.faq3-q')</h4>
                        <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-word-to-pdf-blog.faq4-q')</h4>
                        <p class="text-gray">@lang('how-to-convert-word-to-pdf-blog.faq4-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 78])
                @include('components.related-posts', ['postId' => 78])
            </article>
        </div>
    </div>
@endsection
