@extends('main')
@section('title', __('split-pdf.title'))
@section('description', __('split-pdf.description'))

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
                <h1 class="text-center">@lang('split-pdf.main-heading')</h1>
                <img src="{{ asset('img/split-pdf.png') }}" class="img-fluid mt-3 mb-3" alt="Split a PDF into Multiple Files">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 64])
                <header class="mb-4">
                    <h2>@lang('split-pdf.main-heading')</h2>
                </header>

                {{-- When You Need Only Part of a Document --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.intro-heading')</h2>
                    <p>@lang('split-pdf.intro-para1')</p>
                    <p>@lang('split-pdf.intro-para2')</p>
                </section>

                {{-- Method 1: PDFTools Split Tool --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.method1-heading')</h2>
                    <p>@lang('split-pdf.method1-intro')</p>

                    <ol>
                        <li>@lang('split-pdf.method1-step1')</li>
                        <li>@lang('split-pdf.method1-step2')</li>
                        <li>@lang('split-pdf.method1-step3')</li>
                        <li>@lang('split-pdf.method1-step4')</li>
                        <li>@lang('split-pdf.method1-step5')</li>
                    </ol>

                    <p>@lang('split-pdf.method1-note')</p>
                    <a href="{{localized_route('merge-pdf')}}">@lang('split-pdf.a')</a>
                    <p>@lang('split-pdf.method1-note2')</p>
                </section>

                {{-- Method 2: Print to PDF Trick --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.method2-heading')</h2>
                    <p>@lang('split-pdf.method2-intro')</p>

                    <ol>
                        <li>@lang('split-pdf.method2-step1')</li>
                        <li>@lang('split-pdf.method2-step2')</li>
                        <li>@lang('split-pdf.method2-step3')</li>
                        <li>@lang('split-pdf.method2-step4')</li>
                        <li>@lang('split-pdf.method2-step5')</li>
                    </ol>

                    <p>@lang('split-pdf.method2-repeat')</p>
                    <p>@lang('split-pdf.method2-tip')</p>
                </section>

                {{-- Method 3: Google Chrome Browser --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.method3-heading')</h2>
                    <p>@lang('split-pdf.method3-intro')</p>

                    <ol>
                        <li>@lang('split-pdf.method3-step1')</li>
                        <li>@lang('split-pdf.method3-step2')</li>
                        <li>@lang('split-pdf.method3-step3')</li>
                        <li>@lang('split-pdf.method3-step4')</li>
                        <li>@lang('split-pdf.method3-step5')</li>
                    </ol>

                    <p>@lang('split-pdf.method3-note')</p>
                </section>

                {{-- Method 4: Preview on Mac --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.method4-heading')</h2>
                    <p>@lang('split-pdf.method4-intro')</p>

                    <ol>
                        <li>@lang('split-pdf.method4-step1')</li>
                        <li>@lang('split-pdf.method4-step2')</li>
                        <li>@lang('split-pdf.method4-step3')</li>
                        <li>@lang('split-pdf.method4-step4')</li>
                    </ol>

                    <p>@lang('split-pdf.method4-note1')</p>
                    <p>@lang('split-pdf.method4-note2')</p>
                    <a href="{{localized_route('merge-pdf')}}">@lang('split-pdf.a')</a>
                    <p>@lang('split-pdf.method4-note3')</p>
                </section>

                {{-- Method 5: Python Script --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.method5-heading')</h2>
                    <p>@lang('split-pdf.method5-para1')</p>
                    <p>@lang('split-pdf.method5-para2')</p>
                    <p>@lang('split-pdf.method5-para3')</p>
                </section>

                {{-- Which Method Should You Use --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.which-method-heading')</h2>
                    <p>@lang('split-pdf.which-method-para')</p>
                </section>

                {{-- Conclusion --}}
                <section class="mb-5">
                    <h2>@lang('split-pdf.conclusion-heading')</h2>
                    <p>@lang('split-pdf.conclusion-para1')</p>
                    <p>@lang('split-pdf.conclusion-para2') <a href="{{localized_route('merge-pdf')}}">@lang('split-pdf.a') </a>
                @lang('split-pdf.conclusion-para3')
                <a href="{{localized_route('compress-pdf')}}">@lang('split-pdf.a2')</a>@lang('split-pdf.conclusion-para4')
                </p>
            
                </section>

                {{-- FAQs --}}
                <section>
                    <h2>@lang('split-pdf.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('split-pdf.faq1-question')</h3>
                        <p>@lang('split-pdf.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('split-pdf.faq2-question')</h3>
                        <p>@lang('split-pdf.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('split-pdf.faq3-question')</h3>
                        <p>@lang('split-pdf.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('split-pdf.faq4-question')</h3>
                        <p>@lang('split-pdf.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 64])
            @include('components.related-posts', ['postId' => 64])
</article>
        </div>
    </div>
@endsection