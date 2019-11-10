@extends('layouts.app')
@section('title', 'home')
@section('content')

<div class="card">
    <h2 class="h2 text-center card-header">
        {{__('app name')}}
    </h2>
    <div class="card-body">
        @php
        $user = Auth::user()->first();
        $obj = json_decode($user, TRUE);
        @endphp
        <ul class="">
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
</div>
@endsection