@extends('layouts.app') 
@section('title', 'Plot show') 
@section('content')


 <!-- ///////////////////////////////-->
 @if ($errors->any())
 @include('layouts.errors')
 @endif
 <!-- ///////////////////////////////-->

@endsection