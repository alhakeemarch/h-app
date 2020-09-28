<html lang="AR" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تقرير فني أرض فضاء</title>
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
  {{-- <table style="border: none;">
    <tr style="border: none;">
      <td colspan="2" style="border: none;"></td>
      <td style="border: none;">
        <span>التاريخ: </span>
        <span>{{(Carbon\Carbon::now())->toDateString()}} م</span>

  </td>
  </tr>
  </table> --}}
  {{-- ---------------------------------------------------------------------------------------------------------- --}}
  <h1 class="txt-center main-title">تقرير فني</h1>
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
    <tr>
      <td>رقم الرخصة</td>
      <td colspan="2">{{$project->last_rokhsa_no}}</td>
      <td>تاريخ الرخصة</td>
      <td colspan="2">{{$project->last_rokhsa_issue_date}}</td>
    </tr>
  </table>
  {{-- ---------------------------------------------------------------------------------------------------------- --}}
  <p>
    بالإشارة إلى المشروع المذكور بياناته أعلاه فإنه نفيدكم بأنه تم الوقف بالموقع وتبين أن الأرض فضاء ولم يبدأ بها العمل
    حتى تاريخه، مرفق صور من الطبيعة.
  </p>
  {{-- ---------------------------------------------------------------------------------------------------------- --}}
  <p class="txt-center">وتقبلوا خالص التحية ،،،</p>
  {{-- ---------------------------------------------------------------------------------------------------------- --}}
  <table style="border: none;">
    <tr style="border: none;">
      <td colspan="1" style="border: none;"></td>
      <td style="border: none;" class="main-title txt-center">م. عبدالرزاق حكيم</td>
    </tr>
  </table>
  {{-- ---------------------------------------------------------------------------------------------------------- --}}
</body>

</html>