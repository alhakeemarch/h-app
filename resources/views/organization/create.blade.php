@extends('layouts.app')
@section('title', 'registration new organization')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>registration new organization</span>
        <span>تسجيل جهة جديدة</span>
    </h5>
    <div class="card-body">
        <form class="form-group" action="{{route('organization.store')}}" method="POST">
            @csrf
            <x-input name='asd' title="">
                <x-slot name='is_required'>true</x-slot>
                {{-- <x-slot name='input_value'>{{$person->ar_name1}}</x-slot> --}}
            </x-input>
            <x-btn btnText='next' />
        </form>
    </div>
</div>
@endsection