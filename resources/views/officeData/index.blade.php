@extends('layouts.app')
@section('title', 'office data')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="card">
    <h3 class="card-header d-flex justify-content-between">
        <span>office information</span>
        <span>بيانات المكتب</span>
        {{-- list of all offices in the app <p class="small">total = {{ count($offices) }}</p> --}}
    </h3>
    <div class="card-body">

    </div>

</div><!-- /End of card  -->




























<div class="container-fluid text-center">
    <h1 class="h1">هنا المفترض نعرض كل المكاتب</h1>
    @foreach ($offices as $office)
    @php
    $obj = json_decode($office, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{$a}} : {{$b}}
        </li>
        @endforeach

        <a class="btn btn-info btn-lg btn-block " href="{{ url('/officeData/'.$office->id) }}">
            <i class="far fa-eye"></i>
            Show
        </a>

    </ul>
    <hr>
    @endforeach
</div><!-- /End of container-fluid  -->




@endsection

@section('script')
<script>

</script>
@endsection