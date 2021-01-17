<x-pdf_print_style />

<style>
    * {
        text-align: start;
    }

</style>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td colspan="3">المملكة العربية السعودية</td>
        <td colspan="3"></td>
        <td rowspan="4">
            <img src="{{URL::asset('/img/momra-logo.jpg')}}" height="40">
        </td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="3">وزارة الشؤون البلدية والقروية</td>
        <td colspan="9"></td>
    </tr>
    <tr>
        <td colspan="3">امانة منطقة المدينة المنورة</td>
        <td colspan="9"></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="4" style="text-align: center;">تعهد بتنفيذ العزل الحراري</td>
        <td colspan="4"></td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td><span>اقر وأتعهد أنا</span><span>{{$_['owner_name']}}</span>
            <span>مالك العقار الموضحة بياناته أدناه، والمسؤول عن تنفيذ عملية البناء ،بتنفيذ العزل الحراري وتطبيق
                التعليمات الخاصة بذلك فيما يتعلق بالعقار المشار إليه أدناه, وذلك إنفاذاً للأمر السامي الكريم رقم (م ب
                /6927)وتاريخ 1431/9/22هـ القاضي بتطبيق العزل الحراري بشكل إلزامي على جميع المباني .الجديدة سواءً السكنية
                أو التجارية أو أي منشآت أخرى، وأتحمل المسؤولية النظامية الناتجة عن مخالفة ذلك.
            </span>
        </td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>بيانات المالك</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- <table class="tbl-bordered" width="100%" cellpadding="2" cellspacing="0"> --}}
<table class="tbl-bordered">
    <tr>
        <td colspan="3">رقم بطاقة الأحوال المدنية/ الإقامة</td>
        <td colspan="2">{{$_['id_number']}}</td>
        <td colspan="2">تاريخها</td>
        <td colspan="2">{{$_['id_issue_date'] ?? ''}}</td>
    </tr>
    <tr>
        <td colspan="3">مصدرها</td>
        <td colspan="2">{{$_['id_issue_place'] ?? ''}}</td>
        <td colspan="2">الجنسية</td>
        <td colspan="2">{{$_['nationality'] ?? ''}}</td>
    </tr>
    <tr>
        <td colspan="3">رقم الجوال</td>
        <td colspan="2">{{$_['owner_mobile'] ?? $_['representative_mobile'] ?? ''}}</td>
        <td colspan="2">رقم الهاتف</td>
        <td colspan="2">{{$_['phone'] ?? $_['representative_phone'] ?? ''}}</td>
    </tr>
    <tr>
        <td colspan="3">رقم الفاكس</td>
        <td colspan="2"></td>
        <td colspan="2">البريد الإلكتروني</td>
        <td colspan="2">{{$_['email'] ?? $_['representative_email'] ?? ''}}</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>بيانات الموقع</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="tbl-bordered">
    <tr>
        <td colspan="2">رقم الصك</td>
        <td colspan="3">{{$_['deed_no'] ??''}}</td>
        <td colspan="3">تاريخه</td>
        <td colspan="3">{{$_['deed_date'] ??''}}</td>
        <td colspan="1">مصدره</td>
        <td colspan="3">{{$_['deed_issue_place'] ??''}}</td>
    </tr>
    <tr>
        <td colspan="2">المدينة</td>
        <td colspan="3">المدينة المنورة</td>
        <td colspan="3">الحي</td>
        <td colspan="7">
            <span>{{$_['district_name'] ?? ''}}</span> -
            <span>{{$_['neighbor_name'] ?? ''}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="2">الشارع</td>
        <td colspan="3"><span>{{$_['street_name'] ?? '--'}}</span></td>
        <td colspan="3">إحداثيات الموقع</td>
        <td colspan="4">{{$_['x_coordinate'] ?? ''}}</td>
        <td colspan="3">{{$_['y_coordinate'] ?? ''}}</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>بيانات المكتب الهندسي المصمم</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table style="border: gray soled 0.5px; padding-right: 4px; padding-left: 4px;">
    <tr>
        <td style="border-left: gray soled 0.5px;"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td style="border-left: gray soled 0.5px;">اسم المكتب الهندسي</td>
        <td colspan="4"><span>مكتب م. </span><span>{{$office_data->name_ar ??''}}</span></td>
    </tr>
    <tr>
        <td style="border-left: gray soled 0.5px;"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td style="border: gray soled 0.5px;">رقم هاتفه</td>
        <td style="border: gray soled 0.5px;">{{$office_data->phone ??''}}</td>
        <td style="border: gray soled 0.5px;">البريد الإلكتروني</td>
        <td colspan="2" style="border: gray soled 0.5px;">{{$office_data->email ??''}}</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>بيانات العزل الحراري حسب المخططات الهندسية المعتمدة</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="tbl-bordered">
    <tr>
        <td colspan="8" style="font-size: 110%; line-height: 140%;">نوعية مادة العزل الحراري</td>
        <td colspan="2">للجدران</td>
        <td colspan="2">{{$azel_data['walls_material']}}</td>
        <td colspan="2">للسقف</td>
        <td colspan="2">{{$azel_data['ceiling_material']}}</td>
        <td colspan="2">للزجاج</td>
        <td colspan="3">{{$azel_data['window_material']}}</td>
    </tr>
    <tr>
        <td colspan="8" style="font-size: 110%; line-height: 140%;"><span>قيم الإنتقالية
                الحراري</span> <span>(U-Value <br> W/m2K)</span></td>
        <td colspan="2">للجدران</td>
        <td colspan="2">{{$azel_data['walls_value']}}</td>
        <td colspan="2">للسقف</td>
        <td colspan="2">{{$azel_data['walls_value']}}</td>
        <td colspan="2">للزجاج</td>
        <td colspan="3">{{$azel_data['window_value']}}</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>كما أتعهد بمراجعة مكتب خدمات المشتركين بالشركة السعودية للكهرباء الذي يخدم الموقع قبل بداية تنفيذ الهيكل
            الإنشائي وذلك للتنسيق معهم للقيام بزيارات ميدانية للتأكد من تنفيذ العزل الحراري وفي حالة عدم إلتزامي بذلك
            فإني اتحمل مسؤولية عدم إيصال الخدمة الكهربائية للمنشأة.</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td colspan="4"></td>
        <td>الإسم:</td>
        <td colspan="6">{{$_['owner_name']}}</td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>التوقيع:</td>
        <td colspan="6">...........................................................</td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>التاريخ:</td>
        <td colspan="6">{{$date_and_time['h_date_ar']}}</td>
    </tr>
</table><br><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td><span>نحن الموقعون أدناه مكتب</span>
            <span>م.</span>
            <span>{{$office_data->name_ar ??''}}</span>
            <span>المكتب الهندسي المصمم للموقع المشار إليه أعلاه,ترخيص رقم</span>
            <span>{{$office_data->SEC_license_no ??''}}</span>
            <span>وتاريخ</span>
            <span>{{$office_data->SEC_license_issue_date ??'1412/8/7'}}</span>
            <span>نقر بصحة ودقة المعلومات الواردة في هذا التعهد ونقر أن قيم الإنتقالية الحرارية للمبنى وفق اللائحة
                الصادرة عن الهيئة السعودية للمواصفات والمقاييس والجودة رقم (م ق س 2014/6582) ونتحمل المسؤولية الناتجة عن
                عدم صحة تلك المعلومات.
            </span>
        </td>

    </tr>
</table><br><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td colspan="7">اسم المكتب الهندسي المصمم:</td>
        <td colspan="10"><span>مكتب</span> <span>م. {{$office_data->name_ar ??''}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="7">اسم الشخص المسؤول:</td>
        <td colspan="10"></td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="10"></td>
    </tr>
    <tr>
        <td colspan="8">التوقيع:</td>
        <td colspan="9">التاريخ:</td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="10"></td>
    </tr>
    <tr>
        <td colspan="8"></td>
        <td colspan="9">الختم:</td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}