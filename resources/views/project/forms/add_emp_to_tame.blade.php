@php
$project_tame = [
'project_manager_id'=>'مدير المشروع',
'project_coordinator_id'=>'منسق المشروع',
'arch_designed_by_id'=>'التصميم المعماري',
'elevation_designed_by_id'=>'تصميم الواجهة',
'str_designed_by_id'=>'التصميم الإنشائي',
'san_designed_by_id'=>'التصميم الصحي',
'elec_designed_by_id'=>'تصميمي الكهرباء',
'fire_fighting_designed_by_id'=>'تصميم الإطفاء',
'fire_alarm_designed_by_id'=>'تصميم الإنذار',
'fire_escape_designed_by_id'=>'تصميم الهروب',
'interior_designed_by_id'=>'تصميم الديكور',
'landscape_designed_by_id'=>'تصميم الاندسكيب',
'surveyed_by_id'=>'المساح',
'main_draftsman_id'=>'الرسام',
]
@endphp

<form action="{{route('project.update',$project)}}" method="POST" class=" form-group m-0 d-flex flex-column">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="update_project_team_member">
    <label>{{__('add employee to team')}}</label>
    <select name="position" class="form-control">
        <option disabled selected>position..</option>
        @foreach ($project_tame as $key=>$value)
        @if (!($project->$key))
        <option value="{{$key}}">{{$value}}</option>
        @endif
        @endforeach
    </select>
    <select name="member_id" class="form-control">
        <option disabled selected>employee..</option>
        @foreach ($employees as $employee)
        <option value="{{$employee->id}}">{{$employee->ar_name1.' '.$employee->ar_name5}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-link m-0 align-self-end">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>