@extends('layouts.app')
@section('title', 'Create Porject')
@section('content')


<div class="card">
    {{$person->id}}
    {{$plot->id}}

    <!-- ///////////////////////////////-->
    <h5 class="card-header">{{ __('adding new project') }}</h5>
    <div class="card-body">
        <form action="{{ route ('project.store') }}" method="POST">
            {{-- @include('project.form') --}}

            <div class="row text-center">
                <div class="col-6">
                    <button type="submet" class="btn btn-info w-75">
                        <i class="fas fa-check"></i>
                        <span class="d-none d-md-inline-block">&nbsp; create</span>
                    </button>
                </div>
                <div class="col-6">
                    <a href="{{ URL::previous() }}" class="btn btn-info w-75">
                        <i class="fas fa-undo-alt"></i>
                        <span class="d-none d-md-inline-block">&nbsp; cancel</span>
                    </a>
                </div>
            </div>

        </form>
    </div>
    <div class="card-footer text-muted text-center ">
        © Adding New project Form..
    </div>
    <!-- ///////////////////////////////-->
    @if ($errors->any())
    @include('layouts.errors')
    @endif
    <!-- ///////////////////////////////-->

</div>
<!-- end card-body -->

@endsection