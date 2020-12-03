@extends('layouts.app')
@section('title', 'checking deed number')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>Checking Deed Number</span>
        <span>التأكد من الصك</span>
    </h5>
    <div class="card-body">
        <form class="form-group" action="" method="GET">
            @csrf
            <input type="hidden" name="form_action" value="check_deed_number">
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="check_deed_form" value="1">
            {{-- --------------------------------------------------------------------------- --}}
            @include('project.forms.customer_info')
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="national_id" value="{{$person->national_id}}">
            {{-- --------------------------------------------------------------------------- --}}
            <hr>
            <div class="card-header text-white bg-dark mb-2 mt-3">
                plot information:
            </div>
            {{-- --------------------------------------------------------------------------- --}}
            @include('plot.forms.deed_no')
            {{-- --------------------------------------------------------------------------- --}}
            <div class="my-3">
                <x-btn btnText='next' />
            </div>
        </form>
    </div>


    @endsection