@extends('main')
@section('title', __('digital-document-security.title'))
@section('description', __('digital-document-security.description'))

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
                <h1 class="text-center">@lang('digital-document-security.main-heading')</h1>
                <img src="{{ asset('img/digital-document-security.jpeg') }}" class="img-fluid mt-3 mb-3" alt="Digital Document Security Best Practices">
            </div>
        </div>
        <div class="card p-5 mx-auto" style="max-width: 800px;">
            <article>
                @include('components.author-byline', ['postId' => 60])
                <header class="mb-4">
                    <h2>@lang('digital-document-security.main-heading')</h2>
                </header>

                <section class="mb-5">
                    <p>@lang('digital-document-security.intro-para1')</p>
                    <p>@lang('digital-document-security.intro-para2')</p>
                    <p>@lang('digital-document-security.intro-para3')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.why-matters-heading')</h2>
                    <p>@lang('digital-document-security.why-matters-intro')</p>

                    <ul>
                        <li>@lang('digital-document-security.why-matters-item1')</li>
                        <li>@lang('digital-document-security.why-matters-item2')</li>
                        <li>@lang('digital-document-security.why-matters-item3')</li>
                        <li>@lang('digital-document-security.why-matters-item4')</li>
                        <li>@lang('digital-document-security.why-matters-item5')</li>
                    </ul>

                    <p>@lang('digital-document-security.why-matters-each-step')</p>

                    <p>@lang('digital-document-security.why-matters-sensitive-intro')</p>

                    <ul>
                        <li>@lang('digital-document-security.sensitive-item1')</li>
                        <li>@lang('digital-document-security.sensitive-item2')</li>
                        <li>@lang('digital-document-security.sensitive-item3')</li>
                        <li>@lang('digital-document-security.sensitive-item4')</li>
                        <li>@lang('digital-document-security.sensitive-item5')</li>
                    </ul>

                    <p>@lang('digital-document-security.why-matters-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.use-pdf-heading')</h2>
                    <p>@lang('digital-document-security.use-pdf-para1')</p>
                    <p>@lang('digital-document-security.use-pdf-para2')</p>
                    <p>@lang('digital-document-security.use-pdf-convert-intro')</p>
                    <ul>
                        <li>
                            <a href="{{ localized_route('word-to-pdf') }}">@lang('digital-document-security.use-pdf-convert-item1')</a>
                        </li>
                        <li>
                            <a href="{{ localized_route('pages-to-pdf') }}">@lang('digital-document-security.use-pdf-convert-item2')</a>
                        </li>
                    </ul>
                    <p>@lang('digital-document-security.use-pdf-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.remove-metadata-heading')</h2>
                    <p>@lang('digital-document-security.remove-metadata-para1')</p>
                    <ul>
                        <li>@lang('digital-document-security.metadata-item1')</li>
                        <li>@lang('digital-document-security.metadata-item2')</li>
                        <li>@lang('digital-document-security.metadata-item3')</li>
                        <li>@lang('digital-document-security.metadata-item4')</li>
                    </ul>
                    <p>@lang('digital-document-security.remove-metadata-before-intro')</p>
                    <ul>
                        <li>@lang('digital-document-security.remove-metadata-before-item1')</li>
                        <li>@lang('digital-document-security.remove-metadata-before-item2')</li>
                        <li>@lang('digital-document-security.remove-metadata-before-item3')</li>
                    </ul>
                    <p>@lang('digital-document-security.remove-metadata-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.compress-heading')</h2>
                    <p>@lang('digital-document-security.compress-para1')</p>
                    <p>
                        @lang('digital-document-security.compress-para2-1')
                        <a href="{{ localized_route('compress-pdf') }}">@lang('digital-document-security.compress-para2-2')</a>
                        @lang('digital-document-security.compress-para2-3')
                    </p>
                    <p>@lang('digital-document-security.compress-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.merge-heading')</h2>
                    <p>@lang('digital-document-security.merge-para1')</p>
                    <p>@lang('digital-document-security.merge-combine-intro')</p>
                    <p>@lang('digital-document-security.merge-example-intro')</p>
                    <ul>
                        <li>@lang('digital-document-security.merge-example-item1')</li>
                        <li>@lang('digital-document-security.merge-example-item2')</li>
                        <li>@lang('digital-document-security.merge-example-item3')</li>
                    </ul>
                    <p>@lang('digital-document-security.merge-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.review-heading')</h2>
                    <p>@lang('digital-document-security.review-intro')</p>
                    <ol>
                        <li>@lang('digital-document-security.review-step1')</li>
                        <li>@lang('digital-document-security.review-step2')</li>
                        <li>@lang('digital-document-security.review-step3')</li>
                        <li>@lang('digital-document-security.review-step4')</li>
                        <li>@lang('digital-document-security.review-step5')</li>
                    </ol>
                    <p>@lang('digital-document-security.review-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.avoid-editable-heading')</h2>
                    <p>@lang('digital-document-security.avoid-editable-para1')</p>
                    <p>@lang('digital-document-security.avoid-editable-risks-intro')</p>
                    <ul>
                        <li>@lang('digital-document-security.avoid-editable-risk1')</li>
                        <li>@lang('digital-document-security.avoid-editable-risk2')</li>
                        <li>@lang('digital-document-security.avoid-editable-risk3')</li>
                        <li>@lang('digital-document-security.avoid-editable-risk4')</li>
                    </ul>
                    <p>@lang('digital-document-security.avoid-editable-convert-intro')</p>
                    <ul>
                        <li>@lang('digital-document-security.avoid-editable-platform1')</li>
                        <li>@lang('digital-document-security.avoid-editable-platform2')</li>
                        <li>@lang('digital-document-security.avoid-editable-platform3')</li>
                        <li>@lang('digital-document-security.avoid-editable-platform4')</li>
                    </ul>
                    <p>@lang('digital-document-security.avoid-editable-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.trusted-tools-heading')</h2>
                    <p>@lang('digital-document-security.trusted-tools-para1')</p>
                    <ul>
                        <li>@lang('digital-document-security.trusted-tools-item1')</li>
                        <li>@lang('digital-document-security.trusted-tools-item2')</li>
                        <li>@lang('digital-document-security.trusted-tools-item3')</li>
                    </ul>
                    <p>@lang('digital-document-security.trusted-tools-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.public-wifi-heading')</h2>
                    <p>@lang('digital-document-security.public-wifi-para1')</p>
                    <p>@lang('digital-document-security.public-wifi-when-possible')</p>
                    <ul>
                        <li>@lang('digital-document-security.public-wifi-item1')</li>
                        <li>@lang('digital-document-security.public-wifi-item2')</li>
                        <li>@lang('digital-document-security.public-wifi-item3')</li>
                    </ul>
                    <p>@lang('digital-document-security.public-wifi-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.protect-docs-heading')</h2>
                    <p>@lang('digital-document-security.protect-docs-intro')</p>
                    <ul>
                        <li>@lang('digital-document-security.protect-docs-item1')</li>
                        <li>@lang('digital-document-security.protect-docs-item2')</li>
                        <li>@lang('digital-document-security.protect-docs-item3')</li>
                        <li>@lang('digital-document-security.protect-docs-item4')</li>
                        <li>@lang('digital-document-security.protect-docs-item5')</li>
                    </ul>
                    <p>@lang('digital-document-security.protect-docs-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.external-guidance-heading')</h2>
                    <p>
                        @lang('digital-document-security.external-guidance-para1-1')
                        <a href="https://www.adobe.com/">@lang('digital-document-security.external-guidance-para1-2')</a>
                        @lang('digital-document-security.external-guidance-para1-3')
                    </p>
                    <p>@lang('digital-document-security.external-guidance-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.mistakes-heading')</h2>
                    <p>@lang('digital-document-security.mistakes-intro')</p>
                    <ul>
                        <li>@lang('digital-document-security.mistakes-item1')</li>
                        <li>@lang('digital-document-security.mistakes-item2')</li>
                        <li>@lang('digital-document-security.mistakes-item3')</li>
                        <li>@lang('digital-document-security.mistakes-item4')</li>
                        <li>@lang('digital-document-security.mistakes-item5')</li>
                    </ul>
                    <p>@lang('digital-document-security.mistakes-final')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.future-heading')</h2>
                    <p>@lang('digital-document-security.future-para1')</p>
                    <ul>
                        <li>@lang('digital-document-security.future-item1')</li>
                        <li>@lang('digital-document-security.future-item2')</li>
                        <li>@lang('digital-document-security.future-item3')</li>
                        <li>@lang('digital-document-security.future-item4')</li>
                    </ul>
                    <p>@lang('digital-document-security.future-foundation-intro')</p>
                    <p>@lang('digital-document-security.future-foundation-steps')</p>
                </section>

                <section class="mb-5">
                    <h2>@lang('digital-document-security.conclusion-heading')</h2>
                    <p>@lang('digital-document-security.conclusion-para1')</p>
                    <p>@lang('digital-document-security.conclusion-para2')</p>
                    <p>@lang('digital-document-security.conclusion-para3')</p>
                </section>

                <section>
                    <h2>@lang('digital-document-security.faqs-heading')</h2>

                    <div class="mb-3">
                        <h3>@lang('digital-document-security.faq1-question')</h3>
                        <p>@lang('digital-document-security.faq1-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('digital-document-security.faq2-question')</h3>
                        <p>@lang('digital-document-security.faq2-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('digital-document-security.faq3-question')</h3>
                        <p>@lang('digital-document-security.faq3-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('digital-document-security.faq4-question')</h3>
                        <p>@lang('digital-document-security.faq4-answer')</p>
                    </div>

                    <div class="mb-3">
                        <h3>@lang('digital-document-security.faq5-question')</h3>
                        <p>@lang('digital-document-security.faq5-answer')</p>
                    </div>
                </section>

            
            @include('components.author-bio-box', ['postId' => 60])
            @include('components.related-posts', ['postId' => 60])
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
            "name": "{{ __('digital-document-security.faq1-question') }}",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{{ __('digital-document-security.faq1-answer') }}"
            }
          },{
            "@type": "Question",
            "name": "{{ __('digital-document-security.faq2-question') }}",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{{ __('digital-document-security.faq2-answer') }}"
            }
          },{
            "@type": "Question",
            "name": "{{ __('digital-document-security.faq3-question') }}",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{{ __('digital-document-security.faq3-answer') }}"
            }
          },{
            "@type": "Question",
            "name": "{{ __('digital-document-security.faq4-question') }}",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{{ __('digital-document-security.faq4-answer') }}"
            }
          },{
            "@type": "Question",
            "name": "{{ __('digital-document-security.faq5-question') }}",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{{ __('digital-document-security.faq5-answer') }}"
            }
          }]
        }
        </script>
@endverbatim
@endsection