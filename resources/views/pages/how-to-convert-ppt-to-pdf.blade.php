@extends('main')
@section('title', __('how-to-convert-ppt-to-pdf.title'))
@section('description', __('how-to-convert-ppt-to-pdf.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('how-to-convert-ppt-to-pdf.main-heading')</h1>
                <img src="{{ asset('img/how-to-convert-ppt-to-pdf.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="How to convert PowerPoint to PDF" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 75])

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.intro-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.intro-p1')</p>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Method 1 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.method1-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PPT_TO_PDF_LINK__',
                            '<a href="' . localized_route('ppt-to-pdf') . '" class="text-gradient fw-semibold">PowerPoint to PDF tool</a>',
                            __('how-to-convert-ppt-to-pdf.method1-intro')
                        ) !!}
                    </p>
                    <ol class="text-gray">
                        <li>@lang('how-to-convert-ppt-to-pdf.method1-step1')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method1-step2')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method1-step3')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method1-step4')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.method1-note')</p>
                </section>

                <!-- Method 2 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.method2-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.method2-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-convert-ppt-to-pdf.method2-step1')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method2-step2')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method2-step3')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method2-step4')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method2-step5')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method2-step6')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method2-step7')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.method2-note')</p>
                </section>

                <!-- Method 3 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.method3-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.method3-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-convert-ppt-to-pdf.method3-step1')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method3-step2')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method3-step3')</li>
                        <li>@lang('how-to-convert-ppt-to-pdf.method3-step4')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.method3-note')</p>
                </section>

                <!-- Method 4 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.method4-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.method4-intro')</p>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.method4-p1')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Animations -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.animations-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.animations-p1')</p>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.animations-p2')</p>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.animations-p3')</p>
                </section>

                <!-- Reducing size -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.sizereduce-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">compress PDF tool</a>',
                            __('how-to-convert-ppt-to-pdf.sizereduce-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-convert-ppt-to-pdf.conclusion-heading')</h2>
                    <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__COMPRESS_LINK__', '__MERGE_LINK__'],
                            [
                                '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compressor</a>',
                                '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>'
                            ],
                            __('how-to-convert-ppt-to-pdf.conclusion-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('how-to-convert-ppt-to-pdf.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-ppt-to-pdf.faq1-q')</h4>
                        <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-ppt-to-pdf.faq2-q')</h4>
                        <p class="text-gray">
                            {!! str_replace(
                                '__PDF_TO_WORD_LINK__',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                                __('how-to-convert-ppt-to-pdf.faq2-a')
                            ) !!}
                        </p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-ppt-to-pdf.faq3-q')</h4>
                        <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-convert-ppt-to-pdf.faq4-q')</h4>
                        <p class="text-gray">@lang('how-to-convert-ppt-to-pdf.faq4-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 75])
                @include('components.related-posts', ['postId' => 75])
            </article>
        </div>
    </div>
@endsection
