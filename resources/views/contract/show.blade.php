@extends('layouts.app')
@section('title', 'contract index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

@if (auth()->user()->is_admin)
<h1> this is show contract view</h1>

@php
$obj = json_decode($contract, TRUE);
@endphp
<ul class="card-body p-0 py-1">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/contract') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        <x-btn type='edit' :resource=$contract />
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('contract.destroy', $contract) }}" method="POST">
            @method('DELETE')
            @csrf
            @if (auth()->user()->is_admin)
            <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i>Delete</button>
            @else
            <button disabled class="btn disabled btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
            @endif
        </form>
    </div>

</div>
@endif

@endsection

@section('script')
{{-- // for javascript --}}
@endsection