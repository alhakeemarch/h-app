@extends('layouts.app') 
@section('title', 'Plot index') 
@section('content')


 <!-- ///////////////////////////////-->
 @if ($errors->any())
 @include('layouts.errors')
 @endif
 <!-- ///////////////////////////////-->

@endsection