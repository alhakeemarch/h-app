@extends('layouts.app')
@section('title', 'invoice edit')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>edit an invoice</span>
        <span>تعديل الفواتير</span>
    </h5>
    <div class="card-body">
        <form action="{{route('invoice.update',$invoice)}}" method="post" class=" jumbotron p-3 col-md-2">
            @csrf
            @method('PATCH')
            <h5 class=" form-control m-2 text-center">Refresh invoice Beneficiary Information</h5>
            <h5 class=" form-control m-2 text-center">تحديث بيانات المستفيد من الفاتورة</h5>
            <input type="hidden" name="coming_from" value="inoice_edit">
            <input type="hidden" name="coming_from" value="refresh_beneficiary_info">
            <x-btn btnText='refresh' class="mx-2"></x-btn>
        </form>

    </div>
    <div class="card-footer">
        <x-btn btnText='ok'>

        </x-btn>
        <x-btn btnText='back'>

        </x-btn>
    </div>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
@if (auth()->user()->is_admin)
@php
$obj = json_decode($invoice, TRUE);
@endphp
<ul class="">
    @foreach ($obj as $a=>$b )
    <li>
        {{$a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>
@endif
{{-- --------------------------------------------------------------------------------------------- --}}



@endsection














@section('script')
{{-- // for javascript --}}
@endsection