@php
    $currentPost = config('blog_posts.' . ($postId ?? 0));
    $currentCategory = $currentPost['category'] ?? '';
    $allPosts = config('blog_posts') ?? [];
    
    // Filter posts in the same category, excluding current post
    $related = [];
    foreach ($allPosts as $id => $post) {
        if ($id != ($postId ?? 0) && isset($post['category']) && $post['category'] === $currentCategory) {
            $post['post_id'] = $id;
            $related[] = $post;
        }
    }
    
    // Sort related posts by ID descending and limit to 3
    usort($related, function($a, $b) {
        return $b['id'] <=> $a['id'];
    });
    $related = array_slice($related, 0, 3);
@endphp

@if(count($related) > 0)
<div class="related-posts-section mt-5 pt-4 border-top" style="font-family: 'Poppins', sans-serif;">
    <h4 class="fw-bold text-dark mb-4 text-center text-md-start">Related Guides & Articles</h4>
    <div class="row">
        @foreach($related as $post)
            @php
                $titleKey = $post['title_key'] ?? '';
                $title = (__($titleKey) !== $titleKey) ? __($titleKey) : ($post['fallback_title'] ?? 'Blog Guide');
            @endphp
            <div class="col-md-4 mb-4">
                <div class="card h-100 bg-white border border-light shadow-sm transition-all" style="border-radius: 12px; transition: transform 0.2s, box-shadow 0.2s;">
                    <a href="{{ localized_route($post['route']) }}" class="text-decoration-none text-dark d-flex flex-column h-100">
                        <img src="{{ asset($post['img'] ?? 'images/logo2.svg') }}" class="card-img-top" height="150" style="object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;" alt="{{ $post['alt'] ?? 'related guide' }}">
                        <div class="card-body p-3 d-flex flex-column justify-content-between">
                            <h5 class="card-title fw-bold text-dark fs-6 mb-2" style="line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.8rem;">
                                {{ $title }}
                            </h5>
                            <span class="text-gradient fw-semibold small d-inline-flex align-items-center gap-1 mt-2">
                                Read Article &rarr;
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .related-posts-section .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(114, 97, 247, 0.1) !important;
        border-color: rgba(114, 97, 247, 0.2) !important;
    }
</style>
@endif
