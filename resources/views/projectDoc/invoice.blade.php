<x-pdf_print_style />
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table>
    <tr>
        <td class="txt-center aljazeera-font x-lg-font">فاتورة ضريبية</td>
        <td></td>
    </tr>
    <tr>
        <td class="txt-center courier-font x-lg-font">VAT Invoice</td>
        <td></td>
    </tr>
</table> <br><br>
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}
<table class="tbl-bordered">
    <tr>
        <td><span>رقم الفاتورة:</span>
            <span>(2020-5536)</span>
        </td>
        <td><span>التاريخ الهجري</span>
            <span>{{$date_and_time['h_date_ar']}}</span>
            <span>هـ</span>
        </td>
        <td><span>التاريخ الميلادي</span>
            <span>{{$date_and_time['g_date_ar']}}</span>
            <span>م</span>
        </td>
    </tr>
</table> <br><br>
{{-- ------------------------------------------------------------------------------------------------------------------------------ --}}