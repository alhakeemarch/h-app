@extends('layouts.app')
@section('title', 'project show')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>edit project main info</span>
            <span>تعديل بيانات المشروع الأساسية</span>
        </div>
        <form action="{{route('project.update',$project)}}" method="post" class="card-body">
            @csrf
            @method('PATCH')
            <input type="hidden" name="form_action" value="update_project_main_info">
            <div class="row">
                <x-input name='project_name_ar' title="">
                    <x-slot name='title'>{{__('project name')}}</x-slot>
                    @if (!auth()->user()->is_admin)
                    <x-slot name='is_readonly'>true</x-slot>
                    @endif
                    <x-slot name='input_value'>{{old('project_name_ar') ?? $project->project_name_ar}}</x-slot>
                </x-input>
                <x-input name='project_name_en' title="">
                    <x-slot name='title'>project_name_en</x-slot>
                    <x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot>
                    @if (!auth()->user()->is_admin)
                    <x-slot name='is_readonly'>true</x-slot>
                    @endif
                    <x-slot name='input_value'>{{$project->project_name_en}}</x-slot>
                </x-input>
            </div>
            <div class="row">
                <x-input name='project_arch_hight' title="">
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='title'>{{__('required height')}}</x-slot>
                    <x-slot name='input_value'>{{old('project_arch_hight') ?? $project->project_arch_hight}}</x-slot>
                </x-input>
                <x-input name='project_type' title="">
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='title'>{{__('required use')}}</x-slot>
                    <x-slot name='input_value'>{{old('project_type') ?? $project->project_type}}</x-slot>
                </x-input>
                <x-input name='project_str_hight' title="">
                    <x-slot name='title'>{{__('str height')}}</x-slot>
                    <x-slot name='input_value'>{{old('project_str_hight') ?? $project->project_str_hight}}</x-slot>
                </x-input>
                <div class="col-md form-group mt-1">
                    @if (isset($project->project_no))
                    <label>{{__('project number')}}</label>
                    <div class="form-control my-1">{{$project->project_no}}</div>
                    @else
                    <label for="is_only_supervision">{{__( 'supervision only')}}
                        <span class="small text-muted">({{__('optional')}})</span>:</label>
                    <select name="is_only_supervision"
                        class="form-control my-1 @error ('is_only_supervision') is-invalid @enderror">
                        <option value=0 selected> {{__('no')}}</option>
                        <option value=1 @if(old('is_only_supervision') or $project->is_only_supervision
                            )selected @endif
                            > {{__('yes')}}</option>
                    </select>
                    @error('is_only_supervision')
                    <small class=" text-danger"> {{$errors->first('is_only_supervision')}} </small>
                    @enderror
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <x-input name='last_rokhsa_no' title="">
                    <x-slot name='title'>{{__('rokhsa number')}}</x-slot>
                    <x-slot name='input_value'>{{old('last_rokhsa_no') ?? $project->last_rokhsa_no}}</x-slot>
                </x-input>
                <x-input name='last_rokhsa_issue_date' title="">
                    <x-slot name='title'>{{__('rokhsa issue date')}}</x-slot>
                    <x-slot name='tooltip'>(dd-mm-yyyy)</x-slot>
                    <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
                    <x-slot name='input_value'>{{old('last_rokhsa_issue_date') ?? $project->last_rokhsa_issue_date}}
                    </x-slot>
                </x-input>
                <x-input name='qarar_masahe_no' title="">
                    <x-slot name='title'>{{__('qarar_masahe_no ')}}</x-slot>
                    <x-slot name='input_value'>{{old('qarar masahe number') ?? $project->qarar_masahe_no}}</x-slot>
                </x-input>
                <x-input name='qarar_masahe_issue_date' title="">
                    <x-slot name='title'>{{__('qarar masahe issue date ')}}</x-slot>
                    <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
                    <x-slot name='input_value'>{{old('qarar_masahe_issue_date') ?? $project->qarar_masahe_issue_date}}
                    </x-slot>
                </x-input>
                <x-select_searchable name='project_status_id' title="" :resource=$project :list=$project_statuses>
                    <x-slot name='db_data_field'>id</x-slot>
                    <x-slot name='show_field'>name_ar</x-slot>
                    <x-slot name='resource_field'>project_status_id</x-slot>
                    <x-slot name='title'>{{__('project status')}}</x-slot>
                </x-select_searchable>
            </div>
            <hr>
            <div class="row">
                <x-input name='notes' title="">
                    <x-slot name='title'>{{__('notes')}}</x-slot>
                    <x-slot name='type'>textarea</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{old('notes') ?? $project->notes}}</x-slot>
                </x-input>
                <x-input name='notes' title="">
                    <x-slot name='title'>{{__('add notes')}}</x-slot>
                </x-input>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-block btn-info col">
                    <i class="fas fa-check"></i> | {{__('save')}}</button>
                <a href="{{route('project.show', $project)}}" class="btn btn-secondary col">
                    <i class="fas fa-undo"> | </i>{{__('back')}}</a>
            </div>
        </form>
    </div>
    <br>
    <hr>
    <div class="card-body">
        <form action="{{route('project.update',$project)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="form_action" value="update_project_location">
            <x-input name='project_location' title="{{__('project location')}}">
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{old('project_location') ?? $project->project_location}}</x-slot>
            </x-input>
            <button type="submit" class="btn btn-success btn-block">
                <span>{{__('update project location')}} |</span>
                <i class="far fa-check-square"></i>
            </button>
        </form>
    </div>
</div>

@endsection