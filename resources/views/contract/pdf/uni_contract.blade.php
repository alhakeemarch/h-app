@include('contract.pdf.header')
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<style>
    table {
        font-size: 90%;
    }

</style>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="title">نطاق العمل</td>
    </tr>
    <tr>
        <td>
            <ul>
                @foreach ($project_contracts as $contract)
                {!!$contract->contract_type->terms!!}
                @endforeach





                <span style="font-size: 115%; text-decoration: underline;">ملاحظات عامة</span>
                <li>تكون الخدمات الهندسية وفق الأنظمة والاشتراطات للجهات ذات العلاقة وطبقاً لكود البناء السعودي.</li>
                <li>لا يشمل العقد اي خدمة غير مذكورة بجدول الدفعات.</li>
                <li>لا يشمل العقد الرسوم الحكومة او اي رسوم تدفع لأي جهة اخرى.</li>
                <li>لا يشمل العقد قيمة او رسوم مستند او خدمة من جهة خارجية مثل اتعاب تقرير التربة او عقد النظافة وغيرها.
                </li>
            </ul>
        </td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<x-pdf_page_break />
{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- <div>&nbsp;</div> --}}
<table>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td class="title">الخدمات والأسعار</td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="tbl-bordered txt-center">
    <tr>
        <th>#</th>
        <th colspan="6">الخدمة</th>
        <th colspan="2">القيمة</th>
        <th colspan="2">VAT({{$total_arr['vat_percentage']}}%)</th>
        <th colspan="2">الإجمالي</th>
    </tr>
    @php $n=1; @endphp
    @foreach ($project_contracts as $contract)
    <tr>
        <td>{{$n}}</td>
        <td colspan="6">{{$contract->contract_type->name_ar}}
            @if ($contract->contract_type_id == 39)
            <span>(مرحلة العظم)</span>
            @endif
            @if ($contract->monthly_fee ?? false)
            <div class="txt-center">
                <small>
                    <span>الدفعات الشهرية</span>
                    ({{intval($contract->monthly_fee)}}) <span>ريال</span>
                    <span>تضاف لها الضريبة عند التعاقد</span>
                </small>
            </div>
            @endif
        </td>
        <td colspan="2">{{$contract->cost}}</td>
        <td colspan="2">{{$contract->vat_value}}</td>
        <td colspan="2">{{$contract->price_withe_vat}}</td>
    </tr>
    {{-- ------------------------------------------------------------------------ --}}
    @if ($contract->contract_type_id == 39)
    <tr>
        <td></td>
        <td colspan="6">{{$contract->contract_type->name_ar}}
            <span>(مرحلة التشطيب)</span>
            <span>{{$contract->count_of_defined_visits ?? 'x' }}</span>
            <span>زيارة</span>
        </td>
        <td colspan="2">{{$contract->cost_of_defined_visits}}</td>
        <td colspan="2">{{$contract->cost_of_defined_visits * 0.15}}</td>
        <td colspan="2">{{$contract->cost_of_defined_visits *1.15}}</td>
    </tr>
    @endif
    {{-- ------------------------------------------------------------------------ --}}
    @php $n++; @endphp
    @endforeach
    @foreach ($project_services as $project_service)
    <tr>
        <td>{{$n}}</td>
        <td colspan="6">{{$project_service->name_ar}}</td>
        <td colspan="2">{{$project_service->price}}</td>
        <td colspan="2">{{$project_service->vat_value}}</td>
        <td colspan="2">{{$project_service->price_withe_vat}}</td>
    </tr>
    @php $n++; @endphp
    @endforeach
    <tr style="background-color:#fffbee; opacity: 0.2;">
        <td colspan="7">الإجمالي</td>
        <td colspan="2">{{$total_arr['total_cost']}}</td>
        <td colspan="2">{{$total_arr['total_vat']}}</td>
        <td colspan="2">{{$total_arr['total_price_withe_vat']}}</td>
    </tr>
    <tr>
        <th colspan="13" class="" style="text-align: justify;">
            <span>الإجمالي شامل ضريبة القيمة المضافة وقدره</span>
            <span>({{$total_arr['total_price_withe_vat_text']}})</span>
            <span>فقط لا غير.</span>
        </th>
    </tr>
</table> <br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>اتفق الطرفان بان يتم دفع المبلغ كالتالي:</td>
    </tr>
    <tr>
        <td>بالنسبة لأعمال التصميم:</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>الدفعة الأولى 50% من اجمالي قيمة العقد عند توقيع العقد</li>
                <li>الدفعة الثانية 35% من اجمالي قيمة العقد عند الإنتهاء من الفكرة الإبتدائية</li>
                <li>الدفعة الأخيرة 15% عند الإنتهاء من كل الأعمال وقبل استخراج رخصة الإنشاء</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>بالنسبة لباقي الخدمات:</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>تدفع كامل قيمة الخدمة قبل البدء في الأعمال.</li>
            </ul>
        </td>
    </tr>
</table><br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}

@include('contract.pdf.footer')