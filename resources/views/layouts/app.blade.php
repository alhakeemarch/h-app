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
            animation: fedOut 1s;
            animation-fill-mode: forwards;
        }

        @keyframes fedOut {
            100% {
                opacity: 0;
                visibility: hidden;
                display: none;
            }
        }

    </style>
</head>

<body>
    <div class="loader">
        <img src="{{asset('img/loading-1.gif')}}" alt="Loading...">
    </div>
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
                <!-- ///////////////////////////////-->
                @if ($errors->any())
                @include('layouts.errors')
                @endif
                <!-- ///////////////////////////////-->
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <!-- ///////////////////////////////-->

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
    <script src="{{ asset('js/loader.js') }}" defer></script>

</body>

</html>