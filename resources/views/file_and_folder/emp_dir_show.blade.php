{{-- {{dd('1')}} --}}
@extends('layouts.app')
@section('title', 'emps dir index')

@section('head')
{{-- // for css --}}
@endsection
@section('content')
<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
<div class="container-fluid">
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card">
        <h3 class="h3 text-center">
            <p>folder content for</p>
            <p>{{$dir_name}} </p>
            <p class="small">total = {{ count($dir_content) }}</p>
        </h3>
        <ul class="list-group">
            @foreach ($dir_content as $file)
            <li class="list-group-item d-flex justify-content-between">
                <form action="{{ route('fiel_folder.download_file') }}" method="POST" enctype="multipart/form-data"
                    class="container">
                    @csrf
                    <input type="hidden" name="file_name" value="{{$file}}">
                    <input type="hidden" name="dir_name" value="{{$dir_name}}">
                    <input type="hidden" name="dir_path" value="{{$dir_path}}">
                    <button type="submit" class="">{{$file}} | <i class="btn btn-primary fas fa-file-download">
                            download</i></button>
                </form>
            </li>
            @endforeach
        </ul>
    </div><!-- /End of card  -->
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
</div><!-- /End of container-fluid  -->




@endsection

@section('script')
<script>

</script>
@endsection