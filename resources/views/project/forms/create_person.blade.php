@extends('layouts.app')
@section('title', 'new project 2/x')
@section('content')

<div class="card">
    <h5 class="card-header">{{ __('registration') }} of {{__('customer')}}</h5>
    <div class="card-body">
        <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
            method="POST">
            @csrf
            <input type="hidden" name="create_person" value="1">
            @include('person.forms.q_form')
            <button class=" btn btn-info btn-block" type="submit">
                next
            </button>
        </form>
    </div>
</div>

<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection