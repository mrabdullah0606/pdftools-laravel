<?php

if (!function_exists('localized_route')) {
    /**
     * Generate a localized route URL based on current locale
     * 
     * @param string $routeName
     * @param array $parameters
     * @return string
     */
    function localized_route($routeName, $parameters = [])
    {
        $locale = app()->getLocale();
        
        // If English, use non-prefixed routes
        if ($locale === 'en') {
            try {
                return route($routeName, $parameters);
            } catch (\Exception $e) {
                return route('home');
            }
        }
        
        // For other languages, use localized routes
        $localizedRouteName = str_starts_with($routeName, 'localized.') 
            ? $routeName 
            : 'localized.' . $routeName;
        
        // Add locale to parameters
        $parameters = array_merge(['locale' => $locale], $parameters);
        
        try {
            return route($localizedRouteName, $parameters);
        } catch (\Exception $e) {
            // Fallback to home
            return route('localized.home', ['locale' => $locale]);
        }
    }
}