@extends('main')
@section('title', __('mobile-image-to-pdf.title'))
@section('description', __('mobile-image-to-pdf.description'))

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
                <h1 class="text-center">@lang('mobile-image-to-pdf.main-heading')</h1>
                <img src="{{ asset('img/mobile-image-to-pdf.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Mobile Image to PDF">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 14])
                <header class="mb-4">
                    <h2>@lang('mobile-image-to-pdf.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('mobile-image-to-pdf.intro-para1')</p>
                    <p>@lang('mobile-image-to-pdf.intro-para2')</p>
                    <p>@lang('mobile-image-to-pdf.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('mobile-image-to-pdf.iphone-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('jpg-to-pdf'), __('mobile-image-to-pdf.iphone-introg')) !!}</p>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.iphone-method1-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.iphone-method1-para1')</p>
                        <p>@lang('mobile-image-to-pdf.iphone-method1-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.iphone-method2-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.iphone-method2-para1')</p>
                        <p>@lang('mobile-image-to-pdf.iphone-method2-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.iphone-method3-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.iphone-method3-para1')</p>
                        <p>@lang('mobile-image-to-pdf.iphone-method3-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('mobile-image-to-pdf.android-heading')</h2>
                    <p>{!! str_replace('__LINK__', localized_route('jpg-to-pdf'), __('mobile-image-to-pdf.android-introg')) !!}</p>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.android-method1-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.android-method1-para1')</p>
                        <p>@lang('mobile-image-to-pdf.android-method1-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.android-method2-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.android-method2-para1')</p>
                        <p>@lang('mobile-image-to-pdf.android-method2-para2')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.android-method3-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.android-method3-para1')</p>
                        <p>@lang('mobile-image-to-pdf.android-method3-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('mobile-image-to-pdf.best-apps-heading')</h2>
                    <p>@lang('mobile-image-to-pdf.best-apps-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.app1-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.app1-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('mobile-image-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('mobile-image-to-pdf.app1-pro1')</li>
                                <li>@lang('mobile-image-to-pdf.app1-pro2')</li>
                                <li>@lang('mobile-image-to-pdf.app1-pro3')</li>
                            </ul>
                            
                            <h4>@lang('mobile-image-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('mobile-image-to-pdf.app1-con1')</li>
                                <li>@lang('mobile-image-to-pdf.app1-con2')</li>
                                <li>@lang('mobile-image-to-pdf.app1-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.app2-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.app2-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('mobile-image-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('mobile-image-to-pdf.app2-pro1')</li>
                                <li>@lang('mobile-image-to-pdf.app2-pro2')</li>
                                <li>@lang('mobile-image-to-pdf.app2-pro3')</li>
                            </ul>
                            
                            <h4>@lang('mobile-image-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('mobile-image-to-pdf.app2-con1')</li>
                                <li>@lang('mobile-image-to-pdf.app2-con2')</li>
                                <li>@lang('mobile-image-to-pdf.app2-con3')</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.app3-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.app3-para')</p>
                        
                        <div class="ms-3 mt-3">
                            <h4>@lang('mobile-image-to-pdf.pros-heading')</h4>
                            <ul>
                                <li>@lang('mobile-image-to-pdf.app3-pro1')</li>
                                <li>@lang('mobile-image-to-pdf.app3-pro2')</li>
                                <li>@lang('mobile-image-to-pdf.app3-pro3')</li>
                            </ul>
                            
                            <h4>@lang('mobile-image-to-pdf.cons-heading')</h4>
                            <ul>
                                <li>@lang('mobile-image-to-pdf.app3-con1')</li>
                                <li>@lang('mobile-image-to-pdf.app3-con2')</li>
                                <li>@lang('mobile-image-to-pdf.app3-con3')</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('mobile-image-to-pdf.problems-heading')</h2>
                    <p>@lang('mobile-image-to-pdf.problems-intro')</p>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.problem1-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.problem1-para')</p>
                        <ul>
                            <li>@lang('mobile-image-to-pdf.problem1-fix1')</li>
                            <li>@lang('mobile-image-to-pdf.problem1-fix2')</li>
                            <li>@lang('mobile-image-to-pdf.problem1-fix3')</li>
                            <li>@lang('mobile-image-to-pdf.problem1-fix4')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.problem2-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.problem2-para')</p>
                        <ul>
                            <li>@lang('mobile-image-to-pdf.problem2-fix1')</li>
                            <li>@lang('mobile-image-to-pdf.problem2-fix2')</li>
                            <li>@lang('mobile-image-to-pdf.problem2-fix3')</li>
                            <li>@lang('mobile-image-to-pdf.problem2-fix4')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('mobile-image-to-pdf.problem3-heading')</h3>
                        <p>@lang('mobile-image-to-pdf.problem3-para')</p>
                        <ul>
                            <li>@lang('mobile-image-to-pdf.problem3-fix1')</li>
                            <li>@lang('mobile-image-to-pdf.problem3-fix2')</li>
                            <li>@lang('mobile-image-to-pdf.problem3-fix3')</li>
                        </ul>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('mobile-image-to-pdf.conclusion-heading')</h2>
                    <p>@lang('mobile-image-to-pdf.conclusion-para1')</p>
                    <p>@lang('mobile-image-to-pdf.conclusion-para2')</p>
                    <p>@lang('mobile-image-to-pdf.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('mobile-image-to-pdf.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('mobile-image-to-pdf.faq1-question')</h3>
                        <p>@lang('mobile-image-to-pdf.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('mobile-image-to-pdf.faq2-question')</h3>
                        <p>@lang('mobile-image-to-pdf.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('mobile-image-to-pdf.faq3-question')</h3>
                        <p>@lang('mobile-image-to-pdf.faq3-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 14])
            @include('components.related-posts', ['postId' => 14])
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
    "name": "Can iPhone save images as PDF without apps?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "iPhones can save images as PDF using built-in apps like Files, Photos, or Notes. Users can select images, use the share or print option, and create a PDF directly without installing additional software."
    }
  },{
    "@type": "Question",
    "name": "Which Android app is best for image to PDF?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Many online tools offer free image-to-PDF conversion with basic features. Smallpdf, iLovePDF, Google Drive, and Canva provide limited free usage options. Free plans usually include restrictions on file size, frequency, or advanced settings."
    }
  },{
    "@type": "Question",
    "name": "Does image quality drop after conversion?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Adobe Scan is one of the best Android apps for converting images to PDF. It produces high-quality PDFs, allows annotation, and supports cloud storage, which makes document management fast and reliable."
    }
  },{
    "@type": "Question",
    "name": "How do I convert multiple photos into one PDF?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Select all the photos you want to combine in a supported app. Use the app's PDF creation option to merge the images into a single PDF document for easy sharing."
    }
  }]
}
</script>
@endverbatim
@endsection
