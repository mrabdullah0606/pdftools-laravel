@extends('main')
@section('meta_canonical', 'http://127.0.0.1:8000/security')
@section('title', __('security.title1'))
@section('description', __('security.description'))

@section('page')
<div class="container py-5" style="font-family: 'Poppins', sans-serif;">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold text-dark mb-3">@lang('security.title')</h1>
            <p class="lead text-muted fs-6">@lang('security.subtitle')</p>
            <div class="mx-auto" style="width: 80px; height: 4px; background: linear-gradient(90deg, #7261f7, #8575f5); border-radius: 2px;"></div>
        </div>
    </div>
    
    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border border-light p-4 h-100 shadow-sm" style="border-radius: 16px;">
                <div class="mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(114, 97, 247, 0.1); color: #7261f7;">
                    <svg width="24" height="24" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793z"/>
                    </svg>
                </div>
                <h4 class="fw-bold text-dark fs-5 mb-2">@lang('security.sec_title1')</h4>
                <p class="text-muted small mb-0" style="line-height: 1.6;">@lang('security.sec_text1')</p>
            </div>
        </div>
        
        <!-- Card 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border border-light p-4 h-100 shadow-sm" style="border-radius: 16px;">
                <div class="mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(114, 97, 247, 0.1); color: #7261f7;">
                    <svg width="24" height="24" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                    </svg>
                </div>
                <h4 class="fw-bold text-dark fs-5 mb-2">@lang('security.sec_title2')</h4>
                <p class="text-muted small mb-0" style="line-height: 1.6;">@lang('security.sec_text2')</p>
            </div>
        </div>
        
        <!-- Card 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border border-light p-4 h-100 shadow-sm" style="border-radius: 16px;">
                <div class="mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(114, 97, 247, 0.1); color: #7261f7;">
                    <svg width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                    </svg>
                </div>
                <h4 class="fw-bold text-dark fs-5 mb-2">@lang('security.sec_title3')</h4>
                <p class="text-muted small mb-0" style="line-height: 1.6;">@lang('security.sec_text3')</p>
            </div>
        </div>
        
        <!-- Card 4 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border border-light p-4 h-100 shadow-sm" style="border-radius: 16px;">
                <div class="mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(114, 97, 247, 0.1); color: #7261f7;">
                    <svg width="24" height="24" fill="currentColor" class="bi bi-file-earmark-lock2-fill" viewBox="0 0 16 16">
                        <path d="M9 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4z M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 3v3a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a2 2 0 0 1 4 0v1h1a1 1 0 0 1 1 1z"/>
                    </svg>
                </div>
                <h4 class="fw-bold text-dark fs-5 mb-2">@lang('security.sec_title4')</h4>
                <p class="text-muted small mb-0" style="line-height: 1.6;">@lang('security.sec_text4')</p>
            </div>
        </div>
        
        <!-- Card 5 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border border-light p-4 h-100 shadow-sm" style="border-radius: 16px;">
                <div class="mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(114, 97, 247, 0.1); color: #7261f7;">
                    <svg width="24" height="24" fill="currentColor" class="bi bi-hdd-network-fill" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1 M7.5 16h1v-1.18a4.978 4.978 0 0 0 3.787-2.32H16v-1h-3.713a4.98 4.98 0 0 0-3.787-2.32V8h-1v1.18a4.98 4.98 0 0 0-3.788 2.32H0v1h3.712A4.98 4.98 0 0 0 7.5 14.82zM8.5 10.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                    </svg>
                </div>
                <h4 class="fw-bold text-dark fs-5 mb-2">@lang('security.sec_title5')</h4>
                <p class="text-muted small mb-0" style="line-height: 1.6;">@lang('security.sec_text5')</p>
            </div>
        </div>
    </div>
</div>
@endsection
