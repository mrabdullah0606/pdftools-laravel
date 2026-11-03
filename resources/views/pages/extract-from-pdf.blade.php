@extends('main')
@section('title', __('extract-from-pdf.title'))
@section('description', __('extract-from-pdf.description'))

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
                <h1 class="text-center">@lang('extract-from-pdf.main-heading')</h1>
                <img src="{{ asset('img/extract-from-pdf.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Extract from PDF">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 18])
                <header class="mb-4">
                    <h2>@lang('extract-from-pdf.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('extract-from-pdf.intro-para1')</p>
                    <p>@lang('extract-from-pdf.intro-para2')</p>
                    <p>@lang('extract-from-pdf.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('extract-from-pdf.difference-heading')</h2>
                    <p>@lang('extract-from-pdf.difference-para1')</p>
                    <p>@lang('extract-from-pdf.difference-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('extract-from-pdf.extract-images-heading')</h2>
                    <p>@lang('extract-from-pdf.extract-images-intro')</p>
                    
                    <ol>
                        <li>@lang('extract-from-pdf.extract-images-step1')</li>
                        <li>@lang('extract-from-pdf.extract-images-step2')</li>
                        <li>@lang('extract-from-pdf.extract-images-step3')</li>
                        <li>@lang('extract-from-pdf.extract-images-step4')</li>
                        <li>@lang('extract-from-pdf.extract-images-step5')</li>
                        <li>@lang('extract-from-pdf.extract-images-step6')</li>
                        <li>@lang('extract-from-pdf.extract-images-step7')</li>
                    </ol>
                </section>

                <section class="mb-5">
                    <h2>@lang('extract-from-pdf.extract-text-heading')</h2>
                    <p>@lang('extract-from-pdf.extract-text-intro')</p>
                    
                    <ol>
                        <li>@lang('extract-from-pdf.extract-text-step1')</li>
                        <li>@lang('extract-from-pdf.extract-text-step2')</li>
                        <li>@lang('extract-from-pdf.extract-text-step3')</li>
                        <li>@lang('extract-from-pdf.extract-text-step4')</li>
                        <li>@lang('extract-from-pdf.extract-text-step5')</li>
                        <li>@lang('extract-from-pdf.extract-text-step6')</li>
                        <li>@lang('extract-from-pdf.extract-text-step7')</li>
                    </ol>
                </section>

                <section class="mb-5">
                    <h2>@lang('extract-from-pdf.best-tools-heading')</h2>
                    <p>@lang('extract-from-pdf.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('extract-from-pdf.tool1-heading')</h3>
                        <p>@lang('extract-from-pdf.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('extract-from-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('extract-from-pdf.tool1-pro1')</li>
                                <li>@lang('extract-from-pdf.tool1-pro2')</li>
                                <li>@lang('extract-from-pdf.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('extract-from-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('extract-from-pdf.tool1-con1')</li>
                                <li>@lang('extract-from-pdf.tool1-con2')</li>
                                <li>@lang('extract-from-pdf.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('extract-from-pdf.tool2-heading')</h3>
                        <p>@lang('extract-from-pdf.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('extract-from-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('extract-from-pdf.tool2-pro1')</li>
                                <li>@lang('extract-from-pdf.tool2-pro2')</li>
                                <li>@lang('extract-from-pdf.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('extract-from-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('extract-from-pdf.tool2-con1')</li>
                                <li>@lang('extract-from-pdf.tool2-con2')</li>
                                <li>@lang('extract-from-pdf.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('extract-from-pdf.tool3-heading')</h3>
                        <p>@lang('extract-from-pdf.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('extract-from-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('extract-from-pdf.tool3-pro1')</li>
                                <li>@lang('extract-from-pdf.tool3-pro2')</li>
                                <li>@lang('extract-from-pdf.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('extract-from-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('extract-from-pdf.tool3-con1')</li>
                                <li>@lang('extract-from-pdf.tool3-con2')</li>
                                <li>@lang('extract-from-pdf.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p>@lang('extract-from-pdf.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('extract-from-pdf.table-feature')</th>
                                        <th>@lang('extract-from-pdf.table-tool1')</th>
                                        <th>@lang('extract-from-pdf.table-tool2')</th>
                                        <th>@lang('extract-from-pdf.table-tool3')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('extract-from-pdf.table-cost')</td>
                                        <td>@lang('extract-from-pdf.table-cost-tool1')</td>
                                        <td>@lang('extract-from-pdf.table-cost-tool2')</td>
                                        <td>@lang('extract-from-pdf.table-cost-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('extract-from-pdf.table-ocr')</td>
                                        <td>@lang('extract-from-pdf.table-ocr-tool1')</td>
                                        <td>@lang('extract-from-pdf.table-ocr-tool2')</td>
                                        <td>@lang('extract-from-pdf.table-ocr-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('extract-from-pdf.table-ease')</td>
                                        <td>@lang('extract-from-pdf.table-ease-tool1')</td>
                                        <td>@lang('extract-from-pdf.table-ease-tool2')</td>
                                        <td>@lang('extract-from-pdf.table-ease-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('extract-from-pdf.table-platform')</td>
                                        <td>@lang('extract-from-pdf.table-platform-tool1')</td>
                                        <td>@lang('extract-from-pdf.table-platform-tool2')</td>
                                        <td>@lang('extract-from-pdf.table-platform-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('extract-from-pdf.table-handling')</td>
                                        <td>@lang('extract-from-pdf.table-handling-tool1')</td>
                                        <td>@lang('extract-from-pdf.table-handling-tool2')</td>
                                        <td>@lang('extract-from-pdf.table-handling-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('extract-from-pdf.table-usecase')</td>
                                        <td>@lang('extract-from-pdf.table-usecase-tool1')</td>
                                        <td>@lang('extract-from-pdf.table-usecase-tool2')</td>
                                        <td>@lang('extract-from-pdf.table-usecase-tool3')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('extract-from-pdf.conclusion-heading')</h2>
                    <p>@lang('extract-from-pdf.conclusion-para1')</p>
                    <p>@lang('extract-from-pdf.conclusion-para2')</p>
                    <p>@lang('extract-from-pdf.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('extract-from-pdf.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('extract-from-pdf.faq1-question')</h3>
                        <p>@lang('extract-from-pdf.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('extract-from-pdf.faq2-question')</h3>
                        <p>@lang('extract-from-pdf.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('extract-from-pdf.faq3-question')</h3>
                        <p>@lang('extract-from-pdf.faq3-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 18])
            @include('components.related-posts', ['postId' => 18])
</article>
        </div>
    </div>
@endsection