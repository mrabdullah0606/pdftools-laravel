@extends('main')
@section('title', __('home.title'))
@section('description', __('home.description'))

@push('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@section('page')
    {{-- header --}}
    <section class="hero-section">
        <div class="container text-center py-4">
            {{-- <h1 class="hero-title mb-3">@lang('home.heading')</h1> --}}
            <h1 class="hero-title mb-3">{{__('home.heading')}}</h1>

            <p class="lead mb-5">{{__('home.heading-des')}}
            </p>
            
    </section>
    <!-- Main Tools Section -->
    <section class="tools-section" id="tools-section">
        <div class="container">
            <div class="row g-4">
                <!-- Tool Card 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-1">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path
                                    d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm57.1 120H305c7.7 0 13.4 7.1 11.7 14.7l-38 168c-1.2 5.5-6.1 9.3-11.7 9.3h-38c-5.5 0-10.3-3.8-11.6-9.1-25.8-103.5-20.8-81.2-25.6-110.5h-.5c-1.1 14.3-2.4 17.4-25.6 110.5-1.3 5.3-6.1 9.1-11.6 9.1H117c-5.6 0-10.5-3.9-11.7-9.4l-37.8-168c-1.7-7.5 4-14.6 11.7-14.6h24.5c5.7 0 10.7 4 11.8 9.7 15.6 78 20.1 109.5 21 122.2 1.6-10.2 7.3-32.7 29.4-122.7 1.3-5.4 6.1-9.1 11.7-9.1h29.1c5.6 0 10.4 3.8 11.7 9.2 24 100.4 28.8 124 29.6 129.4-.2-11.2-2.6-17.8 21.6-129.2 1-5.6 5.9-9.5 11.5-9.5zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z" />
                            </svg>
                        </div>
                        <h2>{{__('home.pdf-to-word')}}</h2>
                        <p>{{__('home.pdf-to-word-des')}}
                        </p>
                        <a href="{{ localized_route('pdf-to-word') }}" class="btn btn-tool">{{__('home.pdftoword-convert')}}</a>
                    </div>
                </div>

                <!-- Tool Card 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-2">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path
                                    d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.3 10.7 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.5 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-73.6 44.5v136h245.5v-136c-38.4-23.1-72.5-54.7-95.5-74.5zm-73.6 87.1c5.3-13.5 8.9-25.1 10.7-31.6 11.5 23.4 29.2 40.5 52.3 52.6-34.8 24.8-63 47.4-63 47.4v-68zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z" />
                            </svg>
                        </div>
                        <h2>{{__('home.word-to-pdf')}}</h2>
                        <p>{{__('home.word-to-pdf-des')}}</p>
                        <a href="{{ localized_route('word-to-pdf') }}" class="btn btn-tool">{{__('home.wordtopdf-convert')}}</a>
                    </div>
                </div>

                <!-- Tool Card 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-3">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 448 512" fill="currentColor">
                                <path
                                    d="M416 32H32C14.3 32 0 46.3 0 64v384c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32zm-64 128H256v64h96v64h-96v64h96v64H160V32h192v128z" />
                            </svg>
                        </div>
                        <h2>{{__('home.compress-pdf')}}</h2>
                        <p>{{__('home.compress-pdf-des')}}</p>
                        <a href="{{ localized_route('compress-pdf') }}" class="btn btn-tool">{{__('home.compress-btn')}}</a>
                    </div>
                </div>

                <!-- Tool Card 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-4">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path
                                    d="M384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.3 10.7 24 24 24zm-59.6 109.6l-33.2 17.6c-9.1-15.3-23.5-27.6-41.1-34.3 15.4-19.3 39.8-32.9 68.5-32.9 8.4 0 16.5 1.1 24.2 3v-65.2c-23.2-5.4-47.6-4.7-72.4 3.8-33.6 11.5-60.4 36.6-75.1 66.1-23.7 47.9-15.5 105 19.8 143 6.4 6.9 15.2 11.5 24.6 11.5 17.2 0 31.2-14 31.2-31.2 0-10.1-4.8-19.1-12.2-24.8-3.9-3.1-7.3-7.1-9.5-11.9-5.6-12.1-3.9-25.9 3.8-36.5 3.3-4.6 7.9-8.1 13.3-9.9l18-6.9c4.3-1.7 8.9-2.6 13.6-2.6 10.9 0 20.9 4.2 28.3 11.8 19.5 19.9 17.8 52.4-3.8 70.1-14.8 12.1-35.6 15.7-53.9 9.5l33.2-17.6c9.1 15.3 23.5 27.6 41.1 34.3-15.4 19.3-39.8 32.9-68.5 32.9-8.4 0-16.5-1.1-24.2-3v65.2c23.2 5.4 47.6 4.7 72.4-3.8 33.6-11.5 60.4-36.6 75.1-66.1 23.7-47.9 15.5-105-19.8-143-6.4-6.9-15.2-11.5-24.6-11.5-17.2 0-31.2 14-31.2 31.2 0 10.1 4.8 19.1 12.2 24.8 3.9 3.1 7.3 7.1 9.5 11.9 5.6 12.1 3.9 25.9-3.8 36.5-3.3 4.6-7.9 8.1-13.3 9.9l-18 6.9c-4.3 1.7-8.9 2.6-13.6 2.6-10.9 0-20.9-4.2-28.3-11.8-19.5-19.9-17.8-52.4 3.8-70.1 14.8-12.1 35.6-15.7 53.9-9.5z" />
                            </svg>
                        </div>
                        <h2>{{__('home.merge-pdf')}}</h2>
                        <p>{{__('home.merge-pdf-des')}}</p>
                        <a href="{{ localized_route('merge-pdf') }}" class="btn btn-tool">{{__('home.mergepdf-btn')}}</a>
                    </div>
                </div>

                <!-- Tool Card 5 -->


                <!-- Tool Card 6 -->


                <!-- Tool Card 7 -->
                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-2">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path
                                    d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm-96 144c0 4.4-3.6 8-8 8h-8c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h8c4.4 0 8 3.6 8 8v16zm96 0c0 4.4-3.6 8-8 8h-8c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h8c4.4 0 8 3.6 8 8v16zm-32-56v-8c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-8-104c-13.3 0-24 10.7-24 24s10.7 24 24 24 24-10.7 24-24-10.7-24-24-24zm136 240H184c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h136c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0-64H184c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h136c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0-64H184c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h136c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0-64H184c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h136c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z" />
                            </svg>
                        </div>
                        <h2>{{__('home.pdf-to-jpg')}}</h2>
                        <p>{{__('home.pdf-to-jpg-des')}}</p>
                        <a href="{{ localized_route('pdf-to-jpg') }}" class="btn btn-tool">{{__('home.pdftojpg-btn')}}</a>
                    </div>
                </div>

                <!-- Tool Card 8 -->

                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-3">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path
                                    d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm76.45 211.36l-96.42 95.7c-6.65 6.61-17.39 6.61-24.04 0l-96.42-95.7C73.42 337.29 80.54 320 94.82 320H160v-80c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v80h65.18c14.28 0 21.4 17.29 11.27 27.36zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z" />
                            </svg>
                        </div>
                        <h2>{{__('home.jpg-to-pdf')}}</h2>
                        <p>{{__('home.jpgtopdf-des')}}</p>
                        <a href="{{ localized_route('jpg-to-pdf') }}" class="btn btn-tool">{{__('home.jpgtopdf-btn')}}</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-1">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path
                                    d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm-11.4 109.6l-33.2 17.6c-9.1-15.3-23.5-27.6-41.1-34.3 15.4-19.3 39.8-32.9 68.5-32.9 8.4 0 16.5 1.1 24.2 3v-65.2c-23.2-5.4-47.6-4.7-72.4 3.8-33.6 11.5-60.4 36.6-75.1 66.1-23.7 47.9-15.5 105 19.8 143 6.4 6.9 15.2 11.5 24.6 11.5 17.2 0 31.2-14 31.2-31.2 0-10.1-4.8-19.1-12.2-24.8-3.9-3.1-7.3-7.1-9.5-11.9-5.6-12.1-3.9-25.9 3.8-36.5 3.3-4.6 7.9-8.1 13.3-9.9l18-6.9c4.3-1.7 8.9-2.6 13.6-2.6 10.9 0 20.9 4.2 28.3 11.8 19.5 19.9 17.8 52.4-3.8 70.1-14.8 12.1-35.6 15.7-53.9 9.5l33.2-17.6c9.1 15.3 23.5 27.6 41.1 34.3-15.4 19.3-39.8 32.9-68.5 32.9-8.4 0-16.5-1.1-24.2-3v65.2c23.2 5.4 47.6 4.7 72.4-3.8 33.6-11.5 60.4-36.6 75.1-66.1 23.7-47.9 15.5-105-19.8-143-6.4-6.9-15.2-11.5-24.6-11.5-17.2 0-31.2 14-31.2 31.2 0 10.1 4.8 19.1 12.2 24.8 3.9 3.1 7.3 7.1 9.5 11.9 5.6 12.1 3.9 25.9-3.8 36.5-3.3 4.6-7.9 8.1-13.3 9.9l-18 6.9c-4.3 1.7-8.9 2.6-13.6 2.6-10.9 0-20.9-4.2-28.3-11.8-19.5-19.9-17.8-52.4 3.8-70.1 14.8-12.1 35.6-15.7 53.9-9.5zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z" />
                            </svg>
                        </div>
                        <h2>{{__('home.summarize-pdf')}}</h2>
                        <p>{{__('home.summarizepdf-des')}}</p>
                        <a href="{{ localized_route('pdf.summerize') }}" class="btn btn-tool">{{__('home.summarize-btn')}}</a>
                    </div>
                </div>
<div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-1">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path
                                    d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9zM192 256c35.3 0 64 28.7 64 64v96c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64v-96c0-35.3 28.7-64 64-64h96zm-32 64h-32v32h32v-32zm0 64h-32v32h32v-32zm64-64h-32v32h32v-32zm0 64h-32v32h32v-32z" />
                            </svg>
                        </div>
                        <h2>{{ __('home.pages-pdf') }}</h2>
                        <p>{{ __('home.pages-pdf-des') }}</p>
                        <a href="{{ localized_route('pages-to-pdf') }}"
                            class="btn btn-tool">{{ __('home.pagestopdf-btn') }}</a>
                    </div>
                </div>
<!-- Tool Card - PPT to PDF -->
                <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-4">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path d="M64 0C28.7 0 0 28.7 0 64v384c0 35.3 28.7 64 64 64h256c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zm192 0v128h128L256 0zM136 240h68c42 0 68 28 68 68s-26 68-68 68h-36v56h-32V240zm68 104c22 0 36-14 36-36s-14-36-36-36h-36v72h36z"/>
                            </svg>
                        </div>
                        <h2>{{ __('home.ppt-to-pdf') }}</h2>
                        <p>{{ __('home.ppt-to-pdf-des') }}</p>
                        <a href="{{ localized_route('ppt-to-pdf') }}"
                            class="btn btn-tool">{{ __('home.ppttopdf-btn') }}</a>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-3">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 384 512" fill="currentColor">
                                <path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm76.45 211.36l-96.42 95.7c-6.65 6.61-17.39 6.61-24.04 0l-96.42-95.7C73.42 337.29 80.54 320 94.82 320H160v-80c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v80h65.18c14.28 0 21.4 17.29 11.27 27.36zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/>
                            </svg>
                        </div>
                        <h3>Excel to PDF</h3>
                        <p>Convert your Excel Document into PDF.</p>
                        <a href="{{route('excel-to-pdf')}}" class="btn btn-tool">Convert Now</a>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-lg-3">
                    <div class="tool-card tool-card-5">
                        <div class="tool-icon">
                            <svg class="svg-icon" viewBox="0 0 448 512" fill="currentColor">
                                <path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zM264 392c0 22.1-17.9 40-40 40s-40-17.9-40-40v-48c0-22.1 17.9-40 40-40s40 17.9 40 40v48zm32-168H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/>
                            </svg>
                        </div>
                        <h3>Protect PDF</h3>
                        <p>Add passwords and permissions to secure your documents.</p>
                        <a href="#" class="btn btn-tool">Protect Now</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Featured Guides Section -->
    <section class="benefit-section" style="background: linear-gradient(135deg, #f8f9ff 0%, #eef0ff 100%); padding: 60px 0;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3 section-title">{{__('home.featured-guides-title')}}</h2>
                <p class="text-muted fs-5">{{__('home.featured-guides-des')}}</p>
            </div>
            <div class="row g-4 justify-content-center">

                <!-- Guide 1 -->
                <div class="col-md-4">
                    <div class="benefit-card animate__animated animate__fadeInUp" style="height:100%; border-radius:16px; padding:30px; background:#fff; box-shadow:0 4px 24px rgba(75,39,235,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="benefit-icon" style="margin-bottom:16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="#4b27eb" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707zm-.5 1 3.707 3.707H9zm-2 6h5a.5.5 0 0 1 0 1H6.5a.5.5 0 0 1 0-1m0 2h5a.5.5 0 0 1 0 1H6.5a.5.5 0 0 1 0-1m-2-4a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1"/>
                            </svg>
                        </div>
                        <h3 style="font-size:1.15rem; font-weight:700; margin-bottom:10px; color:#1a1a2e;">{{__('home.guide1-title')}}</h3>
                        <p class="text-muted" style="font-size:0.95rem; margin-bottom:18px;">{{__('home.guide1-des')}}</p>
                        <a href="{{ localized_route('blog_post6') }}" class="btn btn-tool" style="font-size:0.9rem; padding:8px 20px;">{{__('home.read-guide-btn')}} →</a>
                    </div>
                </div>

                <!-- Guide 2 -->
                <div class="col-md-4">
                    <div class="benefit-card animate__animated animate__fadeInUp" style="height:100%; border-radius:16px; padding:30px; background:#fff; box-shadow:0 4px 24px rgba(75,39,235,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;" data-wow-delay="0.1s">
                        <div class="benefit-icon" style="margin-bottom:16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="#4b27eb" viewBox="0 0 16 16">
                                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            </svg>
                        </div>
                        <h3 style="font-size:1.15rem; font-weight:700; margin-bottom:10px; color:#1a1a2e;">{{__('home.guide2-title')}}</h3>
                        <p class="text-muted" style="font-size:0.95rem; margin-bottom:18px;">{{__('home.guide2-des')}}</p>
                        <a href="{{ localized_route('blog_post5') }}" class="btn btn-tool" style="font-size:0.9rem; padding:8px 20px;">{{__('home.read-guide-btn')}} →</a>
                    </div>
                </div>

                <!-- Guide 3 -->
                <div class="col-md-4">
                    <div class="benefit-card animate__animated animate__fadeInUp" style="height:100%; border-radius:16px; padding:30px; background:#fff; box-shadow:0 4px 24px rgba(75,39,235,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;" data-wow-delay="0.2s">
                        <div class="benefit-icon" style="margin-bottom:16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="#4b27eb" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                            </svg>
                        </div>
                        <h3 style="font-size:1.15rem; font-weight:700; margin-bottom:10px; color:#1a1a2e;">{{__('home.guide3-title')}}</h3>
                        <p class="text-muted" style="font-size:0.95rem; margin-bottom:18px;">{{__('home.guide3-des')}}</p>
                        <a href="{{ localized_route('blog_post34') }}" class="btn btn-tool" style="font-size:0.9rem; padding:8px 20px;">{{__('home.read-guide-btn')}} →</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Section Heading -->
                <div class="col-12 text-center mb-4">
                    <h2 class="fw-bold">{{__('home.why-use-title')}}</h2>
                    <p>{{__('home.why-use-des')}}</p>
                </div>

                <!-- Card 1 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/choice.svg" width="108" height="108"
                                loading="lazy" alt="choice" class="d-block mx-auto mb-3">
                            <p class="text-muted">{{__('home.why-use-card1')}}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/follow-up.svg" width="108" height="108"
                                loading="lazy" alt="follow-up" class="d-block mx-auto mb-3">
                            <p class="text-muted">{{__('home.why-use-card2')}}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/self-service.svg" width="108" height="108"
                                loading="lazy" alt="self-service" class="d-block mx-auto mb-3">
                            <p class="text-muted">{{__('home.why-use-card3')}}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/database.svg" width="108" height="108"
                                alt="database" loading="lazy" class="d-block mx-auto mb-3">
                            <p class="text-muted">{{__('home.why-use-card4')}}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/self-service.svg" width="108" height="108"
                                loading="lazy" alt="self-service" class="d-block mx-auto mb-3">
                            <p class="text-muted">{{__('home.why-use-card5')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits Section -->
    <section class="benefit-section">
        <div class="container">
            <div class="text-center mb-6">
                <h2 class="display-5 fw-bold mb-4 section-title">{{__('home.why-choose')}}</h2>

            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-tools" viewBox="0 0 16 16">
                                <path
                                    d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z" />
                            </svg>
                        </div>
                        <h3>{{__('home.free-tool')}}</h3>
                        <p class="text-muted">{{__('home.free-tool-des')}}</p>
                        <a href="{{ localized_route('blog_post34') }}" class="d-block mt-2 text-decoration-none fw-bold" style="color: #7261f7;">{{__('home.see-compares')}} →</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInRight">
                        <div class="benefit-icon">
                            <!-- SVG version of fa-bolt -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-file-lock2-fill" viewBox="0 0 16 16">
                                <path d="M7 6a1 1 0 0 1 2 0v1H7z" />
                                <path
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0" />
                            </svg>

                        </div>
                        <h3>{{__('home.secure-tool')}}</h3>
                        <p class="text-muted"> <a href="https://www.pdftools.net/">{{__('home.a')}}</a> {{__('home.secure-tool-des')}}</p>
                        <a href="{{ localized_route('blog_post24') }}" class="d-block mt-2 text-decoration-none fw-bold" style="color: #7261f7;">{{__('home.learn-security')}} →</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <!-- SVG version of fa-infinity -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-phone-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0" />
                            </svg>

                        </div>
                        <h3>{{__('home.work-on-all')}}</h3>
                        <p class="text-muted">{{__('home.workonall-des')}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInRight">
                        <div class="benefit-icon">
                            <!-- SVG version of fa-check-circle (purple) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-ban-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M2.71 12.584q.328.378.706.707l9.875-9.875a7 7 0 0 0-.707-.707l-9.875 9.875Z" />
                            </svg>

                        </div>
                        <h3>{{__('home.no-watermark')}}</h3>
                        <p class="text-muted">{{__('home.watermark-des')}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-infinity" viewBox="0 0 16 16">
                                <path
                                    d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916z" />
                            </svg>
                        </div>
                        <h3>{{__('home.unlimited')}}</h3>
                        <p class="text-muted"><a href="https://www.pdftools.net/">{{__('home.a')}}</a> {{__('home.unlimited-des')}}
                            <a href="https://www.pdftools.net/">{{__('home.a')}}</a> {{__('home.unlimited-des-2')}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-fast-forward-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696z" />
                                <path
                                    d="M15.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C8.713 12.69 8 12.345 8 11.692V4.308c0-.653.713-.998 1.233-.696z" />
                            </svg>
                        </div>
                        <h3>{{__('home.fast-tool')}}</h3>
                        <p class="text-muted">{{__('home.fast-tool-des')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- smart feature section --}}

    <section class="benefit-section">
        <div class="container">
            <div class="text-center mb-6">
                <h2 class="display-5 fw-bold mb-4 section-title">{{__('home.smart-features')}}</h2>

            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-phone-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0" />
                            </svg>
                        </div>
                        <h3>{{__('home.import-device')}}</h3>
                        <p class="text-muted">{{__('home.device-des')}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInRight">
                        <div class="benefit-icon">
                            <!-- SVG version of fa-bolt -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                            </svg>

                        </div>
                        <h3>{{__('home.from-drive')}}</h3>
                        <p class="text-muted">{{__('home.drive-des')}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <!-- SVG version of fa-infinity -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-dropbox" viewBox="0 0 16 16">
                                <path
                                    d="M8.01 4.555 4.005 7.11 8.01 9.665 4.005 12.22 0 9.651l4.005-2.555L0 4.555 4.005 2zm-4.026 8.487 4.006-2.555 4.005 2.555-4.005 2.555zm4.026-3.39 4.005-2.556L8.01 4.555 11.995 2 16 4.555 11.995 7.11 16 9.665l-4.005 2.555z" />
                            </svg>

                        </div>
                        <h3>{{__('home.drop-box')}}</h3>
                        <p class="text-muted">{{__('home.dropbox-des')}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInRight">
                        <div class="benefit-icon">
                            <!-- SVG version of fa-check-circle (purple) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-link-45deg" viewBox="0 0 16 16">
                                <path
                                    d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                                <path
                                    d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                            </svg>

                        </div>
                        <h3>{{__('home.url')}}</h3>
                        <p class="text-muted">{{__('home.url-des')}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                            </svg>
                        </div>
                        <h3>{{__('home.whatsapp')}}</h3>
                        <p class="text-muted">{{__('home.whatsapp-des')}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2" />
                            </svg>
                        </div>
                        <h3>{{__('home.save-dropbox')}}</h3>
                        <p class="text-muted">{{__('home.save-dropbox-des')}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                            </svg>
                        </div>
                        <h3>{{__('home.save-google')}}</h3>
                        <p class="text-muted">{{__('home.save-google-des')}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-share-fill" viewBox="0 0 16 16">
                                <path
                                    d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5" />
                            </svg>
                        </div>
                        <h3>{{__('home.create-url')}}</h3>
                        <p class="text-muted">{{__('home.create-url-dec')}}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-card animate__animated animate__fadeInLeft">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4b27eb"
                                class="bi bi-qr-code" viewBox="0 0 16 16">
                                <path d="M2 2h2v2H2z" />
                                <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z" />
                                <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z" />
                                <path
                                    d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z" />
                                <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z" />
                            </svg>
                        </div>
                        <h3>{{__('home.qr-code')}}</h3>
                        <p class="text-muted">{{__('home.qr-code-dec')}}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!-- ====== PDF Tool Selection Section Start ====== -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Section Heading -->
                <div class="col-12 text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">{{__('home.how-works')}}</h2>

                </div>

                <!-- Card 1 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/choice.svg" width="108" height="108"
                                loading="lazy" alt="choice" class="d-block mx-auto mb-3">
                            <p class="text-muted">
                                {{__('home.how-works-1')}}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/follow-up.svg" width="108" height="108"
                                loading="lazy" alt="follow-up" class="d-block mx-auto mb-3">
                            <p class="text-muted">
                               {{__('home.how-works-2')}}

                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/self-service.svg" width="108" height="108"
                                loading="lazy" alt="self-service" class="d-block mx-auto mb-3">
                            <p class="text-muted">
                                {{__('home.how-works-3')}}

                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-12 col-sm-10 col-md-6 col-lg-3 d-lg-flex px-lg-2">
                    <div class="card pdf-card border-0 shadow rounded-5 my-3 py-3 px-2">
                        <div class="card-body">
                            <img src="https://www.pdftools.net/images/database.svg" width="108" height="108"
                                alt="database" loading="lazy" class="d-block mx-auto mb-3">
                            <p class="text-muted">
                                {{__('home.hwo-works-4')}}

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Workflow Section -->
    <section class="workflow-section">
        <div class="container">
            <div class="text-center mb-6 pt-3">
                <h2 class="display-5 fw-bold mb-3 section-title">{{__('home.who-can-use')}}</h2>

            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card animate__animated animate__fadeInUp">
                        <div class="step-number">1</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4b27eb"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                        <h3>{{__('home.student')}}</h3>
                        <p class="text-muted">{{__('home.student-dec')}}</p>
                        <div class="mt-4">
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="step-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="step-number">2</div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4b27eb"
                                class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            </svg>
                        <h3>{{__('home.professionals')}}</h3>
                        <p class="text-muted">{{__('home.professionals-dec')}}</p>
                        <div class="mt-4">
                           
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="step-card animate__animated animate__fadeInUp animate__delay-2s">
                        <div class="step-number">3</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4b27eb"
                                class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path
                                    d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                <path
                                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                            </svg>
                        <h3>{{__('home.remote-works')}}</h3>
                        <p class="text-muted">{{__('home.remote-works-dec')}}</p>
                        <div class="mt-4">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="step-number">4</div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4b27eb"
                                class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5" />
                                <path
                                    d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z" />
                            </svg>
                        <h3>{{__('home.business')}}</h3>
                        <p class="text-muted">{{__('home.business-dec')}}</p>
                        <div class="mt-4">
                           
                        </div>
                    </div>
                </div>

            </div>  
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">{{__('home.FAQ')}}</h2>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <h3 class="card-title" >{{__('home.FAQ1')}}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div class="faq-content">
                            <p><a href="https://www.pdftools.net/">{{__('home.a')}}</a> {{__('home.A1')}}
                            </p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <h3 class="card-title">{{__('home.FAQ2')}}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div class="faq-content">
                            <p>{{__('home.A2')}} <a href="https://www.pdftools.net/">{{__('home.a')}}</a> {{__('home.A22')}}</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <h3 class="card-title">{{__('home.FAQ3')}}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div class="faq-content">
                            <p>{{__('home.A3')}}</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <h3 class="card-title">{{__('home.FAQ4')}}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div class="faq-content">
                            <p>{{__('home.A4')}}</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <h3 class="card-title">{{__('home.FAQ5')}}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#795ef1"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div class="faq-content">
                            <p>{{__('home.A5')}}<a href="https://www.pdftools.net/">{{__('home.a')}}</a> {{__('home.A55')}}
                            </p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <script>
        function toggleFaq(element) {
            const faqCard = element.parentElement;
            const content = faqCard.querySelector('.faq-content');
            const icon = element.querySelector('svg');

            // Close all other FAQs
            document.querySelectorAll('.faq-content').forEach(c => {
                if (c !== content) c.style.maxHeight = null;
            });
            document.querySelectorAll('.faq-header svg').forEach(i => {
                if (i !== icon) i.style.transform = 'rotate(0deg)';
            });

            // Toggle current FAQ
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = 'rotate(180deg)';
            }
        }
    </script>
@endsection
