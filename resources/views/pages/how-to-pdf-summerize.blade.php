@extends('main')
@section('title', __('how-to-pdf-summerize.title'))
@section('description', __('how-to-pdf-summerize.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('how-to-pdf-summerize.main-heading')</h1>
                <img src="{{ asset('img/how-to-pdf-summerize.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="How to summarize a PDF using AI" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 74])

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.intro-heading')</h2>
                    <p class="text-gray">@lang('how-to-pdf-summerize.intro-p1')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.how-heading')</h2>
                    <p class="text-gray">@lang('how-to-pdf-summerize.how-p1')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.how-p2')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.how-p3')</p>
                </section>

                <!-- Method 1 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.method1-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__SUMMARIZE_LINK__',
                            '<a href="' . localized_route('pdf.summerize') . '" class="text-gradient fw-semibold">PDF summarizer</a>',
                            __('how-to-pdf-summerize.method1-intro')
                        ) !!}
                    </p>
                    <ol class="text-gray">
                        <li>@lang('how-to-pdf-summerize.method1-step1')</li>
                        <li>@lang('how-to-pdf-summerize.method1-step2')</li>
                        <li>@lang('how-to-pdf-summerize.method1-step3')</li>
                        <li>@lang('how-to-pdf-summerize.method1-step4')</li>
                        <li>@lang('how-to-pdf-summerize.method1-step5')</li>
                    </ol>
                    <p class="text-gray">
                        {!! str_replace(
                            '__BEST_AI_TOOLS_LINK__',
                            '<a href="' . localized_route('blog_post4') . '" class="text-gradient fw-semibold">best AI tools to summarize PDFs in 2026</a>',
                            __('how-to-pdf-summerize.method1-note')
                        ) !!}
                    </p>
                </section>

                <!-- Method 2 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.method2-heading')</h2>
                    <p class="text-gray">@lang('how-to-pdf-summerize.method2-p1')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.method2-p2')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.method2-p3')</p>
                </section>

                <!-- Method 3 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.method3-heading')</h2>
                    <p class="text-gray">@lang('how-to-pdf-summerize.method3-p1')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.method3-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Tips -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.tips-heading')</h2>
                    <p class="text-gray">@lang('how-to-pdf-summerize.tips-p1')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.tips-p2')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.tips-p3')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__AI_SUMMARY_GUIDE_LINK__',
                            '<a href="' . localized_route('blog_post40') . '" class="text-gradient fw-semibold">how to summarize PDF documents using AI in 2026</a>',
                            __('how-to-pdf-summerize.tips-p4')
                        ) !!}
                    </p>
                </section>

                <!-- Not the right tool -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.notright-heading')</h2>
                    <p class="text-gray">@lang('how-to-pdf-summerize.notright-p1')</p>
                    <p class="text-gray">@lang('how-to-pdf-summerize.notright-p2')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-pdf-summerize.conclusion-heading')</h2>
                    <p class="text-gray">@lang('how-to-pdf-summerize.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__SUMMARIZE_LINK__', '__BEST_AI_TOOLS_LINK__'],
                            [
                                '<a href="' . localized_route('pdf.summerize') . '" class="text-gradient fw-semibold">PDF summarizer</a>',
                                '<a href="' . localized_route('blog_post4') . '" class="text-gradient fw-semibold">best AI tools to summarize PDFs</a>'
                            ],
                            __('how-to-pdf-summerize.conclusion-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('how-to-pdf-summerize.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-pdf-summerize.faq1-q')</h4>
                        <p class="text-gray">@lang('how-to-pdf-summerize.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-pdf-summerize.faq2-q')</h4>
                        <p class="text-gray">@lang('how-to-pdf-summerize.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-pdf-summerize.faq3-q')</h4>
                        <p class="text-gray">
                            {!! str_replace(
                                '__SAFETY_GUIDE_LINK__',
                                '<a href="' . localized_route('blog_post24') . '" class="text-gradient fw-semibold">whether free online PDF tools are safe</a>',
                                __('how-to-pdf-summerize.faq3-a')
                            ) !!}
                        </p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-pdf-summerize.faq4-q')</h4>
                        <p class="text-gray">@lang('how-to-pdf-summerize.faq4-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 74])
                @include('components.related-posts', ['postId' => 74])
            </article>
        </div>
    </div>
@endsection
