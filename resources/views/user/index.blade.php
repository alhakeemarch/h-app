@extends('layouts.app')
@section('title', 'user index')
@section('content')

<div class="container-fluid text-center">
    <div class="card">
        <h3 class="h3 text-center">
            list of all users <p class="small">total = {{ count($users) }}</p>
        </h3>
        {{-- <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>

                    <th scope="user">
                        <p class="pb-2">نوع المالك</p>
                        <input type="text" id='user' name="user_input" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
        onkeypress=" onlyArabicString(event)">
        </th>
        <th scope="en_user">
            <p class="pb-2">owner Type</p>
            <input type="text" id='en_user' name="en_user_input" class="form-control" autocomplete="off" required
                placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                onkeypress=" onlyEnglishString(event)">
        </th>
        <th scope="notes">
            <p class="pb-2">ملاحظات</p>
            <input type="text" id='notes' name="notes_input" class="form-control" autocomplete="off" required
                placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
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
            @foreach ($users as $user)
            <tr>
                <td scope="sequence">{{$i}}</td>
                <td scope="user" class="user_input">
                    {{$user->type_ar}} </td>
                <td scope="user" class="en_user_input">
                    {{$user->type_en}} </td>
                <td scope="notes" class="notes_input">{{$user->notes}}</td>
                <td scope="link">
                    <a href="{{ url('/user/'.$user->id) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
                @php $i ++ @endphp
            </tr>
            @endforeach
        </tbody>
        </table> --}}

    </div>














    {{-- NOTE: هذا الكود يبين كل حقول الجدول --}}
    {{-- ===================================================++ --}}
    @foreach ($users as $user)
    @php
    $obj = json_decode($user, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach

        <a class="btn btn-info btn-lg btn-block " href="{{ url('/user/'.$user->id) }}">
            <i class="far fa-eye"></i>
            Show
        </a>

    </ul>
    <hr>
    @endforeach
    {{-- ===================================================++ --}}
</div>




<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection