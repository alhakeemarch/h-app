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

    <table class="table table-hover">
        <thead class="bg-thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">country
                    <input type="text" id='en_name' name="en_name_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyEnglishString(event)">
                </th>
                <th scope="col">الدولة
                    <input type="text" id='ar_name' name="ar_name_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>
                <th scope="col"> code
                    <input type="text" id='code_2chracters' name="code_2chracters_input" class="form-control"
                        autocomplete="off" required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyCapitalString(event)">
                </th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($countries as $country)
            <tr>
                <td scope="row">{{$i}}</td>
                <td scope="row" class="en_name_input">{{$country->en_name}} </td>
                <td scope="row" class="ar_name_input">{{$country->ar_name}}</td>
                <td scope="row" class="code_2chracters_input"> {{$country->code_2chracters}}</td>
                <td scope="row">
                    <a href="{{ url('/country/'.$country->id) }}">
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