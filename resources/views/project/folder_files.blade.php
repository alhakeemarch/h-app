{{-- {{dd($project_content)}} --}}
<div class="card">
    <div class=" card-header mb-4">
        this projects files and folders
    </div>
    @php
    $doc_dir = $project_dir = '#';
    @endphp
    {{-- ---------------------------------- --}}
    @foreach ($project_content as $files => $data)
    @if ($data== 'main_dir')
    @php $project_dir = $files; @endphp
    @endif
    @if ($data== 'doc_dir')
    @php $doc_dir = $files; @endphp
    @endif
    @endforeach
    {{-- ---------------------------------- --}}
    <!-- ============================================================================================================ -->
    @if ($project_location == 'e_archive' || $project_location == 'safty' || $project_location == 'central_area')
    @foreach ($project_content as $file => $data)
    @if($data === 'dir')
    <span class="list-group-item">{{$file}} | <i class="fa fa-folder-open"></i></span>
    @elseif (!($data === 'main_dir'||$data === 'doc_dir'))
    <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
        enctype="multipart/form-data" class="container">
        @csrf
        <input type="hidden" name="file_name" value="{{$file}}">
        <input type="hidden" name="project_no" value="{{$project_no}}">
        <input type="hidden" name="dir_name" value="{{$project_name}}">
        <input type="hidden" name="project_location" value="{{$project_location}}">
        {{-- to prevent showing financial data to users --}}
        @if (substr("$file", strlen($file)-4, 4)== 'xlsm' || strpos($file, 'قد ')|| strpos($file, 'سع'))
        @if(auth()->user()->is_manager)
        <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        @else
        <li class="list-group-item">{{$file}}</li>
        @endif
        @else
        <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        @endif
        {{-- ------------------------------------------ --}}
    </form>
    @endif
    @endforeach
    <!-- ============================================================================================================ -->
    @elseif($project_location == 'safty'&& false)
    <h1>safty</h1>
    @else



    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> All Project | كامل المشروع </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'all')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> Documents | مستندات </li>
        @foreach ($project_content as $file => $data)

        @if ($data=== 'dir_in_doc')
        <li class="list-group-item"><i class="fas fa-arrow-right"></i> | {{$file}} | <i class="fa fa-folder-open"></i>
        </li>

        @elseif(substr($data,0,3) == 'doc'||substr($data,0,3) =='img'||substr($data,0,3) == 'row')
        @if (!($data === 'doc_dir'))
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name.'/01 - Documents'}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">

            @if (substr("$file", strlen($file)-4, 4)== 'xlsm' || strpos($file, 'قد ')|| strpos($file, 'سع'))
            @if(auth()->user()->is_manager)
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
            @else
            <li class="list-group-item">{{$file}}</li>
            @endif
            @else
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
            @endif

        </form>
        @endif
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> Concepts | افكار </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'con')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> preliminary | ابتدائي </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'pre')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> Architectures | معماري </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'arc')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> Structures | انشائي </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'str')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> DR & WS | صحي </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,2) == 'dr'||substr($data,0,2) == 'ws' )
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> HVAC | تكيف </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'hva' )
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> electric | كهرباء </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'ele')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> FF & FA & evacuation| دفاع مدني </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,2) == 'ff' || substr($data,0,2) == 'fa'|| substr($data,0,3) == 'eva')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> tourism | سياحة </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'tou')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> survey | مساحة </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'sur')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> not_uplod | لم يتم رفعه بالنظام </li>
        @foreach ($project_content as $file => $data)
        @if ($data == 'not_uplod')
        <form action="{{ route('project.download_file') }}" method="POST" class="list-group-item align-content-lg-start"
            enctype="multipart/form-data" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
        </form>
        @endif
        @endforeach
    </ul>
    <ul class="list-group">
        <li class="list-group-item bg-info text-center"> Folder | مجلد </li>
        @foreach ($project_content as $file => $data)
        @if (substr($data,0,3) == 'dir')
        <li class="list-group-item">{{$file}} | <i class="fa fa-folder-open"></i></li>
        @endif
        @endforeach
    </ul>
    {{-- <ul class="list-group">
        <li class="list-group-item bg-info text-center"> not_uplod </li>
        @foreach ($project_content as $file => $data)
        {{$file}}:|{{$data}}<br>
    @if (substr($data,0,3) == 'not')
    <a class="" href="{{$running_project_ftp.$project_name.'/'.$file}}" download>
        <li class="list-group-item">{{$file}}</li>
    </a>
    @endif
    @endforeach
    </ul> --}}
</div>
@endif