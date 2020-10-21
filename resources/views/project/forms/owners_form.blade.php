@extends('layouts.app')
@section('title', 'project edit')
@section('content')

<div class="container-fluid">
    <div class="row">
        {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
        <div class="card col-lg-6 my-3">
            @include('project.forms.owner_info')
        </div>
        {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
        <div class="card col-lg-6 my-3">
            <h3 class="card-header d-flex justify-content-between">
                <span>extra owners Info</span>
                <span>بيانات الملاك الآخرين</span>
            </h3>
            <div class="card-body">
                <x-input name='extra_owners_list' title="">
                    <x-slot name='title'>extra_owners_list</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->extra_owners_list}}</x-slot>
                </x-input>
                <x-input name='extra_owners_info' title="">
                    <x-slot name='title'>extra_owners_info</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->extra_owners_info}}</x-slot>
                </x-input>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
        <div class="card col-lg-6 my-3">
            <h3 class="card-header d-flex justify-content-between">
                <span>previous owner info</span>
                <span>بيانات المالك السابق</span>
            </h3>
            <div class="card-body">
                <x-input name='previous_person_id' title="">
                    <x-slot name='title'>previous_person_id</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->previous_person_id}}</x-slot>
                </x-input>
                <x-input name='previous_owner_id' title="">
                    <x-slot name='title'>previous_owner_id</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->previous_owner_id}}</x-slot>
                </x-input>
                <x-select_searchable name='previous_owner_type' title="{{__('type')}}" :resource=$project
                    :list=$owner_types>
                    <x-slot name='db_data_field'>id</x-slot>
                    <x-slot name='show_field'>type_ar</x-slot>
                    <x-slot name='resource_field'>previous_owner_type</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-select_searchable>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
        <div class="card col-lg-6 my-3">
            @include('project.forms.representative_info')
        </div>
        {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
    </div>
    <div class="row">
        <form action="{{route('project.show', $project)}}" class="form-group col">
            <button type="submit" class="btn btn-secondary btn-block">
                <i class="fas fa-undo"> | </i>{{__('back')}}</button>
        </form>
    </div>
</div>

@endsection