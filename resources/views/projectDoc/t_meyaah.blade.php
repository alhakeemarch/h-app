<x-pdf_print_style />
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<br><br><br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<h1 class="main-title txt-center">تعهد</h1>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="tbl-bordered">
  <tr>
    <td>اسم المالكـ</td>
    <td colspan="2">{{$_['owner_name'] ??''}}</td>
    <td>رقم الهوية</td>
    <td colspan="2">{{$_['id_number'] ??''}}</td>
  </tr>
  <tr>
    <td>رقم الصكـ</td>
    <td colspan="2">{{$_['deed_no'] ??''}}</td>
    <td>تاريخه</td>
    <td colspan="2">{{$_['deed_date'] ??''}}</td>
  </tr>
  <tr>
    <td>رقم المخطط</td>
    <td colspan="2">{{$_['plan_name'] ??''}}</td>
    <td>رقم القطعة</td>
    <td colspan="2">{{$_['plot_no'] ??''}}</td>
  </tr>
  <tr>
    <td>اسم الوكيـل</td>
    <td colspan="2"><span>{{$_['representative_name_ar'] ??''}}</span></td>
    <td>رقم الهوية</td>
    <td colspan="2"><span>{{$_['representative_n_id'] ??''}}</span></td>
  </tr>
  <tr>
    <td>رقم الوكالة</td>
    <td colspan="2"><span>{{$_['authorization_no'] ?? ''}}</span></td>
    <td>رقم الجوال</td>
    <td colspan="2">{{$_['representative_mobile'] ?? $_['owner_mobile'] ?? ''}}</td>
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
      {{$_['owner_name'] ??''}}
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
      {{$_['id_number'] ??''}}
    </td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}