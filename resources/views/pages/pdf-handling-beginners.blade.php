@extends('main')
@section('title', __('pdf-handling-beginners.title'))
@section('description', __('pdf-handling-beginners.description'))

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
                <h1 class="text-center">@lang('pdf-handling-beginners.main-heading')</h1>
                <img src="{{ asset('img/pdf-handling-beginners.jpeg') }}" class="img-fluid mt-3 mb-3" alt="PDF Handling for Beginners">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 43])
                <header class="mb-4">
                    <h2>@lang('pdf-handling-beginners.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section1-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section1-para1')</p>
                    <p>@lang('pdf-handling-beginners.section1-para2')</p>
                    
                    <ul>
                        <li>@lang('pdf-handling-beginners.problem1')</li>
                        <li>@lang('pdf-handling-beginners.problem2')</li>
                        <li>@lang('pdf-handling-beginners.problem3')</li>
                        <li>@lang('pdf-handling-beginners.problem4')</li>
                    </ul>
                    
                    <p>@lang('pdf-handling-beginners.section1-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section2-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section2-para1')</p>
                    <p>@lang('pdf-handling-beginners.section2-para2')</p>
                    
                    <ul>
                        <li>@lang('pdf-handling-beginners.use1')</li>
                        <li>@lang('pdf-handling-beginners.use2')</li>
                        <li>@lang('pdf-handling-beginners.use3')</li>
                        <li>@lang('pdf-handling-beginners.use4')</li>
                    </ul>
                    
                    <p>@lang('pdf-handling-beginners.section2-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section3-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section3-para1')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.subsection3-1-heading')</h3>
                        <p>
                            @lang('pdf-handling-beginners.subsection3-1-para1-1')
                            <a href="{{localized_route('pdf-to-word')}}">@lang('pdf-handling-beginners.subsection3-1-para1-2')</a>
                            @lang('pdf-handling-beginners.subsection3-1-para1-3')
                        </p>
                        <p>@lang('pdf-handling-beginners.subsection3-1-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section4-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section4-para1')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.subsection4-1-heading')</h3>
                        <p>
                            <a href="{{localized_route('word-to-pdf')}}">@lang('pdf-handling-beginners.subsection4-1-para1-1')</a>
                            @lang('pdf-handling-beginners.subsection4-1-para1')
                        </p>
                        <p>@lang('pdf-handling-beginners.subsection4-1-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section5-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section5-para1')</p>
                    <p>@lang('pdf-handling-beginners.section5-para2')</p>
                    
                    <ul>
                        <li>@lang('pdf-handling-beginners.issue1')</li>
                        <li>@lang('pdf-handling-beginners.issue2')</li>
                        <li>@lang('pdf-handling-beginners.issue3')</li>
                    </ul>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.subsection5-1-heading')</h3>
                        <p>
                            <a href="{{localized_route('compress-pdf')}}">@lang('pdf-handling-beginners.subsection5-1-para-1')</a>
                            @lang('pdf-handling-beginners.subsection5-1-para')
                        </p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section6-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section6-para1')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.subsection6-1-heading')</h3>
                        <p>@lang('pdf-handling-beginners.subsection6-1-para1')</p>
                        
                        <ul>
                            <li>@lang('pdf-handling-beginners.merge-use1')</li>
                            <li>@lang('pdf-handling-beginners.merge-use2')</li>
                            <li>@lang('pdf-handling-beginners.merge-use3')</li>
                        </ul>
                        
                        <p>@lang('pdf-handling-beginners.subsection6-1-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section7-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section7-para1')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.subsection7-1-heading')</h3>
                        <p>
                            <a href="{{localized_route('jpg-to-pdf')}}">@lang('pdf-handling-beginners.subsection7-1-para-1')</a>
                            @lang('pdf-handling-beginners.subsection7-1-para')
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.subsection7-2-heading')</h3>
                        <p>
                            <a href="{{localized_route('pdf-to-jpg')}}">@lang('pdf-handling-beginners.subsection7-2-para-1')</a>
                            @lang('pdf-handling-beginners.subsection7-2-para')
                        </p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section8-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section8-para1')</p>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.subsection8-1-heading')</h3>
                        <p>
                            <a href="{{localized_route('pdf.summerize')}}">@lang('pdf-handling-beginners.subsection8-1-para1-1')</a>
                            @lang('pdf-handling-beginners.subsection8-1-para1')
                        </p>
                        
                        <ul>
                            <li>@lang('pdf-handling-beginners.summarize-benefit1')</li>
                            <li>@lang('pdf-handling-beginners.summarize-benefit2')</li>
                            <li>@lang('pdf-handling-beginners.summarize-benefit3')</li>
                        </ul>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section9-heading')</h2>
                    <p>@lang('pdf-handling-beginners.section9-para1')</p>
                    <p>@lang('pdf-handling-beginners.section9-para2')</p>
                    
                    <ul>
                        <li>@lang('pdf-handling-beginners.online-benefit1')</li>
                        <li>@lang('pdf-handling-beginners.online-benefit2')</li>
                        <li>@lang('pdf-handling-beginners.online-benefit3')</li>
                        <li>@lang('pdf-handling-beginners.online-benefit4')</li>
                    </ul>
                    
                    <p>@lang('pdf-handling-beginners.section9-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section10-heading')</h2>
                    
                    <ol>
                        <li>@lang('pdf-handling-beginners.workflow-step1')</li>
                        <li>@lang('pdf-handling-beginners.workflow-step2')</li>
                        <li>@lang('pdf-handling-beginners.workflow-step3')</li>
                        <li>@lang('pdf-handling-beginners.workflow-step4')</li>
                        <li>@lang('pdf-handling-beginners.workflow-step5')</li>
                        <li>@lang('pdf-handling-beginners.workflow-step6')</li>
                    </ol>
                    
                    <p>@lang('pdf-handling-beginners.section10-para')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.section11-heading')</h2>
                    <p>
                        @lang('pdf-handling-beginners.section11-para1-1')
                        <a href="https://learn.microsoft.com/">@lang('pdf-handling-beginners.section11-para1-2')</a>
                        @lang('pdf-handling-beginners.section11-para1-3')
                    </p>
                    <p>@lang('pdf-handling-beginners.section11-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pdf-handling-beginners.conclusion-heading')</h2>
                    <p>@lang('pdf-handling-beginners.conclusion-para1')</p>
                    <p>@lang('pdf-handling-beginners.conclusion-para2')</p>
                    <p>
                        @lang('pdf-handling-beginners.conclusion-para3-1')
                        <a href="{{localized_route('home')}}">@lang('pdf-handling-beginners.conclusion-para3')</a>
                    </p>
                </section>

                <section>
                    <h2>@lang('pdf-handling-beginners.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.faq1-question')</h3>
                        <p>@lang('pdf-handling-beginners.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.faq2-question')</h3>
                        <p>@lang('pdf-handling-beginners.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.faq3-question')</h3>
                        <p>@lang('pdf-handling-beginners.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.faq4-question')</h3>
                        <p>@lang('pdf-handling-beginners.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('pdf-handling-beginners.faq5-question')</h3>
                        <p>@lang('pdf-handling-beginners.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 43])
            @include('components.related-posts', ['postId' => 43])
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
    "name": "Are PDFs difficult for beginners?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "No. PDFs are simple once you know when to convert and optimize them." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Can beginners use free PDF tools safely?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes, when using trusted platforms with secure processing." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Do PDFs always need compression?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Only when file size causes upload or sharing issues." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Can beginners manage PDFs on mobile devices?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes. Online PDF tools work well on phones and tablets." 
    } 
  },{ 
    "@type": "Question", 
    "name": "What is the biggest PDF mistake beginners make?", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Trying to edit PDFs directly instead of converting them first." 
    } 
}] 
} 
</script>
@endverbatim
@endsection