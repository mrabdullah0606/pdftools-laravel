@extends('main')
@section('title', __('pdf-to-word-guide-v2.title'))
@section('description', __('pdf-to-word-guide-v2.description'))

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
                <h1 class="text-center">@lang('pdf-to-word-guide-v2.main-heading')</h1>
                <img src="{{ asset('img/pdf-to-word-guide-v2.jpeg') }}" class="img-fluid mt-3 mb-3" alt="PDF to Word Guide">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 19])
                <header class="mb-4">
                    <h2>@lang('pdf-to-word-guide-v2.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('pdf-to-word-guide-v2.intro-para1')</p>
                    <p>@lang('pdf-to-word-guide-v2.intro-para2')</p>
                    <p>@lang('pdf-to-word-guide-v2.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-word-guide-v2.how-works-heading')</h2>
                    <p>@lang('pdf-to-word-guide-v2.how-works-para1')</p>
                    <p>@lang('pdf-to-word-guide-v2.how-works-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-word-guide-v2.step-by-step-heading')</h2>
                    <p>@lang('pdf-to-word-guide-v2.step-by-step-intro')</p>
                    
                    <ol>
                        <li>@lang('pdf-to-word-guide-v2.step1-text')</li>
                        <li>@lang('pdf-to-word-guide-v2.step2-text')</li>
                        <li>@lang('pdf-to-word-guide-v2.step3-text')</li>
                    </ol>
                    
                    <p>@lang('pdf-to-word-guide-v2.step-by-step-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-word-guide-v2.best-tools-heading')</h2>
                    <p>@lang('pdf-to-word-guide-v2.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-word-guide-v2.tool1-heading')</h3>
                        <p>@lang('pdf-to-word-guide-v2.tool1-para1')</p>
                        <p>@lang('pdf-to-word-guide-v2.tool1-para2')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('pdf-to-word-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool1-pro1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool1-pro2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('pdf-to-word-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool1-con1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool1-con2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-word-guide-v2.tool2-heading')</h3>
                        <p>@lang('pdf-to-word-guide-v2.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('pdf-to-word-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool2-pro1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool2-pro2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('pdf-to-word-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool2-con1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool2-con2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-word-guide-v2.tool3-heading')</h3>
                        <p>@lang('pdf-to-word-guide-v2.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('pdf-to-word-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool3-pro1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool3-pro2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('pdf-to-word-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool3-con1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool3-con2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-word-guide-v2.tool4-heading')</h3>
                        <p>@lang('pdf-to-word-guide-v2.tool4-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('pdf-to-word-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool4-pro1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool4-pro2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool4-pro3')</li>
                            </ul>
                            
                            <h4>@lang('pdf-to-word-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-word-guide-v2.tool4-con1')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool4-con2')</li>
                                <li>@lang('pdf-to-word-guide-v2.tool4-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p>@lang('pdf-to-word-guide-v2.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('pdf-to-word-guide-v2.table-tool')</th>
                                        <th>@lang('pdf-to-word-guide-v2.table-free')</th>
                                        <th>@lang('pdf-to-word-guide-v2.table-ocr')</th>
                                        <th>@lang('pdf-to-word-guide-v2.table-ease')</th>
                                        <th>@lang('pdf-to-word-guide-v2.table-feature')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool1')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool1-free')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool1-ocr')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool1-ease')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool1-feature')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool2')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool2-free')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool2-ocr')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool2-ease')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool2-feature')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool3')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool3-free')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool3-ocr')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool3-ease')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool3-feature')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool4')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool4-free')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool4-ocr')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool4-ease')</td>
                                        <td>@lang('pdf-to-word-guide-v2.table-tool4-feature')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-word-guide-v2.common-issues-heading')</h2>
                    <p>@lang('pdf-to-word-guide-v2.common-issues-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-word-guide-v2.issue1-heading')</h3>
                        <p>@lang('pdf-to-word-guide-v2.issue1-para1')</p>
                        <p>@lang('pdf-to-word-guide-v2.issue1-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-word-guide-v2.issue2-heading')</h3>
                        <p>@lang('pdf-to-word-guide-v2.issue2-para1')</p>
                        <p>@lang('pdf-to-word-guide-v2.issue2-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-word-guide-v2.issue3-heading')</h3>
                        <p>@lang('pdf-to-word-guide-v2.issue3-para1')</p>
                        <p>@lang('pdf-to-word-guide-v2.issue3-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-word-guide-v2.conclusion-heading')</h2>
                    <p>@lang('pdf-to-word-guide-v2.conclusion-para1')</p>
                    <p>@lang('pdf-to-word-guide-v2.conclusion-para2')</p>
                    <p>@lang('pdf-to-word-guide-v2.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('pdf-to-word-guide-v2.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-word-guide-v2.faq1-question')</h3>
                        <p>@lang('pdf-to-word-guide-v2.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-word-guide-v2.faq2-question')</h3>
                        <p>@lang('pdf-to-word-guide-v2.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-word-guide-v2.faq3-question')</h3>
                        <p>@lang('pdf-to-word-guide-v2.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-word-guide-v2.faq4-question')</h3>
                        <p>@lang('pdf-to-word-guide-v2.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-word-guide-v2.faq5-question')</h3>
                        <p>@lang('pdf-to-word-guide-v2.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 19])
            @include('components.related-posts', ['postId' => 19])
</article>
        </div>
    </div>
@endsection