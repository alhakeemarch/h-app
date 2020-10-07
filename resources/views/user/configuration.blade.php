@extends('layouts.app')
@section('title', 'user configuration')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">{{ __('password change') }}</h5>
    <form action="{{ route ('change.password') }}" method="post" class="card-body">
        @csrf
        <div class="form-group row">
            <label for="old_password" class="col-md-2 col-form-label text-md-left">{{ __('old password') }}</label>
            <div class="col-md-10">
                <input name="old_password" id="old_password" type="password"
                    class="form-control @error ('old_password') is-invalid @enderror"
                    placeholder="{{__( 'old_password')}}.." onfocus="this.placeholder=''"
                    onblur="this.placeholder='{{ __('old_password') }}..'" minlength="6"
                    title="{{__('minimum 6 characters')}}" required>
                @error('old_password')
                <small class=" text-danger invalid-feedback" role="alert"> {{$errors->first('old_password')}} </small>
                @enderror
            </div>
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="form-group row">
            <label for="password" class="col-md-2 col-form-label text-md-left">{{ __('Password') }}</label>
            <div class="col-md-10">
                <input name="password" id="password" type="password"
                    class="form-control @error ('password') is-invalid @enderror" placeholder="{{__( 'password')}}.."
                    onfocus="this.placeholder=''" onblur="this.placeholder='{{ __('password') }}..'" minlength="6"
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
                    <span class="d-none d-md-inline-block">&nbsp; {{__('change')}}</span>
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

</div>



{{-- /////////////////////////////// --}}
@if (\Session::has('success'))
<ul class="alert alert-success">
    <li>{{ \Session::get('success') }}</li>
</ul>
@endif
{{-- /////////////////////////////// --}}



@endsection

@section('script')
{{-- // for javascript --}}
@endsection