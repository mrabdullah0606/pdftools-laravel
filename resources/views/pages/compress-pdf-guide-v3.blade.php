@extends('main')
@section('title', __('compress-pdf-guide-v3.title'))
@section('description', __('compress-pdf-guide-v3.description'))

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
        
        .pros-cons-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
        
        @media (max-width: 768px) {
            .pros-cons-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('page')
    <div class="container my-5">
        <div class="row">
            <div class="col-7 mx-auto">
                <h1 class="text-center">@lang('compress-pdf-guide-v3.main-heading')</h1>
                <img src="{{ asset('img/compress-pdf-guide-v3.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Compress PDF File Size">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 900px;">
            <article>
                @include('components.author-byline', ['postId' => 21])
                <header class="mb-4">
                    <h2>@lang('compress-pdf-guide-v3.main-heading')</h2>
                </header>

                {{-- Introduction Section --}}
                <section class="mb-5">
                    <p>@lang('compress-pdf-guide-v3.intro-para1')</p>
                    <p>@lang('compress-pdf-guide-v3.intro-para2')</p>
                    <p>@lang('compress-pdf-guide-v3.intro-para3')</p>
                    <p>@lang('compress-pdf-guide-v3.intro-para4')</p>
                </section>

                {{-- How PDF Compression Works Section --}}
                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v3.how-works-heading')</h2>
                    <p>@lang('compress-pdf-guide-v3.how-works-para1')</p>
                    <p>@lang('compress-pdf-guide-v3.how-works-para2')</p>
                    <p>@lang('compress-pdf-guide-v3.how-works-para3')</p>
                </section>

                {{-- Step-by-Step Guide Section --}}
                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v3.step-by-step-heading')</h2>
                    <p>@lang('compress-pdf-guide-v3.step-by-step-intro')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.step1-heading')</h3>
                        <p>@lang('compress-pdf-guide-v3.step1-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.step2-heading')</h3>
                        <p>@lang('compress-pdf-guide-v3.step2-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.step3-heading')</h3>
                        <p>@lang('compress-pdf-guide-v3.step3-text')</p>
                    </div>
                </section>

                {{-- Best PDF Compression Tools Section --}}
                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v3.best-tools-heading')</h2>
                    <p>@lang('compress-pdf-guide-v3.best-tools-intro')</p>
                    
                    {{-- Tool 1: Adobe Acrobat --}}
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v3.tool1-heading')</h3>
                        <p>@lang('compress-pdf-guide-v3.tool1-para')</p>
                        
                        <div class="pros-cons-grid mt-3">
                            <div>
                                <h4>@lang('compress-pdf-guide-v3.pros-heading')</h4>
                                <ul>
                                    <li>@lang('compress-pdf-guide-v3.tool1-pro1')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool1-pro2')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool1-pro3')</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h4>@lang('compress-pdf-guide-v3.cons-heading')</h4>
                                <ul>
                                    <li>@lang('compress-pdf-guide-v3.tool1-con1')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool1-con2')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool1-con3')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Tool 2: iLovePDF --}}
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v3.tool2-heading')</h3>
                        <p>@lang('compress-pdf-guide-v3.tool2-para')</p>
                        
                        <div class="pros-cons-grid mt-3">
                            <div>
                                <h4>@lang('compress-pdf-guide-v3.pros-heading')</h4>
                                <ul>
                                    <li>@lang('compress-pdf-guide-v3.tool2-pro1')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool2-pro2')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool2-pro3')</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h4>@lang('compress-pdf-guide-v3.cons-heading')</h4>
                                <ul>
                                    <li>@lang('compress-pdf-guide-v3.tool2-con1')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool2-con2')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool2-con3')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Tool 3: Smallpdf --}}
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v3.tool3-heading')</h3>
                        <p>@lang('compress-pdf-guide-v3.tool3-para')</p>
                        
                        <div class="pros-cons-grid mt-3">
                            <div>
                                <h4>@lang('compress-pdf-guide-v3.pros-heading')</h4>
                                <ul>
                                    <li>@lang('compress-pdf-guide-v3.tool3-pro1')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool3-pro2')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool3-pro3')</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h4>@lang('compress-pdf-guide-v3.cons-heading')</h4>
                                <ul>
                                    <li>@lang('compress-pdf-guide-v3.tool3-con1')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool3-con2')</li>
                                    <li>@lang('compress-pdf-guide-v3.tool3-con3')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Comparison Table --}}
                    <div class="mt-4">
                        <p>@lang('compress-pdf-guide-v3.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('compress-pdf-guide-v3.table-tool-name')</th>
                                        <th>@lang('compress-pdf-guide-v3.table-ease-of-use')</th>
                                        <th>@lang('compress-pdf-guide-v3.table-free-version')</th>
                                        <th>@lang('compress-pdf-guide-v3.table-custom-settings')</th>
                                        <th>@lang('compress-pdf-guide-v3.table-best-for')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('compress-pdf-guide-v3.table-tool1-name')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool1-ease')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool1-free')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool1-settings')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool1-bestfor')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('compress-pdf-guide-v3.table-tool2-name')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool2-ease')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool2-free')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool2-settings')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool2-bestfor')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('compress-pdf-guide-v3.table-tool3-name')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool3-ease')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool3-free')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool3-settings')</td>
                                        <td>@lang('compress-pdf-guide-v3.table-tool3-bestfor')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                {{-- Quality vs File Size Section --}}
                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v3.quality-vs-size-heading')</h2>
                    <p>@lang('compress-pdf-guide-v3.quality-vs-size-para1')</p>
                    <p>@lang('compress-pdf-guide-v3.quality-vs-size-para2')</p>
                </section>

                {{-- Conclusion Section --}}
                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v3.conclusion-heading')</h2>
                    <p>@lang('compress-pdf-guide-v3.conclusion-para1')</p>
                    <p>@lang('compress-pdf-guide-v3.conclusion-para2')</p>
                    <p>@lang('compress-pdf-guide-v3.conclusion-para3')</p>
                </section>

                {{-- FAQs Section --}}
                <section>
                    <h2>@lang('compress-pdf-guide-v3.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.faq1-question')</h3>
                        <p>@lang('compress-pdf-guide-v3.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.faq2-question')</h3>
                        <p>@lang('compress-pdf-guide-v3.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.faq3-question')</h3>
                        <p>@lang('compress-pdf-guide-v3.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.faq4-question')</h3>
                        <p>@lang('compress-pdf-guide-v3.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v3.faq5-question')</h3>
                        <p>@lang('compress-pdf-guide-v3.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 21])
            @include('components.related-posts', ['postId' => 21])
</article>
        </div>
    </div>
@endsection