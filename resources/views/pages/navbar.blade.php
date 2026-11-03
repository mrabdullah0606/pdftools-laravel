<!-- Header -->
<header class="bg-white shadow-sm sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center"
                   href="{{ localized_route('home') }}">
                    <div class="d-inline-block">
                        <img src="{{ asset('images/logo.png') }}" alt="@lang('navbar.logo_alt')" class="img-fluid" width="136" height="30">
                    </div>
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ localized_route('home') }}">
                                @lang('navbar.home')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ localized_route('blog') }}">
                                @lang('navbar.blog')
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ localized_route('about') }}">
                                @lang('navbar.about')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ localized_route('contact-us') }}">
                                @lang('navbar.contact')
                            </a>
                        </li>
                      
                    </ul>

                    <!-- Language Dropdown -->
                    @php
                        $currentLang = app()->getLocale();
                        $supportedLocales = config('locales.supported');
                        $languageNames = [
                            'en' => 'English', 'es' => 'Spanish', 'fr' => 'French', 'de' => 'German',
                            'bn' => 'Bengali', 'ar' => 'Arabic', 'zh' => 'Chinese', 'ja' => 'Japanese',
                            'ko' => 'Korean', 'tr' => 'Turkish', 'hi' => 'Hindi', 'ru' => 'Russian',
                            'pt' => 'Portuguese', 'pl' => 'Polish', 'sv' => 'Swedish', 'uk' => 'Ukrainian',
                            'vi' => 'Vietnamese', 'id' => 'Indonesian', 'cs' => 'Czech', 'ro' => 'Romanian',
                            'el' => 'Greek', 'da' => 'Danish', 'no' => 'Norwegian', 'af' => 'Afrikaans',
                            'am' => 'Amharic', 'fi' => 'Finnish', 'hy' => 'Armenian', 'nl' => 'Dutch',
                            'it' => 'Italian', 'ms' => 'Malay', 'th' => 'Thai',
                        ];
                    @endphp

                    <div class="dropdown position-relative">
                        <button class="btn btn-light dropdown-toggle" type="button" id="languageDropdown"
                                data-bs-toggle="collapse" data-bs-target="#languageCollapse" 
                                aria-expanded="false" aria-controls="languageCollapse">
                            🌐 {{ $languageNames[$currentLang] ?? strtoupper($currentLang) }}
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    
    <!-- Collapsible Language List -->
    <div class="collapse border-top pt-lg-3" id="languageCollapse">
        <div class="container-fluid py-2 px-5">
            <div class="language-grid">
                @foreach ($supportedLocales as $locale)
                    @php
                        $currentRoute = \Illuminate\Support\Facades\Route::current();
                        $currentRouteName = $currentRoute?->getName();
                        $currentParams = $currentRoute?->parameters() ?? [];

                        unset($currentParams['locale']);

                        if ($locale === 'en') {
                            $translatedRouteName = str_replace('localized.', '', $currentRouteName);
                        } else {
                            $currentParams['locale'] = $locale;
                            $translatedRouteName = str_starts_with($currentRouteName, 'localized.') 
                                ? $currentRouteName 
                                : 'localized.' . $currentRouteName;
                        }

                        try {
                            $url = \Illuminate\Support\Facades\Route::has($translatedRouteName)
                                ? route($translatedRouteName, $currentParams)
                                : ($locale === 'en' ? route('home') : route('localized.home', ['locale' => $locale]));
                        } catch (\Exception $e) {
                            $url = $locale === 'en' ? route('home') : route('localized.home', ['locale' => $locale]);
                        }
                    @endphp
    
                    <div class="language-item">
                        <a class="dropdown-item border rounded p-2 d-flex align-items-center" href="{{ $url }}">
                            <img src="{{ asset('images/flags/' . $locale . '.svg') }}" width="20" height="11" loading="lazy"
                                 class="me-2" alt="{{ $languageNames[$locale] ?? $locale }}">
                            {{ $languageNames[$locale] ?? strtoupper($locale) }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const languageDropdown = document.getElementById('languageDropdown');
    const languageCollapse = document.getElementById('languageCollapse');
    const navbarCollapse = document.getElementById('navbarNav');

    document.addEventListener('click', function (event) {

        /* ----- 1. Close Language Dropdown ----- */
        const insideLangBtn = languageDropdown.contains(event.target);
        const insideLangMenu = languageCollapse.contains(event.target);

        if (!insideLangBtn && !insideLangMenu) {
            if (languageCollapse.classList.contains('show')) {
                const bsLang = new bootstrap.Collapse(languageCollapse, { toggle: false });
                bsLang.hide();
            }
        }

        /* ----- 2. Close Mobile Navbar ----- */
        const insideNavbar = navbarCollapse.contains(event.target);
        const navbarOpen = navbarCollapse.classList.contains('show');

        if (navbarOpen && !insideNavbar) {
            const bsNav = new bootstrap.Collapse(navbarCollapse, { toggle: false });
            bsNav.hide();
        }

    });
});
</script>
