@extends('layouts.app')
@section('title', 'upload office doc')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>upload office doc</span>
        <span>رفع نسخة من المستند</span>
    </h5>
    <form class="card-body" action="{{route('officeDoc.update',$officeDoc)}}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_action" value="upload_office_doc">
        <div class="row">
            <x-input name='number' title="document number">
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$officeDoc->number ??''}}</x-slot>
            </x-input>
            <x-input name='name_ar' title="document arabic name">
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$officeDoc->name_ar ??''}}</x-slot>
            </x-input>
        </div>
        <div class="row">
            <x-input name='issue_date' title="document issue date">
                <x-slot name='input_value'>{{$officeDoc->issue_date ??''}}</x-slot>
            </x-input>
            <x-input name='expire_date' title="document expire date">
                <x-slot name='input_value'>{{$officeDoc->expire_date ??''}}</x-slot>
            </x-input>
            <div class="col-md form-group mt-2">
                <label for="fiel_input">{{__( 'Please select file')}}
                    <span class="small text-danger">({{__('required')}})</span> :</label>
                {{-- <input type="file" name="file_input[]" multiple class="form-control" id="file_input" required> --}}
                <input type="file" name="file_input" class="form-control" required>
            </div>
        </div>

        <div class="row mt-2">
            <x-btn btnText='upload' />
        </div>

    </form>
</div>
<div class="row my-4">
    <form action="{{route('officeData.show',$officeDoc->office_data_id)}}" method="get" class="col-md">
        <x-btn btnText='back' />
    </form>
    @if (isset($officeDoc->full_url))
    <div class="col-md">@include('officeDoc.forms.download_doc')</div>
    @endif
</div>


@endsection