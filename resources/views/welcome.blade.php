@extends('layouts.app')
@section('title','Welcom view')
@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="text-center">
            {{__('Welcome to')}} {{__('app name')}}
        </h1>

        <!-- ///////////////////////////////-->
        @if ($errors->any())
        @include('layouts.errors')
        @endif
        <!-- ///////////////////////////////-->

    </div>
    <!-- /End of card body -->
</div>
<!-- /End of card -->

@endsection