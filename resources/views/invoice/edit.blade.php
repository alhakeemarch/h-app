@extends('layouts.app')
@section('title', 'invoice edit')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>edit an invoice</span>
        <span>تعديل الفاتورة</span>
    </h5>
    <div class="card-body">
        {{-- ----------------------------------------------------------------------------------------------- --}}
        <div class="row">
            <form action="{{route('invoice.update',$invoice)}}" method="post" class=" jumbotron p-3 col-md">
                @csrf
                @method('PATCH')
                <h5 class=" form-control mb-2 text-center">Refresh invoice Beneficiary Information</h5>
                <h5 class=" form-control mb-2 text-center">تحديث بيانات المستفيد للفاتورة</h5>
                <input type="hidden" name="coming_from" value="invoice_edit">
                <input type="hidden" name="form_action" value="refresh_beneficiary_info">
                <x-btn btnText='refresh' class="mt-2" />
            </form>
            {{-- ----------------------------------------------------------------------------------------------- --}}
            <form action="{{route('invoice.get_pdf')}}" method="get" class=" jumbotron p-3 col-md">
                @csrf
                <h5 class=" form-control mb-2 text-center">print the invoice</h5>
                <h5 class=" form-control mb-2 text-center">طباعة الفاتورة</h5>
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                <x-btn btnText='print' class="mt-2" />
            </form>
        </div>
        {{-- ----------------------------------------------------------------------------------------------- --}}
        <hr>
        {{-- ----------------------------------------------------------------------------------------------- --}}
        <form action="{{route('invoice.update',$invoice)}}" method="post" class=" jumb otron p-3">
            @csrf
            @method('PATCH')
            <input type="hidden" name="form_action" value="edit_invoice_info">
            <input type="hidden" name="coming_from" value="invoice_edit">
            @php
            $date_and_time = App\Http\Controllers\DateAndTime::get_date_time_arr($invoice->g_date);
            @endphp
            <div class="row">
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <x-input name='' title="{{__('project name')}}">
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='input_value'>{{$project->project_name_ar}}</x-slot>
                </x-input>
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <x-input name='' title="{{__('invoice')}}">
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='input_value'>{{$invoice->invoice_no_prefix}}/{{$invoice->invoice_no }}</x-slot>
                </x-input>
                {{-- ----------------------------------------------------------------------------------------------- --}}
            </div>
            <div class="row">
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <x-input name='g_date' title="{{__('invoice date')}}">
                    <x-slot name='tooltip'>dd-mm-yyyy</x-slot>
                    <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
                    <x-slot name='input_value'>{{$date_and_time['g_date_en'] ??''}}</x-slot>
                </x-input>
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <x-input name='' title="{{__('invoice hijri date')}}">
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='input_value'>{{$date_and_time['h_date_en'] ??''}}</x-slot>
                </x-input>
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <div class="col-md">
                    <label class="my-1">نقدي / أجل
                        <span class="small text-danger">({{__('required')}})</span>:</label>
                    <select name="credit_or_cash" class="form-control @error ('credit_or_cash') is-invalid @enderror"
                        required>
                        <option selected disabled> {{__('pick')}}..</option>
                        <option value='credit' @if ($invoice->is_credit)selected @endif >آجل</option>
                        <option value='cash' @if ($invoice->is_cash )selected @endif >نقدي</option>
                    </select>
                </div>
                {{-- ----------------------------------------------------------------------------------------------- --}}
            </div>
            <div class="row">
                {{-- ----------------------------------------------------------------------------------------------- --}}
                @if ($beneficiaries_list)
                <div class="col-md">
                    <label class="my-1">{{__( 'beneficiary')}}
                        <span class="small text-danger">({{__('required')}})</span>:</label>
                    <select name="invoice_beneficiary"
                        class="form-control @error ('invoice_beneficiary') is-invalid @enderror" required>
                        <option selected disabled> {{__('pick')}}..</option>
                        @foreach ($beneficiaries_list as $beneficiary)
                        <option value='{{$beneficiary['value']}}' @if ($invoice->beneficiary_row_value ==
                            $beneficiary['value'] )selected @endif> {{$beneficiary['name']}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <x-input name='' title="{{__('relation to project')}}">
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='input_value'>{{$invoice->beneficiary_relation_to_project ??''}}</x-slot>
                </x-input>
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <x-input name='' title="{{__('address')}}">
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='input_value'>{{$invoice->beneficiary_address_ar ??''}}</x-slot>
                </x-input>
                {{-- ----------------------------------------------------------------------------------------------- --}}
            </div>
            <div class="row">
                {{-- ----------------------------------------------------------------------------------------------- --}}
                <x-input name='notes' title="{{__('notes')}}">
                    <x-slot name='input_value'>{{$invoice->notes ??''}}</x-slot>
                </x-input>
                {{-- ----------------------------------------------------------------------------------------------- --}}
            </div>
            <x-btn btnText='update' class="mt-2"></x-btn>
        </form>
        <div class="row my-3">@include('invoice.forms.invoice_services')</div>
        <div class="row">
            {{-- ----------------------------------------------------------------------------------------------- --}}
            <x-input name='' title="{{__('total_cost')}}">
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$invoice->total_cost ??''}}</x-slot>
            </x-input>
            {{-- ----------------------------------------------------------------------------------------------- --}}
            <x-input name='' title="{{__('vat_percentage')}}">
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$invoice->vat_percentage ??''}}</x-slot>
            </x-input>
            {{-- ----------------------------------------------------------------------------------------------- --}}
            <x-input name='' title="{{__('total_vat_value')}}">
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$invoice->total_vat_value ??''}}</x-slot>
            </x-input>
            {{-- ----------------------------------------------------------------------------------------------- --}}
            <x-input name='' title="{{__('total_price_withe_vat')}}">
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$invoice->total_price_withe_vat ??''}}</x-slot>
            </x-input>
            {{-- ----------------------------------------------------------------------------------------------- --}}
        </div>
        {{-- ----------------------------------------------------------------------------------------------- --}}
        <div class="row my-2">
            <x-form-cancel />
        </div>
        {{-- ----------------------------------------------------------------------------------------------- --}}
        <div class="card-footer m-2">
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