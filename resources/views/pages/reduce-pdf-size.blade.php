@extends('main')
@section('title', __('reduce-pdf-size.title'))
@section('description', __('reduce-pdf-size.description'))

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
            <div class="col-7 mx-auto">
                <h1 class="text-center">@lang('reduce-pdf-size.main-heading')</h1>
                <img src="{{ asset('img/reduce-pdf-size.png') }}" class="img-fluid mt-3 mb-3" alt="Reduce PDF File Size Without Losing Quality">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 61])
                <header class="mb-4">
                    <h2>@lang('reduce-pdf-size.main-heading')</h2>
                </header>

                {{-- Why Large PDFs Are a Real Problem --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.problem-heading')</h2>
                    <p>@lang('reduce-pdf-size.problem-para1')</p>
                    <p>@lang('reduce-pdf-size.problem-para2')</p>
                    <p>@lang('reduce-pdf-size.problem-para3')</p>
                </section>

                {{-- What Makes a PDF Large --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.what-makes-large-heading')</h2>
                    <p>@lang('reduce-pdf-size.what-makes-large-intro')</p>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.images-heading')</h3>
                        <p>@lang('reduce-pdf-size.images-para1')</p>
                        <p>@lang('reduce-pdf-size.images-para2')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.fonts-heading')</h3>
                        <p>@lang('reduce-pdf-size.fonts-para')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.revision-heading')</h3>
                        <p>@lang('reduce-pdf-size.revision-para')</p>
                    </div>
                </section>

                {{-- Three Types of PDF Compression --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.compression-types-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.lossless-heading')</h3>
                        <p>@lang('reduce-pdf-size.lossless-para')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.lossy-heading')</h3>
                        <p>@lang('reduce-pdf-size.lossy-para1')</p>
                        <p>@lang('reduce-pdf-size.lossy-para2')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.structural-heading')</h3>
                        <p>@lang('reduce-pdf-size.structural-para')</p>
                    </div>
                </section>

                {{-- How to Compress Using PDFTools --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.how-to-compress-heading')</h2>
                    <p>@lang('reduce-pdf-size.how-to-compress-intro')</p>

                    <ol>
                        <li>@lang('reduce-pdf-size.compress-step1')</li>
                        <li>@lang('reduce-pdf-size.compress-step2')</li>
                        <li>@lang('reduce-pdf-size.compress-step3')</li>
                        <li>@lang('reduce-pdf-size.compress-step4')</li>
                        <li>@lang('reduce-pdf-size.compress-step5')</li>
                    </ol>

                    <p>@lang('reduce-pdf-size.how-to-compress-note') @lang('reduce-pdf-size.a') @lang('reduce-pdf-size.how-to-compress-note2')</p>
                </section>

                {{-- What Results to Realistically Expect --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.results-heading')</h2>
                    <p>@lang('reduce-pdf-size.results-intro')</p>

                    <ul>
                        <li>@lang('reduce-pdf-size.result1')</li>
                        <li>@lang('reduce-pdf-size.result2')</li>
                        <li>@lang('reduce-pdf-size.result3')</li>
                        <li>@lang('reduce-pdf-size.result4')</li>
                    </ul>
                </section>

                {{-- When Compression is Not Enough --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.not-enough-heading')</h2>
                    <p>@lang('reduce-pdf-size.not-enough-para1')</p>
                    <p>@lang('reduce-pdf-size.not-enough-para2')</p>
                    <p>@lang('reduce-pdf-size.not-enough-para3')</p>
                </section>

                {{-- Common Compression Problems --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.common-problems-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.problem1-heading')</h3>
                        <p>@lang('reduce-pdf-size.problem1-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.problem2-heading')</h3>
                        <p>@lang('reduce-pdf-size.problem2-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.problem3-heading')</h3>
                        <p>@lang('reduce-pdf-size.problem3-text')</p>
                    </div>
                </section>

                {{-- Conclusion --}}
                <section class="mb-5">
                    <h2>@lang('reduce-pdf-size.conclusion-heading')</h2>
                    <p>@lang('reduce-pdf-size.conclusion-para1')</p>
                    <p>@lang('reduce-pdf-size.conclusion-para2')</p>
                    <p>@lang('reduce-pdf-size.conclusion-para3')</p>
                </section>

                {{-- FAQs --}}
                <section>
                    <h2>@lang('reduce-pdf-size.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.faq1-question')</h3>
                        <p>@lang('reduce-pdf-size.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.faq2-question')</h3>
                        <p>@lang('reduce-pdf-size.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.faq3-question')</h3>
                        <p>@lang('reduce-pdf-size.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.faq4-question')</h3>
                        <p>@lang('reduce-pdf-size.faq4-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('reduce-pdf-size.faq5-question')</h3>
                        <p>@lang('reduce-pdf-size.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 61])
            @include('components.related-posts', ['postId' => 61])
</article>
        </div>
    </div>
@endsection