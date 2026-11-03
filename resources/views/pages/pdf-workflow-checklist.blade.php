@extends('main')
@section('title', __('pdf-workflow-checklist.title'))
@section('description', __('pdf-workflow-checklist.description'))

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
                <h1 class="text-center">@lang('pdf-workflow-checklist.main-heading')</h1>
                <img src="{{ asset('img/pdf-workflow-checklist.jpeg') }}" class="img-fluid mt-3 mb-3" alt="PDF Workflow Checklist">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 44])
                <header class="mb-4">
                    <h2>@lang('pdf-workflow-checklist.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.intro-heading')</h2>
                    <p>@lang('pdf-workflow-checklist.intro-para1')</p>
                    <p>@lang('pdf-workflow-checklist.intro-para2')</p>
                    <p>@lang('pdf-workflow-checklist.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step1-heading')</h2>
                    <p>@lang('pdf-workflow-checklist.step1-para1')</p>
                    <p>@lang('pdf-workflow-checklist.step1-para2')</p>
                    
                    <ul>
                        <li>@lang('pdf-workflow-checklist.step1-purpose1')</li>
                        <li>@lang('pdf-workflow-checklist.step1-purpose2')</li>
                        <li>@lang('pdf-workflow-checklist.step1-purpose3')</li>
                        <li>@lang('pdf-workflow-checklist.step1-purpose4')</li>
                        <li>@lang('pdf-workflow-checklist.step1-purpose5')</li>
                    </ul>
                    
                    <p>@lang('pdf-workflow-checklist.step1-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step2-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step2-subheading1')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.step2-use1')</li>
                            <li>@lang('pdf-workflow-checklist.step2-use2')</li>
                            <li>@lang('pdf-workflow-checklist.step2-use3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step2-subheading2')</h3>
                        <p>
                            <a href="{{localized_route('pdf-to-word')}}">@lang('pdf-workflow-checklist.step2-tool')</a>
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step2-subheading3')</h3>
                        <p>@lang('pdf-workflow-checklist.step2-why')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step3-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step3-subheading1')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.step3-use1')</li>
                            <li>@lang('pdf-workflow-checklist.step3-use2')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step3-subheading2')</h3>
                        <p>
                            <a href="{{localized_route('word-to-pdf')}}">@lang('pdf-workflow-checklist.step3-tool')</a>
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step3-subheading3')</h3>
                        <p>@lang('pdf-workflow-checklist.step3-why')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step4-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step4-subheading1')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.step4-use1')</li>
                            <li>@lang('pdf-workflow-checklist.step4-use2')</li>
                            <li>@lang('pdf-workflow-checklist.step4-use3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step4-subheading2')</h3>
                        <p>
                            <a href="{{ localized_route('compress-pdf') }}">@lang('pdf-workflow-checklist.step4-tool')</a>
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step4-subheading3')</h3>
                        <p>@lang('pdf-workflow-checklist.step4-why')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step5-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step5-subheading1')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.step5-use1')</li>
                            <li>@lang('pdf-workflow-checklist.step5-use2')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step5-subheading2')</h3>
                        <p>
                            <a href="{{ localized_route('merge-pdf') }}">@lang('pdf-workflow-checklist.step5-tool')</a>
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step5-subheading3')</h3>
                        <p>@lang('pdf-workflow-checklist.step5-why')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step6-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step6-subheading1')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.step6-use1')</li>
                            <li>@lang('pdf-workflow-checklist.step6-use2')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step6-subheading2')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.step6-use3')</li>
                            <li>@lang('pdf-workflow-checklist.step6-use4')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step6-subheading3')</h3>
                        <p>@lang('pdf-workflow-checklist.step6-why')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step7-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step7-subheading1')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.step7-use1')</li>
                            <li>@lang('pdf-workflow-checklist.step7-use2')</li>
                            <li>@lang('pdf-workflow-checklist.step7-use3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step7-subheading2')</h3>
                        <p>
                            <a href="{{ localized_route('pdf.summerize') }}">@lang('pdf-workflow-checklist.step7-tool')</a>
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.step7-subheading3')</h3>
                        <p>@lang('pdf-workflow-checklist.step7-why')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step8-heading')</h2>
                    <p>@lang('pdf-workflow-checklist.step8-para1')</p>
                    
                    <ul>
                        <li>@lang('pdf-workflow-checklist.step8-check1')</li>
                        <li>@lang('pdf-workflow-checklist.step8-check2')</li>
                        <li>@lang('pdf-workflow-checklist.step8-check3')</li>
                        <li>@lang('pdf-workflow-checklist.step8-check4')</li>
                    </ul>
                    
                    <p>@lang('pdf-workflow-checklist.step8-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.step9-heading')</h2>
                    <p>@lang('pdf-workflow-checklist.step9-para1')</p>
                    
                    <ul>
                        <li>@lang('pdf-workflow-checklist.step9-practice1')</li>
                        <li>@lang('pdf-workflow-checklist.step9-practice2')</li>
                        <li>@lang('pdf-workflow-checklist.step9-practice3')</li>
                        <li>@lang('pdf-workflow-checklist.step9-practice4')</li>
                    </ul>
                    
                    <p>@lang('pdf-workflow-checklist.step9-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.who-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.who-students-heading')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.who-students-benefit1')</li>
                            <li>@lang('pdf-workflow-checklist.who-students-benefit2')</li>
                            <li>@lang('pdf-workflow-checklist.who-students-benefit3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.who-professionals-heading')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.who-professionals-benefit1')</li>
                            <li>@lang('pdf-workflow-checklist.who-professionals-benefit2')</li>
                            <li>@lang('pdf-workflow-checklist.who-professionals-benefit3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.who-freelancers-heading')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.who-freelancers-benefit1')</li>
                            <li>@lang('pdf-workflow-checklist.who-freelancers-benefit2')</li>
                            <li>@lang('pdf-workflow-checklist.who-freelancers-benefit3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.who-businesses-heading')</h3>
                        <ul>
                            <li>@lang('pdf-workflow-checklist.who-businesses-benefit1')</li>
                            <li>@lang('pdf-workflow-checklist.who-businesses-benefit2')</li>
                            <li>@lang('pdf-workflow-checklist.who-businesses-benefit3')</li>
                        </ul>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.ai-search-heading')</h2>
                    <p>@lang('pdf-workflow-checklist.ai-search-para1')</p>
                    
                    <ul>
                        <li>@lang('pdf-workflow-checklist.ai-search-priority1')</li>
                        <li>@lang('pdf-workflow-checklist.ai-search-priority2')</li>
                        <li>@lang('pdf-workflow-checklist.ai-search-priority3')</li>
                        <li>@lang('pdf-workflow-checklist.ai-search-priority4')</li>
                    </ul>
                    
                    <p>@lang('pdf-workflow-checklist.ai-search-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.external-heading')</h2>
                    <p>
                        @lang('pdf-workflow-checklist.external-para1-1')
                        <a href="https://www.atlassian.com/">@lang('pdf-workflow-checklist.external-para1-2')</a>
                        @lang('pdf-workflow-checklist.external-para1-3')
                    </p>
                    <p>@lang('pdf-workflow-checklist.external-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-workflow-checklist.conclusion-heading')</h2>
                    <p>@lang('pdf-workflow-checklist.conclusion-para1')</p>
                    <p>@lang('pdf-workflow-checklist.conclusion-para2')</p>
                    <p>
                        @lang('pdf-workflow-checklist.conclusion-para3-1')
                        <a href="{{localized_route('home')}}">@lang('pdf-workflow-checklist.conclusion-para3')</a>
                    </p>
                </section>

                <section>
                    <h2>@lang('pdf-workflow-checklist.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.faq1-question')</h3>
                        <p>@lang('pdf-workflow-checklist.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.faq2-question')</h3>
                        <p>@lang('pdf-workflow-checklist.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.faq3-question')</h3>
                        <p>@lang('pdf-workflow-checklist.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.faq4-question')</h3>
                        <p>@lang('pdf-workflow-checklist.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-workflow-checklist.faq5-question')</h3>
                        <p>@lang('pdf-workflow-checklist.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 44])
            @include('components.related-posts', ['postId' => 44])
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
    "name": "Do I need all steps for every PDF?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "No. Use only the steps relevant to your document’s purpose." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Is this workflow suitable for mobile users?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. All steps can be completed in a browser on mobile devices." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Does compression reduce PDF quality?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Not with modern compression tools designed for quality preservation." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Can AI summarization replace reading?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "For overviews and key insights, yes. Full reading is still needed for detailed 
analysis." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Is this workflow secure for sensitive documents?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes, when using tools with encryption and automatic file deletion." 
    } 
  }] 
} 
</script>
@endverbatim
@endsection