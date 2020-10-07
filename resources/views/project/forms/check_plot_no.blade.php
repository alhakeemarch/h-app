@extends('layouts.app')
@section('title', 'new project 3/x')
@section('content')

<div class="card">
    <h5 class="card-header">{{ __('registration') }} of {{__('plot')}}</h5>
    <div class="card-body">
        <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
            method="POST">
            @csrf
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="check_deed_form" value="1">
            {{-- --------------------------------------------------------------------------- --}}
            @include('project.forms.customer_info')
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="national_id" value="{{$person->national_id}}">
            {{-- --------------------------------------------------------------------------- --}}
            <hr>
            <div class="card-header text-white bg-dark mb-2 mt-3">
                plot information:
            </div>
            {{-- --------------------------------------------------------------------------- --}}
            @include('plot.forms.deed_no')
            {{-- --------------------------------------------------------------------------- --}}
            <button type="submit" class="btn btn-info btn-block my-3">{{__('next')}}</button>
        </form>
    </div>


    @endsection