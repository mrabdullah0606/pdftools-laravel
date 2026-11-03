@php
    $post = config('blog_posts.' . ($postId ?? 0));
    $authorSlug = 'abid-sabir'; // Default fallback
    
    if ($post) {
        $authorSlug = $post['author'] ?? 'abid-sabir';
    }
    
    $authorId = str_replace('-', '_', $authorSlug);
    $authorName = __("author.{$authorId}_name");
    $authorTitle = __("author.{$authorId}_title");
    $authorLongBio = __("author.{$authorId}_long_bio");
    $authorImage = __("author.{$authorId}_image");
    $authorLinkedin = __("author.{$authorId}_linkedin_url");
    $authorTwitter = __("author.{$authorId}_twitter_url");
    $authorEmail = __("author.{$authorId}_email_url");
    $authorConnect = __("author.{$authorId}_connect");
    $authorViewAll = __("author.{$authorId}_view_all");
@endphp

<div class="author-bio-box-card p-4 mt-5 mb-4 border rounded-4 bg-white shadow-sm" style="font-family: 'Poppins', sans-serif; border-color: rgba(114, 97, 247, 0.08) !important;">
    <div class="row align-items-center align-items-md-start">
        <div class="col-md-3 text-center mb-3 mb-md-0">
            <a href="{{ localized_route('author.profile', ['authorSlug' => $authorSlug]) }}">
                <img src="{{ asset($authorImage) }}" alt="{{ $authorName }}" class="rounded-circle border p-1" width="120" height="120" style="object-fit: cover; border-color: rgba(114, 97, 247, 0.15) !important; background-color: #f9fafb;">
            </a>
            <div class="author-bio-box-links mt-3 d-flex justify-content-center gap-2">
                <a href="{{ $authorLinkedin }}" target="_blank" class="social-btn-small" title="LinkedIn">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.07 5.07 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                </a>
                <a href="{{ $authorTwitter }}" target="_blank" class="social-btn-small" title="Twitter">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.6.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                    </svg>
                </a>
                <a href="{{ $authorEmail }}" class="social-btn-small" title="Email">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-.539-.323zM16 11.801V4.697l-5.803 3.546L16 11.801z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="col-md-9 text-start">
            <span class="text-muted small text-uppercase fw-bold letter-spacing-1 mb-1 d-block" style="color: #7261f7 !important;">{{ __('author.about_author') }} {{ __('author.by') }}</span>
            <h4 class="fw-bold text-dark mb-1">
                <a href="{{ localized_route('author.profile', ['authorSlug' => $authorSlug]) }}" class="text-dark text-decoration-none hover-primary">
                    {{ $authorName }}
                </a>
            </h4>
            <p class="text-secondary small fw-medium mb-3">{{ $authorTitle }}</p>
            <p class="text-muted small" style="line-height: 1.6; white-space: pre-line;">
                {{ $authorLongBio }}
            </p>
            <div class="mt-3">
                <a href="{{ localized_route('author.profile', ['authorSlug' => $authorSlug]) }}" class="btn btn-sm btn-outline-primary px-3 py-1.5 fw-medium rounded-3" style="font-size: 0.8rem; border-color: rgba(114, 97, 247, 0.4); color: #7261f7; transition: all 0.2s;">
                    {{ $authorViewAll }} &rarr;
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .letter-spacing-1 {
        letter-spacing: 0.05em;
    }
    .social-btn-small {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #4b5563;
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
        transition: all 0.2s ease;
        text-decoration: none;
    }
    .social-btn-small:hover {
        background-color: #7261f7;
        color: #ffffff;
        transform: translateY(-1px);
        border-color: #7261f7;
    }
    .author-bio-box-card btn-outline-primary:hover {
        background-color: #7261f7 !important;
        color: #fff !important;
    }
</style>
