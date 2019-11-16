@extends('layouts.app')
@section('title', 'peron documents index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>peron documents index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection