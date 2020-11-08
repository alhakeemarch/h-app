@extends('layouts.app')
@section('title', 'project delet')
@section('content')

<div class="row container-fluid">
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card col">
        <h3 class="card-header d-flex justify-content-between">
            <span>project deleting</span>
            <span>حذف المشروع</span>
            <div class="card-body">
        </h3>
        <form class="delete" action="{{ route('project.destroy', $project) }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="hidden" name="form_action" value="delet_with_note">
            <div class="row">
                <div class="col">
                    <label class="my-1">{{__('name')}} :</label>
                    <span class=" form-control">{{$project->project_name_ar}}</span>
                </div>
                <div class="col">
                    <label class="my-1">{{__('deed number')}} :</label>
                    <span class=" form-control">{{$project->plot()->first()->deed_no}}</span>
                </div>
                <div class="col">
                    <label class="my-1">{{__('plot')}} {{__('number')}}:</label>
                    <span class=" form-control">{{$project->plot()->first()->plot_no}}</span>
                </div>
            </div>
            <div class="row">
                <x-input name='note' title="{{__('delete reason')}}">
                    <x-slot name='is_required'>true</x-slot>
                </x-input>
            </div>
            <div class="row">
                @if (auth()->user()->is_admin)
                <button type="submit" class="btn btn-danger col" onclick="return confirm('Are you sure?')">
                    <i class="fa fa-trash"></i> | Delete</button>
                @else
                <button disabled class="btn disabled btn-danger col" onclick="return confirm('Are you sure?')">
                    <i class="fa fa-trash"></i> Delete</button>
                @endif
                <div class="col">
                    <a href="{{ url('/project') }}" class="btn btn-info d-block"> <i class="fas fa-undo"></i> |
                        back</a>
                </div>
            </div>
        </form>
    </div>
</div>




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

@endif

@endsection