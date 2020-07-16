<div class="card-header text-white bg-dark mb-3">
    {{__('project employees Information')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_manager' title="project_manager">
        <x-slot name='placeholder'>project_manager</x-slot>
        <x-slot name='input_value'>{{$project->project_manager}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='project_coordinator' title="project_coordinator">
        <x-slot name='placeholder'>project_coordinator</x-slot>
        <x-slot name='input_value'>{{$project->project_coordinator}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='arch_designed_by' title="arch_designed_by">
        <x-slot name='placeholder'>arch_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->arch_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='elevation_designed_by' title="elevation_designed_by">
        <x-slot name='placeholder'>elevation_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->elevation_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='str_designed_by' title="str_designed_by">
        <x-slot name='placeholder'>str_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->str_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
</div>

<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='san_designed_by' title="san_designed_by">
        <x-slot name='placeholder'>san_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->san_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='elec_designed_by' title="elec_designed_by">
        <x-slot name='placeholder'>elec_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->elec_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='fire_fighting_designed_by' title="fire_fighting_designed_by">
        <x-slot name='placeholder'>fire_fighting_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->fire_fighting_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='fire_alarm_designed_by' title="fire_alarm_designed_by">
        <x-slot name='placeholder'>fire_alarm_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->fire_alarm_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='fire_escape_designed_by' title="fire_escape_designed_by">
        <x-slot name='placeholder'>fire_escape_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->fire_escape_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='tourism_designed_by' title="tourism_designed_by">
        <x-slot name='placeholder'>tourism_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->tourism_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='interior_designed_by' title="interior_designed_by">
        <x-slot name='placeholder'>interior_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->interior_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='landscape_designed_by' title="landscape_designed_by">
        <x-slot name='placeholder'>landscape_designed_by</x-slot>
        <x-slot name='input_value'>{{$project->landscape_designed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='surveyed_by' title="surveyed_by">
        <x-slot name='placeholder'>surveyed_by</x-slot>
        <x-slot name='input_value'>{{$project->surveyed_by}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='main_draftsman' title="main_draftsman">
        <x-slot name='placeholder'>main_draftsman</x-slot>
        <x-slot name='input_value'>{{$project->main_draftsman}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
</div>
<div class="card-header text-white bg-dark mb-3">
    {{__('project employees extra Information')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_1' title="draftsman_1">
        <x-slot name='placeholder'>draftsman_1</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_1}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_1_mission' title="draftsman_1_mission">
        <x-slot name='placeholder'>draftsman_1_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_1_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_2' title="draftsman_2">
        <x-slot name='placeholder'>draftsman_2</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_2}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_2_mission' title="draftsman_2_mission">
        <x-slot name='placeholder'>draftsman_2_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_2_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_3' title="draftsman_3">
        <x-slot name='placeholder'>draftsman_3</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_3}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_3_mission' title="draftsman_3_mission">
        <x-slot name='placeholder'>draftsman_3_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_3_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_4' title="draftsman_4">
        <x-slot name='placeholder'>draftsman_4</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_4}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_4_mission' title="draftsman_4_mission">
        <x-slot name='placeholder'>draftsman_4_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_4_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_5' title="draftsman_5">
        <x-slot name='placeholder'>draftsman_5</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_5}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_5_mission' title="draftsman_5_mission">
        <x-slot name='placeholder'>draftsman_5_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_5_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_6' title="draftsman_6">
        <x-slot name='placeholder'>draftsman_6</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_6}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_6_mission' title="draftsman_6_mission">
        <x-slot name='placeholder'>draftsman_6_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_6_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_7' title="draftsman_7">
        <x-slot name='placeholder'>draftsman_7</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_7}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_7_mission' title="draftsman_7_mission">
        <x-slot name='placeholder'>draftsman_7_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_7_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_8' title="draftsman_8">
        <x-slot name='placeholder'>draftsman_8</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_8}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_8_mission' title="draftsman_8_mission">
        <x-slot name='placeholder'>draftsman_8_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_8_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_9' title="draftsman_9">
        <x-slot name='placeholder'>draftsman_9</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_9}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='draftsman_9_mission' title="draftsman_9_mission">
        <x-slot name='placeholder'>draftsman_9_mission</x-slot>
        <x-slot name='input_value'>{{$project->draftsman_9_mission}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='extra_draftsman_details' title="extra_draftsman_details">
        <x-slot name='placeholder'>extra_draftsman_details</x-slot>
        <x-slot name='input_value'>{{$project->extra_draftsman_details}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>