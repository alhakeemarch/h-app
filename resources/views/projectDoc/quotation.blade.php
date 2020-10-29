<x-pdf_print_style />
<table>
    <tr>
        <td class="main-title txt-center">
            عرض سعر
        </td>
    </tr>
</table>

<table>
    <span>التاريخ:</span>
    <span>{{(Carbon\Carbon::now())->toDateString()}}</span>
    <span>مـ</span>
</table>
<p><span>أفوض أنا</span>
    <span>{{$project->owner_name_ar ?? '....................................................'}}</span>
    <span>رقم السجل المدني</span>
    <span>({{$project->owner_national_id ?? '..........................'}})</span>
    <span>،جوال رقم</span>
    <span>({{$project->person->mobile ?? '..........................'}})</span>
    <span>وأنا بأتم الأوصاف المعتبرة شرعاً، وبصفتي: مالك العقار بموجب بالصك الشرعي رقم</span>
    <span>({{$project->plot->deed_no ?? '..........................'}})</span>
    <span>بتاريخ</span>
    <span>{{$project->plot->deed_date ?? '..........................'}}</span>
    <span>هـ الصادر من كتابة العدل الواقع بمنطقة</span>
    <span>{{$project->plot()->first()->district()->first()->ar_name ?? '..........................'}}</span>
    <span>حي:</span>
    <span>{{$project->plot()->first()->neighbor()->first()->ar_name ?? '..........................'}}</span>
    <span>بأنني قد فوضت مكتب المهندس عبد الرزاق حكيم للاستشارات الهندسية (تصميم وإعداد المخططات الهندسية
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
            @if ($project-> representative_name_ar)
            <span>{{$project-> representative_name_ar}}</span>
            @else
            <span>{{$project->owner_name_ar ?? '..............................................................'}}</span>
            @endif
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
        <td colspan="3">
            <span>رقم الوكالة:</span>
            <span>{{$project-> representative_authorization_no ??'......................................'}}</span>
        </td>
        <td colspan="2">تاريخها: {{$project-> representative_authorization_issue_date ??'.........................'}}
        </td>
        <td colspan="2">مصدرها: {{$project-> representative_authorization_issue_place ??'.......................'}}</td>
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
            <span>{{$project_tame['project_manager'] ?? '...................................' }}</span>
        </td>
        <td colspan="2">
            <span class="txt-bold">الصفة:</span>
            <span>{{$project->project_manager->job_title ?? '......................'}}</span></td>
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