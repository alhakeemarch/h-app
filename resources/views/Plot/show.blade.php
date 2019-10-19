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
        {{ $a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>
<div class="row d-flex justify-content-center">
    <div class="col-6">

        <a href="{{ url('/plot/'.$plot->id.'/edit') }}" class="btn btn-info btn-lg btn-block">Edit</a>
    </div>
    <div class="col-6">

        <form class="delete" action="{{ route('plot.destroy', $plot) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')"> <i
                    class="fa fa-trash"></i> Delete</button>

        </form>

    </div>

</div>












<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection