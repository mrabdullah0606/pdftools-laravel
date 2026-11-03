@extends('main')

@section('meta_canonical', 'http://127.0.0.1:8000/about-us')
@section('title', __('aboutUs.titles'))
@section('description', __('aboutUs.descriptions'))

@push('head')
   <link rel="stylesheet" href="{{asset('css/about.css')}}">
   <style>
       .team-avatar {
           width: 100px;
           height: 100px;
           border-radius: 50%;
           background: #f1f3f5;
           color: #adb5bd;
           display: flex;
           align-items: center;
           justify-content: center;
           margin: 0 auto 1.5rem;
           box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
           border: 3px solid #fff;
           transition: all 0.3s ease;
       }
       .team-card:hover .team-avatar {
           transform: scale(1.08);
           background: rgba(114, 97, 247, 0.15);
           color: #7261f7;
       }
       .team-card {
           background: #fff;
           border-radius: 16px;
           border: 1px solid rgba(114, 97, 247, 0.1);
           transition: all 0.3s ease;
           box-shadow: 0 4px 15px rgba(0,0,0,0.05);
           height: 100%;
       }
       .team-card:hover {
           transform: translateY(-8px);
           box-shadow: 0 12px 30px rgba(114, 97, 247, 0.15);
           border-color: rgba(114, 97, 247, 0.3);
       }
       .cred-card, .trust-card {
           background: #fff;
           border-radius: 16px;
           border: 1px solid rgba(114, 97, 247, 0.08);
           box-shadow: 0 4px 15px rgba(0,0,0,0.04);
           transition: all 0.3s ease;
       }
       .cred-card:hover, .trust-card:hover {
           transform: translateY(-5px);
           box-shadow: 0 10px 25px rgba(114, 97, 247, 0.1);
       }
       .cred-icon, .trust-icon {
           width: 50px;
           height: 50px;
           border-radius: 12px;
           background: rgba(114, 97, 247, 0.1);
           color: #7261f7;
           display: flex;
           align-items: center;
           justify-content: center;
           font-size: 1.5rem;
           margin-bottom: 1.25rem;
       }
       .contact-info-card {
           background: #fff;
           border-radius: 16px;
           border: 1px solid rgba(114, 97, 247, 0.1);
           box-shadow: 0 4px 20px rgba(0,0,0,0.05);
       }
       .contact-item {
           transition: all 0.3s ease;
           background: #f9fafb;
       }
       .contact-item:hover {
           background: #fff !important;
           border-color: #7261f7 !important;
           box-shadow: 0 8px 20px rgba(114, 97, 247, 0.08);
       }
       .contact-item svg {
           color: #7261f7;
       }
   </style>
@endpush

@section('page')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 text-center">
            <h1 class="about-title mb-4">@lang('aboutUs.about-title')</h1>
            <p class="lead text-muted fs-6">@lang('aboutUs.about-subtitle')</p>
        </div>
    </div>

    <!-- Purpose Section -->
    <div class="row g-5 mb-5 align-items-center">
        <div class="col-lg-6">
            <img src="{{ asset('images/about.jpg') }}" alt="Our Purpose" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-lg-6">
            <div class="mission-wrapper p-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-box me-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bullseye" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8"/>
  <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
