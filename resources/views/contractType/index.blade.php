@extends('layouts.app')
@section('title','contract type index')

@section('content')


<div class="card">
    <h3 class="h3 text-center">
        list of all contract type <p class="small">total = {{ count($contract_types) }}</p>
    </h3>
    <a class="btn btn-info w-75 mx-auto" href="{{route('contractType.create')}}">
        <i class=" fas fa-plus"></i>
        <span class="d-none d-md-inline-block">&nbsp; {{__('add new contract type')}}</span>
    </a>
    <table class="table table-hover">
        <thead class="bg-thead">
            <tr>
                <th scope="col">id</th>
                <th scope="col">contract Name
                    <x-search_input name='ar_name_input' />
                </th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contract_types as $contract_type)
            <tr>
                <td scope="row">{{$contract_type->id}}</td>
                <td scope=" row" class="ar_name_input">{{$contract_type->name_ar}}</td>
                <td scope="row">
                    <a href="{{ url('/contractType/'.$contract_type->id) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection