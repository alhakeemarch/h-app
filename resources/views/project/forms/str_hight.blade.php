<form action="{{route('project.update',$project)}}" method="POST" class=" form-group m-0 d-flex flex-column">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="update_project_str_hight">
    <input type="text" name="str_hight" placeholder="الإرتفاع الإنشائي المطلوب" class="form-control m-0">
    <button type="submit" class="btn btn-link m-0 align-self-end">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>