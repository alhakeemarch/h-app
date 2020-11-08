{{-- ---------------------------------------------------------------------------------------------------------- --}}
<x-pdf_print_style />
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="main-title txt-center">
            <span>{{$passed_title ?? $contract_title ?? 'عنوان العقد'}}</span>
        </td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>
            <span>إنه في يوم</span> <span>{{$date_and_time['day_ar']}}</span>
            <span>تاريخ</span> <span>{{$date_and_time['h_date_ar']}} هـ</span>
            <span>الموافق</span> <span>{{$date_and_time['g_date_ar']}} م</span>
            <span>تم بعون الله تعالى الاتفاق بين كل من:</span>
        </td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td colspan="3">
            <span>الطرف الاول:</span>
            <span>مكتب م.</span> <span>{{$office_data->name_ar}}</span>
        </td>
        <td>
            <span>هاتف:</span> <span>{{$office_data->phone}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <span>الطرف الثاني:</span>
            <span>السيد:</span> <span>{{$project->owner_name_ar}}</span>
        </td>
        <td>
            <span>هاتف:</span> <span>{{$project->person->mobile}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <span>يمثله بالعقد:</span>
            <span>{{$project->representative_name_ar  ?? '...................................................................'}}</span>
        </td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td colspan="3" class="title">بيانات المشروع</td>
    </tr>
    <tr>
        <td>
            <span>رقم الصك:</span>
            <span>{{$project->plot->deed_no ?? '...........................'}}</span>
        </td>
        <td>
            <span>تاريخه</span>
            <span>{{$project->plot->deed_date ?? '...........................'}}</span>
        </td>
        <td>
            <span>مصدره</span>
            <span>{{$project->plot->deed_issue_place ?? '...........................'}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>رقم القطعة</span>
            <span>{{$project->plot->plot_no ?? '...........................'}}</span>
        </td>
        <td>
            <span>رقم المخطط:</span>
            <span>{{$project->plot->plan->plan_no ?? '...........................'}}</span>
        </td>
        <td>
            <span>الحي:</span>
            <span>{{$project->plot->neighbor->ar_name ?? '...........................'}}</span>
        </td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
@php
if (!isset($full_project_info)) {
$full_project_info = false;
}
@endphp
@if (($contract_title == 'عقد تصميم')||($full_project_info == 'TRUE'?? false))
<table>
    <tr>
        <td>
            <span>نوع المشروع:</span>
            <span>{{$project->project_type ?? '...........................'}}</span>
        </td>
        <td>
            <span>مكونات المشروع:</span>
            <span>{{$project->project_arch_hight ?? '...........................'}}</span>
        </td>
    </tr>
</table>
@endif
<br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}