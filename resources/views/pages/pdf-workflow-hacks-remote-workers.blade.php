@extends('main')
@section('title', __('pdf-workflow-hacks-remote-workers.title'))
@section('description', __('pdf-workflow-hacks-remote-workers.description'))

@push('head')
    <style>
        .text-gray {
            color: #666;
        }
        .blog-hack-card {
            border-left: 4px solid var(--primary);
            padding-left: 1.5rem;
            margin-bottom: 2rem;
        }
    </style>
@endpush

@section('page')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-9 col-lg-8 mx-auto text-center">
                <h1 class="text-center fw-bold display-5 mb-3">@lang('pdf-workflow-hacks-remote-workers.main-heading')</h1>
                <img src="{{ asset('img/pdf-workflow-hacks-remote-workers.png') }}" class="img-fluid mt-3 mb-4 rounded-3 shadow-sm" alt="10 PDF workflow hacks for remote workers" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
        </div>
        
        <div class="card p-4 p-md-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 70])
                <header class="mb-4">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-workflow-hacks-remote-workers.intro-heading')</h2>
                </header>

                <section class="mb-5">
                    <p class="text-gray lead">@lang('pdf-workflow-hacks-remote-workers.intro-p1')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.intro-p2')</p>
                </section>

                <hr class="my-4 text-light-gray">

                <!-- Hack 1 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack1-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack1-p1')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack1-p2')</p>
                </section>

                <!-- Hack 2 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack2-heading')</h3>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__COMPRESS_LINK__', '__MERGE_LINK__', '__WORD_LINK__'],
                            [
                                '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">compress PDF tool</a>',
                                '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>',
                                '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>'
                            ],
                            __('pdf-workflow-hacks-remote-workers.hack2-p1')
                        ) !!}
                    </p>
                </section>

                <!-- Hack 3 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack3-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack3-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__SPLITTER_LINK__',
                            '<a href="' . localized_route('blog_post64') . '" class="text-gradient fw-semibold">PDF splitter</a>',
                            __('pdf-workflow-hacks-remote-workers.hack3-p2')
                        ) !!}
                    </p>
                </section>

                <!-- Hack 4 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack4-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack4-p1')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack4-p2')</p>
                </section>

                <!-- Hack 5 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack5-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack5-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            '__WORD_LINK__',
                            '<a href="' . localized_route('pdf-to-word') . '" class="text-gradient fw-semibold">PDF to Word converter</a>',
                            __('pdf-workflow-hacks-remote-workers.hack5-p2')
                        ) !!}
                    </p>
                </section>

                <!-- Hack 6 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack6-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack6-p1')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack6-p2')</p>
                </section>

                <!-- Hack 7 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack7-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack7-p1')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack7-p2')</p>
                </section>

                <!-- Hack 8 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack8-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack8-p1')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack8-p2')</p>
                </section>

                <!-- Hack 9 -->
                <section class="blog-hack-card">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack9-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack9-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__COMPRESS_LINK__', '__EMAIL_LINK__'],
                            [
                                '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">compress tool</a>',
                                '<a href="' . localized_route('blog_post69') . '" class="text-gradient fw-semibold">our guide on sending large PDFs by email</a>'
                            ],
                            __('pdf-workflow-hacks-remote-workers.hack9-p2')
                        ) !!}
                    </p>
                </section>

                <!-- Hack 10 -->
                <section class="blog-hack-card mb-5">
                    <h3 class="fw-bold text-dark h4">@lang('pdf-workflow-hacks-remote-workers.hack10-heading')</h3>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack10-p1')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack10-p2')</p>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.hack10-p3')</p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- Conclusion -->
                <section class="mb-5">
                    <h2 class="fw-bold text-dark h3">@lang('pdf-workflow-hacks-remote-workers.conclusion-heading')</h2>
                    <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.conclusion-p1')</p>
                    <p class="text-gray">
                        {!! str_replace(
                            ['__COMPRESS_LINK__', '__SPLITTER_LINK__', '__MERGE_LINK__'],
                            [
                                '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">compress PDF tool</a>',
                                '<a href="' . localized_route('blog_post64') . '" class="text-gradient fw-semibold">split PDF tool</a>',
                                '<a href="' . localized_route('merge-pdf') . '" class="text-gradient fw-semibold">merge PDF tool</a>'
                            ],
                            __('pdf-workflow-hacks-remote-workers.conclusion-p2')
                        ) !!}
                    </p>
                </section>

                <hr class="my-5 text-light-gray">

                <!-- FAQs -->
                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-3 mb-4 text-dark h3">@lang('pdf-workflow-hacks-remote-workers.faq-heading')</h2>
                    
                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-workflow-hacks-remote-workers.faq1-q')</h4>
                        <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.faq1-a')</p>
                    </div>

                    <div class="my-4">
                        <h4 class="fw-semibold text-dark h5">@lang('pdf-workflow-hacks-remote-workers.faq2-q')</h4>
                        <p class="text-gray">@lang('pdf-workflow-hacks-remote-workers.faq2-a')</p>
                    </div>
                </section>
            
            @include('components.author-bio-box', ['postId' => 70])
            @include('components.related-posts', ['postId' => 70])
</article>
        </div>
    </div>
@endsection
