@extends('main')
@section('title', __('pdf-security-password-protection-guide-2026.title'))
@section('description', __('pdf-security-password-protection-guide-2026.description'))

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
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-security-password-protection-guide-2026.main-heading')</h1>
                <img src="{{ asset('img/pdf-security-password-protection-guide-2026.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="PDF security and password protection guide" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 81])

                <section class="mb-5">
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.intro-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.intro-p3')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.why-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.why-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.why-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.why-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.levels-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.levels-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.levels-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.levels-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.userpw-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.userpw-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.userpw-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.userpw-p3')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.userpw-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.ownerpw-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.ownerpw-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.ownerpw-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.ownerpw-p3')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.ownerpw-p4')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.encryption-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.encryption-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.encryption-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.encryption-p3')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__ENCRYPTION_GUIDE_LINK__',
                            '<a href="' . localized_route('blog_post68') . '" class="text-gradient fw-semibold">PDF encryption guide</a>',
                            __('pdf-security-password-protection-guide-2026.encryption-p4')
                        ) !!}
                    </p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.bestpractices-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.bestpractices-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.bestpractices-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.bestpractices-p3')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.bestpractices-p4')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.bestpractices-p5')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">Word format</a>',
                            __('pdf-security-password-protection-guide-2026.bestpractices-p6')
                        ) !!}
                    </p>
                </section>

                <hr class="my-4 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.mistakes-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.mistakes-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.mistakes-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.mistakes-p3')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.mistakes-p4')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.mistakes-p5')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.compliance-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.compliance-p1')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.compliance-p2')</p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.compliance-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-security-password-protection-guide-2026.conclusion-heading')</h2>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__COMPRESS_LINK__',
                            '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">document compression</a>',
                            __('pdf-security-password-protection-guide-2026.conclusion-p2')
                        ) !!}
                    </p>
                    <p class="text-gray">@lang('pdf-security-password-protection-guide-2026.conclusion-p3')</p>
                </section>

                @include('components.author-bio-box', ['postId' => 81])
                @include('components.related-posts', ['postId' => 81])
            </article>
        </div>
    </div>
@endsection
