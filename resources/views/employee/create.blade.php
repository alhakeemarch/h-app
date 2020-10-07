@extends('layouts.app')
@section('title','employee create')
@section('content')

@php $person = $employee; @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-3">
            <h5 class="card-header">{{ __('Registration') }} of {{__('employee')}} 2/2</h5>
            <div class="card-body">
                <form action="{{ url('employee') }}" method="POST">
                    @include('person.forms.form')
                    <button class="btn btn-info btn-block w-75 my-2 mx-auto" type="submit">{{__('submit')}}</button>
                </form>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end of card -->
    </div>
    <!-- end of col -->
</div>
<!-- end of row -->
@endsection