@extends('layouts.app')
@section('title','index view')

@section('content')

<div class="container-fluid">
    <div class="card">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">National ID</th>
                    <th scope="col">Mobile NO</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                    @php $i=1 @endphp
                    @foreach ($persons as $person)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$person->ar_name1}} {{$person->ar_name2}} {{$person->ar_name3}} {{$person->ar_name4}} {{$person->ar_name5}}</td>
                        <td>{{$person->national_id}}</td>
                        <td> $person->Mobile NO</td>
                        <td>
                            <a href="{{ url('/person/'.$person->id) }}">    
                            <i class="far fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @php $i ++ @endphp
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div><!-- /End of container-fluid  -->
</div><!-- /End of container-fluid  -->


    @endsection
