<ul class="list-group card-body p-0 py-1 m-0">
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('nId')}}: </span>
        {{$project->representative()->first()->national_id ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('the name')}}: </span>
        {{$project->representative()->first()->get_full_name_ar() ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('authorization type')}}: </span>
        {{$project->representative_type()->first()->name_ar  ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('mobile')}}: </span>
        {{$project->representative()->first()->mobile ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('authorization number')}}: </span>
        {{$project->representative_authorization_no ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('authorization issue place')}}: </span>
        {{$project->representative_authorization_issue_place ?? '?'}}</li>
</ul>