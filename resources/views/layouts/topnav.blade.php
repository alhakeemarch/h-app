<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow fixed-top">
    <!-- navlogo -->
    <div class="navlogo col-lg-2 d-none d-lg-inline-block text-justify">
        <a class="navbar-brand mr-0" href="{{ url('/') }}">
            <img src="{{ asset('img/logo-3.png') }}" width="35" height="35" class="d-inline-block align-top d-md-inline"
                alt="LOGO">
            <span class=" font-weight-bold">{{__('app name')}}</span>
        </a>
    </div>
    <!-- /END navlogo -->

    <!-- navlogo for small screens -->
    <div class="navlogo text-center d-lg-none">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo-3.png') }}" width="35" height="35" class="d-inline-block align-top d-md-inline"
                alt="">
        </a>
    </div>
    <!-- /END navlogo for small screens -->

    <!-- nav-collapse-btn -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--/END nav-collapse-btn -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            @auth
            <!-- navlinks -->
            <ul class="navbar-nav">

                <!-- dropdown for New -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('New')}} &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route ('customer.check') }}">{{__('customer')}}</a>
                        @if(auth()->user()->user_level >= 10)
                        <a class="dropdown-item" href="{{ route ('employee.check') }}">{{__('Employee')}}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route ('plot.check') }}">{{__('Plot')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route ('project.check') }}">{{__('Project')}}</a>
                        <a class="dropdown-item" href="{{ route ('contract.check') }}">{{__('contract')}}</a>
                        <a class="dropdown-item" href="{{ route ('task.check') }}">{{__('task')}}</a>
                    </div>
                </li>
                <!--/End of dropdown for New -->
                <!-- dropdown for Edit -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('Edit')}} &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="{{ route ('customer.edit') }}">{{__('customer')}}</a> --}}
                        @if (auth()->user()->user_level >= 10)
                        {{-- <a class="dropdown-item" href="{{ route ('employee.edit') }}">{{__('employee')}}</a> --}}
                        @endif
                        {{-- <a class="dropdown-item" href="{{ route ('plote.edit') }}">{{__('plot')}}</a> --}}
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="{{ route ('project.edit') }}">{{__('project')}}</a> --}}
                        {{-- <a class="dropdown-item" href="{{ route ('contract.edit') }}">{{__('contract')}}</a> --}}
                        {{-- <a class="dropdown-item" href="{{ route ('task.edit') }}">{{__('task')}}</a> --}}
                    </div>
                </li>
                <!--/End of dropdown for Edit -->
                <!-- dropdown for show -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('Show')}} &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route ('customer.index') }}">{{__('customer')}}</a>
                        @if(auth()->user()->user_level>= 10)
                        <a class="dropdown-item" href="{{ route ('employee.index') }}">{{__('Employee')}}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route ('plot.index') }}">{{__('plot')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route ('project.index') }}">{{__('Project')}}</a>
                        <a class="dropdown-item" href="{{ route ('contract.index') }}">{{__('Contract')}}</a>
                        <a class="dropdown-item" href="{{ route ('task.index') }}">{{__('Task')}}</a>
                    </div>
                </li>
                <!--/End of dropdown for edit -->
                <!-- dropdown for delet -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('Delet')}} &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="{{ route ('customer.delet') }}">{{__('customer')}}</a> --}}
                        @if (auth()->user()->user_level >= 10)
                        {{-- <a class="dropdown-item" href="{{ route ('employee.delet') }}">{{__('employee')}}</a> --}}
                        @endif
                        {{-- <a class="dropdown-item" href="{{ route ('plot.delet') }}">{{__('plot')}}</a> --}}
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="{{ route ('project.delet') }}">{{__('project')}}</a> --}}
                        {{-- <a class="dropdown-item" href="{{ route ('contract.delet') }}">{{__('contract')}}</a> --}}
                        {{-- <a class="dropdown-item" href="{{ route ('task.delet') }}">{{__('task')}}</a> --}}
                    </div>
                </li>
                <!--/End of dropdown for delet -->
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <i class="fas fa-sign-out-alt mx-4"></i>
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