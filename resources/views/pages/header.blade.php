<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@php
    use Illuminate\Support\Facades\Route;

    $currentLang = app()->getLocale();
    $currentRoute = Route::current();
    $currentRouteName = $currentRoute?->getName();
    $currentParams = $currentRoute?->parameters() ?? [];
    $supportedLocales = config('locales.supported');

    $hreflangs = [];
    $defaultUrl = '';

    foreach ($supportedLocales as $locale) {
        // Prepare route name
        $translatedRouteName = $currentRouteName;

        if ($locale === 'en') {
            unset($currentParams['locale']);
            $translatedRouteName = str_replace('localized.', '', $currentRouteName);
        } else {
            $currentParams['locale'] = $locale;
            if (!str_starts_with($currentRouteName, 'localized.')) {
                $translatedRouteName = 'localized.' . $currentRouteName;
            }
        }

        // Fallback to home if the route doesn't exist
        if (Route::has($translatedRouteName)) {
            $url = route($translatedRouteName, $currentParams, false);
        } else {
            $url = $locale === 'en' ? route('home', [], false) : route('localized.home', ['locale' => $locale], false);
        }

        $absoluteUrl = url($url);

        if ($locale === 'en') {
            $defaultUrl = $absoluteUrl; // Save English version for x-default
        }

        $hreflangs[] = [
            'locale' => $locale,
            'url' => $absoluteUrl,
        ];
    }
@endphp
{{-- hreflang tags --}}
<link rel="alternate" hreflang="x-default" href="{{ $defaultUrl }}" />
@foreach ($hreflangs as $hreflang)<link rel="alternate" hreflang="{{ $hreflang['locale'] }}" href="{{ $hreflang['url'] }}" />@endforeach
{{-- canonical link --}}
<link rel="canonical" href="{{ url()->current() }}" />
<title>@yield('title', 'Default Title')</title>
<meta name="description" content="@yield('description', 'Home Page')">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- favicon links --}}
<link rel="icon" type="image/png" href="{{asset('images/favicon-96x96.png')}}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{asset('images/favicon.svg')}}" />
<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/apple-touch-icon.png')}}" />
<meta name="apple-mobile-web-app-title" content="MyWebSite" />
<link rel="manifest" href="{{asset('images/site.webmanifest')}}" />


{{-- OG Tags --}}
<meta property="og:title" content="@yield('title', 'Default Title')" />
<meta property="og:description" content="@yield('description', 'Home Page')" />
<meta property="og:image" content="@yield('og_image', asset('images/logo2.svg'))" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />
<meta property="og:locale" content="en_US" />
<meta name="google-site-verification" content="LiryeFOxAGnlFUnKIq_NlpO1B94MXs44ajr2P88U7DU" />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6682814134739940" crossorigin="anonymous"></script>

<style>
    :root {
        --primary: rgb(126, 110, 246);
        --primary-dark: rgb(100, 85, 220);
        --primary-light: rgba(126, 110, 246, 0.1);
        --white: #ffffff;
        --light: #f9fafb;
        --dark: #1f2937;
        --gray: #6b7280;
        --light-gray: #e5e7eb;
        --radius: 16px;
    }
    

    .bg-gradient {
        /* background: linear-gradient(90deg, rgba(92,72,247,1) 0%, rgba(133,117,245,1) 100%) !important; */
        background: linear-gradient(90deg, rgba(114,97,247,1) 0%, rgba(133,117,245,1) 100%) !important;
        /* background: #60a7ff */
    }
    .text-gradient {
        color:  #7261f7;
    }
    .border-gradient{
        border: 3px dashed rgba(133,117,245,1);
    }
    .w-68{
        width: 68%;
    }
    .w-64{
        width: 64%;
    }
    .card-tools{width: 250px;}
    .language-grid{
        display: grid;
;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)) !important;
        gap: 0.75rem !important;
    }
    footer {
        background-color: #4b4291;
        color: var(--white);
        padding: 5rem 0 2rem;
        margin-top: 5rem;
    }
    
</style>
<!-- Bootstrap CSS -->
<link href="{{asset('bootstrap.css')}}" rel="stylesheet">

{{-- <!-- Font Awesome -->
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</noscript>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</noscript> --}}
@stack('head')
