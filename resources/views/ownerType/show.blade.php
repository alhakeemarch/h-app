@extends('layouts.app')
@section('title', 'owner type height show')
@section('content')

<h1> this is show owner type height view</h1>

@php
$obj = json_decode($ownerType, TRUE);
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
        <a href="{{ url('/ownerType') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        <a href="{{ url('/ownerType/'.$ownerType->id.'/edit') }}" class="btn disabled btn-info btn-lg
        btn-block "> <i class="fas fa-pen"></i> Edit</a>
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('ownerType.destroy', $ownerType) }}" method="POST">
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