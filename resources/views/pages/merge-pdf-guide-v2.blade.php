@extends('main')
@section('title', __('merge-pdf-guide-v2.title1'))
@section('description', __('merge-pdf-guide-v2.descriptions'))

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
                <h1 class="text-center">@lang('merge-pdf-guide-v2.main-heading')</h1>
                <img src="{{ asset('img/merge-pdf-guide-v2.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Merge PDF Online Guide">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 10])
                <header class="mb-4">
                    <h2>@lang('merge-pdf-guide-v2.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('merge-pdf-guide-v2.intro-para1')</p>
                    <p>{!! str_replace('__LINK__', localized_route('merge-pdf'), __('merge-pdf-guide-v2.intro-parag')) !!}</p>
                    <p>@lang('merge-pdf-guide-v2.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide-v2.what-happens-heading')</h2>
                    <p>@lang('merge-pdf-guide-v2.what-happens-para1')</p>
                    <p>@lang('merge-pdf-guide-v2.what-happens-para2')</p>
                    <p>@lang('merge-pdf-guide-v2.what-happens-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide-v2.benefits-heading')</h2>
                    <p>@lang('merge-pdf-guide-v2.benefits-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide-v2.benefit1-heading')</h3>
                        <p>@lang('merge-pdf-guide-v2.benefit1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide-v2.benefit2-heading')</h3>
                        <p>@lang('merge-pdf-guide-v2.benefit2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide-v2.benefit3-heading')</h3>
                        <p>@lang('merge-pdf-guide-v2.benefit3-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide-v2.best-tools-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('merge-pdf'), __('merge-pdf-guide-v2.best-tools-introg')) !!}</p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide-v2.tool1-heading')</h3>
                        <p>@lang('merge-pdf-guide-v2.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool1-pro1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool1-pro2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool1-con1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool1-con2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide-v2.tool2-heading')</h3>
                        <p>@lang('merge-pdf-guide-v2.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool2-pro1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool2-pro2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool2-con1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool2-con2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide-v2.tool3-heading')</h3>
                        <p>@lang('merge-pdf-guide-v2.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool3-pro1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool3-pro2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool3-con1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool3-con2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide-v2.tool4-heading')</h3>
                        <p>@lang('merge-pdf-guide-v2.tool4-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide-v2.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool4-pro1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool4-pro2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool4-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide-v2.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide-v2.tool4-con1')</li>
                                <li>@lang('merge-pdf-guide-v2.tool4-con2')</li>
                                <li>@lang('merge-pdf-guide-v2.tool4-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p>@lang('merge-pdf-guide-v2.comparison-intro')</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('merge-pdf-guide-v2.table-tool')</th>
                                        <th>@lang('merge-pdf-guide-v2.table-pros')</th>
                                        <th>@lang('merge-pdf-guide-v2.table-cons')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>@lang('merge-pdf-guide-v2.table-tool1')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool1-pros')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool1-cons')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('merge-pdf-guide-v2.table-tool2')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool2-pros')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool2-cons')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('merge-pdf-guide-v2.table-tool3')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool3-pros')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool3-cons')</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('merge-pdf-guide-v2.table-tool4')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool4-pros')</td>
                                        <td>@lang('merge-pdf-guide-v2.table-tool4-cons')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide-v2.step-by-step-heading')</h2>
                    <p>@lang('merge-pdf-guide-v2.step-by-step-intro')</p>
                    
                    <ul>
                        <li>@lang('merge-pdf-guide-v2.step1-text')</li>
                        <li>@lang('merge-pdf-guide-v2.step2-text')</li>
                        <li>@lang('merge-pdf-guide-v2.step3-text')</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide-v2.free-vs-paid-heading')</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('merge-pdf-guide-v2.comparison-feature')</th>
                                    <th>@lang('merge-pdf-guide-v2.comparison-free')</th>
                                    <th>@lang('merge-pdf-guide-v2.comparison-paid')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('merge-pdf-guide-v2.comparison-daily-limits')</td>
                                    <td>@lang('merge-pdf-guide-v2.comparison-daily-limits-free')</td>
                                    <td>@lang('merge-pdf-guide-v2.comparison-daily-limits-paid')</td>
                                </tr>
                                <tr>
                                    <td>@lang('merge-pdf-guide-v2.comparison-security')</td>
                                    <td>@lang('merge-pdf-guide-v2.comparison-security-free')</td>
                                    <td>@lang('merge-pdf-guide-v2.comparison-security-paid')</td>
                                </tr>
                                <tr>
                                    <td>@lang('merge-pdf-guide-v2.comparison-file-size')</td>
                                    <td>@lang('merge-pdf-guide-v2.comparison-file-size-free')</td>
                                    <td>@lang('merge-pdf-guide-v2.comparison-file-size-paid')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide-v2.conclusion-heading')</h2>
                    <p>@lang('merge-pdf-guide-v2.conclusion-para1')</p>
                    <p>@lang('merge-pdf-guide-v2.conclusion-para2')</p>
                    <p>@lang('merge-pdf-guide-v2.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('merge-pdf-guide-v2.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide-v2.faq1-question')</h3>
                        <p>@lang('merge-pdf-guide-v2.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide-v2.faq2-question')</h3>
                        <p>@lang('merge-pdf-guide-v2.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide-v2.faq3-question')</h3>
                        <p>@lang('merge-pdf-guide-v2.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide-v2.faq4-question')</h3>
                        <p>@lang('merge-pdf-guide-v2.faq4-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 10])
            @include('components.related-posts', ['postId' => 10])
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
    "name": "Can I merge PDFs for free?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, many online tools allow users to merge PDFs for free with basic features. Free versions usually limit daily usage or file size, but remain useful for simple tasks."
    }
  },{
    "@type": "Question",
    "name": "Is there a limit on PDF merging?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Free PDF merging tools often restrict the number of files or pages per merge. Paid tools remove these limits and allow larger and more complex document combinations without interruptions."
    }
  },{
    "@type": "Question",
    "name": "Does merging affect quality?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "High-quality PDF mergers preserve fonts, images, and layout exactly as in the original files. Proper tools ensure content remains readable and visually consistent after merging."
    }
  },{
    "@type": "Question",
    "name": "Are online PDF mergers safe?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Reputable online PDF merging tools use encryption and automatic deletion to protect files. Users should avoid suspicious websites and check security policies before uploading sensitive documents."
    }
  }]
}
</script>
@endverbatim
@endsection