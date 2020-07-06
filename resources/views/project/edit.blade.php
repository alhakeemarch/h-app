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
            </div>
            {{-- ============================================================================================= --}}




            {{-- //////////////////////////////////////////////////////////////////////// --}}
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
            {{-- //////////////////////////////////////////////////////////////////////// --}}









            {{-- @include('project.forms.form') --}}
            <div class="row">
                <div class="col-6">
                    <button type="submet" name="submet" id="submet" class="btn btn-info btn-block">Update</button>
                </div>
                <div class="col-6">
                    <a href="{{ url('/project/'.$project->id) }}" class="btn btn-info btn-block">Cancel</a>
                </div>
            </div>

        </form>
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