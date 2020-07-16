<div class="card-header text-white bg-dark mb-3">
    {{__('project name and number')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_no' title="project number">
        <x-slot name='is_required'>true</x-slot>
        @if (! auth()->user()->is_admin)
        <x-slot name='is_readonly'>true</x-slot>
        @endif
        <x-slot name='input_value'>{{$project->project_no}}</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_name_ar' title="arabic project name">
        <x-slot name='placeholder'>project name in arabic</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$project->project_name_ar}}</x-slot>
        <x-slot name='input_min'>2</x-slot>
        <x-slot name='input_max'>150</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_name_en' title="english project name">
        <x-slot name='placeholder'>project name in english</x-slot>
        <x-slot name='input_value'>{{$project->project_name_en}}</x-slot>
        <x-slot name='input_min'>2</x-slot>
        <x-slot name='input_max'>150</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>