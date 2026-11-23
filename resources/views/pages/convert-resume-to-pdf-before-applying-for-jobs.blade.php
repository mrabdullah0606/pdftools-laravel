@extends('main')
@section('title', __('convert-resume-to-pdf-before-applying-for-jobs.title'))
@section('description', __('convert-resume-to-pdf-before-applying-for-jobs.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('convert-resume-to-pdf-before-applying-for-jobs.main-heading')</h1>
                <img src="{{ asset('img/convert-resume-to-pdf-before-applying-for-jobs.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="Convert your resume to PDF before applying for jobs" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 92])

                <section class="mb-5">
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.intro-p1')</p>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-resume-to-pdf-before-applying-for-jobs.why-heading')</h2>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.why-p1')</p>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.why-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-resume-to-pdf-before-applying-for-jobs.steps-heading')</h2>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.steps-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">Word to PDF converter</a>',
                            __('convert-resume-to-pdf-before-applying-for-jobs.steps-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.steps-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-resume-to-pdf-before-applying-for-jobs.checking-heading')</h2>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.checking-p1')</p>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.checking-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-resume-to-pdf-before-applying-for-jobs.different-heading')</h2>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.different-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('convert-resume-to-pdf-before-applying-for-jobs.different-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-resume-to-pdf-before-applying-for-jobs.supporting-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                            __('convert-resume-to-pdf-before-applying-for-jobs.supporting-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.supporting-p2')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_TO_JPG_LINK__',
                            '<a href="' . localized_route('pdf-to-jpg') . '" class="text-gradient fw-semibold">PDF to JPG converter</a>',
                            __('convert-resume-to-pdf-before-applying-for-jobs.supporting-p3')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('convert-resume-to-pdf-before-applying-for-jobs.mistakes-heading')</h2>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.mistakes-p1')</p>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.mistakes-p2')</p>
                    <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.mistakes-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq1-q')</h4>
                        <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq2-q')</h4>
                        <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq3-q')</h4>
                        <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq4-q')</h4>
                        <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq5-q')</h4>
                        <p class="text-gray">@lang('convert-resume-to-pdf-before-applying-for-jobs.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 92])
                @include('components.related-posts', ['postId' => 92])
            </article>
        </div>
    </div>
@endsection
