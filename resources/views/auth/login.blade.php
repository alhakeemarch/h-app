@extends('layouts.app')
@section('content')
<!-- -->
@if (Request::isMethod('get'))
<div class="card">
    <h5 class="card-header">{{ __('Login') }}</h5>

    <div class="card-body">
        {{--
                <form method="POST" action="{{ route('login') }}"> --}}
        <form method="POST" action="{{ url('user/userLogin') }}">
            @csrf
            <input type="hidden" name="hi" value='noval'>

            <div class="form-group">
                <!-- user_name -->
                <label for="user_name">{{__('User Login')}}</label>
                <input id="a1" type="text" name="user_name" id="user_name" class="form-control" required
                    placeholder="Email, User name, National ID OR Employee ID" onfocus="this.placeholder=''"
                    onblur="this.placeholder='Email, User name, National ID OR Employee ID'" aria-describedby="helpId"
                    autofocus="autofocus">
                <!-- -->
                @if ($errors->has('user_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('user_name') }}</strong>
                </span>
                <!-- -->
                @endif
                <!-- -->
                <small id="helpId" class="text-muted">Email, User name, National ID OR Employee ID</small>
            </div>
            <!-- /End of user_name -->

            <input type="submit" class="btn btn btn-secondary btn-block my-2" value="{{ __('Next') }}">
            {{--
                        <!-- -->
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            <!-- -->
            @endif
            <!-- -->
            --}}
        </form>
        <!-- ///////////////////////////////-->
        @if ($errors->any())
        @include('layouts.errors') @endif
        <!-- ///////////////////////////////-->
    </div>
    <!-- /End of card body -->
</div>
<!-- /End of card -->
@endif


<!-- -->
@if (Request::isMethod('post') && $user->email)

<div class="card">
    <strong class="card-header">{{ __('Login') }}</strong>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="email" value={{$user->email}}>
            <h3 class="mb-3 text-center"> {{__('welcom')}} {{$user->name}}</h3>
            <input type="password" name="password"
                class="my-2 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                placeholder="{{__('Password')}} " onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__('Password')}}'" required autofocus="true">

            <small id="helpId" class="text-muted">{{__('Password')}}</small>
            <!-- -->
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            <!-- -->
            @endif
            <!-- //////////// -->
            <div class="mx-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old( 'remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
            </div>
            <!-- //////////// -->
            <button type="submit" class="my-2 btn btn btn-secondary btn-block">{{ __('Login') }}</button>
            <!-- //////////// -->
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            <!-- -->
            @endif
        </form>
    </div>
    <!-- end of card-body -->
</div>
<!-- end of card -->
@endif







@endsection