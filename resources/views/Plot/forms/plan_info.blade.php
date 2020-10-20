@php
if (isset ($is_read_only)) {
$is_read_only = ($is_read_only== true) ? true : false ;
}else {
$is_read_only = false;
}
@endphp
<h5 class="card-header text-white bg-dark my-2">{{ __('plan information') }} </h5>
<div class="form-group row ">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select_searchable name='municipality_branch_id' title="" :resource=$plot :list=$municipality_branchs>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>ar_name</x-slot>
        {{-- <x-slot name='resource_field'>ar_name</x-slot> --}}
        <x-slot name='title'>municipality branch</x-slot>
        {{-- <x-slot name='is_required'>true</x-slot> --}}
        {{-- <x-slot name='is_readonly'>true</x-slot> --}}
    </x-select_searchable>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select_searchable name='district_id' title="district" :resource=$plot :list=$districts>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>ar_name</x-slot>
    </x-select_searchable>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select_searchable name='neighbor_id' title="neighbor" :resource=$plot :list=$neighbors>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>ar_name</x-slot>
    </x-select_searchable>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select_searchable name='plan_id' title="plan" :resource=$plot :list=$plans>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>plan_no</x-slot>
    </x-select_searchable>
    {{-- --------------------------------------------------------------------------------------------- --}}
    @if (auth()->user()->is_admin && false)
    <x-select_searchable name='street_id' title="street" :resource=$plot :list=$streets>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>ar_name</x-slot>
    </x-select_searchable>
    @endif
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>