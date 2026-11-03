
@extends('main')
@section('meta_canonical', 'http://127.0.0.1:8000/contact-us')
@section('title', __('privacy.title1'))
@section('description', __('privacy.description'))

@push('head')
    <link rel="stylesheet" href="{{asset('css/privacy.css')}}">
@endpush

@section('page')

<div class="container text-center pt-5">
    <h1 class="privacy-title display-4 fw-bold">@lang('privacy.title')</h1>
    <p class="privacy-subtitle mt-3">@lang('privacy.description')</p>
</div>

<div class="container py-5">
    <div class="row g-5 align-items-start">
        <!-- Left Section -->
        <div class="col-md-6">
            <div class="privacy-wrapper h-100">
                <img src="{{asset('images/2867048.jpg')}}" loading="lazy" class="img-fluid privacy-image mb-4" alt="privacy">
                <ul class="privacy-list">
                    @foreach(__('privacy.bullet_points') as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-md-6">
            <div class="privacy-wrapper privacy-section h-100">
                <h2>@lang('privacy.cookies_section_title')</h2>
                <p>@lang('privacy.cookies_section_content')</p>

                <h2>@lang('privacy.ads_section_title')</h2>
                <p>@lang('privacy.ads_section_intro')</p>
                <p>@lang('privacy.ads_section_content_1')</p>
                <p>@lang('privacy.ads_section_content_2')</p>
            </div>
        </div>
    </div>
</div>

@endsection
