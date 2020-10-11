<form action="{{route('project.update',$project)}}" method="POST" class=" form-group form-inline m-0 align-self-center">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="update_project_number">
    {{-- <input type="text" name="project_no" placeholder="رقم المشروع" class=" form-control m-0"> --}}
    <button type="submit" class="btn btn-link m-0">giv</button>
</form>