@extends('layouts.app')
@section('title', 'Create Porject')
@section('content')


<div class="card">
    {{$person->id}}
    {{$plot->id}}

    <!-- ///////////////////////////////-->
    @if ($errors->any())
    @include('layouts.errors')
    @endif
    <!-- ///////////////////////////////-->

</div>
<!-- end card-body -->

@endsection