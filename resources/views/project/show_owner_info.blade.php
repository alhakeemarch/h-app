<ul class="list-group card-body p-0 py-1 m-0">
    {{-- ---------------------------------------------------------  --}}
    @if ($project->person_id)
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('nId')}}: </span>
        {{$project->person()->first()->national_id ?? '?'}}
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('the name')}}: </span>
        {{$project->person()->first()->get_full_name_ar() ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('mobile')}}: </span>
        {{$project->person()->first()->mobile ?? '?'}}</li>
    @endif
    {{-- ---------------------------------------------------------  --}}
    @if ($project->organization_id)
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('the name')}}: </span>
        {{$project->organization()->first()->name_ar ?? '?'}}
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('organization type')}}: </span>
        {{$project->organization()->first()->organization_type()->first()->name_ar ?? '?'}}
    </li>
    @endif
    {{-- ---------------------------------------------------------  --}}
</ul>