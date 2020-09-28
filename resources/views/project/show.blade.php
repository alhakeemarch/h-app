@extends('layouts.app')
@section('title', 'project show')
@section('content')
<div class="row container-fluid">
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-3">
        <h3 class="card-header">project info</h3>
        <ul class="list-group card-body">
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">project name: </span>
                {{$project->project_name_ar}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">project number: </span> <span>
                    {{$project->project_no}}</span>
                @if (auth()->user()->is_admin)
                <button class=" btn btn-link">giv</button>
                @endif
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('required use')}}: </span>
                {{$project->project_type}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('required hight')}}: </span>
                {{$project->project_arch_hight}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('status')}}: </span>
                {{$project->project_status}}</li>
        </ul>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-3">
        <h3 class="card-header">owoner info</h3>
        <ul class="list-group card-body">
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('nId')}}: </span>
                {{$project->owner_national_id}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('the name')}}: </span>
                {{$project->owner_name_ar}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('mobile')}}: </span>
                {{$project->person()->first()->mobile}}</li>
        </ul>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-3">
        <h3 class="card-header">plot info</h3>
        <ul class="list-group card-body">
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('deed number')}}: </span>
                {{$project->plot()->first()->deed_no}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('deed date')}}: </span>
                {{$project->plot()->first()->deed_date}}
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('plot number')}}: </span>
                {{$project->plot()->first()->plot_no}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('total area')}}: </span>
                {{$project->plot()->first()->area}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('neighbor_id')}}: </span>
                {{$project->plot()->first()->neighbor()->first()->ar_name}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('district_id')}}: </span>
                {{$project->plot()->first()->district()->first()->ar_name}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('plan number')}}: </span>
                {{$project->plot()->first()->plan()->first()->plan_no}}</li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('plan name')}}: </span>
                {{$project->plot()->first()->plan()->first()->plan_ar_name}}</li>
        </ul>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col-md-3">
        <h3 class="card-header">tame info</h3>
        <ul class="list-group card-body">
            <li class="list-group-item d-flex justify-content-between">
                <span class="font-weight-bold">{{__('project manager')}}: </span>
                {{$project->project_manager()->first()->ar_name1 .' '.$project->project_manager()->first()->ar_name5}}
            </li>
        </ul>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
</div>
<hr class="my-2">
<div class="row container-fluid">
    <div class="card col">
        <div class="card-header">
            document list
            قائمة المستندات
        </div>
        <ul class="card-body list-group">
            <li class="list-group-item d-flex justify-content-between">
                تفويض
                <form action="{{route('projectDoc.tafweed')}}" method="get">
                    @csrf
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <button type="submit" class="btn btn-link">print |
                        <i class="fa fa-print" aria-hidden="true"></i>
                        {{-- <i class="fas fa-file-pdf"></i> --}}
                    </button>
                </form>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                تفويض المساحة
                <form action="{{route('projectDoc.tafweed_masaha')}}" method="get">
                    @csrf
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <button type="submit" class="btn btn-link">print |
                        <i class="fa fa-print" aria-hidden="true"></i></button>
                </form>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                تعهد المخاطر
                <form action="{{route('projectDoc.t_makhater')}}" method="get">
                    @csrf
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <button type="submit" class="btn btn-link">print |
                        <i class="fa fa-print" aria-hidden="true"></i></button>
                </form>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                تعهد السور
                <form action="{{route('projectDoc.t_soor')}}" method="get">
                    @csrf
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <button type="submit" class="btn btn-link">print |
                        <i class="fa fa-print" aria-hidden="true"></i></button>
                </form>
            </li>
        </ul>
        add new contract
    </div>
</div>






@if (auth()->user()->is_admin)
<h1> this is show project view</h1>

@php
$obj = json_decode($project, TRUE);
@endphp
<ul class="card-body">
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



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection