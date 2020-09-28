<html lang="AR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>تفويض</title>
    <x-pdf_print_style />
</head>

<body>
    <table>
        <tr>
            <td class="main-title txt-center">
                تفويض
            </td>
        </tr>
    </table>

    <table>
        <span>التاريخ:</span>
        <span>{{(Carbon\Carbon::now())->toDateString()}}</span>
        <span>مـ</span>
    </table>
    <p><span>أفوض أنا</span>
        <span>{{$project->owner_name_ar}}</span>
        <span>رقم السجل المدني</span>
        <span>({{$project->owner_national_id}})</span>
        <span>وأنا بأتم الأوصاف المعتبرة شرعاً، وبصفتي: مالك العقار بموجب بالصك الشرعي رقم</span>
        <span>({{$project->plot->deed_no}})</span>
        <span>بتاريخ</span>
        <span>{{$project->plot->deed_date}}</span>
        <span>هـ الصادر من كتابة العدل الواقع بمنطقة</span>
        <span> {{$project->plot()->first()->district()->first()->ar_name}} </span>
        <span>حي:</span>
        <span> {{$project->plot()->first()->neighbor()->first()->ar_name}} </span>
        <span>
            بأنني قد فوضت مكتب المهندس عبد الرزاق حكيم للاستشارات الهندسية (تصميم وإعداد المخططات الهندسية
            وكافةالأعمال المساحية ومتابعة إنهاء إجراءاتها الفنية والإدارية لدى الأمانة وجهات الاختصاص كالدفاع المدني
            وشركة الكهرباء وهيئة السياحة ووزارة الإسكان ... إلخ وذلك حتى استخراج رخصة الإنشاء واستلامها، واستلام
            المخططات المصادق عليها من
            الأمانة إن وجد).</span>
    </p>

    <p>أخرى:
        (.........................................................................................................................)
    </p>

    <table>
        <tr>
            <td class="title"> وأتعهد بما يلي:</td>
        </tr>
    </table>
    <ol>
        <li>
            في حال إلغاء هذا التفويض إبلاغ الأمانة والمكتب المفوض خطياً بذلك، وأقدم للأمانة ما يفيد إبراء ذمة من
            المكتب
            المفوض.
        </li>
        <li>
            لا يحق لي أو لأحد من طرفي استلام رخصة الإنشاء أو المخططات الابتدائية أو النهائية أو الرفوعات المساحية أو
            بيانات الموقع أو قرارات الذرعة أو أي وثائق تتعلق بمعاملتي موضوع هذا
            التفويض من الأمانة وأن المكتب وحده المسئول عن استلام هذه الوثائق والمستندات والمخططات.
        </li>
    </ol>
    <div class="txt-center">وعليه جرى التوقيع</div>

    <table>
        <tr>
            <td colspan="7">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <span class="txt-bold">اسم المفوض:</span>
                <span>{{$project->owner_name_ar}}</span>
            </td>
            <td colspan="2">
                <span class="txt-bold highlight">التوقيع:</span>
                <span> ....................... </span>
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td colspan="7">في حالة الوكيل</td>
        </tr>
        <tr>
            <td>رقم الوكالة</td>
            <td colspan="2"></td>
            <td>تاريخها:</td>
            <td></td>
            <td>مصدرها: </td>
            <td></td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td colspan="7">
                أقر أنا الموضح اسمي ادناه بأن الشخص المفوض قام بالتوقيع أمامي :
            </td>
        </tr>
        <tr>
            <td colspan="3"> <span class="txt-bold">الاسم: م.</span>
                <span>{{$project->project_manager->ar_name1.' '.$project->project_manager->ar_name2 .' '.$project->project_manager->ar_name5}}</span>
            </td>
            <td colspan="2">
                <span class="txt-bold">الصفة:</span>
                <span>{{$project->project_manager->job_title}}</span></td>
            <td colspan="2"><span class="txt-bold">التوقيع:</span>
                <span> ...................... </span>
            </td>
        </tr>
    </table>
    <div></div>
    <table>
        <tr>
            <td colspan="3"></td>
            <td>الختم المعتمد للمكتب</td>
        </tr>
    </table>


</body>

</html>