</svg>
                    </div>
                    <h2 class="section-title mb-0">@lang('aboutUs.our-purpose')</h2>
                </div>
                <p class="text-muted fs-6">@lang('aboutUs.purpose-text')</p>
            </div>
        </div>
    </div>

    <!-- Credentials & Expertise Section -->
    <div class="row mb-5">
        <div class="col-lg-12 text-center mb-4">
            <h2 class="section-title">@lang('aboutUs.cred-title')</h2>
            <div class="title-underline mx-auto"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="cred-card p-4 h-100 text-center">
                    <div class="cred-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="m10.273 2.513-.257-.93a1.5 1.5 0 0 0-2.032-1.018l-.946.368a.5.5 0 0 1-.368 0L5.725.565A1.5 1.5 0 0 0 3.693 1.583l-.257.93a.5.5 0 0 1-.295.342l-.93.257a1.5 1.5 0 0 0-1.018 2.032l.368.946a.5.5 0 0 1 0 .368l-.368.946a1.5 1.5 0 0 0 1.018 2.032l.93.257a.5.5 0 0 1 .295.342l.257.93a1.5 1.5 0 0 0 2.032 1.018l.946-.368a.5.5 0 0 1 .368 0l.946.368a1.5 1.5 0 0 0 2.032-1.018l.257-.93a.5.5 0 0 1 .295-.342l.93-.257a1.5 1.5 0 0 0 1.018-2.032l-.368-.946a.5.5 0 0 1 0-.368l.368-.946a1.5 1.5 0 0 0-1.018-2.032l-.93-.257a.5.5 0 0 1-.295-.342zM8.5 14.156a.5.5 0 0 1-.168-.11L5.725 11.23a1.5 1.5 0 0 0-2.032-1.018l-.93.257a.5.5 0 0 1-.342-.295l-.257-.93a1.5 1.5 0 0 0-1.018-2.032l.368-.946a.5.5 0 0 1 0-.368L1.156 5.5a1.5 1.5 0 0 0 1.018-2.032l.93-.257a.5.5 0 0 1 .342-.295l.257-.93A1.5 1.5 0 0 0 5.725.97l.946.368a.5.5 0 0 1 .368 0l.946-.368a1.5 1.5 0 0 0 2.032 1.018l.257.93a.5.5 0 0 1 .342.295l.93.257a1.5 1.5 0 0 0 1.018 2.032l-.368.946a.5.5 0 0 1 0 .368l.368.946a1.5 1.5 0 0 0-1.018 2.032l-.93.257a.5.5 0 0 1-.342.295l-.257.93a1.5 1.5 0 0 0-2.032 1.018l-.946-.368a.5.5 0 0 1-.368 0l-.778.303z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.cred-cert-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.cred-cert-desc')</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="cred-card p-4 h-100 text-center">
                    <div class="cred-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.cred-pub-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.cred-pub-desc')</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="cred-card p-4 h-100 text-center">
                    <div class="cred-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.839-.535l.493-.87a7.97 7.97 0 0 1 1.013.646l-.667.76zm.93.93c-.29-.23-.6-.44-.93-.63l.53-.847a8.033 8.033 0 0 1 1.07.727l-.67.75zm.535 1.37c-.156-.37-.34-.73-.556-1.07l.842-.538c.25.39.46.8.638 1.23l-.924.378zm.299.985c-.046-.2-.103-.4-.173-.59l.944-.33c.09.24.167.49.23.743l-.985.219zM8 2c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm0 11c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/>
                            <path d="M8.5 4.466V8H11a.5.5 0 0 1 0 1H8a.5.5 0 0 1-.5-.5V4.466a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.cred-exp-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.cred-exp-desc')</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="cred-card p-4 h-100 text-center">
                    <div class="cred-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.cred-trust-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.cred-trust-desc')</p>
                </div>
            </div>
        </div>
    </div>

    <!-- What We Offer Section -->
    <div class="row mb-5">
        <div class="col-lg-12 text-center mb-4">
            <h2 class="section-title">@lang('aboutUs.what-we-offer')</h2>
            <div class="title-underline mx-auto"></div>
            <p class="text-muted fs-6 mt-3">@lang('aboutUs.offer-intro')</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-word-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.tool-1-title')</h4>
                    <p class="text-muted">@lang('aboutUs.tool-1-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
  <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
  <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.tool-2-title')</h4>
                    <p class="text-muted">@lang('aboutUs.tool-2-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-zip-fill" viewBox="0 0 16 16">
  <path d="M5.5 9.438V8.5h1v.938a1 1 0 0 0 .03.243l.4 1.598-.93.62-.93-.62.4-1.598a1 1 0 0 0 .03-.243"/>
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-4-.5V2h-1V1H6v1h1v1H6v1h1v1H6v1h1v1H5.5V6h-1V5h1V4h-1V3zm0 4.5h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.109 0l-.93-.62a1 1 0 0 1-.415-1.074l.4-1.599V8.5a1 1 0 0 1 1-1"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.tool-3-title')</h4>
                    <p class="text-muted">@lang('aboutUs.tool-3-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-collection-fill" viewBox="0 0 16 16">
  <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3m2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.tool-4-title')</h4>
                    <p class="text-muted">@lang('aboutUs.tool-4-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
  <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
  <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.tool-5-title')</h4>
                    <p class="text-muted">@lang('aboutUs.tool-5-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
  <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
  <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.tool-6-title')</h4>
                    <p class="text-muted">@lang('aboutUs.tool-6-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-medical-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0m-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1m0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.tool-7-title')</h4>
                    <p class="text-muted">@lang('aboutUs.tool-7-desc')</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="story-section p-4 rounded-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-box me-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-rocket-takeoff-fill" viewBox="0 0 16 16">
  <path d="M12.17 9.53c2.307-2.592 3.278-4.684 3.641-6.218.21-.887.214-1.58.16-2.065a3.6 3.6 0 0 0-.108-.563 2 2 0 0 0-.078-.23V.453c-.073-.164-.168-.234-.352-.295a2 2 0 0 0-.16-.045 4 4 0 0 0-.57-.093c-.49-.044-1.19-.03-2.08.188-1.536.374-3.618 1.343-6.161 3.604l-2.4.238h-.006a2.55 2.55 0 0 0-1.524.734L.15 7.17a.512.512 0 0 0 .433.868l1.896-.271c.28-.04.592.013.955.132.232.076.437.16.655.248l.203.083c.196.816.66 1.58 1.275 2.195.613.614 1.376 1.08 2.191 1.277l.082.202c.089.218.173.424.249.657.118.363.172.676.132.956l-.271 1.9a.512.512 0 0 0 .867.433l2.382-2.386c.41-.41.668-.949.732-1.526zm.11-3.699c-.797.8-1.93.961-2.528.362-.598-.6-.436-1.733.361-2.532.798-.799 1.93-.96 2.528-.361s.437 1.732-.36 2.531Z"/>
  <path d="M5.205 10.787a7.6 7.6 0 0 0 1.804 1.352c-1.118 1.007-4.929 2.028-5.054 1.903-.126-.127.737-4.189 1.839-5.18.346.69.837 1.35 1.411 1.925"/>
</svg>
                    </div>
                    <h2 class="section-title mb-0">@lang('aboutUs.mission-statement')</h2>
                </div>
                <p class="text-muted fs-6">@lang('aboutUs.mission-text')</p>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="story-section p-4 rounded-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-box me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg>
                    </div>
                    <h2 class="section-title mb-0">@lang('aboutUs.vision-platform')</h2>
                </div>
                <p class="text-muted fs-6">@lang('aboutUs.vision-text')</p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="row mb-5">
        <div class="col-lg-12 text-center mb-5">
            <h2 class="section-title">@lang('aboutUs.team-title')</h2>
            <div class="title-underline mx-auto"></div>
            <p class="text-muted fs-6 mt-3">@lang('aboutUs.team-subtitle')</p>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- CEO & Founder -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card p-4 text-center">
                    <div class="team-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold mb-1">@lang('aboutUs.team-ceo-name')</h4>
                    <span class="text-primary d-block mb-3 fw-bold">@lang('aboutUs.team-ceo-role')</span>
                    <p class="text-muted small mb-0">@lang('aboutUs.team-ceo-desc')</p>
                </div>
            </div>
            <!-- Lead Dev -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card p-4 text-center">
                    <div class="team-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold mb-1">@lang('aboutUs.team-dev-name')</h4>
                    <span class="text-primary d-block mb-3 fw-bold">@lang('aboutUs.team-dev-role')</span>
                    <p class="text-muted small mb-0">@lang('aboutUs.team-dev-desc')</p>
                </div>
            </div>
            <!-- Customer Success -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card p-4 text-center">
                    <div class="team-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold mb-1">@lang('aboutUs.team-success-name')</h4>
                    <span class="text-primary d-block mb-3 fw-bold">@lang('aboutUs.team-success-role')</span>
                    <p class="text-muted small mb-0">@lang('aboutUs.team-success-desc')</p>
                </div>
            </div>
            <!-- Security & Compliance -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card p-4 text-center">
                    <div class="team-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold mb-1">@lang('aboutUs.team-security-name')</h4>
                    <span class="text-primary d-block mb-3 fw-bold">@lang('aboutUs.team-security-role')</span>
                    <p class="text-muted small mb-0">@lang('aboutUs.team-security-desc')</p>
                </div>
            </div>
        </div>
    </div>

    <!-- History Section -->
    <div class="row mb-5 py-4 bg-light rounded-4 border border-light">
        <div class="col-lg-12 px-5">
            <h2 class="section-title text-center text-md-start">@lang('aboutUs.history-title')</h2>
            <div class="title-underline mb-4" style="width: 60px; height: 3px; background-color: #7261f7;"></div>
            <p class="text-muted fs-6" style="line-height: 1.8;">@lang('aboutUs.history-text')</p>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="row mb-5">
        <div class="col-lg-12 text-center mb-4">
            <h2 class="section-title">@lang('aboutUs.why-choose-us')</h2>
            <div class="title-underline mx-auto"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gift-fill" viewBox="0 0 16 16">
  <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.feature-1-title')</h4>
                    <p class="text-muted">@lang('aboutUs.feature-1-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.feature-2-title')</h4>
                    <p class="text-muted">@lang('aboutUs.feature-2-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
  <path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.feature-3-title')</h4>
                    <p class="text-muted">@lang('aboutUs.feature-3-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.feature-4-title')</h4>
                    <p class="text-muted">@lang('aboutUs.feature-4-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lightning-fill" viewBox="0 0 16 16">
  <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.feature-5-title')</h4>
                    <p class="text-muted">@lang('aboutUs.feature-5-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-infinity" viewBox="0 0 16 16">
  <path d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.feature-6-title')</h4>
                    <p class="text-muted">@lang('aboutUs.feature-6-desc')</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Trust & Security Section -->
    <div class="row mb-5">
        <div class="col-lg-12 text-center mb-4">
            <h2 class="section-title">@lang('aboutUs.trust-title')</h2>
            <div class="title-underline mx-auto"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="trust-card p-4 h-100 text-center">
                    <div class="trust-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915V9.5a.5.5 0 0 1-1 0V7.915A1.5 1.5 0 0 1 8 5z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.trust-sec-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.trust-sec-desc')</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="trust-card p-4 h-100 text-center">
                    <div class="trust-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-earmark-lock-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8 6a2.5 2.5 0 0 1 2.5 2.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1A2.5 2.5 0 0 1 8 6zm1.5 3.5v-1a1.5 1.5 0 0 0-3 0v1z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.trust-priv-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.trust-priv-desc')</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="trust-card p-4 h-100 text-center">
                    <div class="trust-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16H4.885a2 2 0 0 1-1.993-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.trust-trans-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.trust-trans-desc')</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="trust-card p-4 h-100 text-center">
                    <div class="trust-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">@lang('aboutUs.trust-track-title')</h5>
                    <p class="text-muted small mb-0">@lang('aboutUs.trust-track-desc')</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Who Can Use Section -->
    <div class="row mb-5">
        <div class="col-lg-12 text-center mb-4">
            <h2 class="section-title">@lang('aboutUs.who-can-use')</h2>
            <div class="title-underline mx-auto"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.user-1-title')</h4>
                    <p class="text-muted">@lang('aboutUs.user-1-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
  <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
  <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.user-2-title')</h4>
                    <p class="text-muted">@lang('aboutUs.user-2-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-laptop-fill" viewBox="0 0 16 16">
  <path d="M2.5 2A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.user-3-title')</h4>
                    <p class="text-muted">@lang('aboutUs.user-3-desc')</p>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6">
                <div class="feature-card p-4 h-100">
                    <div class="feature-icon mb-3">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
  <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
</svg>
                    </div>
                    <h4 class="feature-title mb-3">@lang('aboutUs.user-4-title')</h4>
                    <p class="text-muted">@lang('aboutUs.user-4-desc')</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action & Contact Info -->
    <div class="row g-4 mb-5">
        <div class="col-lg-12">
            <div class="cta-section text-center p-5 rounded-4 mb-4">
                <h2 class="text-white mb-3" style="color: #fff !important;">@lang('aboutUs.cta-title')</h2>
                <p class="text-white-50 mb-4 fs-5" style="color: rgba(255,255,255,0.8) !important;">@lang('aboutUs.cta-subtitle')</p>
                <a href="{{localized_route('contact-us')}}" class="btn btn-light btn-lg px-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                        <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>
                    </svg>   @lang('aboutUs.cta-button')
                </a>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="contact-info-card p-5 rounded-4 shadow-sm text-center">
                <h3 class="mb-3 fw-bold text-gradient">@lang('aboutUs.contact-info-title')</h3>
                <p class="text-muted mb-4 fs-6">@lang('aboutUs.contact-info-desc')</p>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="contact-item p-4 border rounded-4 h-100 text-center d-flex flex-column align-items-center justify-content-center">
                            <div class="contact-item-icon mb-3" style="color: #7261f7;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.562L16 11.801V4.697z"/>
                                </svg>
                            </div>
                            <div class="fw-bold mb-1 fs-5">@lang('aboutUs.contact-email-label')</div>
                            <a href="mailto:support@pdftools.net" class="text-decoration-none fw-bold" style="color: #7261f7;">support@pdftools.net</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-item p-4 border rounded-4 h-100 text-center d-flex flex-column align-items-center justify-content-center">
                            <div class="contact-item-icon mb-3" style="color: #7261f7;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                                    <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                </svg>
                            </div>
                            <div class="fw-bold mb-1 fs-5">@lang('aboutUs.contact-response-label')</div>
                            <span class="text-muted fw-bold">@lang('aboutUs.contact-response-value')</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-item p-4 border rounded-4 h-100 text-center d-flex flex-column align-items-center justify-content-center">
                            <div class="contact-item-icon mb-3" style="color: #7261f7;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                </svg>
                            </div>
                            <div class="fw-bold mb-1 fs-5">@lang('aboutUs.contact-hours-label')</div>
                            <span class="text-muted fw-bold">@lang('aboutUs.contact-hours-value')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection