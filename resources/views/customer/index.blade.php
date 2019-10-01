@extends('layouts.app')
@section('title','Customers index')

@section('content')

<div class="container-fluid">
    <div class="card">
        <h4 class="card-header text-primary">
            List of Customers
        </h4>
        <table class="table table-hover">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">National ID</th>
                    <th scope="col">Mobile NO</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$customer->ar_name1}} {{$customer->ar_name2}} {{$customer->ar_name3}} {{$customer->ar_name4}}
                        {{$customer->ar_name5}}</td>
                    <td>{{$customer->national_id}}</td>
                    <td> {{$customer->mobile}}</td>
                    <td>
                        <a href="{{ url('/customer/'.$customer->id) }}">
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