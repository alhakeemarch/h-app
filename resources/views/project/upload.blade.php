@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="card">
    project_no => {{$project_no}}, <br>
    project_name => {{$project_name}}, <br>
    project_location => {{$project_location}}, <br>
    employment_no => {{$employment_no}}, <br>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf



        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>




        <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        <button type="submit" class="btn btn-block btn-info">UpLoade</button>
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