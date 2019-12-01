@extends('layouts.app')
@section('title', 'saudi city index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="container-fluid text-center">
    <h1 class="h1">هنا المفترض نعرض كل المدن السعودية</h1>
    @foreach ($saudi_cities as $city)
    @php
    $obj = json_decode($city, TRUE);
    @endphp
    <ul class="">
        @foreach ($city as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
        </li>
        @endforeach

        <a class="btn btn-info btn-lg btn-block " href="{{ url('/saudiCity/'.$city->id) }}">
            <i class="far fa-eye"></i>
            Show
        </a>

    </ul>
    <hr>
    @endforeach
</div><!-- /End of container-fluid  -->


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection

@section('script')
<script>

</script>
@endsection