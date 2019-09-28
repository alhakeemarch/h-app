@extends('layouts.app')
@section('title', 'Plot Create Form')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Adding New Plote') }}</h5>
    <div class="card-body">
        <form action="{{ route ('plot.store') }}" method="POST">
            @include('plot.form')
        </form>
    </div>
    <div class="card-footer text-muted text-center ">
        © Adding New Plot Form..
    </div>
</div>


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection