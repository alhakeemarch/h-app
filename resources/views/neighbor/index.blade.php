@extends('layouts.app')
@section('title', 'neighbor index')
@section('content')

<div class="container-fluid text-center">
    <div class="card">
        <h3 class="h3 text-center">
            list of all neighbors <p class="small">total = {{ count($neighbors) }}</p>
        </h3>
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>

                    <th scope="neighbor_ar_name">
                        <p class="pb-2">إسم الحي</p>
                        <input type="text" id='neighbor_ar_name' name="neighbor_ar_name_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="district">
                        <p class="pb-2">المنطقة</p>
                        <input type="text" id='district' name="district_input" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="gog_location">
                        <p class="pb-2">البلدية التابع لها</p>
                        <input type="text" id='municipality_branche' name="municipality_branche" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
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
                @foreach ($neighbors as $neighbor)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope=" neighbor_ar_name" class="neighbor_ar_name_input">{{$neighbor->ar_name}}</td>
                    <td scope="district" class="district_input">{{$neighbor->district_ar_name}}</td>
                    <td scope="gog_location" class="municipality_branche">{{$neighbor->municipality_branche_ar_name}}
                    </td>

                    <td scope="link">
                        <a href="{{ url('/neighbor/'.$neighbor->id) }}">
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
    {{-- @foreach ($neighbors as $neighbor)
    @php
    $obj = json_decode($neighbor, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/neighbor/'.$neighbor->id) }}">
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