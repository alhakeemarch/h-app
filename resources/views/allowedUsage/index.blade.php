@extends('layouts.app')
@section('title', 'building usage index')
@section('content')

<div class="container-fluid text-center">
    <div class="card">
        <h3 class="h3 text-center">
            list of all building usages <p class="small">total = {{ count($usages) }}</p>
        </h3>
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>

                    <th scope="building_usage">
                        <p class="pb-2">الإستخدام</p>
                        <input type="text" name="usage_input" class="form-control" autocomplete="off" required
                            placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
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
                @foreach ($usages as $usage)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope=" usage" class="usage_input">{{$usage->usage}}
                    </td>
                    <td scope="notes" class="notes_input">{{$usage->notes}}</td>
                    <td scope="link">
                        <a href="{{ url('/allowedUsage/'.$usage->id) }}">
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
    {{-- @foreach ($usages as $usage)
@php
$obj = json_decode($usage, TRUE);
@endphp
<ul class="">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/allowedUsage/'.$usage->id) }}">
        <i class="far fa-eye"></i>
        Show
    </a>

    </ul>
    <hr>
    @endforeach --}}
    {{-- ===================================================++ --}}
</div>





@endsection