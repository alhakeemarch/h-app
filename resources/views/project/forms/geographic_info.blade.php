<div class="card-header text-white bg-dark mb-3">
    {{__('project geographic information')}}:
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class="form-group row">
    <x-select name='municipality_branche_id' :resource=$project :list=$municipality_branches>
        <x-slot name='option_name'>ar_name</x-slot>
        <x-slot name='title'>{{__('municipality branche')}}</x-slot>
        {{-- <x-slot name='is_disabled'>true</x-slot> --}}
        {{-- <x-slot name='is_hidden'>true</x-slot> --}}
        {{-- <x-slot name='is_required'>true</x-slot> --}}
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select name='neighbor_id' :resource=$project :list=$neighbors>
        <x-slot name='option_name'>ar_name</x-slot>
        <x-slot name='title'>{{__('neighbor')}}</x-slot>
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select name='plan_id' :resource=$project :list=$plans>
        <x-slot name='option_name'>plan_ar_name</x-slot>
        <x-slot name='title'>{{__('plan')}}</x-slot>
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select name='district_id' :resource=$project :list=$districts>
        <x-slot name='option_name'>ar_name</x-slot>
        <x-slot name='title'>{{__('district')}}</x-slot>
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select name='street_id' :resource=$project :list=$streets>
        <x-slot name='option_name'>ar_name</x-slot>
        <x-slot name='title'>{{__('street')}}</x-slot>
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
{{-- ============================================================================================= --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-select name='plot_id' :resource=$project :list=$plots>
        <x-slot name='option_name'>deed_no</x-slot>
        <x-slot name='title'>{{__('plot')}}</x-slot>
        <x-slot name='is_disabled'>true</x-slot>
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- <x-input name='plot_id' title="plot_id">
        <x-slot name='placeholder'>plot_id</x-slot>
        <x-slot name='input_value'>{{$project->plot_id}}</x-slot>
    <x-slot name='is_readonly'>true</x-slot>
    </x-input> --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='plot_no' title="plot_no">
        <x-slot name='placeholder'>plot_no</x-slot>
        <x-slot name='input_value'>{{$project->plot_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- no need for this one --}}
    {{-- <x-input name='deed_id' title="deed_id">
        <x-slot name='placeholder'>deed_id</x-slot>
        <x-slot name='input_value'>{{$project->deed_id}}</x-slot>
    <x-slot name='is_readonly'>true</x-slot>
    </x-input> --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='deed_no' title="deed_no">
        <x-slot name='placeholder'>deed_no</x-slot>
        <x-slot name='input_value'>{{$project->deed_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='total_area' title="total_area">
        <x-slot name='placeholder'>total_area</x-slot>
        <x-slot name='input_value'>{{$project->total_area}}</x-slot>
        {{-- <x-slot name='is_readonly'>true</x-slot> --}}
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_location' title="project_location">
        <x-slot name='placeholder'>project_location</x-slot>
        <x-slot name='input_value'>{{$project->project_location}}</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>