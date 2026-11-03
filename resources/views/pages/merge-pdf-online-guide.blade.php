@extends('main')
@section('title', __('merge-pdf-online-guide.title'))
@section('description', __('merge-pdf-online-guide.description'))

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

        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .comparison-table th,
        .comparison-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .comparison-table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .comparison-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
@endpush

@section('page')
    <div class="container my-5">
        <div class="row">
            <div class="col-7 mx-auto">
                <h1 class="text-center">@lang('merge-pdf-online-guide.main-heading')</h1>
                <img src="{{ asset('img/merge-pdf-online-guide.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Merge PDF Online">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 39])
                <header class="mb-4">
                    <h2>@lang('merge-pdf-online-guide.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('merge-pdf-online-guide.intro-para1')</p>
                    <p>@lang('merge-pdf-online-guide.intro-para2')</p>
                    <p>@lang('merge-pdf-online-guide.intro-para3')</p>
                    <p>
                        @lang('merge-pdf-online-guide.intro-para4-1')
                        <a href="{{localized_route('merge-pdf')}}">@lang('merge-pdf-online-guide.intro-para4-2')</a>
                        @lang('merge-pdf-online-guide.intro-para4-3')
                    </p>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-online-guide.how-works-heading')</h2>
                    <p>@lang('merge-pdf-online-guide.how-works-para1')</p>
                    <p>@lang('merge-pdf-online-guide.how-works-para2')</p>
                    <p>@lang('merge-pdf-online-guide.how-works-para3')</p>
                    <p>@lang('merge-pdf-online-guide.how-works-para4')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-online-guide.step-by-step-heading')</h2>
                    <p>
                        @lang('merge-pdf-online-guide.step-by-step-intro-1')
                        <a href="{{localized_route('merge-pdf')}}">@lang('merge-pdf-online-guide.step-by-step-intro')</a>
                    </p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.step1-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.step1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.step2-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.step2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.step3-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.step3-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-online-guide.best-tools-heading')</h2>
                    <p>@lang('merge-pdf-online-guide.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>
                            <a href="https://smallpdf.com/merge-pdf">@lang('merge-pdf-online-guide.tool1-heading')</a>
                        </h3>
                        <p>@lang('merge-pdf-online-guide.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-online-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool1-pro1')</li>
                                <li>@lang('merge-pdf-online-guide.tool1-pro2')</li>
                                <li>@lang('merge-pdf-online-guide.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-online-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool1-con1')</li>
                                <li>@lang('merge-pdf-online-guide.tool1-con2')</li>
                                <li>@lang('merge-pdf-online-guide.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>
                            <a href="https://www.sodapdf.com/pdf-tools/pdf-merge/">@lang('merge-pdf-online-guide.tool2-heading')</a>
                        </h3>
                        <p>@lang('merge-pdf-online-guide.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-online-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool2-pro1')</li>
                                <li>@lang('merge-pdf-online-guide.tool2-pro2')</li>
                                <li>@lang('merge-pdf-online-guide.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-online-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool2-con1')</li>
                                <li>@lang('merge-pdf-online-guide.tool2-con2')</li>
                                <li>@lang('merge-pdf-online-guide.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>
                            <a href="https://www.ilovepdf.com/merge_pdf">@lang('merge-pdf-online-guide.tool3-heading')</a>
                        </h3>
                        <p>@lang('merge-pdf-online-guide.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-online-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool3-pro1')</li>
                                <li>@lang('merge-pdf-online-guide.tool3-pro2')</li>
                                <li>@lang('merge-pdf-online-guide.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-online-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool3-con1')</li>
                                <li>@lang('merge-pdf-online-guide.tool3-con2')</li>
                                <li>@lang('merge-pdf-online-guide.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>
                            <a href="https://www.adobe.com/in/acrobat/online/merge-pdf">@lang('merge-pdf-online-guide.tool4-heading')</a>
                        </h3>
                        <p>@lang('merge-pdf-online-guide.tool4-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-online-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool4-pro1')</li>
                                <li>@lang('merge-pdf-online-guide.tool4-pro2')</li>
                                <li>@lang('merge-pdf-online-guide.tool4-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-online-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-online-guide.tool4-con1')</li>
                                <li>@lang('merge-pdf-online-guide.tool4-con2')</li>
                                <li>@lang('merge-pdf-online-guide.tool4-con3')</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p>@lang('merge-pdf-online-guide.comparison-intro')</p>
                        <div class="table-responsive">
                            <table class="comparison-table">
                                <thead>
                                    <tr>
                                        <th>@lang('merge-pdf-online-guide.table-col1')</th>
                                        <th>@lang('merge-pdf-online-guide.table-col2')</th>
                                        <th>@lang('merge-pdf-online-guide.table-col3')</th>
                                        <th>@lang('merge-pdf-online-guide.table-col4')</th>
                                        <th>@lang('merge-pdf-online-guide.table-col5')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('merge-pdf-online-guide.table-row1-col1')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row1-col2')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row1-col3')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row1-col4')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row1-col5')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('merge-pdf-online-guide.table-row2-col1')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row2-col2')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row2-col3')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row2-col4')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row2-col5')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('merge-pdf-online-guide.table-row3-col1')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row3-col2')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row3-col3')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row3-col4')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row3-col5')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('merge-pdf-online-guide.table-row4-col1')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row4-col2')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row4-col3')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row4-col4')</td>
                                        <td>@lang('merge-pdf-online-guide.table-row4-col5')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-online-guide.limitations-heading')</h2>
                    <p>@lang('merge-pdf-online-guide.limitations-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.limit1-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.limit1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.limit2-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.limit2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.limit3-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.limit3-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.limit4-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.limit4-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-online-guide.limit5-heading')</h3>
                        <p>@lang('merge-pdf-online-guide.limit5-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-online-guide.conclusion-heading')</h2>
                    <p>
                        <a href="{{ localized_route('merge-pdf') }}">@lang('merge-pdf-online-guide.conclusion-para1-1')</a>
                        @lang('merge-pdf-online-guide.conclusion-para1')
                    </p>
                    <p>@lang('merge-pdf-online-guide.conclusion-para2')</p>
                    <p>@lang('merge-pdf-online-guide.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('merge-pdf-online-guide.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-online-guide.faq1-question')</h3>
                        <p>@lang('merge-pdf-online-guide.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-online-guide.faq2-question')</h3>
                        <p>@lang('merge-pdf-online-guide.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-online-guide.faq3-question')</h3>
                        <p>@lang('merge-pdf-online-guide.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-online-guide.faq4-question')</h3>
                        <p>@lang('merge-pdf-online-guide.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-online-guide.faq5-question')</h3>
                        <p>@lang('merge-pdf-online-guide.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 39])
            @include('components.related-posts', ['postId' => 39])
</article>
        </div>
    </div>
@endsection


@section('schema')
@verbatim
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "Can I merge PDFs without signup?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Many online PDF merger tools allow file merging without signing up. Users can upload documents, combine them, and download the final file instantly. Signup is usually optional unless advanced features or large files are required."
    }
  },{
    "@type": "Question",
    "name": "Is PDF merging free?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Several online platforms provide PDF merging free of cost. Free versions allow combining multiple files quickly. Limitations may exist on file size, number of documents, or advanced editing options. Paid versions unlock extra features for frequent users."
    }
  },{
    "@type": "Question",
    "name": "Are merged PDFs editable?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Merged PDFs usually remain static and cannot be edited directly. Editing requires PDF editing software or online tools. Users can add text, images, or annotations after merging using compatible platforms."
    }
  },{
    "@type": "Question",
    "name": "Is it secure to use online PDF mergers?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Most reputable online PDF mergers ensure file security and privacy. Uploaded files are deleted automatically after processing. Avoid using unknown platforms with sensitive or confidential documents to prevent risks."
    }
  },{
    "@type": "Question",
    "name": "Can I reorder pages?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Online PDF merger tools generally allow users to reorder pages before combining. Users can drag and drop pages into the desired sequence. This feature ensures the final PDF maintains the correct order."
    }
  }]
}
</script>
@endverbatim
@endsection