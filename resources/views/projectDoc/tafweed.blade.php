@extends('layouts.print')
@section('title', 'تفويض')
@section('content')
{{-- <div class="page" style="height: 2.97cm; width:0.21cm;"> --}}
{{-- <div class="page content" style="height: 1200px; width:800px;"> --}}
<div class="page container-fluid">
    <header>
        {{-- <img src="{{URL::asset('/img/header.jpg')}}" alt="hedder" style="height: auto; width: 800px;"> --}}
        {{-- <img src="{{URL::asset('/img/header.jpg')}}" alt="hedder" class=" w-100"> --}}
    </header>
    <footer>
        {{-- <img src="{{URL::asset('/img/footer.jpg')}}" alt="hedder" style="height: auto; width: 800px;"> --}}
        {{-- <img src="{{URL::asset('/img/footer.jpg')}}" class=" w-100"> --}}
    </footer>
    <main>

        <p>page1</p>
        <p>page2</p>
    </main>

</div>

<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection