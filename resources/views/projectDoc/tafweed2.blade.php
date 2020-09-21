@php
$name = 'زياد عبدالرحمن عبدالله ناظر وشركاءه المشتركون';
@endphp
<style>
    * {
        text-align: justify;
        text-justify: inter-word;
        vertical-align: middle;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        /* display: inline; */
    }

    h1 {
        font-family: 'aealarabiya', 'Times New Roman', Times, serif;
        font-size: 30rem;

    }

    h3,
    .title {
        font-weight: bold;
        font-size: 130%;
        background-color: #d7b77e;
        line-height: 140%;
    }

    table {
        /* border: 1px, solid, black; */
        /* width: 100%; */
    }

    td {
        /* border: 1px, solid, black; */
    }

    .txt-center {
        text-align: center;
    }

    .highlight {
        background-color: yellow;
        max-width: fit-content;
    }

    .txt-bold {
        font-weight: bold;
        font-size: 110%;
    }

</style>
{{-- ---------------------------------------------------------- --}}
<main>
    <h1 class="txt-center">تفويض</h1>
    <p>التاريخ: / / هـ</p>
    <p style="">أفوض أنا
        <span>&nbsp;{{$name}}&nbsp;</span>
        رقم السجل المدني
        <span>({{$name}})</span>
        وأنا بأتم الأوصاف المعتبرة شرعاً، وبصفتي: مالك العقار بموجب بالصك الشرعي رقم
        (................................)
        بتاريخ / / هـ الصادر من كتابة العدل الواقع بمنطقة ........................... حي: ..........................
        بأنني قد فوضت مكتب / المهندس عبد الرزاق حكيم للاستشارات الهندسية (تصميم وإعداد المخططات الهندسية وكافة
        الأعمال
        المساحية ومتابعة إنهاء إجراءاتها الفنية والإدارية لدى الأمانة وجهات الاختصاص كالدفاع المدني وشركة الكهرباء
        وهيئة
        السياحة ووزارة الإسكان ... إلخ وذلك حتى استخراج رخصة الإنشاء واستلامها، واستلام المخططات المصادق عليها من
        الأمانة إن وجد).</p>
    <p>أخرى:(........................................) </p>
    <table>
        <tr>
            <td class="title"> وأتعهد بما يلي:</td>
        </tr>
    </table>
    <ol>
        <li>
            في حال إلغاء هذا التفويض إبلاغ الأمانة والمكتب المفوض خطياً بذلك، وأقدم للأمانة ما يفيد إبراء ذمة من
            المكتب
            المفوض.
        </li>
        <li>
            لا يحق لي أو لأحد من طرفي استلام رخصة الإنشاء أو المخططات الابتدائية أو النهائية أو الرفوعات المساحية أو
            بيانات الموقع أو قرارات الذرعة أو أي وثائق تتعلق بمعاملتي موضوع هذا
            التفويض من الأمانة وأن المكتب وحده المسئول عن استلام هذه الوثائق والمستندات والمخططات.
        </li>
    </ol>

    <div class="txt-center">وعليه جرى التوقيع</div>
    <div></div>
    <div>
        <span class="txt-bold">اسم المفوض: </span>
        <span>{{$name}}</span>
        <span>&nbsp; &nbsp;</span>
        <span class="highlight txt-bold">التوقيع:</span>
        <span>....................</span>
    </div>
    {{-- <table>
        <tr>
            <span>اسم المفوض</span>
            <span>{{$name}}</span>
    <span class="highlight">التوقيع:</span>
    <span></span>
    </tr>
    </table> --}}
    <p>
        في حالة الوكيل
    </p>
    <table>
        <tr>
            <td>رقم الوكالة</td>
            <td></td>
            <td>تاريخها:</td>
            <td></td>
            <td> <span class="txt-bold highlight">مصدرها:</span></td>
            <td></td>
        </tr>
    </table>
    <p>
        أقر أنا الموضح اسمي ادناه بأن الشخص المفوض قام بالتوقيع أمامي :
    </p>

    <div>
        <span class="txt-bold">الإسم</span>
        <span></span>
        <span class="txt-bold">الصفة:</span>
        <span></span>
        <span class="txt-bold highlight">التوقيع:</span>
        <span></span>
    </div>

    <p>
        الختم المعتمد للمكتب
    </p>
    <div></div>
    <div></div>




    <hr style="line-height: 1px;">
    <p style="font-size: 11px; line-height: 4px;">ملاحظة: هذا التفويض يخص هذه المعاملة فقط، وينتهي مفعوله بانتهاء
        المعاملة لدى الأمانة
        أو إلغاءه من أحد
        الطرفين.</p>





</main>