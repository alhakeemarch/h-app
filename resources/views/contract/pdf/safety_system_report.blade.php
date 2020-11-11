@include('contract.pdf.header')
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<style>
    table {
        font-size: 95%;
    }

</style>
<table>
    <tr>
        <td class="title">نطاق العمل</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>يقوم الطرف الأول بزيارة الموقع وفحص أنظمة السلامة (الإنذار والإطفاء فقط).</li>
                <li>يلتزم الطرف الأول بمطابقة الأنظمة بالمخططات المعتمدة المقدمة من الطرف الثاني.</li>
                <li>يجب أن تكون المخططات المعتمدة مطابقة لاشتراطات كود البناء السعودي و الدفاع المدني وفي حال مخالفتها
                    فإنه على الطرف الثاني تعديل المخططات واعادة اعتمادها.</li>
                <li>يجب تواجد الجهة المنفذة للأنظمة أثناء الإختبار لتشغيل الأنظمة وفحصها.</li>
                <li>يلتزم الطرف الثاني من توفر الكهرباء والماء في وقت الزيارة للتمكن من الكشف وإختبار الأنظمة.</li>
                <li>في حال وجود أنظمة تحتاج إلى إختبارات فإنه يلتزم الطرف الثاني بعمل الإختبارات عن طريق جهة متخصصة
                    ومعتمدة وتزويد الطرف الأول بالنتائج.</li>
                <li>في حال وجود أنظمة تحتاج إلى صيانة أو تعديل فإنه يلتزم الطرف الثاني بعمل التعديلات عن طريق جهة متخصصة
                    ومعتمدة ويقوم الطرف الأول بإعادة المعاينة للتأكد من سلامتها.</li>
                <li>يلتزم الطرف الأول بتسليم الطرف الثاني نسخة واحدة للتقرير الفني المعتمد.</li>
                <li>في حال تعديل أي من الأنظمة بعد عمل التقرير فإن الطرف الأول غير مسؤول عن ذلك.</li>
                <li>لايشمل العقد اي رسوم تدفع لأي جهة حكومية أو خاصة.</li>
            </ul>
        </td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="title">الاتعاب</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>في حال إلغاء العقد بناء على طلب الطرف الثاني فإنه لا يحق له بالمطالبة بأي مبالغ من قيمة العقد.</li>
                <li>اتفق الطرفان على أن الأتعاب المستحقة للطرف الأول بموجب هذا العقد كالتالي:</li>
            </ul>
        </td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
@include('contract.pdf.price_tbl')
{{-- ---------------------------------------------------------------------------------------------------------- --}}
@include('contract.pdf.footer')