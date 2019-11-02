@extends('layouts.app')
@section('content')




<div class="card">

    <h1 class="text-center card-header">
        {{__('app name')}}
    </h1>
    @php
    $user = Auth::user()->first();
    $obj = json_decode($user, TRUE);
    @endphp
    <ul class="card-body m-5">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach
        <hr>
        <li>
            {{__('your Password is : ')}} {{Auth::user()->password}}
        </li>
        <li>
            {{__('your user Remember Token is : ')}}{{Auth::user()->remember_token}}
        </li>
    </ul>
</div>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

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