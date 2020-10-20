<div class="card col-lg my-3">
    <h3 class="card-header">representative info</h3>
    <div class="card-body">
        <form action="{{route('project.update',$project)}}" method="POST" class=" form-group">
            @csrf
            @method('PATCH')
            <input type="hidden" name="form_action" value="update_representative_info">
            <div class="row">
                <x-input name='representative_id' title="">
                    <x-slot name='title'>representative_id</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    @if (!auth()->user()->is_admin)
                    <x-slot name='is_hidden'>true</x-slot>
                    @endif
                    <x-slot name='input_value'>{{$project->representative_id}}</x-slot>
                </x-input>
                <x-input name='representative_national_id' title="">
                    <x-slot name='title'>representative_national_id</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->representative_national_id}}</x-slot>
                </x-input>
                <x-select_searchable name='representative_type_id' title="representative type" :resource=$project
                    :list=$representative_types>
                    <x-slot name='db_data_field'>id</x-slot>
                    <x-slot name='show_field'>name_ar</x-slot>
                    <x-slot name='resource_field'>representative_type_id</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                </x-select_searchable>
                <x-input name='representative_name_ar' title="">
                    <x-slot name='title'>representative_name_ar</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->representative_name_ar}}</x-slot>
                </x-input>
                <x-input name='representative_name_en' title="">
                    <x-slot name='title'>representative_name_en</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->representative_name_en}}</x-slot>
                </x-input>
                <x-input name='representative_main_mobile_no' title="">
                    <x-slot name='title'>representative_main_mobile_no</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->representative_main_mobile_no}}</x-slot>
                </x-input>
            </div>
            <div class="row">
                <x-input name='representative_authorization_type' title="">
                    <x-slot name='title'>representative_authorization_type</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_type}}</x-slot>
                </x-input>
                <x-input name='representative_authorization_no' title="">
                    <x-slot name='title'>representative_authorization_no</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_no}}</x-slot>
                </x-input>
                <x-input name='representative_authorization_issue_date' title="">
                    <x-slot name='title'>representative_authorization_issue_date</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_issue_date}}</x-slot>
                </x-input>
                <x-input name='representative_authorization_issue_place' title="">
                    <x-slot name='title'>representative_authorization_issue_place</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_issue_place}}</x-slot>
                </x-input>
                <x-input name='representative_authorization_expire_date' title="">
                    <x-slot name='title'>representative_authorization_expire_date</x-slot>
                    <x-slot name='input_value'>{{$project->representative_authorization_expire_date}}</x-slot>
                </x-input>
            </div>
            <div class="row">
                <x-input name='extra_representatives_list' title="">
                    <x-slot name='title'>extra_representatives_list</x-slot>
                    <x-slot name='is_readonly'>true</x-slot>
                    <x-slot name='input_value'>{{$project->extra_representatives_list}}</x-slot>
                </x-input>
            </div>
            <button type="submit" class="btn btn-info btn-block">{{__('update')}} |
                <i class="far fa-plus-square"></i>
            </button>
        </form>
    </div>
    <hr>
    <div class="card-footer">
        <form action="{{route('project.update',$project)}}" method="POST"
            class=" form-group m-0 row d-flex justify-content-between jumbotron my-2 py-3">
            @csrf
            @method('PATCH')
            <input type="hidden" name="form_action" value="update_representative_info">
            <x-select_searchable name='representative_type_id' title="representative type" :resource=$project
                :list=$representative_types>
                <x-slot name='db_data_field'>id</x-slot>
                <x-slot name='show_field'>name_ar</x-slot>
                <x-slot name='resource_field'>representative_type_id</x-slot>
            </x-select_searchable>
            <x-input name='representative_national_id' title="">
                <x-slot name='title'>representative_national_id</x-slot>
                <x-slot name='input_value'>{{$project->representative_national_id}}</x-slot>
            </x-input>
            <button type="submit" class="btn btn-link m-0 p-0 align-self-end">{{__('update')}} |
                <i class="far fa-plus-square"></i>
            </button>
        </form>
    </div>
</div>