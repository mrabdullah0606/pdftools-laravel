@extends('main')
{{-- @section('meta_canonical', 'http://127.0.0.1:8000/compresspdf') --}}
@section('title', __('how-to-use-ai-pdf-summarizers3.title'))
@section('description', __('how-to-use-ai-pdf-summarizers3.descriptions'))

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
            <div class="col-7 mx-auto">
                <h1 class="text-center">@lang('how-to-use-ai-pdf-summarizers3.main-heading')</h1>
                <img src="{{ asset('img/pdf-summarizer3.jpeg') }}" class="img-fluid mt-3 mb-3" alt="AI PDF Summarizer">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 4])
                <header class="mb-4">
                    <h2>@lang('how-to-use-ai-pdf-summarizers3.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('how-to-use-ai-pdf-summarizers3.intro-para1')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.intro-para2')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers3.top-tools-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.top-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.tool1-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool1-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool1-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.tool2-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool2-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool2-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.tool3-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool3-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool3-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.tool4-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool4-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool4-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.tool5-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool5-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.tool5-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers3.how-work-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.how-work-para1')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.how-work-para2')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.how-work-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers3.advantages-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.advantages-intro')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.advantage1-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.advantage1-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.advantage2-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.advantage2-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.advantage2-para2')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.advantage3-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.advantage3-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.advantage4-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.advantage4-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.advantage4-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers3.choose-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.choose-intro')</p>
                    
                    <ul>
                        <li><strong>@lang('how-to-use-ai-pdf-summarizers3.factor1-title')</strong> @lang('how-to-use-ai-pdf-summarizers3.factor1-text')</li>
                        <li><strong>@lang('how-to-use-ai-pdf-summarizers3.factor2-title')</strong> @lang('how-to-use-ai-pdf-summarizers3.factor2-text')</li>
                        <li><strong>@lang('how-to-use-ai-pdf-summarizers3.factor3-title')</strong> @lang('how-to-use-ai-pdf-summarizers3.factor3-text')</li>
                        <li><strong>@lang('how-to-use-ai-pdf-summarizers3.factor4-title')</strong> @lang('how-to-use-ai-pdf-summarizers3.factor4-text')</li>
                        <li><strong>@lang('how-to-use-ai-pdf-summarizers3.factor5-title')</strong> @lang('how-to-use-ai-pdf-summarizers3.factor5-text')</li>
                        <li><strong>@lang('how-to-use-ai-pdf-summarizers3.factor6-title')</strong> @lang('how-to-use-ai-pdf-summarizers3.factor6-text')</li>
                        <li><strong>@lang('how-to-use-ai-pdf-summarizers3.factor7-title')</strong> @lang('how-to-use-ai-pdf-summarizers3.factor7-text')</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers3.conclusion-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.conclusion-para1')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers3.conclusion-para2')</p>
                </section>

                <section>
                    <h2>@lang('how-to-use-ai-pdf-summarizers3.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.faq1-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.faq2-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.faq3-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.faq4-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers3.faq5-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers3.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 4])
            @include('components.related-posts', ['postId' => 4])
</article>
        </div>
    </div>
@endsection