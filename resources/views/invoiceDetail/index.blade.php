@extends('layouts.app')
@section('title', 'invoice detail index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>invoice detail index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection