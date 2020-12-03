@extends('layouts.app')
@section('title', 'new project - check customer ID')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>new project - check customer ID</span>
        <span>انشاء مشروع جديد - الإستعلام عن العميل</span>
    </h5>
    <div class="card-body">

        <form class="form-group row" action="" method="GET">
            @csrf
            <input type="hidden" name="form_action" value="check_n_id">
            <div class="col-md-9">
                @include('person.forms.check_n_id')
            </div>
            <div class="col-md-3 mt-auto">
                <x-btn btnText='next' />
            </div>
        </form>
        <hr>
        <h2 class="h2">OR..</h2>
        <form class="form-group row" action="" method="GET">
            @csrf
            <input type="hidden" name="form_action" value="check_organization_id">
            <div class="col-md-9">
                @include('organization.forms.check_organization_id')
            </div>
            <div class="col-md-3 mt-auto">
                <x-btn btnText='next' />
            </div>
        </form>
        <hr>
        <div class="card-body alert-danger">
            <h2 class="alert-danger h2 text-center">
                <span>تنبيه</span><br>
                <span>في حال كان المشروع قديم وله رقم بالمكتب يجب البحث عن المشروع وتسجيل العقود والخدمات عليه</span>
            </h2>
        </div>
    </div>
</div>




@endsection