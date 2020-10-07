@extends('layouts.app')
@section('title', 'registration')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card ">
    <h5 class="card-header">{{ __('registration') }} 2/2</h5>
    <div class="card-body">
        {{-- --------------------------------------------------------------------------------------------- --}}
        @if ($person->id)
        <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- --------------------------------------------------------------------------------------------- --}}
            <input type="hidden" name="is_employee" value="{{$person->is_employee}}">
            {{-- --------------------------------------------------------------------------------------------- --}}
            <input type="hidden" name="person_id" value="{{$person->id}}">
            {{-- --------------------------------------------------------------------------------------------- --}}
            @php
            $the_name ;
            if($person->ar_name1){
            $the_name= $person->ar_name1;
            }
            if($person->ar_name5){
            $the_name= $the_name .' '.$person->ar_name5;
            }
            if($person->en_name1){
            $the_name= $the_name .':'.$person->en_name1;
            }
            if($person->en_name5){
            $the_name= $the_name .' '.$person->en_name5;
            }
            @endphp
            {{-- --------------------------------------------------------------------------------------------- --}}
            <input type="hidden" name="name" value="{{$the_name}}">
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="form-group row">
                <label for="national_id" class="col-md-2 col-form-label text-md-left">{{ __('nIdNumber') }}</label>
                <div class="col-md-10">
                    <input type="text" name="national_id"
                        class="form-control @error ('national_id') is-invalid @enderror"
                        value="{{$person->national_id}}" readonly required>
                    @error('national_id')
                    <small class=" text-danger"> {{$errors->first('national_id')}} </small>
                    @enderror
                </div>
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                <div class="col-md-10">
                    <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror "
                        value="{{$person->email}}" readonly required>
                    @error('email')
                    <small class=" text-danger"> {{$errors->first('email')}} </small>
                    @enderror
                </div>
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="form-group row">
                <label for="user_name" class="col-md-2 col-form-label text-md-left">{{ __('user name') }}</label>
                <div class="col-md-10">
                    <input type="text" name="user_name" id="user_name"
                        class="form-control @error ('user_name') is-invalid @enderror " value="{{ old('user_name') }}"
                        placeholder="{{__( 'user name')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder='{{ __('user name') }}..'" onkeypress="userNameString(event)"
                        onkeyup="userNameString(event)" maxlength="10" minlength="3" pattern=".{3,10}" required
                        title="{{__('between 3 and 10 characters')}}" autofocus>
                    @error('user_name')
                    <small class=" text-danger"> {{$errors->first('user_name')}} </small>
                    @enderror
                    <small class="form-text text-primary ml-3 @error ('user_name') text-danger @enderror">
                        <li> User name must be between 3 and 10 characters.</li>
                        <li> User name must start with a letters.</li>
                        <li> User name can contain only small letters, numbers, "_" or "-"</li>
                    </small>
                </div>
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label text-md-left">{{ __('Password') }}</label>
                <div class="col-md-10">
                    <input name="password" id="password" type="password"
                        class="form-control @error ('password') is-invalid @enderror"
                        placeholder="{{__( 'password')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder='{{ __('password') }}..'" minlength="6"
                        title="{{__('minimum 6 characters')}}" required>
                    @error('password')
                    <small class=" text-danger invalid-feedback" role="alert"> {{$errors->first('password')}} </small>
                    @enderror
                </div>
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-2 col-form-label text-md-left">{{ __('Confirm Password') }}</label>
                <div class="col-md-10">
                    <input id="password-confirm" type="password" placeholder="{{__( 'password')}}.."
                        onfocus="this.placeholder=''" onblur="this.placeholder='{{ __('password') }}..'" minlength="6"
                        title="{{__('minimum 6 characters')}}"
                        class="form-control @error ('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" required>
                </div>
                @error('password_confirmation')
                <small class=" text-danger invalid-feedback" role="alert"> {{$errors->first('password_confirmation')}}
                </small>
                @enderror
            </div>
            {{-- --------------------------------------------------------- START: buttons - --}}
            <div class="row text-center">
                <div class="col-md-6">
                    <button type="submet" class="btn btn-info w-75">
                        <i class="fas fa-check"></i>
                        <span class="d-none d-md-inline-block">&nbsp; {{__('Register')}}</span>
                    </button>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('/') }}" class="btn btn-info w-75">
                        <i class="fas fa-undo-alt"></i>
                        <span class="d-none d-md-inline-block">&nbsp; cancel</span>
                    </a>
                </div>
            </div>
            {{-- --------------------------------------------------------- END: buttons - --}}
        </form>
        @endif
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
    <div class="card-footer text-muted text-center ">
        © registring new user form..
    </div>
</div>




@endsection

@section('script')
{{-- // for javascript --}}
@endsection