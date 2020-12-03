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
            @if ($comming_from)
            <input type="hidden" name="coming_from" value="{{$comming_from}}">
            @endif
            <input type="hidden" name="form_action" value="create_new_organization">
            @include('organization.forms.q_form')
            <x-btn btnText='next' />
        </form>
    </div>
</div>

@endsection