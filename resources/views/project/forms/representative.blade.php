<div class="card-header text-white bg-dark mb-3">
    {{__('representative Information')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_id' title="representative_id">
        <x-slot name='placeholder'>representative_id</x-slot>
        <x-slot name='input_value'>{{$project->representative_id}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_national_id' title="representative_national_id">
        <x-slot name='placeholder'>representative_national_id</x-slot>
        <x-slot name='input_value'>{{$project->representative_national_id}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_type' title="representative_type">
        <x-slot name='placeholder'>representative_type</x-slot>
        <x-slot name='input_value'>{{$project->representative_type}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_name_ar' title="representative_name_ar">
        <x-slot name='placeholder'>representative_name_ar</x-slot>
        <x-slot name='input_value'>{{$project->representative_name_ar}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_name_en' title="representative_name_en">
        <x-slot name='placeholder'>representative_name_en</x-slot>
        <x-slot name='input_value'>{{$project->representative_name_en}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_main_mobile_no' title="representative_main_mobile_no">
        <x-slot name='placeholder'>representative_main_mobile_no</x-slot>
        <x-slot name='input_value'>{{$project->representative_main_mobile_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_authorization_type' title="representative_authorization_type">
        <x-slot name='placeholder'>representative_authorization_type</x-slot>
        <x-slot name='input_value'>{{$project->representative_authorization_type}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_authorization_no' title="representative_authorization_no">
        <x-slot name='placeholder'>representative_authorization_no</x-slot>
        <x-slot name='input_value'>{{$project->representative_authorization_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_authorization_issue_date' title="representative_authorization_issue_date">
        <x-slot name='placeholder'>representative_authorization_issue_date</x-slot>
        <x-slot name='input_value'>{{$project->representative_authorization_issue_date}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_authorization_issue_place' title="representative_authorization_issue_place">
        <x-slot name='placeholder'>representative_authorization_issue_place</x-slot>
        <x-slot name='input_value'>{{$project->representative_authorization_issue_place}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='representative_authorization_expire_date' title="representative_authorization_expire_date">
        <x-slot name='placeholder'>representative_authorization_expire_date</x-slot>
        <x-slot name='input_value'>{{$project->representative_authorization_expire_date}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='extra_representatives_list' title="extra_representatives_list">
        <x-slot name='placeholder'>extra_representatives_list</x-slot>
        <x-slot name='input_value'>{{$project->extra_representatives_list}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>