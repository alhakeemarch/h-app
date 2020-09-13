<form action="{{route('file_folder.delete_file')}}" method="post" class="" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="file_name" value="{{$file}}">
    <input type="hidden" name="project_no" value="{{$project_no}}">
    <input type="hidden" name="dir_name" value="{{$project_name}}">
    <input type="hidden" name="project_location" value="{{$project_location}}">
    <input type="hidden" name="file_description" value="{{$description}}">
    <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure?')"> delete
        <i class="fas fa-trash-alt"></i></button>
</form>