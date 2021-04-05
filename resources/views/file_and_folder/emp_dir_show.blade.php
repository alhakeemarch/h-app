@extends('layouts.app')
@section('title', 'emps dir index')

@section('head')
{{-- // for css --}}
@endsection
@section('content')

<div class="container-fluid">
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card">
        <h3 class="h3 text-center">
            <p>folder content for</p>
            <p>{{$dir_name}} </p>
            <p class="small">total = {{ count($dir_content) }}</p>
        </h3>
        <table class="table table-bordered table-hover">
            <thead class="bg-thead">
                <th>اسم الملف</th>
                <th>إجراءات</th>
            </thead>
            <tbody>
                @foreach ($dir_content as $file)
                <tr>
                    <td>{{$file}}</td>
                    <td>
                        @if (!is_dir($dir_path . '/' . $file) )
                        <form action="{{ route('file_folder.download_file') }}" method="POST"
                            enctype="multipart/form-data" class="container">
                            <input type="hidden" name="form_action" value="download_doc">
                            @csrf
                            <input type="hidden" name="file_name" value="{{$file}}">
                            <input type="hidden" name="dir_name" value="{{$dir_name}}">
                            <input type="hidden" name="project_location" value="emp_dir">
                            <input type="hidden" name="dir_path" value="{{$dir_path}}">
                            <x-btn btnText='download'>
                                <x-slot name='is_btn_link'>true</x-slot>
                            </x-btn>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{route('file_folder.emps_dir')}}" method="get" class="m-4">
            <x-btn btnText='back'></x-btn>
        </form>
    </div><!-- /End of card  -->
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
</div><!-- /End of container-fluid  -->




@endsection

@section('script')
<script>

</script>
@endsection