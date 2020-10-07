@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')


@include('project.folder_files')

@endsection

@section('script')
{{-- // for javascript --}}
<script type="text/javascript">
</script>
@endsection