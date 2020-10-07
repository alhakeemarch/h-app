@extends('layouts.app')
@section('title','index view')

@section('content')

<div class="container-fluid">
    <div class="card">
        <h3 class="h3 text-center">
            list of all persons <p class="small">total = {{ count($persons) }}</p>
        </h3>
        <a class="btn btn-info w-75 mx-auto" href="{{ url('/person/check')}}">
            <i class=" fas fa-plus"></i>
            <span class="d-none d-md-inline-block">&nbsp; {{__('add new person')}}</span>
        </a>
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name
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
                @foreach ($persons as $person)
                <tr>
                    <td scope="row">{{$i}}</td>
                    <td scope=" row" class="ar_name_input">{{$person->ar_name1}} {{$person->ar_name2}}
                        {{$person->ar_name3}} {{$person->ar_name4}}
                        {{$person->ar_name5}}</td>
                    <td scope="row" class="national_id_input">{{$person->national_id}}</td>
                    <td scope="row" class="mobile_input"> {{$person->mobile}}</td>
                    <td>
                        <a href="{{ url('/person/'.$person->id) }}">
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


@endsection