<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class aboutController extends Controller
{
    public function about()
    {
        return view('pages.about-us');
    }

    public function authorProfile(Request $request, $param1, $param2 = null)
    {
        $authorSlug = ($param2 !== null) ? $param2 : $param1;
        $v = array();
        
        $authorId = str_replace('-', '_', $authorSlug);
        $validAuthors = ['abid_sabir', 'abdullah', 'hira_zahid', 'hassan_jamal'];
        
        if (!in_array($authorId, $validAuthors)) {
            abort(404);
        }
        
        $posts = config('blog_posts');
        if (!is_array($posts)) {
            $posts = [];
        }
        
        // Filter posts written by this specific author slug
        $filteredPosts = array_filter($posts, function($post) use ($authorSlug) {
            return isset($post['author']) && $post['author'] === $authorSlug;
        });
        
        // Default sort by latest (highest ID first)
        usort($filteredPosts, function($a, $b) {
            return $b['id'] <=> $a['id'];
        });
        
        $perPage = 15;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect(array_values($filteredPosts));
        $currentPageItems = $itemCollection->slice(($currentPage - 1) * $perPage, $perPage)->values()->all();
        
        $paginatedPosts = new LengthAwarePaginator(
            $currentPageItems,
            $itemCollection->count(),
            $perPage,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'query' => $request->query()
            ]
        );
        
        $v['posts'] = $paginatedPosts;
        
        $authorName = __("author.{$authorId}_name");
        $authorTitleLong = __("author.{$authorId}_title_long");
        $authorShortBio = __("author.{$authorId}_short_bio");
        
        $v['authorId'] = $authorId;
        $v['authorSlug'] = $authorSlug;
        $v['title'] = "$authorName - $authorTitleLong | PDFTools";
        $v['description'] = $authorShortBio;
        
        return view('pages.author-profile', $v);
    }
}
