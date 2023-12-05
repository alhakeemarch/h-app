<x-pdf_print_style />
{{-- ---------------------------------------------------------------------------------------------------------- --}}
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
            {{$_['organization_title'] ?? $_['owner_title']}}:
            {{$_['owner_name'] ?? $_['representative_name_ar'] ??''}}
        </td>
        <td>
            {{$_['organization_suffix'] ?? $_['owner_suffix'] ?? ''}}
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
            @if ($_['district_name'] ?? false)
            <span>{{$_['district_name']}}</span>
            @else
            <span>المدينة المنورة</span>
            @endif
            @if ($_['neighbor_name'] ?? false)
            <span>-</span>
            <span>{{$_['neighbor_name']}}</span>
            @endif
            @if ($_['plan_number'] ?? false)
            <span>بالمخطط رقم</span>
            <span>{{$_['plan_number']}}</span>
            @endif
            <span>بالقطعة رقم</span>
            <span>{{$_['plot_no']}}</span>
            <span>بموجب الصك رقم</span>
            <span>{{$_['deed_no']}}</span>
            <span>وتاريخ</span>
            <span>{{$_['deed_date']}}</span>
            @if ($_['required_use'] ?? false)
            <span>والذي ترغبون بإنشاء مشروع</span>
            <span>({{$_['required_use']}})</span>
            @endif
            <span>.</span>
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
        <td colspan="2">{{number_format($contract->cost)}}</td>
        <td colspan="2">{{number_format($contract->vat_value)}}</td>
        <td colspan="2">{{number_format($contract->price_withe_vat)}}</td>
    </tr>
    {{-- ------------------------------------------------------------------------ --}}
    {{-- to add cost_of_defined_visits --}}
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
        <td colspan="2">{{number_format($total_arr['total_cost'])}}</td>
        <td colspan="2">{{number_format($total_arr['total_vat'])}}</td>
        <td colspan="2">{{number_format($total_arr['total_price_withe_vat'])}}</td>
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

{{-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100" height="100" viewBox="0 0 100 100">
    <rect x="0" y="0" width="100" height="100" fill="#ffffff"></rect>
    <g transform="scale(4.762)">
        <g transform="translate(0,0)">
            <path fill-rule="evenodd"
                d="M9 0L9 1L8 1L8 3L9 3L9 4L8 4L8 8L6 8L6 9L5 9L5 10L4 10L4 8L3 8L3 9L2 9L2 8L0 8L0 10L1 10L1 9L2 9L2 10L4 10L4 11L3 11L3 12L1 12L1 13L5 13L5 11L7 11L7 12L6 12L6 13L8 13L8 15L9 15L9 16L10 16L10 18L9 18L9 17L8 17L8 18L9 18L9 19L8 19L8 21L9 21L9 20L10 20L10 18L12 18L12 19L13 19L13 20L11 20L11 21L13 21L13 20L15 20L15 21L16 21L16 20L15 20L15 19L18 19L18 18L20 18L20 19L21 19L21 15L20 15L20 14L21 14L21 13L20 13L20 14L19 14L19 13L18 13L18 14L16 14L16 12L18 12L18 10L20 10L20 11L19 11L19 12L21 12L21 9L20 9L20 8L18 8L18 10L17 10L17 11L16 11L16 12L14 12L14 13L15 13L15 15L16 15L16 16L14 16L14 14L13 14L13 15L11 15L11 14L12 14L12 13L13 13L13 12L12 12L12 11L14 11L14 10L16 10L16 9L17 9L17 8L14 8L14 10L12 10L12 11L11 11L11 10L10 10L10 9L11 9L11 8L13 8L13 4L12 4L12 3L13 3L13 2L12 2L12 1L13 1L13 0L11 0L11 2L12 2L12 3L11 3L11 4L12 4L12 5L11 5L11 6L10 6L10 7L9 7L9 4L10 4L10 0ZM11 6L11 7L12 7L12 6ZM8 8L8 9L9 9L9 8ZM6 9L6 10L7 10L7 11L8 11L8 13L9 13L9 12L10 12L10 13L12 13L12 12L11 12L11 11L10 11L10 10L7 10L7 9ZM10 15L10 16L11 16L11 15ZM17 15L17 17L20 17L20 15ZM12 16L12 18L13 18L13 19L15 19L15 17L14 17L14 16ZM17 20L17 21L18 21L18 20ZM19 20L19 21L20 21L20 20ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM14 0L14 7L21 7L21 0ZM15 1L15 6L20 6L20 1ZM16 2L16 5L19 5L19 2ZM0 14L0 21L7 21L7 14ZM1 15L1 20L6 20L6 15ZM2 16L2 19L5 19L5 16Z"
                fill="#000000"></path>
        </g>
    </g>
</svg> --}}