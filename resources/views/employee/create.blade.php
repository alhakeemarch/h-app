@extends('layouts.app')
@section('title','employee create')
@section('content')

@php $person = $employee; @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-3">
            <h5 class="card-header">{{ __('Registration') }} of {{__('employee')}} 2/2</h5>
            <div class="card-body">
                <form action="{{ url('employee') }}" method="POST">
                    @csrf

                    @include('person.forms.ar_name')
                    {{-- --------------------------------------------------------------------------------------------- --}}
                    <div class="row">
                        {{-- --------------------------------------------------------------------------------------------- --}}
                        <div class="col-md">
                            @include('person.forms.type')
                        </div>
                        {{-- --------------------------------------------------------------------------------------------- --}}
                        <div class="col-md">
                            @include('person.forms.nationaltiy')
                        </div>
                        {{-- --------------------------------------------------------------------------------------------- --}}
                    </div>
                    {{-- --------------------------------------------------------------------------------------------- --}}
                    @include('person.forms.contact')
                    {{-- --------------------------------------------------------------------------------------------- --}}
                    @include('person.forms.job_info')
                    {{-- --------------------------------------------------------------------------------------------- --}}
                    @if(auth()->user()->is_admin)
                    @include('person.forms.notes')
                    @endif
                    {{-- --------------------------------------------------------------------------------------------- --}}
                    <button class="btn btn-info btn-block w-75 my-2 mx-auto" type="submit">{{__('submit')}}</button>
                </form>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end of card -->
    </div>
    <!-- end of col -->
</div>
<!-- end of row -->
@endsection