<div class="card-header text-white bg-dark mb-3">
    {{__('project main Information')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_status' title="project_status">
        <x-slot name='placeholder'>project_status</x-slot>
        <x-slot name='input_value'>{{$project->project_status}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_type' title="project_type">
        <x-slot name='placeholder'>project_type</x-slot>
        <x-slot name='input_value'>{{$project->project_type}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_assign_to_user' title="project_assign_to_user">
        <x-slot name='placeholder'>project_assign_to_user</x-slot>
        <x-slot name='input_value'>{{$project->project_assign_to_user}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_arch_hight' title="project_arch_hight">
        <x-slot name='placeholder'>project_arch_hight</x-slot>
        <x-slot name='input_value'>{{$project->project_arch_hight}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_str_hight' title="project_str_hight">
        <x-slot name='placeholder'>project_str_hight</x-slot>
        <x-slot name='input_value'>{{$project->project_str_hight}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>