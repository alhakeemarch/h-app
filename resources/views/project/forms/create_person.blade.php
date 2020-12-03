@extends('layouts.app')
@section('title', 'registration new customer')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>registration new customer</span>
        <span>تسجيل عميل جديد</span>
    </h5>
    <div class="card-body">
        <form class="form-group" action="" method="GET">
            @csrf
            <input type="hidden" name="form_action" value="create_new_custorm">
            <input type="hidden" name="coming_from" value="create_new_project">
            @include('person.forms.q_form')
            <x-btn btnText='next' />
        </form>
    </div>
</div>



@endsection