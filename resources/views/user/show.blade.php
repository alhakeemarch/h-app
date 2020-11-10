@extends('layouts.app')
@section('title', 'user show')
@section('content')

<h1> this is show user view</h1>

@php
$obj = json_decode($user, TRUE);
@endphp
<ul class="card-body">
    @foreach ($obj as $a=>$b )
    @if ($a == 'pass_char')
    @if (auth()->user()->id == 1)
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endif
    @php continue; @endphp
    @endif
    <li>
        {{ $a}} : {{$b}}
    </li>
    @endforeach
</ul>
<hr>
<div class="row d-flex justify-content-center">
    <div class="col-4">
        <a href="{{ url('/user') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-undo"></i>
            back</a>
    </div>
    <div class="col-4">
        @if (auth()->user()->is_admin)
        <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-info btn-lg
            btn-block "> <i class="fas fa-pen"></i> Edit</a>
        @else
        <a href="#" class="btn disabled btn-info btn-lg
            btn-block "> <i class="fas fa-pen"></i> Edit</a>
        @endif
    </div>
    <div class="col-4">
        <form class="delete" action="{{ route('user.destroy', $user) }}" method="POST">
            @method('DELETE')
            @csrf
            <button disabled class="btn disabled btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash"></i> Delete</button>
        </form>
    </div>

</div>



@endsection