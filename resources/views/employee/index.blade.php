@extends('layouts.app')
@section('title','Employees index')

@section('content')

<div class="container-fluid">
    <div class="card">
        <h3 class="h3 text-center">
            list of all emplooyees <p class="small">total = {{ count($employees) }}</p>
        </h3>
        <a class="btn btn-info w-75 mx-auto" href="{{ url('/employee/check')}}">
            {{-- <i class="far fa-add"></i>  --}}
            <i class=" fas fa-plus"></i>
            <span class="d-none d-md-inline-block">&nbsp; {{__('add new employee')}}</span>
        </a>
        <table class="table table-hover">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">National ID</th>
                    <th scope="col">Mobile NO</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($employees as $employee)
                <tr>
                    <td scope="row">{{$i}}</td>
                    <td scope="row">{{$employee->ar_name1}} {{$employee->ar_name2}} {{$employee->ar_name3}}
                        {{$employee->ar_name4}}
                        {{$employee->ar_name5}}</td>
                    <td scope="row">{{$employee->national_id}}</td>
                    <td scope="row"> {{$employee->mobile}}</td>
                    <td scope="row">
                        <a href="{{ url('/employee/'.$employee->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @php $i ++ @endphp
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