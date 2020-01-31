@extends('layouts.app')
@section('title', 'district index')
@section('content')

<div class="container-fluid text-center">
    <h1 class="h1"> جدل لعرض كل المناطق</h1>



    <div class="card">
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>
                    <th scope="ar_name">
                        <p class="pb-2">district in arabic</p>
                        <input type="text" id='ar_name_input' name="ar_name_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="municipality_branche_ar_name">
                        <p class="pb-2">ضمن بلدية</p>
                        <input type="text" id='municipality_branche_ar_name_input'
                            name="municipality_branche_ar_name_input" class="form-control" autocomplete="off" required
                            placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="link">details</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($districts as $district)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope=" ar_name" class="ar_name_input">{{$district->ar_name }}</td>
                    <td scope="municipality_branche_ar_name" class="municipality_branche_ar_name_input">
                        {{$district->municipality_branche_ar_name}}</td>

                    <td scope="link">
                        <a href="{{ url('/district/'.$district->id) }}">
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
    {{-- @foreach ($districts as $district)
    @php
    $obj = json_decode($district, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/district/'.$district->id) }}">
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