@extends('main')
@section('title', __('share-pdf-safely.title'))
@section('description', __('share-pdf-safely.description'))

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
                <h1 class="text-center">@lang('share-pdf-safely.main-heading')</h1>
                <img src="{{ asset('img/share-pdf-safely.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Share PDF Files Safely">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 30])
                <header class="mb-4">
                    <h2>@lang('share-pdf-safely.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.intro-heading')</h2>
                    <p>@lang('share-pdf-safely.intro-para1')</p>
                    <p>@lang('share-pdf-safely.intro-para2')</p>
                    <p>@lang('share-pdf-safely.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.why-preferred-heading')</h2>
                    <p>@lang('share-pdf-safely.why-preferred-intro')</p>
                    
                    <ul>
                        <li>@lang('share-pdf-safely.why-preferred-point1')</li>
                        <li>@lang('share-pdf-safely.why-preferred-point2')</li>
                        <li>@lang('share-pdf-safely.why-preferred-point3')</li>
                        <li>@lang('share-pdf-safely.why-preferred-point4')</li>
                    </ul>
                    
                    <p>@lang('share-pdf-safely.why-preferred-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.step1-heading')</h2>
                    <p>@lang('share-pdf-safely.step1-intro')</p>
                    
                    <h3>@lang('share-pdf-safely.step1-subheading')</h3>
                    <p>
                        @lang('share-pdf-safely.step1-para-1')
                        <a href="{{ localized_route('word-to-pdf') }}">@lang('share-pdf-safely.step1-para-2')</a>
                        @lang('share-pdf-safely.step1-para-3')
                    </p>
                    <p>@lang('share-pdf-safely.step1-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.step2-heading')</h2>
                    <p>@lang('share-pdf-safely.step2-intro')</p>
                    
                    <ul>
                        <li>@lang('share-pdf-safely.step2-point1')</li>
                        <li>@lang('share-pdf-safely.step2-point2')</li>
                        <li>@lang('share-pdf-safely.step2-point3')</li>
                    </ul>
                    
                    <h3>@lang('share-pdf-safely.step2-practice-heading')</h3>
                    <p>
                    <a href="{{localized_route('compress-pdf')}}">@lang('share-pdf-safely.step2-practice-text-1')</a>
                    @lang('share-pdf-safely.step2-practice-text')
                    </p>
                    <p>@lang('share-pdf-safely.step2-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.step3-heading')</h2>
                    <p>@lang('share-pdf-safely.step3-intro')</p>
                    
                    <h3>@lang('share-pdf-safely.step3-solution-heading')</h3>
                    <p>
                        <a href="{{ localized_route('merge-pdf') }}">@lang('share-pdf-safely.step3-solution-text-1')</a>
                        @lang('share-pdf-safely.step3-solution-text')
                    </p>
                    <p>@lang('share-pdf-safely.step3-ideal-intro')</p>
                    
                    <ul>
                        <li>@lang('share-pdf-safely.step3-usecase1')</li>
                        <li>@lang('share-pdf-safely.step3-usecase2')</li>
                        <li>@lang('share-pdf-safely.step3-usecase3')</li>
                        <li>@lang('share-pdf-safely.step3-usecase4')</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.step4-heading')</h2>
                    <p>@lang('share-pdf-safely.step4-intro')</p>
                    
                    <h3>@lang('share-pdf-safely.step4-mistake-heading')</h3>
                    <p>@lang('share-pdf-safely.step4-mistake-text')</p>
                    
                    <h3>@lang('share-pdf-safely.step4-approach-heading')</h3>
                    <ul>
                        <li>
                            <a href="{{localized_route('jpg-to-pdf')}}">@lang('share-pdf-safely.step4-approach1-1')</a>
                            @lang('share-pdf-safely.step4-approach1')
                        </li>
                        <li>
                            <a href="{{localized_route('pdf-to-jpg')}}">@lang('share-pdf-safely.step4-approach2-1')</a>
                            @lang('share-pdf-safely.step4-approach2')
                        </li>
                    </ul>
                    
                    <p>@lang('share-pdf-safely.step4-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.step5-heading')</h2>
                    <p>@lang('share-pdf-safely.step5-intro')</p>
                    
                    <ul>
                        <li>@lang('share-pdf-safely.step5-point1')</li>
                        <li>@lang('share-pdf-safely.step5-point2')</li>
                        <li>@lang('share-pdf-safely.step5-point3')</li>
                        <li>@lang('share-pdf-safely.step5-point4')</li>
                    </ul>
                    
                    <p>@lang('share-pdf-safely.step5-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.step6-heading')</h2>
                    <p>@lang('share-pdf-safely.step6-intro')</p>
                    
                    <h3>@lang('share-pdf-safely.step6-practices-heading')</h3>
                    <ul>
                        <li>@lang('share-pdf-safely.step6-practice1')</li>
                        <li>@lang('share-pdf-safely.step6-practice2')</li>
                        <li>@lang('share-pdf-safely.step6-practice3')</li>
                        <li>@lang('share-pdf-safely.step6-practice4')</li>
                    </ul>
                    
                    <p>@lang('share-pdf-safely.step6-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.scenarios-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.students-heading')</h3>
                        <ul>
                            <li>@lang('share-pdf-safely.students-point1')</li>
                            <li>@lang('share-pdf-safely.students-point2')</li>
                            <li>@lang('share-pdf-safely.students-point3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.professionals-heading')</h3>
                        <ul>
                            <li>@lang('share-pdf-safely.professionals-point1')</li>
                            <li>@lang('share-pdf-safely.professionals-point2')</li>
                            <li>@lang('share-pdf-safely.professionals-point3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.freelancers-heading')</h3>
                        <ul>
                            <li>@lang('share-pdf-safely.freelancers-point1')</li>
                            <li>@lang('share-pdf-safely.freelancers-point2')</li>
                            <li>@lang('share-pdf-safely.freelancers-point3')</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.businesses-heading')</h3>
                        <ul>
                            <li>@lang('share-pdf-safely.businesses-point1')</li>
                            <li>@lang('share-pdf-safely.businesses-point2')</li>
                            <li>@lang('share-pdf-safely.businesses-point3')</li>
                        </ul>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.ai-efficiency-heading')</h2>
                    <p>@lang('share-pdf-safely.ai-efficiency-intro')</p>
                    
                    <h3>@lang('share-pdf-safely.ai-solution-heading')</h3>
                    <p>@lang('share-pdf-safely.ai-solution-text')</p>
                    <p>
                        <a href="{{localized_route('pdf-summarize')}}">@lang('share-pdf-safely.ai-tool-text')</a>
                    </p>
                    <p>@lang('share-pdf-safely.ai-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.mistakes-heading')</h2>
                    
                    <ul>
                        <li>@lang('share-pdf-safely.mistake1')</li>
                        <li>@lang('share-pdf-safely.mistake2')</li>
                        <li>@lang('share-pdf-safely.mistake3')</li>
                        <li>@lang('share-pdf-safely.mistake4')</li>
                        <li>@lang('share-pdf-safely.mistake5')</li>
                    </ul>
                    
                    <p>@lang('share-pdf-safely.mistakes-conclusion')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.external-reference-heading')</h2>
                    <p>
                        @lang('share-pdf-safely.external-reference-para-1')
                        <a href="https://www.iso.org">@lang('share-pdf-safely.external-reference-para-2')</a>
                        @lang('share-pdf-safely.external-reference-para-3')
                    </p>
                </section>

                <section class="mb-5">
                    <h2>@lang('share-pdf-safely.conclusion-heading')</h2>
                    <p>@lang('share-pdf-safely.conclusion-para1')</p>
                    <p>@lang('share-pdf-safely.conclusion-para2')</p>
                    <p>
                        @lang('share-pdf-safely.conclusion-para3-1')
                        <a href="{{localized_route('home')}}">@lang('share-pdf-safely.conclusion-para3')</a>
                    </p>
                </section>

                <section>
                    <h2>@lang('share-pdf-safely.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.faq1-question')</h3>
                        <p>@lang('share-pdf-safely.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.faq2-question')</h3>
                        <p>@lang('share-pdf-safely.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.faq3-question')</h3>
                        <p>@lang('share-pdf-safely.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.faq4-question')</h3>
                        <p>@lang('share-pdf-safely.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('share-pdf-safely.faq5-question')</h3>
                        <p>@lang('share-pdf-safely.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 30])
            @include('components.related-posts', ['postId' => 30])
</article>
        </div>
    </div>
@endsection

@section('shema')
@verbatim
    <script type="application/ld+json"> 
{ 
  "@context": "https://schema.org", 
  "@type": "FAQPage", 
  "mainEntity": [{ 
    "@type": "Question", 
    "name": "What is the safest way to share a PDF file?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Use secure HTTPS-based tools, compress the file, and avoid platforms that store 
files permanently." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Should I compress a PDF before emailing it?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. Compression improves delivery speed and prevents attachment errors." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Is it better to merge PDFs before sharing?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. A single organized file is easier for recipients to review." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Can PDFs be shared safely on mobile devices?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. PDFs are highly mobile-compatible when optimized correctly." 
    } 
  },{ 
    "@type": "Question", 
    "name": "How can AI help with PDF sharing?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "AI tools summarize long documents, making shared content easier to 
understand." 
    } 
  }] 
} 
</script>
@endverbatim
@endsection