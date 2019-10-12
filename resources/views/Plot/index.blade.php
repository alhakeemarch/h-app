@extends('layouts.app')
@section('title', 'Plot index')
@section('content')

@foreach ($plots as $plot)
@php
$obj = json_decode($plot, TRUE);
@endphp
<ul class="card-body">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>
@endforeach



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection