@extends('layouts.app')
@section('title', 'user index')
@section('content')


<div class="card">
    <h3 class="h3 text-center">
        list of all majors <p class="small">total = {{ count($majors) }}</p>
    </h3>
    <table class="table table-hover">
        <thead class="bg-thead">
            <tr>
                <th scope="sequence">#</th>
                <th scope="column">
                    <p class="pb-2">major</p>
                    <input type="text" id='major_en' name="major_en_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyEnglishString(event)">
                </th>
                <th scope="column">
                    <p class="pb-2">التخصص</p>
                    <input type="text" id='major_ar' name="major_ar_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>

                <th scope="link">details</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($majors as $major)
            <tr>
                <td scope="row">{{$i}}</td>
                <td scope="row" class="major_en_input">{{$major->major_en }}</td>
                <td scope="row" class="major_ar_input">{{$major->major_ar}}</td>
                <td scope="link">
                    <a href="{{ url('/major/'.$major->id) }}">
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

{{-- @foreach ($majors as $major)
@php
$obj = json_decode($major, TRUE);
@endphp
<ul class="">
    @foreach ($obj as $a=>$b )
    <li>
        {{ $a}} : {{$b}}
</li>
@endforeach

<a class="btn btn-info btn-lg btn-block " href="{{ url('/major/'.$major->id) }}">
    <i class="far fa-eye"></i>
    Show
</a>

</ul>
<hr>

@endforeach --}}
{{-- ===================================================++ --}}





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection