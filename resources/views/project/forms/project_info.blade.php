<div class="card-header text-white bg-dark mb-3">
    {{__('project information')}}
</div>
<div class="row">
    <x-input name='project_arch_hight' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('required height')}}</x-slot>
        <x-slot name='input_value'>{{old('project_arch_hight') ?? $project->project_arch_hight}}</x-slot>
    </x-input>
    <x-input name='project_type' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('required use')}}</x-slot>
        <x-slot name='input_value'>{{old('project_type') ?? $project->project_type}}</x-slot>
    </x-input>
    <x-input name='last_rokhsa_no' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('rokhsa number')}}</x-slot>
        <x-slot name='input_value'>{{old('last_rokhsa_no') ?? $project->last_rokhsa_no}}</x-slot>
    </x-input>
    <x-input name='last_rokhsa_issue_date' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('rokhsa issue date')}}</x-slot>
        <x-slot name='input_value'>{{old('last_rokhsa_issue_date') ?? $project->last_rokhsa_issue_date}}</x-slot>
    </x-input>
    <x-select name='project_manager_id' :resource=$person :list=$employees>
        <x-slot name='option_name'>ar_name1</x-slot>
        <x-slot name='title'>{{__('project_manager')}}</x-slot>
        {{-- <x-slot name='is_disabled'>true</x-slot> --}}
        {{-- <x-slot name='is_hidden'>true</x-slot> --}}
        <x-slot name='is_required'>true</x-slot>
    </x-select>
</div>