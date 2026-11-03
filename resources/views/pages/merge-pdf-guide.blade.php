@extends('main')
@section('title', __('merge-pdf-guide.title'))
@section('description', __('merge-pdf-guide.descriptions'))

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
                <h1 class="text-center">@lang('merge-pdf-guide.main-heading')</h1>
                <img src="{{ asset('img/merge-pdf-guide.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Merge PDF Guide">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 7])
                <header class="mb-4">
                    <h2>@lang('merge-pdf-guide.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('merge-pdf-guide.intro-para1')</p>
                    <p>{!! str_replace('__LINK__', localized_route('merge-pdf'), __('merge-pdf-guide.intro-para2')) !!}</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.what-happens-heading')</h2>
                    <p>@lang('merge-pdf-guide.what-happens-para1')</p>
                    <p>@lang('merge-pdf-guide.what-happens-para2')</p>
                    <p>@lang('merge-pdf-guide.what-happens-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.top-benefits-heading')</h2>
                    <p>@lang('merge-pdf-guide.top-benefits-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.benefit1-heading')</h3>
                        <p>@lang('merge-pdf-guide.benefit1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.benefit2-heading')</h3>
                        <p>@lang('merge-pdf-guide.benefit2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.benefit3-heading')</h3>
                        <p>@lang('merge-pdf-guide.benefit3-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.benefit4-heading')</h3>
                        <p>@lang('merge-pdf-guide.benefit4-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.best-tools-heading')</h2>
                    <p>@lang('merge-pdf-guide.best-tools-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tool1-heading')</h3>
                        <p>@lang('merge-pdf-guide.tool1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool1-pro1')</li>
                                <li>@lang('merge-pdf-guide.tool1-pro2')</li>
                                <li>@lang('merge-pdf-guide.tool1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool1-con1')</li>
                                <li>@lang('merge-pdf-guide.tool1-con2')</li>
                                <li>@lang('merge-pdf-guide.tool1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tool2-heading')</h3>
                        <p>@lang('merge-pdf-guide.tool2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool2-pro1')</li>
                                <li>@lang('merge-pdf-guide.tool2-pro2')</li>
                                <li>@lang('merge-pdf-guide.tool2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool2-con1')</li>
                                <li>@lang('merge-pdf-guide.tool2-con2')</li>
                                <li>@lang('merge-pdf-guide.tool2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tool3-heading')</h3>
                        <p>@lang('merge-pdf-guide.tool3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool3-pro1')</li>
                                <li>@lang('merge-pdf-guide.tool3-pro2')</li>
                                <li>@lang('merge-pdf-guide.tool3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool3-con1')</li>
                                <li>@lang('merge-pdf-guide.tool3-con2')</li>
                                <li>@lang('merge-pdf-guide.tool3-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tool4-heading')</h3>
                        <p>@lang('merge-pdf-guide.tool4-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('merge-pdf-guide.pros-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool4-pro1')</li>
                                <li>@lang('merge-pdf-guide.tool4-pro2')</li>
                                <li>@lang('merge-pdf-guide.tool4-pro3')</li>
                            </ul>
                            
                            <h4>@lang('merge-pdf-guide.cons-heading')</h4>
                            <ul>
                                <li>@lang('merge-pdf-guide.tool4-con1')</li>
                                <li>@lang('merge-pdf-guide.tool4-con2')</li>
                                <li>@lang('merge-pdf-guide.tool4-con3')</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.step-by-step-heading')</h2>
                    <p>@lang('merge-pdf-guide.step-by-step-intro')</p>
                    
                    <ul>
                        <li>@lang('merge-pdf-guide.step1-text')</li>
                        <li>@lang('merge-pdf-guide.step2-text')</li>
                        <li>@lang('merge-pdf-guide.step3-text')</li>
                        <li>@lang('merge-pdf-guide.step4-text')</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.advanced-tips-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('merge-pdf'), __('merge-pdf-guide.advanced-tips-intro')) !!}</p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tip1-heading')</h3>
                        <p>@lang('merge-pdf-guide.tip1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tip2-heading')</h3>
                        <p>@lang('merge-pdf-guide.tip2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tip3-heading')</h3>
                        <p>@lang('merge-pdf-guide.tip3-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.tip4-heading')</h3>
                        <p>@lang('merge-pdf-guide.tip4-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.free-vs-paid-heading')</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('merge-pdf-guide.table-feature')</th>
                                    <th>@lang('merge-pdf-guide.table-free')</th>
                                    <th>@lang('merge-pdf-guide.table-paid')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>@lang('merge-pdf-guide.table-daily-limits')</td>
                                    <td>@lang('merge-pdf-guide.table-daily-limits-free')</td>
                                    <td>@lang('merge-pdf-guide.table-daily-limits-paid')</td>
                                </tr>
                                <tr>
                                    <td>@lang('merge-pdf-guide.table-file-count')</td>
                                    <td>@lang('merge-pdf-guide.table-file-count-free')</td>
                                    <td>@lang('merge-pdf-guide.table-file-count-paid')</td>
                                </tr>
                                <tr>
                                    <td>@lang('merge-pdf-guide.table-speed')</td>
                                    <td>@lang('merge-pdf-guide.table-speed-free')</td>
                                    <td>@lang('merge-pdf-guide.table-speed-paid')</td>
                                </tr>
                                <tr>
                                    <td>@lang('merge-pdf-guide.table-watermark')</td>
                                    <td>@lang('merge-pdf-guide.table-watermark-free')</td>
                                    <td>@lang('merge-pdf-guide.table-watermark-paid')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.common-problems-heading')</h2>
                    <p>@lang('merge-pdf-guide.common-problems-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.problem1-heading')</h3>
                        <p>@lang('merge-pdf-guide.problem1-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.problem2-heading')</h3>
                        <p>@lang('merge-pdf-guide.problem2-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.problem3-heading')</h3>
                        <p>@lang('merge-pdf-guide.problem3-para')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('merge-pdf-guide.problem4-heading')</h3>
                        <p>@lang('merge-pdf-guide.problem4-para')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('merge-pdf-guide.conclusion-heading')</h2>
                    <p>@lang('merge-pdf-guide.conclusion-para1')</p>
                    <p>@lang('merge-pdf-guide.conclusion-para2')</p>
                    <p>@lang('merge-pdf-guide.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('merge-pdf-guide.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide.faq1-question')</h3>
                        <p>@lang('merge-pdf-guide.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide.faq2-question')</h3>
                        <p>@lang('merge-pdf-guide.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide.faq3-question')</h3>
                        <p>@lang('merge-pdf-guide.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide.faq4-question')</h3>
                        <p>@lang('merge-pdf-guide.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('merge-pdf-guide.faq5-question')</h3>
                        <p>@lang('merge-pdf-guide.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 7])
            @include('components.related-posts', ['postId' => 7])
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
    "name": "What is the best free PDF merger?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Smallpdf and iLovePDF are among the best free PDF mergers with easy online access. Both tools allow merging files quickly without installation or cost."
    }
  },{
    "@type": "Question",
    "name": "Can I merge unlimited PDFs?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Free tools often limit the number of PDFs you can merge daily. Paid PDF mergers allow unlimited merges without restrictions or daily limits."
    }
  },{
    "@type": "Question",
    "name": "How do I merge large PDFs without errors?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Split very large PDFs into smaller sections before merging them. Using premium tools helps handle larger files more efficiently."
    }
  },{
    "@type": "Question",
    "name": "Does merging PDFs reduce quality?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Merging PDFs usually preserves text and layout quality. Excessive compression or low-resolution settings may reduce image clarity."
    }
  },{
    "@type": "Question",
    "name": "Are online PDF mergers safe?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Reputable online PDF mergers use encryption to secure uploads. Avoid using untrusted sites to prevent potential data breaches."
    }
  }]
}
</script>
@endverbatim
@endsection