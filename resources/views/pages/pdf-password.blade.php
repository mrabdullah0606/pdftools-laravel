@extends('main')
@section('title', __('pdf-password.title'))
@section('description', __('pdf-password.description'))

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
                <h1 class="text-center">@lang('pdf-password.main-heading')</h1>
                <img src="{{ asset('img/pdf-password.png') }}" class="img-fluid mt-3 mb-3" alt="Password Protect a PDF on Any Device">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 67])
                <header class="mb-4">
                    <h2>@lang('pdf-password.main-heading')</h2>
                </header>

                {{-- Why Password Protection Matters --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.intro-heading')</h2>
                    <p>@lang('pdf-password.intro-para1')</p>
                    <p>@lang('pdf-password.intro-para2')</p>
                </section>

                {{-- Two Types of PDF Passwords --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.types-heading')</h2>
                    <p>@lang('pdf-password.types-intro')</p>
                    <p>@lang('pdf-password.types-opening')</p>
                    <p>@lang('pdf-password.types-permissions')</p>
                    <p>@lang('pdf-password.types-note')</p>
                </section>

                {{-- Method 1: Preview on Mac --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.method1-heading')</h2>
                    <p>@lang('pdf-password.method1-intro')</p>

                    <ol>
                        <li>@lang('pdf-password.method1-step1')</li>
                        <li>@lang('pdf-password.method1-step2')</li>
                        <li>@lang('pdf-password.method1-step3')</li>
                        <li>@lang('pdf-password.method1-step4')</li>
                        <li>@lang('pdf-password.method1-step5')</li>
                    </ol>

                    <p>@lang('pdf-password.method1-note')</p>
                </section>

                {{-- Method 2: LibreOffice --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.method2-heading')</h2>
                    <p>@lang('pdf-password.method2-intro')</p>

                    <ol>
                        <li>@lang('pdf-password.method2-step1')</li>
                        <li>@lang('pdf-password.method2-step2')</li>
                        <li>@lang('pdf-password.method2-step3')</li>
                        <li>@lang('pdf-password.method2-step4')</li>
                        <li>@lang('pdf-password.method2-step5')</li>
                        <li>@lang('pdf-password.method2-step6')</li>
                    </ol>

                    <p>@lang('pdf-password.method2-note')</p>
                </section>

                {{-- Method 3: Microsoft Word --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.method3-heading')</h2>
                    <p>@lang('pdf-password.method3-intro')</p>

                    <ol>
                        <li>@lang('pdf-password.method3-step1')</li>
                        <li>@lang('pdf-password.method3-step2')</li>
                        <li>@lang('pdf-password.method3-step3')</li>
                        <li>@lang('pdf-password.method3-step4')</li>
                        <li>@lang('pdf-password.method3-step5')</li>
                        <li>@lang('pdf-password.method3-step6')</li>
                    </ol>

                    <p>@lang('pdf-password.method3-note')</p>
                </section>

                {{-- Method 4: Online PDF Protection Tools --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.method4-heading')</h2>
                    <p>@lang('pdf-password.method4-para1')</p>
                    <p>@lang('pdf-password.method4-para2')</p>
                </section>

                {{-- How to Choose a Strong PDF Password --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.strong-password-heading')</h2>
                    <p>@lang('pdf-password.strong-password-para1')</p>
                    <p>@lang('pdf-password.strong-password-para2')</p>
                    <p>@lang('pdf-password.strong-password-para3')</p>
                </section>

                {{-- Sharing Passwords Securely --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.sharing-heading')</h2>
                    <p>@lang('pdf-password.sharing-para')</p>
                </section>

                {{-- FAQs --}}
                <section class="mb-5">
                    <h2>@lang('pdf-password.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pdf-password.faq1-question')</h3>
                        <p>@lang('pdf-password.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-password.faq2-question')</h3>
                        <p>@lang('pdf-password.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-password.faq3-question')</h3>
                        <p>@lang('pdf-password.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-password.faq4-question')</h3>
                        <p>@lang('pdf-password.faq4-answer')</p>
                    </div>
                </section>

                {{-- Conclusion --}}
                <section>
                    <h2>@lang('pdf-password.conclusion-heading')</h2>
                    <p>@lang('pdf-password.conclusion-para1')</p>
                    <p>@lang('pdf-password.conclusion-para2')</p>
                </section>

            
            @include('components.author-bio-box', ['postId' => 67])
            @include('components.related-posts', ['postId' => 67])
</article>
        </div>
    </div>
@endsection