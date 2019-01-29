@extends('layouts.app') 
@section('content')



<div class="comtainer">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">
                {{__('app name')}}
            </h1>
            <p>{{__('you are : ')}} {{Auth::user()->name1}}</p>
            <p>{{{ Auth::user()->name or Auth::user()->email }}}</p>
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