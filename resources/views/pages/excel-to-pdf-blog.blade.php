@extends('main')
@section('title', __('excel-to-pdf-blog.title'))
@section('description', __('excel-to-pdf-blog.description'))

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
                <h1 class="text-center">@lang('excel-to-pdf-blog.main-heading')</h1>
                <img src="{{ asset('img/excel-to-pdf-blog.png') }}" class="img-fluid mt-3 mb-3" alt="Convert Excel to PDF Without Formatting Issues">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 65])
                <header class="mb-4">
                    <h2>@lang('excel-to-pdf-blog.main-heading')</h2>
                </header>

                {{-- Why Excel to PDF Conversion Goes Wrong --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.intro-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.intro-para1')</p>
                    <p>@lang('excel-to-pdf-blog.intro-para2')</p>
                    <p>@lang('excel-to-pdf-blog.intro-para3')</p>
                </section>

                {{-- Step 1: Define Your Print Area --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.step1-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.step1-para1')</p>
                    <p>@lang('excel-to-pdf-blog.step1-para2')</p>
                    <p>@lang('excel-to-pdf-blog.step1-para3')</p>
                </section>

                {{-- Step 2: Set Page Orientation and Size --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.step2-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.step2-para1')</p>
                    <p>@lang('excel-to-pdf-blog.step2-para2')</p>
                </section>

                {{-- Step 3: Use Scale to Fit --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.step3-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.step3-para1')</p>
                    <p>@lang('excel-to-pdf-blog.step3-para2')</p>
                </section>

                {{-- Step 4: Repeat Header Rows --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.step4-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.step4-para1')</p>
                    <p>@lang('excel-to-pdf-blog.step4-para2')</p>
                </section>

                {{-- Step 5: Check Print Preview --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.step5-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.step5-para1')</p>
                    <p>@lang('excel-to-pdf-blog.step5-para2')</p>
                </section>

                {{-- Step 6: Export Using Native Export --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.step6-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.step6-para1')</p>
                    <p>@lang('excel-to-pdf-blog.step6-para2')</p>
                    <p>@lang('excel-to-pdf-blog.step6-para3')</p>
                </section>

                {{-- When to Use an Online Converter --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.online-converter-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.online-converter-para') <a href="{{localized_route('word-to-pdf')}}">@lang('excel-to-pdf-blog.a')</a> @lang('excel-to-pdf-blog.online-converter-para-1')</p>
                </section>

                {{-- Fixing Common Problems --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.common-problems-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('excel-to-pdf-blog.problem1-heading')</h3>
                        <p>@lang('excel-to-pdf-blog.problem1-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('excel-to-pdf-blog.problem2-heading')</h3>
                        <p>@lang('excel-to-pdf-blog.problem2-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('excel-to-pdf-blog.problem3-heading')</h3>
                        <p>@lang('excel-to-pdf-blog.problem3-text')</p>
                    </div>
                </section>

                {{-- Conclusion --}}
                <section class="mb-5">
                    <h2>@lang('excel-to-pdf-blog.conclusion-heading')</h2>
                    <p>@lang('excel-to-pdf-blog.conclusion-para1')</p>
                    <p>@lang('excel-to-pdf-blog.conclusion-para2') <a href="{{ localized_route('compress-pdf') }}">@lang('excel-to-pdf-blog.a2')</a> @lang('excel-to-pdf-blog.conclusion-para3') <a href="{{ localized_route('merge-pdf') }}">@lang('excel-to-pdf-blog.a3')</a></p>
                </section>

                {{-- FAQs --}}
                <section>
                    <h2>@lang('excel-to-pdf-blog.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('excel-to-pdf-blog.faq1-question')</h3>
                        <p>@lang('excel-to-pdf-blog.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('excel-to-pdf-blog.faq2-question')</h3>
                        <p>@lang('excel-to-pdf-blog.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('excel-to-pdf-blog.faq3-question')</h3>
                        <p>@lang('excel-to-pdf-blog.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('excel-to-pdf-blog.faq4-question')</h3>
                        <p>@lang('excel-to-pdf-blog.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 65])
            @include('components.related-posts', ['postId' => 65])
</article>
        </div>
    </div>
@endsection