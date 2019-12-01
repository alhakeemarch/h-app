@extends('layouts.app')
@section('title', 'nationality index')
@section('content')

<div class="container-fluid text-center">
    <h1 class="h1"> جدل لعرض كل الجنسيات</h1>
    <div class="card">
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nationality in arabic
                        <input type="text" id='ar_nationality_input' name="ar_nationality_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'إبحث هنا')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="col">nationality in english
                        <input type="text" id='en_nationality_input' name="en_nationality_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search here')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'search here')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyEnglishString(event)">
                    </th>
                    <th scope="col">details</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($nationalities as $nationality)
                <tr>
                    <td scope="row">{{$i}}</td>
                    <td class="ar_nationality_input">{{$nationality->ar_name }}</td>
                    <td class="en_nationality_input">{{$nationality->en_name}}</td>

                    <td>
                        <a href="{{ url('/nationality/'.$nationality->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @php $i ++ @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    {{-- @foreach ($nationalities as $nationality)
    @php
    $obj = json_decode($nationality, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/nationality/'.$nationality->id) }}">
        <i class="far fa-eye"></i>
        Show
    </a>

    </ul>
    <hr>
    @endforeach --}}
</div>




<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection