@extends('layouts.app')
@section('title', 'export index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>export index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection