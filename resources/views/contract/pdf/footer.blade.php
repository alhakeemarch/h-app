<hr style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="txt-center aljazeera-font">

    <tr>
        <td>حرر هذا العقد من نسختين ، نسخة لكل طرف للعمل بموجبه والإلتزام بما فيه </td>
    </tr>
    <tr>
        <td>وعلى ذلك جرى التوقيع والله ولي التوفيق</td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table class="tbl-center">
    <tr>
        <td>الطرف الأول</td>
        <td>الطرف الثاني</td>
    </tr>
    <tr>
        <td>
            <span>مكتب م.</span> <span>{{$office_data->name_ar}}</span>
        </td>
        <td>
            @if ($project-> representative_name_ar)
            <span>{{$project-> representative_name_ar}}</span>
            @else
            <span>{{$project->owner_name_ar ?? ''}}</span>
            @endif
        </td>
    </tr>
    <tr>
        <td><span>التوقيع:</span></td>
        <td><span class="highlight">التوقيع:</span></td>
    </tr>
</table><br><br style="line-height: 30%;"><br>
<table>
    <tr>
        <td>مصادقة مدير المكتب</td>
        <td>الختم</td>
        <td></td>
        <td></td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- </body>


</html> --}}