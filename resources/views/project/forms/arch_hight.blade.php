<form action="{{route('project.update',$project)}}" method="POST" class=" form-group m-0 row">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="update_project_arch_hight">
    <div class="col-9 my-1">
        <x-input name='project_arch_hight' title="">
            <x-slot name='title'>{{__( 'required height')}}</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_value'>{{old('str_hight')}}</x-slot>
        </x-input>
    </div>
    <button type="submit" class="btn btn-link m-0 col">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>