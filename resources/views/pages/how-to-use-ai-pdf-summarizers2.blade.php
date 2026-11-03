@extends('main')
{{-- @section('meta_canonical', 'http://127.0.0.1:8000/compresspdf') --}}
@section('title', __('how-to-use-ai-pdf-summarizers2.title'))
@section('description', __('how-to-use-ai-pdf-summarizers2.descriptions'))

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
                <h1 class="text-center">@lang('how-to-use-ai-pdf-summarizers2.main-heading')</h1>
                <img src="{{ asset('img/pdf-summarizer2.jpeg') }}" class="img-fluid mt-3 mb-3" alt="AI PDF Summarizer">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 3])
                <header class="mb-4">
                    <h2>@lang('how-to-use-ai-pdf-summarizers2.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('how-to-use-ai-pdf-summarizers2.intro-para1')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers2.intro-para2')</p>
                    <p>{!! str_replace('__LINK__', localized_route('pdf.summerize'), __('how-to-use-ai-pdf-summarizers2.intro-parag')) !!}</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers2.best-tools-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers2.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.tool1-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool1-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool1-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.tool2-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool2-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool2-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.tool3-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool3-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool3-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.tool4-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool4-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool4-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.tool5-heading')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool5-para1')</p>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.tool5-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers2.tips-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('pdf.summerize'), __('how-to-use-ai-pdf-summarizers2.tips-intrg')) !!}</p>
                    
                    <ul>
                        <li>@lang('how-to-use-ai-pdf-summarizers2.tip1')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers2.tip2')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers2.tip3')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers2.tip4')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers2.tip5')</li>
                        <li>@lang('how-to-use-ai-pdf-summarizers2.tip6')</li>
                    </ul>
                    
                    <p>@lang('how-to-use-ai-pdf-summarizers2.tips-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers2.comparison-heading')</h2>
                    
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('how-to-use-ai-pdf-summarizers2.table-header1')</th>
                                    <th>@lang('how-to-use-ai-pdf-summarizers2.table-header2')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row1-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row1-col2')</td>
                                </tr>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row2-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row2-col2')</td>
                                </tr>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row3-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row3-col2')</td>
                                </tr>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row4-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row4-col2')</td>
                                </tr>
                                <tr>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row5-col1')</td>
                                    <td>@lang('how-to-use-ai-pdf-summarizers2.row5-col2')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('how-to-use-ai-pdf-summarizers2.conclusion-heading')</h2>
                    <p>@lang('how-to-use-ai-pdf-summarizers2.conclusion-para1')</p>
                    <p>@lang('how-to-use-ai-pdf-summarizers2.conclusion-para2')</p>
                </section>

                <section>
                    <h2>@lang('how-to-use-ai-pdf-summarizers2.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.faq1-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.faq2-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.faq3-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.faq4-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('how-to-use-ai-pdf-summarizers2.faq5-question')</h3>
                        <p>@lang('how-to-use-ai-pdf-summarizers2.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 3])
            @include('components.related-posts', ['postId' => 3])
</article>
        </div>
    </div>
@endsection