@if (isset($project->representative_id))
<div class="card-body">
    <form action="{{route('project.update',$project)}}" method="POST" class=" form-group">
        @csrf
        @method('PATCH')
        <input type="hidden" name="form_action" value="update_representative_info">
        {{-- ---------------------------------------------------------------------------------  --}}
        <div class="row">
            <x-input name='representative_id' title="">
                <x-slot name='title'>id</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                @if (!auth()->user()->is_admin)
                <x-slot name='is_hidden'>true</x-slot>
                @endif
                <x-slot name='input_value'>{{$project->representative_id}}</x-slot>
            </x-input>
            <x-input name='representative_national_id' title="">
                <x-slot name='title'>{{__('nId')}}</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative()->first()->national_id}}</x-slot>
            </x-input>
            <x-select_searchable name='representative_type_id' title="{{__('type')}}" :resource=$project
                :list=$representative_types>
                <x-slot name='db_data_field'>id</x-slot>
                <x-slot name='show_field'>name_ar</x-slot>
                <x-slot name='resource_field'>representative_type_id</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
            </x-select_searchable>
        </div>
        {{-- ---------------------------------------------------------------------------------  --}}
        <div class="row">
            <x-input name='representative_name_ar' title="">
                <x-slot name='title'>arabic name</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative()->first()->get_full_name_ar()}}</x-slot>
            </x-input>
            <x-input name='representative_name_en' title="">
                <x-slot name='title'>english name</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative()->first()->get_full_name_en()}}</x-slot>
            </x-input>
            <x-input name='representative_main_mobile_no' title="">
                <x-slot name='title'>{{__('mobile')}}</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative()->first()->mobile}}</x-slot>
            </x-input>
        </div>
        {{-- ---------------------------------------------------------------------------------  --}}
        <div class="row">
            <x-input name='authorization_type' title="">
                <x-slot name='title'>authorization type</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='is_disabled'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_type()->first()->authorization_type_ar}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_no' title="">
                <x-slot name='title'>authorization no</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_no}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_issue_place' title="">
                <x-slot name='title'>authorization issue place</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_issue_place}}</x-slot>
            </x-input>
        </div>
        {{-- ---------------------------------------------------------------------------------  --}}
        <div class="row">
            <x-input name='representative_authorization_issue_date' title="">
                <x-slot name='title'>authorization issue date</x-slot>
                <x-slot name='tooltip'>(DD-MM-YYYY)</x-slot>
                <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_issue_date}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_expire_date' title="">
                <x-slot name='title'>authorization expire date</x-slot>
                <x-slot name='tooltip'>(DD-MM-YYYY)</x-slot>
                <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_expire_date}}</x-slot>
            </x-input>
        </div>
        {{-- ---------------------------------------------------------------------------------  --}}
        <div class="row">
            <x-input name='extra_representatives_list' title="">
                <x-slot name='title'>extra representatives list</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->extra_representatives_list}}</x-slot>
            </x-input>
        </div>
        <x-btn btnText='save' class="mt-3" />
    </form>
</div>
@endif
{{-- ---------------------------------------------------------------------------------  --}}
<div class="card-footer">
    <form action="{{route('project.update',$project)}}" method="POST"
        class=" form-group m-0 row d-flex justify-content-between jumbotron my-2 py-3">
        @csrf
        @method('PATCH')
        <input type="hidden" name="form_action" value="update_representative_info">
        <x-select_searchable name='representative_type_id' title="{{__('type')}}" :resource=$project
            :list=$representative_types>
            <x-slot name='db_data_field'>id</x-slot>
            <x-slot name='show_field'>name_ar</x-slot>
            <x-slot name='resource_field'>representative_type_id</x-slot>
        </x-select_searchable>
        <x-input name='representative_national_id' title="">
            <x-slot name='title'>{{__('nId')}}</x-slot>
            <x-slot name='input_value'>{{$project->representative_national_id}}</x-slot>
        </x-input>
        <button type="submit" class="btn btn-link m-0 p-0 align-self-end">{{__('update')}} |
            <i class="far fa-plus-square"></i>
        </button>
    </form>
</div>