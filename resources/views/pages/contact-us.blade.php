@extends('main')

@section('meta_canonical', 'http://127.0.0.1:8000/contact-us')
@section('title', __('contactus.title'))
@section('description', __('contactus.description'))

@push('head')
   <link rel="stylesheet" href="{{asset('css/contact.css')}}">
   <style>
       .contact-card-sidebar {
           background: #fff;
           border-radius: 16px;
           border: 1px solid rgba(114, 97, 247, 0.1);
           box-shadow: 0 4px 15px rgba(0,0,0,0.05);
           transition: all 0.3s ease;
       }
       .contact-card-sidebar:hover {
           box-shadow: 0 8px 25px rgba(114, 97, 247, 0.08);
           border-color: rgba(114, 97, 247, 0.2);
       }
       .contact-icon-box {
           width: 40px;
           height: 40px;
           border-radius: 10px;
           background: rgba(114, 97, 247, 0.1);
           color: #7261f7;
           display: flex;
           align-items: center;
           justify-content: center;
           flex-shrink: 0;
       }
       .contact-avatar {
           width: 55px;
           height: 55px;
           border-radius: 50%;
           background: linear-gradient(135deg, #7261f7 0%, #8575f5 100%);
           color: #fff;
           font-weight: bold;
           font-size: 1.2rem;
           display: flex;
           align-items: center;
           justify-content: center;
           box-shadow: 0 4px 12px rgba(114, 97, 247, 0.2);
           border: 2px solid #fff;
       }
       .text-gradient {
           background: linear-gradient(45deg, #7261f7, #8575f5);
           -webkit-background-clip: text;
           -webkit-text-fill-color: transparent;
       }
       .contact-image-small {
           border-radius: 16px;
           box-shadow: 0 6px 18px rgba(0,0,0,0.08);
           max-height: 250px;
           object-fit: cover;
           width: 100%;
       }
   </style>
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

@section('page')
<div class="container py-5">
    <div id="loader">
        <div class="w-100 vh-100 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/loader.gif') }}" alt="Loading...">
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <h1 class="contact-title">@lang('contactus.Contact-us')</h1>
        <p class="text-muted text-center fs-5">@lang('contactus.We\'d-love')</p>
    </div>

    <div class="row g-5">
        <!-- Left Sidebar: Contact Details & Support Lead -->
        <div class="col-lg-5">
            <!-- Contact Image Small -->
            <img src="{{ asset('images/contact-us.avif') }}" alt="contact-us" class="img-fluid contact-image-small mb-4">
            
            <!-- Contact Methods Card -->
            <div class="contact-card-sidebar p-4 rounded-4 mb-4">
                <h3 class="fw-bold mb-4 text-gradient">@lang('contactus.contact-methods')</h3>
                
                <div class="d-flex align-items-start mb-3">
                    <div class="contact-icon-box me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.562L16 11.801V4.697z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="fw-bold">@lang('contactus.email-label')</div>
                        <a href="mailto:support@pdftools.net" class="text-decoration-none fw-bold" style="color: #7261f7;">support@pdftools.net</a>
                    </div>
                </div>
                
                <div class="d-flex align-items-start mb-3">
                    <div class="contact-icon-box me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                            <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="fw-bold">@lang('contactus.response-label')</div>
                        <span class="text-muted">@lang('contactus.response-value')</span>
                    </div>
                </div>

                <div class="d-flex align-items-start">
                    <div class="contact-icon-box me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="fw-bold">@lang('contactus.hours-label')</div>
                        <span class="text-muted">@lang('contactus.hours-value')</span>
                    </div>
                </div>
            </div>

            <!-- Support Team Card -->
            <div class="contact-card-sidebar p-4 rounded-4">
                <h3 class="fw-bold mb-4 text-gradient">@lang('contactus.support-team')</h3>
                <div class="d-flex align-items-center mb-3">
                    <div class="contact-avatar me-3">MA</div>
                    <div>
                        <h5 class="fw-bold mb-0">@lang('contactus.support-lead-name')</h5>
                        <span class="text-muted small">@lang('contactus.support-lead-role')</span>
                    </div>
                </div>
                <div class="p-3 bg-light rounded-3 text-center border-start border-primary border-3" style="border-left-color: #7261f7 !important;">
                    <div class="fw-bold" style="color: #7261f7;">@lang('contactus.guarantee-label')</div>
                    <span class="small text-muted">@lang('contactus.guarantee-value')</span>
                </div>
            </div>
        </div>

        <!-- Right Form -->
        <div class="col-lg-7">
            @if (session('success'))
                <div class="alert alert-success">@lang('contactus.success_message')</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="contact-wrapper">
                <form id="contact-form" method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <!-- Name -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="contact-name" name="name"
                               placeholder="@lang('contactus.enter-your-name')" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="contact-email" name="email"
                               placeholder="@lang('contactus.enter-email')" required>
                    </div>

                    <!-- Message -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-comment"></i></span>
                        <textarea class="form-control" id="contact-message" name="message" rows="6"
                                  placeholder="@lang('contactus.enter-message')" required></textarea>
                    </div>

                    <!-- reCAPTCHA -->
                    <div class="mb-4 d-flex justify-content-center">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    </div>
                    @error('g-recaptcha-response')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-center">
                        <button type="submit" class="btn-submit w-50">
                            <i class="fas fa-paper-plane me-2"></i>@lang('contactus.send-message')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div> --}}
{{-- @endif --}}


{{-- jQuery + AJAX --}}
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $('#contact-form').on('submit', function(event) {-->
<!--            event.preventDefault();-->
<!--            $('#loader').show();-->

<!--            $.ajax({-->
<!--                url: $(this).attr('action'),-->
<!--                method: $(this).attr('method'),-->
<!--                data: $(this).serialize(),-->
<!--                success: function(response) {-->
<!--                    $('#loader').hide();-->
<!--                    if (response.status === 'success') {-->
<!--                        $('.alert').removeClass('alert-danger').addClass('alert-success').html(response.message);-->
<!--                        $('#contact-form').trigger('reset');-->
<!--                    } else {-->
<!--                        $('.alert').removeClass('alert-success').addClass('alert-danger').html(response.message);-->
<!--                    }-->
<!--                },-->
<!--                error: function() {-->
<!--                    $('#loader').hide();-->
<!--                    $('.alert').removeClass('alert-success').addClass('alert-danger').html("Something went wrong!");-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->
@endsection