@extends('layouts.app')
@section('title','Customers index')

@section('content')
<div class="card">
    <h3 class="h3 text-center">
        list of all customer <p class="small">total = {{ count($customers) }}</p>
    </h3>
    <a class="btn btn-info w-75 mx-auto" href="{{ url('/customer/check')}}">
        {{-- <i class="far fa-add"></i>  --}}
        <i class=" fas fa-plus"></i>
        <span class="d-none d-md-inline-block">&nbsp; {{__('add new customer')}}</span>
    </a>
    <table class="table table-hover">
        <thead class="bg-thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name
                    <input type="text" id='ar_name' name="ar_name_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>
                <th scope="col">National ID
                    <input type="text" id='national_id' name="national_id_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyNumber(event)">
                </th>
                <th scope="col">Mobile NO
                    <input type="text" id='mobile' name="mobile_input" class="form-control" autocomplete="off" required
                        placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyNumber(event)">
                </th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($customers as $customer)
            <tr>
                <td scope="row">{{$i}}</td>
                <td scope="row" class="ar_name_input">{{$customer->ar_name1}} {{$customer->ar_name2}}
                    {{$customer->ar_name3}}
                    {{$customer->ar_name4}}
                    {{$customer->ar_name5}}</td>
                <td scope="row" class="national_id_input">{{$customer->national_id}}</td>
                <td scope="row" class="mobile_input"> {{$customer->mobile}}</td>
                <td scope="row">
                    <a href="{{ url('/customer/'.$customer->id) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
            </tr>
            @php $i ++ @endphp
            @endforeach
        </tbody>
    </table>
</div><!-- /End of card  -->



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection