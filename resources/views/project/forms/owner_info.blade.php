{{-- ------------------------------------------------------------------------------  --}}
@if ($project->organization_id)
@php
$organization = $project->organization()->first();
$organization_types = App\OrganizationType::all();
@endphp
@include('project.forms.organization_info')
@endif
{{-- ------------------------------------------------------------------------------  --}}
@if ($project->person_id)
@php $person = $project->person()->first(); @endphp
@include('person.forms.q_form')
@endif
{{-- ------------------------------------------------------------------------------  --}}
<div class="card-footer mt-3">
    <div class=" jumbotron my-1 py-3">
        @include('project.forms.new_owner_info')
    </div>
</div>
{{-- ------------------------------------------------------------------------------  --}}