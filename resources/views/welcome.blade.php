@extends('layouts.app')
@section('title','Welcom view')
@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="text-center card-header">
            {{__('Welcome to')}} {{__('app name')}}
        </h1>
    </div>
</div>

@endsection