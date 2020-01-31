@extends('layouts.app')
@section('title', 'building_ratio index')
@section('content')

<div class="container-fluid text-center">
    <div class="card">
        <h3 class="h3 text-center">
            list of all building ratios <p class="small">total = {{ count($building_ratios) }}</p>
        </h3>
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>

                    <th scope="building_ratio">
                        <p class="pb-2">نسبة البناء</p>
                        <input type="text" id='building_ratio' name="building_ratio_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
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
                @foreach ($building_ratios as $building_ratio)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope=" building_ratio" class="building_ratio_input">{{$building_ratio->building_ratio}} %
                    </td>
                    <td scope="notes" class="notes_input">{{$building_ratio->notes}}</td>
                    <td scope="link">
                        <a href="{{ url('/allowedBuildingRatio/'.$building_ratio->id) }}">
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
    {{-- @foreach ($building_ratios as $building_ratio)
@php
$obj = json_decode($building_ratio, TRUE);
@endphp
<ul class="">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/building_ratio/'.$building_ratio->id) }}">
        <i class="far fa-eye"></i>
        Show
    </a>

    </ul>
    <hr>
    @endforeach --}}
    {{-- ===================================================++ --}}
</div>




<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection