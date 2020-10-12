<h3 class="card-header d-flex justify-content-between">
    <span>plot info</span>
    <span>بيانات الأرض</span>
</h3>
@if ($project->plot_id)
<ul class="list-group card-body">
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('deed number')}}: </span>
        {{$project->plot()->first()->deed_no ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('deed date')}}: </span>
        {{$project->plot()->first()->deed_date ?? '?'}}
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('plot number')}}: </span>
        {{$project->plot()->first()->plot_no ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('total area')}}: </span>
        {{$project->plot()->first()->area ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('neighbor_id')}}: </span>
        {{$project->plot()->first()->neighbor()->first()->ar_name ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('district_id')}}: </span>
        {{$project->plot()->first()->district()->first()->ar_name ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('plan number')}}: </span>
        {{$project->plot()->first()->plan()->first()->plan_no ?? '?'}}</li>
    <li class="list-group-item d-flex justify-content-between">
        <span class="font-weight-bold">{{__('plan name')}}: </span>
        {{$project->plot()->first()->plan()->first()->plan_ar_name ?? '?'}}</li>
    {{-- <hr> --}}
</ul>
<div class=" card-footer d-flex justify-content-end m-0">

    <a href="#" class="btn btn-link m-0">edit |
        <i class="far fa-edit"></i>
    </a>

</div>
@endif