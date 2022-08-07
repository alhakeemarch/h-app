<x-pdf_print_style />
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<style>
    .font-90 {
        font-size: 90%;
    }

</style>
<table>
    <tr>
        <td class="txt-center aljazeera-font x-lg-font">فاتورة ضريبية</td>
        <td></td>
    </tr>
    <tr>
        <td class="txt-center consolas-font x-lg-font">VAT Invoice</td>
        <td></td>
    </tr>
</table> <br><br>
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<table class="tbl-bordered txt-center">
    <tr>
        <th colspan="2">رقم الفاتورة:</th>
        <td colspan="3" rowspan="2" align="center"><br style="line-height: 300%;"><span
                class="txt-center">({{$invoice->invoice_no_prefix}}-{{$invoice->invoice_no}})</span>
        </td>
        <th colspan="3" style="border: none; border-top: gray soled 0.5px; border-right: gray soled 0.5px;">
            بيانات البائع</th>
        <th colspan="3" style="border: none; border-top: gray soled 0.5px; border-left: gray soled 0.5px;">
            Seller Information</th>
    </tr>
    <tr>
        <th colspan="2" class="font-90">Invoice NO:</th>
        <td colspan="6">{{$office_data->name_ar}}</td>
    </tr>
    <tr>
        <th colspan="2">التاريخ الهجري</th>
        <td colspan="3">
            {{$date_and_time['hijri_day_no']}} - {{$date_and_time['hijri_month_name_ar']}} -
            {{$date_and_time['hijri_year_no']}}
        </td>
        <td colspan="6">{{$office_data->na_city_ar}}</td>
    </tr>
    <tr>
        <th colspan="2" class="font-90">Hijri Date</th>
        <td colspan="3">{{$date_and_time['h_date_ar']}}</td>
        <td colspan="6" class="font-90">{{$office_data->name_en}}</td>
    </tr>
    <tr>
        <th colspan="2">التاريخ الميلادي</th>
        <td colspan="3">{{$date_and_time['g_date_ar']}}</td>
        <td colspan="6" class="font-90">{{$office_data->na_city_en}}</td>
    </tr>
    <tr>
        <th colspan="2" class="font-90">Gregorian Date</th>
        <td colspan="3">
            {{$date_and_time['g_day_no']}} - {{$date_and_time['g_month_name_ar']}} - {{$date_and_time['g_year_no']}}
        </td>
        <td colspan="6">VAT NO: {{$office_data->VAT_account_no}}</td>
    </tr>
</table><br><br style="line-height: 20%; ">
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<table>
    <tr>
        <td colspan="1">
            <div style="line-height: 30%; text-align: left;">
                @if ($invoice->is_cash)
                <img src="{{URL::asset('/img/checked.png')}}" alt="checked" width="0.4cm">--
                @else
                <img src="{{URL::asset('/img/unchecked.png')}}" alt="checked" width="0.4cm">--
                @endif
            </div>
        </td>
        <td colspan="2">
            Cash - نقدي
        </td>
        <td colspan="1">
            <div style="line-height: 30%; text-align: left;">
                @if ($invoice->is_credit)
                <img src="{{URL::asset('/img/checked.png')}}" alt="checked" width="0.4cm">--
                @else
                <img src="{{URL::asset('/img/unchecked.png')}}" alt="checked" width="0.4cm">--
                @endif
            </div>
        </td>
        <td colspan="2">
            Credit - آجل
        </td>
    </tr>
</table><br><br style="line-height: 20%; ">
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<table class="tbl-bordered txt-center">
    <tr>
        <th colspan="4" class="txt-center"
            style="border: none; border-top: gray soled 0.5px; border-right: gray soled 0.5px;">
            بيانات العميل
        </th>
        <th colspan="4" class="txt-center"
            style="border: none; border-top: gray soled 0.5px; border-left: gray soled 0.5px;">
            Customer Information
        </th>
    </tr>
    <tr>
        <th>الى:</th>
        <td colspan="7">{{$invoice->beneficiary_name_ar}}</td>
    </tr>
    <tr>
        <th>العنوان:</th>
        <td colspan="7">{{$invoice->beneficiary_address_ar}}</td>
    </tr>
    <tr>
        <td colspan="7">{{$project->project_name_en ?? ''}}</td>
        <th>To:</th>
    </tr>
    <tr>
        <td colspan="7">{{$invoice->beneficiary_address_en}}</td>
        <th>Address:</th>
    </tr>
    <tr>
        <th style="font-size: 90%;">رقم الضريبي:</th>
        <td colspan="6">{{$invoice->beneficiary_vat_no ?? $invoice->VAT_account_no ??''}}</td>
        <th>VAT NO:</th>
    </tr>
