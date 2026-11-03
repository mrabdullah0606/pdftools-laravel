@extends('main')
@section('title', __('how-to-protect-pdf-files-with-passwords-complete-guide-2026.title'))
@section('description', __('how-to-protect-pdf-files-with-passwords-complete-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/how-to-protect-pdf-files-with-passwords-complete-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="How to protect PDF files with passwords" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 77])

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.intro-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Two types -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.types-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.types-p1')</p>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.types-open-p')</p>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.types-permissions-p')</p>
                </section>

                <!-- Method 1 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-step1')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-step2')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-step3')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-step4')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-step5')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method1-note')</p>
                </section>

                <!-- Method 2 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-step1')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-step2')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-step3')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-step4')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-step5')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-step6')</li>
                    </ol>
                    <p class="text-gray">
                        {!! str_replace(
                            '__PDF_ENCRYPTION_LINK__',
                            '<a href="' . localized_route('blog_post68') . '" class="text-gradient fw-semibold">PDF encryption explained</a>',
                            __('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method2-note')
                        ) !!}
                    </p>
                </section>

                <!-- Method 3 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-intro')</p>
                    <ol class="text-gray">
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-step1')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-step2')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-step3')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-step4')</li>
                        <li>@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-step5')</li>
                    </ol>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method3-note')</p>
                </section>

                <!-- Method 4 -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method4-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method4-intro')</p>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method4-p1')</p>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.method4-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Strong password -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.strongpw-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.strongpw-p1')</p>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.strongpw-p2')</p>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.strongpw-p3')</p>
                </section>

                <!-- Sharing -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.sharing-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.sharing-p1')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__PDF_ENCRYPTION_LINK__', '__PDF_SECURITY_GUIDE_LINK__'],
                            [
                                '<a href="' . localized_route('blog_post68') . '" class="text-gradient fw-semibold">PDF encryption explained: 128-bit vs 256-bit AES</a>',
                                '<a href="' . localized_route('blog_post60') . '" class="text-gradient fw-semibold">PDF security guide</a>'
                            ],
                            __('how-to-protect-pdf-files-with-passwords-complete-guide-2026.conclusion-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq-heading')</h2>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq1-q')</h4>
                        <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq2-q')</h4>
                        <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq2-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq3-q')</h4>
                        <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq3-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq4-q')</h4>
                        <p class="text-gray">@lang('how-to-protect-pdf-files-with-passwords-complete-guide-2026.faq4-a')</p>
                    </div>
                </section>

                @include('components.author-bio-box', ['postId' => 77])
                @include('components.related-posts', ['postId' => 77])
            </article>
        </div>
    </div>
@endsection
