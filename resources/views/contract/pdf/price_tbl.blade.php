<table class="tbl-bordered txt-center">
    <tr>
        <th colspan=" 1" rowspan="2">قيمة العقد</th>
        <th style="padding: 35px;">المبلغ</th>
        <th><span>الضريبة</span> <span>VAT</span> <span>{{$pyment_arr['vat_percentage']??''}}</span><span>%</span></th>
        <th>الإجمالي</th>
    </tr>
    <tr>
        <td>{{number_format($pyment_arr['cost'])??''}}</td>
        <td>{{number_format($pyment_arr['vat_value'])??''}}</td>
        <td>{{number_format($pyment_arr['price_withe_vat'])??''}}</td>
    </tr>
    <tr>
        <td colspan="5" class="" style="text-align: justify;">
            <span>الاجمالي شامل ضريبة القيمة المضافة وقدره</span>
            <span>{{$pyment_arr['price_withe_vat_text'] ?? '........'}}</span>
            <span>فقط لا غير.</span>
        </td>
    </tr>
</table> <br><br style="line-height: 30%;">