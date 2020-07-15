@extends('layouts.app')
@section('title', 'project show')
@section('content')

<h1> this is show project view</h1>

@php
$obj = json_decode($project, TRUE);
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
        <a href="{{ url('/project') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        <x-btn type='edit' :resource=$project />
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('project.destroy', $project) }}" method="POST">
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