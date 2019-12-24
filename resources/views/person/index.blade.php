@extends('layouts.app')
@section('title','index view')

@section('content')

<div class="container-fluid">
    <div class="card">
        <h3 class="h3 text-center">
            list of all persons <p class="small">total = {{ count($persons) }}</p>
        </h3>
        <a class="btn btn-info w-75 mx-auto" href="{{ url('/person/check')}}">
            {{-- <i class="far fa-add"></i>  --}}
            <i class=" fas fa-plus"></i>
            <span class="d-none d-md-inline-block">&nbsp; {{__('add new person')}}</span>
        </a>
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
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
                    <td scope="row">{{$i}}</td>
                    <td>{{$person->ar_name1}} {{$person->ar_name2}} {{$person->ar_name3}} {{$person->ar_name4}}
                        {{$person->ar_name5}}</td>
                    <td>{{$person->national_id}}</td>
                    <td> {{$person->mobile}}</td>
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

<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection