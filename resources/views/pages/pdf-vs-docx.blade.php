@extends('main')
@section('title', __('pdf-vs-docx.title'))
@section('description', __('pdf-vs-docx.description'))

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
                <h1 class="text-center">@lang('pdf-vs-docx.main-heading')</h1>
                <img src="{{ asset('img/pdf-vs-docx.png') }}" class="img-fluid mt-3 mb-3" alt="PDF vs DOCX File Format Comparison">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 62])
                <header class="mb-4">
                    <h2>@lang('pdf-vs-docx.main-heading')</h2>
                </header>

                {{-- A Decision Most People Make Without Thinking --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.intro-heading')</h2>
                    <p>@lang('pdf-vs-docx.intro-para1')</p>
                    <p>@lang('pdf-vs-docx.intro-para2')</p>
                </section>

                {{-- What PDF Was Built For --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.pdf-built-heading')</h2>
                    <p>@lang('pdf-vs-docx.pdf-built-para1')</p>
                    <p>@lang('pdf-vs-docx.pdf-built-para2')</p>
                    <p>@lang('pdf-vs-docx.pdf-built-para3')</p>
                </section>

                {{-- What DOCX Was Built For --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.docx-built-heading')</h2>
                    <p>@lang('pdf-vs-docx.docx-built-para1')</p>
                    <p>@lang('pdf-vs-docx.docx-built-para2')</p>
                    <p>@lang('pdf-vs-docx.docx-built-para3')</p>
                </section>

                {{-- When to Use PDF --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.when-pdf-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.pdf-use1-heading')</h3>
                        <p>@lang('pdf-vs-docx.pdf-use1-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.pdf-use2-heading')</h3>
                        <p>@lang('pdf-vs-docx.pdf-use2-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.pdf-use3-heading')</h3>
                        <p>@lang('pdf-vs-docx.pdf-use3-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.pdf-use4-heading')</h3>
                        <p>@lang('pdf-vs-docx.pdf-use4-text')</p>
                    </div>
                </section>

                {{-- When to Use DOCX --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.when-docx-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.docx-use1-heading')</h3>
                        <p>@lang('pdf-vs-docx.docx-use1-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.docx-use2-heading')</h3>
                        <p>@lang('pdf-vs-docx.docx-use2-text')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.docx-use3-heading')</h3>
                        <p>@lang('pdf-vs-docx.docx-use3-text')</p>
                    </div>
                </section>

                {{-- Converting Between Formats --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.converting-heading')</h2>
                    <p>
                        @lang('pdf-vs-docx.converting-para1')
                        {!! __('pdf-vs-docx.a') !!}
                        @lang('pdf-vs-docx.a2') 
                    </p>
                    <p>
                        @lang('pdf-vs-docx.converting-para2')
                        {!! __('pdf-vs-docx.b') !!}
                        @lang('pdf-vs-docx.b2')
                    </p>
                    <p>@lang('pdf-vs-docx.converting-tip')</p>
                </section>

                {{-- The Quick Decision Rule --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.decision-rule-heading')</h2>
                    <p>@lang('pdf-vs-docx.decision-rule-para1')</p>
                    <p>@lang('pdf-vs-docx.decision-rule-para2')</p>
                </section>

                {{-- Conclusion --}}
                <section class="mb-5">
                    <h2>@lang('pdf-vs-docx.conclusion-heading')</h2>
                    <p>@lang('pdf-vs-docx.conclusion-para1')</p>
                    <p>@lang('pdf-vs-docx.conclusion-para2')</p>
                </section>

                {{-- FAQs --}}
                <section>
                    <h2>@lang('pdf-vs-docx.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.faq1-question')</h3>
                        <p>@lang('pdf-vs-docx.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.faq2-question')</h3>
                        <p>@lang('pdf-vs-docx.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.faq3-question')</h3>
                        <p>@lang('pdf-vs-docx.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-vs-docx.faq4-question')</h3>
                        <p>@lang('pdf-vs-docx.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 62])
            @include('components.related-posts', ['postId' => 62])
</article>
        </div>
    </div>
@endsection