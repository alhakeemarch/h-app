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
            @include('project.forms.project_name')
            <hr>
            @include('project.forms.owner_info')
            <hr>
            @include('project.forms.representative')
            <hr>
            @include('project.forms.main_info')
            <hr>
            @include('project.forms.documents')
            <hr>
            @include('project.forms.employees')
            <hr>
            @include('project.forms.financial')
            <hr>
            @include('project.forms.geographic_info')
            <hr>
            @include('project.forms.notes')
            {{-- ============================================================================================= --}}
    </div>
    <div class="card-footer text-muted text-center ">
        © Editing project Form..
    </div>
</div>



</div>


@endsection