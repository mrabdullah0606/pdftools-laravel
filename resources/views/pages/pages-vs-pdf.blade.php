@extends('main')
@section('title', __('pages-vs-pdf.title'))
@section('description', __('pages-vs-pdf.description'))

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
                <h1 class="text-center">@lang('pages-vs-pdf.main-heading')</h1>
                <img src="{{ asset('img/pages-vs-pdf.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Pages vs PDF">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 56])
                <header class="mb-4">
                    <h2>@lang('pages-vs-pdf.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.intro-heading')</h2>
                    <p>@lang('pages-vs-pdf.intro-para1')</p>
                    <p>@lang('pages-vs-pdf.intro-para2')</p>
                    <p>@lang('pages-vs-pdf.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.what-is-pages-heading')</h2>
                    <p>@lang('pages-vs-pdf.what-is-pages-para1')</p>
                    <p>@lang('pages-vs-pdf.what-is-pages-para2')</p>

                    <ul>
                        <li>@lang('pages-vs-pdf.pages-use1')</li>
                        <li>@lang('pages-vs-pdf.pages-use2')</li>
                        <li>@lang('pages-vs-pdf.pages-use3')</li>
                    </ul>

                    <p>@lang('pages-vs-pdf.what-is-pages-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.what-is-pdf-heading')</h2>
                    <p>@lang('pages-vs-pdf.what-is-pdf-para1')</p>
                    <p>@lang('pages-vs-pdf.what-is-pdf-para2')</p>

                    <ul>
                        <li>@lang('pages-vs-pdf.pdf-use1')</li>
                        <li>@lang('pages-vs-pdf.pdf-use2')</li>
                        <li>@lang('pages-vs-pdf.pdf-use3')</li>
                        <li>@lang('pages-vs-pdf.pdf-use4')</li>
                        <li>@lang('pages-vs-pdf.pdf-use5')</li>
                    </ul>

                    <p>@lang('pages-vs-pdf.what-is-pdf-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.key-differences-heading')</h2>

                    <div class="mb-4">
                        <h3>@lang('pages-vs-pdf.diff1-heading')</h3>
                        <p>@lang('pages-vs-pdf.diff1-para1')</p>
                        <p>@lang('pages-vs-pdf.diff1-para2')</p>
                        <ul>
                            <li>@lang('pages-vs-pdf.diff1-item1')</li>
                            <li>@lang('pages-vs-pdf.diff1-item2')</li>
                            <li>@lang('pages-vs-pdf.diff1-item3')</li>
                            <li>@lang('pages-vs-pdf.diff1-item4')</li>
                            <li>@lang('pages-vs-pdf.diff1-item5')</li>
                        </ul>
                        <p>@lang('pages-vs-pdf.diff1-para3')</p>
                    </div>

                    <div class="mb-4">
                        <h3>@lang('pages-vs-pdf.diff2-heading')</h3>
                        <p>@lang('pages-vs-pdf.diff2-para1')</p>
                        <ul>
                            <li>@lang('pages-vs-pdf.diff2-pages-item1')</li>
                            <li>@lang('pages-vs-pdf.diff2-pages-item2')</li>
                            <li>@lang('pages-vs-pdf.diff2-pages-item3')</li>
                        </ul>
                        <p>@lang('pages-vs-pdf.diff2-para2')</p>
                        <ul>
                            <li>@lang('pages-vs-pdf.diff2-pdf-item1')</li>
                            <li>@lang('pages-vs-pdf.diff2-pdf-item2')</li>
                            <li>@lang('pages-vs-pdf.diff2-pdf-item3')</li>
                        </ul>
                        <p>@lang('pages-vs-pdf.diff2-para3')</p>
                    </div>

                    <div class="mb-4">
                        <h3>@lang('pages-vs-pdf.diff3-heading')</h3>
                        <p>@lang('pages-vs-pdf.diff3-para1')</p>
                        <p>@lang('pages-vs-pdf.diff3-para2')</p>
                    </div>

                    <div class="mb-4">
                        <h3>@lang('pages-vs-pdf.diff4-heading')</h3>
                        <p>@lang('pages-vs-pdf.diff4-para1')</p>
                        <ul>
                            <li>@lang('pages-vs-pdf.diff4-item1')</li>
                            <li>@lang('pages-vs-pdf.diff4-item2')</li>
                            <li>@lang('pages-vs-pdf.diff4-item3')</li>
                            <li>@lang('pages-vs-pdf.diff4-item4')</li>
                        </ul>
                        <p>@lang('pages-vs-pdf.diff4-para2')</p>
                    </div>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.why-pdf-better-heading')</h2>
                    <p>@lang('pages-vs-pdf.why-pdf-better-para1')</p>
                    <p>@lang('pages-vs-pdf.why-pdf-better-para2')</p>
                    <ul>
                        <li>@lang('pages-vs-pdf.pdf-benefit1')</li>
                        <li>@lang('pages-vs-pdf.pdf-benefit2')</li>
                        <li>@lang('pages-vs-pdf.pdf-benefit3')</li>
                        <li>@lang('pages-vs-pdf.pdf-benefit4')</li>
                        <li>@lang('pages-vs-pdf.pdf-benefit5')</li>
                    </ul>
                    <p>@lang('pages-vs-pdf.why-pdf-better-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.when-pages-useful-heading')</h2>
                    <p>@lang('pages-vs-pdf.when-pages-useful-para1')</p>
                    <ul>
                        <li>@lang('pages-vs-pdf.pages-useful-item1')</li>
                        <li>@lang('pages-vs-pdf.pages-useful-item2')</li>
                        <li>@lang('pages-vs-pdf.pages-useful-item3')</li>
                        <li>@lang('pages-vs-pdf.pages-useful-item4')</li>
                    </ul>
                    <p>@lang('pages-vs-pdf.when-pages-useful-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.how-to-convert-heading')</h2>
                    <p>@lang('pages-vs-pdf.how-to-convert-para1')</p>
                    <p>
                        @lang('pages-vs-pdf.how-to-convert-para2-1')
                        <a href="{{ localized_route('pages-to-pdf') }}">@lang('pages-vs-pdf.how-to-convert-para2-2')</a>
                        @lang('pages-vs-pdf.how-to-convert-para2-3')
                    </p>
                    <p>@lang('pages-vs-pdf.how-to-convert-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.students-heading')</h2>
                    <p>@lang('pages-vs-pdf.students-para1')</p>
                    <p>@lang('pages-vs-pdf.students-para2')</p>
                    <ul>
                        <li>@lang('pages-vs-pdf.students-item1')</li>
                        <li>@lang('pages-vs-pdf.students-item2')</li>
                        <li>@lang('pages-vs-pdf.students-item3')</li>
                        <li>@lang('pages-vs-pdf.students-item4')</li>
                    </ul>
                    <p>@lang('pages-vs-pdf.students-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.professionals-heading')</h2>
                    <p>@lang('pages-vs-pdf.professionals-para1')</p>
                    <p>@lang('pages-vs-pdf.professionals-para2')</p>
                    <ul>
                        <li>@lang('pages-vs-pdf.professionals-item1')</li>
                        <li>@lang('pages-vs-pdf.professionals-item2')</li>
                        <li>@lang('pages-vs-pdf.professionals-item3')</li>
                    </ul>
                    <p>@lang('pages-vs-pdf.professionals-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.printing-heading')</h2>
                    <p>@lang('pages-vs-pdf.printing-para1')</p>
                    <ul>
                        <li>@lang('pages-vs-pdf.printing-item1')</li>
                        <li>@lang('pages-vs-pdf.printing-item2')</li>
                        <li>@lang('pages-vs-pdf.printing-item3')</li>
                    </ul>
                    <p>@lang('pages-vs-pdf.printing-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.security-heading')</h2>
                    <p>@lang('pages-vs-pdf.security-para1')</p>
                    <p>@lang('pages-vs-pdf.security-para2')</p>
                    <ul>
                        <li>@lang('pages-vs-pdf.security-item1')</li>
                        <li>@lang('pages-vs-pdf.security-item2')</li>
                        <li>@lang('pages-vs-pdf.security-item3')</li>
                    </ul>
                    <p>@lang('pages-vs-pdf.security-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.after-convert-heading')</h2>
                    <p>@lang('pages-vs-pdf.after-convert-para1')</p>
                    <ul>
                        <li>
                            <a href="{{ localized_route('compress-pdf') }}">@lang('pages-vs-pdf.after-convert-item1-1')</a>
                            @lang('pages-vs-pdf.after-convert-item1-2')
                        </li>
                        <li>
                            <a href="{{ localized_route('merge-pdf') }}">@lang('pages-vs-pdf.after-convert-item2-1')</a>
                            @lang('pages-vs-pdf.after-convert-item2-2')
                        </li>
                        <li>@lang('pages-vs-pdf.after-convert-item3')</li>
                    </ul>
                    <p>@lang('pages-vs-pdf.after-convert-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.external-ref-heading')</h2>
                    <p>
                        @lang('pages-vs-pdf.external-ref-para1-1')
                        <a href="https://www.adobe.com/">@lang('pages-vs-pdf.external-ref-para1-2')</a>
                        @lang('pages-vs-pdf.external-ref-para1-3')
                    </p>
                    <p>@lang('pages-vs-pdf.external-ref-para2')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.conclusion-heading')</h2>
                    <p>@lang('pages-vs-pdf.conclusion-para1')</p>
                    <p>@lang('pages-vs-pdf.conclusion-para2')</p>
                    <p>
                        @lang('pages-vs-pdf.conclusion-para3-1')
                        <a href="{{ localized_route('pages-to-pdf') }}">@lang('pages-vs-pdf.conclusion-para3-2')</a>
                        @lang('pages-vs-pdf.conclusion-para3-3')
                    </p>
                </section>

                <section class="mb-5">
                    <h2>@lang('pages-vs-pdf.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('pages-vs-pdf.faq1-question')</h3>
                        <p>@lang('pages-vs-pdf.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pages-vs-pdf.faq2-question')</h3>
                        <p>@lang('pages-vs-pdf.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pages-vs-pdf.faq3-question')</h3>
                        <p>@lang('pages-vs-pdf.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pages-vs-pdf.faq4-question')</h3>
                        <p>@lang('pages-vs-pdf.faq4-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('pages-vs-pdf.faq5-question')</h3>
                        <p>@lang('pages-vs-pdf.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 56])
            @include('components.related-posts', ['postId' => 56])
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
            "name": "Can everyone open Pages files",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "No. Pages files are mainly supported on Apple devices."
            }
          },{
            "@type": "Question",
            "name": "Is PDF better for job applications",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes. Most employers prefer PDF resumes and documents."
            }
          },{
            "@type": "Question",
            "name": "Does converting Pages to PDF change content",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "No. The content stays the same, only the format changes."
            }
          },{
            "@type": "Question",
            "name": "Can I still edit after converting to PDF",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes. PDFs can be converted back to editable formats if needed."
            }
          },{
            "@type": "Question",
            "name": "Is PDF suitable for long-term storage",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes. PDF is designed for durability and archival use."
            }
          }]
        }
        </script>
@endverbatim
@endsection