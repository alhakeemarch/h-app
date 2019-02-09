@extends('layouts.app') 
@section('content')
<!-- -->
@if (Request::isMethod('get'))
<div class="row justify-content-center">
    <div class="col-md-6">
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
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Email, User name, National ID OR Employee ID"
                                aria-describedby="helpId" required autofocus>
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
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <!-- ///////////////////////////////-->
            </div>
            <!-- /End of card body -->
        </div>
        <!-- /End of card -->
    </div>
    <!-- /End of col -->
</div>
<!-- /End Of row -->
@endif


<!-- -->
@if (Request::isMethod('post') && $user->email)
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <strong class="card-header">{{ __('Login') }}</strong>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="email" value={{$user->email}}>
                    <h3 class="mb-3 text-center">{{$user->name}}</h3>
                    <input id="password" type="password" class="my-2 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required autofocus>
                    <!-- -->
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    <!-- -->
                    @endif
                    <!-- //////////// -->
                    <div class="mx-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
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
    </div>
    <!-- end of col -->
</div>
<!-- end of row -->
@endif
@endsection