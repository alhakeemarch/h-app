@extends('layouts.app')
@section('title', 'person edit')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Edit a persone') }}</h5>
    <div class="card-body">
        <form action="{{ route ('person.update',$person) }}" method="POST">

            @method('PUT')
            @include('person.form')
            <div class="row">

                <div class="col-6">
                    <button type="submet" name="submet" id="submet" class="btn btn-info btn-block">Update</button>
                </div>
                <div class="col-6">
                    <a href="{{ url('/person/'.$person->id) }}" class="btn btn-info btn-block">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    <div class="card-footer text-muted text-center ">
        © Editing person Form..
    </div>
</div>




<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection