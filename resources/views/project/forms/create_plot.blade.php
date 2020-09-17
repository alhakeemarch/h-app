@extends('layouts.app')
@section('title', 'new project 4/x')
@section('content')

<div class="card">
    <h5 class="card-header">{{ __('registration') }} of {{__('plot')}}</h5>
    <div class="card-body">
        <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
            method="POST">
            @csrf
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="create_plot" value="1">
            {{-- --------------------------------------------------------------------------- --}}
            @include('project.forms.customer_info')
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="national_id" value="{{$person->national_id}}">
            {{-- --------------------------------------------------------------------------- --}}
            <hr>
            {{-- --------------------------------------------------------------------------- --}}
            @include('plot.forms.deed_info')
            @include('plot.forms.plan_info')
            @include('plot.forms.regulations')
            @include('plot.forms.coordinates')
            {{-- --------------------------------------------------------------------------- --}}
            <button type="submit" class="btn btn-info btn-block my-3">{{__('next')}}</button>
        </form>
    </div>
</div>

<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection