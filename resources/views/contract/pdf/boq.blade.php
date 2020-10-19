@include('contract.pdf.header')
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="title">نطاق العمل</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>يقوم الطرف الأول بحصر كميات المشروع المذكور للتخصصات المعمارية والإنشائية والميكانيكة والكهربائية
                    فقط.</li>
                <li>لا يشمل الحصر التخصصات الدقيقة مثل الإلكترونيات ولا يشمل المواد التكميلة والمواد المستخدمة لأعمال
                    الديكور</li>
                <li>يلتزم الطرف الأول بعمل حصر الكميات وفق المعاير الفنية الهندسية وطبقاً لكود البناء السعودي.</li>
                <li>يتم إعتماد جداول المواد من قبل المالك قبل البدء في الحصر للعمل بموجبها وفي حال طلب المالك لحصر لأي
                    تخصص آخر يتم الاتفاق على أتعابه في حينه</li>
                <li>الحصر يشمل الكميات فقط، ولا يشمل الأسعار ولا يشمل عينات من شركات محددة.</li>
                <li>لا يشمل الحصر فحص وإعتماد عينات للمواد.</li>
                <li>يلتزم المكتب بتسليم المالك نسخة مطبوعة ونسخة PDF واحدة فقط من جداول حصر الكميات.</li>
                <li>يتم البدء في الحصر بعد إصدار رخصة الإنشاء والمخططات المعتمدة ويكون الحصر طبقاً للمخططات المعتمدة
                    فقط.</li>
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