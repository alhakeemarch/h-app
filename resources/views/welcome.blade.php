@extends('layouts.app') 
@section('title','Welcom view') 
@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="text-center">
            {{__('Welcom to')}} {{__('app name')}}
        </h1>

        <!-- ///////////////////////////////-->
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <!-- ///////////////////////////////-->

    </div>
    <!-- /End of card body -->
</div>
<!-- /End of card -->
@endsection