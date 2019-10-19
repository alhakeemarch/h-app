@extends('layouts.app')
@section('title', 'Plot index')
@section('content')

<div class="container">
    @foreach ($plots as $plot)
    @php
    $obj = json_decode($plot, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach

        <a class="btn btn-info btn-lg btn-block " href="{{ url('/plot/'.$plot->id) }}">
            <i class="far fa-eye"></i>
            Show
        </a>

    </ul>
    <hr>
    @endforeach
</div>




<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection