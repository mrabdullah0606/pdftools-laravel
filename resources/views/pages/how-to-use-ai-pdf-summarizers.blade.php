@extends('main')
{{-- @section('meta_canonical', 'http://127.0.0.1:8000/compresspdf') --}}
@section('title', __('how-to-use-ai-pdf-summarizers.title'))
@section('description', __('how-to-use-ai-pdf-summarizers.descriptions'))

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
                <h1 class="text-center">@lang('how-to-use-ai-pdf-summarizers.main-heading')</h1>
                <img src="{{ asset('img/pdf-summarizer.jpeg') }}" class="img-fluid mt-3 mb-3" alt="AI PDF Summarizer">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 2])
                <header class="mb-4">
                    <h2>@lang('how-to-use-ai-pdf-summarizers.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('how-to-use-ai-pdf-summarizers.intro-para1')</p>
                    <p>{!! str_replace('__LINK__', localized_route('pdf.summerize'), __('how-to-use-ai-pdf-summarizers.intro-parag')) !!}</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers.what-is-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers.what-is-para1')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers.what-is-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers.benefits-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers.benefits-intro')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.benefit1-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.benefit1-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.benefit2-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.benefit2-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.benefit3-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.benefit3-text')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers.choose-tool-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('pdf.summerize'), __('how-to-use-ai-pdf-summarizers.choose-tool-intrg')) !!}</p>
                    
                    <ul>
                        <li>@lang('how-to-use-ai-pdf-summarizers.factor1')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.factor2')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.factor3')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.factor4')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.factor5')</li>
                    </ul>
                    
                    <p>@lang('how-to-use-ai-pdf-summarizers.best-tools-intro')</p>
                    
                    <ul>
                        <li>@lang('how-to-use-ai-pdf-summarizers.tool1')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.tool2')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.tool3')</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers.step-guide-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers.step-guide-intro')</p>
                    
                    <ul>
                        <li>@lang('how-to-use-ai-pdf-summarizers.step1')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.step2')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.step3')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.step4')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers.step5')</li>
                    </ul>
                    
                    <p>@lang('how-to-use-ai-pdf-summarizers.free-vs-paid-intro')</p>
                    
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('how-to-use-ai-pdf-summarizers.table-header1')</th>
                                    <th>@lang('how-to-use-ai-pdf-summarizers.table-header2')</th>
                                    <th>@lang('how-to-use-ai-pdf-summarizers.table-header3')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row1-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row1-col2')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row1-col3')</td>
                                </tr>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row2-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row2-col2')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row2-col3')</td>
                                </tr>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row3-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row3-col2')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row3-col3')</td>
                                </tr>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row4-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row4-col2')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers.row4-col3')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers.ai-vs-traditional-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers.ai-vs-traditional-para1')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers.ai-vs-traditional-para2')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers.ai-vs-traditional-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers.conclusion-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers.conclusion-text')</p>
                </section>

                <section class="mb-5 py-3 px-4 rounded-4 bg-light border border-light animate__animated animate__fadeInUp">
                    <h3 class="fw-bold mb-3">@lang('how-to-use-ai-pdf-summarizers.references-heading')</h3>
                    <ul class="list-unstyled mb-0 small text-secondary">
                        <li class="mb-2">
                            <span class="fw-semibold text-dark">@lang('how-to-use-ai-pdf-summarizers.ref1-title'):</span> @lang('how-to-use-ai-pdf-summarizers.ref1-text')
                            <a href="https://www.w3.org/standards/" target="_blank" rel="noopener" class="text-decoration-none ms-1">w3.org/standards</a>
                        </li>
                        <li class="mb-2">
                            <span class="fw-semibold text-dark">@lang('how-to-use-ai-pdf-summarizers.ref2-title'):</span> @lang('how-to-use-ai-pdf-summarizers.ref2-text')
                            <a href="https://www.pdfa.org" target="_blank" rel="noopener" class="text-decoration-none ms-1">pdfa.org</a>
                        </li>
                        <li class="mb-2">
                            <span class="fw-semibold text-dark">@lang('how-to-use-ai-pdf-summarizers.ref3-title'):</span> @lang('how-to-use-ai-pdf-summarizers.ref3-text')
                            <a href="https://dl.acm.org" target="_blank" rel="noopener" class="text-decoration-none ms-1">dl.acm.org</a>
                        </li>
                    </ul>
                </section>

                <section>
                    <h2>@lang('how-to-use-ai-pdf-summarizers.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.faq1-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.faq2-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.faq3-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.faq4-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers.faq5-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 2])
            @include('components.related-posts', ['postId' => 2])
</article>
        </div>
    </div>
@endsection