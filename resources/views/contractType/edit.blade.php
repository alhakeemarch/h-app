@extends('layouts.app')
@section('title','country create')
@section('content')
<div class="card mb-3">
    <h5 class="card-header">{{ __('create') }} of {{__('contractType')}}</h5>
    <form action="{{ route('contractType.update',$contractType) }}" method="POST" class="card-body">
        @csrf
        @method('PATCH')
        @include('contractType.forms.q_form')
        <button class="btn btn-info btn-block" type="submit">{{__('submit')}}</button>
    </form>
</div>
@endsection