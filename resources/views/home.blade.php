@extends('layouts.app')
@section('title', 'home')
@section('head')
@if (true)

@endif
@endsection
@section('content')

<div class="card">
    <h2 class="h2 text-center card-header">
        {{__('app name')}}
    </h2>

    <div class="card-body">
        @if (auth()->user()->is_admin)

        <div class="visible-print text-center">
            {!! QrCode::size(100)->generate(Request::url()); !!}
            <br><br>
            {!! QrCode::format('svg')->generate('holoooo'); !!}
            <p>Scan me to return to the original page.</p>
        </div>
        @php
        $message='invoice_no = 10';
        @endphp
        {{-- <img
            src="{!!$message->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png')!!}">
        --}}



        @endif
    </div>


</div>











</div>
@endsection
{{-- // for javascript --}}
@section('script')


@endsection