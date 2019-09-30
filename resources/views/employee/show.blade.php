@extends('layouts.app')
@section('title','Show Employee')

@section('content')


<div class="card my-5">
    <h2 class="card-header bg-danger">
        To delet *** this is in Employee show
    </h2>
    @php
    $obj = json_decode($person, TRUE);
    @endphp
    <ul class="card-body">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach
    </ul>
</div>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection