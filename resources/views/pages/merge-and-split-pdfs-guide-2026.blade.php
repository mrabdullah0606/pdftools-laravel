@extends('main')
@section('title', __('merge-and-split-pdfs-guide-2026.title'))
@section('description', __('merge-and-split-pdfs-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('merge-and-split-pdfs-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/merge-and-split-pdfs-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Merge and split PDFs efficiently" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 89])

                <section class="mb-5">
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.intro-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.intro-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.whenmerge-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whenmerge-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whenmerge-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whenmerge-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whenmerge-p4')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whenmerge-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.whensplit-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whensplit-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whensplit-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whensplit-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whensplit-p4')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.whensplit-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.mergetools-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mergetools-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mergetools-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mergetools-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mergetools-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.splittools-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.splittools-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.splittools-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.splittools-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.splittools-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.mergesteps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">PDFTools merge tool</a>',
                            __('merge-and-split-pdfs-guide-2026.mergesteps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mergesteps-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mergesteps-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mergesteps-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.splitsteps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__SPLIT_LINK__',
                            '<a href="' . localized_route('blog_post64') . '" class="text-gradient fw-semibold">PDFTools split guide</a>',
                            __('merge-and-split-pdfs-guide-2026.splitsteps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.splitsteps-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.splitsteps-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.splitsteps-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.batchmerge-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.batchmerge-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.batchmerge-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.batchmerge-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.batchsplit-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.batchsplit-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.batchsplit-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.batchsplit-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.quality-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.quality-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.quality-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.quality-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.filesize-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.filesize-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.filesize-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">Compress</a>',
                            __('merge-and-split-pdfs-guide-2026.filesize-p3')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.organization-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.organization-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.organization-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.organization-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.organization-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.automation-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.automation-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.automation-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.automation-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.automation-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.mistakes-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mistakes-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mistakes-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mistakes-p3')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mistakes-p4')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.mistakes-p5')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('merge-and-split-pdfs-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.conclusion-p2')</p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.conclusion-p3')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__COMPRESS_LINK__', '__WORD_LINK__'],
                            [
                                '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">Compress</a>',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">Convert</a>'
                            ],
                            __('merge-and-split-pdfs-guide-2026.conclusion-p4')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('merge-and-split-pdfs-guide-2026.conclusion-p5')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 89])
                @include('components.related-posts', ['postId' => 89])
            </article>
        </div>
    </div>
@endsection
