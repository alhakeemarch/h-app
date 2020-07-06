@extends('layouts.app')
@section('title', 'project edit')
@section('content')

<div class="card ">
    <h5 class="card-header">{{ __('Edit a projecte') }}</h5>
    <div class="card-body">
        <form action="{{ route ('project.update',$project) }}" method="POST">
            @method('PUT')
            @csrf
            {{-- //////////////////////////////////////////////////////////////////////// --}}
            <h1> this is show project view</h1>

            @php
            $obj = json_decode($project, TRUE);
            @endphp
            <ul class="card-body">
                @foreach ($obj as $a=>$b )
                <li>
                    {{ $a}} : {{$b}}
                </li>
                @endforeach
            </ul>
            {{-- //////////////////////////////////////////////////////////////////////// --}}









            {{-- @include('project.forms.form') --}}
            <div class="row">
                <div class="col-6">
                    <button type="submet" name="submet" id="submet" class="btn btn-info btn-block">Update</button>
                </div>
                <div class="col-6">
                    <a href="{{ url('/project/'.$project->id) }}" class="btn btn-info btn-block">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    <div class="card-footer text-muted text-center ">
        © Editing project Form..
    </div>
</div>









</div>










<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection