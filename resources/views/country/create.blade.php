@extends('layouts.app')
@section('title','country create')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-3">
            <h5 class="card-header">{{ __('create') }} of {{__('country')}} 2/2</h5>
            <div class="card-body">
                <form action="{{ url('country') }}" method="POST">
                    @include('country.q_form')
                    <button class="btn btn-info btn-block w-75 my-2 mx-auto" type="submit">{{__('submit')}}</button>
                </form>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end of card -->
    </div>
    <!-- end of col -->
</div>
<!-- end of row -->
@endsection