@extends('layouts.app')
@section('title', 'check view')
@section('content')



<div class="card">
    <h5 class="card-header">{{ __('deed') }} </h5>
    <div class="card-body">
        <form action="{{url('/plot/check')}}" method="post">
            @csrf
            @include('plot.forms.deed_no')
            <button type="submit" class="btn btn-info btn-block my-3">{{__('next')}}</button>

        </form>




    </div>
    <!-- end card-body -->

</div>
@endsection