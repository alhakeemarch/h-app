@extends('layouts.app')
@section('title', 'allowed building ratio index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>allowed building ratio index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection