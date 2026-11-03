<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddPublicCacheHeaders
{
    /**
     * Add public caching headers ONLY to the static, session-less pages
     * (homepage, privacy, terms, faq, security, status, blog + blog categories).
     *
     * Tool pages are excluded because they contain CSRF upload forms that must
     * stay dynamic (caching them would break form submissions). Download and
     * status endpoints are excluded for safety.
     */
    protected array $cacheablePaths = [
        '/',
        '/privacy',
        '/security',
        '/terms',
        '/faq',
        '/status',
        '/blog',
    ];

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return $response;
        }

        $path = '/'.trim($request->path(), '/');

        if (! $this->isCacheablePath($path)) {
            return $response;
        }

        if ($response->isSuccessful()) {
            $response->headers->set('Cache-Control', 'public, max-age=3600, s-maxage=3600');
        }

        return $response;
    }

    protected function isCacheablePath(string $path): bool
    {
        if (in_array($path, $this->cacheablePaths, true)) {
            return true;
        }

        if ($path === '/blog' || str_starts_with($path, '/blog/')) {
            return true;
        }

        return false;
    }
}