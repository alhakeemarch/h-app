@extends('layouts.app')
@section('title','Create view')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-3">
            <h5 class="card-header">{{ __('Registration') }} of {{__('person')}} 2/2</h5>
            <div class="card-body">
                <form action="{{ url('person') }}" method="POST">
                    @csrf
                    {{-- @include('person.q_form') --}}
                    @include('person.form')
                    <button class="btn btn-info btn-block w-75 my-2 mx-auto" type="submit">{{__('submit')}}</button>
                </form>
                <!-- ///////////////////////////////-->
                @if ($errors->any())
                @include('layouts.errors') @endif
                <!-- ///////////////////////////////-->
            </div>
            <!-- end card-body -->
        </div>
        <!-- end of card -->
    </div>
    <!-- end of col -->
</div>
<!-- end of row -->
@endsection