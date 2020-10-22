@extends('layouts.app')
@section('title', 'quotation create')
@section('content')

<div class="container-fluid">
    <form action="{{route('quotation.store')}}" method="POST" class="card p-4">
        @csrf
        <input type="hidden" name="project" value={{"$project->id"}}>
        <div class="row">
            {{-- prefix --}}
            {{-- person_titles --}}

            <x-select_searchable name='prefix' title="prefix" :resource=$project :list=$person_titles>
                <x-slot name='db_data_field'>id</x-slot>
                <x-slot name='show_field'>name_ar</x-slot>
                <x-slot name='resource_field'>person()->first()->person_title()->first()->name_ar</x-slot>
                {{-- <x-slot name='title'>cool tital</x-slot> --}}
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
            </x-select_searchable>



            <x-input name='address_to' title="">
                <x-slot name='title'>{{__('title')}}</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->person()->first()->person_title()->first()->name_ar}}</x-slot>
            </x-input>
            <x-input name='address_to' title="">
                <x-slot name='title'>{{__('address to')}}</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->person()->first()->get_full_name_ar()}}</x-slot>
            </x-input>
            suffix
            <x-input name='address_to' title="">
                <x-slot name='title'>{{__('title')}}</x-slot>
                <x-slot name='is_required'>true</x-slot>
                <x-slot name='input_value'>{{$project->person()->first()->person_title()->first()->suffix_ar}}</x-slot>
            </x-input>
        </div>
        <button type="submit" class="btn btn-info btn-block">save</button>
    </form>

</div>
@endsection