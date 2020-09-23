@php
$mytime = Carbon\Carbon::now();
// echo $mytime->toDateTimeString();
$name = $project->owner_name_ar;
$n_id = $project->owner_national_id;
$deed_no = $project->plot()->deed_no ?? 'num';
$deed_date = $project->plot()->deed_no ?? 'num';
$district_name = $project->district_id;
$neighbor_name = $project->neighbor_id;
$responsable_name = $Project_manager->ar_name1.' '.$Project_manager->ar_name2.' '.$Project_manager->ar_name5 ;
$responsable_jop_tital = $Project_manager->job_title;
@endphp
<style>
    * {
        text-align: justify;
        text-justify: inter-word;
        vertical-align: middle;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    h1 {
        font-family: 'ptboldheading', 'Times New Roman', Times, serif;
        font-size: 200%;
    }

    h3,
    .title {
        font-weight: bold;
        font-size: 130%;
        /* background-color: #d7b77e; */
        background-color: #FFF2CC;
        line-height: 140%;
    }

    table {
        /* border: 1px, solid, black; */
        /* width: 100%; */
    }

    td {
        /* border: 1px, solid, black; */
    }

    .txt-center {
        text-align: center;
    }

    .highlight {
        background-color: yellow;
        max-width: fit-content;
    }

    .txt-bold {
        font-weight: bold;
        font-size: 110%;
    }

</style>
{{-- ---------------------------------------------------------- --}}
<main>
    <h1 class="txt-center">تفويض</h1>
    <div></div>
    <div>
        <span>التاريخ:</span>
        <span>{{$mytime->toDateString()}}</span>
        <span>مـ</span>
    </div>
    <p><span>أفوض أنا</span>
        <span>{{$name}}</span>
        <span>رقم السجل المدني</span>
        <span>({{$n_id}})</span>
        <span>وأنا بأتم الأوصاف المعتبرة شرعاً، وبصفتي: مالك العقار بموجب بالصك الشرعي رقم</span>
        <span>({{$deed_no}})</span>
        <span>بتاريخ</span>
        <span>{{$deed_date}}</span>
        <span>هـ الصادر من كتابة العدل الواقع بمنطقة</span>
        <span> {{$district_name}} </span>
        <span>حي:</span>
        <span> {{$neighbor_name}} </span>
        <span>
            بأنني قد فوضت مكتب المهندس عبد الرزاق حكيم للاستشارات الهندسية (تصميم وإعداد المخططات الهندسية
            وكافةالأعمال المساحية ومتابعة إنهاء إجراءاتها الفنية والإدارية لدى الأمانة وجهات الاختصاص كالدفاع المدني
            وشركة الكهرباء وهيئة السياحة ووزارة الإسكان ... إلخ وذلك حتى استخراج رخصة الإنشاء واستلامها، واستلام
            المخططات المصادق عليها من
            الأمانة إن وجد).</span>
    </p>

    <p>أخرى:(................................................................) </p>
    <div></div>
    <table>
        <tr>
            <td class="title"> وأتعهد بما يلي:</td>
        </tr>
    </table>
    <ol>
        <li>
            في حال إلغاء هذا التفويض إبلاغ الأمانة والمكتب المفوض خطياً بذلك، وأقدم للأمانة ما يفيد إبراء ذمة من المكتب
            المفوض.
        </li>
        <li>
            لا يحق لي أو لأحد من طرفي استلام رخصة الإنشاء أو المخططات الابتدائية أو النهائية أو الرفوعات المساحية أو
            بيانات الموقع أو قرارات الذرعة أو أي وثائق تتعلق بمعاملتي موضوع هذا
            التفويض من الأمانة وأن المكتب وحده المسئول عن استلام هذه الوثائق والمستندات والمخططات.
        </li>
    </ol>
    <div></div>
    <div class="txt-center">وعليه جرى التوقيع</div>
    <div></div>
    <hr>
    <div></div>
    <table>
        <tr>
            <td colspan="5"> <span class="txt-bold">اسم المفوض: </span> <span>{{$name}}</span></td>
            <td><span class="txt-bold highlight"> التوقيع:</span></td>
            <td></td>
        </tr>
    </table>
    <p>
        في حالة الوكيل
    </p>
    <table>
        <tr>
            <td>رقم الوكالة</td>
            <td colspan="2"></td>
            <td>تاريخها:</td>
            <td></td>
            <td>مصدرها: </td>
            <td></td>
        </tr>
    </table>
    <div></div>
    <p>أقر أنا الموضح اسمي ادناه بأن الشخص المفوض قام بالتوقيع أمامي :</p>
    <table>
        <tr>
            <td colspan="2"> <span class="txt-bold">الاسم: م.</span> <span>{{$responsable_name}}</span></td>
            <td colspan="2"> <span class="txt-bold">الصفة:</span> <span>{{$responsable_jop_tital}}</span></td>
            <td><span class="txt-bold"> التوقيع:</span></td>
            <td></td>
        </tr>
    </table>
    <div></div>
    <table>
        <tr>
            <td colspan="3"></td>
            <td>الختم المعتمد للمكتب</td>
        </tr>
    </table>
    <div></div>
    <div></div>
    <hr style="line-height: 1px;">
    <p style="font-size: 11px; line-height: 3px;">
        ملاحظة: هذا التفويض يخص هذه المعاملة فقط، وينتهي مفعوله بانتهاءالمعاملة لدى الأمانةأو إلغاءه من أحدالطرفين.
    </p>
</main>