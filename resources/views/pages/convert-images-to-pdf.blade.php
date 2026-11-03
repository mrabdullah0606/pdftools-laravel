@extends('main')
@section('title', __('convert-images-to-pdf.title'))
@section('description', __('convert-images-to-pdf.description'))

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
                <h1 class="text-center">@lang('convert-images-to-pdf.main-heading')</h1>
                <img src="{{ asset('img/convert-images-to-pdf.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Convert Images to PDF">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                <header class="mb-4">
                    <h2>@lang('convert-images-to-pdf.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('convert-images-to-pdf.intro-para1')</p>
                    <p>@lang('convert-images-to-pdf.intro-para2')</p>
                    <p>
                        <a href="{{ localized_route('jpg-to-pdf') }}">@lang('convert-images-to-pdf.intro-para3-1')</a>
                        @lang('convert-images-to-pdf.intro-para3')
                    </p>
                    <p>
                        @lang('convert-images-to-pdf.intro-para4-1')
                        <a href="{{ localized_route('jpg-to-pdf') }}">@lang('convert-images-to-pdf.intro-para4-2')</a>
                        @lang('convert-images-to-pdf.intro-para4-3')
                    </p>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-images-to-pdf.how-works-heading')</h2>
                    <p>@lang('convert-images-to-pdf.how-works-para1')</p>
                    <p>@lang('convert-images-to-pdf.how-works-para2')</p>
                    <p>@lang('convert-images-to-pdf.how-works-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-images-to-pdf.step-by-step-heading')</h2>
                    <p>@lang('convert-images-to-pdf.step-by-step-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.step1-heading')</h3>
                        <p>@lang('convert-images-to-pdf.step1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.step2-heading')</h3>
                        <p>@lang('convert-images-to-pdf.step2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.step3-heading')</h3>
                        <p>@lang('convert-images-to-pdf.step3-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-images-to-pdf.best-tools-heading')</h2>
                    <p>
                        @lang('convert-images-to-pdf.best-tools-intro-1')
                        <a href="{{ localized_route('jpg-to-pdf') }}">@lang('convert-images-to-pdf.best-tools-intro')</a>
                    </p>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.tool1-heading')</h3>
                        <p>@lang('convert-images-to-pdf.tool1-para1')</p>
                        <p>@lang('convert-images-to-pdf.tool1-para2')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('convert-images-to-pdf.pros-heading')</h4>
                            <p>@lang('convert-images-to-pdf.tool1-pro1')</p>
                            <p>@lang('convert-images-to-pdf.tool1-pro2')</p>
                            <p>@lang('convert-images-to-pdf.tool1-pro3')</p>
                            
                            <h4>@lang('convert-images-to-pdf.cons-heading')</h4>
                            <p>@lang('convert-images-to-pdf.tool1-con1')</p>
                            <p>@lang('convert-images-to-pdf.tool1-con2')</p>
                            <p>@lang('convert-images-to-pdf.tool1-con3')</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.tool2-heading')</h3>
                        <p>@lang('convert-images-to-pdf.tool2-para1')</p>
                        <p>@lang('convert-images-to-pdf.tool2-para2')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('convert-images-to-pdf.pros-heading')</h4>
                            <p>@lang('convert-images-to-pdf.tool2-pro1')</p>
                            <p>@lang('convert-images-to-pdf.tool2-pro2')</p>
                            <p>@lang('convert-images-to-pdf.tool2-pro3')</p>
                            
                            <h4>@lang('convert-images-to-pdf.cons-heading')</h4>
                            <p>@lang('convert-images-to-pdf.tool2-con1')</p>
                            <p>@lang('convert-images-to-pdf.tool2-con2')</p>
                            <p>@lang('convert-images-to-pdf.tool2-con3')</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.tool3-heading')</h3>
                        <p>@lang('convert-images-to-pdf.tool3-para1')</p>
                        <p>@lang('convert-images-to-pdf.tool3-para2')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('convert-images-to-pdf.pros-heading')</h4>
                            <p>@lang('convert-images-to-pdf.tool3-pro1')</p>
                            <p>@lang('convert-images-to-pdf.tool3-pro2')</p>
                            <p>@lang('convert-images-to-pdf.tool3-pro3')</p>
                            
                            <h4>@lang('convert-images-to-pdf.cons-heading')</h4>
                            <p>@lang('convert-images-to-pdf.tool3-con1')</p>
                            <p>@lang('convert-images-to-pdf.tool3-con2')</p>
                            <p>@lang('convert-images-to-pdf.tool3-con3')</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <p>@lang('convert-images-to-pdf.comparison-intro')</p>
                        
                        <table class="comparison-table">
                            <thead>
                                <tr>
                                    <th>@lang('convert-images-to-pdf.table-header1')</th>
                                    <th>@lang('convert-images-to-pdf.table-header2')</th>
                                    <th>@lang('convert-images-to-pdf.table-header3')</th>
                                    <th>@lang('convert-images-to-pdf.table-header4')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('convert-images-to-pdf.table-row1-col1')</td>
                                    <td>@lang('convert-images-to-pdf.table-row1-col2')</td>
                                    <td>@lang('convert-images-to-pdf.table-row1-col3')</td>
                                    <td>@lang('convert-images-to-pdf.table-row1-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-images-to-pdf.table-row2-col1')</td>
                                    <td>@lang('convert-images-to-pdf.table-row2-col2')</td>
                                    <td>@lang('convert-images-to-pdf.table-row2-col3')</td>
                                    <td>@lang('convert-images-to-pdf.table-row2-col4')</td>
                                </tr>
                                <tr>
                                    <td>@lang('convert-images-to-pdf.table-row3-col1')</td>
                                    <td>@lang('convert-images-to-pdf.table-row3-col2')</td>
                                    <td>@lang('convert-images-to-pdf.table-row3-col3')</td>
                                    <td>@lang('convert-images-to-pdf.table-row3-col4')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-images-to-pdf.layout-options-heading')</h2>
                    <p>@lang('convert-images-to-pdf.layout-options-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.layout1-heading')</h3>
                        <p>@lang('convert-images-to-pdf.layout1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.layout2-heading')</h3>
                        <p>@lang('convert-images-to-pdf.layout2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.layout3-heading')</h3>
                        <p>@lang('convert-images-to-pdf.layout3-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('convert-images-to-pdf.layout4-heading')</h3>
                        <p>@lang('convert-images-to-pdf.layout4-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('convert-images-to-pdf.conclusion-heading')</h2>
                    <p>@lang('convert-images-to-pdf.conclusion-para1')</p>
                    <p>@lang('convert-images-to-pdf.conclusion-para2')</p>
                    <p>@lang('convert-images-to-pdf.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('convert-images-to-pdf.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-images-to-pdf.faq1-question')</h3>
                        <p>@lang('convert-images-to-pdf.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-images-to-pdf.faq2-question')</h3>
                        <p>@lang('convert-images-to-pdf.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-images-to-pdf.faq3-question')</h3>
                        <p>@lang('convert-images-to-pdf.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-images-to-pdf.faq4-question')</h3>
                        <p>@lang('convert-images-to-pdf.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('convert-images-to-pdf.faq5-question')</h3>
                        <p>@lang('convert-images-to-pdf.faq5-answer')</p>
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
    "name": "Which image formats are supported?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Most image-to-PDF tools support JPG, PNG, BMP, and TIFF formats. These formats cover photos, scans, and graphics from common devices. Users upload images from cameras, phones, and scanners without format issues. Support for popular formats ensures smooth conversion across different workflows."
    }
  },{
    "@type": "Question",
    "name": "Can I reorder images?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Image to PDF tools allow easy image reordering before final file creation. Users drag images into the preferred sequence within the preview screens. The correct order improves document flow and reading experience significantly. Reordering features help users avoid mistakes during document preparation."
    }
  },{
    "@type": "Question",
    "name": "Is image to PDF free?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Many image to PDF tools offer free conversion with basic features. Free versions often include limits on file size or usage frequency. Some platforms require payment for advanced editing or unlimited access. Users should review tool limits before choosing a free option."
    }
  },{
    "@type": "Question",
    "name": "Does PDF keep image quality?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "PDF files preserve image quality when tools use proper compression settings. High-resolution images maintain clarity during professional document sharing. Quality settings allow a balance between file size and visual sharpness. Reliable tools protect image details throughout the conversion process."
    }
  },{
    "@type": "Question",
    "name": "Can I convert images on mobile?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Image to PDF conversion works well on mobile devices through browsers. Many tools support Android and iOS systems without extra software. Mobile conversion helps users manage documents while traveling or working remotely. Cloud-based tools ensure smooth access across phones and tablets."
    }
  }]
}
</script>

@endverbatim
@endsection