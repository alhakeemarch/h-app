@extends('layouts.app')
@section('title', 'contract index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid card-body">
    <table class="table table-hover table-bordered">
        <thead class="bg-thead">
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th>
                    <p>id</p>
                </th>
                <th scope="col">
                    <p>contract number</p>
                    <x-search_input name='table_name' />
                </th>
                <th scope="col">
                    <p>contract type</p>
                    <x-search_input name='action' />
                </th>
                <th scope="col">
                    <p>project number</p>
                    <x-search_input name='user' />
                </th>
                <th scope="col">
                    <p>project name</p>
                    <x-search_input name='user' />
                </th>
                <th scope="col">
                    <p>created by</p>
                    <x-search_input name='description' />
                </th>

                <th scope="link">details</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($contracts as $contract)
            <tr>
                {{-- <td scope="row">{{$i}}</td> --}}
                <td class="id">{{$contract->id}}</td>
                <td class="action">{{$contract->contract_no}}</td>
                <td class="description">{{$contract->contract_type()->first()->name_ar}}</td>
                <td class="table_name">{{$contract->project_id}}</td>
                <td class="table_name">{{$contract->project()->first()->project_name_ar}}</td>
                <td class="user">{{$contract->created_by_name}}</td>

                <td scope="link">
                    <a href="{{ route('contract.show',$contract) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
            </tr>
            @php $i ++ @endphp
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

@section('script')
{{-- // for javascript --}}
@endsection