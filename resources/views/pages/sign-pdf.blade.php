@extends('main')
@section('title', __('sign-pdf.title'))
@section('description', __('sign-pdf.description'))

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
                <h1 class="text-center">@lang('sign-pdf.main-heading')</h1>
                <img src="{{ asset('img/sign-pdf.png') }}" class="img-fluid mt-3 mb-3" alt="Sign a PDF Digitally Without Printing">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 63])
                <header class="mb-4">
                    <h2>@lang('sign-pdf.main-heading')</h2>
                </header>

                {{-- The Print-Sign-Scan Cycle Is Unnecessary --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.intro-heading')</h2>
                    <p>@lang('sign-pdf.intro-para1')</p>
                    <p>@lang('sign-pdf.intro-para2')</p>
                </section>

                {{-- Electronic Signature vs Digital Signature --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.esig-vs-dsig-heading')</h2>
                    <p>@lang('sign-pdf.esig-vs-dsig-intro')</p>
                    <p>@lang('sign-pdf.esig-para')</p>
                    <p>@lang('sign-pdf.dsig-para')</p>
                    <p>@lang('sign-pdf.esig-vs-dsig-note')</p>
                </section>

                {{-- Method 1: Adobe Acrobat Reader --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.method1-heading')</h2>
                    <p>@lang('sign-pdf.method1-intro')</p>

                    <ol>
                        <li>@lang('sign-pdf.method1-step1')</li>
                        <li>@lang('sign-pdf.method1-step2')</li>
                        <li>@lang('sign-pdf.method1-step3')</li>
                        <li>@lang('sign-pdf.method1-step4')</li>
                        <li>@lang('sign-pdf.method1-step5')</li>
                        <li>@lang('sign-pdf.method1-step6')</li>
                    </ol>

                    <p>@lang('sign-pdf.method1-note')</p>
                </section>

                {{-- Method 2: DocuSign --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.method2-heading')</h2>
                    <p>@lang('sign-pdf.method2-intro')</p>

                    <ol>
                        <li>@lang('sign-pdf.method2-step1')</li>
                        <li>@lang('sign-pdf.method2-step2')</li>
                        <li>@lang('sign-pdf.method2-step3')</li>
                        <li>@lang('sign-pdf.method2-step4')</li>
                        <li>@lang('sign-pdf.method2-step5')</li>
                        <li>@lang('sign-pdf.method2-step6')</li>
                    </ol>

                    <p>@lang('sign-pdf.method2-note')</p>
                </section>

                {{-- Method 3: iPhone and iPad --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.method3-heading')</h2>
                    <p>@lang('sign-pdf.method3-intro')</p>

                    <ol>
                        <li>@lang('sign-pdf.method3-step1')</li>
                        <li>@lang('sign-pdf.method3-step2')</li>
                        <li>@lang('sign-pdf.method3-step3')</li>
                        <li>@lang('sign-pdf.method3-step4')</li>
                        <li>@lang('sign-pdf.method3-step5')</li>
                        <li>@lang('sign-pdf.method3-step6')</li>
                    </ol>

                    <p>@lang('sign-pdf.method3-note')</p>
                </section>

                {{-- Method 4: Android Devices --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.method4-heading')</h2>
                    <p>@lang('sign-pdf.method4-para1')</p>
                    <p>@lang('sign-pdf.method4-para2')</p>
                </section>

                {{-- Method 5: Mac Using Preview --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.method5-heading')</h2>
                    <p>@lang('sign-pdf.method5-intro')</p>

                    <ol>
                        <li>@lang('sign-pdf.method5-step1')</li>
                        <li>@lang('sign-pdf.method5-step2')</li>
                        <li>@lang('sign-pdf.method5-step3')</li>
                        <li>@lang('sign-pdf.method5-step4')</li>
                        <li>@lang('sign-pdf.method5-step5')</li>
                        <li>@lang('sign-pdf.method5-step6')</li>
                    </ol>

                    <p>@lang('sign-pdf.method5-note')</p>
                </section>

                {{-- Which Documents Cannot Be Signed Digitally --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.cannot-sign-heading')</h2>
                    <p>@lang('sign-pdf.cannot-sign-para1')</p>
                    <p>@lang('sign-pdf.cannot-sign-para2')</p>
                </section>

                {{-- Conclusion --}}
                <section class="mb-5">
                    <h2>@lang('sign-pdf.conclusion-heading')</h2>
                    <p>@lang('sign-pdf.conclusion-para1')</p>
                    <p>@lang('sign-pdf.conclusion-para2')</p>
                    <p>@lang('sign-pdf.a')</p>
                    <p>@lang('sign-pdf.b')</p>

                </section>

                {{-- FAQs --}}
                <section>
                    <h2>@lang('sign-pdf.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('sign-pdf.faq1-question')</h3>
                        <p>@lang('sign-pdf.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('sign-pdf.faq2-question')</h3>
                        <p>@lang('sign-pdf.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('sign-pdf.faq3-question')</h3>
                        <p>@lang('sign-pdf.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('sign-pdf.faq4-question')</h3>
                        <p>@lang('sign-pdf.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 63])
            @include('components.related-posts', ['postId' => 63])
</article>
        </div>
    </div>
@endsection