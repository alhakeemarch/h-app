<html lang="AR" dir="rtl">

<head>
  <meta charset="UTF-8">
  <title>تعهد المياه</title>
  <x-pdf_print_style />
  <style>
    table,
    tr,
    td {
      border: 1px, solid, black;
    }

    p {
      font-size: 120%;
    }

  </style>
</head>

<body>
  <h1 class="main-title txt-center">تعهد</h1>
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
</body>

</html>