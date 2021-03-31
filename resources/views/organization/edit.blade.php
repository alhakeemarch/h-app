@extends('layouts.app')
@section('title', 'edit organization')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>edit an organization</span>
        <span>تعديل بيانات المنشأة</span>
    </h5>
    <form class="card-body" action="{{route('organization.update',$organization)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <x-input name='id' title="id">
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$organization->id}}</x-slot>
            </x-input>
            <x-select_searchable name='organization_type_id' title="{{__('organization type')}}" :resource=$organization
                :list=$organization_types>
                <x-slot name='db_data_field'>id</x-slot>
                <x-slot name='show_field'>name_ar</x-slot>
                <x-slot name='is_required'>true</x-slot>
            </x-select_searchable>
        </div>
        <div class="row">
            <x-input name='unified_code' title="{{__('unified code')}}">
                <x-slot name='input_value'>{{$organization->unified_code}}</x-slot>
            </x-input>
            <x-input name='license_number' title="{{__('license number')}}">
                <x-slot name='input_value'>{{$organization->license_number}}</x-slot>
            </x-input>
            <x-input name='commercial_registration_no' title="{{__('commercial registration number')}}">
                <x-slot name='input_value'>{{$organization->commercial_registration_no}}</x-slot>
            </x-input>
            <x-input name='special_code' title="{{__('special code')}}">
                <x-slot name='input_value'>{{$organization->special_code}}</x-slot>
            </x-input>
        </div>

        <div class="row">
            <x-input name='name_ar' title="{{__('name (Arabic)')}}">
                <x-slot name='input_value'>{{$organization->name_ar}}</x-slot>
            </x-input>
            <x-input name='name_en' title="{{__('name (English)')}}">
                <x-slot name='input_value'>{{$organization->name_en}}</x-slot>
            </x-input>
        </div>
        <div class="row">
            <x-input name='headquarter' title="{{__('headquarter')}}">
                <x-slot name='input_value'>{{$organization->headquarter}}</x-slot>
            </x-input>
            <x-input name='issue_date' title="{{__('issue date')}}">
                <x-slot name='input_value'>{{$organization->issue_date}}</x-slot>
            </x-input>
            <x-input name='end_date' title="{{__('end date')}}">
                <x-slot name='input_value'>{{$organization->end_date}}</x-slot>
            </x-input>
            <x-input name='issue_place' title="{{__('issue place')}}">
                <x-slot name='input_value'>{{$organization->issue_place}}</x-slot>
            </x-input>
        </div>
        <div class="border-bottom border-primary d-flex justify-content-between">
            <span>Owner info</span>
            <span>بيانات المالك</span>
        </div>
        <div class="row">
            <x-input name='owner_name' title="{{__('owner name')}}">
                <x-slot name='input_value'>{{$organization->owner_name}}</x-slot>
            </x-input>
            <x-input name='owner_national_id' title="{{__('national id')}}">
                <x-slot name='input_value'>{{$organization->owner_national_id}}</x-slot>
            </x-input>
            {{-- <x-input name='nationality_code' title="nationality_code">
                <x-slot name='input_value'>{{$organization->nationality_code}}</x-slot>
            </x-input> --}}
            <x-input name='authorised_person_name' title="authorised_person_name">
                <x-slot name='input_value'>{{$organization->authorised_person_name}}</x-slot>
            </x-input>
        </div>
        <hr>
        <div class="border-bottom border-primary d-flex justify-content-between">
            <span>address info</span>
            <span>العنوان</span>
        </div>
        <div class="row">
            <x-input name='invoice_address_ar' title="invoice_address_ar">
                <x-slot name='input_value'>{{$organization->invoice_address_ar}}</x-slot>
            </x-input>
            <x-input name='invoice_address_en' title="invoice_address_en">
                <x-slot name='input_value'>{{$organization->invoice_address_en}}</x-slot>
            </x-input>
        </div>
        <div class="row">
            <x-input name='is_primary_commercial_registration' title="is_primary_commercial_registration">
                <x-slot name='input_value'>{{$organization->is_primary_commercial_registration}}</x-slot>
            </x-input>
            <x-input name='is_sub_commercial_registration' title="is_sub_commercial_registration">
                <x-slot name='input_value'>{{$organization->is_sub_commercial_registration}}</x-slot>
            </x-input>
            <x-input name='chamber_of_commerce_id' title="chamber_of_commerce_id">
                <x-slot name='input_value'>{{$organization->chamber_of_commerce_id}}</x-slot>
            </x-input>
            <x-input name='VAT_account_no' title="VAT_account_no">
                <x-slot name='input_value'>{{$organization->VAT_account_no}}</x-slot>
            </x-input>
        </div>
        <div class="row">
            <x-input name='POBox_no' title="POBox_no">
                <x-slot name='input_value'>{{$organization->POBox_no}}</x-slot>
            </x-input>
            <x-input name='zip_code' title="zip_code">
                <x-slot name='input_value'>{{$organization->zip_code}}</x-slot>
            </x-input>
            <x-input name='main_phone' title="main_phone">
                <x-slot name='input_value'>{{$organization->main_phone}}</x-slot>
            </x-input>
            <x-input name='fax_no' title="fax_no">
                <x-slot name='input_value'>{{$organization->fax_no}}</x-slot>
            </x-input>
        </div>
        <hr>
        <div class="border-bottom border-primary d-flex justify-content-between">
            <span>notes</span>
            <span>الملاحظات</span>
        </div>
        <div class="row">
            <x-input name='notes' title="notes">
                <x-slot name='type'>textarea</x-slot>
                <x-slot name='input_value'>{{$organization->notes}}</x-slot>
            </x-input>
            <x-input name='private_notes' title="private_notes">
                <x-slot name='type'>textarea</x-slot>
                <x-slot name='input_value'>{{$organization->private_notes}}</x-slot>
            </x-input>
        </div>

        @if (auth()->user()->is_admin)
        @php
        $obj = json_decode($organization, TRUE);
        @endphp
        <ul class="card-body">
            @foreach ($obj as $a=>$b )
            <li>
                {{$a}} : {{$b}}
            </li>
            @endforeach
        </ul>
        <hr>
        @endif
        <hr>
        <div class="row">
            <x-form-cancel />
            <x-btn btnText='update' />
        </div>

    </form>
</div>


@endsection