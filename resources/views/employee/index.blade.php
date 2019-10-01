@extends('layouts.app')
@section('title','Employees index')

@section('content')

<div class="container-fluid">
    <div class="card">
        <h4 class="card-header text-primary">
            List of Employees
        </h4>
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
                    <th scope="row">{{$i}}</th>
                    <td>{{$employee->ar_name1}} {{$employee->ar_name2}} {{$employee->ar_name3}} {{$employee->ar_name4}}
                        {{$employee->ar_name5}}</td>
                    <td>{{$employee->national_id}}</td>
                    <td> {{$employee->mobile}}</td>
                    <td>
                        <a href="{{ url('/employee/'.$employee->id) }}">
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