@extends('layouts.app')
@section('title', 'nationality show')
@section('content')

<div class="row">
    <div class="col">
        <h1 class="h1">nationality info</h1>
        @php
        $obj = json_decode($nationality, TRUE);
        @endphp
        <ul class="card-body">
            @foreach ($obj as $a=>$b )
            <li>
                {{ $a}} : {{$b}}
            </li>
            @endforeach
        </ul>
    </div>
    {{-- //////////////////////////////////////////////////////////////////// --}}
    <div class="col">
        <h1 class="h1">nationality created by</h1>
        @php
        $obj2 = json_decode($created_by, TRUE);
        @endphp
        <ul class="card-body">

            @foreach ($obj2 as $a=>$b )
            <li>
                {{ $a}} : {{$b}}
            </li>
            @endforeach
        </ul>
    </div>
    {{-- //////////////////////////////////////////////////////////////////// --}}
    @if ($last_updated_by)
    <div class="col">
        <h1 class="h1">nationality updated by:</h1>
        @php
        $obj3 = json_decode($last_updated_by, TRUE);
        @endphp
        <ul class="card-body">

            @foreach ($obj3 as $a=>$b )
            <li>
                {{ $a}} : {{$b}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- //////////////////////////////////////////////////////////////////// --}}
</div>





<hr>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/nationality') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i> back</a>
    </div>
    <div class="col-4">
        <a href="{{ url('/nationality/'.$nationality->id.'/edit') }}" class="btn disabled btn-info btn-lg
        btn-block "> <i class="fas fa-pen"></i> Edit</a>
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('nationality.destroy', $nationality) }}" method="POST">
            @method('DELETE')
            @csrf
            <button disabled class="btn disabled btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
        </form>
    </div>

</div>












<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection