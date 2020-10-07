@extends('layouts.app')
@section('title', 'new project 5/5')
@section('content')

<div class="card">
    <h5 class="card-header">{{ __('crating project') }}</h5>
    <div class="card-body">
        @if ($project->id)
        <div class=" alert alert-info">
            <p>this deed is allredy regestered for onother project</p>
            <p>هذا الصك مسجل لمشروع سابق</p>
        </div>
        <form action="{{route('project.show',$project)}}" method="get">
            <button class="btn btn-info btn-block my-3">{{__('show')}} {{__('the project')}}</button>
        </form>
        @else
        <form class="form-group" action="{{ action('ProjectController@store') }}" accept-charset="UTF-8" method="POST">
            @csrf
            {{-- --------------------------------------------------------------------------- --}}
            <input type="hidden" name="create_plot" value="1">
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
            @include('plot.forms.regulations')
            @include('plot.forms.coordinates')
            @include('project.forms.project_info')
            {{-- --------------------------------------------------------------------------- --}}
            <button type="submit" class="btn btn-info btn-block my-3">{{__('save')}}</button>
        </form>
        @endif

    </div>
</div>



@endsection