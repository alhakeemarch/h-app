@extends('layouts.app')
@section('title', 'municipality index')
@section('content')

<div class="container-fluid text-center">
    <h1 class="h1"> جدل لعرض كل الجنسيات</h1>



    <div class="card">
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>
                    <th scope="ar_name">municipality in arabic
                        <input type="text" id='ar_name_input' name="ar_name_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'إبحث هنا')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="en_name">municipality in english
                        <input type="text" id='en_name_input' name="en_name_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search here')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'search here')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyEnglishString(event)">
                    </th>
                    <th scope="link">details</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($municipalities as $municipality)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope="ar_name" class="ar_name_input">{{$municipality->ar_name }}</td>
                    <td scope="en_name" class="en_name_input">{{$municipality->en_name}}</td>

                    <td scope="link">
                        <a href="{{ url('/municipalityBranch/'.$municipality->id) }}">
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
    {{-- @foreach ($municipalities as $municipality)
    @php
    $obj = json_decode($municipality, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/municipalityBranch/'.$municipality->id) }}">
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