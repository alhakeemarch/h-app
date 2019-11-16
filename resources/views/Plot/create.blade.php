@extends('layouts.app')
@section('title', 'Plot Create Form')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Adding New Plote') }}</h5>
    <div class="card-body">
        <form action="{{ route ('plot.store') }}" method="POST">
            @include('plot.form')

            <div class="row text-center">
                <div class="col-6">
                    <button type="submet" class="btn btn-info w-75">
                        <i class="fas fa-check"></i>
                        <span class="d-none d-md-inline-block">&nbsp; create</span>
                    </button>
                </div>
                <div class="col-6">
                    <a href="{{ URL::previous() }}" class="btn btn-info w-75">
                        <i class="fas fa-undo-alt"></i>
                        <span class="d-none d-md-inline-block">&nbsp; cancel</span>
                    </a>
                </div>
            </div>

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