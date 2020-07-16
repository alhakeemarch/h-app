<div class="card-header text-white bg-dark mb-3">
    {{__('project financial Information')}}:
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class="form-group row">
    <x-input name='contracts_list_names' title="contracts_list_names">
        <x-slot name='placeholder'>contracts_list_names</x-slot>
        <x-slot name='input_value'>{{$project->contracts_list_names}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='total_project_price' title="total_project_price">
        <x-slot name='placeholder'>total_project_price</x-slot>
        <x-slot name='input_value'>{{$project->total_project_price}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='total_project_cost' title="total_project_cost">
        <x-slot name='placeholder'>total_project_cost</x-slot>
        <x-slot name='input_value'>{{$project->total_project_cost}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>