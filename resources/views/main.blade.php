<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @includeFirst(['pages.header'])
</head>
<body>

    @includeFirst(['pages.navbar'])
    <div class="container-fluid  px-0">
        @yield('page')
    </div>

    @includeFirst(['pages.footer'])
    

</body>
</html>
