@php
    $post = config('blog_posts.' . ($postId ?? 0));
    $postTitle = '';
    $postImage = 'images/logo2.svg';
    $publishDate = '2026-06-19T08:00:00+00:00'; // Default fallback
    $readingTime = 8;
    $authorSlug = 'abid-sabir'; // Default fallback
    
    if ($post) {
        $titleKey = $post['title_key'] ?? '';
        $postTitle = (__($titleKey) !== $titleKey) ? __($titleKey) : ($post['fallback_title'] ?? 'PDF Document Guide');
        $postImage = $post['img'] ?? 'images/logo2.svg';
        $publishDate = isset($post['date']) ? date('Y-m-d\TH:i:sP', strtotime($post['date'])) : '2026-06-19T08:00:00+00:00';
        $readingTime = $post['reading_time'] ?? 8;
        $authorSlug = $post['author'] ?? 'abid-sabir';
    }
    
    $authorId = str_replace('-', '_', $authorSlug);
    $authorName = __("author.{$authorId}_name");
    $authorTitle = __("author.{$authorId}_title");
    $authorShortBio = __("author.{$authorId}_short_bio");
    $authorImage = __("author.{$authorId}_image");
    $authorLinkedin = __("author.{$authorId}_linkedin_url");
    $authorTwitter = __("author.{$authorId}_twitter_url");
    $authorEmail = __("author.{$authorId}_email_url");
    $authorConnect = __("author.{$authorId}_connect");
    $authorViewAll = __("author.{$authorId}_view_all");
@endphp

<div class="author-byline-card d-flex align-items-center p-3 mb-4 border rounded-3 bg-light" style="font-family: 'Poppins', sans-serif; gap: 1rem; border-color: #e5e7eb !important;">
    <div class="author-avatar-container flex-shrink-0">
        <a href="{{ localized_route('author.profile', ['authorSlug' => $authorSlug]) }}">
            <img src="{{ asset($authorImage) }}" alt="{{ $authorName }}" class="rounded-circle border" width="64" height="64" style="object-fit: cover; border-color: rgba(114, 97, 247, 0.2) !important;">
        </a>
    </div>
    <div class="author-info-container flex-grow-1">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-1" style="gap: 0.5rem;">
            <div class="author-meta-name">
                <span class="text-muted fw-normal">{{ __('author.by') }}</span> 
                <a href="{{ localized_route('author.profile', ['authorSlug' => $authorSlug]) }}" class="text-dark fw-bold text-decoration-none hover-primary" style="transition: color 0.2s;">
                    {{ $authorName }}
                </a>
                <span class="text-muted mx-2">|</span>
                <span class="text-muted small fw-medium">{{ $authorTitle }}</span>
            </div>
            <div class="author-meta-time text-muted small d-flex align-items-center gap-3">
                <span class="d-flex align-items-center gap-1">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.35 1.895 3 3 3h10c1.105 0 2 .35 2 .857v10.286c0 .507-.895.857-2 .857H3c-1.105 0-2-.35-2-.857V3.857z"/>
                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    {{ __('author.last_updated') }}: <strong class="text-dark">{{ isset($post['date']) ? date('F j, Y', strtotime($post['date'])) : 'June 19, 2026' }}</strong>
                </span>
                <span class="d-flex align-items-center gap-1">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                    </svg>
                    {{ __('author.reading_time') }}: <strong class="text-dark">{{ $readingTime }} {{ __('author.min') }}</strong>
                </span>
            </div>
        </div>
        <p class="author-meta-bio text-secondary mb-2 small" style="line-height: 1.5;">
            {{ $authorShortBio }}
        </p>
        <div class="author-meta-links small d-flex flex-wrap align-items-center gap-3">
            <span class="text-muted fw-semibold">{{ $authorConnect }}:</span>
            <a href="{{ $authorLinkedin }}" target="_blank" class="text-gradient fw-medium text-decoration-none hover-underline">
                {{ __('author.linkedin') }}
            </a>
            <a href="{{ $authorEmail }}" class="text-gradient fw-medium text-decoration-none hover-underline">
                {{ __('author.email') }}
            </a>
            <a href="{{ localized_route('author.profile', ['authorSlug' => $authorSlug]) }}" class="text-gradient fw-medium text-decoration-none hover-underline">
                {{ $authorViewAll }}
            </a>
        </div>
    </div>
</div>

<style>
    .hover-primary:hover {
        color: #7261f7 !important;
    }
    .hover-underline:hover {
        text-decoration: underline !important;
    }
</style>

@push('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Article",
  "mainEntityOfPage": {
    "@@type": "WebPage",
    "@@id": "{{ url()->current() }}"
  },
  "headline": "{{ str_replace('"', '\"', $postTitle) }}",
  "image": "{{ asset($postImage) }}",
  "datePublished": "{{ $publishDate }}",
  "dateModified": "{{ $publishDate }}",
  "author": {
    "@@type": "Person",
    "name": "{{ $authorName }}",
    "jobTitle": "{{ $authorTitle }}",
    "url": "{{ localized_route('author.profile', ['authorSlug' => $authorSlug]) }}",
    "image": "{{ asset($authorImage) }}",
    "sameAs": [
      "{{ $authorLinkedin }}",
      "{{ $authorTwitter }}"
    ]
  },
  "publisher": {
    "@@type": "Organization",
    "name": "PDFTools",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('images/logo2.svg') }}"
    }
  }
}
</script>
@endpush
