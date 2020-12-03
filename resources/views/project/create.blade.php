@extends('layouts.app')
@section('title', 'creat project')
@section('content')
<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>create project</span>
        <span>تسجيل مشروع جديد</span>
    </h5>
    <div class="card-body">

        @if ($project->id)
        <div class=" alert alert-info">
            <p>this deed is allredy regestered for onother project</p>
            <p>هذا الصك مسجل لمشروع سابق</p>
        </div>
        <form action="{{route('project.show',$project)}}" method="get">
            <x-btn btnText='show' />
        </form>
        @else
        <form class="form-group" action="{{ action('ProjectController@store') }}" accept-charset="UTF-8" method="POST">
            @csrf
            {{-- --------------------------------------------------------------------------- --}}
            @include('project.forms.customer_info')
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="person_id" value="{{$person->id}}">
            <input type="hidden" name="national_id" value="{{$person->national_id}}">
            {{-- --------------------------------------------------------------------------- --}}
            <hr>
            {{-- --------------------------------------------------------------------------- --}}
            @include('plot.forms.deed_info')
            @include('plot.forms.plan_info')
            {{-- @include('plot.forms.regulations') --}}
            {{-- @include('plot.forms.coordinates') --}}
            @include('project.forms.project_info')
            {{-- --------------------------------------------------------------------------- --}}
            <hr>
            <x-btn btnText='save' />
        </form>
        @endif

    </div>
</div>

@endsection