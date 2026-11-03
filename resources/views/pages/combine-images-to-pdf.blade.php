@extends('main')
@section('title', __('combine-images-to-pdf.title'))
@section('description', __('combine-images-to-pdf.description'))

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
                <h1 class="text-center">@lang('combine-images-to-pdf.main-heading')</h1>
                <img src="{{ asset('img/combine-images-to-pdf.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Combine Images to PDF">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 15])
                <header class="mb-4">
                    <h2>@lang('combine-images-to-pdf.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('combine-images-to-pdf.intro-para1')</p>
                    <p>@lang('combine-images-to-pdf.intro-para2')</p>
                    <p>@lang('combine-images-to-pdf.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('combine-images-to-pdf.how-works-heading')</h2>
                    <p>@lang('combine-images-to-pdf.how-works-para1')</p>
                    <p>@lang('combine-images-to-pdf.how-works-para2')</p>
                    <p>@lang('combine-images-to-pdf.how-works-para3')</p>
                    <p>@lang('combine-images-to-pdf.how-works-para4')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('combine-images-to-pdf.step-by-step-heading')</h2>
                    <p>@lang('combine-images-to-pdf.step-by-step-intro')</p>
                    
                    <ul>
                        <li>@lang('combine-images-to-pdf.step1-text')</li>
                        <li>@lang('combine-images-to-pdf.step2-text')</li>
                        <li>@lang('combine-images-to-pdf.step3-text')</li>
                        <li>@lang('combine-images-to-pdf.step4-text')</li>
                        <li>@lang('combine-images-to-pdf.step5-text')</li>
                    </ul>
                    
                    <p>@lang('combine-images-to-pdf.step-by-step-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('combine-images-to-pdf.best-tools-heading')</h2>
                    <p>@lang('combine-images-to-pdf.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('combine-images-to-pdf.tool1-heading')</h3>
                        <p>@lang('combine-images-to-pdf.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('combine-images-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('combine-images-to-pdf.tool1-pro1')</li>
                                <li>@lang('combine-images-to-pdf.tool1-pro2')</li>
                                <li>@lang('combine-images-to-pdf.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('combine-images-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('combine-images-to-pdf.tool1-con1')</li>
                                <li>@lang('combine-images-to-pdf.tool1-con2')</li>
                                <li>@lang('combine-images-to-pdf.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('combine-images-to-pdf.tool2-heading')</h3>
                        <p>@lang('combine-images-to-pdf.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('combine-images-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('combine-images-to-pdf.tool2-pro1')</li>
                                <li>@lang('combine-images-to-pdf.tool2-pro2')</li>
                                <li>@lang('combine-images-to-pdf.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('combine-images-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('combine-images-to-pdf.tool2-con1')</li>
                                <li>@lang('combine-images-to-pdf.tool2-con2')</li>
                                <li>@lang('combine-images-to-pdf.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('combine-images-to-pdf.tool3-heading')</h3>
                        <p>@lang('combine-images-to-pdf.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('combine-images-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('combine-images-to-pdf.tool3-pro1')</li>
                                <li>@lang('combine-images-to-pdf.tool3-pro2')</li>
                                <li>@lang('combine-images-to-pdf.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('combine-images-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('combine-images-to-pdf.tool3-con1')</li>
                                <li>@lang('combine-images-to-pdf.tool3-con2')</li>
                                <li>@lang('combine-images-to-pdf.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('combine-images-to-pdf.tips-heading')</h2>
                    <p>@lang('combine-images-to-pdf.tips-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('combine-images-to-pdf.tip1-heading')</h3>
                        <p>@lang('combine-images-to-pdf.tip1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('combine-images-to-pdf.tip2-heading')</h3>
                        <p>@lang('combine-images-to-pdf.tip2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('combine-images-to-pdf.tip3-heading')</h3>
                        <p>@lang('combine-images-to-pdf.tip3-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('combine-images-to-pdf.conclusion-heading')</h2>
                    <p>@lang('combine-images-to-pdf.conclusion-para1')</p>
                    <p>@lang('combine-images-to-pdf.conclusion-para2')</p>
                    <p>@lang('combine-images-to-pdf.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('combine-images-to-pdf.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('combine-images-to-pdf.faq1-question')</h3>
                        <p>@lang('combine-images-to-pdf.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('combine-images-to-pdf.faq2-question')</h3>
                        <p>@lang('combine-images-to-pdf.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('combine-images-to-pdf.faq3-question')</h3>
                        <p>@lang('combine-images-to-pdf.faq3-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 15])
            @include('components.related-posts', ['postId' => 15])
</article>
        </div>
    </div>
@endsection