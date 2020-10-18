<form action="{{route('project.update',$project)}}" method="POST" class=" form-group m-0 row">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="add_plot_to_project">
    <div class="col-9 my-1">
        @include('plot.forms.deed_no')
    </div>
    <button type="submit" class="btn btn-link m-0 col">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>