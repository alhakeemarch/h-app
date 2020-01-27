@extends('layouts.app')
@section('title', 'account edit')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="card">
    <form action="{{ route ('user.update',$user) }}" class="card-body" method="POST">
        @csrf
        @method('PUT')
        @include('user.forms.form')
        {{-- --------------------------------------------------------- START: buttons - --}}
        <div class="row text-center">
            <div class="col-md-6">
                <button type="submet" class="btn btn-info w-75">
                    <i class="fas fa-check"></i>
                    <span class="d-none d-md-inline-block">&nbsp; {{__('change')}}</span>
                </button>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/') }}" class="btn btn-info w-75">
                    <i class="fas fa-undo-alt"></i>
                    <span class="d-none d-md-inline-block">&nbsp; cancel</span>
                </a>
            </div>
        </div>
        {{-- --------------------------------------------------------- END: buttons - --}}
    </form>
</div>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
@endsection