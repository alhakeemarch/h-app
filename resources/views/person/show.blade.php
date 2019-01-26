
@extends('layouts.app')
@section('title','show view')

@section('content')
<div class="card">
    <div class="card-body">
        Person ID = {{$person->id}} <br>
        Person National ID Number = {{$person->national_id}} <br>
        Person Name = {{$person->name1}} {{$person->name2}} {{$person->name3}} {{$person->name4}} {{$person->name5}} <br>
        Person Nationaltiy = {{$person->nationaltiy}} <br>
        Person Hafizah Number = {{$person->hafizah_no}} <br>
        Person National ID Issue Date = {{$person->national_id_issue_date}} <br>
        Person National ID Issue Place = {{$person->national_id_issue_place}} <br>
        Person Birth Date = {{$person->birth_date}} <br>
        Person Birth Place = {{$person->birth_place}} <br>
        Person Time Stamps = {{$person->timestamps}} <br>
    </div>
</div>

@endsection