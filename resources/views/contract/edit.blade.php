@extends('layouts.app')
@section('title', 'contract edit')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Edit a projecte') }}</h5>
    <div class="card-body">
        {{-- ============================================================================================= --}}
        @include('contract.forms.edit_contract')
        {{-- ============================================================================================= --}}
    </div>
    <div class="card-footer text-muted text-center ">
        © Editing contract Form..
    </div>
</div>



@endsection