@extends('layouts.app')
@section('title', 'new project 1/x')
@section('content')

<div class="card">
    <div class="container my-5">
        <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
            method="POST">
            @csrf
            <input type="hidden" name="check_n_id_form" value="1">
            <x-input name='national_id' title="">
                <x-slot name='title'>National Id Number</x-slot>
                <x-slot name='tooltip'>Enter customer National Id Number </x-slot>
                <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_min'>10</x-slot>
            </x-input>
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