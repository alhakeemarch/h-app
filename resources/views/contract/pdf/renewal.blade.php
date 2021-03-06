{{-- ---------------------------------------------------------------------------------------------------------- --}}
@include('contract.pdf.header',['full_project_info'=>'false'])
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="title">نطاق العمل</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>يقوم المكتب بتقديم المخططات المعتمدة السابقة للامانة في النظام الإلكتروني بغرض تجديد الرخصة فقط.
                </li>
                <li>يقوم الطرف الأول بإجراء تجديد الرخصة وذلك على انظمة الأمانة فقط للمشروع المذكور.</li>
                <li>في حال لزم تعديل التصميم بناء على طلب الأمانة فإنه يتم توقيع عقد تعديل تصميم.</li>
                <li><span>في حال كانت الرخصة الاساسية صادرة من المكتب فإنه يلتزم المكتب بتسليم المالك الرخصة
                        الأصلية,</span>
                    <span>وفي حال طلب العميل نسخ إضافية من المخططات أو اسطوانة إلكترونية</span>
                    <span>CD</span>
                    <span>أو غيره فإنه يتم الاتفاق على قيمتها في حينه</span>.</li>
                <li>في حال كانت الرخصة الأساسية صادرة من مكتب آخر فإنه يلزم العميل مراجعة المكتب الآخر لإستلام نسخة
                    الرخصة والمخططات بعد نقل الملكية</li>
                <li>لا يشمل العقد تصميم أو اعتماد مخططات الأمن والسلامة (الدفاع المدني).</li>
                <li>يلتزم الطرف الثاني بتوفير المستندات المطلوبة لإتمام المعاملة</li>
                <li>لا يشمل العقد (أتعاب بيانات الموقع، أتعاب تقرير التربة، أتعاب تثبيت الموقع وتسليمه للمقاول، عقد
                    النظافة، رسوم الرخصة التي تدفع للأمانة، أي رسوم أخرى).</li>
            </ul>
        </td>
    </tr>
</table><br><br style="line-height: 30%;">
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="title">الاتعاب والدفعات</td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td>اتفق الطرفان على أن الأتعاب المستحقة للطرف الأول بموجب هذا العقد كالتالي:</td>
    </tr>
</table>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
@include('contract.pdf.price_tbl')
{{-- ---------------------------------------------------------------------------------------------------------- --}}
@include('contract.pdf.footer')