@extends('layouts.app')
@section('title','Welcom view')

@section('content')

<div class="comtainer">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">
                {{__('Welcom to')}} {{__('app name')}}
            </h1>
        </div>
    </div>
</div>


 {{-- <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
            {{__('app name')}}
        </div>
        @if (!Auth::guest())
            @if((auth()->user()->user_level)>=10)
            <a class="btn btn-info">i am admin</a>
            @endif
        @endif
    </div>
</div> --}}

@endsection