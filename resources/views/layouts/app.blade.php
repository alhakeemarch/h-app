<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir={{ __( 'dir') }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title -->
    <title>@yield('title', 'Hakeem-App')</title>
    <!-- fav Icon -->
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/input_functions.js') }}"></script>
    <script>
        // to refresh page without asking , after post ..
    if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!-- Fonts -->


    {{-- crossorigin="anonymous"> --}}
    <!-- Bootstrab css -->
    @if (App::isLocale('ar'))
    <!-- // -->
    <link href="{{ asset('css/bootstrab_ar.css') }}" rel="stylesheet">
    <!-- // -->
    @else
    <!-- // -->
    <link href="{{ asset('css/bootstrab_en.css') }}" rel="stylesheet">
    <!-- // -->
    @endif
    <!-- other css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">
    <!-- fontawesome css -->
    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/regular.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/brands.css') }}" rel="stylesheet">

    @yield('head')
</head>

<body>

    <div class="wrapper">
        <header class="sticky-top">
            @include('layouts.topnav')
        </header>

        {{-- <main class="container-fluid "style="min-height:100%;margin-top: 4rem !important; margin-bottom: 5rem !important;"> --}}
        <main>
            <div id="app" class="container-fluid">
                @yield('content')
            </div>
            <!-- /End of div id="app" -->
        </main>

        {{-- fixed-bottom --}}

        <footer>
            <div class="footer-copyright text-center py-3 text-light h-navbar-bg">&copy; {{__('the_rights')}}
                {{-- <a href="www.hakeemarch.com"> HakeemArch.com</a> --}}
            </div>
        </footer>
    </div>

    @yield('script')
</body>

</html>