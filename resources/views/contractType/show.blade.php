@extends('layouts.app')
@section('title','show contract type')

@section('content')


<div class="card my-5">
    <h2 class="card-header bg-danger">
        To delet *** this is in contractTypes show
    </h2>
    @php
    $obj = json_decode($contractType, TRUE);
    @endphp
    <ul class="card-body">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach
    </ul>
</div>



<hr>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/contractType') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        <a href="{{ url('/contractType/'.$contractType->id.'/edit') }}" class="btn btn-info btn-lg
        btn-block "> <i class="fas fa-pen"></i> Edit</a>
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('contractType.destroy', $contractType) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
        </form>
    </div>

</div>



@endsection