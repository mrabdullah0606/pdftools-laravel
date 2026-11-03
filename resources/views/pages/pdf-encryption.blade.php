@extends('main')
@section('title', __('pdf-encryption.title'))
@section('description', __('pdf-encryption.description'))

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
                <h1 class="text-center">@lang('pdf-encryption.main-heading')</h1>
                <img src="{{ asset('img/pdf-encryption.png') }}" class="img-fluid mt-3 mb-3" alt="PDF Encryption 128-bit vs 256-bit AES">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 68])
                <header class="mb-4">
                    <h2>@lang('pdf-encryption.main-heading')</h2>
                </header>

                {{-- The Setting Most People Click Past --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.intro-heading')</h2>
                    <p>@lang('pdf-encryption.intro-para1')</p>
                    <p>@lang('pdf-encryption.intro-para2')</p>
                </section>

                {{-- What Encryption Actually Does to a PDF --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.what-does-heading')</h2>
                    <p>@lang('pdf-encryption.what-does-para1')</p>
                    <p>@lang('pdf-encryption.what-does-para2')</p>
                </section>

                {{-- The History of PDF Encryption Standards --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.history-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pdf-encryption.rc4-heading')</h3>
                        <p>@lang('pdf-encryption.rc4-para')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-encryption.aes-heading')</h3>
                        <p>@lang('pdf-encryption.aes-para1')</p>
                        <p>@lang('pdf-encryption.aes-para2')</p>
                    </div>
                </section>

                {{-- What the Bit Number Means --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.bit-number-heading')</h2>
                    <p>@lang('pdf-encryption.bit-number-para1')</p>
                    <p>@lang('pdf-encryption.bit-number-para2')</p>
                    <p>@lang('pdf-encryption.bit-number-para3')</p>
                </section>

                {{-- Why Password Strength Matters More --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.password-strength-heading')</h2>
                    <p>@lang('pdf-encryption.password-strength-para1')</p>
                    <p>@lang('pdf-encryption.password-strength-para2')</p>
                    <p>@lang('pdf-encryption.password-strength-para3')</p>
                </section>

                {{-- Which Encryption Level to Use --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.which-level-heading')</h2>
                    <p>@lang('pdf-encryption.which-level-para1')</p>
                    <p>@lang('pdf-encryption.which-level-para2')</p>
                    <p>@lang('pdf-encryption.which-level-para3')</p>
                </section>

                {{-- Compatibility Considerations --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.compatibility-heading')</h2>
                    <p>@lang('pdf-encryption.compatibility-para1')</p>
                    <p>@lang('pdf-encryption.compatibility-para2')</p>
                </section>

                {{-- Conclusion --}}
                <section class="mb-5">
                    <h2>@lang('pdf-encryption.conclusion-heading')</h2>
                    <p>@lang('pdf-encryption.conclusion-para1')</p>
                    <p>@lang('pdf-encryption.conclusion-para2')</p>
                </section>

                {{-- FAQs --}}
                <section>
                    <h2>@lang('pdf-encryption.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pdf-encryption.faq1-question')</h3>
                        <p>@lang('pdf-encryption.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-encryption.faq2-question')</h3>
                        <p>@lang('pdf-encryption.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-encryption.faq3-question')</h3>
                        <p>@lang('pdf-encryption.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pdf-encryption.faq4-question')</h3>
                        <p>@lang('pdf-encryption.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 68])
            @include('components.related-posts', ['postId' => 68])
</article>
        </div>
    </div>
@endsection