@extends('layouts.app')
@section('title', 'Create Porject')
@section('content')

<div class="card">
    <h5 class="card-header">{{ __('adding new project') }}</h5>
    <div class="card-body">
        <form action="{{ route ('project.store') }}" method="POST">
            @csrf
            <div class="row form-group">
                <x-input name='person_name' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>Owner Name</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>
                        {{$person->ar_name1}} {{$person->ar_name2}} {{$person->ar_name3}} {{$person->ar_name5}}</x-slot>
                </x-input>
                <x-input name='national_id' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>Owner National ID</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$person->national_id}}</x-slot>
                </x-input>
                <x-input name='mobile' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>Owner National ID</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$person->mobile}}</x-slot>
                </x-input>
            </div>
            <div class="row form-group">
                <x-input name='plot_no' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>Plot No</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$plot->plot_no}} </x-slot>
                </x-input>
                <x-input name='deed_no' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>plote Deed NO</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$plot->deed_no}}</x-slot>
                </x-input>
                <x-input name='area' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>plote aria</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$plot->area}}</x-slot>
                </x-input>
            </div>
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