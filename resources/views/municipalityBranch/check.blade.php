@extends('layouts.app')
@section('title', 'check view')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- @php $formPostTo ='/'; $persontype = '';
        if($fromeCustomer){ $formPostTo="customer/check"; $persontype = 'Customer'; }
        elseif($fromeEmployee){ $formPostTo="employee/check";  $persontype = 'Employee';} 
        @endphp--}}

        <div class="container">
            <div class="card">
                <h5 class="card-header">{{ __('Deed') }} </h5>
                <div class="card-body">
                    <form action="{{url('/plot/check')}}" method="post">
                        @csrf
                        <input type="text" onkeypress="onlyNumber(event)" name="deed_no" class="form-control mb-3"
                            placeholder="{{__( 'deed_no')}}.." required>
                        <input type="submit" value="{{__('next')}}" class="btn btn-secondary btn-block my-3">
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