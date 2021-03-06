<x-pdf_print_style />
<style>
    table {
        font-size: 150%;
        line-height: 2;
    }

</style>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="main-title txt-center" style="font-size: 250%;">
    <tr>
        <td>
            المذكرة الإنشائية
        </td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="tbl-bordered">
    <tr>
        <td>اسم المالكـ</td>
        <td colspan="2" class="color-blue">{{$_['owner_name'] ??''}}</td>
    </tr>
    <tr>
        <td>الموقع</td>
        <td colspan="2" class="color-blue">
            {{$_['neighbor_name'] ??''}}
            {{$_['district_name'] ??''}}
            <span>القطعة رقم</span>
            ({{$_['plot_no'] ??''}})
        </td>
    </tr>
    <tr>
        <td>عدد الأدوار</td>
        <td colspan="2" class="color-blue">{{$project->project_str_hight ??''}}</td>
    </tr>
    <tr>
        <td>رقم المشروع</td>
        <td colspan="2" class="color-blue">{{$project->project_no ??''}}</td>
    </tr>
    @if (($project->plot->soil_report_laboratory_id))
    <tr>
        <td>تحليل التربة</td>
        <td colspan="2" class="color-blue">
            <span>مختبر:</span> {{$project->plot->soilLaboratory->name_ar ??''}} <br>
            <span>تحليل تربة رقم:</span>
            {{$project->plot->soil_report_no ??''}}
            <span>بتاريخ:</span>
            {{$project->plot->soil_report_date ??''}}
        </td>
    </tr>
    @endif
    <tr>
        <td>المهندس المصمم</td>
        <td colspan="2" class="color-blue">{{$project->str_designed_by->ar_name1 ??''}}
            {{$project->str_designed_by->ar_name2 ??''}} {{$project->str_designed_by->ar_name5 ??''}}</td>
    </tr>
    <tr>
        <td>ملاحظات</td>
        <td colspan="2" class="color-blue">
            <span>تم التصميم طبقاً لكود البناء السعودي</span> <br>
            <span>تم مراعاة مقاومة الزلازل والرياح</span>
        </td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}