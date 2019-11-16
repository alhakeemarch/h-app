@extends('layouts.app')
@section('title', 'project documetn index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>project documetn index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection