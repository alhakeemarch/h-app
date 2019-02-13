@extends('layouts.app') 
@section('content')



<div class="comtainer">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">
                {{__('app name')}}
            </h1>
            <p class="lead">{{__('you are : ')}} {{Auth::user()->name}}</p>
            <p>{{__('your Email is : ')}} {{Auth::user()->email}}</p>
            <p>{{__('your Password is : ')}} {{Auth::user()->password}}</p>
            <p>{{__('your User Level : ')}} {{Auth::user()->user_level}}</p>
            <p>{{__('your Job Level : ')}}{{Auth::user()->job_level}}</p>
            <p>{{__('your user Remember Token is : ')}}{{Auth::user()->remember_token}}</p>
            <p>{{__('your user Created at : ')}}{{Auth::user()->created_at}}</p>
            <p>{{__('your user Updated at : ')}}{{Auth::user()->updated_at}}</p>
        </div>
    </div>
</div>


{{-- original hoem file frome laravel
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection