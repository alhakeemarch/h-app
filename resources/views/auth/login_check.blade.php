@extends('layouts.app')
@section('title', 'login')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">{{ __('Login') }} 1/2</h5>
    <form class="card-body" method="POST" action="{{ route('login.check') }}">
        @csrf
        <div class="form-group">
            <label for="user_name">{{__('User Login')}}</label>
            <input type="text" name="user_name" class="form-control @error ('user_name') is-invalid @enderror"
                placeholder="Email, User name, National ID OR Employee ID" onfocus="this.placeholder=''"
                onblur="this.placeholder='Email, User name, National ID OR Employee ID'" autofocus required>
            @error('user_name')
            <small class="invalid-feedback" role="alert"> {{$errors->first('user_name')}} </small>
            @enderror
            <small class="text-muted">Email, User name, National ID OR Employee ID</small>
        </div>
        {{-- --------------------------------------------------------- START: buttons - --}}
        <div class="row text-center">
            <div class="col-md-6">
                <button type="submet" class="btn btn-info w-75">
                    <span class="d-none d-md-inline-block"> {{__('next')}} &nbsp;</span>
                    <i class="fas fa-angle-right"></i>
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





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection