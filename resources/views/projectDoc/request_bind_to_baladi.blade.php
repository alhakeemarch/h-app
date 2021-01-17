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
<table class="main-title" style="text-align: start;">
    <tr>
        <td>سعادة مدير إدارة رخص المباني &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; الموقر</td>
    </tr>
</table><br><br>
<table class="txt-center" style="font-family:aealarabiya;">
    <tr>
        <td>السلام عليكم ورحمة الله وبركاته</td>
    </tr>
</table><br><br>
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
    <tr>
        <td>رقم الرخصة</td>
        <td colspan="2">{{$project->last_rokhsa_no}}</td>
        <td>تاريخ الرخصة</td>
        <td colspan="2">{{$project->last_rokhsa_issue_date}}</td>
    </tr>
    <tr>
        <td>القرار المساحي</td>
        <td colspan="2">{{$project->qarar_masahe_no }}</td>
        <td>تاريخه</td>
        <td colspan="2">{{$project->qarar_masahe_issue_date}}</td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<p>بالإشارة إلى المشروع المذكور بياناته أعلاه نرجو منكم التكرم بربط الرخصة السابقة بنظام بلدي وتزويدنا برقم الرخصة
    وتاريخها حتى يتسنى لنا تقديم المعاملة على نظام بلدي.</p>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<p class="txt-center" style="font-family:aealarabiya;">وتقبلوا خالص التحية ،،،</p>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td></td>
        <td class="office-signature">م. عبدالرزاق حكيم</td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}