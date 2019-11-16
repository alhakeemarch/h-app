@extends('layouts.app')
@section('title', 'Plot index')
@section('content')

<div class="container-fluid text-center">
    <a class="btn btn-info w-75" href="{{ url('/plot/check')}}">
        {{-- <i class="far fa-add"></i>  --}}
        <i class=" fas fa-plus"></i>
        <span class="d-none d-md-inline-block">&nbsp; add new plot</span>
    </a>
    <hr>
    <div class="card">
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

            <a class="btn btn-info w-75 " href="{{ url('/plot/'.$plot->id) }}">
                <i class="far fa-eye"></i>
                <span class="d-none d-md-inline">&nbsp; Show</span>
            </a>

        </ul>
        <hr>
        @endforeach
    </div>

</div>




<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection