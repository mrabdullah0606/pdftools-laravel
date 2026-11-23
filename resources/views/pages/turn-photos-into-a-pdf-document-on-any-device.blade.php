@extends('main')
@section('title', __('turn-photos-into-a-pdf-document-on-any-device.title'))
@section('description', __('turn-photos-into-a-pdf-document-on-any-device.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('turn-photos-into-a-pdf-document-on-any-device.main-heading')</h1>
                <img src="{{ asset('img/turn-photos-into-a-pdf-document-on-any-device.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Turn photos into a PDF document on any device" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 95])

                <section class="mb-5">
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.intro-p1')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.why-heading')</h2>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.why-p1')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.why-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.prepare-heading')</h2>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.prepare-p1')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.prepare-p2')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.prepare-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.steps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__JPG_TO_PDF_LINK__',
                            '<a href="' . localized_route('jpg-to-pdf') . '" class="text-gradient fw-semibold">JPG to PDF converter</a>',
                            __('turn-photos-into-a-pdf-document-on-any-device.steps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.steps-p2')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.steps-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.readable-heading')</h2>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.readable-p1')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.readable-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.filesize-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('turn-photos-into-a-pdf-document-on-any-device.filesize-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('turn-photos-into-a-pdf-document-on-any-device.filesize-p2')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.privacy-heading')</h2>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.privacy-p1')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.privacy-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.expense-heading')</h2>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.expense-p1')</p>
                    <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.expense-p2')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('turn-photos-into-a-pdf-document-on-any-device.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('turn-photos-into-a-pdf-document-on-any-device.faq1-q')</h4>
                        <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('turn-photos-into-a-pdf-document-on-any-device.faq2-q')</h4>
                        <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('turn-photos-into-a-pdf-document-on-any-device.faq3-q')</h4>
                        <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('turn-photos-into-a-pdf-document-on-any-device.faq4-q')</h4>
                        <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('turn-photos-into-a-pdf-document-on-any-device.faq5-q')</h4>
                        <p class="text-gray">@lang('turn-photos-into-a-pdf-document-on-any-device.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 95])
                @include('components.related-posts', ['postId' => 95])
            </article>
        </div>
    </div>
@endsection
