@extends('layouts.app')
@section('title', 'allowed_building_height index')
@section('content')

<div class="container-fluid text-center">
    <div class="card">
        <h3 class="h3 text-center">
            list of all building ratios <p class="small">total = {{ count($allowed_building_heights) }}</p>
        </h3>
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>

                    <th scope="allowed_building_height">
                        <p class="pb-2">إرتفاع المباني</p>
                        <input type="text" id='allowed_building_height' name="allowed_building_height_input"
                            class="form-control" autocomplete="off" required placeholder="{{__( 'search..')}}"
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'search..')}}'"
                            onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
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
                @foreach ($allowed_building_heights as $allowed_building_height)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope=" allowed_building_height" class="allowed_building_height_input">
                        {{$allowed_building_height->building_height}} </td>
                    <td scope="notes" class="notes_input">{{$allowed_building_height->notes}}</td>
                    <td scope="link">
                        <a href="{{ url('/allowedBuildingHeight/'.$allowed_building_height->id) }}">
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
    {{-- @foreach ($allowed_building_heights as $allowed_building_height)
@php
$obj = json_decode($allowed_building_height, TRUE);
@endphp
<ul class="">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block "
        href="{{ url('/allowed_building_height/'.$allowed_building_height->id) }}">
        <i class="far fa-eye"></i>
        Show
    </a>

    </ul>
    <hr>
    @endforeach --}}
    {{-- ===================================================++ --}}
</div>




@endsection