<div class="card-header text-white bg-dark mb-3">
    {{__('project documents Information')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='byanat_almawqi_no' title="byanat_almawqi_no">
        <x-slot name='placeholder'>byanat_almawqi_no</x-slot>
        <x-slot name='input_value'>{{$project->byanat_almawqi_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='byanat_almawqi_issue_date' title="byanat_almawqi_issue_date">
        <x-slot name='placeholder'>byanat_almawqi_issue_date</x-slot>
        <x-slot name='input_value'>{{$project->byanat_almawqi_issue_date}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='qarar_masahe_no' title="qarar_masahe_no">
        <x-slot name='placeholder'>qarar_masahe_no</x-slot>
        <x-slot name='input_value'>{{$project->qarar_masahe_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='qarar_masahe_issue_date' title="qarar_masahe_issue_date">
        <x-slot name='placeholder'>qarar_masahe_issue_date</x-slot>
        <x-slot name='input_value'>{{$project->qarar_masahe_issue_date}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='tanzeem_plan_no' title="tanzeem_plan_no">
        <x-slot name='placeholder'>tanzeem_plan_no</x-slot>
        <x-slot name='input_value'>{{$project->tanzeem_plan_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='tanzeem_plan_issue_date' title="tanzeem_plan_issue_date">
        <x-slot name='placeholder'>tanzeem_plan_issue_date</x-slot>
        <x-slot name='input_value'>{{$project->tanzeem_plan_issue_date}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='old_rokhsa_no' title="old_rokhsa_no">
        <x-slot name='placeholder'>old_rokhsa_no</x-slot>
        <x-slot name='input_value'>{{$project->old_rokhsa_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='old_rokhsa_issue_date' title="old_rokhsa_issue_date">
        <x-slot name='placeholder'>old_rokhsa_issue_date</x-slot>
        <x-slot name='input_value'>{{$project->old_rokhsa_issue_date}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='last_rokhsa_no' title="last_rokhsa_no">
        <x-slot name='placeholder'>last_rokhsa_no</x-slot>
        <x-slot name='input_value'>{{$project->last_rokhsa_no}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='last_rokhsa_issue_date' title="last_rokhsa_issue_date">
        <x-slot name='placeholder'>last_rokhsa_issue_date</x-slot>
        <x-slot name='input_value'>{{$project->last_rokhsa_issue_date}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='other_doc_details' title="other_doc_details">
        <x-slot name='placeholder'>other_doc_details</x-slot>
        <x-slot name='input_value'>{{$project->other_doc_details}}</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- <div class="col-md"></div> --}}
</div>