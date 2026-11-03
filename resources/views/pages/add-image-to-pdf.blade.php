@extends('main')
@section('title', __('add-image-to-pdf.title'))
@section('description', __('add-image-to-pdf.description'))

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
                <h1 class="text-center">@lang('add-image-to-pdf.main-heading')</h1>
                <img src="{{ asset('img/add-image-to-pdf.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Add Image to PDF">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 17])
                <header class="mb-4">
                    <h2>@lang('add-image-to-pdf.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('add-image-to-pdf.intro-para1')</p>
                    <p>@lang('add-image-to-pdf.intro-para2')</p>
                    <p>@lang('add-image-to-pdf.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('add-image-to-pdf.how-works-heading')</h2>
                    <p>@lang('add-image-to-pdf.how-works-para1')</p>
                    <p>@lang('add-image-to-pdf.how-works-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('add-image-to-pdf.step-by-step-heading')</h2>
                    <p>@lang('add-image-to-pdf.step-by-step-intro')</p>
                    
                    <p>@lang('add-image-to-pdf.step1-text')</p>
                    <p>@lang('add-image-to-pdf.step2-text')</p>
                    <p>@lang('add-image-to-pdf.step3-text')</p>
                    <p>@lang('add-image-to-pdf.step4-text')</p>
                    <p>@lang('add-image-to-pdf.step5-text')</p>
                    <p>@lang('add-image-to-pdf.step6-text')</p>
                    <p>@lang('add-image-to-pdf.step7-text')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('add-image-to-pdf.best-tools-heading')</h2>
                    <p>@lang('add-image-to-pdf.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('add-image-to-pdf.tool1-heading')</h3>
                        <p>@lang('add-image-to-pdf.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('add-image-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('add-image-to-pdf.tool1-pro1')</li>
                                <li>@lang('add-image-to-pdf.tool1-pro2')</li>
                                <li>@lang('add-image-to-pdf.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('add-image-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('add-image-to-pdf.tool1-con1')</li>
                                <li>@lang('add-image-to-pdf.tool1-con2')</li>
                                <li>@lang('add-image-to-pdf.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('add-image-to-pdf.tool2-heading')</h3>
                        <p>@lang('add-image-to-pdf.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('add-image-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('add-image-to-pdf.tool2-pro1')</li>
                                <li>@lang('add-image-to-pdf.tool2-pro2')</li>
                                <li>@lang('add-image-to-pdf.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('add-image-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('add-image-to-pdf.tool2-con1')</li>
                                <li>@lang('add-image-to-pdf.tool2-con2')</li>
                                <li>@lang('add-image-to-pdf.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('add-image-to-pdf.tool3-heading')</h3>
                        <p>@lang('add-image-to-pdf.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('add-image-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('add-image-to-pdf.tool3-pro1')</li>
                                <li>@lang('add-image-to-pdf.tool3-pro2')</li>
                                <li>@lang('add-image-to-pdf.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('add-image-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('add-image-to-pdf.tool3-con1')</li>
                                <li>@lang('add-image-to-pdf.tool3-con2')</li>
                                <li>@lang('add-image-to-pdf.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p>@lang('add-image-to-pdf.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('add-image-to-pdf.table-tool')</th>
                                        <th>@lang('add-image-to-pdf.table-strength')</th>
                                        <th>@lang('add-image-to-pdf.table-cost')</th>
                                        <th>@lang('add-image-to-pdf.table-usecase')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('add-image-to-pdf.table-tool1')</td>
                                        <td>@lang('add-image-to-pdf.table-tool1-strength')</td>
                                        <td>@lang('add-image-to-pdf.table-tool1-cost')</td>
                                        <td>@lang('add-image-to-pdf.table-tool1-usecase')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('add-image-to-pdf.table-tool2')</td>
                                        <td>@lang('add-image-to-pdf.table-tool2-strength')</td>
                                        <td>@lang('add-image-to-pdf.table-tool2-cost')</td>
                                        <td>@lang('add-image-to-pdf.table-tool2-usecase')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('add-image-to-pdf.table-tool3')</td>
                                        <td>@lang('add-image-to-pdf.table-tool3-strength')</td>
                                        <td>@lang('add-image-to-pdf.table-tool3-cost')</td>
                                        <td>@lang('add-image-to-pdf.table-tool3-usecase')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('add-image-to-pdf.common-issues-heading')</h2>
                    <p>@lang('add-image-to-pdf.common-issues-intro')</p>
                    
                    <ul>
                        <li>@lang('add-image-to-pdf.issue1-point1')</li>
                        <li>@lang('add-image-to-pdf.issue1-point2')</li>
                    </ul>
                    
                    <p>@lang('add-image-to-pdf.issue2-intro')</p>
                    <ul>
                        <li>@lang('add-image-to-pdf.issue2-point1')</li>
                        <li>@lang('add-image-to-pdf.issue2-point2')</li>
                    </ul>
                    
                    <p>@lang('add-image-to-pdf.common-issues-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('add-image-to-pdf.conclusion-heading')</h2>
                    <p>@lang('add-image-to-pdf.conclusion-para1')</p>
                    <p>@lang('add-image-to-pdf.conclusion-para2')</p>
                    <p>@lang('add-image-to-pdf.conclusion-para3')</p>
                    <p>@lang('add-image-to-pdf.conclusion-para4')</p>
                </section>

                <section>
                    <h2>@lang('add-image-to-pdf.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('add-image-to-pdf.faq1-question')</h3>
                        <p>@lang('add-image-to-pdf.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('add-image-to-pdf.faq2-question')</h3>
                        <p>@lang('add-image-to-pdf.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('add-image-to-pdf.faq3-question')</h3>
                        <p>@lang('add-image-to-pdf.faq3-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 17])
            @include('components.related-posts', ['postId' => 17])
</article>
        </div>
    </div>
@endsection