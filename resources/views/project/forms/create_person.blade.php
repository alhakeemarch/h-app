@extends('layouts.app')
@section('title', 'new project 2/x')
@section('content')

<div class="card">
    <div class="container my-5">
        <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
            method="POST">
            @csrf
            <input type="hidden" name="create_person" value="1">
            <div class="my-2">
                @include('person.forms.nationaltiy')
            </div>
            <div class="my-2">
                @include('person.forms.ar_name')
            </div>
            <div class="my-2">
                @include('person.forms.contact')
            </div>
            <button class=" btn btn-info btn-block" type="submit">
                next
            </button>
    </div>
    </form>
</div>



</div>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection