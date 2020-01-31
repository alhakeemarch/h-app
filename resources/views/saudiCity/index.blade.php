@extends('layouts.app')
@section('title', 'saudi city index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="card">
    <h3 class="h3 text-center">
        list of all saudi cities <p class="small">total = {{ count($saudi_cities) }}</p>
    </h3>
    @if(auth()->user()->is_admin)
    <a class="btn btn-info w-75 mx-auto" href="{{ url('/saudiCity/check')}}">
        <i class=" fas fa-plus"></i>
        <span class="d-none d-md-inline-block">&nbsp; {{__('add new saudi city')}}</span>
    </a>
    @endif
    <table class="table table-hover">
        <thead class="bg-thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">city name
                    <input type="text" id='en_name' name="en_city_name_input" class="form-control" autocomplete="off"
                        required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                        onkeypress=" onlyEnglishString(event)">
                </th>
                <th scope="col"> region
                    <input type="text" id='en_region_name' name="en_region_name_input" class="form-control"
                        autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                        onkeypress=" onlyEnglishString(event)">
                </th>
                <th scope="col">اسم المدينة
                    <input type="text" id='ar_city_name' name="ar_city_name_input" class="form-control"
                        autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>
                <th scope="col"> المنطقة
                    <input type="text" id='ar_region_name' name="ar_region_name_input" class="form-control"
                        autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($saudi_cities as $city)
            <tr>
                <td scope="row">{{$i}}</td>
                <td scope=" row" class="en_city_name_input">{{$city->en_city_name}} </td>
                <td scope="row" class="en_region_name_input">{{$city->en_region_name}}</td>
                <td scope="row" class="ar_city_name_input"> {{$city->ar_city_name}}</td>
                <td scope="row" class="ar_region_name_input"> {{$city->ar_region_name}}</td>
                <td scope="row">
                    <a href="{{ url('/saudiCity/'.$city->id) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
            </tr>
            @php $i ++ @endphp
            @endforeach
        </tbody>
    </table>
</div><!-- /End of card  -->




























{{-- <div class="container-fluid text-center">
    <h1 class="h1">هنا المفترض نعرض كل المدن السعودية</h1>
    @foreach ($saudi_cities as $city)
    @php
    $obj = json_decode($city, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{$a}} : {{$b}}
</li>
@endforeach

<a class="btn btn-info btn-lg btn-block " href="{{ url('/saudiCity/'.$city->id) }}">
    <i class="far fa-eye"></i>
    Show
</a>

</ul>
<hr>
@endforeach
</div><!-- /End of container-fluid  --> --}}


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection

@section('script')
<script>

</script>
@endsection