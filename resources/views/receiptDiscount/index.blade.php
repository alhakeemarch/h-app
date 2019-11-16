@extends('layouts.app')
@section('title', 'receipt discount index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<h1>receipt discount index</h1>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection