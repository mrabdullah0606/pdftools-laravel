@extends('main')
@section('title', __('how-to-reduce-pdf-file-size-for-email-attachments.title'))
@section('description', __('how-to-reduce-pdf-file-size-for-email-attachments.description'))

@push('head')
    <style>
        .text-gray {
            color: #666;
        }

        .blog_card {
            width: 21rem;
            border-radius: 10px;
            font-family: "Poppins", sans-serif;
            transition: all 0.3s ease;
        }

        .blog_card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 10px rgba(207, 212, 222, 1);
        }
    </style>
@endpush

@section('page')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-9 col-lg-8 mx-auto text-center">
                <h1 class="text-center fw-bold display-5 mb-3">@lang('how-to-reduce-pdf-file-size-for-email-attachments.main-heading')</h1>
                <img src="{{ asset('img/how-to-reduce-pdf-file-size-for-email-attachments.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="How to Reduce PDF File Size for Email Attachments" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 91])

                {{-- Intro --}}
                <section class="mb-5">
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.intro-p1')</p>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                {{-- Why PDFs Get So Large --}}
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-reduce-pdf-file-size-for-email-attachments.why-heading')</h2>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.why-p1')</p>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.why-p2')</p>
                </section>

                {{-- Choosing a Compression Level --}}
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-reduce-pdf-file-size-for-email-attachments.levels-heading')</h2>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.levels-p1')</p>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.levels-p2')</p>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.levels-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                {{-- Step by Step: Compress the File --}}
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-reduce-pdf-file-size-for-email-attachments.steps-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">' . __('how-to-reduce-pdf-file-size-for-email-attachments.compress-tool-text') . '</a>',
                            __('how-to-reduce-pdf-file-size-for-email-attachments.steps-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.steps-p2')</p>
                </section>

                {{-- Check the Result Before Sending --}}
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-reduce-pdf-file-size-for-email-attachments.check-heading')</h2>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.check-p1')</p>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.check-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                {{-- When the File Is Still Too Large --}}
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-reduce-pdf-file-size-for-email-attachments.toolarge-heading')</h2>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PAGES_LINK__',
                            '<a href="' . localized_route('pages-to-pdf') . '" class="text-gradient fw-semibold">' . __('how-to-reduce-pdf-file-size-for-email-attachments.pages-tool-text') . '</a>',
                            __('how-to-reduce-pdf-file-size-for-email-attachments.toolarge-p1')
                        ) !!}
                    </p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_TO_PDF_LINK__',
                            '<a href="' . localized_route('word-to-pdf') . '" class="text-gradient fw-semibold">' . __('how-to-reduce-pdf-file-size-for-email-attachments.word-to-pdf-tool-text') . '</a>',
                            __('how-to-reduce-pdf-file-size-for-email-attachments.toolarge-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.toolarge-p3')</p>
                </section>

                {{-- Tips for Keeping Files Small From the Start --}}
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-reduce-pdf-file-size-for-email-attachments.tips-heading')</h2>
                    <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.tips-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__MERGE_LINK__',
                            '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">' . __('how-to-reduce-pdf-file-size-for-email-attachments.merge-tool-text') . '</a>',
                            __('how-to-reduce-pdf-file-size-for-email-attachments.tips-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                {{-- Frequently Asked Questions --}}
                <section class="mb-4">
                    <h2 class="fw-bold text-dark h3 border-bottom pb-2">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq-heading')</h2>
                    
                    <div class="my-4">
                        <h3 class="fw-semibold text-dark h5">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq1-q')</h3>
                        <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h3 class="fw-semibold text-dark h5">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq2-q')</h3>
                        <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h3 class="fw-semibold text-dark h5">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq3-q')</h3>
                        <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h3 class="fw-semibold text-dark h5">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq4-q')</h3>
                        <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq4-a')</p>
                    </div>

                    <div class="my-4">
                        <h3 class="fw-semibold text-dark h5">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq5-q')</h3>
                        <p class="text-gray">@lang('how-to-reduce-pdf-file-size-for-email-attachments.faq5-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 91])
                @include('components.related-posts', ['postId' => 91])
            </article>
        </div>
    </div>
@endsection

