@extends('layouts.app') 
@section('title', 'Plot update') 
@section('content')


 <!-- ///////////////////////////////-->
 @if ($errors->any())
 @include('layouts.errors')
 @endif
 <!-- ///////////////////////////////-->

@endsection