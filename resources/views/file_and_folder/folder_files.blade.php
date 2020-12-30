{{-- {{dd($project_content)}} --}}
<div class="card">
    <div class=" card-header d-flex justify-content-between mb-4">
        <span>this projects files and folders</span>
        <span>ملفات ومجلدات بالمشروع</span>
    </div>
    @php
    $doc_dir = $project_dir = '#';
    @endphp
    {{-- ---------------------------------- --}}
    @foreach ($project_content as $files => $description)
    @if ($description== 'main_dir')
    @php $project_dir = $files; @endphp
    @endif
    @if ($description== 'doc_dir')
    @php $doc_dir = $files; @endphp
    @endif
    @endforeach
    {{-- ---------------------------------- --}}
    <!-- ============================================================================================================ -->
    @if ($project_location == 'e_archive' || $project_location == 'safty' || $project_location == 'central_area')
    @foreach ($project_content as $file => $description)
    @if($description === 'dir')
    <span class="list-group-item">{{$file}} | <i class="fa fa-folder-open"></i></span>
    @elseif (!($description === 'main_dir'||$description === 'doc_dir'))
    <div class="list-group-item d-flex justify-content-between">

        <form action="{{ route('file_folder.download_file') }}" method="POST" class=""
            enctype="multipart/form-description" class="container">
            @csrf
            <input type="hidden" name="file_name" value="{{$file}}">
            <input type="hidden" name="project_no" value="{{$project_no}}">
            <input type="hidden" name="dir_name" value="{{$project_name}}">
            <input type="hidden" name="project_location" value="{{$project_location}}">
            {{-- to prevent showing financial description to users --}}
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
        @include('file_and_folder.delete_file_form')
    </div>
    @endif
    @endforeach
    <!-- ============================================================================================================ -->
    @elseif($project_location == 'safty'&& false)
    <h1>safty</h1>
    @else
    {{-- --------------------------------------------------------------------------------------------- --}}
    @if (in_array ('all',$project_content))
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> All Project | كامل المشروع </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'all')
        <li class="list-group-item d-flex justify-content-between">
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        </li>
        @endif
        @endforeach
    </ul>
    @endif
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- @if (in_array ('all',$project_content)) --}}
    <ul class="list-group">
        <li class="list-group-item  text-center bg-light-blue"> Documents | مستندات </li>
        @foreach ($project_content as $file => $description)

        @if ($description === 'dir_in_doc')
        <li class="list-group-item"><i class="fas fa-arrow-right"></i> | {{$file}} | <i class="fa fa-folder-open"></i>
        </li>

        @elseif(substr($description,0,3) == 'doc'||substr($description,0,3) =='img'||substr($description,0,3) == 'row')
        @if (!($description === 'doc_dir'))
        <li class="list-group-item d-flex justify-content-between">
            <form action="{{ route('file_folder.download_file') }}" method="POST" class=""
                enctype="multipart/form-description" class="container">
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
        {{-- deleting form --}}
        @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endif
        @endforeach
    </ul>
    {{-- @endif --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> Concepts | افكار </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'con')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> preliminary | ابتدائي </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'pre')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> Architectures | معماري </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'arc')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> Structures | انشائي </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'str')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> DR & WS | صحي </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,2) == 'dr'||substr($description,0,2) == 'ws' )
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> HVAC | تكيف </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'hva' )
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> electric | كهرباء </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'ele')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> FF & FA & evacuation| دفاع مدني </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,2) == 'ff' || substr($description,0,2) == 'fa'|| substr($description,0,3) == 'eva')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> tourism | سياحة </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'tou')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> survey | مساحة </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'sur')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> not_uplod | لم يتم رفعه بالنظام </li>
        @foreach ($project_content as $file => $description)
        @if ($description == 'not_uplod')
        <li class="list-group-item d-flex justify-content-between">
            @include('file_and_folder.download_file_form')
            @include('file_and_folder.delete_file_form')
        </li>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> Folder | مجلد </li>
        @foreach ($project_content as $file => $description)
        @if (substr($description,0,3) == 'dir')
        @php
        // dd(url($project_name));
        // dd(explode('?', $project_name, 2));
        // dd(urldecode(explode('?', $project_name, 2)));
        // dd(urlencode ('م'));
        // dd(urldecode($project_name));
        @endphp
        <a target='_blank' href="{{$ftp}}/{{$project_location}}/{{ $project_name}}/{{$file}}"
            class="btn btn-link list-group-item text-left">{{$file}} |
            <i class="fa fa-folder-open"> </i> </a>
        @endif
        @endforeach
    </ul>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- <ul class="list-group">
        <li class="list-group-item bg-light-blue text-center"> not_uplod </li>
        @foreach ($project_content as $file => $description)
        {{$file}}:|{{$description}}<br>
    @if (substr($description,0,3) == ' not') <a class="" href="{{$running_project_ftp.$project_name.'/'.$file}}"
        download>
        <li class="list-group-item">{{$file}}</li>
    </a>
    @endif
    @endforeach
    </ul> --}}
</div>
@endif