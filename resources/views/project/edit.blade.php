@extends('layouts.app')
@section('title', 'project edit')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Edit a projecte') }}</h5>
    <div class="card-body">
        <form action="{{ route ('project.update',$project) }}" method="POST">
            @method('PUT')
            @csrf
            {{-- ============================================================================================= --}}
            <div class="card-header text-white bg-dark mb-3">
                {{__('project name and number')}}:
            </div>
            <div class="form-group row">
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_no' title="project number">
                    <x-slot name='is_required'>true</x-slot>
                    @if (! auth()->user()->is_admin)
                    <x-slot name='is_readonly'>true</x-slot>
                    @endif
                    <x-slot name='input_value'>{{$project->project_no}}</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_name_ar' title="arabic project name">
                    <x-slot name='placeholder'>project name in arabic</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='input_value'>{{$project->project_name_ar}}</x-slot>
                    <x-slot name='input_min'>2</x-slot>
                    <x-slot name='input_max'>150</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_name_en' title="english project name">
                    <x-slot name='placeholder'>project name in english</x-slot>
                    <x-slot name='input_value'>{{$project->project_name_en}}</x-slot>
                    <x-slot name='input_min'>2</x-slot>
                    <x-slot name='input_max'>150</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
            </div>
            {{-- ============================================================================================= --}}
            <hr>
            <div class="card-header text-white bg-dark mb-3">
                {{__('Owner Information')}}:
            </div>
            <div class="form-group row">
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='owner_national_id' title="owner national id Number">
                    <x-slot name='placeholder'>project name in arabic</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='input_value'>{{$project->owner_national_id}}</x-slot>
                    <x-slot name='input_min'>2</x-slot>
                    <x-slot name='input_max'>150</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <div class="col-md form-group">
                    <label for="owner_type">{{__('owner type')}} <span
                            class="small text-danger">({{__('required')}})</span>
                        :</label>
                    <select class="form-control" name="owner_type">
                        {{-- //this is if this is edit and have value selected before --}}
                        @if ($project->owner_type)
                        @foreach ($owner_types as $owner_type)
                        @if ($project->owner_type == $owner_type->id)
                        <option selected="true" value="{{$project->owner_type}}">
                            {{$owner_type->type_ar}}
                        </option>
                        @endif
                        @endforeach
                        {{-- this is if form was not valid and returns with old value --}}
                        @elseif(old('owner_type'))
                        @foreach ($owner_types as $owner_type)
                        @if (old('owner_type') == $owner_type->id)
                        <option selected="true" value="{{old('owner_type')}}">{{$owner_type->owner_type}}
                        </option>
                        @endif
                        @endforeach
                        {{-- this is if new form only --}}
                        @else
                        <option selected="true" disabled="disabled">choose..</option>
                        @endif
                        {{-- // this is  to get the list --}}
                        @foreach ($owner_types as $owner_type)
                        <option value="{{$owner_type->id}}">{{$owner_type->type_ar}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='owner_name_ar' title="owner name in arabic">
                    <x-slot name='placeholder'>owner name in arabic</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='input_value'>{{$project->owner_name_ar}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='owner_name_en' title="owner name in english">
                    <x-slot name='placeholder'>owner name in english</x-slot>
                    <x-slot name='input_value'>{{$project->owner_name_en}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='owner_main_mobile_no' title="owner_main_mobile_no">
                    <x-slot name='placeholder'>owner_main_mobile_no</x-slot>
                    <x-slot name='input_value'>{{$project->owner_main_mobile_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='extra_owners_list' title="extra_owners_list">
                    <x-slot name='placeholder'>extra_owners_list</x-slot>
                    <x-slot name='input_value'>{{$project->extra_owners_list}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='extra_owners_info' title="extra_owners_info">
                    <x-slot name='placeholder'>extra_owners_info</x-slot>
                    <x-slot name='input_value'>{{$project->extra_owners_info}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
            </div>
            {{-- ============================================================================================= --}}
            <hr>
            <div class="card-header text-white bg-dark mb-3">
                {{__('representative Information')}}:
            </div>
            <div class="form-group row">
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_id' title="representative_id">
                    <x-slot name='placeholder'>representative_id</x-slot>
                    <x-slot name='input_value'>{{$project->representative_id}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_national_id' title="representative_national_id">
                    <x-slot name='placeholder'>representative_national_id</x-slot>
                    <x-slot name='input_value'>{{$project->representative_national_id}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_type' title="representative_type">
                    <x-slot name='placeholder'>representative_type</x-slot>
                    <x-slot name='input_value'>{{$project->representative_type}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_name_ar' title="representative_name_ar">
                    <x-slot name='placeholder'>representative_name_ar</x-slot>
                    <x-slot name='input_value'>{{$project->representative_name_ar}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_name_en' title="representative_name_en">
                    <x-slot name='placeholder'>representative_name_en</x-slot>
                    <x-slot name='input_value'>{{$project->representative_name_en}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_main_mobile_no' title="representative_main_mobile_no">
                    <x-slot name='placeholder'>representative_main_mobile_no</x-slot>
                    <x-slot name='input_value'>{{$project->representative_main_mobile_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_authorization_type' title="representative_authorization_type">
                    <x-slot name='placeholder'>representative_authorization_type</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_type}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_authorization_no' title="representative_authorization_no">
                    <x-slot name='placeholder'>representative_authorization_no</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_authorization_issue_date' title="representative_authorization_issue_date">
                    <x-slot name='placeholder'>representative_authorization_issue_date</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_issue_date}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_authorization_issue_place'
                    title="representative_authorization_issue_place">
                    <x-slot name='placeholder'>representative_authorization_issue_place</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_issue_place}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='representative_authorization_expire_date'
                    title="representative_authorization_expire_date">
                    <x-slot name='placeholder'>representative_authorization_expire_date</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_expire_date}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='extra_representatives_list' title="extra_representatives_list">
                    <x-slot name='placeholder'>extra_representatives_list</x-slot>
                    <x-slot name='input_value'>{{$project->extra_representatives_list}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
            </div>
            {{-- ============================================================================================= --}}
            <hr>
            <div class="card-header text-white bg-dark mb-3">
                {{__('project main Information')}}:
            </div>
            <div class="form-group row">
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_status' title="project_status">
                    <x-slot name='placeholder'>project_status</x-slot>
                    <x-slot name='input_value'>{{$project->project_status}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_type' title="project_type">
                    <x-slot name='placeholder'>project_type</x-slot>
                    <x-slot name='input_value'>{{$project->project_type}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_assign_to_user' title="project_assign_to_user">
                    <x-slot name='placeholder'>project_assign_to_user</x-slot>
                    <x-slot name='input_value'>{{$project->project_assign_to_user}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_arch_hight' title="project_arch_hight">
                    <x-slot name='placeholder'>project_arch_hight</x-slot>
                    <x-slot name='input_value'>{{$project->project_arch_hight}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_str_hight' title="project_str_hight">
                    <x-slot name='placeholder'>project_str_hight</x-slot>
                    <x-slot name='input_value'>{{$project->project_str_hight}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
            </div>
            {{-- ============================================================================================= --}}
            <hr>
            <div class="card-header text-white bg-dark mb-3">
                {{__('project documents Information')}}:
            </div>
            <div class="form-group row">
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='byanat_almawqi_no' title="byanat_almawqi_no">
                    <x-slot name='placeholder'>byanat_almawqi_no</x-slot>
                    <x-slot name='input_value'>{{$project->byanat_almawqi_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='byanat_almawqi_issue_date' title="byanat_almawqi_issue_date">
                    <x-slot name='placeholder'>byanat_almawqi_issue_date</x-slot>
                    <x-slot name='input_value'>{{$project->byanat_almawqi_issue_date}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='qarar_masahe_no' title="qarar_masahe_no">
                    <x-slot name='placeholder'>qarar_masahe_no</x-slot>
                    <x-slot name='input_value'>{{$project->qarar_masahe_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='qarar_masahe_issue_date' title="qarar_masahe_issue_date">
                    <x-slot name='placeholder'>qarar_masahe_issue_date</x-slot>
                    <x-slot name='input_value'>{{$project->qarar_masahe_issue_date}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='tanzeem_plan_no' title="tanzeem_plan_no">
                    <x-slot name='placeholder'>tanzeem_plan_no</x-slot>
                    <x-slot name='input_value'>{{$project->tanzeem_plan_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='tanzeem_plan_issue_date' title="tanzeem_plan_issue_date">
                    <x-slot name='placeholder'>tanzeem_plan_issue_date</x-slot>
                    <x-slot name='input_value'>{{$project->tanzeem_plan_issue_date}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='old_rokhsa_no' title="old_rokhsa_no">
                    <x-slot name='placeholder'>old_rokhsa_no</x-slot>
                    <x-slot name='input_value'>{{$project->old_rokhsa_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='old_rokhsa_issue_date' title="old_rokhsa_issue_date">
                    <x-slot name='placeholder'>old_rokhsa_issue_date</x-slot>
                    <x-slot name='input_value'>{{$project->old_rokhsa_issue_date}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='last_rokhsa_no' title="last_rokhsa_no">
                    <x-slot name='placeholder'>last_rokhsa_no</x-slot>
                    <x-slot name='input_value'>{{$project->last_rokhsa_no}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='last_rokhsa_issue_date' title="last_rokhsa_issue_date">
                    <x-slot name='placeholder'>last_rokhsa_issue_date</x-slot>
                    <x-slot name='input_value'>{{$project->last_rokhsa_issue_date}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='other_doc_details' title="other_doc_details">
                    <x-slot name='placeholder'>other_doc_details</x-slot>
                    <x-slot name='input_value'>{{$project->other_doc_details}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
            </div>
            {{-- ============================================================================================= --}}
            <hr>
            <div class="card-header text-white bg-dark mb-3">
                {{__('project documents Information')}}:
            </div>
            <div class="form-group row">
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_manager' title="project_manager">
                    <x-slot name='placeholder'>project_manager</x-slot>
                    <x-slot name='input_value'>{{$project->project_manager}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='project_coordinator' title="project_coordinator">
                    <x-slot name='placeholder'>project_coordinator</x-slot>
                    <x-slot name='input_value'>{{$project->project_coordinator}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='arch_designed_by' title="arch_designed_by">
                    <x-slot name='placeholder'>arch_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->arch_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='elevation_designed_by' title="elevation_designed_by">
                    <x-slot name='placeholder'>elevation_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->elevation_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='str_designed_by' title="str_designed_by">
                    <x-slot name='placeholder'>str_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->str_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='san_designed_by' title="san_designed_by">
                    <x-slot name='placeholder'>san_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->san_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='elec_designed_by' title="elec_designed_by">
                    <x-slot name='placeholder'>elec_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->elec_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='fire_fighting_designed_by' title="fire_fighting_designed_by">
                    <x-slot name='placeholder'>fire_fighting_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->fire_fighting_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='fire_alarm_designed_by' title="fire_alarm_designed_by">
                    <x-slot name='placeholder'>fire_alarm_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->fire_alarm_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='fire_escape_designed_by' title="fire_escape_designed_by">
                    <x-slot name='placeholder'>fire_escape_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->fire_escape_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='tourism_designed_by' title="tourism_designed_by">
                    <x-slot name='placeholder'>tourism_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->tourism_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='interior_designed_by' title="interior_designed_by">
                    <x-slot name='placeholder'>interior_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->interior_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='landscape_designed_by' title="landscape_designed_by">
                    <x-slot name='placeholder'>landscape_designed_by</x-slot>
                    <x-slot name='input_value'>{{$project->landscape_designed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='surveyed_by' title="surveyed_by">
                    <x-slot name='placeholder'>surveyed_by</x-slot>
                    <x-slot name='input_value'>{{$project->surveyed_by}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='main_draftsman' title="main_draftsman">
                    <x-slot name='placeholder'>main_draftsman</x-slot>
                    <x-slot name='input_value'>{{$project->main_draftsman}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_1' title="draftsman_1">
                    <x-slot name='placeholder'>draftsman_1</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_1}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_1_mission' title="draftsman_1_mission">
                    <x-slot name='placeholder'>draftsman_1_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_1_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_2' title="draftsman_2">
                    <x-slot name='placeholder'>draftsman_2</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_2}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_2_mission' title="draftsman_2_mission">
                    <x-slot name='placeholder'>draftsman_2_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_2_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_3' title="draftsman_3">
                    <x-slot name='placeholder'>draftsman_3</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_3}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_3_mission' title="draftsman_3_mission">
                    <x-slot name='placeholder'>draftsman_3_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_3_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_4' title="draftsman_4">
                    <x-slot name='placeholder'>draftsman_4</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_4}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_4_mission' title="draftsman_4_mission">
                    <x-slot name='placeholder'>draftsman_4_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_4_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_5' title="draftsman_5">
                    <x-slot name='placeholder'>draftsman_5</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_5}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_5_mission' title="draftsman_5_mission">
                    <x-slot name='placeholder'>draftsman_5_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_5_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_6' title="draftsman_6">
                    <x-slot name='placeholder'>draftsman_6</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_6}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_6_mission' title="draftsman_6_mission">
                    <x-slot name='placeholder'>draftsman_6_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_6_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_7' title="draftsman_7">
                    <x-slot name='placeholder'>draftsman_7</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_7}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_7_mission' title="draftsman_7_mission">
                    <x-slot name='placeholder'>draftsman_7_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_7_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_8' title="draftsman_8">
                    <x-slot name='placeholder'>draftsman_8</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_8}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_8_mission' title="draftsman_8_mission">
                    <x-slot name='placeholder'>draftsman_8_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_8_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_9' title="draftsman_9">
                    <x-slot name='placeholder'>draftsman_9</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_9}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='draftsman_9_mission' title="draftsman_9_mission">
                    <x-slot name='placeholder'>draftsman_9_mission</x-slot>
                    <x-slot name='input_value'>{{$project->draftsman_9_mission}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='extra_draftsman_details' title="extra_draftsman_details">
                    <x-slot name='placeholder'>extra_draftsman_details</x-slot>
                    <x-slot name='input_value'>{{$project->extra_draftsman_details}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}

            </div>
            {{-- ============================================================================================= --}}
            <hr>
            <div class="card-header text-white bg-dark mb-3">
                {{__('project financial Information')}}:
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="form-group row">
                <x-input name='contracts_list_names' title="contracts_list_names">
                    <x-slot name='placeholder'>contracts_list_names</x-slot>
                    <x-slot name='input_value'>{{$project->contracts_list_names}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='total_project_price' title="total_project_price">
                    <x-slot name='placeholder'>total_project_price</x-slot>
                    <x-slot name='input_value'>{{$project->total_project_price}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
                <x-input name='total_project_cost' title="total_project_cost">
                    <x-slot name='placeholder'>total_project_cost</x-slot>
                    <x-slot name='input_value'>{{$project->total_project_cost}}</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-input>
                {{-- --------------------------------------------------------------------------------------------- --}}
            </div>
            @include('project.forms.geographic_info')
            <hr>
            @include('project.forms.notes')

    </div>
    <div class="card-footer text-muted text-center ">
        © Editing project Form..
    </div>
</div>









</div>










<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection