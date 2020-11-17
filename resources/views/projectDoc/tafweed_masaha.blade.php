<x-pdf_print_style />
<style>
  table,
  th,
  td {
    border: 0.5px, solid, gray;
    padding-right: 4px;
    padding-left: 4px;
    font-size: 97%;
    line-height: 1.65;
  }

</style>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table style="border: none;">
  <tr style="border: none;">
    <td colspan="2" style="border: none;">إدارة المساحة وتنفيذ
      المخططات</td>
    <td colspan="4" style="border: none;">
      خاص بيانات الموقع للمخططات المعتمدة فقط</td>
  </tr>
</table> <br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
  <tr>
    <td colspan="3" class=" bg-blue-1">
      أمانة منطقة المدينة المنورة
      <br>
      الادارة العامة للتخطيط العمراني
      <br>
      وكالة التعمير
    </td>
    <td colspan="3" class="main-title bg-green-2">
      <span class="">تفويض + اقرار + تعهد</span>
    </td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
  <tr>
    <td colspan="1">الرقم</td>
    <td colspan="2"></td>
    <td colspan="1">التاريخ</td>
    <td colspan="2">{{(Carbon\Carbon::now())->toDateString()}} م</td>
  </tr>
  <tr>
    <td colspan="1">اسم المالك</td>
    <td colspan="2" class="bg-green-1">{{$project->owner_name_ar ??''}}</td>
    <td colspan="1">رقم الهوية</td>
    <td colspan="2" class="bg-green-1">{{$project->owner_national_id ??''}}</td>
  </tr>
  <tr>
    <th>رقم الحفيظة</th>
    <td class="bg-green-1">{{$project->person->hafizah_no ??''}}</td>
    <th>تاريخها</th>
    <td class="bg-green-1"></td>
    <th>مصدرها</th>
    <td class="bg-green-1"></td>
  </tr>
  <tr>
    <td colspan="1">المخطط</td>
    <td colspan="2" class="bg-green-1">
      {{$project->plot->plan->plan_ar_name ??''}}
    </td>
    <td colspan="1">رقمه</td>
    <td colspan="2" class="bg-green-1">{{$project->plot->plan->plan_no ??''}}</td>
  </tr>
  <tr>
    <td colspan="1">رقم الصك</td>
    <td colspan="2" class="bg-green-1">{{$project->plot->deed_no ??''}}</td>
    <td colspan="1">تاريخه</td>
    <td colspan="2" class="bg-green-1">{{$project->plot->deed_date ??''}}</td>
  </tr>
  <tr>
    <th colspan="1">اسم المكتب</th>
    <td colspan="2" class="bg-green-1">{{$office_data->name_ar ??''}}
    </td>
    <th colspan="1">رقم القطعه</th>
    <td colspan="2" class="bg-green-1">{{$project->plot->plot_no ??''}}</td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table style="border: none;">
  <tr style="border: none;">
    <td style="border: none;"></td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="txt-center">
  <tr>
    <td colspan="1" class="bg-blue-1 txt-center">
      <span class="txt-center">
        <br><br>
        <span>تفويض</span><br>
        <span>للمكتب</span><br>
        <span>الهندسي</span>
      </span>
    </td>
    <td colspan="5" class="bg-green-1"><span>اقر أنا الموقع اسمي اعلاه , و انا باتم الاوصاف المعتبره شرعا بصفتي المالك
        للعقار المملوك بالصك الموضحه بياناته اعلاه . بأنني قد فوضت المكتب المذكور للقيام بمتابعة و انهاء اجراءات
        المعاملة الخاصة باصدار بيانات موقع و قرار مساحي والفرز والدمج . و اتعهد بما يلي :</span>
      <ol>
        <li>
          في حال الغاء التفويض ابلاغ امانة المدينه المنوره و المكتب المفوض خطيا و ارفاق ما يفيد بابراء الذمه من المكتب
          المفوض .
        </li>
        <li>
          لا يحق لي أو لاي طرف من جهتي استلام اي اوراق او مستندات او وثائق تخص المعامله و أن المكتب هو المسئول عن
          استلام تلك الوثائق .
        </li>
      </ol>
    </td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table style="border: none;">
  <tr style="border: none;">
    <td style="border: none;"></td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
  <tr>
    <td colspan="1" class="bg-blue-1 txt-center">
      <span class="txt-center">
        <span>اقرار</span><br>
        <span>استلام</span><br>
        <span>الموقع</span>
      </span>
    </td>
    <td colspan="5" class="bg-green-1">
      اقر أنا الموقع اسمي اعلاه بعدم البدء بالعمل في موقعي الموضح بياناته اعلاه الا بعد الرجوع للمكتب
      الهندسي الذي قام بتثبيت القطعه و ذلك لتسليم الموقع للمكتب المشرف على التنفيذ . و اتحمل مسئولية أي
      خطأ يحدث نتيجة عدم الالتزام بذلك . و على ذلك اوقع
    </td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table style="border: none;">
  <tr style="border: none;">
    <td style="border: none;"></td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
  <tr>
    <th colspan="1" class="bg-blue-1 txt-center">
      <span class="txt-center">
        <span>تعهد بمراجعة</span><br>
        <span>البلدية الفرعية</span><br>
        <span>قبل البدء</span><br>
        <span>في العمل</span>
      </span>
    </th>
    <td colspan="5" class="bg-green-1">
      اتعهد أنا الموقع اسمي اعلاه بأن اقوم بمراجعة البلدية الفرعية قبل البدء في العمل و فتح ملف متابعه للمبنى لدى
      إدارة المراقبة بالبلدية و تقديم المستندات المطلوبة الموضحه ادناه:
      <br>
      <span><span> O </span>صورة مصدقة من الصك.</span>
      <span><span> O </span>كروكي استدلالي للموقع .</span> <br>
      <span><span> O </span>صورة من عقد الاشراف للمباني أربعه أدوار فأكثر .</span>
      <span><span> O </span>نسخة من المخططات المعمارية مقاس (A3)</span><br>
      <span><span> O </span>صورة من محضر استلام المقاول للموقع من قبل المثبت له مساحيا.</span>
      <span><span> O </span>ملف علاقي.</span>
    </td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table style="border: none;">
  <tr style="border: none;">
    <td style="border: none;"></td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="txt-center">
  <tr>
    <td colspan="4">المكتب الهندسي</td>
    <td colspan="3" class="bg-green-2">المالك</td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="txt-center">
  <tr>
    <td colspan="2">اسم مندوب المكتب</td>
    <td colspan="2" rowspan="6">ختم المكتب</td>
    <td class="bg-green-1">التاريخ</td>
    <td colspan="2" class="bg-green-1">{{(Carbon\Carbon::now())->toDateString()}} م</td>
  </tr>
  <tr>
    <td colspan="2">{{'محمود غنيم'}}</td>
    <td colspan="3" class="bg-green-1">تم اطلاعي على كافة المحتويات اعلاه وعلى ذلك اوقع</td>
  </tr>
  <tr>
    <td colspan="2">
      <br>
      <br>
      <br>
      التوقيع: ..................
      <br>
      <br>
    </td>
    <td colspan="3" class="bg-green-1">
      <br>
      <br>
      <br>
      التوقيع: ..................
      <br>
      <br>
    </td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td class="bg-green-1">الجوال</td>
    <td colspan="2" class="bg-green-1">{{$project->person->mobile ??''}}</td>
  </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}