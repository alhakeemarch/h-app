@extends('layouts.app')
@section('title','show person')

@section('content')
<div class="card ">
    <h5 class="card-header text-center"> Person Detailed Information </h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img class="img-thumbnail rounded img-responsive mb-2" src="{{ asset('img/mail.png') }}" alt="avatar"
                    style="max-height: 250px;">

                <h5> {{$person->en_name1.' '.$person->en_name5}}</h5>
                <h5> {{$person->ar_name1.' '.$person->ar_name5}}</h5>
            </div>
            <div class="col-md-8">

                <h6 class="card-header text-center text-uppercase bg-secondary text-light rounded my-2">Personal
                    Information</h6>
                <div class="info">

                </div>
                <div>Person ID = {{$person->id}} </div>
                <div>Person National ID Number = {{$person->national_id}}</div>

                <h6 class="card-header text-center text-uppercase bg-secondary text-light rounded my-2">Contact
                    Information</h6>
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

                <h6 class="card-header text-center text-uppercase bg-secondary text-light rounded my-2">Multi
                    Information</h6>
                <div>
                    Birth Date = {{$person->birth_date}} <br>
                    Birth Place = {{$person->birth_place}} <br>
                    Time Stamps = {{$person->timestamps}} <br>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ////// to show all person detals --}}
{{-- ============================================ --}}
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


<hr>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/person') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        <a href="{{ url('/person/'.$person->id.'/edit') }}" class="btn btn-info btn-lg
        btn-block "> <i class="fas fa-pen"></i> Edit</a>
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('person.destroy', $person) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
        </form>
    </div>

</div>





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection