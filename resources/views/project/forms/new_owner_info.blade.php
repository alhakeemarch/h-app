<form action="{{route('project.update',$project)}}" method="POST"
    class=" form-group m-0 row d-flex justify-content-between">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="change_owner_info">
    <x-select_searchable name='owner_type_id' title="{{__('type')}}" :resource=$project :list=$owner_types>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>type_ar</x-slot>
        <x-slot name='resource_field'>owner_type_id</x-slot>
    </x-select_searchable>
    <x-input name='owner_national_id' title="">
        <x-slot name='title'>{{__('nId')}}</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$project->owner_national_id}}</x-slot>
    </x-input>
    <button type="submit" class="btn btn-link m-0 p-0 align-self-end">{{__('update')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>