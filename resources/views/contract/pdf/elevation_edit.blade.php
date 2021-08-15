@include('contract.pdf.header')
{{-- ---------------------------------------------------------------------------------------------------------- --}}
<table>
    <tr>
        <td class="title">نطاق العمل</td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>يقوم المكتب بمراجعة المخطط المعتمد وعمل رفع من الطبيعة للواجهة إذا لزم الأمر</li>
                <li>يقوم المكتب بعمل منظور ثلاثي الأبعاد (3D) للواجهة الرئيسية للمبنى بما يتوافق مع المخطط المعتمد.
                </li>
                <li>يكون التصميم وفق الأنظمة والإشتراطات للجهات ذات العلاقة</li>
                <li>يلتزم الطرف الأول بعمل فكرة تصمية بناء على متطلبات العميل</li>
                <li>عند رغبة الطرف الثاني (المالك) في التعديل بعد موافقته على الفكرة كتابياً يتم الاتفاق على أتعاب ذلك
                    في حينه.</li>
                <li>يلتزم المكتب بتسليم المالك نسخة مطبوعة A3 بالإضافة إلى نسخة إلكترونية (PDF or JPEG) على إسطوانة.
                </li>
                <li>يلتزم المكتب بعمل لقطة منظورية واحدة فقط (نهارية) وفي حال طلب العميل عمل أي لقطات أخرى يتم الاتفاق
                    على أتعاب ذلك في حينه</li>
                <li>لا يشمل التصميم أي لقطات تصميم داخلية (أعمال الديكور) وفي حال رغبة المالك في ذلك يتم توقيع عقد
                    منفصل بخصوص ذلك</li>
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