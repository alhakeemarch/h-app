@extends('layouts.app')
@section('title', 'organization index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>show all organizations</span>
        <span>total => {{count($organizations)}}</span>
        <span>عرض كل المنشآت</span>
    </h5>
    <div class="card-body">
        @foreach ($organizations as $organization)
        @php
        $obj = json_decode($organization, TRUE);
        @endphp
        <ul class="">
            @foreach ($obj as $a=>$b )
            <li>
                {{$a}} : {{$b}}
            </li>
            @endforeach

            <a class="btn btn-info btn-lg btn-block " href="{{ url('/organization/'.$organization->id) }}">
                <i class="far fa-eye"></i>
                Show
            </a>

        </ul>
        <hr>
        @endforeach
    </div>
</div>
@endsection

@section('script')
{{-- // for javascript --}}
@endsection