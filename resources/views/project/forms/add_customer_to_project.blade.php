<form action="{{route('project.update',$project)}}" method="POST" class=" form-group m-0 row">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="add_customer_to_project">
    <div class="col-9 my-1">
        @include('person.forms.check_n_id')
    </div>
    <button type="submit" class="btn btn-link m-0 col">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>