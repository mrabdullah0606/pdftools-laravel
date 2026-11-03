
@extends('main')
@section('meta_canonical', 'http://127.0.0.1:8000/contact-us')
@section('title', __('terms.title1'))
@section('description', __('terms.description'))
@push('head')
    <style>
		.text-blue{
			color: #7a69f6;
		}
    </style>
@endpush

@section('page')

<<div class="container text-center pt-5">
	<h1 class="text-blue display-4 fw-semibold">@lang('terms.title')</h1>
</div>
<div class="container py-5">
	<p class="text-center">@lang('terms.intro')</p>
	<div class="row py-5 mx-auto d-flex align-items-center">
		<div class="col-md-6">
			<img src="{{ asset('images/7050124.jpg') }}" loading="lazy" class="img-fluid" alt="7050124">
		</div>
		<div class="col-md-6 mtm">
			<ul>
				<li>@lang('terms.points.no_illegal_uploads')</li>
				<li>@lang('terms.points.no_reverse_engineering')</li>
				<li>@lang('terms.points.no_illegal_activity')</li>
				<li>@lang('terms.points.terms_subject_to_change')</li>
			</ul>
		</div>
	</div>
</div>
@endsection
