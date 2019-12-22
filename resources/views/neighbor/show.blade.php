@extends('layouts.app')
@section('title', 'neighbor show')
@section('content')

<h1> this is show neighbor view</h1>

@php
$obj = json_decode($neighbor, TRUE);
@endphp
<ul class="card-body">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/neighbor') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        <a href="{{ url('/neighbor/'.$neighbor->id.'/edit') }}" class="btn disabled btn-info btn-lg
        btn-block "> <i class="fas fa-pen"></i> Edit</a>
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('neighbor.destroy', $neighbor) }}" method="POST">
            @method('DELETE')
            @csrf
            <button disabled class="btn disabled btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
        </form>
    </div>

</div>


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection