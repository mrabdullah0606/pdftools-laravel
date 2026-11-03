@extends('main')
@section('title', __('how-to-merge-pdf-files-complete-guide-2026.title'))
@section('description', __('how-to-merge-pdf-files-complete-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('how-to-merge-pdf-files-complete-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/how-to-merge-pdf-files-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="How to merge PDF files" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 71])

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.intro-heading')</h2>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.what-heading')</h2>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.what-p1')</p>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.what-p2')</p>
                </section>

                <!-- Method 1 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.method1-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('how-to-merge-pdf-files-complete-guide-2026.method1-intro')
                        ) !!}
                    </p>
                    <ol class="text-gray">
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method1-step1')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method1-step2')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method1-step3')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method1-step4')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method1-step5')</li>
                    </ol>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_GUIDE_LINK__',
                            '<a href="' . localized_route('blog_post6') . '" class="text-gradient fw-semibold">how to compress a PDF to reduce the combined file size before sharing</a>',
                            __('how-to-merge-pdf-files-complete-guide-2026.method1-note')
                        ) !!}
                    </p>
                </section>

                <!-- Method 2 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.method2-heading')</h2>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.method2-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method2-step1')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method2-step2')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method2-step3')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method2-step4')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method2-step5')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method2-step6')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.method2-note')</p>
                </section>

                <!-- Method 3 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.method3-heading')</h2>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.method3-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method3-step1')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method3-step2')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method3-step3')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method3-step4')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method3-step5')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method3-step6')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method3-step7')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.method3-tip')</p>
                </section>

                <!-- Method 4 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.method4-heading')</h2>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.method4-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method4-step1')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method4-step2')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method4-step3')</li>
                        <li>@lang('how-to-merge-pdf-files-complete-guide-2026.method4-step4')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.method4-note')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Page order -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.order-heading')</h2>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.order-p1')</p>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.order-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__SPLIT_LINK__', '__MERGE_LINK__'],
                            [
                                '<a href="' . localized_route('blog_post64') . '" class="text-gradient fw-semibold">split PDF tool</a>',
                                '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge tool</a>'
                            ],
                            __('how-to-merge-pdf-files-complete-guide-2026.order-p3')
                        ) !!}
                    </p>
                </section>

                <!-- File size -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.size-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('how-to-merge-pdf-files-complete-guide-2026.size-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_QUALITY_GUIDE_LINK__',
                            '<a href="' . localized_route('blog_post9') . '" class="text-gradient fw-semibold">how to compress PDFs without quality loss</a>',
                            __('how-to-merge-pdf-files-complete-guide-2026.size-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__COMPRESS_LINK__', '__WORD_LINK__'],
                            [
                                '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compress tool</a>',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>'
                            ],
                            __('how-to-merge-pdf-files-complete-guide-2026.conclusion-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('how-to-merge-pdf-files-complete-guide-2026.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-merge-pdf-files-complete-guide-2026.faq1-q')</h4>
                        <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-merge-pdf-files-complete-guide-2026.faq2-q')</h4>
                        <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-merge-pdf-files-complete-guide-2026.faq3-q')</h4>
                        <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-merge-pdf-files-complete-guide-2026.faq4-q')</h4>
                        <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-merge-pdf-files-complete-guide-2026.faq5-q')</h4>
                        <p class="text-gray">@lang('how-to-merge-pdf-files-complete-guide-2026.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 71])
                @include('components.related-posts', ['postId' => 71])
            </article>
        </div>
    </div>
@endsection
