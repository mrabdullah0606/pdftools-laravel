@extends('main')
@section('title', __('ai-document-processing.title'))
@section('description', __('ai-document-processing.description'))

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
                <h1 class="text-center">@lang('ai-document-processing.main-heading')</h1>
                <img src="{{ asset('img/ai-document-processing.jpeg') }}" class="img-fluid mt-3 mb-3" alt="AI Document Processing">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 46])
                <header class="mb-4">
                    <h2>@lang('ai-document-processing.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.intro-heading')</h2>
                    <p>@lang('ai-document-processing.intro-para1')</p>
                    <p>@lang('ai-document-processing.intro-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section1-heading')</h2>
                    <p>@lang('ai-document-processing.section1-para1')</p>
                    <p>@lang('ai-document-processing.section1-para2')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section1-capability1')</li>
                        <li>@lang('ai-document-processing.section1-capability2')</li>
                        <li>@lang('ai-document-processing.section1-capability3')</li>
                        <li>@lang('ai-document-processing.section1-capability4')</li>
                        <li>@lang('ai-document-processing.section1-capability5')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section1-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section2-heading')</h2>
                    <p>@lang('ai-document-processing.section2-para1')</p>
                    <p>@lang('ai-document-processing.section2-para2')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section2-ability1')</li>
                        <li>@lang('ai-document-processing.section2-ability2')</li>
                        <li>@lang('ai-document-processing.section2-ability3')</li>
                        <li>@lang('ai-document-processing.section2-ability4')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section2-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section3-heading')</h2>
                    
                    <div class="mb-4">
                        <h3>@lang('ai-document-processing.section3-sub1-heading')</h3>
                        <p>@lang('ai-document-processing.section3-sub1-para1')</p>
                        <p>@lang('ai-document-processing.section3-sub1-para2')</p>
                        
                        <ul>
                            <li>@lang('ai-document-processing.section3-sub1-point1')</li>
                            <li>@lang('ai-document-processing.section3-sub1-point2')</li>
                            <li>@lang('ai-document-processing.section3-sub1-point3')</li>
                        </ul>
                        
                        <p>@lang('ai-document-processing.section3-sub1-para3')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('ai-document-processing.section3-sub2-heading')</h3>
                        <p>@lang('ai-document-processing.section3-sub2-para1')</p>
                        <p>
                            <a href="{{ localized_route('pdf.summerize') }}">@lang('ai-document-processing.section3-sub2-para2-1')</a>
                            @lang('ai-document-processing.section3-sub2-para2')
                        </p>
                        
                        <ul>
                            <li>@lang('ai-document-processing.section3-sub2-point1')</li>
                            <li>@lang('ai-document-processing.section3-sub2-point2')</li>
                            <li>@lang('ai-document-processing.section3-sub2-point3')</li>
                        </ul>
                        
                        <p>@lang('ai-document-processing.section3-sub2-para3')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('ai-document-processing.section3-sub3-heading')</h3>
                        <p>@lang('ai-document-processing.section3-sub3-para1')</p>
                        <p>@lang('ai-document-processing.section3-sub3-para2')</p>
                        
                        <ul>
                            <li>
                                <a href="{{ localized_route('pdf-to-word') }}">@lang('ai-document-processing.section3-sub3-point1-1')</a>
                                @lang('ai-document-processing.section3-sub3-point1')
                            </li>
                            <li>
                                <a href="{{ localized_route('word-to-pdf') }}">@lang('ai-document-processing.section3-sub3-point2-1')</a>
                                @lang('ai-document-processing.section3-sub3-point2')
                            </li>
                        </ul>
                        
                        <p>@lang('ai-document-processing.section3-sub3-para3')</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3>@lang('ai-document-processing.section3-sub4-heading')</h3>
                        <p>@lang('ai-document-processing.section3-sub4-para1')</p>
                        <p>
                            @lang('ai-document-processing.section3-sub4-para2-1')
                            <a href="{{ localized_route('compress-pdf') }}">@lang('ai-document-processing.section3-sub4-para2-2')</a>
                            @lang('ai-document-processing.section3-sub4-para2-3')
                        </p>
                        
                        <ul>
                            <li>@lang('ai-document-processing.section3-sub4-point1')</li>
                            <li>@lang('ai-document-processing.section3-sub4-point2')</li>
                            <li>@lang('ai-document-processing.section3-sub4-point3')</li>
                        </ul>
                        
                        <p>@lang('ai-document-processing.section3-sub4-para3')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section4-heading')</h2>
                    <p>@lang('ai-document-processing.section4-para1')</p>
                    <p>@lang('ai-document-processing.section4-para2')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section4-improvement1')</li>
                        <li>@lang('ai-document-processing.section4-improvement2')</li>
                        <li>@lang('ai-document-processing.section4-improvement3')</li>
                        <li>@lang('ai-document-processing.section4-improvement4')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section4-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section5-heading')</h2>
                    <p>@lang('ai-document-processing.section5-para1')</p>
                    <p>@lang('ai-document-processing.section5-para2')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section5-capability1')</li>
                        <li>
                            @lang('ai-document-processing.section5-capability2-1')
                            <a href="{{ localized_route('merge-pdf') }}">@lang('ai-document-processing.section5-capability2')</a>
                        </li>
                        <li>@lang('ai-document-processing.section5-capability3')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section5-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section6-heading')</h2>
                    <p>@lang('ai-document-processing.section6-para1')</p>
                    <p>@lang('ai-document-processing.section6-para2')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section6-help1')</li>
                        <li>
                            <a href="{{ localized_route('jpg-to-pdf') }}">@lang('ai-document-processing.section6-help2-1')</a>
                            @lang('ai-document-processing.section6-help2')
                        </li>
                        <li>@lang('ai-document-processing.section6-help3')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section6-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section7-heading')</h2>
                    <p>@lang('ai-document-processing.section7-para1')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section7-priority1')</li>
                        <li>@lang('ai-document-processing.section7-priority2')</li>
                        <li>@lang('ai-document-processing.section7-priority3')</li>
                        <li>@lang('ai-document-processing.section7-priority4')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section7-para2')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section7-easier1')</li>
                        <li>@lang('ai-document-processing.section7-easier2')</li>
                        <li>@lang('ai-document-processing.section7-easier3')</li>
                        <li>@lang('ai-document-processing.section7-easier4')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section7-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section8-heading')</h2>
                    <p>@lang('ai-document-processing.section8-para1')</p>
                    <p>@lang('ai-document-processing.section8-para2')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section8-challenge1')</li>
                        <li>@lang('ai-document-processing.section8-challenge2')</li>
                        <li>@lang('ai-document-processing.section8-challenge3')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section8-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section9-heading')</h2>
                    <p>@lang('ai-document-processing.section9-para1')</p>
                    
                    <ul>
                        <li>@lang('ai-document-processing.section9-focus1')</li>
                        <li>@lang('ai-document-processing.section9-focus2')</li>
                        <li>@lang('ai-document-processing.section9-focus3')</li>
                        <li>@lang('ai-document-processing.section9-focus4')</li>
                    </ul>
                    
                    <p>@lang('ai-document-processing.section9-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.section10-heading')</h2>
                    <p>
                        @lang('ai-document-processing.section10-para1-1')
                        <a href="https://www.ibm.com/">@lang('ai-document-processing.section10-para1-2')</a>
                        @lang('ai-document-processing.section10-para1-3')
                    </p>
                    <p>@lang('ai-document-processing.section10-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('ai-document-processing.conclusion-heading')</h2>
                    <p>@lang('ai-document-processing.conclusion-para1')</p>
                    <p>@lang('ai-document-processing.conclusion-para2')</p>
                    <p>@lang('ai-document-processing.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('ai-document-processing.faqs-heading')</h2>
                    
                    <div class="mb-3">
                        <h3>@lang('ai-document-processing.faq1-question')</h3>
                        <p>@lang('ai-document-processing.faq1-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('ai-document-processing.faq2-question')</h3>
                        <p>@lang('ai-document-processing.faq2-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('ai-document-processing.faq3-question')</h3>
                        <p>@lang('ai-document-processing.faq3-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('ai-document-processing.faq4-question')</h3>
                        <p>@lang('ai-document-processing.faq4-answer')</p>
                    </div>
                    
                    <div class="mb-3">
                        <h3>@lang('ai-document-processing.faq5-question')</h3>
                        <p>@lang('ai-document-processing.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 46])
            @include('components.related-posts', ['postId' => 46])
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
    "name": "What is AI document processing in simple terms", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "It is the use of artificial intelligence to understand and work with documents 
automatically." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Why are PDFs important in AI document processing", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "PDFs are widely used and preserve structure, making them valuable for AI 
analysis." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Can AI summarize PDFs accurately", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes, AI can generate reliable summaries for most informational documents." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Does AI replace manual document work", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "No. AI supports users by reducing repetitive tasks and saving time." 
    } 
  },{ 
    "@type": "Question", 
    "name": "Is AI document processing secure", 
    "acceptedAnswer": { 
      "@type": "Answer", 
      "text": "Yes, when platforms use encrypted processing and automatic file deletion." 
    } 
  }] 
} 
</script>
@endverbatim
@endsection