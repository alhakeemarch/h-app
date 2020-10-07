@extends('layouts.app')
@section('title', 'Plot Create Form')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Adding New Plote') }}</h5>
    <div class="card-body">
        <form action="{{ route ('plot.store') }}" method="POST">
            @include('plot.form')

            <div class="row">
                <div class="col-6">
                    <button type="submet" name="submet" id="submet" class="btn btn-info btn-block">Create</button>
                </div>
                <div class="col-6">
                    <a href="{{ URL::previous() }}" class="btn btn-info btn-block">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    <div class="card-footer text-muted text-center ">
        © Adding New Plot Form..
    </div>
</div>



@endsection