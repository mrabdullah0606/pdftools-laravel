@extends('main')

@section('meta_canonical', 'http://127.0.0.1:8000/contact-us')
@section('title', __('ContactUs.title'))
@section('description', __('ContactUs.description'))

@push('head')
    <style>
        /* Loader CSS */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: rgba(255, 255, 255, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
        }
        #loader img {
            width: 60px;
        }

        /* Contact Form Styling */
        .contact-wrapper {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
        }

        .contact-title {
            font-weight: 700;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #2575fc;
            box-shadow: none;
        }

        .btn-submit {
            border-radius: 30px;
            padding: 12px 20px;
            font-size: 18px;
            font-weight: 600;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        .contact-image {
            border-radius: 15px;
            box-shadow: 0px 6px 18px rgba(0,0,0,0.1);
        }
        
    </style>
@endpush

@section('page')
<div class="container py-5">
    <div id="loader">
        <div class="w-100 vh-100 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/loader.gif') }}" alt="Loading...">
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <h1 class="contact-title">@lang('ContactUs.Contact-us')</h1>
        <p class="text-muted text-center fs-5">@lang('ContactUs.We\'d-love')</p>
    </div>

    <div class="row g-5 align-items-center">
        <!-- Left Image -->
        <div class="col-lg-6">
            <img src="{{ asset('images/contact-us.avif') }}" alt="contact-us" class="img-fluid contact-image">
        </div>

        <!-- Right Form -->
        <div class="col-lg-6">
            <!-- Messages -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="contact-wrapper">
                <form id="contact-form" method="POST"> 
                    {{-- action="{{ route('contact.send') }}" --}}
                    @csrf
                    <div class="mb-4">
                        <input type="text" 
                               class="form-control" 
                               id="contact-name" 
                               name="name" 
                               placeholder="@lang('ContactUs.enter-your-name')" 
                               required>
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="email" 
                               class="form-control" 
                               id="contact-email" 
                               name="email" 
                               placeholder="@lang('ContactUs.enter-email')" 
                               required>
                        @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <textarea class="form-control" 
                                  id="contact-message" 
                                  name="message" 
                                  rows="4" 
                                  placeholder="@lang('ContactUs.enter-message')" 
                                  required></textarea>
                        @error('message')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn-submit w-50">@lang('ContactUs.send-message')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contact-form').on('submit', function(event) {
            event.preventDefault();
            $('#loader').show();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#loader').hide();
                    if (response.status === 'success') {
                        $('.alert').removeClass('alert-danger').addClass('alert-success').html(response.message);
                        $('#contact-form').trigger('reset');
                    } else {
                        $('.alert').removeClass('alert-success').addClass('alert-danger').html(response.message);
                    }
                },
                error: function() {
                    $('#loader').hide();
                    $('.alert').removeClass('alert-success').addClass('alert-danger').html("Something went wrong!");
                }
            });
        });
    });
</script>
@endsection