</table> <br><br>
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<table class="tbl-bordered txt-center">
    <tr>
        <th>مـ</th>
        <th colspan="9">البيان</th>
        <th colspan="1">الكمية</th>
        <th colspan="2">السعر</th>
        <th colspan="2">الضريبة</th>
        <th colspan="2">الإجمالي</th>
    </tr>
    <tr>
        <th>NO</th>
        <th colspan="9">Discription</th>
        <th colspan="1">QTY</th>
        <th colspan="2">Price</th>
        <th colspan="2" style="font-size: 90%;">VAT({{$invoice_total_arr['vat_percentage']}}%)</th>
        <th colspan="2">Total</th>
    </tr>
    {{-- ------------ ------------ ------------ --}}
    @php $i=1; $empty_rows = 14-$invoice_items->count(); @endphp
    @php $i=1; $t=[1,2,]; @endphp
    @foreach ($invoice_items as $item)
    <tr>
        <td>{{$i}}</td>
        <td colspan="9">{{$item->get_item_name_ar()}}</td>
        <td colspan="1" class="consolas-font">{{$item->item_quantity}}</td>
        <td colspan="2" class="consolas-font">{{$item->item_price}}</td>
        <td colspan="2" class="consolas-font">
            <span>{{$item->item_vat_value}}</span>
            @if ($item->item_vat_percentage != $invoice_total_arr['vat_percentage'])
            <br><span class="txt-center">({{(int)$item->item_vat_percentage}}%)</span>
            @endif
        </td>
        <td colspan="2" class="consolas-font">{{$item->item_price_withe_vat}}</td>
    </tr>
    @php $i++; @endphp
    @endforeach

    @for ($x = 0; $x < $empty_rows; $x++) <tr class="font-light">
        <td>{{$i}}</td>
        <td colspan="9" class="consolas-font">-----------------------------------------------</td>
        <td colspan="1" class="consolas-font">---</td>
        <td colspan="2" class="consolas-font">-----</td>
        <td colspan="2" class="consolas-font">-----</td>
        <td colspan="2" class="consolas-font">-----</td>
        </tr>
        @php $i++; @endphp
        @endfor
        {{-- ------------ ------------ ------------ --}}
</table><br><br>
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<table class="tbl-bordered txt-center">
    <tr>
        <th colspan="2">
            <span>الإجمالي بدون ضريبة</span><br><span class="txt-center"
                style="font-family: consolas; font-size:75%;">Subtotal Without VAT</span>
        </th>
        <td colspan="5">
            <div style="line-height: 110%;" class="txt-center">{{$invoice_total_arr['total_cost_text']}}</div>
        </td>
        <td>
            <div style="line-height: 110%;" class="txt-center consolas-font">{{$invoice_total_arr['total_cost_no']}}
            </div>
        </td>
    </tr>
    {{-- ------------ ------------ ------------ --}}
    <tr>
        <th colspan="2">
            <span>الإجمالي الضريبة</span><br><span class="txt-center" style="font-family: consolas; font-size:75%;">VAT
                Subtotal ({{$invoice_total_arr['vat_percentage']}}%)</span>
        </th>
        <td colspan="5">
            <div style="line-height: 110%;" class="txt-center">{{$invoice_total_arr['total_vat_value_text']}}</div>
        </td>
        <td>
            <div style="line-height: 110%;" class="txt-center consolas-font">
                {{$invoice_total_arr['total_vat_value_no']}}</div>
        </td>
    </tr>
    {{-- ------------ ------------ ------------ --}}
    <tr>
        <th colspan="2">
            <span>الإجمالي مع الضريبة</span><br><span class="txt-center" style="font-family: consolas; font-size:75%;">
                Total With VAT
            </span>
        </th>
        <td colspan="5">
            <span>فقط</span>
            <span>({{$invoice_total_arr['total_price_withe_vat_text']}})</span>
            <span>لا غير</span>
        </td>
        <td>
            <div style="line-height: 110%;" class="txt-center consolas-font">
                {{$invoice_total_arr['total_price_withe_vat_no']}}</div>
        </td>
    </tr>
    {{-- ------------ ------------ ------------ --}}
</table><br><br style="line-height: 30%;">
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<table class="tbl-border ed txt-center">
    <tr>
        <th>اصدر بواسطة</th>
        <td colspan="4">{{$invoice->get_issued_by()}}</td>
        <th style="font-family: consolas;">Issued By</th>
    </tr>
</table>
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}
<table class="tbl-bordered txt-center">
    <tr>
        <th>ملاحظات</th>
        <td colspan="8">{{$invoice->notes}}</td>
    </tr>
</table>
{{--
------------------------------------------------------------------------------------------------------------------------------
--}}