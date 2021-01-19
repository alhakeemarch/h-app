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
        {{-- ---------------------------------------------------------------------------------------------------------------------------------------------- --}}
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>

                    <th scope="ownerType">
                        <p class="pb-2">organization type</p>
                        <x-search_input name='organization_type_input' />
                    </th>
                    <th scope="en_ownerType">
                        <p class="pb-2">organization name</p>
                        <x-search_input name='organization_name_input' />
                    </th>
                    <th scope="link">details</th>
                </tr>
            </thead>

            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($organizations as $organization)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope="organization" class="organization_type_input">
                        {{$organization->organization_type()->first()->name_ar}} </td>
                    <td scope="organization" class="organization_name_input">
                        {{$organization->name_ar }} </td>
                    <td scope="link">
                        <a href="{{ url('/organization/'.$organization->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    @php $i ++ @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- ---------------------------------------------------------------------------------------------------------------------------------------------- --}}
        {{-- @foreach ($organizations as $organization)
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
        @endforeach --}}
        {{-- ---------------------------------------------------------------------------------------------------------------------------------------------- --}}

    </div>
</div>
@endsection

@section('script')
{{-- // for javascript --}}
@endsection