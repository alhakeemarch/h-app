@extends('layouts.app')
@section('title', 'Finished Project')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class=" container-fluid">
    <div class="card text-center">
        @include('file_and_folder.idex_links')
    </div>
</div>

@endsection

@section('script')
<script>

</script>
@endsection