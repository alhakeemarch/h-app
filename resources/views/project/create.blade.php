@extends('layouts.app')
@section('title', 'new project 5/5')
@section('content')

<div class="container-fluid">
    <div class="card row">
        <h5 class="card-header d-flex justify-content-between">
            <span>creating new project</span>
            <span>إنشاء مشروع جديد</span>
        </h5>
        <div class="card-body">
            <h2 class="alert-danger h2 text-center">
                تنبيه: في حال كان المشروع قديم وله رقم بالمكتب يجب البحث عن المشروع وتسجيل العقود عليه.
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="card col-md-6">
            <h5 class="card-header d-flex justify-content-between">
                <span class=" text-capitalize">new project (design)</span>
                <span>مشروع جديد تصميم</span>
            </h5>
            <div class="card-body">
                <h2 class="alert-danger h2 text-center">
                    تنبيه: في حال كان المشروع قديم وله رقم بالمكتب يجب البحث عن المشروع وتسجيل العقود عليه.
                </h2>
            </div>
        </div>

        <div class="card col-md-6">
            <h5 class="card-header d-flex justify-content-between">
                <span class=" text-capitalize">new project (supervision only)</span>
                <span>مشروع جديد اشراف فقط</span>
            </h5>
            <div class="card-body">
                <h2 class="alert-danger h2 text-center">
                    تنبيه: في حال كان المشروع قديم وله رقم بالمكتب يجب البحث عن المشروع وتسجيل العقود عليه.
                </h2>

                <x-btn btnText="search" />
                <x-btn btnText="view" />
                <x-btn btnText="add" />
                <x-btn btnText="new" />
                <x-btn btnText="save" />
                <x-btn btnText="ok" />
                <x-btn btnText="submit" />
                <x-btn btnText="apply" />
                <x-btn btnText="next" />
                <x-btn btnText="cancel" />
                <x-btn btnText="back" />
                <x-btn btnText="delet" />
                <x-btn btnText="edit" />
                <x-btn btnText="print" />
                <x-btn btnText="refresh" />
                <x-btn btnText="reload" />
                <x-btn btnText="re-rendr" />
                <x-btn btnText="sync" />
                <x-btn btnText="reset" />
                <x-btn btnText="toggle-off" />
                <x-btn btnText="toggle-on" />

                <x-btn>
                    <x-slot name='btn_text'>cancel</x-slot>
                </x-btn>

                <x-btn btnText=''>
                    <x-slot name='btn_text'>ok</x-slot>
                    {{-- <x-slot name='btn_text'>
                        search|view|add|new|save|ok|submit|apply|next|cancel|back|delet|edit|print|refresh|reload|re-rendr|sync|reset|toggle-off|toggle-on
                    </x-slot> --}}
                    <x-slot name='btn_type'>true</x-slot>
                    <x-slot name='is_disabled'>true</x-slot>
                    <x-slot name='is_btn_link'>true</x-slot>
                    <x-slot name='btn_only_icon'>true</x-slot>
                </x-btn>



            </div>
        </div>
    </div>
</div>









{{-- <div class="card">
    <h5 class="card-header">{{ __('crating project') }}</h5>
<div class="card-body">

    <h2 class="alert-danger">
        تنبيه
        في حال كان المشروع قديم وله رقم بالمكتب يجب البحث عن المشروع وتسجيل العقود عليه.
    </h2> --}}


    {{-- @if ($project->id) --}}
    {{-- <div class=" alert alert-info">
            <p>this deed is allredy regestered for onother project</p>
            <p>هذا الصك مسجل لمشروع سابق</p>
        </div>
        <form action="{{route('project.show',$project)}}" method="get">
    <button class="btn btn-info btn-block my-3">{{__('show')}} {{__('the project')}}</button>
    </form> --}}
    {{-- @else --}}
    {{-- <form class="form-group" action="{{ action('ProjectController@store') }}" accept-charset="UTF-8"
    method="POST">
    @csrf --}}
    {{-- --------------------------------------------------------------------------- --}}
    {{-- <input type="hidden" name="create_plot" value="1"> --}}
    {{-- --------------------------------------------------------------------------- --}}
    {{-- @include('project.forms.customer_info') --}}
    {{-- --------------------------------------------------------------------------- --}}
    {{-- <input type="hidden" name="person_id" value="{{$person->id}}">
    <input type="hidden" name="national_id" value="{{$person->national_id}}"> --}}
    {{-- --------------------------------------------------------------------------- --}}
    {{-- <hr> --}}
    {{-- --------------------------------------------------------------------------- --}}
    {{-- @include('plot.forms.deed_info')
            @include('plot.forms.plan_info')
            @include('plot.forms.regulations')
            @include('plot.forms.coordinates')
            @include('project.forms.project_info') --}}
    {{-- --------------------------------------------------------------------------- --}}
    {{-- <button type="submit" class="btn btn-info btn-block my-3">{{__('save')}}</button> --}}
    {{-- </form> --}}
    {{-- @endif --}}

    {{-- </div>
</div> --}}



    @endsection