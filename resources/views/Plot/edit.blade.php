@extends('layouts.app') 
@section('title', 'Plot edit') 
@section('content')


 <!-- ///////////////////////////////-->
 @if ($errors->any())
 @include('layouts.errors')
 @endif
 <!-- ///////////////////////////////-->

@endsection