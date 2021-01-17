<x-pdf_print_style />
{{-- {{dd($_)}} --}}
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
<p>
  اتعهد أنا المواطن المذكور بياناتي أعلاه بالالتزام بالاتي:
</p>
<ol>
  <li>
    عمل سور حماية مؤقت حول الموقع قبل البدء بالبناء.
  </li>
  <li>
    وضع لوحة ارشادية توضح (عناصر المشروع - اسم المكتب المشرف - رقم الرخصة) وأن تكون في مكان واضح للرؤية.
  </li>
  <li>
    توفير وسائل السلامة والزام المقاول بذلك عند تنفيذ المبنى.
  </li>
  <li>
    رفع مخلفات البناء والمحافظة على نظافة الموقع حسب شروط العقد المبرم.
  </li>
  <li>
    وفي حال عدم التزامي بذلك فاللأمانة الحق في تطبيق الغرامات والجزاءات بما يتوافق مع الانظمة واللوائح.
  </li>
</ol>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<p>المقر بما فيه</p>

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
<p> نتعهد نحن مكتب م .عبدالرزاق حكيم للإستشارات الهندسية بصفتنا المكتب المشرف على مبنى المواطن أعلاه اننا مسؤولون في
  التحقق من التزام المواطن والمقاول بما جاء في التعليمات السابقة وفي حال مخالفتنا لها فللأمانة الحق في اتخاذ الإجراءات
  اللازمة وتطبيق الجزاءات والغرامات وفق ما تقتضيه الأنظمة واللوائح.
</p>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table style="border: none;">
  <tr style="border: none;">
    <td style="border: none;"></td>
    <td style="border: none;">المكتب المشرف :
      {{$office_data->name_ar ??''}}
    </td>
  </tr>
  <tr>
    <td style="border: none;"></td>
    <td style="border: none;">إسم المسؤول وصفته:
      <span>{{$_['project_manager_job_title'] ??''}}</span><br>
      <span>{{$_['project_manager'] ??''}}</span>
    </td>
  </tr>
  <tr>
    <td style="border: none;"></td>
    <td style="border: none;">الختم و التوقيع:</td>
  </tr>
</table>