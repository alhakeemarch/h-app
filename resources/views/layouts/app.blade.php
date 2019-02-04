<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir={{ __( 'dir') }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Hakeem-App')</title>
    {{--
    <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <!-- fav Icon -->
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>        
            function onlyNumber(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
                    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
                    if(key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) { 
                        return;
                    }
                   var ch = String.fromCharCode(theEvent.which);
                    if(!(/[0-9]/.test(ch))){
                        theEvent.preventDefault();
                    }
                }
            // ================================
            function onlyString(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
                    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
                    if(key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) { 
                        return;
                    }
                   var ch = String.fromCharCode(theEvent.which);
                    // arabic letters will be in this group as regex [\u0621-\u064A\u0660-\u0669 ]+$
                    if(!(/[a-z\u0621-\u064A\u0660-\u0669 ]/i.test(ch))){
                        theEvent.preventDefault();
                    }
                }
             // ================================
             function onlyArabicString(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
                    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
                    if(key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) { 
                        return;
                    }
                   var ch = String.fromCharCode(theEvent.which);
                    // arabic letters will be in this group as regex [\u0621-\u064A\u0660-\u0669 ]+$
                    if(!(/[\u0621-\u064A\u0660-\u0669 ]/.test(ch))){
                        theEvent.preventDefault();
                    }
                }
             // ================================
             function onlyEnglishString(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    // Don't validate the input if below arrow, delete, tab and backspace keys were pressed 
                    // Left=37 / Up=38 / Right=39 / Down=40 Arrow, Backspace=8, Delete=46, Tab=9 keys,  Enter=13
                    if(key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46 || key == 9 || key == 13) { 
                        return;
                    }
                   var ch = String.fromCharCode(theEvent.which);
                    if(!(/[a-z ]/i.test(ch))){
                        theEvent.preventDefault();
                    }
                }
        </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amiri|Aref+Ruqaa|Baloo+Bhaijaan|Changa|El+Messiri|Harmattan|Jomhuria|Katibeh|Lateef|Lemonada|Mada|Markazi+Text|Rakkas|Reem+Kufi|Tajawal|Prosto+One" rel="stylesheet"> {{-- // google fonts  --}}

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <!-- Bootstrab css -->
    @if (App::isLocale('ar'))
    <!-- // -->
    <link href="{{ asset('css/bootstrab_ar.css') }}" rel="stylesheet">
    <!-- // -->
    @else
    <!-- // -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- // -->
    @endif
    <style>
    body{
           background-image:
            radial-gradient(
	        #c3c8d5,
            #5e6a87
            );

        /* font-family: 'Reem Kufi', sans-serif; */
        font-family: 'Tajawal','Prosto One', sans-serif; /* 100 */
        /* font-family: 'Amiri', serif; */
        /* font-family: 'Changa', sans-serif; // 100  */
        /* font-family: 'El Messiri', sans-serif; // 100 */
        /* font-family: 'Lateef', cursive; */
        /* font-family: 'Mada', sans-serif; */
        /* font-family: 'Baloo Bhaijaan', cursive; */
        /* font-family: 'Lemonada', cursive; */
        /* font-family: 'Markazi Text', serif; // 50 */
        /* font-family: 'Harmattan', sans-serif; */
        /* font-family: 'Aref Ruqaa', serif; */
        /* font-family: 'Jomhuria', cursive; */
        /* font-family: 'Rakkas', cursive; */
        /* font-family: 'Katibeh', cursive; */
        /* font-family: 'Prosto One', cursive; */
    }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow fixed-top">
            <!-- navlogo -->
            <div class="navlogo col-lg-2 d-none d-lg-inline-block text-justify">
                <a class="navbar-brand mr-0" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-3.png') }}" width="35" height="35" class="d-inline-block align-top d-md-inline" alt="LOGO">
                    <span class=" font-weight-bold">{{__('app name')}}</span>
                </a>
            </div>
            <!-- /END navlogo -->

            <!-- navlogo for small screens -->
            <div class="navlogo text-center d-lg-none">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-3.png') }}" width="35" height="35" class="d-inline-block align-top d-md-inline" alt="">
                </a>
            </div>
            <!-- /END navlogo for small screens -->

            <!-- nav-collapse-btn -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!--/END nav-collapse-btn -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @auth
                    <!-- navlinks -->
                    <ul class="navbar-nav">
                        {{--
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> --}}
                        <!-- dropdown 1 -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> {{__('New')}} &nbsp;</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('person/check') }}">{{__('Customer')}}</a>
                                @if (auth()->user()->user_level >= 10)
                                <a class="dropdown-item" href="{{ url('/') }}">{{__('Employee')}}</a>
                                @endif
                                <a class="dropdown-item" href="#">{{__('Plot')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">{{__('Project')}}</a>
                                <a class="dropdown-item" href="#">{{__('Contract')}}</a>
                                <a class="dropdown-item" href="#">{{__('Task')}}</a>
                            </div>
                        </li>
                        <!--/End of dropdown 1 -->
                        <!-- dropdown 2 -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> {{__('Edit')}} &nbsp;</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/') }}">{{__('Customer')}}</a>
                                @if (auth()->user()->user_level >= 10)
                                <a class="dropdown-item" href="{{ url('/') }}">{{__('Employee')}}</a>
                                @endif
                                <a class="dropdown-item" href="#">{{__('Plot')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">{{__('Project')}}</a>
                                <a class="dropdown-item" href="#">{{__('Contract')}}</a>
                                <a class="dropdown-item" href="#">{{__('Task')}}</a>
                            </div>
                        </li>
                        <!--/End of dropdown 2 -->
                        <!-- dropdown 3 -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> {{__('Show')}} &nbsp;</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/') }}">{{__('Customer')}}</a>
                                @if (auth()->user()->user_level >= 10)
                                <a class="dropdown-item" href="{{ url('/') }}">{{__('Employee')}}</a>
                                @endif
                                <a class="dropdown-item" href="#">{{__('Plot')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">{{__('Project')}}</a>
                                <a class="dropdown-item" href="#">{{__('Contract')}}</a>
                                <a class="dropdown-item" href="#">{{__('Task')}}</a>
                            </div>
                        </li>
                        <!--/End of dropdown 3 -->
                        <!-- dropdown 4 -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> {{__('Delet')}} &nbsp;</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/') }}">{{__('Customer')}}</a>
                                @if (auth()->user()->user_level >= 10)
                                <a class="dropdown-item" href="{{ url('/') }}">{{__('Employee')}}</a>
                                @endif
                                <a class="dropdown-item" href="#">{{__('Plot')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">{{__('Project')}}</a>
                                <a class="dropdown-item" href="#">{{__('Contract')}}</a>
                                <a class="dropdown-item" href="#">{{__('Task')}}</a>
                            </div>
                        </li>
                        <!--/End of dropdown 4 -->
                    </ul>
                    @endauth
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- language icon -->
                    <div class="">
                        @if (App::isLocale('ar'))
                        <a href="{{ url('locale/en') }}" class="nav-item nav-link">
                                    <i class="fas fa-globe-asia fa-2x"></i>
                                    </a> @else
                        <a href="{{ url('locale/ar') }}" class="nav-item nav-link">
                                    <i class="fas fa-globe-asia fa-2x"></i>
                                    </a> @endif
                    </div>
                    <!-- /End language icon -->

                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
                <!-- /End of right Side Of Navbar -->
            </div>
            <!-- /navlinks -->



        </nav>
    </div>
    <div style="width: 100%; height: 80px;"> </div>
    <!-- /End of div id="app" -->

    <main class="container-fluid" style="min-height:85vh;">
        @yield('content')
    </main>
    

    {{-- fixed-bottom --}}
    <footer class="footer text-light bg-dark shadow  py-3 text-center">
        <div class="">
            <span class="">&copy; {{__('the_rights')}}</span>
        </div>
    </footer>
</body>

</html>