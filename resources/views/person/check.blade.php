@extends('layouts.app') 
@section('title', 'check view') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @php $formPostTo ='/'; 
        if($fromeCustomer){ $formPostTo="customer/check"; }
        elseif($fromeEmployee){ $formPostTo="employee/check";} 
        @endphp

        <div class="container">
            <div class="card">
                <h5 class="card-header">{{ __('Registration') }} 1/2 </h5>
                <div class="card-body">
                    <form action="{{ url ($formPostTo) }}" method="post">
                        @csrf
                        <input type="hidden" name="fromeCustomer" value="{{$fromeCustomer}}">
                        <input type="hidden" name="fromeEmployee" value="{{$fromeEmployee}}">
                        <label for="n_id">{{__( 'nId')}}:</label>
                        <input type="text" onkeypress="onlyNumber(event)" name="national_id" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.."
                            maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                        <input type="submit" value="{{__('next')}}" class="btn btn-secondary btn-block my-3">
                    </form>


                    <!-- ///////////////////////////////-->
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <!-- ///////////////////////////////-->

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end of container -->
    </div>
    <!-- end of row -->
@endsection