<form action="{{route('project.update',$project)}}" method="POST" class=" form-group m-0 row">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="update_required_use_type">
    <div class="col-9 my-1">
        <x-input name='update_type' title="">
            <x-slot name='title'>{{__( 'required use')}}</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_value'>{{old('update_type')}}</x-slot>
        </x-input>
    </div>
    <button type="submit" class="btn btn-link m-0 col">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>