@extends('layouts.app')
@section('title', 'contract field index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>contract field index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection