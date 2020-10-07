@extends('layouts.app')
@section('title', 'employee check')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="container">
            <div class="card">
                <h5 class="card-header">{{ __('Registration') }} of {{__('employee')}} 1/2 </h5>
                <div class="card-body">
                    <form action="{{ route ('employee.check') }}" method="post">
                        @csrf
                        <label for="n_id">{{__( 'nId')}}:</label>
                        <input type="text" onkeypress="onlyNumber(event)" name="national_id" class="form-control mb-3"
                            placeholder="{{__( 'nIdNumber')}}.." maxlength="10" pattern=".{10,}" required
                            title="{{__('must be 10 digits')}}">
                        <input type="submit" value="{{__('next')}}" class="btn btn-info btn-block my-3">
                    </form>


                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end of container -->
    </div>
    <!-- end of row -->
    @endsection