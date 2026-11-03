@extends('main')
@section('title', __('word-to-pdf-v2.title'))
@section('description', __('word-to-pdf-v2.description'))

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
            <div class="col-7 mx-auto text-center">
                <h1 class="text-center">@lang('word-to-pdf-v2.main-heading')</h1>
                <img src="{{ asset('img/word-to-pdf-guide.jpeg') }}" class="img-fluid mt-3 mb-3 rounded-3" alt="Word to PDF Guide">
            </div>
        </div>
        <div class="card p-5 mx-auto border-0 shadow-sm" style="max-width: 800px; border-radius: 16px;">
            <article>
                @include('components.author-byline', ['postId' => 20])
                <header class="mb-4">
                    <h2>@lang('word-to-pdf-v2.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('word-to-pdf-v2.intro-para1')</p>
                    <p>@lang('word-to-pdf-v2.intro-para2')</p>
                    <p>@lang('word-to-pdf-v2.intro-para3')</p>
                    <p>@lang('word-to-pdf-v2.intro-para4')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('word-to-pdf-v2.how-works-heading')</h2>
                    <p>@lang('word-to-pdf-v2.how-works-para1')</p>
                    <p>@lang('word-to-pdf-v2.how-works-para2')</p>
                    <p>@lang('word-to-pdf-v2.how-works-para3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('word-to-pdf-v2.step-by-step-heading')</h2>
                    <p>@lang('word-to-pdf-v2.step-by-step-intro')</p>
                    
                    <div class="mb-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.step1-heading')</h4>
                        <p>@lang('word-to-pdf-v2.step1-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.step2-heading')</h4>
                        <p>@lang('word-to-pdf-v2.step2-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.step3-heading')</h4>
                        <p>@lang('word-to-pdf-v2.step3-text')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('word-to-pdf-v2.best-tools-heading')</h2>
                    <p>@lang('word-to-pdf-v2.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3 class="fw-bold fs-4">@lang('word-to-pdf-v2.tool1-heading')</h3>
                        <p>@lang('word-to-pdf-v2.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h5 class="fw-bold text-dark">@lang('word-to-pdf-v2.pros-heading')</h5>
                            <ul>
                                <li>@lang('word-to-pdf-v2.tool1-pro1')</li>
                                <li>@lang('word-to-pdf-v2.tool1-pro2')</li>
                                <li>@lang('word-to-pdf-v2.tool1-pro3')</li>
                            </ul>
                            
                            <h5 class="fw-bold text-dark">@lang('word-to-pdf-v2.cons-heading')</h5>
                            <ul>
                                <li>@lang('word-to-pdf-v2.tool1-con1')</li>
                                <li>@lang('word-to-pdf-v2.tool1-con2')</li>
                                <li>@lang('word-to-pdf-v2.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="fw-bold fs-4">@lang('word-to-pdf-v2.tool2-heading')</h3>
                        <p>@lang('word-to-pdf-v2.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h5 class="fw-bold text-dark">@lang('word-to-pdf-v2.pros-heading')</h5>
                            <ul>
                                <li>@lang('word-to-pdf-v2.tool2-pro1')</li>
                                <li>@lang('word-to-pdf-v2.tool2-pro2')</li>
                                <li>@lang('word-to-pdf-v2.tool2-pro3')</li>
                            </ul>
                            
                            <h5 class="fw-bold text-dark">@lang('word-to-pdf-v2.cons-heading')</h5>
                            <ul>
                                <li>@lang('word-to-pdf-v2.tool2-con1')</li>
                                <li>@lang('word-to-pdf-v2.tool2-con2')</li>
                                <li>@lang('word-to-pdf-v2.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="fw-bold fs-4">@lang('word-to-pdf-v2.tool3-heading')</h3>
                        <p>@lang('word-to-pdf-v2.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h5 class="fw-bold text-dark">@lang('word-to-pdf-v2.pros-heading')</h5>
                            <ul>
                                <li>@lang('word-to-pdf-v2.tool3-pro1')</li>
                                <li>@lang('word-to-pdf-v2.tool3-pro2')</li>
                                <li>@lang('word-to-pdf-v2.tool3-pro3')</li>
                            </ul>
                            
                            <h5 class="fw-bold text-dark">@lang('word-to-pdf-v2.cons-heading')</h5>
                            <ul>
                                <li>@lang('word-to-pdf-v2.tool3-con1')</li>
                                <li>@lang('word-to-pdf-v2.tool3-con2')</li>
                                <li>@lang('word-to-pdf-v2.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">Comparison</h2>
                    <p>@lang('word-to-pdf-v2.comparison-intro')</p>
                    
                    <div class="table-responsive my-3">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('word-to-pdf-v2.table-tool')</th>
                                    <th>@lang('word-to-pdf-v2.table-ease-of-use')</th>
                                    <th>@lang('word-to-pdf-v2.table-cost')</th>
                                    <th>@lang('word-to-pdf-v2.table-best-use-case')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>@lang('word-to-pdf-v2.table-tool1')</strong></td>
                                    <td>@lang('word-to-pdf-v2.table-tool1-ease')</td>
                                    <td>@lang('word-to-pdf-v2.table-tool1-cost')</td>
                                    <td>@lang('word-to-pdf-v2.table-tool1-usecase')</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('word-to-pdf-v2.table-tool2')</strong></td>
                                    <td>@lang('word-to-pdf-v2.table-tool2-ease')</td>
                                    <td>@lang('word-to-pdf-v2.table-tool2-cost')</td>
                                    <td>@lang('word-to-pdf-v2.table-tool2-usecase')</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('word-to-pdf-v2.table-tool3')</strong></td>
                                    <td>@lang('word-to-pdf-v2.table-tool3-ease')</td>
                                    <td>@lang('word-to-pdf-v2.table-tool3-cost')</td>
                                    <td>@lang('word-to-pdf-v2.table-tool3-usecase')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul>
                        <li>@lang('word-to-pdf-v2.comparison-point1')</li>
                        <li>@lang('word-to-pdf-v2.comparison-point2')</li>
                        <li>@lang('word-to-pdf-v2.comparison-point3')</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('word-to-pdf-v2.when-use-heading')</h2>
                    <p>@lang('word-to-pdf-v2.when-use-intro')</p>
                    
                    <div class="mb-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.usecase1-heading')</h4>
                        <p>@lang('word-to-pdf-v2.usecase1-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.usecase2-heading')</h4>
                        <p>@lang('word-to-pdf-v2.usecase2-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.usecase3-heading')</h4>
                        <p>@lang('word-to-pdf-v2.usecase3-text')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('word-to-pdf-v2.security-heading')</h2>
                    <p>@lang('word-to-pdf-v2.security-para1')</p>
                    <p>@lang('word-to-pdf-v2.security-para2')</p>
                    <p>@lang('word-to-pdf-v2.security-para3')</p>
                </section>

                <section class="mb-5">
                    <h2 class="fw-bold">@lang('word-to-pdf-v2.conclusion-heading')</h2>
                    <p>@lang('word-to-pdf-v2.conclusion-para1')</p>
                </section>

                <section class="mb-4">
                    <h2 class="fw-bold border-bottom pb-2">@lang('word-to-pdf-v2.faq-heading')</h2>
                    
                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.faq1-q')</h4>
                        <p>@lang('word-to-pdf-v2.faq1-a')</p>
                    </div>

                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.faq2-q')</h4>
                        <p>@lang('word-to-pdf-v2.faq2-a')</p>
                    </div>

                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.faq3-q')</h4>
                        <p>@lang('word-to-pdf-v2.faq3-a')</p>
                    </div>

                    <div class="my-3">
                        <h4 class="fw-semibold text-dark">@lang('word-to-pdf-v2.faq4-q')</h4>
                        <p>@lang('word-to-pdf-v2.faq4-a')</p>
                    </div>
                </section>
            
            @include('components.author-bio-box', ['postId' => 20])
            @include('components.related-posts', ['postId' => 20])
</article>
        </div>
    </div>
@endsection
