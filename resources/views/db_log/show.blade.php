@extends('layouts.app')
@section('title','db_log index')

@section('content')


@if (auth()->user()->is_admin)

<div class="code">

    @php
    $obj = json_decode($db_log, TRUE);
    @endphp
    <ul class="card-body">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach
    </ul>
    <hr>
</div>

@endif

@endsection