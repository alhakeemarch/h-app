@extends('layouts.app')
@section('title', 'new project 4/x')
@section('content')

<div class="card my-5 p-2">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>customer Information</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>customer Name</td>
                <td>{{$person->ar_name1}} {{$person->ar_name2}} {{$person->ar_name3}} {{$person->ar_name4}}
                    {{$person->ar_name5}}</td>
            </tr>
            <tr>
                <td>National Id</td>
                <td>{{$person->national_id}}</td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td>{{$person->mobile}}</td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>plot Information</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>plot No رقم الصك</td>
                <td>{{$plot->deed_no}}</td>
            </tr>
            <tr>
                <td>plot date تاريخ الصك</td>
                <td>{{$plot->deed_date}}</td>
            </tr>

            {{-- <tr>
                <td>Mobile Number</td>
                <td>{{$plot->mobile}}</td>
            </tr> --}}
        </tbody>
    </table>


</div>
{{-- <div class="card my-5 p-2">
    <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
method="POST">
@csrf
<input type="hidden" name="create_plot" value="1">
<input type="hidden" name="national_id" value="{{$person->national_id}}">

@include('plot.forms.deed_info')
<button type="submit" class="btn btn-info btn-block my-3">{{__('next')}}</button>
</form>

</div> --}}





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection