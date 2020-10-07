@extends('layouts.app')
@section('title', 'employee edit')
@section('content')

@php
$person = $employee;
@endphp
<div class="card ">
    <h5 class="card-header">{{ __('Edit a employeee') }}</h5>
    <div class="card-body">
        <form action="{{ route ('employee.update',$employee) }}" method="POST">
            @method('PUT')
            @csrf
            @include('person.forms.form')
            <div class="row">

                <div class="col-6">
                    <button type="submet" name="submet" id="submet" class="btn btn-info btn-block">Update</button>
                </div>
                <div class="col-6">
                    <a href="{{ url('/employee/'.$employee->id) }}" class="btn btn-info btn-block">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    <div class="card-footer text-muted text-center ">
        © Editing employee Form..
    </div>
</div>



@endsection