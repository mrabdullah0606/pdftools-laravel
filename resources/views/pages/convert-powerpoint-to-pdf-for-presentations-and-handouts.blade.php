@extends('main')
@section('title', __('convert-powerpoint-to-pdf-for-presentations-and-handouts.title'))
@section('description', __('convert-powerpoint-to-pdf-for-presentations-and-handouts.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.main-heading')</h1>
                <img src="{{ asset('img/convert-powerpoint-to-pdf-for-presentations-and-handouts.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Convert PowerPoint to PDF for presentations and handouts" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 93])

                <section class="mb-5">
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.intro-p1')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.when-heading')</h2>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.when-p1')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.when-p2')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.when-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.steps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PPT_TO_PDF_LINK__',
                            '<a href="' . localized_route('ppt-to-pdf') . '" class="text-gradient fw-semibold">PowerPoint to PDF converter</a>',
                            __('convert-powerpoint-to-pdf-for-presentations-and-handouts.steps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.steps-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.checking-heading')</h2>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.checking-p1')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.checking-p2')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.checking-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.handout-heading')</h2>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.handout-p1')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.handout-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('convert-powerpoint-to-pdf-for-presentations-and-handouts.handout-p3')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.filesize-heading')</h2>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.filesize-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">PDF compression tool</a>',
                            __('convert-powerpoint-to-pdf-for-presentations-and-handouts.filesize-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_JPG_LINK__',
                            '<a href="' . localized_route('pdf-to-jpg') . '" class="text-gradient fw-semibold">PDF to JPG converter</a>',
                            __('convert-powerpoint-to-pdf-for-presentations-and-handouts.filesize-p3')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.mistakes-heading')</h2>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.mistakes-p1')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.mistakes-p2')</p>
                    <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.mistakes-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq1-q')</h4>
                        <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq2-q')</h4>
                        <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq3-q')</h4>
                        <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq4-q')</h4>
                        <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq5-q')</h4>
                        <p class="text-gray">@lang('convert-powerpoint-to-pdf-for-presentations-and-handouts.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 93])
                @include('components.related-posts', ['postId' => 93])
            </article>
        </div>
    </div>
@endsection
