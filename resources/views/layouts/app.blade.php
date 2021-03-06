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
    <!-- other css -->
    <link href="{{ asset('css/my_font.css') }}" rel="stylesheet">
    <!-- fontawesome css -->
    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/regular.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/brands.css') }}" rel="stylesheet">
    @livewireStyles

    @yield('head')
    <style>
        .loader {
            position: fixed;
            z-index: 2000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: lightgrey;
            opacity: 0.5;
        }

        .loader>img {
            width: 100px;
        }

        .loader.hidden {
            animation: fedOut 0.5s;
            animation-fill-mode: forwards;
        }

        @keyframes fedOut {
            100% {
                opacity: 0;
                visibility: hidden;
                display: none;
            }
        }

        .bg-logo {
            position: fixed;
            z-index: -1;
            /* z-index: 2000; */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("{{asset('img/bg-Logo.png')}}");
            background-repeat: no-repeat;
            background-size: 20vw;
            background-position: center;

        }

        .pulse {
            animation: pulse-animation 2s infinite ease-in-out;

        }

        @keyframes pulse-animation {
            0% {
                box-shadow: 0 0 0 0px rgba(61, 81, 255, 0.2);
            }

            25% {
                box-shadow: 0 0 0 20px rgba(61, 81, 255, 0);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(61, 81, 255, 0);
            }

            75% {
                box-shadow: 0 0 0 15px rgba(61, 81, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 20px rgba(61, 81, 255, 0);
            }
        }

    </style>
    <script src="{{asset('/vendor/livewire/livewire.js')}}"></script>
</head>

<body>
    <div class=" loader">
        <img src="{{asset('img/loading-1.gif')}}" alt="Loading...">
    </div>
    <div class="bg-logo"></div>
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
                <a class="show_side_bar_btn pulse" onclick="show_side_bar(event)"><i class="fas fa-sliders-h"></i></a>
                @endauth
                <!-- ///////////////////////////////-->
                @if ($errors->any())
                @include('layouts.errors')
                @endif
                <!-- ///////////////////////////////-->
                @if(session()->has('success'))
                @include('layouts.success')
                @endif
                <!-- ///////////////////////////////-->
                @auth
                @include('layouts.breadcrumb_nav')
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
            <div class="text-center Scroll-up-btn-container">
                <a class="Scroll-up-btn" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">
                    <i class="fas fa-angle-double-up Scroll-up-btn-icon"></i>
                    <small class="px-2">UP</small>
                </a>
            </div>
        </footer>
        {{-- -------------------------------------------------------------------------------------------------- --}}
    </div>



    @yield('script')
    <script>

    </script>
    <script src="{{ asset('js/loader.js') }}" defer></script>
    {{-- @livewireScripts --}}
    {{-- <script src="{{asset('/vendor/livewire/livewire.js')}}"></script> --}}

</body>

</html>