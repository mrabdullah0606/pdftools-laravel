@extends('main')
@section('title', __('pdf-table-of-contents-and-bookmarks.title'))
@section('description', __('pdf-table-of-contents-and-bookmarks.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-table-of-contents-and-bookmarks.main-heading')</h1>
                <img src="{{ asset('img/pdf-table-of-contents-and-bookmarks.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="PDF table of contents and bookmarks complete guide" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 102])

                <section class="mb-5">
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.what-heading')</h2>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.what-p1')</p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.what-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.plan-heading')</h2>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.plan-p1')</p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.plan-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.assemble-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('pdf-table-of-contents-and-bookmarks.assemble-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.assemble-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.adding-heading')</h2>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.adding-p1')</p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.adding-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.separate-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PAGES_TO_PDF_LINK__',
                            '<a href="' . localized_route('pages-to-pdf') . '" class="text-gradient fw-semibold">pages to PDF tool</a>',
                            __('pdf-table-of-contents-and-bookmarks.separate-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.separate-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.editing-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('pdf-table-of-contents-and-bookmarks.editing-p1')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.reducing-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('pdf-table-of-contents-and-bookmarks.reducing-p1')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.accessibility-heading')</h2>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.accessibility-p1')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.mistakes-heading')</h2>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.mistakes-p1')</p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.mistakes-p2')</p>
                    <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.mistakes-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('pdf-table-of-contents-and-bookmarks.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-table-of-contents-and-bookmarks.faq1-q')</h4>
                        <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-table-of-contents-and-bookmarks.faq2-q')</h4>
                        <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-table-of-contents-and-bookmarks.faq3-q')</h4>
                        <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-table-of-contents-and-bookmarks.faq4-q')</h4>
                        <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-table-of-contents-and-bookmarks.faq5-q')</h4>
                        <p class="text-gray">@lang('pdf-table-of-contents-and-bookmarks.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 102])
                @include('components.related-posts', ['postId' => 102])
            </article>
        </div>
    </div>
@endsection
