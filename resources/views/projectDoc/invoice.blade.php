<x-pdf_print_style />
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
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
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table class="tbl-bordered txt-center">
    <tr>
        <th colspan="2">رقم الفاتورة:</th>
        <td colspan="3" rowspan="2" align="center"><br style="line-height: 300%;"><span
                class="txt-center">(2020-5536)</span>
        </td>
        <th colspan="5">seller - البائع</th>
    </tr>
    <tr>
        <th colspan="2" class="font-90">Invoice NO:</th>
        {{-- <td colspan="3">(2020-5536)</td> --}}
        <td colspan="5">{{$office_data->name_ar}}</td>
    </tr>
    <tr>
        <th colspan="2">التاريخ الهجري</th>
        <td colspan="3">
            {{$date_and_time['hijri_day_no']}} - {{$date_and_time['hijri_month_name_ar']}} -
            {{$date_and_time['hijri_year_no']}}
        </td>
        <td colspan="5">{{$office_data->na_city_ar}}</td>
    </tr>
    <tr>
        <th colspan="2" class="font-90">Hijri Date</th>
        <td colspan="3">{{$date_and_time['h_date_ar']}}</td>
        <td colspan="5" class="font-90">{{$office_data->name_en}}</td>
    </tr>
    <tr>
        <th colspan="2">التاريخ الميلادي</th>
        <td colspan="3">{{$date_and_time['g_date_ar']}}</td>
        <td colspan="5" class="font-90">{{$office_data->na_city_en}}</td>
    </tr>
    <tr>
        <th colspan="2" class="font-90">Gregorian Date</th>
        <td colspan="3">
            {{$date_and_time['g_day_no']}} - {{$date_and_time['g_month_name_ar']}} - {{$date_and_time['g_year_no']}}
        </td>
        <td colspan="5">VAT NO: {{$office_data->VAT_account_no}}</td>
    </tr>
</table>
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table>
    <tr>
        <td colspan="1">
            <div style="line-height: 30%; text-align: left;">
                <img src="{{URL::asset('/img/unchecked.png')}}" alt="checked" width="0.4cm">
            </div>
        </td>
        <td colspan="2">
            Cash - نقدي
        </td>
        <td colspan="1">
            <div style="line-height: 30%; text-align: left;">
                <img src="{{URL::asset('/img/checked.png')}}" alt="checked" width="0.4cm">
            </div>
        </td>
        <td colspan="2">
            Credit - آجل
        </td>
    </tr>
</table>
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table class="tbl-bordered txt-center">
    <tr>
        <th colspan="8"><span class="txt-center"><span>Customer Information</span> - <span>بيانات العميل</span></span>
        </th>
    </tr>
    <tr>
        <th>الى:</th>
        <td colspan="7"></td>
    </tr>
    <tr>
        <th>العنوان:</th>
        <td colspan="7"></td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <th>To:</th>
    </tr>
    <tr>
        <td colspan="7"></td>
        <th>Address:</th>
    </tr>
    <tr>
        <th style="font-size: 90%;">رقم الضريبي:</th>
        <td colspan="6"></td>
        <th>VAT NO:</th>
    </tr>
</table> <br><br>
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table class="tbl-bordered txt-center">
    <tr>
        <th>مـ</th>
        <th colspan="7">البيان</th>
        <th colspan="2">الكمية</th>
        <th colspan="2">السعر</th>
        <th colspan="2">الضريبة</th>
        <th colspan="2">الإجمالي</th>
    </tr>
    <tr>
        <th>NO</th>
        <th colspan="7">Discription</th>
        <th colspan="2">QTY</th>
        <th colspan="2">Price</th>
        <th colspan="2" style="font-size: 90%;">VAT(15%)</th>
        <th colspan="2">Total</th>
    </tr>
    {{-- ------------    ------------    ------------    --}}
    @php $i=1; $t=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,]; @endphp
    @php $i=1; $t=[1,2,]; @endphp
    @foreach ($t as $item)
    <tr>
        <td>{{$i}}</td>
        <td colspan="7">خدمات استشارات هندسية عقد تصميم</td>
        <td colspan="2">1</td>
        <td colspan="2">100</td>
        <td colspan="2">15</td>
        <td colspan="2">115</td>
    </tr>
    @php $i++; @endphp
    @endforeach
    {{-- ------------    ------------    ------------    --}}
</table> <br><br>
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table class="tbl-bordered txt-center">
    <tr>
        <th colspan="2">
            <span>الإجمالي بدون ضريبة</span><br><span class="txt-center"
                style="font-family: consolas; font-size:75%;">Subtotal Without VAT</span>
        </th>
        <td colspan="6">التفقيط</td>
        <td>المبلغ</td>
    </tr>
    <tr>
        <th colspan="2">
            <span>الإجمالي الضريبة</span><br><span class="txt-center" style="font-family: consolas; font-size:75%;">VAT
                Subtotal (15%)</span>
        </th>
        <td colspan="6">التفقيط</td>
        <td>المبلغ</td>
    </tr>
    <tr>
        <th colspan="2">
            <span>الإجمالي مع الضريبة</span><br><span class="txt-center" style="font-family: consolas; font-size:75%;">
                Total With VAT
            </span>
        </th>
        <td colspan="6">التفقيط</td>
        <td>المبلغ</td>
    </tr>
</table> <br> <br style="line-height: 30%;">
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table class="tbl-border ed txt-center">
    <tr>
        <th>اصدر بواسطة</th>
        <td colspan="4">المحاسب : حمدي عبدالرحمن</td>
        <th style="font-family: consolas;">Issued By</th>
    </tr>
</table>