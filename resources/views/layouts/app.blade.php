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
        {{-- -------------------------------------------------------------------------------------------------- --}}
        <header class="sticky-top">
            @include('layouts.topnav')
        </header>
        {{-- -------------------------------------------------------------------------------------------------- --}}
        <main>
            {{-- ----------------------------------------------------------- --}}
            <section class="sidebar" id="sidebar">
                @auth
                <div class="sidnave">
                    @include('layouts.sidenav')
                </div>
                @endauth
            </section>
            {{-- ----------------------------------------------------------- --}}
            <section id="app" class="app container-fluid">
                @auth
                <a class="show_side_bar_btn" onclick="show_side_bar(event)"><i class="fas fa-sliders-h"></i></a>
                @endauth
                @yield('content')
            </section>
            {{-- ----------------------------------------------------------- --}}
        </main>
        {{-- -------------------------------------------------------------------------------------------------- --}}
        <footer class="footer-copyright text-light h-navbar-bg">
            <div>
                {{-- time --}}
            </div>
            <div class="text-center">
                &copy; {{__('the_rights')}}
                {{-- <a href="www.hakeemarch.com"> HakeemArch.com</a> --}}
            </div>
            <div class="text-center">
                <a class="Scroll-up-btn" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">
                    <i class="fas fa-angle-double-up"></i></a>
            </div>
        </footer>
        {{-- -------------------------------------------------------------------------------------------------- --}}
    </div>



    @yield('script')

</body>

</html>