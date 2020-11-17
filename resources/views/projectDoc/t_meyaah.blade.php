<x-pdf_print_style />
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<br><br><br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<h1 class="main-title txt-center">تعهد</h1>
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
    <td colspan="2"><span>{{$project-> representative_name_ar ??''}}</span></td>
    <td>رقم الهوية</td>
    <td colspan="2"><span>{{$project-> representative_national_id ??''}}</span></td>
  </tr>
  <tr>
    <td>رقم الوكالة</td>
    <td colspan="2"><span>{{$project-> representative_authorization_no ?? ''}}</span></td>
    <td>رقم الجوال</td>
    <td colspan="2">
      @if ($project-> representative_name_ar)
      <span>{{$project-> representative_main_mobile_no}}</span>
      @else
      <span>{{$project->person->mobile ??''}}</span>
      @endif
    </td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<p>أتعهد أنا المذكور بياناتي أعلاة بمراجعة شركة المياة لتركيب عداد منفصل لكل وحدة سكنية أو تجارية وتركيب مرشدات مياة
  بالمشروع المذكور.</p>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<div></div>
<div></div>
<table style="border: none;">
  <tr style="border: none;">
    <td style="border: none;"></td>
    <td style="border: none;" class="txt-center">
      المقر بما فيه
    </td>
  </tr>
  <tr style="border: none;">
    <td style="border: none;"></td>
    <td style="border: none;">الإسم:
      {{$project->owner_name_ar ??''}}
    </td>
  </tr>
  <tr style="border: none;">
    <td style="border: none;"></td>
    <td style="border: none;">
      <span class="highlight">التوقيع: </span>
      ..........................................
    </td>
  </tr>
  <tr>
    <td style="border: none;"></td>
    <td style="border: none;">رقم الهوية:
      {{$project->person->national_id ??''}}
    </td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}