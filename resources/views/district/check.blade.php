@extends('layouts.app')
@section('title', 'check view')
@section('content')
<div class="container row justify-content-center">
    <div class="card">
        <h5 class="card-header">{{ __('Deed') }} </h5>
        <div class="card-body">
            <form action="{{url('/plot/check')}}" method="post">
                @csrf
                <input type="text" onkeypress="onlyNumber(event)" name="deed_no" class="form-control mb-3"
                    placeholder="{{__( 'deed_no')}}.." required>
                <input type="submit" value="{{__('next')}}" class="btn btn-secondary btn-block my-3">
            </form>
        </div>
    </div>
</div>
@endsection