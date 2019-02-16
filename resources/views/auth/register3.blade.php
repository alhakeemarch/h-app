@extends('layouts.app') 
@section('title','Create user view') 
@section('content')

@php
    echo 'this file ben canseld';
    return;
@endphp
    <div class="row justify-content-center">

        <div class="container">
            <div class="card mb-3">

                <div class="card-body">
                    <h4 class="card-title">{{__('Create New User')}}</h4>
                    <p class="card-text">{{__("this is to add new User")}}</p>
                    <!-- Main Information -->
                    <div class="card-header text-white bg-dark mb-3 rounded">
                    Login Information
                    </div>
                    <form action="{{ url('/user/personStore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="is_employee" value="1"> 
                        <div class="form-group">
                            <label for="fname" class="d-block">{{__('the name')}} باللغة العربية <span class="small text-danger">({{__('required')}})</span> :</label>
                            <div class="form-row mb-3">
                                <div class="col-md">
                                    <input type="text" name="ar_name1" id="" class="form-control" placeholder="{{ __('name1') }}.." required onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="ar_name2" id="" class="form-control" placeholder="{{__( 'name2')}}.." onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="ar_name3" id="" class="form-control" placeholder="{{__( 'name3')}}.." onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="ar_name4" id="" class="form-control" placeholder="{{__( 'name4')}}.." onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="ar_name5" id="" class="form-control" placeholder="{{__( 'name5')}}.." required onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                            </div>
                            <!-- end form-row -->
                                <div class="form-row mb-3">
                                    <div class="col-md">
                                        <label for="national_id">{{__( 'nId')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                        <input type="text" onkeypress="onlyNumber(event)" maxlenght="10" name="national_id" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.."
                                            value="{{$national_id}}" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                                    </div>
                                    <div class="col-md">
                                        <label for="mobile">{{__( 'phoneNo')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                        <input type="text" name="mobile" id="" class="form-control mb-3" placeholder="{{__( 'phoneNo')}}.." aria-describedby="helpId"
                                            onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                                    </div>
                                    <div class="col-md">
                                        <label for="email">{{__( 'Email')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                        <input type="email" name="email"class="form-control mb-3" placeholder="{{__( 'Email')}}.." required>
                                    </div>
                                </div>
                                <!-- end of Main Information -->

                            </div>
                            <!-- end form-group -->
                            <input type="submit" value="{{__('submit')}}" class="btn btn-secondary btn-block text-white bg-dark">
                    </form>
                    </div>
 <!-- ///////////////////////////////-->
 @if ($errors->any())
 @include('layouts.errors')
 @endif
 <!-- ///////////////////////////////-->
                    <!-- end card-body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end of row -->
@endsection