@extends('layouts.app')
@section('title', 'letter index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>letter index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection