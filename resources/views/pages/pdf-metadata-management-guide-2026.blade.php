@extends('main')
@section('title', __('pdf-metadata-management-guide-2026.title'))
@section('description', __('pdf-metadata-management-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-metadata-management-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/pdf-metadata-management-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="PDF metadata: smarter document organisation" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 86])

                <section class="mb-5">
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.intro-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.understanding-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.understanding-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.understanding-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.understanding-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.why-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.why-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.why-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.why-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.why-p4')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.why-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.adding-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.adding-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.adding-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.adding-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.adding-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.editing-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.editing-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.editing-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.editing-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.editing-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.types-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.types-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.types-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.types-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.types-p4')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.types-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.organization-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.organization-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.organization-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.organization-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.organization-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.standards-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.standards-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.standards-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.standards-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.standards-p4')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.standards-p5')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.privacy-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.privacy-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.privacy-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.privacy-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.privacy-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.extraction-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.extraction-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.extraction-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.extraction-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.extraction-p4')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.extraction-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.tools-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.tools-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.tools-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__BATCH_GUIDE_LINK__',
                            '<a href="' . localized_route('blog_post82') . '" class="text-gradient fw-semibold">batch PDF processing guide</a>',
                            __('pdf-metadata-management-guide-2026.tools-p3')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.tools-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.mistakes-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.mistakes-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.mistakes-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.mistakes-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.mistakes-p4')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.mistakes-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.workflows-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.workflows-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.workflows-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.workflows-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.workflows-p4')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__MERGE_LINK__', '__CONVERT_LINK__'],
                            [
                                '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">Merging</a>',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">Converting documents</a>'
                            ],
                            __('pdf-metadata-management-guide-2026.workflows-p5')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-metadata-management-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.conclusion-p2')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.conclusion-p3')</p>
                    <p class="text-gray">@lang('pdf-metadata-management-guide-2026.conclusion-p4')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 86])
                @include('components.related-posts', ['postId' => 86])
            </article>
        </div>
    </div>
@endsection
