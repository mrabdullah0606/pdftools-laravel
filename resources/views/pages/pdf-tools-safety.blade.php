@extends('main')
@section('title', __('pdf-tools-safety.title'))
@section('description', __('pdf-tools-safety.description'))

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
                <h1 class="text-center">@lang('pdf-tools-safety.main-heading')</h1>
                <img src="{{ asset('img/pdf-tools-safety.png') }}" class="img-fluid mt-3 mb-3" alt="Are Free Online PDF Tools Safe">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 66])
                <header class="mb-4">
                    <h2>@lang('pdf-tools-safety.main-heading')</h2>
                </header>

                {{-- A Reasonable Question Worth Answering Properly --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.intro-heading')</h2>
                    <p>@lang('pdf-tools-safety.intro-para1')</p>
                    <p>@lang('pdf-tools-safety.intro-para2')</p>
                    <p>@lang('pdf-tools-safety.intro-para3')</p>
                </section>

                {{-- What Happens When You Upload a File --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.upload-heading')</h2>
                    <p>@lang('pdf-tools-safety.upload-para1')</p>
                    <p>@lang('pdf-tools-safety.upload-para2')</p>
                    <p>@lang('pdf-tools-safety.upload-para3')</p>
                </section>

                {{-- How Long Do Files Stay on the Server --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.retention-heading')</h2>
                    <p>@lang('pdf-tools-safety.retention-para1')</p>
                    <p>@lang('pdf-tools-safety.retention-para2')</p>
                </section>

                {{-- What Encryption Protects Your Files --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.encryption-heading')</h2>
                    <p>@lang('pdf-tools-safety.encryption-para1')</p>
                    <p>@lang('pdf-tools-safety.encryption-para2')</p>
                </section>

                {{-- What Reputable Services Do With Your Data --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.reputable-heading')</h2>
                    <p>@lang('pdf-tools-safety.reputable-para1')</p>
                    <p>@lang('pdf-tools-safety.reputable-para2')</p>
                    <p>@lang('pdf-tools-safety.reputable-para3')</p>
                </section>

                {{-- Which Documents Should Not Be Uploaded --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.never-upload-heading')</h2>
                    <p>@lang('pdf-tools-safety.never-upload-intro')</p>

                    <ul>
                        <li>@lang('pdf-tools-safety.never-upload-item1')</li>
                        <li>@lang('pdf-tools-safety.never-upload-item2')</li>
                        <li>@lang('pdf-tools-safety.never-upload-item3')</li>
                        <li>@lang('pdf-tools-safety.never-upload-item4')</li>
                        <li>@lang('pdf-tools-safety.never-upload-item5')</li>
                        <li>@lang('pdf-tools-safety.never-upload-item6')</li>
                    </ul>

                    <p>@lang('pdf-tools-safety.never-upload-note')</p>
                </section>

                {{-- How to Evaluate a PDF Tool Before Using It --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.evaluate-heading')</h2>
                    <p>@lang('pdf-tools-safety.evaluate-intro')</p>

                    <ol>
                        <li>@lang('pdf-tools-safety.evaluate-step1')</li>
                        <li>@lang('pdf-tools-safety.evaluate-step2')</li>
                        <li>@lang('pdf-tools-safety.evaluate-step3')</li>
                        <li>@lang('pdf-tools-safety.evaluate-step4')</li>
                        <li>@lang('pdf-tools-safety.evaluate-step5')</li>
                    </ol>
                </section>

                {{-- Conclusion --}}
                <section class="mb-5">
                    <h2>@lang('pdf-tools-safety.conclusion-heading')</h2>
                    <p>@lang('pdf-tools-safety.conclusion-para1')</p>
                    <p>@lang('pdf-tools-safety.conclusion-para2') <a href="{{localized_route('compress-pdf') }}">@lang('pdf-tools-safety.a')</a> <a href="{{ localized_route('merge-pdf') }}">@lang('pdf-tools-safety.a2')</a>,<a href="{{ localized_route('word-to-pdf') }}">@lang('pdf-tools-safety.a3')</a> @lang('pdf-tools-safety.conclusion-para3')</p>
                </section>

                {{-- FAQs --}}
                <section>
                    <h2>@lang('pdf-tools-safety.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pdf-tools-safety.faq1-question')</h3>
                        <p>@lang('pdf-tools-safety.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-tools-safety.faq2-question')</h3>
                        <p>@lang('pdf-tools-safety.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-tools-safety.faq3-question')</h3>
                        <p>@lang('pdf-tools-safety.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-tools-safety.faq4-question')</h3>
                        <p>@lang('pdf-tools-safety.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 66])
            @include('components.related-posts', ['postId' => 66])
</article>
        </div>
    </div>
@endsection