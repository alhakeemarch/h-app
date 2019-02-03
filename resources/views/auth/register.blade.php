@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- /// -->
        @if (Request::isMethod('get'))
        <div class="col-md-8">
            <div class="card">
                <!-- ///////////////////////////////-->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- ///////////////////////////////-->
                <div class="card-body">
                    <h4 class="card-title">{{__('Registration form')}}</h4>
                    <p class="card-text">{{__('Enter national ID to check')}}</p>
                    <form action="{{ url('user/userRegister') }}" method="post">
                        @csrf
                        <label for="n_id">{{__( 'nId')}}:</label>
                        <input type="text" onkeypress="onlyNumber(event)" name="national_id" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.."
                            maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                        <input type="submit" value="{{__('view')}}" class="btn btn-secondary btn-block">
                    </form>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        @endif




        <!-- //-->
        @if (Request::isMethod('post') && " {{$person->id}}")
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="is_employee" value="{{$person->is_employee}}">

                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user_name" value="{{$person->national_id}}" readonly required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$person->email}}{{ old('email') }}"
                                    readonly required> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required autofocus> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- col-md-8 -->
        @endif
    </div>
</div>
@endsection