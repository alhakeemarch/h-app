@extends('layouts.app')
@section('title', 'login')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card">
    <strong class="card-header">{{ __('Login') }} 2/2</strong>
    <form class="card-body" method="POST" action="{{ route('login') }}">
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
        <button type="submit" class="btn btn btn-primary btn-block">{{ __('Login') }}</button>
        <!-- //////////// -->
        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        <!-- -->
        @endif
    </form>
</div>
<!-- end of card -->









<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection