@extends('main')
@section('title', __('convert-jpg-to-pdf.titles'))
@section('description', __('convert-jpg-to-pdf.descriptions'))

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
                <h1 class="text-center">@lang('convert-jpg-to-pdf.main-heading')</h1>
                <img src="{{ asset('img/convert-jpg-to-pdf.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Convert JPG to PDF">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                <header class="mb-4">
                    <h2>@lang('convert-jpg-to-pdf.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('convert-jpg-to-pdf.intro-para1')</p>
                    <p>
                        <a href="{{ localized_route('jpg-to-pdf')}}">@lang('convert-jpg-to-pdf.intro-para2-1')</a>
                        @lang('convert-jpg-to-pdf.intro-para2')
                    </p>
                    <p>@lang('convert-jpg-to-pdf.intro-para3')</p>

                    <p>
                        @lang('convert-jpg-to-pdf.intro-para4-1')
                        <a href="{{ localized_route('jpg-to-pdf')}}">@lang('convert-jpg-to-pdf.intro-para4-2')</a>
                        @lang('convert-jpg-to-pdf.intro-para4-3')
                    </p>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-jpg-to-pdf.how-works-heading')</h2>
                    <p>@lang('convert-jpg-to-pdf.how-works-para1')</p>
                    <p>@lang('convert-jpg-to-pdf.how-works-para2')</p>
                    <p>@lang('convert-jpg-to-pdf.how-works-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-jpg-to-pdf.step-by-step-heading')</h2>
                    <p>
                        @lang('convert-jpg-to-pdf.step-by-step-intro-1')
                        <a href="{{ localized_route('jpg-to-pdf')}}">@lang('convert-jpg-to-pdf.step-by-step-intro-2')</a>
                        @lang('convert-jpg-to-pdf.step-by-step-intro-3')
                    </p>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.step1-heading')</h3>
                        <p>@lang('convert-jpg-to-pdf.step1-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.step2-heading')</h3>
                        <p>@lang('convert-jpg-to-pdf.step2-text')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.step3-heading')</h3>
                        <p>@lang('convert-jpg-to-pdf.step3-text')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-jpg-to-pdf.best-tools-heading')</h2>
                    <p>@lang('convert-jpg-to-pdf.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>
                            <a href="https://www.adobe.com/acrobat/online/jpg-to-pdf.html">@lang('convert-jpg-to-pdf.tool1-heading')</a>
                            </h3>
                        <p>@lang('convert-jpg-to-pdf.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('convert-jpg-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('convert-jpg-to-pdf.tool1-pro1')</li>
                                <li>@lang('convert-jpg-to-pdf.tool1-pro2')</li>
                                <li>@lang('convert-jpg-to-pdf.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('convert-jpg-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('convert-jpg-to-pdf.tool1-con1')</li>
                                <li>@lang('convert-jpg-to-pdf.tool1-con2')</li>
                                <li>@lang('convert-jpg-to-pdf.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>
                            <a href="https://smallpdf.com/jpg-to-pdf">@lang('convert-jpg-to-pdf.tool2-heading')</a>
</h3>
                        <p>@lang('convert-jpg-to-pdf.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('convert-jpg-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('convert-jpg-to-pdf.tool2-pro1')</li>
                                <li>@lang('convert-jpg-to-pdf.tool2-pro2')</li>
                                <li>@lang('convert-jpg-to-pdf.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('convert-jpg-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('convert-jpg-to-pdf.tool2-con1')</li>
                                <li>@lang('convert-jpg-to-pdf.tool2-con2')</li>
                                <li>@lang('convert-jpg-to-pdf.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>
                            <a href="https://www.ilovepdf.com/jpg_to_pdf">@lang('convert-jpg-to-pdf.tool3-heading')</a>
                        </h3>
                        <p>@lang('convert-jpg-to-pdf.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('convert-jpg-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('convert-jpg-to-pdf.tool3-pro1')</li>
                                <li>@lang('convert-jpg-to-pdf.tool3-pro2')</li>
                                <li>@lang('convert-jpg-to-pdf.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('convert-jpg-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('convert-jpg-to-pdf.tool3-con1')</li>
                                <li>@lang('convert-jpg-to-pdf.tool3-con2')</li>
                                <li>@lang('convert-jpg-to-pdf.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <p>@lang('convert-jpg-to-pdf.comparison-intro')</p>
                        
                        <table class="comparison-table">
                            <thead>
                                <tr>
                                    <th>@lang('convert-jpg-to-pdf.table-header1')</th>
                                    <th>@lang('convert-jpg-to-pdf.table-header2')</th>
                                    <th>@lang('convert-jpg-to-pdf.table-header3')</th>
                                    <th>@lang('convert-jpg-to-pdf.table-header4')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row1-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row1-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row1-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row1-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row2-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row2-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row2-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row2-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row3-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row3-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row3-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row3-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row4-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row4-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row4-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row4-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row5-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row5-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row5-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row5-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row6-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row6-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row6-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row6-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row7-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row7-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row7-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row7-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-jpg-to-pdf.table-row8-col1')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row8-col2')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row8-col3')</td>
                                    <td>@lang('convert-jpg-to-pdf.table-row8-col4')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-jpg-to-pdf.when-useful-heading')</h2>
                    <p>@lang('convert-jpg-to-pdf.when-useful-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-jpg-to-pdf.usecase1-heading')</h3>
                        <p>@lang('convert-jpg-to-pdf.usecase1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-jpg-to-pdf.usecase2-heading')</h3>
                        <p>@lang('convert-jpg-to-pdf.usecase2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-jpg-to-pdf.usecase3-heading')</h3>
                        <p>@lang('convert-jpg-to-pdf.usecase3-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-jpg-to-pdf.conclusion-heading')</h2>
                    <p>@lang('convert-jpg-to-pdf.conclusion-para1')</p>
                    <p>
                        @lang('convert-jpg-to-pdf.conclusion-para2-1')
                        <a href="{{ localized_route('home')}}">@lang('convert-jpg-to-pdf.conclusion-para2-2')</a>
                        @lang('convert-jpg-to-pdf.conclusion-para2-3')
                    </p>
                    <p>@lang('convert-jpg-to-pdf.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('convert-jpg-to-pdf.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.faq1-question')</h3>
                        <p>@lang('convert-jpg-to-pdf.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.faq2-question')</h3>
                        <p>@lang('convert-jpg-to-pdf.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.faq3-question')</h3>
                        <p>@lang('convert-jpg-to-pdf.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.faq4-question')</h3>
                        <p>@lang('convert-jpg-to-pdf.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-jpg-to-pdf.faq5-question')</h3>
                        <p>@lang('convert-jpg-to-pdf.faq5-answer')</p>
                    </div>
                </section>

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
    "name": "Does JPG to PDF reduce quality?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "JPG to PDF conversion usually keeps image quality clear and readable. Good tools preserve resolution and color during the conversion process. Quality loss rarely occurs when users choose trusted and updated conversion software."
    }
  },{
    "@type": "Question",
    "name": "Can I combine multiple images?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Most JPG to PDF tools allow combining many images into one document. Users can control image order and page arrangement before final conversion. This feature helps create organized files from scattered image collections."
    }
  },{
    "@type": "Question",
    "name": "Is JPG to PDF free?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Many online JPG to PDF tools offer free conversion with basic features. Free versions may include limits on file size or daily usage. Premium plans unlock advanced options and faster processing speeds."
    }
  },{
    "@type": "Question",
    "name": "Can I adjust page size?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Most converters allow users to adjust page size and orientation easily. Options include A4 letter or custom dimensions for specific needs. These settings help improve printing results and document presentation quality."
    }
  },{
    "@type": "Question",
    "name": "Is it safe online?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Reputable JPG to PDF tools protect files using secure upload systems. Many conversion websites delete files automatically after conversion completes. Safety improves when users choose well-known platforms with clear privacy policies."
    }
  }]
}
</script>

@endverbatim
@endsection
