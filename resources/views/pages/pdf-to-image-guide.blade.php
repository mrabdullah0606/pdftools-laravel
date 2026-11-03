@extends('main')
@section('title', __('pdf-to-image-guide.title'))
@section('description', __('pdf-to-image-guide.description'))

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
                <h1 class="text-center">@lang('pdf-to-image-guide.main-heading')</h1>
                <img src="{{ asset('img/pdf-to-image-guide.jpeg') }}" class="img-fluid mt-3 mb-3" alt="PDF to Image Guide">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 16])
                <header class="mb-4">
                    <h2>@lang('pdf-to-image-guide.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('pdf-to-image-guide.intro-para1')</p>
                    <p>@lang('pdf-to-image-guide.intro-para2')</p>
                    <p>@lang('pdf-to-image-guide.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-image-guide.what-happens-heading')</h2>
                    <p>@lang('pdf-to-image-guide.what-happens-para1')</p>
                    <p>@lang('pdf-to-image-guide.what-happens-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-image-guide.best-tools-heading')</h2>
                    <p>@lang('pdf-to-image-guide.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-image-guide.tool1-heading')</h3>
                        <p>@lang('pdf-to-image-guide.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('pdf-to-image-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-image-guide.tool1-pro1')</li>
                                <li>@lang('pdf-to-image-guide.tool1-pro2')</li>
                                <li>@lang('pdf-to-image-guide.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('pdf-to-image-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-image-guide.tool1-con1')</li>
                                <li>@lang('pdf-to-image-guide.tool1-con2')</li>
                                <li>@lang('pdf-to-image-guide.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-image-guide.tool2-heading')</h3>
                        <p>@lang('pdf-to-image-guide.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('pdf-to-image-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-image-guide.tool2-pro1')</li>
                                <li>@lang('pdf-to-image-guide.tool2-pro2')</li>
                                <li>@lang('pdf-to-image-guide.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('pdf-to-image-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-image-guide.tool2-con1')</li>
                                <li>@lang('pdf-to-image-guide.tool2-con2')</li>
                                <li>@lang('pdf-to-image-guide.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('pdf-to-image-guide.tool3-heading')</h3>
                        <p>@lang('pdf-to-image-guide.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('pdf-to-image-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-image-guide.tool3-pro1')</li>
                                <li>@lang('pdf-to-image-guide.tool3-pro2')</li>
                                <li>@lang('pdf-to-image-guide.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('pdf-to-image-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('pdf-to-image-guide.tool3-con1')</li>
                                <li>@lang('pdf-to-image-guide.tool3-con2')</li>
                                <li>@lang('pdf-to-image-guide.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p>@lang('pdf-to-image-guide.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('pdf-to-image-guide.table-feature')</th>
                                        <th>@lang('pdf-to-image-guide.table-tool1')</th>
                                        <th>@lang('pdf-to-image-guide.table-tool2')</th>
                                        <th>@lang('pdf-to-image-guide.table-tool3')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('pdf-to-image-guide.table-free')</td>
                                        <td>@lang('pdf-to-image-guide.table-free-tool1')</td>
                                        <td>@lang('pdf-to-image-guide.table-free-tool2')</td>
                                        <td>@lang('pdf-to-image-guide.table-free-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('pdf-to-image-guide.table-formats')</td>
                                        <td>@lang('pdf-to-image-guide.table-formats-tool1')</td>
                                        <td>@lang('pdf-to-image-guide.table-formats-tool2')</td>
                                        <td>@lang('pdf-to-image-guide.table-formats-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('pdf-to-image-guide.table-account')</td>
                                        <td>@lang('pdf-to-image-guide.table-account-tool1')</td>
                                        <td>@lang('pdf-to-image-guide.table-account-tool2')</td>
                                        <td>@lang('pdf-to-image-guide.table-account-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('pdf-to-image-guide.table-quality')</td>
                                        <td>@lang('pdf-to-image-guide.table-quality-tool1')</td>
                                        <td>@lang('pdf-to-image-guide.table-quality-tool2')</td>
                                        <td>@lang('pdf-to-image-guide.table-quality-tool3')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('pdf-to-image-guide.table-device')</td>
                                        <td>@lang('pdf-to-image-guide.table-device-tool1')</td>
                                        <td>@lang('pdf-to-image-guide.table-device-tool2')</td>
                                        <td>@lang('pdf-to-image-guide.table-device-tool3')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-image-guide.step-by-step-heading')</h2>
                    <p>@lang('pdf-to-image-guide.step-by-step-intro')</p>
                    
                    <ol>
                        <li>@lang('pdf-to-image-guide.step1-text')</li>
                        <li>@lang('pdf-to-image-guide.step2-text')</li>
                        <li>@lang('pdf-to-image-guide.step3-text')</li>
                        <li>@lang('pdf-to-image-guide.step4-text')</li>
                        <li>@lang('pdf-to-image-guide.step5-text')</li>
                        <li>@lang('pdf-to-image-guide.step6-text')</li>
                        <li>@lang('pdf-to-image-guide.step7-text')</li>
                    </ol>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-image-guide.formats-heading')</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('pdf-to-image-guide.formats-table-format')</th>
                                    <th>@lang('pdf-to-image-guide.formats-table-characteristics')</th>
                                    <th>@lang('pdf-to-image-guide.formats-table-usecases')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('pdf-to-image-guide.format-jpg')</td>
                                    <td>@lang('pdf-to-image-guide.format-jpg-characteristics')</td>
                                    <td>@lang('pdf-to-image-guide.format-jpg-usecases')</td>
                                </tr>
                                <tr>
                                    <td>@lang('pdf-to-image-guide.format-png')</td>
                                    <td>@lang('pdf-to-image-guide.format-png-characteristics')</td>
                                    <td>@lang('pdf-to-image-guide.format-png-usecases')</td>
                                </tr>
                                <tr>
                                    <td>@lang('pdf-to-image-guide.format-tiff')</td>
                                    <td>@lang('pdf-to-image-guide.format-tiff-characteristics')</td>
                                    <td>@lang('pdf-to-image-guide.format-tiff-usecases')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-to-image-guide.conclusion-heading')</h2>
                    <p>@lang('pdf-to-image-guide.conclusion-para1')</p>
                    <p>@lang('pdf-to-image-guide.conclusion-para2')</p>
                    <p>@lang('pdf-to-image-guide.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('pdf-to-image-guide.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-image-guide.faq1-question')</h3>
                        <p>@lang('pdf-to-image-guide.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-image-guide.faq2-question')</h3>
                        <p>@lang('pdf-to-image-guide.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-to-image-guide.faq3-question')</h3>
                        <p>@lang('pdf-to-image-guide.faq3-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 16])
            @include('components.related-posts', ['postId' => 16])
</article>
        </div>
    </div>
@endsection