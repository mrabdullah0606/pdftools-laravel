@extends('main')
@section('title', __('batch-pdf-processing-for-teams-guide-2026.title'))
@section('description', __('batch-pdf-processing-for-teams-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('batch-pdf-processing-for-teams-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/batch-pdf-processing-for-teams-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Batch PDF processing for teams" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 82])

                <section class="mb-5">
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.intro-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.understanding-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.understanding-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.understanding-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.understanding-p3')</p>
                </section>

                <!-- Compression -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.compression-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.compression-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.compression-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">batch PDF compression tools</a>',
                            __('batch-pdf-processing-for-teams-guide-2026.compression-p3')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.compression-p4')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.compression-p5')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.compression-p6')</p>
                </section>

                <!-- Conversion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.conversion-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__PDF_TO_WORD_LINK__', '__PDF_TO_JPG_LINK__'],
                            [
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word</a>',
                                '<a href="' . localized_route('pdf-to-jpg') . '" class="text-gradient fw-semibold">PDF to JPG</a>'
                            ],
                            __('batch-pdf-processing-for-teams-guide-2026.conversion-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conversion-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conversion-p3')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conversion-p4')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conversion-p5')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conversion-p6')</p>
                </section>

                <!-- Security -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.security-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.security-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.security-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__SECURITY_GUIDE_LINK__',
                            '<a href="' . localized_route('blog_post81') . '" class="text-gradient fw-semibold">complete guide to PDF security and password protection</a>',
                            __('batch-pdf-processing-for-teams-guide-2026.security-p3')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.security-p4')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.security-p5')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.security-p6')</p>
                </section>

                <!-- Merge/Split -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.mergesplit-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.mergesplit-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">batch merging</a>',
                            __('batch-pdf-processing-for-teams-guide-2026.mergesplit-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__SPLIT_GUIDE_LINK__',
                            '<a href="' . localized_route('blog_post64') . '" class="text-gradient fw-semibold">PDF splitting guide</a>',
                            __('batch-pdf-processing-for-teams-guide-2026.mergesplit-p3')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.mergesplit-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Automation -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.automation-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.automation-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.automation-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.automation-p3')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.automation-p4')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.automation-p5')</p>
                </section>

                <!-- Best practices -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.bestpractices-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.bestpractices-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.bestpractices-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.bestpractices-p3')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.bestpractices-p4')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.bestpractices-p5')</p>
                </section>

                <!-- Mistakes -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.mistakes-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.mistakes-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.mistakes-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.mistakes-p3')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.mistakes-p4')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.mistakes-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- ROI -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.roi-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.roi-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.roi-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.roi-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('batch-pdf-processing-for-teams-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conclusion-p2')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conclusion-p3')</p>
                    <p class="text-gray">@lang('batch-pdf-processing-for-teams-guide-2026.conclusion-p4')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 82])
                @include('components.related-posts', ['postId' => 82])
            </article>
        </div>
    </div>
@endsection
