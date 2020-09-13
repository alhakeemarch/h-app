@extends('layouts.app')
@section('title', 'new project 3/x')
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


</div>
<div class="card my-5 p-2">

    <form class="form-group" action="{{ action('ProjectController@new_project') }}" accept-charset="UTF-8"
        method="POST">
        @csrf
        <input type="hidden" name="check_deed_form" value="1">
        <input type="hidden" name="national_id" value="{{$person->national_id}}">

        <label for="deed_no">{{__( 'deed number')}} <span class="small text-danger">({{__('required')}})</span>
            :</label>
        <input type="text" name="deed_no" class="form-control mb-3 @error ('deed_no') is-invalid @enderror" required
            placeholder="{{__( 'enter deed number...')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'enter deed number...')}}..'">
        @error('deed_no')
        <small class="text-danger"> {{$errors->first('deed_no')}} </small>
        @enderror
        <button type="submit" class="btn btn-info btn-block my-3">{{__('next')}}</button>

    </form>

</div>





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection