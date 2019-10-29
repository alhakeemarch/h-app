@extends('layouts.app') 
@section('title', 'Plot Stor') 
@section('content')


 <!-- ///////////////////////////////-->
 @if ($errors->any())
 @include('layouts.errors')
 @endif
 <!-- ///////////////////////////////-->

@endsection