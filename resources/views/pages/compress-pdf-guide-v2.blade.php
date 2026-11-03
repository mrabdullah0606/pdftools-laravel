@extends('main')
@section('title', __('compress-pdf-guide-v2.title'))
@section('description', __('compress-pdf-guide-v2.description'))

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
                <h1 class="text-center">@lang('compress-pdf-guide-v2.main-heading')</h1>
                <img src="{{ asset('img/compress-pdf-guide.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Compress PDF Guide">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 9])
                <header class="mb-4">
                    <h2>@lang('compress-pdf-guide-v2.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('compress-pdf-guide-v2.intro-para1')</p>
                    <p>@lang('compress-pdf-guide-v2.intro-para2')</p>
                    <p>{!! str_replace('__LINK__', localized_route('compress-pdf'), __('compress-pdf-guide-v2.intro-parag')) !!}</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v2.how-works-heading')</h2>
                    <p>@lang('compress-pdf-guide-v2.how-works-para1')</p>
                    <p>@lang('compress-pdf-guide-v2.how-works-para2')</p>
                    <p>{!! str_replace('__LINK__', localized_route('compress-pdf'), __('compress-pdf-guide-v2.how-works-parag')) !!}</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v2.benefits-heading')</h2>
                    <p>@lang('compress-pdf-guide-v2.benefits-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v2.benefit1-heading')</h3>
                        <p>@lang('compress-pdf-guide-v2.benefit1-para1')</p>
                        <p>@lang('compress-pdf-guide-v2.benefit1-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v2.benefit2-heading')</h3>
                        <p>@lang('compress-pdf-guide-v2.benefit2-para1')</p>
                        <p>@lang('compress-pdf-guide-v2.benefit2-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v2.benefit3-heading')</h3>
                        <p>@lang('compress-pdf-guide-v2.benefit3-para1')</p>
                        <p>@lang('compress-pdf-guide-v2.benefit3-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v2.best-tools-heading')</h2>
                    <p>@lang('compress-pdf-guide-v2.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v2.tool1-heading')</h3>
                        <p>@lang('compress-pdf-guide-v2.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('compress-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool1-pro1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool1-pro2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('compress-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool1-con1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool1-con2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v2.tool2-heading')</h3>
                        <p>@lang('compress-pdf-guide-v2.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('compress-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool2-pro1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool2-pro2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('compress-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool2-con1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool2-con2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v2.tool3-heading')</h3>
                        <p>@lang('compress-pdf-guide-v2.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('compress-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool3-pro1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool3-pro2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('compress-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool3-con1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool3-con2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('compress-pdf-guide-v2.tool4-heading')</h3>
                        <p>@lang('compress-pdf-guide-v2.tool4-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('compress-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool4-pro1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool4-pro2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool4-pro3')</li>
                            </ul>
                            
                            <h4>@lang('compress-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('compress-pdf-guide-v2.tool4-con1')</li>
                                <li>@lang('compress-pdf-guide-v2.tool4-con2')</li>
                                <li>@lang('compress-pdf-guide-v2.tool4-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p>@lang('compress-pdf-guide-v2.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('compress-pdf-guide-v2.table-tool')</th>
                                        <th>@lang('compress-pdf-guide-v2.table-ease')</th>
                                        <th>@lang('compress-pdf-guide-v2.table-free')</th>
                                        <th>@lang('compress-pdf-guide-v2.table-custom')</th>
                                        <th>@lang('compress-pdf-guide-v2.table-best')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('compress-pdf-guide-v2.table-tool1')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool1-ease')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool1-free')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool1-custom')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool1-best')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('compress-pdf-guide-v2.table-tool2')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool2-ease')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool2-free')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool2-custom')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool2-best')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('compress-pdf-guide-v2.table-tool3')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool3-ease')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool3-free')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool3-custom')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool3-best')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('compress-pdf-guide-v2.table-tool4')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool4-ease')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool4-free')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool4-custom')</td>
                                        <td>@lang('compress-pdf-guide-v2.table-tool4-best')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v2.step-by-step-heading')</h2>
                    <p>@lang('compress-pdf-guide-v2.step-by-step-intro')</p>
                    
                    <ul>
                        <li>@lang('compress-pdf-guide-v2.step1-text')</li>
                        <li>@lang('compress-pdf-guide-v2.step2-text')</li>
                        <li>@lang('compress-pdf-guide-v2.step3-text')</li>
                        <li>@lang('compress-pdf-guide-v2.step4-text')</li>
                        <li>@lang('compress-pdf-guide-v2.step5-text')</li>
                        <li>@lang('compress-pdf-guide-v2.step6-text')</li>
                        <li>@lang('compress-pdf-guide-v2.step7-text')</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v2.free-vs-paid-heading')</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('compress-pdf-guide-v2.comparison-feature')</th>
                                    <th>@lang('compress-pdf-guide-v2.comparison-free')</th>
                                    <th>@lang('compress-pdf-guide-v2.comparison-paid')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('compress-pdf-guide-v2.comparison-quality')</td>
                                    <td>@lang('compress-pdf-guide-v2.comparison-quality-free')</td>
                                    <td>@lang('compress-pdf-guide-v2.comparison-quality-paid')</td>
                                </tr>
                                <tr>
                                    <td>@lang('compress-pdf-guide-v2.comparison-limits')</td>
                                    <td>@lang('compress-pdf-guide-v2.comparison-limits-free')</td>
                                    <td>@lang('compress-pdf-guide-v2.comparison-limits-paid')</td>
                                </tr>
                                <tr>
                                    <td>@lang('compress-pdf-guide-v2.comparison-ads')</td>
                                    <td>@lang('compress-pdf-guide-v2.comparison-ads-free')</td>
                                    <td>@lang('compress-pdf-guide-v2.comparison-ads-paid')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('compress-pdf-guide-v2.conclusion-heading')</h2>
                    <p>@lang('compress-pdf-guide-v2.conclusion-para1')</p>
                    <p>@lang('compress-pdf-guide-v2.conclusion-para2')</p>
                    <p>@lang('compress-pdf-guide-v2.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('compress-pdf-guide-v2.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v2.faq1-question')</h3>
                        <p>@lang('compress-pdf-guide-v2.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v2.faq2-question')</h3>
                        <p>@lang('compress-pdf-guide-v2.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v2.faq3-question')</h3>
                        <p>@lang('compress-pdf-guide-v2.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('compress-pdf-guide-v2.faq4-question')</h3>
                        <p>@lang('compress-pdf-guide-v2.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 9])
            @include('components.related-posts', ['postId' => 9])
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
    "name": "Does PDF compression reduce quality?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "PDF compression may slightly reduce image detail, but smart tools preserve readability and layout quality. Proper settings balance size reduction and visual clarity, especially for documents viewed on phones and standard screens."
    }
  },{
    "@type": "Question",
    "name": "What is the best free PDF compressor?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Smallpdf and iLovePDF rank among the best free PDF compressors due to ease of use. Toolspy also works well for quick compression needs with clear limits and simple controls."
    }
  },{
    "@type": "Question",
    "name": "How much can I compress a PDF?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The compression amount depends on the image's resolution and the metadata size inside the document. Many tools reduce file size by 30% to 70% without noticeable quality loss."
    }
  },{
    "@type": "Question",
    "name": "Is Adobe PDF compression worth it?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Adobe PDF compression suits professional users needing strong quality control and large file support. Paid features justify cost when frequent compression editing and secure workflows matter."
    }
  }]
}
</script>
@endverbatim
@endsection