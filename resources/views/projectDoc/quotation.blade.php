<x-pdf_print_style />
{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- {{dd($date_and_time)}} --}}
<br> <br style="line-height: 30%;">
<table class="text-small aljazeera-font">
    <tr>
        <td colspan="6"></td>
        <td colspan="2">
            <span>التاريخ:</span>
            <span>{{$date_and_time['h_date_ar']}}</span>
            <span>هـ</span><br>
            <span>الموافق:</span>
            <span>{{$date_and_time['g_date_ar']}}</span>
            <span>مـ</span>
        </td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="main-title txt-center">
            عرض سعر
        </td>
    </tr>
</table><br><br style="line-height: 50%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
@if (isset($quotation->id))
@if ($quotation->is_address_to_before_owner)
<table>
    <tr>
        <td colspan="2">
            {{$quotation->address_to_title()->first()->name_ar}}:
            {{$quotation->address_to_name}}
        </td>
        <td>
            {{$quotation->address_to_title()->first()->suffix_ar}}
        </td>
    </tr>
</table>
@endif
@endif
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td colspan="2">
            {{$project->person()->first()->person_title()->first()->name_ar}}:
            {{$project->person()->first()->get_full_name_ar()}}
        </td>
        <td>
            {{$project->person()->first()->person_title()->first()->suffix_ar}}
        </td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
@if (isset($quotation->id) )
@if (($quotation->address_to_name) && (! $quotation->is_address_to_before_owner))
<table>
    <tr>
        <td colspan="2">
            {{$quotation->address_to_title()->first()->name_ar}}:
            {{$quotation->address_to_name}}
        </td>
        <td>
            {{$quotation->address_to_title()->first()->suffix_ar}}
        </td>
    </tr>
</table>
@endif
@endif
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<br><br style="line-height: 50%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="aljazeera-font txt-center">
            السلام عليكم ورحمة الله وبركاته
        </td>
    </tr>
</table><br><br style="line-height: 50%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>
            <span>بالإشارة إلى المشروع الخاص بكم الواقع في</span>
            @if ($project->plot->district_id)
            <span>{{$project->plot()->first()->district()->first()->ar_name}}</span>
            @else
            <span>المدينة المنورة</span>
            @endif
            @if ($project->plot->neighbor_id)
            <span>حي</span>
            <span>{{$project->plot()->first()->neighbor()->first()->ar_name}}</span>
            @endif
            @if ($project->plot->plan_id)
            <span>بالمخطط رقم</span>
            <span>{{$project->plot()->first()->plan()->first()->plan_no}}</span>
            @endif
            <span>بالقطعة رقم</span>
            <span>{{$project->plot->plot_no}}</span>
            <span>بموجب الصك رقم</span>
            <span>{{$project->plot->deed_no}}</span>
            <span>وتاريخ</span>
            <span>{{$project->plot->deed_date}}</span>.
        </td>
    </tr>
    <tr>
        <td>
            <span>وبناء على رغبتكم في خدماتنا الهندسية فإنه يشرفنا أن نتقدم لكم بعرض سعر طبقاً للجدول التالي:</span>
        </td>
    </tr>
</table><br><br>
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
        <td colspan="6">{{$contract->contract_type->name_ar}}</td>
        <td colspan="2">{{$contract->cost}}</td>
        <td colspan="2">{{$contract->vat_value}}</td>
        <td colspan="2">{{$contract->price_withe_vat}}</td>
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
        <td class="aljazeera-font">ملاحظات:</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>يجب توقيع عقود للخدمات المتفق عليها ولا يعتد بعرض السعر.</li>
                <li>مدة هذا العرض عشرة أيام من تاريخه.</li>
                <li>لا يشمل العرض أي رسوم تدفع لأي جهة حكومية أو خاصة.</li>
                <li>الدفعات والإشتراطات طبقاً للعقود.</li>
            </ul>
        </td>
    </tr>
</table><br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="aljazeera-font txt-center">
    <tr>
        <td>
            آملين أن ينال عرضنا على رضائكم وإستحسنانكم وتفضلوا بقبول فائق التحية والتقدير
        </td>
    </tr>
</table><br><br><br>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td></td>
        <td class="office-signature">م. عبدالرزاق حكيم</td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}