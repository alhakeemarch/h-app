<!doctype html>
<html lang="AR" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تعهد السور</title>
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
        {{$project->owner_name_ar}}
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
        {{$project->person->national_id}}
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
        {{$office_data->name_ar}}
      </td>
    </tr>
    <tr>
      <td style="border: none;"></td>
      <td style="border: none;">إسم المسؤول وصفته:
        <span>{{$project->project_manager->job_title}}</span><br>
        <span>{{$project->project_manager->ar_name1.' '.$project->project_manager->ar_name2 .' '.$project->project_manager->ar_name5}}</span>
      </td>
    </tr>
    <tr>
      <td style="border: none;"></td>
      <td style="border: none;">الختم و التوقيع:</td>
    </tr>
  </table>

  </div>
  </div>
</body>

</html>