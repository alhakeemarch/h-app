
@extends('layouts.app')
@section('title','show view')

@section('content')
<div class="card container">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img class="img-thumbnail rounded img-responsive" src="{{ asset('img/myAvatar.png') }}" alt="avatar" > 
                <h2> {{$person->name1}} {{$person->name5}}</h2>
            </div>
            <div class="col-md-8">
                
                <h5 class="shadow-sm p-2 mb-2 rounded text-center text-uppercase bg-secondary text-light">Personal Information</h5>
                <div>Person ID = {{$person->id}} </div>
                <div>Person National ID Number = {{$person->national_id}}</div>

                <h5 class="shadow-sm p-2 mb-2 rounded text-center text-uppercase bg-secondary text-light">Contact Information</h5>        
                    Person Name = {{$person->name1}} {{$person->name2}} {{$person->name3}} {{$person->name4}} {{$person->name5}} <br>
                    Person Nationaltiy = {{$person->nationaltiy}} <br>
                    Person Hafizah Number = {{$person->hafizah_no}} <br>
                    Person National ID Issue Date = {{$person->national_id_issue_date}} <br>
                    Person National ID Issue Place = {{$person->national_id_issue_place}} <br>
                
                <h5 class="shadow-sm p-2 mb-2 rounded text-center text-uppercase bg-secondary text-light">Multi Information</h5>
                    Person Birth Date = {{$person->birth_date}} <br>
                    Person Birth Place = {{$person->birth_place}} <br>
                    Person Time Stamps = {{$person->timestamps}} <br>
            </div>
        </div>
        
    </div>
</div>



@endsection