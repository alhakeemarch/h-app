<form action="{{route('projectBeneficiary.store')}}" method="post" class="d-flex jumbotron p-3">
    @csrf
    <input type="hidden" name="coming_from" value="project_owner_info_edit">
    <input type="hidden" name="form_action" value="add_beneficiary_to_project">
    <input type="hidden" name="project_id" value="{{$project->id}}">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label class="my-1">{{__( 'type')}}
            <span class="small text-danger">({{__('required')}})</span>:</label>
        <select name="beneficiary_type" class="form-control @error ('beneficiary_type') is-invalid @enderror" required>
            <option selected disabled> {{__('pick')}}..</option>
            <option value='person'> {{__('person')}}</option>
            <option value='organization'> {{__('organization')}}</option>
        </select>
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='id' title="رقم الهوية أو السجل">
        <x-slot name='is_required'>true</x-slot>
    </x-input>
    <x-input name='relation_to_project' title="علاقته بالمشروع">
    </x-input>
    <x-btn btnText='add'>
        <x-slot name='is_btn_link'>true</x-slot>
    </x-btn>
</form>
<table class="table table-hover text-capitalize">
    <thead class="bg-thead">
        <tr>
            <th scope="sequence">#</th>
            <th>person</th>
            <th>organization</th>
            <th>relation to project</th>
            <th>is active</th>
            <th scope="link">details</th>
        </tr>
    </thead>

    <tbody>
        @php
        $i=1;
        @endphp
        @foreach ($project_beneficiaries as $beneficiary)
        <tr>
            <td scope="sequence">{{$i}}</td>
            @php
            $person = App\Person::find($beneficiary->person_id);
            $organization = App\Organization::find($beneficiary->organization_id);
            @endphp
            <td>{{($person) ? $person->get_full_name_ar() : ''}}</td>
            <td>{{($organization) ? $organization->name_ar : ''}}</td>
            <td>{{$beneficiary->relation_to_project}}</td>
            <td>{{($beneficiary->is_active)?'yes':'no'}}</td>
            <td scope="link" class=" text-center">
                <form action="{{route('projectBeneficiary.show',$beneficiary)}}" method="get">
                    <x-btn btnText='show'>
                        <x-slot name='is_btn_link'>true</x-slot>
                    </x-btn>
                </form>
            </td>
            @php $i ++ @endphp
        </tr>
        @endforeach
    </tbody>
</table>