<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Get locale from URL
        $locale = $request->route('locale');
        
        // If locale is in URL and valid, use it
        if ($locale && in_array($locale, config('locales.supported', ['en']))) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }
        // If no locale in URL, check session
        else {
            $sessionLocale = Session::get('locale', config('app.locale', 'en'));
            
            if (in_array($sessionLocale, config('locales.supported', ['en']))) {
                App::setLocale($sessionLocale);
            } else {
                App::setLocale('en');
                Session::put('locale', 'en');
            }
        }
        
        return $next($request);
    }
}