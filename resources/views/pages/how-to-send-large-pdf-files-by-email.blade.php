@extends('main')
@section('title', __('how-to-send-large-pdf-files-by-email.title'))
@section('description', __('how-to-send-large-pdf-files-by-email.description'))

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
    <div class="container my-5" >
        <div class="row">
            <div class="col-7 mx-auto text-center">
                <h1 class="text-center">@lang('how-to-send-large-pdf-files-by-email.main-heading')</h1>
                <img src="{{ asset('img/faster-pdf-workflow.jpeg') }}" class="img-fluid mt-3 mb-3 rounded-3" alt="send large pdf">
            </div>
        </div>
        
        <div class="card p-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 69])
                <header class="mb-4">
                    <h2>@lang('how-to-send-large-pdf-files-by-email.intro-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('how-to-send-large-pdf-files-by-email.intro-p1')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.intro-p2')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.intro-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('how-to-send-large-pdf-files-by-email.limits-heading')</h2>
                    <p>@lang('how-to-send-large-pdf-files-by-email.limits-p1')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.limits-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('how-to-send-large-pdf-files-by-email.solution1-heading')</h2>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution1-p1')</p>
                    <p>{!! str_replace('__LINK__', '<a href="' . localized_route('compress-pdf') . '" class="text-gradient fw-semibold">compress pdf</a>', __('how-to-send-large-pdf-files-by-email.solution1-p2')) !!}</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution1-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('how-to-send-large-pdf-files-by-email.solution2-heading')</h2>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution2-p1')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution2-p2')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution2-p3')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution2-p4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('how-to-send-large-pdf-files-by-email.solution3-heading')</h2>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution3-p1')</p>
                    <p>{!! str_replace('__LINK__', '<a href="' . localized_route('blog_post64') . '" class="text-gradient fw-semibold">PDF splitter</a>', __('how-to-send-large-pdf-files-by-email.solution3-p2')) !!}</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution3-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('how-to-send-large-pdf-files-by-email.solution4-heading')</h2>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution4-p1')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.solution4-p2')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('how-to-send-large-pdf-files-by-email.choice-heading')</h2>
                    <p>@lang('how-to-send-large-pdf-files-by-email.choice-p1')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.choice-p2')</p>
                    <p>@lang('how-to-send-large-pdf-files-by-email.choice-p3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('how-to-send-large-pdf-files-by-email.conclusion-heading')</h2>
                    <p>@lang('how-to-send-large-pdf-files-by-email.conclusion-p1')</p>
                    <p>{!! str_replace('__LINK__', '<a href="' . localized_route('blog_post70') . '" class="text-gradient fw-semibold">PDF workflow hacks for remote workers</a>', __('how-to-send-large-pdf-files-by-email.conclusion-p2')) !!}</p>
                </section>

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-2">@lang('how-to-send-large-pdf-files-by-email.faq-heading')</h2>
                    
                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('how-to-send-large-pdf-files-by-email.faq1-q')</h4>
                        <p>@lang('how-to-send-large-pdf-files-by-email.faq1-a')</p>
                    </div>

                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('how-to-send-large-pdf-files-by-email.faq2-q')</h4>
                        <p>@lang('how-to-send-large-pdf-files-by-email.faq2-a')</p>
                    </div>

                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('how-to-send-large-pdf-files-by-email.faq3-q')</h4>
                        <p>@lang('how-to-send-large-pdf-files-by-email.faq3-a')</p>
                    </div>

                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('how-to-send-large-pdf-files-by-email.faq4-q')</h4>
                        <p>@lang('how-to-send-large-pdf-files-by-email.faq4-a')</p>
                    </div>
                </section>
            
            @include('components.author-bio-box', ['postId' => 69])
            @include('components.related-posts', ['postId' => 69])
</article>
        </div>
    </div>
@endsection
