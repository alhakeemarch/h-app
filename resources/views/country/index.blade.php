@extends('layouts.app')
@section('title','country index')

@section('content')

<div class="card">
    <h3 class="h3 text-center">
        list of all countries <p class="small">total = {{ count($countries) }}</p>
    </h3>
    <a class="btn btn-info w-75 mx-auto" href="{{ url('/country/check')}}">
        {{-- <i class="far fa-add"></i>  --}}
        <i class=" fas fa-plus"></i>
        <span class="d-none d-md-inline-block">&nbsp; {{__('add new country')}}</span>
    </a>

    <h1 class="h1"> يفترض يعرض اسماء الدول </h1>
</div>
{{-- 
<div class="card">
    <h4 class="card-header text-center">
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
</div><!-- /End of card  -->
--}}



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection