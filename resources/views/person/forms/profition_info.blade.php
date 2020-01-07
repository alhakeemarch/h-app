<div class="card-header text-white bg-dark mb-3">
    profition information:
</div>
<div>
    graduation_points
    graduation_points_of
    graduation_grade
    id_job_title
    job_title
    division
    current_project

    SCE_membership_no // Saudi Council of Engineers الهيئة السعودية للمهندسين
    SCE_membership_grade
    SCE_membership_expire_date
</div>


<div class="form-group row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="degree">{{__( 'educational degree')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="degree" class="form-control @error ('degree') is-invalid @enderror">
            <option selected value="">{{__( 'please pick')}}..</option>
            @if (App::isLocale('ar'))
            <option value="doctorate" @if ($person->degree == 'doctorate') selected @endif>دكتوراه</option>
            <option value="master" @if ($person->degree == 'master') selected @endif>ماجستير</option>
            <option value="bachelor" @if ($person->degree == 'bachelor') selected @endif>بكالوريوس</option>
            <option value="diploma" @if ($person->degree == 'diploma') selected @endif>دبلوم عالي</option>
            <option value="high_school_diploma" @if ($person->degree == 'high_school_diploma') selected @endif>دبلوم
                ثانوي</option>
            <option value="high_school" @if ($person->degree == 'high_school') selected @endif>ثانوية عامة</option>
            <option value="secondary_school" @if ($person->degree == 'secondary_school') selected @endif>متوسطة</option>
            <option value="primary_school" @if ($person->degree == 'primary_school') selected @endif>ابتدائي</option>
            <option value="literate" @if ($person->degree == 'literate') selected @endif>يقرأ ويكتب</option>
            <option value="illiterate" @if ($person->degree == 'illiterate') selected @endif>امي</option>
            <option value="other" @if ($person->degree == 'other') selected @endif>غير ذلك</option>
            @else
            <option value="doctorate" @if ($person->degree == 'doctorate') selected @endif>Doctorate</option>
            <option value="master" @if ($person->degree == 'master') selected @endif>Master</option>
            <option value="bachelor" @if ($person->degree == 'bachelor') selected @endif>Bachelor</option>
            <option value="diploma" @if ($person->degree == 'diploma') selected @endif>Diploma</option>
            <option value="high_school_diploma" @if ($person->degree == 'high_school_diploma') selected
                @endif>High School Diploma</option>
            <option value="high_school" @if ($person->degree == 'high_school') selected @endif>High School</option>
            <option value="secondary_school" @if ($person->degree == 'secondary_school') selected
                @endif>Secondary School</option>
            <option value="primary_school" @if ($person->degree == 'primary_school') selected @endif>Primary School
            </option>
            <option value="literate" @if ($person->degree == 'literate') selected @endif>Literate</option>
            <option value="illiterate" @if ($person->degree == 'illiterate') selected @endif>Illiterate</option>
            <option value="other" @if ($person->degree == 'other') selected @endif>Other</option>
            @endif
        </select>
        @error('degree')
        <small class=" text-danger"> {{$errors->first('degree')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="major_id">{{__( 'educational major')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="major_id" class="form-control @error ('major_id') is-invalid @enderror">
            <option selected value="">{{__( 'please pick')}}..</option>
            @foreach ($majors as $major)
            @if (App::isLocale('ar'))
            <option value="{{$major->id}}" @if ($person->major_id == $major->id) selected @endif>{{$major->major_ar}}
            </option>
            @else
            <option value="{{$major->id}}" @if ($person->major_id == $major->id) selected @endif>{{$major->major_en}}
            </option>
            @endif
            @endforeach
        </select>
        @error('major_id')
        <small class=" text-danger"> {{$errors->first('major_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="graduated_from">{{__( 'university, institute or school name')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="graduated_from"
            class="form-control mb-3 @error ('graduated_from') is-invalid @enderror"
            placeholder="{{__( 'enter a name')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'enter a name')}}..'"
            value="{{ old('graduated_from') ?? $person->graduated_from }}">
        @error('graduated_from')
        <small class=" text-danger"> {{$errors->first('graduated_from')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="college_name">{{__( 'college name')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="college_name" class="form-control mb-3 @error ('college_name') is-invalid @enderror"
            placeholder="{{__( 'enter a name')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'enter a name')}}..'"
            value="{{ old('college_name') ?? $person->college_name }}">
        @error('college_name')
        <small class=" text-danger"> {{$errors->first('college_name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="graduation_year">{{__( 'graduation year')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="graduation_year" class="form-control @error ('graduation_year') is-invalid @enderror">
            <option selected value="">{{__( 'please pick')}}..</option>
            @for ($i = date("Y")-50 ; $i <= date("Y"); $i++)
                {{-- ................................................................................................. --}}
                <option value="{{$i}}" @if ($person->graduation_year == $i) selected @endif>{{$i}} </option>
                {{-- ................................................................................................. --}}
                @endfor
        </select>
        @error('graduation_year')
        <small class=" text-danger"> {{$errors->first('graduation_year')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- <div class="col-md">
        <label for="ad_hiring_date">{{__( 'gregorian hiring date')}}
    <span class="small text-muted">({{__('optional')}})</span> :</label>
    <input type="text" name="ad_hiring_date" class="form-control mb-3 @error ('ad_hiring_date') is-invalid @enderror"
        placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
        onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
        value="{{ old('ad_hiring_date') ?? $person->ad_hiring_date }}" pattern="\d{1,2}/\d{1,2}/\d{4}">
    @error('ad_hiring_date')
    <small class=" text-danger"> {{$errors->first('ad_hiring_date')}} </small>
    @enderror
</div> --}}
{{-- --------------------------------------------------------------------------------------------- --}}
{{-- <div class="col-md">
        <label for="hiring_day">{{__( 'hiring day')}}
<span class="small text-muted">({{__('optional')}})</span>:</label>
<select name="hiring_day" class="form-control @error ('hiring_day') is-invalid @enderror">
    <option selected value="">{{__( 'hiring day')}}..</option>
    @if (App::isLocale('ar'))
    <option value="sunday" @if ($person->hiring_day == 'sunday') selected @endif>الاحد</option>
    <option value="monday" @if ($person->hiring_day == 'monday') selected @endif>الاثنين</option>
    <option value="tuesday" @if ($person->hiring_day == 'tuesday') selected @endif>الثلاثاء</option>
    <option value="wednesday" @if ($person->hiring_day == 'wednesday') selected @endif>الاربعاء</option>
    <option value="thursday" @if ($person->hiring_day == 'thursday') selected @endif>الخميس</option>
    <option value="friday" @if ($person->hiring_day == 'friday') selected @endif>الجمعة</option>
    <option value="saturday" @if ($person->hiring_day == 'saturday') selected @endif>السبت</option>
    @else
    <option value="sunday" @if ($person->hiring_day == 'sunday') selected @endif>Sunday</option>
    <option value="monday" @if ($person->hiring_day == 'monday') selected @endif>Monday</option>
    <option value="tuesday" @if ($person->hiring_day == 'tuesday') selected @endif>Tuesday</option>
    <option value="wednesday" @if ($person->hiring_day == 'wednesday') selected @endif>Wednesday</option>
    <option value="thursday" @if ($person->hiring_day == 'thursday') selected @endif>Thursday</option>
    <option value="friday" @if ($person->hiring_day == 'friday') selected @endif>Friday</option>
    <option value="saturday" @if ($person->hiring_day == 'saturday') selected @endif>Saturday</option>
    @endif
</select>
@error('hiring_day')
<small class=" text-danger"> {{$errors->first('hiring_day')}} </small>
@enderror
</div> --}}
{{-- --------------------------------------------------------------------------------------------- --}}
{{-- <div class="col-md">
        <label for="employment_no">{{__( 'employment number')}}
<span class="small text-muted">({{__('optional')}})</span>:</label>
<input type="text" name="employment_no" class="form-control mb-3" placeholder="{{__( 'employment number')}}.."
    onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'employment number')}}..'"
    value="{{ old('employment_no') ?? $person->employment_no }}">
@error('employment_no')
<small class=" text-danger"> {{$errors->first('employment_no')}} </small>
@enderror
</div> --}}
{{-- --------------------------------------------------------------------------------------------- --}}
{{-- <div class="col-md">
        <label for="fingerprint_no">{{__( 'fingerprint number')}}
<span class="small text-muted">({{__('optional')}})</span>:</label>
<input type="text" name="fingerprint_no" class="form-control mb-3" placeholder="{{__( 'fingerprint number')}}.."
    onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'fingerprint number')}}..'"
    value="{{ old('fingerprint_no') ?? $person->fingerprint_no }}">
@error('fingerprint_no')
<small class=" text-danger"> {{$errors->first('fingerprint_no')}} </small>
@enderror
</div> --}}
{{-- --------------------------------------------------------------------------------------------- --}}
</div>