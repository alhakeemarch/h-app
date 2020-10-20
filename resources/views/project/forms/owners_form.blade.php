@extends('layouts.app')
@section('title', 'project edit')
@section('content')

<div class="container-fluid">
    {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
    <div class="card col-lg my-3">
        <h3 class="card-header">project name Info</h3>
        <div class="card-body row">
            <x-input name='project_name_ar' title="">
                <x-slot name='title'>project_name_ar</x-slot>
                <x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->project_name_ar}}</x-slot>
            </x-input>
            <x-input name='project_name_en' title="">
                <x-slot name='title'>project_name_en</x-slot>
                <x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->project_name_en}}</x-slot>
            </x-input>
            <x-input name='person_id' title="">
                <x-slot name='title'>person_id</x-slot>
                @if (!auth()->user()->is_admin)
                <x-slot name='is_hidden'>true</x-slot>
                @endif
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->person_id}}</x-slot>
            </x-input>
        </div>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
    <div class="card col-lg my-3">
        <h3 class="card-header">owner Info</h3>
        <div class="card-body row">
            <x-input name='owner_id' title="">
                <x-slot name='title'>owner_id</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                @if (!auth()->user()->is_admin)
                <x-slot name='is_hidden'>true</x-slot>
                @endif
                <x-slot name='input_value'>{{$project->owner_id}}</x-slot>
            </x-input>
            <x-input name='owner_national_id' title="">
                <x-slot name='title'>owner_national_id</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->owner_national_id}}</x-slot>
            </x-input>
            <x-select_searchable name='owner_type_id' title="owner type" :resource=$project :list=$owner_types>
                <x-slot name='db_data_field'>id</x-slot>
                <x-slot name='show_field'>type_ar</x-slot>
                <x-slot name='resource_field'>owner_type_id</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
            </x-select_searchable>
            <x-input name='owner_name_ar' title="">
                <x-slot name='title'>owner_name_ar</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->owner_name_ar}}</x-slot>
            </x-input>
            <x-input name='owner_name_en' title="">
                <x-slot name='title'>owner_name_en</x-slot>
                <x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->owner_name_en}}</x-slot>
            </x-input>
            <x-input name='owner_main_mobile_no' title="">
                <x-slot name='title'>owner_main_mobile_no</x-slot>
                <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->owner_main_mobile_no}}</x-slot>
            </x-input>
        </div>
        <div class="card-footer my-2">
            @include('project.forms.new_owner_info')
        </div>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
    <div class="card col-lg my-3">
        <h3 class="card-header">extra owners Info</h3>
        <div class="card-body row">
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
    <div class="card col-lg my-3">
        <h3 class="card-header">previous owner info</h3>
        <div class="card-body row">
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
            <x-input name='previous_owner_type' title="">
                <x-slot name='title'>previous_owner_type</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->previous_owner_type}}</x-slot>
                to owner_type_id and list
            </x-input>
        </div>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
    @include('project.forms.representative_info')
    {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
</div>


@endsection