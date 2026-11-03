@extends('main')

@section('title', __('faq.meta_title'))
@section('description', __('faq.meta_description'))

@push('head')
    <style>
        .faq-hero {
            background: linear-gradient(135deg, #7261f7 0%, #8575f5 100%);
            color: #fff;
            padding: 80px 0;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            margin-bottom: 50px;
        }
        .faq-accordion .accordion-item {
            border: 1px solid rgba(114, 97, 247, 0.1);
            border-radius: 16px !important;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
        }
        .faq-accordion .accordion-item:hover {
            box-shadow: 0 8px 25px rgba(114, 97, 247, 0.06);
            border-color: rgba(114, 97, 247, 0.2);
        }
        .faq-accordion .accordion-button {
            padding: 24px;
            font-weight: 600;
            color: #1a1a2e;
            font-size: 1.1rem;
            background: #fff;
        }
        .faq-accordion .accordion-button:not(.collapsed) {
            color: #7261f7;
            background-color: rgba(114, 97, 247, 0.02);
            box-shadow: none;
        }
        .faq-accordion .accordion-button::after {
            background-size: 1.25rem;
        }
        .faq-accordion .accordion-body {
            padding: 24px;
            color: #6b7280;
            line-height: 1.6;
            background-color: #fff;
            font-size: 1rem;
        }
        .faq-contact-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid rgba(114, 97, 247, 0.1);
            box-shadow: 0 10px 30px rgba(114, 97, 247, 0.05);
            padding: 40px;
            margin-top: 60px;
            text-align: center;
        }
        .faq-contact-btn {
            background: linear-gradient(135deg, #7261f7 0%, #8575f5 100%);
            color: #fff;
            border: none;
            padding: 14px 35px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .faq-contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(114, 97, 247, 0.3);
            color: #fff;
        }
    </style>
@endpush

@section('page')
<div class="faq-hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">@lang('faq.page_title')</h1>
        <p class="lead fs-5 mb-0" style="opacity: 0.9;">@lang('faq.page_subtitle')</p>
    </div>
</div>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion faq-accordion" id="faqAccordion">
                
                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            @lang('faq.q1')
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            @lang('faq.a1')
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            @lang('faq.q2')
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            @lang('faq.a2')
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            @lang('faq.q3')
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            @lang('faq.a3')
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            @lang('faq.q4')
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            @lang('faq.a4')
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            @lang('faq.q5')
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            @lang('faq.a5')
                        </div>
                    </div>
                </div>

            </div>

            <!-- Still Have Questions? -->
            <div class="faq-contact-card">
                <h3 class="fw-bold mb-2">@lang('faq.still_questions_title')</h3>
                <p class="text-muted mb-4">@lang('faq.still_questions_desc')</p>
                <a href="{{ localized_route('contact-us') }}" class="faq-contact-btn">
                    <i class="fas fa-envelope me-2"></i>@lang('faq.contact_btn')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
