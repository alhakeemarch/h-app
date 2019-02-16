
<div class="col mx-2">
    <label for="fname">{{__( 'Date Gregorian')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
    <div class="form-row mb-3 ad_date">
        <select name="ad_day" class="form-control col" required>
        <option selected value="">{{__( 'day')}}..</option>
            @for($x=1; $x<=31; $x++)
            <option value="{{$x}}">{{$x}}</option>
            @endfor
        </select>
        <!-- -->
        @php $months= ['01'=>'January', '02'=>'February', '03'=>'March', '04'=>'April', '05'=>'May', '06'=>'June', '07'=>'July',
        '08'=>'August', '09'=>'September', '10'=>'October', '11'=>'November', '12'=>'December'] 
        @endphp
        <!-- -->
        <select name="ad_month" class="form-control col" required>
        <option selected value="">{{__( 'Month')}}..</option>
            @foreach ($months as $key=>$month)
            <option value="{{$key}}">{{$key}}: {{$month}}</option>
            @endforeach        
        </select>
        <select name="ad_year" class="form-control col" required>
        <option selected value="">{{__( 'Year')}}..</option>
            @for($x=1900; $x<=2200; $x++)
            <option value="{{$x}}">{{$x}}</option>
            @endfor
        </select>
    </div>
</div>
<!--/End ad_date -->



<div class="col mx-2">
    <label for="fname">{{__( 'Date Hijri')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
    <div class="form-row mb-3 ah_date">
        <select name="ah_day" class="form-control col" required>
        <option selected value="">{{__( 'day')}}..</option>
            @for($x=1; $x<=30; $x++)
            <option value="{{$x}}">{{$x}}</option>
            @endfor
        </select>
        <!-- -->
        @php $months= ['01'=>'Muharam - محرم', '02'=>'Safar - صفر', '03'=>'Rabi al-Awwal - ربيع الأول', '04'=>'Rabi al-Akhirah -
        ربيع الأخره', '05'=>'Jamada al-awwal - جماد الأول', '06'=>'Jamada al-Akhirah - جماد الأخره', '07'=>'Rajab - رجب ',
        '08'=>'Shaban - شعبان', '09'=>'Ramadan - رمضان', '10'=>'Shawwal - شوال', '11'=>'Dhu al-Qadah ذو القعدة', '12'=>'Dhu
        al-Hijjah - ذو الحجة']; 
        @endphp
        <!-- -->
        <select name="ah_month" class="form-control col" required>
        <option selected value="">{{__( 'Month')}}..</option>
            @foreach ($months as $key=>$month)
            <option value="{{$key}}">{{$key}}: {{$month}}</option>
            @endforeach        
        </select>
        <select name="ah_year" class="form-control col" required>
        <option selected value="">{{__( 'Year')}}..</option>
            @for($x=1300; $x<=1500; $x++)
            <option value="{{$x}}">{{$x}}</option>
            @endfor
        </select>
    </div>
</div>
<!--/End ah_date -->