@extends('layouts.app')
@section('title', 'task index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>task index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection