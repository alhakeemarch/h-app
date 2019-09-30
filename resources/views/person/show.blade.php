@extends('layouts.app')
@section('title','show person')

@section('content')
<div class="card ">
    <h6 class="card-header"> This Person is Customer and Employee </h6>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img class="img-thumbnail rounded img-responsive mb-2" src="{{ asset('img/mail.png') }}" alt="avatar"
                    style="max-height: 250px;">

                <h2> {{$person->en_name1.' '.$person->en_name5}}</h2>
                <h2> {{$person->ar_name1.' '.$person->ar_name5}}</h2>
            </div>
            <div class="col-md-8">

                <h5 class="card-header text-center text-uppercase bg-secondary text-light rounded my-2">Personal
                    Information</h5>
                <div class="info">

                </div>
                <div>Person ID = {{$person->id}} </div>
                <div>Person National ID Number = {{$person->national_id}}</div>

                <h5 class="card-header text-center text-uppercase bg-secondary text-light rounded my-2">Contact
                    Information</h5>
                <div>
                    Name =
                    {{$person->ar_name1.' '.$person->ar_name2.' '.$person->ar_name3.' '.$person->ar_name4.' '.$person->ar_name5}}
                    -
                    {{$person->en_name1.' '.$person->en_name2.' '.$person->en_name3.' '.$person->en_name4.' '.$person->en_name5}}
                    <br>
                    Nationaltiy = {{$person->nationaltiy_ar}} - {{$person->nationaltiy_en}} <br>
                    Person Hafizah Number = {{$person->hafizah_no}} <br>
                    National ID Issue Date = {{$person->national_id_issue_date}} <br>
                    National ID Issue Place = {{$person->national_id_issue_place}} <br>
                </div>

                <h5 class="card-header text-center text-uppercase bg-secondary text-light rounded my-2">Multi
                    Information</h5>
                <div>
                    Birth Date = {{$person->birth_date}} <br>
                    Birth Place = {{$person->birth_place}} <br>
                    Time Stamps = {{$person->timestamps}} <br>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card my-5">
    <h2 class="card-header bg-danger">
        To delet
    </h2>
    @php
    $obj = json_decode($person, TRUE);
    @endphp
    <ul class="card-body">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach
    </ul>
</div>





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection