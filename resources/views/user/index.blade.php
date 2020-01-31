@extends('layouts.app')
@section('title', 'user index')
@section('content')


<div class="card">
    <h3 class="h3 text-center">
        list of all users <p class="small">total = {{ count($users) }}</p>
    </h3>
    <table class="table table-hover">
        <thead class="bg-thead">
            <tr>
                <th scope="sequence">#</th>
                <th scope="column">
                    <p class="pb-2">الهوية</p>
                    <input type="text" id='national_id' name="national_id_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                        onkeypress=" onlyNumber(event)">
                </th>
                <th scope="column">
                    <p class="pb-2">الإسم</p>
                    <input type="text" id='name' name="name_input" class="form-control" autocomplete="off" required
                        placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)">
                </th>
                <th scope="column">
                    <p class="pb-2">إسم المستخدم</p>
                    <input type="text" id='user_name' name="user_name_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                        onkeypress=" userNameString(event)">
                </th>
                <th scope="column">
                    <p class="pb-2">الإيميل</p>
                    <input type="text" id='email' name="email_input" class="form-control" autocomplete="off" required
                        placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)">
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
                <td scope="row">{{$i}}</td>
                <td scope=" row" class="national_id_input">{{$user->national_id}}</td>
                <td scope="row" class="name_input">{{$user->name}}</td>
                <td scope="row" class="user_name_input text-lowercase">{{$user->user_name}}</td>
                <td scope="row" class="email_input">{{$user->email}}</td>
                <td scope="link">
                    <a href="{{ url('/user/'.$user->id) }}">
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
{{--
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

@endforeach --}}
{{-- ===================================================++ --}}





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection