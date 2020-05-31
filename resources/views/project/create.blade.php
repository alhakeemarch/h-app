@extends('layouts.app')
@section('title', 'Create Porject')
@section('content')


<div class="card">
    <h5 class="card-header">{{ __('adding new project') }}</h5>
    <div class="card-body">
        <form action="{{ route ('project.store') }}" method="POST">
            {{-- @include('project.form') --}}
            <div class="row form-group">
                <x-input name='asd' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>Owner Name</x-slot>
                    {{-- <x-slot name='tooltip'>cool tooltip</x-slot> --}}
                    {{-- <x-slot name='placeholder'>cool placeholder</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='input_class'>text-danger</x-slot> --}}
                    {{-- <x-slot name='input_id'>my_id</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                @slot('onkeypress_fun') onlyArabicString(event) @endslot --}}
                    {{-- ------------------------------------------------------- --}}
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    {{-- //// if it is disabled then it will not be required or readonly --}}
                    {{-- <x-slot name='is_disabled'>true</x-slot> --}}
                    {{-- <x-slot name='is_hidden'>true</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='input_pattern'>.{2,}</x-slot> --}}
                    {{-- ////this is for date:01-01-2020 --}}
                    {{-- <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot> --}}

                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='input_min'>5</x-slot> --}}
                    {{-- <x-slot name='input_max'>10</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    <x-slot name='input_value'>{{$person->ar_name1}} {{$person->ar_name2}} {{$person->ar_name3}}
                        {{$person->ar_name5}} </x-slot>
                    {{-- ------------------------------------------------------- --}}
                    {{-- this is main slot --}}
                </x-input>
                <x-input name='asd' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>Owner National ID</x-slot>
                    {{-- <x-slot name='tooltip'>cool tooltip</x-slot> --}}
                    {{-- <x-slot name='placeholder'>cool placeholder</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='input_class'>text-danger</x-slot> --}}
                    {{-- <x-slot name='input_id'>my_id</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                @slot('onkeypress_fun') onlyArabicString(event) @endslot --}}
                    {{-- ------------------------------------------------------- --}}
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    {{-- //// if it is disabled then it will not be required or readonly --}}
                    {{-- <x-slot name='is_disabled'>true</x-slot> --}}
                    {{-- <x-slot name='is_hidden'>true</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='input_pattern'>.{2,}</x-slot> --}}
                    {{-- ////this is for date:01-01-2020 --}}
                    {{-- <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot> --}}

                    {{-- ------------------------------------------------------- --}}
                    {{-- <x-slot name='input_min'>5</x-slot> --}}
                    {{-- <x-slot name='input_max'>10</x-slot> --}}
                    {{-- ------------------------------------------------------- --}}
                    <x-slot name='input_value'>{{$person->national_id}}</x-slot>
                    {{-- ------------------------------------------------------- --}}
                    {{-- this is main slot --}}
                </x-input>
            </div>

            <div class="row form-group">
                <x-input name='asd' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>Plot No</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$plot->plot_no}} </x-slot>
                </x-input>

                <x-input name='asd' title="">
                    <x-slot name='type'>text</x-slot>
                    <x-slot name='title'>plote Deed NO</x-slot>
                    <x-slot name='is_required'>true</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$plot->deed_no}}</x-slot>
                </x-input>

                <x-input name='asd' title="">
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