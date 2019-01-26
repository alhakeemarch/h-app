@extends('layouts.app') 
@section('title', 'check view') 
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="container">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">{{__('Customer registration checking form')}}</h4>
                    <p class="card-text">{{__('Enter national ID to check')}}</p>
                    <form action="{{ url('person/check') }}" method="post">
                        @csrf
                        <label for="n_id">{{__( 'nId')}}:</label>
                        <input type="text" onkeypress="onlyNumber(event)" maxlenght="10" name="n_id" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.." maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                        <input type="submit" value="{{__('view')}}" class="btn btn-secondary btn-block">
                    </form>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end of row -->
    </div>
@endsection