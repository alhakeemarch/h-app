@extends('layouts.app')
@section('title','Create view')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-3">
            <h5 class="card-header">{{ __('Registration') }} of {{$persontype}} 2/2</h5>
            <div class="card-body">
                <form action="{{ url('person') }}" method="POST">
                    @csrf
                    @include('person.form')
                    <input type="submit" value="{{__('submit')}}"
                        class="btn btn-secondary btn-block text-white bg-dark my-2">
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