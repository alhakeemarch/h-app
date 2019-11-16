@extends('layouts.app')
@section('title', 'plot document index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>plot document index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection