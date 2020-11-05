@if (isset($project_folders['running project']))
<form action="{{route('file_folder.showUplodeView')}}" method="get">
    <input type="hidden" name="project_no" value={{$project_folders['running project']['project_no']}}>
    <input type="hidden" name="project_name" value="{{$project_folders['running project']['project_name']}}">
    <input type="hidden" name="project_location" value="running project">
    <button type="submit" class="btn btn-link m-0">
        <span>{{__('running')}} |</span>
        <i class="far fa-folder-open"></i>
    </button>
</form>
@endif
@if (isset($project_folders['finished project']))
<form action="{{route('file_folder.showUplodeView')}}" method="get">
    <input type="hidden" name="project_no" value={{$project_folders['finished project']['project_no']}}>
    <input type="hidden" name="project_name" value="{{$project_folders['finished project']['project_name']}}">
    <input type="hidden" name="project_location" value="finished project">
    <button type="submit" class="btn btn-link m-0">
        <span>{{__('finish')}} |</span>
        <i class="far fa-folder-open"></i>
    </button>
</form>
@endif