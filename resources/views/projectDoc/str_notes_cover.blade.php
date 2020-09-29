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
            border: 1px, solid, black;
        }

    </style>
</head>

<body>
    {{-- ---------------------------------------------------------------------------------------------------------- --}}
    <h1 class="main-title txt-center">غلاف المذكرة الإنشائية</h1>
    {{-- ---------------------------------------------------------------------------------------------------------- --}}
    <table>
        <tr>
            <td>اسم المالكـ</td>
            <td colspan="2">{{$project->owner_name_ar}}</td>
            <td>رقم الهوية</td>
            <td colspan="2">{{$project->person->national_id}}</td>
        </tr>
        <tr>
            <td>رقم الصكـ</td>
            <td colspan="2">{{$project->plot->deed_no}}</td>
            <td>تاريخه</td>
            <td colspan="2">{{$project->plot->deed_date}}</td>
        </tr>
        <tr>
            <td>رقم المخطط</td>
            <td colspan="2">{{$project->plot->plan->plan_ar_name}}</td>
            <td>رقم القطعة</td>
            <td colspan="2">{{$project->plot->plan->plan_no}}</td>
        </tr>
        <tr>
            <td>اسم الوكيـل</td>
            <td colspan="2"></td>
            <td>رقم الهوية</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>رقم الوكالة</td>
            <td colspan="2"></td>
            <td>رقم الجوال</td>
            <td colspan="2">{{$project->person->mobile}}</td>
        </tr>
    </table>
    {{-- ---------------------------------------------------------------------------------------------------------- --}}



    </div>
    </div>
</body>

</html>