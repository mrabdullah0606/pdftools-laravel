@extends('main')
@section('title', __('pages-to-pdf-guide.title'))
@section('description', __('pages-to-pdf-guide.description'))

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
                <h1 class="text-center">@lang('pages-to-pdf-guide.main-heading')</h1>
                <img src="{{ asset('img/pages-to-pdf-guide.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Pages to PDF Converter">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 55])
                <header class="mb-4">
                    <h2>@lang('pages-to-pdf-guide.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.intro-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.intro-para1')</p>
                    <p>@lang('pages-to-pdf-guide.intro-para2')</p>
                    <p>@lang('pages-to-pdf-guide.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section1-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.section1-para1')</p>
                    <p>@lang('pages-to-pdf-guide.section1-para2')</p>
                    
                    <ul>
                        <li>@lang('pages-to-pdf-guide.section1-benefit1')</li>
                        <li>@lang('pages-to-pdf-guide.section1-benefit2')</li>
                        <li>@lang('pages-to-pdf-guide.section1-benefit3')</li>
                        <li>@lang('pages-to-pdf-guide.section1-benefit4')</li>
                    </ul>
                    
                    <p>@lang('pages-to-pdf-guide.section1-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section2-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.section2-para1')</p>
                    <p>@lang('pages-to-pdf-guide.section2-para2')</p>
                    
                    <ul>
                        <li>@lang('pages-to-pdf-guide.section2-benefit1')</li>
                        <li>@lang('pages-to-pdf-guide.section2-benefit2')</li>
                        <li>@lang('pages-to-pdf-guide.section2-benefit3')</li>
                        <li>@lang('pages-to-pdf-guide.section2-benefit4')</li>
                        <li>@lang('pages-to-pdf-guide.section2-benefit5')</li>
                    </ul>
                    
                    <p>@lang('pages-to-pdf-guide.section2-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section3-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.section3-para1')</p>
                    
                    <ul>
                        <li>@lang('pages-to-pdf-guide.section3-problem1')</li>
                        <li>@lang('pages-to-pdf-guide.section3-problem2')</li>
                        <li>@lang('pages-to-pdf-guide.section3-problem3')</li>
                        <li>@lang('pages-to-pdf-guide.section3-problem4')</li>
                    </ul>
                    
                    <p>@lang('pages-to-pdf-guide.section3-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section4-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.section4-para1')</p>
                    <p>@lang('pages-to-pdf-guide.section4-para2')</p>
                    
                    <ol>
                        <li>@lang('pages-to-pdf-guide.section4-step1')</li>
                        <li>@lang('pages-to-pdf-guide.section4-step2')</li>
                        <li>@lang('pages-to-pdf-guide.section4-step3')</li>
                        <li>@lang('pages-to-pdf-guide.section4-step4')</li>
                    </ol>
                    
                    <p>@lang('pages-to-pdf-guide.section4-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section5-heading')</h2>
                    <p>
                        @lang('pages-to-pdf-guide.section5-para1-1')
                        <a href="{{ localized_route('pages-to-pdf') }}">@lang('pages-to-pdf-guide.section5-para1-2')</a>
                        @lang('pages-to-pdf-guide.section5-para1-3')
                    </p>
                    <p>@lang('pages-to-pdf-guide.section5-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section6-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section6-sub1-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section6-sub1-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section6-sub2-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section6-sub2-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section6-sub3-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section6-sub3-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section6-sub4-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section6-sub4-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section6-sub5-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section6-sub5-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section7-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section7-sub1-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section7-sub1-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section7-sub2-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section7-sub2-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section7-sub3-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section7-sub3-para')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section7-sub4-heading')</h3>
                        <p>@lang('pages-to-pdf-guide.section7-sub4-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section8-heading')</h2>
                    <div class="table-responsive">
                        <table class="comparison-table">
                            <thead>
                                <tr>
                                    <th>@lang('pages-to-pdf-guide.table-col1')</th>
                                    <th>@lang('pages-to-pdf-guide.table-col2')</th>
                                    <th>@lang('pages-to-pdf-guide.table-col3')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('pages-to-pdf-guide.table-row1-col1')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row1-col2')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row1-col3')</td>
                                </tr>
                                <tr>
                                    <td>@lang('pages-to-pdf-guide.table-row2-col1')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row2-col2')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row2-col3')</td>
                                </tr>
                                <tr>
                                    <td>@lang('pages-to-pdf-guide.table-row3-col1')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row3-col2')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row3-col3')</td>
                                </tr>
                                <tr>
                                    <td>@lang('pages-to-pdf-guide.table-row4-col1')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row4-col2')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row4-col3')</td>
                                </tr>
                                <tr>
                                    <td>@lang('pages-to-pdf-guide.table-row5-col1')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row5-col2')</td>
                                    <td>@lang('pages-to-pdf-guide.table-row5-col3')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>@lang('pages-to-pdf-guide.section8-para')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section9-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.section9-para')</p>
                    
                    <ul>
                        <li>@lang('pages-to-pdf-guide.section9-practice1')</li>
                        <li>@lang('pages-to-pdf-guide.section9-practice2')</li>
                        <li>@lang('pages-to-pdf-guide.section9-practice3')</li>
                        <li>@lang('pages-to-pdf-guide.section9-practice4')</li>
                        <li>@lang('pages-to-pdf-guide.section9-practice5')</li>
                    </ul>
                    
                    <p>@lang('pages-to-pdf-guide.section9-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section10-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.section10-para')</p>
                    
                    <ul>
                        <li>@lang('pages-to-pdf-guide.section10-action1')</li>
                        <li>@lang('pages-to-pdf-guide.section10-action2')</li>
                        <li>@lang('pages-to-pdf-guide.section10-action3')</li>
                        <li>@lang('pages-to-pdf-guide.section10-action4')</li>
                    </ul>
                    
                    <p>@lang('pages-to-pdf-guide.section10-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section11-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.section11-para')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section11-tool1-heading')</h3>
                        <p>
                            <a href="{{ localized_route('compress-pdf') }}">@lang('pages-to-pdf-guide.section11-tool1-para-1')</a>
                            @lang('pages-to-pdf-guide.section11-tool1-para-2')
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section11-tool2-heading')</h3>
                        <p>
                            <a href="{{ localized_route('merge-pdf') }}">@lang('pages-to-pdf-guide.section11-tool2-para-1')</a>
                            @lang('pages-to-pdf-guide.section11-tool2-para-2')
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.section11-tool3-heading')</h3>
                        <p>
                            <a href="{{ localized_route('pdf-to-word') }}">@lang('pages-to-pdf-guide.section11-tool3-para-1')</a>
                            @lang('pages-to-pdf-guide.section11-tool3-para-2')
                        </p>
                    </div>
                    
                    <p>@lang('pages-to-pdf-guide.section11-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.section12-heading')</h2>
                    <p>
                        @lang('pages-to-pdf-guide.section12-para1-1')
                        <a href="https://www.adobe.com/">@lang('pages-to-pdf-guide.section12-para1-2')</a>
                        @lang('pages-to-pdf-guide.section12-para1-3')
                    </p>
                    <p>@lang('pages-to-pdf-guide.section12-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-to-pdf-guide.conclusion-heading')</h2>
                    <p>@lang('pages-to-pdf-guide.conclusion-para1')</p>
                    <p>@lang('pages-to-pdf-guide.conclusion-para2')</p>
                    <p>
                        @lang('pages-to-pdf-guide.conclusion-para3-1')
                        <a href="{{ localized_route('pages-to-pdf') }}">@lang('pages-to-pdf-guide.conclusion-para3-2')</a>
                        @lang('pages-to-pdf-guide.conclusion-para3-3')
                    </p>
                </section>

                <section>
                    <h2>@lang('pages-to-pdf-guide.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.faq1-question')</h3>
                        <p>@lang('pages-to-pdf-guide.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.faq2-question')</h3>
                        <p>@lang('pages-to-pdf-guide.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.faq3-question')</h3>
                        <p>@lang('pages-to-pdf-guide.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.faq4-question')</h3>
                        <p>@lang('pages-to-pdf-guide.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pages-to-pdf-guide.faq5-question')</h3>
                        <p>@lang('pages-to-pdf-guide.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 55])
            @include('components.related-posts', ['postId' => 55])
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
    "name": "Can I convert Pages to PDF without Apple software", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. Online tools allow conversion without installing Pages." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Will my formatting stay the same after conversion", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. Layout, fonts, and images are preserved in the PDF." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Is Pages to PDF conversion secure", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. Files are processed securely and removed automatically." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Can I convert Pages files on mobile", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. Online converters work on phones and tablets." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Is PDF better for sharing than Pages", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. PDF is universally supported and more professional." 
    } 
  }] 
} 
</script>
@endverbatim
@endsection