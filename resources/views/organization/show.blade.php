@extends('layouts.app')
@section('title', 'show organization')
@section('content')

<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>show an organization</span>
        <span>عرض تفاصيل المنشأة</span>
    </h5>
    <div class="card-body">

        @php
        $obj = json_decode($organization, TRUE);
        @endphp
        <ul class="card-body">
            @foreach ($obj as $a=>$b )
            <li>
                {{$a}} : {{$b}}
            </li>
            @endforeach
        </ul>
        <hr>

        <div class="row">
            <x-form-cancel />
            <x-form-edit route='organization.edit' :resource=$organization />
            <x-form-delete route='organization.destroy' :resource=$organization />
        </div>

    </div>
</div>


@endsection