@extends('main')
@php
    $authorName = __("author.{$authorId}_name");
    $authorTitle = __("author.{$authorId}_title");
    $authorTitleLong = __("author.{$authorId}_title_long");
    $authorImage = __("author.{$authorId}_image");
    $authorLinkedin = __("author.{$authorId}_linkedin_url");
    $authorTwitter = __("author.{$authorId}_twitter_url");
    $authorEmail = __("author.{$authorId}_email_url");
    $authorShortBio = __("author.{$authorId}_short_bio");
    $authorLongBio = __("author.{$authorId}_long_bio");
@endphp
@section('title', $authorName . ' - ' . $authorTitleLong . ' | PDFTools')
@section('description', $authorShortBio)

@push('head')
    <style>
        .author-hero {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border-bottom: 1px solid #e5e7eb;
        }

        .author-card {
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            border-radius: 16px;
        }

        .avatar-img {
            border: 4px solid #fff;
            box-shadow: 0 4px 10px rgba(114, 97, 247, 0.2);
            transition: transform 0.3s ease;
        }

        .avatar-img:hover {
            transform: scale(1.05);
        }

        .expertise-badge {
            background-color: rgba(114, 97, 247, 0.08);
            color: #7261f7;
            border: 1px solid rgba(114, 97, 247, 0.15);
            font-size: 0.85rem;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 500;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .expertise-badge:hover {
            background-color: #7261f7;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .credibility-item {
            border-left: 3px solid #7261f7;
            padding-left: 1rem;
            margin-bottom: 1.25rem;
        }

        .article-card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(114, 97, 247, 0.08);
            border-color: rgba(114, 97, 247, 0.25);
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #4b5563;
            background-color: #f3f4f6;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .social-btn:hover {
            background-color: #7261f7;
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Custom Pagination styles to match theme */
        .pagination .page-item.active .page-link {
            background: linear-gradient(90deg, rgba(114,97,247,1) 0%, rgba(133,117,245,1) 100%) !important;
            border-color: transparent !important;
            color: #fff !important;
        }
        
        .pagination .page-link {
            color: #7261f7;
            border-radius: 6px;
            margin: 0 2px;
            transition: all 0.2s ease;
        }
        
        .pagination .page-link:hover {
            background-color: #f3f4f6;
            color: #5c48f7;
            border-color: #7261f7;
        }
    </style>
@endpush

@section('page')
    <!-- Hero Banner / Breadcrumbs -->
    <div class="author-hero py-5 mb-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ localized_route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ localized_route('blog') }}" class="text-decoration-none text-muted">Blog</a></li>
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ $authorName }}</li>
                </ol>
            </nav>
            <div class="row align-items-center mt-3">
                <div class="col-md-8">
                    <span class="badge bg-primary-gradient mb-2 px-3 py-2 text-uppercase">{{ __('author.specialist_profile') }}</span>
                    <h1 class="fw-bold text-dark mt-1">{{ $authorName }}</h1>
                    <p class="lead text-muted">{{ $authorTitle }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row">
            <!-- Left Column: Author Card & Details -->
            <div class="col-lg-4 mb-4">
                <div class="card author-card p-4 sticky-top" style="top: 100px; z-index: 1;">
                    <div class="text-center mb-4">
                        <img src="{{ asset($authorImage) }}" alt="{{ $authorName }}" class="rounded-circle avatar-img mb-3" width="200" height="200" style="object-fit: cover;">
                        <h4 class="fw-bold text-dark mb-1">{{ $authorName }}</h4>
                        <p class="text-muted small mb-3">{{ $authorTitleLong }}</p>
                        
                        <div class="d-flex justify-content-center gap-2 mb-3">
                            <a href="{{ $authorLinkedin }}" target="_blank" class="social-btn" title="LinkedIn">
                                <svg width="18" height="18" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.07 5.07 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
                            </a>
                            <a href="{{ $authorTwitter }}" target="_blank" class="social-btn" title="Twitter">
                                <svg width="18" height="18" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.6.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                </svg>
                            </a>
                            <a href="{{ $authorEmail }}" class="social-btn" title="Email">
                                <svg width="18" height="18" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-.539-.323zM16 11.801V4.697l-5.803 3.546L16 11.801z"/>
                                </svg>
                            </a>
                            <a href="{{ localized_route('contact-us') }}" class="social-btn" title="Contact Form">
                                <svg width="18" height="18" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
                                    <path d="M16 8c0 3.866-3.582 7-8 7a8.841 8.841 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color: #e5e7eb;">

                    <!-- Trust Signals / Credibility Section -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark text-uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.05em;">{{ __('author.credibility') }}</h6>
                        <div class="credibility-item">
                            <h6 class="fw-semibold text-dark mb-0">{{ __('author.trusted_author') }}</h6>
                            <p class="text-muted small mb-0">{{ __('author.trusted_by') }}</p>
                        </div>
                        <div class="credibility-item">
                            <h6 class="fw-semibold text-dark mb-0">{{ __('author.documents_tested') }}</h6>
                            <p class="text-muted small mb-0">{{ __('author.rigorous_recommendations') }}</p>
                        </div>
                        <div class="credibility-item">
                            <h6 class="fw-semibold text-dark mb-0">{{ __('author.industry_published') }}</h6>
                            <p class="text-muted small mb-0">{{ __('author.published_in') }}</p>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color: #e5e7eb;">

                    <!-- Credentials / Certifications -->
                    <div>
                        <h6 class="fw-bold text-dark text-uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.05em;">{{ __('author.credentials') }}</h6>
                        <ul class="list-unstyled text-muted small mb-0">
                            <li class="mb-2 d-flex align-items-start gap-2">
                                <svg width="14" height="14" fill="#7261f7" class="mt-1 flex-shrink-0" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                                {{ __('author.certification') }}
                            </li>
                            <li class="mb-2 d-flex align-items-start gap-2">
                                <svg width="14" height="14" fill="#7261f7" class="mt-1 flex-shrink-0" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                                {{ __('author.experience_years') }}
                            </li>
                            <li class="d-flex align-items-start gap-2">
                                <svg width="14" height="14" fill="#7261f7" class="mt-1 flex-shrink-0" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                                {{ __('author.workflow_specialist') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column: Biography & Articles -->
            <div class="col-lg-8">
                <!-- Short Bio Card -->
                <div class="card border-0 p-4 shadow-sm rounded-4 mb-4" style="background-color: rgba(114, 97, 247, 0.03); border: 1px solid rgba(114, 97, 247, 0.08) !important;">
                    <h5 class="fw-bold text-gradient mb-2">{{ __('author.short_bio_title') }}</h5>
                    <p class="fs-6 text-dark fw-medium mb-0" style="line-height: 1.6;">
                        {{ $authorShortBio }}
                    </p>
                </div>

                <!-- Full Biography -->
                <div class="mb-5">
                    <h3 class="fw-bold text-dark border-bottom pb-2 mb-3">{{ __('author.about_author') }} {{ $authorName }}</h3>
                    <div class="text-secondary" style="line-height: 1.7; font-size: 1.05rem; white-space: pre-line;">
                        {{ $authorLongBio }}
                    </div>
                </div>

                <!-- Expertise Section -->
                <div class="mb-5">
                    <h4 class="fw-bold text-dark mb-3">{{ __('author.expertise_areas') }}</h4>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="expertise-badge">{{ __('author.exp_pdf_conversion') }}</span>
                        <span class="expertise-badge">{{ __('author.exp_doc_security') }}</span>
                        <span class="expertise-badge">{{ __('author.exp_workflow_automation') }}</span>
                        <span class="expertise-badge">{{ __('author.exp_file_standards') }}</span>
                        <span class="expertise-badge">{{ __('author.exp_productivity_tools') }}</span>
                    </div>
                </div>

                <!-- Articles Grid -->
                <div>
                    <h3 class="fw-bold text-dark border-bottom pb-2 mb-4">{{ __('author.articles_by') }} {{ $authorName }}</h3>
                    
                    <div class="row">
                        @forelse($posts as $post)
                            <div class="col-md-6 mb-4">
                                <div class="article-card card h-100 bg-white border">
                                    <a href="{{ localized_route($post['route']) }}" class="text-decoration-none text-dark d-flex flex-column h-100">
                                        <img src="{{ asset($post['img']) }}" class="card-img-top" height="180" style="object-fit: cover;" alt="{{ $post['alt'] }}" loading="lazy">
                                        <div class="card-body d-flex flex-column justify-content-between p-3">
                                            <div>
                                                <span class="badge bg-primary-gradient mb-2 text-capitalize" style="font-size: 0.7rem;">
                                                    @lang('blog.cat_' . str_replace('-', '_', $post['category'] == 'compression-tips' ? 'compression_tips' : ($post['category'] == 'pdf-security' ? 'pdf_security' : $post['category'])))
                                                </span>
                                                <h5 class="card-title fw-bold fs-6 mb-3" style="line-height: 1.4;">
                                                    {{ __($post['title_key']) !== $post['title_key'] ? __($post['title_key']) : ($post['fallback_title'] ?: 'Blog Post') }}
                                                </h5>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between pt-2 border-top mt-2 text-muted small">
                                                <span>
                                                    {{ isset($post['date']) ? date('M j, Y', strtotime($post['date'])) : 'Jun 19, 2026' }}
                                                </span>
                                                <span>
                                                    {{ $post['reading_time'] ?? 8 }} min read
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">No articles found.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
