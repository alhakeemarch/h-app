@extends('layouts.app')
@section('title', 'Plot show')
@section('content')

<h1> this is show plot view</h1>

@php
$obj = json_decode($plot, TRUE);
@endphp
<ul class="card-body">
    @foreach ($obj as $a=>$b )
    <li>
        {{$a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>


{{-- /////////////////// START: of edit page Buttons /////////////////// --}}

<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/plot') }}" class="btn btn-info btn-lg btn-block">
            <i class="fas fa-undo"></i> back</a>
    </div>
    <div class="col-4">
        @if (auth()->user()->is_admin)
        <a href="{{ url('/plot/'.$plot->id.'/edit') }}" class="btn btn-info btn-lg btn-block ">
            <i class="fas fa-pen"></i> Edit</a>
        @else
        <a href="#" class="btn disabled btn-info btn-lg btn-block ">
            <i class="fas fa-pen"></i> Edit</a>
        @endif
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('plot.destroy', $plot) }}" method="POST">
            @method('DELETE')
            @csrf
            <button disabled class="btn disabled btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
        </form>
    </div>
</div>
{{-- /////////////////// END: of edit page Buttons /////////////////// --}}





@endsection