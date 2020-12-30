@extends('layouts.app')
@section('title', 'add representative')
@section('content')

<div class="container-fluid card p-4 m-2">
    {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
    <form action="{{route('project.update',$project)}}" class="form-group" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="form_action" value="add_representative_to_project">
        <div class="row form-group">
            @include('person.forms.check_n_id')
            <x-select_searchable name='representative_type_id' title="representative type" :resource=$project
                :list=$representative_types>
                <x-slot name='db_data_field'>id</x-slot>
                <x-slot name='show_field'>name_ar</x-slot>
                <x-slot name='is_required'>true</x-slot>
            </x-select_searchable>
        </div>
        <div class="row form-group">
            <x-input name='representative_authorization_no' title="{{('authorization number')}}">
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_no}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_issue_date' title="{{('authorization issue date')}}">
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_issue_date}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_issue_place' title="{{('authorization issue place')}}">
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_issue_place}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_expire_date' title="{{('authorization expire date')}}">
                <x-slot name='input_value'>{{$project->representative_authorization_expire_date}}</x-slot>
            </x-input>
        </div>
        <x-btn btnText='add' />
    </form>
    <div class="row">
        <x-form-cancel />
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
</div>

@endsection