@extends('layouts.app')
@section('title', 'project service edit')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Edit a Project Service') }}</h5>
    <div class="card-body">
        {{-- ============================================================================================= --}}
        <form action="{{route('projectService.update',$projectService)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row form-group">
                <x-input name='name_ar' title="name arabic">
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='input_value'>{{$projectService->name_ar}}</x-slot>
                </x-input>
                <x-input name='name_en' title="name english">
                    <x-slot name='input_value'>{{$projectService->name_en}}</x-slot>
                </x-input>
            </div>
            <div class="row form-group">
                <x-input name='description' title="description">
                    <x-slot name='input_value'>{{$projectService->description}}</x-slot>
                </x-input>
            </div>
            <div class="row form-group">
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
            <div class="row form-group">
                <x-btn btnText='save' />
                <x-form-cancel />
            </div>
        </form>
        {{-- ============================================================================================= --}}
    </div>
    <div class="card-footer text-muted text-center ">
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