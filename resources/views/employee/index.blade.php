@extends('layouts.app')
@section('title','Employees index')

@section('content')

<div class="container-fluid">
    <div class="card">
        <h3 class="h3 text-center card-header">
            list of all emplooyees <p class="small">total = {{ count($employees) }}</p>
        </h3>
        <a class="btn btn-info w-75 mx-auto" href="{{ url('/employee/check')}}">
            <i class=" fas fa-plus"></i>
            <span class="d-none d-md-inline-block">&nbsp; {{__('add new employee')}}</span>
        </a>
        <table class="table table-hover">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee Name
                        <input type="text" id='ar_name' name="ar_name_input" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="col">National ID
                        <input type="text" id='national_id' name="national_id_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">
                    </th>
                    <th scope="col">Mobile NO
                        <input type="text" id='mobile' name="mobile_input" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">
                    </th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($employees as $employee)
                <tr>
                    <td scope="row">{{$i}}</td>
                    <td scope=" row" class="ar_name_input">{{$employee->ar_name1}} {{$employee->ar_name2}}
                        {{$employee->ar_name3}}
                        {{$employee->ar_name4}}
                        {{$employee->ar_name5}}</td>
                    <td scope="row" class="national_id_input">{{$employee->national_id}}</td>
                    <td scope="row" class="mobile_input"> {{$employee->mobile}}</td>
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


@endsection