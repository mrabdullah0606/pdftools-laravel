

@extends('main')
@section('meta_canonical', 'http://127.0.0.1:8000/contact-us')
@section('title', __('privacy.title1'))
@section('description', __('privacy.description'))

@push('head')
    <style>
		.text-blue{
			color: #7a69f6;
		}
    </style>
@endpush

@section('page')


<div class="container text-center pt-5">
	<h1 class="text-blue display-4 fw-semibold">@lang('privacy.title')</h1>
</div>
<div class="container py-5">
	<div class="row py-5 mx-auto d-flex align-items-center">
		<div class="col-md-6">
			<img src="{{asset('images/2867048.jpg')}}" loading="lazy" class="img-fluid" alt="2867048">
			<ul class="mt-2">
				<li>@lang('privacy.bullet_points.0')</li>
        <li>@lang('privacy.bullet_points.1')</li>
        <li>@lang('privacy.bullet_points.2')</li>
        <li>@lang('privacy.bullet_points.3')</li>
        <li>@lang('privacy.bullet_points.4')</li>
			</ul>
		</div>
		<div class="col-md-6 mtm">
			<h2>@lang('privacy.cookies_section_title')</h2>
            <p>@lang('privacy.cookies_section_content')</p>

            <h2>@lang('privacy.ads_section_title')</h2>
            <p>@lang('privacy.ads_section_intro')</p>
            <p>@lang('privacy.ads_section_content_1')</p>
            <p>@lang('privacy.ads_section_content_2')</p>
		</div>
	</div>
</div>

@endsection
