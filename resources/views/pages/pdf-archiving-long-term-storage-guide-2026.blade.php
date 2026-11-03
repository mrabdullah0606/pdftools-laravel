@extends('main')
@section('title', __('pdf-archiving-long-term-storage-guide-2026.title'))
@section('description', __('pdf-archiving-long-term-storage-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-archiving-long-term-storage-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/pdf-archiving-long-term-storage-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="PDF archiving and long-term storage" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 88])

                <section class="mb-5">
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.intro-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.why-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.why-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.why-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.why-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.why-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.preparing-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.preparing-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.preparing-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.preparing-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.preparing-p4')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">Compress documents</a>',
                            __('pdf-archiving-long-term-storage-guide-2026.preparing-p5')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.preparing-p6')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.format-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.format-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.format-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.format-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.format-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.format-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.physical-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.physical-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.physical-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.physical-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.physical-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.physical-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.dam-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.dam-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.dam-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.dam-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.dam-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.dam-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.organizing-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.organizing-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.organizing-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.organizing-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.organizing-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.organizing-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.search-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.search-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.search-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.search-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.search-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.search-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.challenges-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.challenges-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.challenges-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.challenges-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.challenges-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.challenges-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.compliance-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.compliance-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.compliance-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.compliance-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.compliance-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.cost-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.cost-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.cost-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.cost-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.cost-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.cost-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.disaster-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.disaster-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.disaster-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.disaster-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.disaster-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.disaster-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.strategy-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.strategy-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.strategy-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.strategy-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.strategy-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.strategy-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.integration-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__MERGE_LINK__', '__CONVERT_LINK__'],
                            [
                                '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">Merging</a>',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">converting</a>'
                            ],
                            __('pdf-archiving-long-term-storage-guide-2026.integration-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-archiving-long-term-storage-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.conclusion-p2')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.conclusion-p3')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.conclusion-p4')</p>
                    <p class="text-gray">@lang('pdf-archiving-long-term-storage-guide-2026.conclusion-p5')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 88])
                @include('components.related-posts', ['postId' => 88])
            </article>
        </div>
    </div>
@endsection
