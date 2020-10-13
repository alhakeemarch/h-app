@extends('layouts.app')
@section('title', 'project show')
@section('content')

<div class="row container-fluid">
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-12 col-lg-6 col-xl-3">
        <h3 class="card-header">project info</h3>
        <ul class="list-group card-body p-0 py-1">
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">project name: </span>
                {{$project->project_name_ar ?? '?'}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold align-self-center">project number: </span> <span>
                    @if ($project->project_no)
                    {{$project->project_no}}
                    @elseif(auth()->user()->is_admin)
                    @include('project.forms.giv_project_no')
                    @else
                    @endif
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('required use')}}: </span>
                {{$project->project_type ?? '?'}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('required hight')}}: </span>
                {{$project->project_arch_hight ?? '?'}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('status')}}: </span>
                {{$project->project_status ?? '?'}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold align-self-center">{{__('project str hight')}}: </span>
                @if ($project->project_str_hight)
                {{$project->project_str_hight ?? '?'}}
                @else
                @include('project.forms.str_hight')
                @endif
            </li>
        </ul>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-12 col-lg-6 col-xl-3">
        <h3 class="card-header">owoner info</h3>
        <ul class="list-group card-body p-0 py-1">
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('nId')}}: </span>
                {{$project->owner_national_id ?? '?'}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('the name')}}: </span>
                {{$project->owner_name_ar ?? '?'}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('mobile')}}: </span>
                {{$project->person()->first()->mobile ?? '?'}}</li>
        </ul>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-12 col-lg-6 col-xl-3">
        <h3 class="card-header d-flex justify-content-between">
            <span>plot info</span>
            <span>بيانات الأرض</span>
        </h3>
        @if ($project->plot_id)
        <div class="card-body p-0 py-1">
            @include('plot.show_main_info')
        </div>
        <div class=" card-footer d-flex justify-content-end m-0">
            <a href="#" class="btn btn-link m-0">edit |
                <i class="far fa-edit"></i>
            </a>
        </div>
        @endif
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-12 col-lg-6 col-xl-3">
        <h3 class="card-header d-flex justify-content-between">
            <span>فريق العمل</span> <span>team info</span>
        </h3>
        <ul class="list-group card-body p-0 py-1">
            @foreach ($project_team as $job => $employee)
            @if($employee)
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__(str_replace('_', ' ' , $job))}}:</span>
                <span>{{str_replace('  ', ' ' , $employee)}}</span>
            </li>
            @endif
            @endforeach
        </ul>

        <div class=" card-footer d-flex justify-content-center m-0">
            @include('project.forms.add_emp_to_tame')
        </div>

    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
</div>
<hr class="my-2">
<div class="row container-fluid">
    <div class="card col-md-6">
        <div class="card-header d-flex justify-content-between">
            <span>document list</span>
            <span>قائمة المستندات</span>
        </div>
        <div class="card-body p-0 py-1">
            @include('projectDoc.show')
        </div>
    </div>
    {{-- =================================================================================================================== --}}
    <div class="card col-md-6">
        <div class="card-header d-flex justify-content-between">
            <span>contracts list</span>
            <span>قائمة العقود</span>
        </div>
        <div class="card-body p-0 py-1">
            {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
            @include('project.show_project_contracts')
            {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
            @include('contract.forms.q_form')
            {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
        </div>

    </div>
</div>

{{-- <div class="row container-fluid">
    <div class="card-body p-0 py-1">
        <a href="#" class="btn btn-link">add project teem member</a>
        <a href="#" class="btn btn-link">add strucutral information</a>
        <a href="#" class="btn btn-link">add plot information</a>
        <a href="#" class="btn btn-link">give a number</a>
        <a href="#" class="btn btn-link">give change a status</a>
    </div>
</div> --}}







@if (auth()->user()->is_admin)
<h1> this is show project view</h1>

@php
$obj = json_decode($project, TRUE);
@endphp
<ul class="card-body p-0 py-1">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/project') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        <x-btn type='edit' :resource=$project />
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('project.destroy', $project) }}" method="POST">
            @method('DELETE')
            @csrf
            @if (auth()->user()->is_admin)
            <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i>Delete</button>
            @else
            <button disabled class="btn disabled btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
            @endif
        </form>
    </div>

</div>
@endif

@endsection