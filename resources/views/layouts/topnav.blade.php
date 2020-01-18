<nav class="navbar navbar-expand-lg navbar-dark h-navbar-bg text-capitalize">
    <!-- navlogo -->
    <div class="d-none d-lg-inline-block navlogo col-lg-2  text-justify">

        <a class="d-flex align-items-center navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo-3.png') }}" width="35" height="35" class="d-inline-block align-top m-1"
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
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('projects')}} &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route ('project.index') }}">{{__('projects')}}</a>
                        @if(auth()->user()->user_level >= 10 or true)
                        <a class="dropdown-item" href="{{ route ('plot.index') }}">{{__('plots')}}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route ('contract.index') }}">{{__('contracts')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route ('home') }}">{{__('attachments')}}----</a>
                        <a class="dropdown-item" href="{{ route ('customer.index') }}">{{__('custromars')}}</a>
                        <a class="dropdown-item" href="{{ route ('task.index') }}">{{__('tasks')}}</a>
                    </div>
                </li>
                <!--/End of dropdown for New -->
                <!-- dropdown for Edit -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('data')}} &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (auth()->user()->user_level >= 10 or true)
                        <a class="dropdown-item" href="{{ route ('country.index') }}">{{__('countries')}}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route ('saudiCity.index') }}">{{__('saudi cities')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"
                            href="{{ route ('municipalityBranch.index') }}">{{__('municipalities')}}</a>
                        <a class="dropdown-item" href="{{ route ('district.index') }}">{{__('districts')}}</a>
                        <a class="dropdown-item" href="{{ route ('neighbor.index') }}">{{__('neighbors')}}</a>
                        <a class="dropdown-item" href="{{ route ('plan.index') }}">{{__('plans')}}</a>
                        <a class="dropdown-item" href="{{ route ('street.index') }}">{{__('streets')}}----</a>
                        <a class="dropdown-item"
                            href="{{ route ('allowedBuildingRatio.index') }}">{{__('building ratio')}}</a>
                        <a class="dropdown-item"
                            href="{{ route ('allowedBuildingHeight.index') }}">{{__('building height')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route ('ownerType.index') }}">{{__('owner types')}}</a>
                        {{-- // *طريقة لوضع الصلاحيات --}}
                        @if(auth()->user()->is_admin)
                        <a class="dropdown-item" href="{{ route ('user.index') }}">{{__('users')}}</a>
                        <a class="dropdown-item" href="{{ route ('person.index') }}">{{__('persons')}}</a>
                        @endif

                        @if(auth()->user()->is_admin or auth()->user()->is_manager)
                        <a class="dropdown-item" href="{{ route ('employee.index') }}">{{__('employees')}}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route ('customer.index') }}">{{__('customers')}}</a>
                        <a class="dropdown-item" href="{{ route ('home') }}">{{__('companies')}}---</a>
                        <a class="dropdown-item" href="{{ route ('home') }}">{{__('organizations')}}---</a>
                        <a class="dropdown-item" href="{{ route ('home') }}">{{__('endowments')}}---</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route ('major.index') }}">{{__('majors')}}</a>
                        <a class="dropdown-item"
                            href="{{ route ('contractfield.index') }}">{{__('contract fields')}}</a>
                        <a class="dropdown-item" href="{{ route ('lettertype.index') }}">{{__('letter type')}}</a>
                    </div>
                </li>
                <!--/End of dropdown for Edit -->
                <!-- dropdown for show -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('accounting')}}
                        &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route ('account.index') }}">{{__('acunts')}}</a>
                        <a class="dropdown-item" href="{{ route ('receiptIn.index') }}">{{__('receipt in')}}</a>
                        {{-- // to add some rouls
                        @can('viewAny', App\person::class)
                        @endcan --}}

                        <a class="dropdown-item" href="{{ route ('receiptOut.index') }}">{{__('receipt out')}}</a>

                        <a class="dropdown-item"
                            href="{{ route ('receiptDiscount.index') }}">{{__('receipt discount')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route ('invoice.index') }}">{{__('invoice')}}</a>
                        <a class="dropdown-item" href="{{ route ('invoiceReturn.index') }}">{{__('invoice return')}}</a>
                        <a class="dropdown-item" href="{{ route ('home') }}">{{__('......')}}</a>
                    </div>
                </li>
                <!--/End of dropdown for edit -->
                <!-- dropdown for delet -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{__('administratives')}}
                        &nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route ('import.index') }}">{{__('import')}}</a>

                        <a class="dropdown-item" href="{{ route ('export.index') }}">{{__('export')}}</a>

                        <a class="dropdown-item" href="{{ route ('home') }}">{{__('......')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route ('employee.index') }}">{{__('employeese')}}</a>
                        <a class="dropdown-item" href="{{ route ('letter.index') }}">{{__('letter')}}</a>
                        <a class="dropdown-item" href="{{ route ('home') }}">{{__('.......')}}</a>
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
                    <i class="fas fa-globe-asia fa-1x"></i>
                </a> @else
                <a href="{{ url('locale/ar') }}" class="nav-item nav-link">
                    <i class="fas fa-globe-asia fa-1x"></i>
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
                <a class="nav-link" href="{{ route('register.check') }}">{{ __('Register') }}</a>
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