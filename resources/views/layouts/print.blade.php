<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title -->
    <title>@yield('title', 'Hakeem-App')</title>
    <!-- fav Icon -->
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- arabic BootStrap -->
    <link href="{{ asset('css/bootstrab_ar.css') }}" rel="stylesheet">
    <!-- arabic FontAwesome -->
    {{-- <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/regular.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/brands.css') }}" rel="stylesheet"> --}}
    @yield('head')



    <style>
        html {
            min-width: 100%;
            min-height: 100%;
            background-image: url(http://www.example.com/somelargeimage.jpg);
            background-position: top center;
            background-color: #000;
        }

        main {
            /* width: 1054px; */
            height: 873px;
            background-color: #FFF;
        }

    </style>




</head>

<body>
    <div class="wrapper">
        @yield('content')
    </div>
    @yield('script')
</body>

</html>