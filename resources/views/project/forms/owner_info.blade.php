<h3 class="card-header d-flex justify-content-between">
    <span>owoner info</span>
    <span>بيانات المالك</span>
</h3>
<div class="card-body">
    <div class="row">
        <x-input name='owner_id' title="">
            <x-slot name='title'>id</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='is_readonly'>true</x-slot>
            @if (!auth()->user()->is_admin)
            <x-slot name='is_hidden'>true</x-slot>
            @endif
            <x-slot name='input_value'>{{$project->owner_id}}</x-slot>
        </x-input>
        <x-input name='owner_national_id' title="">
            <x-slot name='title'>{{__('nId')}}</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='is_readonly'>true</x-slot>
            <x-slot name='input_value'>{{$project->owner_national_id}}</x-slot>
        </x-input>
        <x-select_searchable name='owner_type_id' title="{{__('type')}}" :resource=$project :list=$owner_types>
            <x-slot name='db_data_field'>id</x-slot>
            <x-slot name='show_field'>type_ar</x-slot>
            <x-slot name='resource_field'>owner_type_id</x-slot>
            <x-slot name='is_readonly'>true</x-slot>
        </x-select_searchable>
    </div>
    <div class="row">
        <x-input name='owner_name_ar' title="">
            <x-slot name='title'>name arabic</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='is_readonly'>true</x-slot>
            <x-slot name='input_value'>{{$project->owner_name_ar}}</x-slot>
        </x-input>
    </div>
    <div class="row">
        <x-input name='owner_name_en' title="">
            <x-slot name='title'>name english</x-slot>
            <x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot>
            <x-slot name='is_readonly'>true</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_value'>{{$project->owner_name_en}}</x-slot>
        </x-input>
    </div>
    <div class="row">
        <x-input name='owner_main_mobile_no' title="">
            <x-slot name='title'>{{__('mobile')}}</x-slot>
            <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
            <x-slot name='is_readonly'>true</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_value'>{{$project->owner_main_mobile_no}}</x-slot>
        </x-input>
    </div>
</div>
<div class="card-footer">
    <div class=" jumbotron my-1 py-3">
        @include('project.forms.new_owner_info')
    </div>
</div>