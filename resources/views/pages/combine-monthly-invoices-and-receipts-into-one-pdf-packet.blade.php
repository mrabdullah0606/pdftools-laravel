@extends('main')
@section('title', __('combine-monthly-invoices-and-receipts-into-one-pdf-packet.title'))
@section('description', __('combine-monthly-invoices-and-receipts-into-one-pdf-packet.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.main-heading')</h1>
                <img src="{{ asset('img/combine-monthly-invoices-and-receipts-into-one-pdf-packet.jpg') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Combine monthly invoices and receipts into one PDF packet" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 99])

                <section class="mb-5">
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.intro-p1')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.gather-heading')</h2>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.gather-p1')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.gather-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.convert-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF converter</a>',
                            __('combine-monthly-invoices-and-receipts-into-one-pdf-packet.convert-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__JPG_TO_PDF_LINK__',
                            '<a href="' . localized_route('jpg-to-pdf') . '" class="text-gradient fw-semibold">JPG to PDF tool</a>',
                            __('combine-monthly-invoices-and-receipts-into-one-pdf-packet.convert-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.convert-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.order-heading')</h2>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.order-p1')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.order-p2')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.order-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.merge-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('combine-monthly-invoices-and-receipts-into-one-pdf-packet.merge-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.merge-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.compress-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('combine-monthly-invoices-and-receipts-into-one-pdf-packet.compress-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.compress-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.quality-heading')</h2>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.quality-p1')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.quality-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.archiving-heading')</h2>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.archiving-p1')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.archiving-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.mistakes-heading')</h2>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.mistakes-p1')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.mistakes-p2')</p>
                    <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.mistakes-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq1-q')</h4>
                        <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq2-q')</h4>
                        <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq3-q')</h4>
                        <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq4-q')</h4>
                        <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq5-q')</h4>
                        <p class="text-gray">@lang('combine-monthly-invoices-and-receipts-into-one-pdf-packet.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 99])
                @include('components.related-posts', ['postId' => 99])
            </article>
        </div>
    </div>
@endsection
