@extends('layouts.app')
@section('title', 'account index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection