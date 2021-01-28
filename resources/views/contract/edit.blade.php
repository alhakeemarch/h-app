@extends('layouts.app')
@section('title', 'contract edit')
@section('content')

<div class="card ">
    <h5 class="card-header d-flex justify-content-between">
        <span>Edit contract value</span>
        <span>تعديل قيم العقد</span>
    </h5>
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