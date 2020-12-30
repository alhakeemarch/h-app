<div class="card-subtitle mb-3">
    {{__('organization information')}}
</div>
<div class="row form-group">
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
    <input type="hidden" name="organization_id" value="{{$organization->id}}">
    <x-select_searchable name='organization_type_id' title="organization typ" :resource=$organization
        :list=$organization_types>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>name_ar</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='is_required'>true</x-slot>
    </x-select_searchable>
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
    <x-input name='name_ar' title="orgnization name arabic">
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$organization->name_ar}}</x-slot>
    </x-input>
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
    @if (isset($organization->name_en))
    <x-input name='name_en' title="orgnization name english">
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$organization->name_en}}</x-slot>
    </x-input>
    @endif
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
    @if (isset($organization->unified_code))
    <x-input name='unified_code' title="unified code">
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$organization->unified_code}}</x-slot>
    </x-input>
    @endif
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
    @if (isset($organization->license_number))
    <x-input name='license_number' title="license number">
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$organization->license_number}}</x-slot>
    </x-input>
    @endif
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
    @if (isset($organization->commercial_registration_no))
    <x-input name='commercial_registration_no' title="commercial registration no">
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$organization->commercial_registration_no}}</x-slot>
    </x-input>
    @endif
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
    @if (isset($organization->special_code))
    <x-input name='special_code' title="special code">
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$organization->special_code}}</x-slot>
    </x-input>
    @endif
    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
</div>