@extends('layouts.app')
@section('title', 'edit office doc info')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>edit an officeDoc</span>
        <span>تعديل بيانات المنشأة</span>
    </h5>
    <form class="card-body" action="{{route('officeDoc.update',$officeDoc)}}" method="POST">
        <input type="hidden" name="form_action" value="">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_action" value="update_office_doc_info">
        @include('officeDoc.forms.all')
        <div class="row mt-2">
            <x-form-cancel />
            <x-btn btnText='update' />
        </div>

    </form>
</div>


@endsection