@extends('layouts.app')
@section('title', 'Check Porject')
@section('content')


<div class="card">
    <h5 class="card-header">{{ __('Deed') }} </h5>
    <div class="card-body">

        <form action="{{url('/project/check')}}" method="post" class="row">
            @csrf
            <div class="col-md-6">
                <label for="national_id">{{__( 'Customer National ID')}} <span
                        class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" onkeypress="onlyNumber(event)" name="national_id"
                    class="form-control @error ('national_id') is-invalid @enderror" maxlength="10" pattern=".{10,}"
                    required title="{{__('must be 10 digits')}}" placeholder="{{__( 'national_id')}}.."
                    onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'national_id')}}..'"
                    value="{{old('national_id')}}">
                @error('national_id')
                <small class="text-danger"> {{$errors->first('national_id')}} </small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="deed_no">{{__( 'Plot Deed Number')}} <span
                        class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" onkeypress="onlyNumber(event)" name="deed_no"
                    class="form-control @error ('deed_no') is-invalid @enderror" required
                    placeholder="{{__( 'deed_no')}}.." onfocus="this.placeholder=''"
                    onblur="this.placeholder='{{__( 'deed_no')}}..'" value="{{old('deed_no')}}">
                @error('deed_no')
                <small class="text-danger"> {{$errors->first('deed_no')}} </small>
                @enderror
            </div>
            <button type=" submit" class="btn btn-primary btn-block">{{__('next')}}</button>
        </form>


        <!-- ///////////////////////////////-->
        @if (\Session::has('no_person'))
        <div class="alert alert-warning mt-3">
            this person not regesterd in the app to regester it
            <a class="btn btn-link" href="{{url('/customer/check')}}">clikc heer..</a>
        </div>
        @endif
        @if (\Session::has('no_plot'))
        <div class="alert alert-warning mt-3">
            this plot not regesterd in the app to regester it
            <a class="btn btn-link" href="{{url('/plot/check')}}">clikc heer..</a>
        </div>
        @endif
        @if (\Session::has('not_customer'))
        <div class="alert alert-info mt-3">
            this person is not customer plese contact your administrator
            {{-- <a class="btn btn-link" href="{{url('/plot/check')}}">clikc heer..</a> --}}
        </div>
        @endif
        <!-- ///////////////////////////////-->



        <!-- ///////////////////////////////-->
        @if ($errors->any())
        @include('layouts.errors')
        @endif
        <!-- ///////////////////////////////-->

    </div>
    <!-- end card-body -->

    @endsection