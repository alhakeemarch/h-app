<!doctype html>
<html lang="AR" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>غلاف المذكرة الإنشائية</title>
    <!--FOR CSS STYLE-->
    <x-pdf_print_style></x-pdf_print_style>
    <style>
        table,
        tr,
        td {
            border: 1px, solid, gray;
            font-size: 110%;
            line-height: 200%;
            /* vertical-align: center; */
            vertical-align: middle;
        }

    </style>
</head>

<body>
    {{-- ---------------------------------------------------------------------------------------------------------- --}}
    <h1 class="main-title txt-center" style="font-size: 300%;">المذكرة الإنشائية</h1>

    {{-- ---------------------------------------------------------------------------------------------------------- --}}
    <table>
        <tr>
            <td>اسم المالكـ</td>
            <td colspan="2" class="color-blue">{{$project->owner_name_ar}}</td>
        </tr>
        <tr>
            <td>الموقع</td>
            <td colspan="2" class="color-blue">
                {{$project->plot->neighbor->ar_name}}
                {{$project->plot->district->ar_name}}
                <span>القطعة رقم</span>
                ({{$project->plot->plot_no}})
            </td>
        </tr>
        <tr>
            <td>عدد الأدوار</td>
            <td colspan="2" class="color-blue">{{$project->project_str_hight}}</td>
        </tr>
        <tr>
            <td>رقم المشروع</td>
            <td colspan="2" class="color-blue">{{$project->project_no}}</td>
        </tr>
        @if (($project->plot->soil_report_laboratory_id))
        <tr>
            <td>تحليل التربة</td>
            <td colspan="2" class="color-blue">
                <span>مختبر:</span> {{$project->plot->soilLaboratory->name_ar}} <br>
                <span>تحليل تربة رقم:</span>
                {{$project->plot->soil_report_no}}
                <span>بتاريخ:</span>
                {{$project->plot->soil_report_date}}
            </td>
        </tr>
        @endif
        <tr>
            <td>المهندس المصمم</td>
            <td colspan="2" class="color-blue">{{$project->str_designed_by->ar_name1}}
                {{$project->str_designed_by->ar_name2}} {{$project->str_designed_by->ar_name5}}</td>
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



    </div>
    </div>
</body>

</html>