<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function showPage($lang, $page)
    {
        // Set the application's locale
        App::setLocale($lang);

        // Get the list of supported languages from the locales config file
        // Correct reference to the config file
        $languages = config('app.supported_locales'); // Change this according to your config file

        // Check if the translated view exists, if not, fallback to default
        $translatedView = "lang.$lang.$page";  // For example: lang/en.bg-changer.blade.php
        if (View::exists($translatedView)) {
            return view($translatedView, compact('languages'));
        }

        // Fallback to default page view if translation is not found
        return view("pages.$page", compact('languages'));  // For example: pages.bg-changer.blade.php
    }
}
