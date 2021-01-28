@extends('layouts.app')
@section('title', 'project service edit')
@section('content')
{{-- {{dd($projectService)}} --}}
<div class="card ">
    <h5 class="card-header">{{ __('Edit a Project Service') }}</h5>
    <div class="card-body">
        {{-- ============================================================================================= --}}
        <form action="{{route('projectService.update',$projectService)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="form_action" value="change_project_service_values">
            <input type="hidden" name="coming_from" value="edit_project_service">
            <div class="row">
                <x-input name='project_id' title="project name">
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='input_value'>{{$projectService->project()->first()->project_name_ar ?? ''}}</x-slot>
                </x-input>
                <x-input name='invoice_id' title="invoice number">
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='input_value'>{{$projectService->invoice()->first()->invoice_no ?? ''}}</x-slot>
                </x-input>

            </div>
            <div class="row">
                <x-input name='name_ar' title="name arabic">
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='input_value'>{{$projectService->name_ar}}</x-slot>
                </x-input>
                <x-input name='name_en' title="name english">
                    <x-slot name='input_value'>{{$projectService->name_en}}</x-slot>
                </x-input>
            </div>
            <div class="row">
                <x-input name='description' title="description">
                    <x-slot name='input_value'>{{$projectService->description}}</x-slot>
                </x-input>
            </div>
            <div class="row">
                <x-input name='price' title="price">
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='input_value'>{{$projectService->price}}</x-slot>
                </x-input>
                <x-input name='vat_percentage' title="vat_percentage">
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$projectService->vat_percentage}}</x-slot>
                </x-input>
            </div>
            <div class="row p-2">
                <x-btn btnText='save' class="col-md mx-2" />
                <div class="col-md mx-2">
                    <x-form-cancel />
                </div>
            </div>
        </form>
        {{-- ============================================================================================= --}}
    </div>
    <div class="card-footer text-muted text-center p-3 ">
        © Editing Project Service Form..
    </div>
</div>



{{-- <h1> this is edit projectService view</h1>

@php
$obj = json_decode($projectService, TRUE);
@endphp
<ul class="card-body">
    @foreach ($obj as $a=>$b )
    <li>
        {{$a}}=>{{$b}}
</li>
@endforeach
</ul>
<hr> --}}

@endsection