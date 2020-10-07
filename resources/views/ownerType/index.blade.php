@extends('layouts.app')
@section('title', 'ownerType index')
@section('content')

<div class="container-fluid text-center">
    <div class="card">
        <h3 class="h3 text-center">
            list of all building ratios <p class="small">total = {{ count($ownerTypes) }}</p>
        </h3>
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>

                    <th scope="ownerType">
                        <p class="pb-2">نوع المالك</p>
                        <input type="text" id='ownerType' name="ownerType_input" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="en_ownerType">
                        <p class="pb-2">owner Type</p>
                        <input type="text" id='en_ownerType' name="en_ownerType_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyEnglishString(event)">
                    </th>
                    <th scope="notes">
                        <p class="pb-2">ملاحظات</p>
                        <input type="text" id='notes' name="notes_input" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="link">details</th>
                </tr>
            </thead>

            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($ownerTypes as $ownerType)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope=" ownerType" class="ownerType_input">
                        {{$ownerType->type_ar}} </td>
                    <td scope="ownerType" class="en_ownerType_input">
                        {{$ownerType->type_en}} </td>
                    <td scope="notes" class="notes_input">{{$ownerType->notes}}</td>
                    <td scope="link">
                        <a href="{{ url('/ownerType/'.$ownerType->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    @php $i ++ @endphp
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>














    {{-- NOTE: هذا الكود يبين كل حقول الجدول --}}
    {{-- ===================================================++ --}}
    {{-- @foreach ($ownerTypes as $ownerType)
@php
$obj = json_decode($ownerType, TRUE);
@endphp
<ul class="">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/ownerType/'.$ownerType->id) }}">
        <i class="far fa-eye"></i>
        Show
    </a>

    </ul>
    <hr>
    @endforeach --}}
    {{-- ===================================================++ --}}
</div>




@endsection