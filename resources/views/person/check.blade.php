@extends('layouts.app')
@section('title', 'check view')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @php $formPostTo ='/'; $persontype = '';
        // if($fromeCustomer){ $formPostTo="customer/check"; $persontype = 'Customer'; }
        // elseif($fromeEmployee){ $formPostTo="employee/check"; $persontype = 'Employee';}
        @endphp

        <div class="container">
            <div class="card">
                <h5 class="card-header">{{ __('Registration') }} of {{$persontype}} 1/2 </h5>
                <div class="card-body">
                    <form action="{{ route ('person.check') }}" method="post">
                        @csrf
                        @include('person.forms.check_n_id')
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