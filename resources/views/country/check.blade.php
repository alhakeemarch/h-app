@extends('layouts.app')
@section('title', 'country check')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <h5 class="card-header">{{ __('create') }} of {{'country'}} 1/2 </h5>
                <div class="card-body">
                    <form action="{{ route ('country.check') }}" method="post">
                        @csrf
                        <label for="code_2chracters">{{__( 'nId')}}:</label>
                        <input type="text" name="code_2chracters"
                            class="form-control mb-3 @error ('code_2chracters') is-invalid @enderror"
                            placeholder="{{__( 'contyry code (2CAPITAL letters)')}}.." onfocus="this.placeholder = ''"
                            onblur="this.placeholder = '{{__( 'contyry code (2CAPITAL letters)')}}..'" maxlength="2"
                            pattern=".{2,}" required title="{{__('must be 2 CAPITAL letters')}}"
                            onkeypress="onlyEnglishString(event)">
                        @error('code_2chracters')
                        <small class="text-danger"> {{$errors->first('code_2chracters')}} </small>
                        @enderror
                        <input type="submit" value="{{__('next')}}" class="btn btn-info btn-block my-3">
                    </form>


                    <!-- ///////////////////////////////-->
                    @if ($errors->any())
                    @include('layouts.errors')
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