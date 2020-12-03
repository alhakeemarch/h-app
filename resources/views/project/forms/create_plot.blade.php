@extends('layouts.app')
@section('title', 'new project 4/x')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>new plot registration</span>
        <span>تسجيل قطعة أرض جديدة</span>
    </h5>
    <div class="card-body">
        <form class="form-group" action="" method="GET">
            @csrf
            <input type="hidden" name="form_action" value="create_new_plot">
            <input type="hidden" name="coming_from" value="create_new_project">
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="create_plot" value="1">
            {{-- --------------------------------------------------------------------------- --}}
            @include('project.forms.customer_info')
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="national_id" value="{{$person->national_id}}">
            {{-- --------------------------------------------------------------------------- --}}
            <hr>
            {{-- --------------------------------------------------------------------------- --}}
            @include('plot.forms.deed_info')
            @include('plot.forms.plan_info')
            {{-- @include('plot.forms.regulations') --}}
            @include('plot.forms.coordinates')
            {{-- --------------------------------------------------------------------------- --}}
            <hr>
            <x-btn btnText='next' />
        </form>
    </div>
</div>



@endsection