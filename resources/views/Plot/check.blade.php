@extends('layouts.app')
@section('title', 'check view')
@section('content')





<div class="card">
    <h5 class="card-header">{{ __('Deed') }} </h5>
    <div class="card-body">
        <form action="{{url('/plot/check')}}" method="post">
            @csrf

            <label for="deed_no">{{__( 'Deed Number')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" onkeypress="onlyNumber(event)" name="deed_no" class="form-control mb-3" required
                placeholder="{{__( 'deed_no')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'deed_no')}}..'">

            <button type="submit" class="btn btn-secondary btn-block my-3">{{__('next')}}</button>

        </form>


        {{-- <form action="{{ url (plot.check) }}" method="post">


        </form> --}}


        <!-- ///////////////////////////////-->
        @if ($errors->any())
        @include('layouts.errors')
        @endif
        <!-- ///////////////////////////////-->

    </div>
    <!-- end card-body -->

</div>
@endsection