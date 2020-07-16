<div class="card-header text-white bg-dark mb-3">
    {{__('Owner Information')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='owner_national_id' title="owner national id Number">
        <x-slot name='placeholder'>project name in arabic</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$project->owner_national_id}}</x-slot>
        <x-slot name='input_min'>2</x-slot>
        <x-slot name='input_max'>150</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select name='owner_type' :resource=$project :list=$owner_types>
        <x-slot name='option_name'>type_ar</x-slot>
        <x-slot name='title'>{{__('owner type')}}</x-slot>
        {{-- <x-slot name='is_disabled'>true</x-slot> --}}
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='owner_name_ar' title="owner name in arabic">
        <x-slot name='placeholder'>owner name in arabic</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$project->owner_name_ar}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='owner_name_en' title="owner name in english">
        <x-slot name='placeholder'>owner name in english</x-slot>
        <x-slot name='input_value'>{{$project->owner_name_en}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='owner_main_mobile_no' title="owner_main_mobile_no">
        <x-slot name='placeholder'>owner_main_mobile_no</x-slot>
        <x-slot name='input_value'>{{$project->owner_main_mobile_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='extra_owners_list' title="extra_owners_list">
        <x-slot name='placeholder'>extra_owners_list</x-slot>
        <x-slot name='input_value'>{{$project->extra_owners_list}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='extra_owners_info' title="extra_owners_info">
        <x-slot name='placeholder'>extra_owners_info</x-slot>
        <x-slot name='input_value'>{{$project->extra_owners_info}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>