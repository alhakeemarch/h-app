<form action="{{ route('project.download_file') }}" method="POST" class="" enctype="multipart/form-data"
    class="container">
    @csrf
    <input type="hidden" name="file_name" value="{{$file}}">
    <input type="hidden" name="project_no" value="{{$project_no}}">
    <input type="hidden" name="dir_name" value="{{$project_name}}">
    <input type="hidden" name="project_location" value="{{$project_location}}">
    <button type="submit" class="btn  btn-link">{{$file}} | <i class="fas fa-file-download"></i></button>
</form>