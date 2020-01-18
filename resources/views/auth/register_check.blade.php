@extends('layouts.app')
@section('title', 'registration')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card ">
    <h5 class="card-header">{{ __('registration') }} 1/2</h5>
    <div class="card-body">
        {{-- --------------------------------------------------------------------------------------------- --}}
        {{-- <form action="{{ route ('userRegister') }}" method="POST"> --}}
        <form action="{{ route ('register.check') }}" method="POST">
            @csrf
            {{-- --------------------------------------------------------------------------------------------- --}}
            <label for="national_id">{{__( 'nId')}}:</label>
            <input type="text" name="national_id" class="form-control mb-3 @error ('national_id') is-invalid @enderror"
                placeholder="{{__( 'nIdNumber')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('nIdNumber') }}..'" onkeypress="onlyNumber(event)" maxlength="10"
                pattern=".{10,}" required title="{{__('must be 10 digits')}}" autofocus>
            @error('national_id')
            <small class="text-danger"> {{$errors->first('national_id')}} </small>
            @enderror
            {{-- --------------------------------------------------------- START: buttons - --}}
            <div class="row text-center">
                <div class="col-md-6">
                    <button type="submet" class="btn btn-info w-75">
                        <i class="fas fa-search"></i>
                        {{-- <i class="fas fa-check"></i> --}}
                        <span class="d-none d-md-inline-block">&nbsp; {{__('view')}}</span>
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
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
    <div class="card-footer text-muted text-center ">
        © registring new user form..
    </div>
</div>





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection