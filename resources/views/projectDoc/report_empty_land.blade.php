<x-pdf_print_style />
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
  <tr>
    <td></td>
    <td></td>
    <td>التاريخ: {{$date_and_time['h_date_ar']}} هـ</td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<br><br>
<table class="txt-center main-title">
  <tr>
    <td>
      تقرير فني
    </td>
  </tr>
</table><br><br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="tbl-bordered">
  <tr>
    <td>اسم المالكـ</td>
    <td colspan="2">{{$project->owner_name_ar ??''}}</td>
    <td>رقم الهوية</td>
    <td colspan="2">{{$project->person->national_id ??''}}</td>
  </tr>
  <tr>
    <td>رقم الصكـ</td>
    <td colspan="2">{{$project->plot->deed_no ??''}}</td>
    <td>تاريخه</td>
    <td colspan="2">{{$project->plot->deed_date ??''}}</td>
  </tr>
  <tr>
    <td>رقم المخطط</td>
    <td colspan="2">{{$project->plot->plan->plan_ar_name ??''}}</td>
    <td>رقم القطعة</td>
    <td colspan="2">{{$project->plot->plot_no ??''}}</td>
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
    <td colspan="2">{{$project->person->mobile ??''}}</td>
  </tr>
  <tr>
    <td>رقم الرخصة</td>
    <td colspan="2">{{$project->last_rokhsa_no}}</td>
    <td>تاريخ الرخصة</td>
    <td colspan="2">{{$project->last_rokhsa_issue_date}}</td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<p>بالإشارة إلى المشروع المذكور بياناته أعلاه فإنه نفيدكم بأنه تم الوقف بالموقع وتبين أن الأرض فضاء ولم يبدأ بها العمل
  حتى تاريخه، مرفق صور من الطبيعة.</p>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<p class="txt-center">وتقبلوا خالص التحية ،،،</p>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
  <tr>
    <td></td>
    <td class="main-title txt-center">م. عبدالرزاق حكيم</td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}