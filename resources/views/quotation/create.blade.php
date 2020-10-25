@extends('layouts.app')
@section('title', 'quotation create')
@section('content')

<div class="container-fluid">
    <form action="{{route('quotation.store')}}" method="POST" class="card p-4">
        @csrf
        <input type="hidden" name="project" value={{"$project->id"}}>
        <div class="row card-header d-flex justify-content-between">
            <span>owner info</span>
            <span>بيانات المالك</span>
        </div>
        <div class="row">
            <x-input name='owner_title' title="">
                <x-slot name='title'>{{__('title')}}</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->person()->first()->person_title()->first()->name_ar}}</x-slot>
            </x-input>
            <x-input name='owner_name' title="">
                <x-slot name='title'>{{__('owner name')}}</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->person()->first()->get_full_name_ar()}}</x-slot>
            </x-input>

            <x-input name='address_to' title="">
                <x-slot name='title'>{{__('suffix')}}</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->person()->first()->person_title()->first()->suffix_ar}}</x-slot>
            </x-input>
            <div class="col-md my-2">
                <label for="is_address_to_before_owner">{{__( 'before owner')}}
                    <span class="small text-muted">({{__('optional')}})</span>:</label>
                <input type="date" name="quotation_date" class="form-control">
                @error('is_address_to_before_owner')
                <small class=" text-danger"> {{$errors->first('is_address_to_before_owner')}} </small>
                @enderror
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
                <x-slot name='resource_field'>address_to_title_id</x-slot>
            </x-select_searchable>
            <x-input name='address_to' title="">
                <x-slot name='title'>{{__('address to name')}}</x-slot>
                <x-slot name='input_value'>{{$quotation->address_to_name}}</x-slot>
            </x-input>
            @if (auth()->user()->is_admin)
            <x-input name='address_to' title="">
                <x-slot name='title'>{{__('suffix')}}</x-slot>
                <x-slot name='input_value'>{{$quotation->address_to_name}}</x-slot>
            </x-input>
            @endif
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
        <button type="submit" class="btn btn-info btn-block">save</button>
    </form>

</div>
@endsection