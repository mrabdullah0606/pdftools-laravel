
@extends('main')
@section('meta_canonical', 'http://127.0.0.1:8000/contact-us')
@section('title', __('terms.title1'))
@section('description', __('terms.description'))

@push('head')
    <link rel="stylesheet" href="{{asset('css/terms.css')}}">
@endpush

@section('page')

<div class="container text-center pt-5">
    <h1 class="terms-title display-4 fw-bold">@lang('terms.title')</h1>
    <p class="terms-subtitle mt-3">@lang('terms.intro')</p>
</div>

<div class="container py-5">
    <div class="row g-5 align-items-center">
        <!-- Left Side Image -->
        <div class="col-md-6">
            <div class="terms-wrapper h-100">
                <img src="{{ asset('images/7050124.jpg') }}" loading="lazy" class="img-fluid terms-image" alt="terms">
            </div>
        </div>

        <!-- Right Side List -->
        <div class="col-md-6">
            <div class="terms-wrapper h-100">
                <ul class="terms-list">
                    <li>@lang('terms.points.no_illegal_uploads')</li>
                    <li>@lang('terms.points.no_reverse_engineering')</li>
                    <li>@lang('terms.points.no_illegal_activity')</li>
                    <li>@lang('terms.points.terms_subject_to_change')</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
