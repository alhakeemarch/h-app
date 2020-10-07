@extends('layouts.app')
@section('title', 'Plot index')
@section('content')

<div class="container-fluid text-center">
    <a class="btn btn-info w-75" href="{{ url('/plot/check')}}">
        <i class=" fas fa-plus"></i>
        <span class="d-none d-md-inline-block">&nbsp; {{__('add new ploot')}}</span>
    </a>
    <hr>
    <div class="card">
        <h3 class="h3 text-center">
            list of all plots <p class="small">total = {{ count($plots) }}</p>
        </h3>
        <table class="table table-hover">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>
                    <th scope="column">
                        <p class="pb-2">project Number</p>
                        <input type="text" name="project_no_input" class="form-control" autocomplete="off"
                            placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)">
                    </th>
                    <th scope="column">
                        <p class="pb-2">deed number</p>
                        <input type="text" name="deed_no_input" class="form-control" autocomplete="off"
                            placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)">
                    </th>
                    <th scope="column">
                        <p class="pb-2">plot number</p>
                        <input type="text" name="plot_no_input" class="form-control" autocomplete="off"
                            placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterNames(event)"
                            onkeypress=" userNameString(event)">
                    </th>

                    <th scope=" link">details
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp

                @foreach ($plots as $plot)
                <tr>
                    <td scope="row">{{$i}}</td>
                    <td scope="row" class="project_no_input">{{$plot->project->project_no ?? 'not assigned'}}</td>
                    <td scope="row" class="deed_no_input">{{$plot->deed_no }}</td>
                    <td scope="row" class="plot_no_input">{{$plot->plot_no }}</td>

                    <td scope="link">
                        <a href="{{ url('/plot/'.$plot->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    @php $i ++ @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- @foreach ($plots as $plot)
    @php
    $obj = json_decode($plot, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info w-75 " href="{{ url('/plot/'.$plot->id) }}">
        <i class="far fa-eye"></i>
        <span class="d-none d-md-inline">&nbsp; Show</span>
    </a>

    </ul>
    <hr>
    @endforeach
</div> --}}





@endsection