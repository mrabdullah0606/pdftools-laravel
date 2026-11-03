@extends('main')
{{-- @section('meta_canonical', 'http://127.0.0.1:8000/compresspdf') --}}
@section('title', __('blog.title'))
@section('description', __('blog.description'))

@push('head')
    <style>
        .text-gray {
            color: #666;
        }

        .blog_card {
            width: 100%;
            max-width: 21rem;
            border-radius: 10px;
            font-family: "Poppins", sans-serif;
            transition: all 0.3s ease;
            margin: 0 auto;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        }

        .blog_card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(114, 97, 247, 0.15);
            border-color: rgba(114, 97, 247, 0.3);
        }

        /* Sidebar active class styling */
        .sidebar-nav .list-group-item {
            color: #4b5563;
            transition: all 0.2s ease;
            background-color: transparent;
        }

        .sidebar-nav .list-group-item:hover {
            background-color: #f3f4f6;
            color: #7261f7;
            transform: translateX(4px);
        }

        .sidebar-nav .list-group-item.active {
            background: linear-gradient(90deg, rgba(114,97,247,1) 0%, rgba(133,117,245,1) 100%) !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            box-shadow: 0 4px 10px rgba(114, 97, 247, 0.2);
        }

        /* Featured section styling */
        .featured-card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .featured-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(114, 97, 247, 0.15);
        }

        .bg-primary-gradient {
            background: linear-gradient(90deg, rgba(114,97,247,1) 0%, rgba(133,117,245,1) 100%) !important;
            color: white;
            font-size: 0.75rem;
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-block;
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
    <div class="container text-center my-5">
        <div class="row">
            <div class="col-10 mx-auto">
                <h1 class="fw-bold mb-3"> @lang('blog.title') </h1>
                <p class="text-muted fs-6 col-md-8 mx-auto"> @lang('blog.description') </p>
            </div>
        </div>
    </div>
    
    <!-- Featured Guides Section -->
    @if(isset($featuredPosts) && count($featuredPosts) > 0)
        <div class="container mb-5">
            <div class="col-11 mx-auto">
                <h3 class="fw-bold mb-4 text-start text-dark">
                    <i class="fa-solid fa-star text-warning me-2"></i>@lang('blog.featured_guides')
                </h3>
                <div class="row justify-content-start">
                    @foreach($featuredPosts as $post)
                        <div class="col-md-6 col-lg-4 my-3 px-3">
                            <div class="blog_card card h-100 featured-card">
                                <a href="{{ localized_route($post['route']) }}" class="text-decoration-none text-dark">
                                    <img src="{{ asset($post['img']) }}" class="card-img-top" width="382" height="206"
                                         alt="{{ $post['alt'] }}" loading="lazy">
                                    <div class="card-body">
                                        <span class="badge bg-primary-gradient mb-3 text-capitalize">
                                            @lang('blog.cat_' . str_replace('-', '_', $post['category'] == 'compression-tips' ? 'compression_tips' : ($post['category'] == 'pdf-security' ? 'pdf_security' : $post['category'])))
                                        </span>
                                        <p class="card-text fs-5 mb-4 fw-semibold">
                                            {{ __($post['title_key']) !== $post['title_key'] ? __($post['title_key']) : ($post['fallback_title'] ?: 'Blog Post') }}
                                        </p>
                                        <span class="btn text-white fw-semibold bg-gradient">
                                            @lang('blog.read_more')
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="container mb-5">
        <div class="col-11 mx-auto">
            <div class="row">
                <!-- Sidebar Category Nav -->
                <div class="col-lg-3 mb-4">
                    <div class="card border-0 shadow-sm rounded-4 p-3 sidebar-nav sticky-top" style="top: 100px; z-index: 10;">
                        <h5 class="fw-bold mb-3 px-2 text-dark">@lang('blog.all_categories')</h5>
                        <div class="list-group list-group-flush gap-1">
                            <a href="{{ localized_route('blog') }}" class="list-group-item list-group-item-action border-0 rounded-3 px-3 py-2 fw-medium {{ !$activeCategory ? 'active' : '' }}">
                                <i class="fa-solid fa-grip mb-0 me-2"></i> @lang('blog.cat_all')
                            </a>
                            <a href="{{ localized_route('blog.category', ['category' => 'pdf-conversion']) }}" class="list-group-item list-group-item-action border-0 rounded-3 px-3 py-2 fw-medium {{ $activeCategory === 'pdf-conversion' ? 'active' : '' }}">
                                <i class="fa-solid fa-arrow-right-arrow-left mb-0 me-2"></i> @lang('blog.cat_pdf_conversion')
                            </a>
                            <a href="{{ localized_route('blog.category', ['category' => 'compression']) }}" class="list-group-item list-group-item-action border-0 rounded-3 px-3 py-2 fw-medium {{ $activeCategory === 'compression' ? 'active' : '' }}">
                                <i class="fa-solid fa-compress mb-0 me-2"></i> @lang('blog.cat_compression_tips')
                            </a>
                            <a href="{{ localized_route('blog.category', ['category' => 'security']) }}" class="list-group-item list-group-item-action border-0 rounded-3 px-3 py-2 fw-medium {{ $activeCategory === 'security' ? 'active' : '' }}">
                                <i class="fa-solid fa-lock mb-0 me-2"></i> @lang('blog.cat_pdf_security')
                            </a>
                            <a href="{{ localized_route('blog.category', ['category' => 'ai-tools']) }}" class="list-group-item list-group-item-action border-0 rounded-3 px-3 py-2 fw-medium {{ $activeCategory === 'ai-tools' ? 'active' : '' }}">
                                <i class="fa-solid fa-robot mb-0 me-2"></i> @lang('blog.cat_ai_tools')
                            </a>
                            <a href="{{ localized_route('blog.category', ['category' => 'workflows']) }}" class="list-group-item list-group-item-action border-0 rounded-3 px-3 py-2 fw-medium {{ $activeCategory === 'workflows' ? 'active' : '' }}">
                                <i class="fa-solid fa-briefcase mb-0 me-2"></i> @lang('blog.cat_workflows')
                            </a>
                            <a href="{{ localized_route('blog.category', ['category' => 'format-comparison']) }}" class="list-group-item list-group-item-action border-0 rounded-3 px-3 py-2 fw-medium {{ $activeCategory === 'format-comparison' ? 'active' : '' }}">
                                <i class="fa-solid fa-code-compare mb-0 me-2"></i> @lang('blog.cat_format_comparison')
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Posts List Grid -->
                <div class="col-lg-9">
                    <!-- Sorting & Heading bar -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
                        <h4 class="fw-bold mb-0 text-dark">
                            @if($activeCategory)
                                @lang('blog.cat_' . str_replace('-', '_', $activeCategory == 'compression' ? 'compression_tips' : ($activeCategory == 'security' ? 'pdf_security' : $activeCategory)))
                            @else
                                @lang('blog.blog_posts')
                            @endif
                        </h4>
                        
                        <div class="d-flex align-items-center gap-2 my-2 my-sm-0">
                            <span class="text-muted fw-semibold fs-7">@lang('blog.sort_by'):</span>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle border rounded-pill px-3 py-1 fs-7 fw-medium" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    @lang('blog.sort_' . $currentSort)
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" aria-labelledby="sortDropdown">
                                    <li>
                                        <a class="dropdown-item fw-medium {{ $currentSort == 'latest' ? 'active bg-gradient text-white' : '' }}" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">
                                            @lang('blog.sort_latest')
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item fw-medium {{ $currentSort == 'popular' ? 'active bg-gradient text-white' : '' }}" href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}">
                                            @lang('blog.sort_popular')
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item fw-medium {{ $currentSort == 'trending' ? 'active bg-gradient text-white' : '' }}" href="{{ request()->fullUrlWithQuery(['sort' => 'trending']) }}">
                                            @lang('blog.sort_trending')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Post Grid -->
                    <div class="row justify-content-start">
                        @forelse($posts as $post)
                            <div class="col-md-6 my-3 px-3">
                                <div class="blog_card card h-100">
                                    <a href="{{ localized_route($post['route']) }}" class="text-decoration-none text-dark">
                                        <img src="{{ asset($post['img']) }}" class="card-img-top" width="382" height="206"
                                             alt="{{ $post['alt'] }}" loading="lazy">
                                        <div class="card-body">
                                            <p class="card-text fs-5 mb-4">
                                                {{ __($post['title_key']) !== $post['title_key'] ? __($post['title_key']) : ($post['fallback_title'] ?: 'Blog Post') }}
                                            </p>
                                            <span class="btn text-white fw-semibold bg-gradient">
                                                @lang('blog.read_more')
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 py-5 text-center">
                                <p class="text-muted fs-5">@lang('blog.no_posts_found')</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $posts->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
