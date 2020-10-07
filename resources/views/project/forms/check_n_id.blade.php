@extends('layouts.app')
@section('title', 'new project 1/x')
@section('content')

<div class="card">
    <h5 class="card-header">{{ __('new project')}} 1 of x</h5>
    <div class="card-body">
        <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
            method="POST">
            @csrf
            <input type="hidden" name="check_n_id_form" value="1">
            @include('person.forms.check_n_id')
            <button class=" btn btn-info btn-block" type="submit">
                next
            </button>
        </form>
    </div>
</div>




@endsection