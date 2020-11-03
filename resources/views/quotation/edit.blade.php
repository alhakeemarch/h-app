@extends('layouts.app')
@section('title', 'quotation create')
@section('content')

<div class="container-fluid">
    <form action="{{route('quotation.update',$quotation)}}" method="POST" class="card p-4">
        @csrf
        @method('PATCH')
        <input type="hidden" name="update_address_to" value="1">
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <div class="row card-header d-flex justify-content-between">
            <span>project info</span>
            <span>بيانات المشروع</span>
        </div>
        <div class="row">
            <div class="col-md">
                <label class="text-muted my-1">{{__('quotation date')}}</label>
                <span class=" form-control">{{$quotation->quotation_date}}</span>
            </div>
            <div class="col-md">
                <label class="text-muted my-1">{{__('owner name')}}</label>
                <span class=" form-control">{{$project->person()->first()->get_full_name_ar()}}</span>
            </div>
            <div class="col-md">
                <label class="text-muted my-1">{{__('deed no')}}</label>
                <span class=" form-control">{{$project->plot()->first()->deed_no}}</span>
            </div>
            <div class="col-md">
                <label class="text-muted my-1">{{__('plot no')}}</label>
                <span class=" form-control">{{$project->plot()->first()->plot_no}}</span>
            </div>
        </div>
        {{-- -------------------------------------------------------------------------------------------------------------------------------------- --}}
        <hr>
        <div class="row card-header d-flex justify-content-between">
            <span>address to info</span>
            <span>بيانات الموجه له العرض</span>
        </div>
        <div class="row">
            <x-select_searchable name='address_to_title_id' title="title" :resource=$quotation :list=$person_titles>
                <x-slot name='db_data_field'>id</x-slot>
                <x-slot name='show_field'>name_ar</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='resource_field'>address_to_title_id</x-slot>
            </x-select_searchable>
            <x-input name='address_to_name' title="">
                <x-slot name='title'>{{__('address to name')}}</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$quotation->address_to_name}}</x-slot>
            </x-input>
            <div class="col-md my-2">
                <label for="is_address_to_before_owner">{{__( 'before owner')}}
                    <span class="small text-muted">({{__('optional')}})</span>:</label>
                <select name="is_address_to_before_owner"
                    class="form-control @error ('is_address_to_before_owner') is-invalid @enderror">
                    <option value=0 selected> {{__('no')}}</option>
                    <option value=1 @if(old('is_address_to_before_owner') or $quotation->is_address_to_before_owner
                        )selected @endif
                        > {{__('yes')}}</option>
                </select>
                @error('is_address_to_before_owner')
                <small class=" text-danger"> {{$errors->first('is_address_to_before_owner')}} </small>
                @enderror
            </div>
        </div>
        {{-- -------------------------------------------------------------------------------------------------------------------------------------- --}}
        <hr>
        <div class="row">
            <button type="submit" class="btn btn-info col">save</button>
            <a href="{{route('project.show', $project)}}" class="btn btn-secondary  col">
                <i class="fas fa-undo"> | </i> {{__('back')}}
            </a>
        </div>
    </form>

</div>
@endsection