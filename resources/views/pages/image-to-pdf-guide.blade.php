@extends('main')
@section('title', __('image-to-pdf-guide.title'))
@section('description', __('image-to-pdf-guide.description'))

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
                <h1 class="text-center">@lang('image-to-pdf-guide.main-heading')</h1>
                <img src="{{ asset('img/image-to-pdf-guide.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Image to PDF Guide">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 11])
                <header class="mb-4">
                    <h2>@lang('image-to-pdf-guide.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('image-to-pdf-guide.intro-para1')</p>
                    <p>@lang('image-to-pdf-guide.intro-para2')</p>
                    <p>@lang('image-to-pdf-guide.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('image-to-pdf-guide.how-works-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('jpg-to-pdf'), __('image-to-pdf-guide.how-works-para1')) !!}</p>
                    <p>@lang('image-to-pdf-guide.how-works-para2')</p>
                    <p>@lang('image-to-pdf-guide.how-works-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('image-to-pdf-guide.benefits-heading')</h2>
                    <p>@lang('image-to-pdf-guide.benefits-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.benefit1-heading')</h3>
                        <p>@lang('image-to-pdf-guide.benefit1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.benefit2-heading')</h3>
                        <p>@lang('image-to-pdf-guide.benefit2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.benefit3-heading')</h3>
                        <p>@lang('image-to-pdf-guide.benefit3-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('image-to-pdf-guide.best-tools-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('jpg-to-pdf'), __('image-to-pdf-guide.best-tools-intro')) !!}</p>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.tool1-heading')</h3>
                        <p>@lang('image-to-pdf-guide.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('image-to-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool1-pro1')</li>
                                <li>@lang('image-to-pdf-guide.tool1-pro2')</li>
                                <li>@lang('image-to-pdf-guide.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('image-to-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool1-con1')</li>
                                <li>@lang('image-to-pdf-guide.tool1-con2')</li>
                                <li>@lang('image-to-pdf-guide.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.tool2-heading')</h3>
                        <p>@lang('image-to-pdf-guide.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('image-to-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool2-pro1')</li>
                                <li>@lang('image-to-pdf-guide.tool2-pro2')</li>
                                <li>@lang('image-to-pdf-guide.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('image-to-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool2-con1')</li>
                                <li>@lang('image-to-pdf-guide.tool2-con2')</li>
                                <li>@lang('image-to-pdf-guide.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.tool3-heading')</h3>
                        <p>@lang('image-to-pdf-guide.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('image-to-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool3-pro1')</li>
                                <li>@lang('image-to-pdf-guide.tool3-pro2')</li>
                                <li>@lang('image-to-pdf-guide.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('image-to-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool3-con1')</li>
                                <li>@lang('image-to-pdf-guide.tool3-con2')</li>
                                <li>@lang('image-to-pdf-guide.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.tool4-heading')</h3>
                        <p>@lang('image-to-pdf-guide.tool4-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('image-to-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool4-pro1')</li>
                                <li>@lang('image-to-pdf-guide.tool4-pro2')</li>
                                <li>@lang('image-to-pdf-guide.tool4-pro3')</li>
                            </ul>
                            
                            <h4>@lang('image-to-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('image-to-pdf-guide.tool4-con1')</li>
                                <li>@lang('image-to-pdf-guide.tool4-con2')</li>
                                <li>@lang('image-to-pdf-guide.tool4-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p>@lang('image-to-pdf-guide.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('image-to-pdf-guide.table-tool')</th>
                                        <th>@lang('image-to-pdf-guide.table-ease')</th>
                                        <th>@lang('image-to-pdf-guide.table-quality')</th>
                                        <th>@lang('image-to-pdf-guide.table-free')</th>
                                        <th>@lang('image-to-pdf-guide.table-advanced')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('image-to-pdf-guide.table-tool1')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool1-ease')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool1-quality')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool1-free')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool1-advanced')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('image-to-pdf-guide.table-tool2')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool2-ease')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool2-quality')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool2-free')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool2-advanced')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('image-to-pdf-guide.table-tool3')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool3-ease')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool3-quality')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool3-free')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool3-advanced')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('image-to-pdf-guide.table-tool4')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool4-ease')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool4-quality')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool4-free')</td>
                                        <td>@lang('image-to-pdf-guide.table-tool4-advanced')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('image-to-pdf-guide.step-by-step-heading')</h2>
                    <p>@lang('image-to-pdf-guide.step-by-step-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.step1-heading')</h3>
                        <p>@lang('image-to-pdf-guide.step1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.step2-heading')</h3>
                        <p>@lang('image-to-pdf-guide.step2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('image-to-pdf-guide.step3-heading')</h3>
                        <p>@lang('image-to-pdf-guide.step3-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('image-to-pdf-guide.conclusion-heading')</h2>
                    <p>@lang('image-to-pdf-guide.conclusion-para1')</p>
                    <p>@lang('image-to-pdf-guide.conclusion-para2')</p>
                    <p>@lang('image-to-pdf-guide.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('image-to-pdf-guide.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('image-to-pdf-guide.faq1-question')</h3>
                        <p>@lang('image-to-pdf-guide.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('image-to-pdf-guide.faq2-question')</h3>
                        <p>@lang('image-to-pdf-guide.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('image-to-pdf-guide.faq3-question')</h3>
                        <p>@lang('image-to-pdf-guide.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('image-to-pdf-guide.faq4-question')</h3>
                        <p>@lang('image-to-pdf-guide.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 11])
            @include('components.related-posts', ['postId' => 11])
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
    "name": "Can I convert JPG to PDF for free?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Many online tools allow free JPG to PDF conversion with basic limits today. Free versions usually restrict file size, usage frequency, or advanced editing features. Users can still create usable PDFs without payment for school work and personal needs."
    }
  },{
    "@type": "Question",
    "name": "Does image quality change after conversion?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Image quality usually stays stable when users select proper resolution settings during conversion. Most modern tools preserve clarity, color balance, and sharp text edges well today. Lower quality appears only if users intentionally reduce resolution for smaller files during export."
    }
  },{
    "@type": "Question",
    "name": "Can I combine multiple images into one PDF?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Many converters support combining several images into one organized PDF document quickly online. Users upload files, then arrange order before the final conversion step inside the tool. This feature helps create albums, reports, or scanned notes within single files for sharing."
    }
  },{
    "@type": "Question",
    "name": "What is the best image to PDF converter?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The best image to PDF converter depends on the needs, budget, and desired features today. Adobe Acrobat offers premium control, while Smallpdf and iLovePDF suit quick tasks online. Google Drive works well for workspace users who prefer simple integrated solutions for documents."
    }
  }]
}
</script>
@endverbatim
@endsection