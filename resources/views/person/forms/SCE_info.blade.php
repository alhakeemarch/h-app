<div class="card-header text-white bg-dark mb-3">
    saudi council of engineers information:
</div>
<div>

    {{-- 
    SCE_membership_no // Saudi Council of Engineers الهيئة السعودية للمهندسين
    SCE_membership_grade
    SCE_membership_expire_date --}}
</div>

<!--
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
</div>
<div class="form-group row mb-3">
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
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class="form-group row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="graduation_points">{{__( 'graduation points')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="graduation_points"
            class="form-control mb-3 @error ('graduation_points') is-invalid @enderror"
            placeholder="{{__( 'graduation points')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'graduation points')}}..'"
            value="{{ old('graduation_points') ?? $person->graduation_points }}">
        @error('graduation_points')
        <small class=" text-danger"> {{$errors->first('graduation_points')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="graduation_points_of">{{__( 'graduation points of')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="graduation_points_of" class="form-control @error ('graduation_points_of') is-invalid @enderror">
            <option selected value="" disabled>{{__( 'please pick')}}..</option>
            <option value=4 @if ($person->graduation_points_of == 4 ) selected @endif>4</option>
            <option value=5 @if ($person->graduation_points_of == 5 ) selected @endif>5</option>
            <option value=100 @if ($person->graduation_points_of == 100 ) selected @endif>100</option>
        </select>
        @error('graduation_points_of')
        <small class=" text-danger"> {{$errors->first('graduation_points_of')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="graduation_grade_rank_id">{{__( 'graduation grade rank')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="graduation_grade_rank_id"
            class="form-control @error ('graduation_grade_rank_id') is-invalid @enderror">
            <option selected value="" disabled>{{__( 'please pick')}}..</option>

            @foreach ($gread_ranks as $graduation_grade_rank)
            @if (App::isLocale('ar'))
            <option value="{{$graduation_grade_rank->id}}" @if ($person->graduation_grade_rank_id ==
                $graduation_grade_rank->id) selected
                @endif>{{$graduation_grade_rank->grade_ar}}
            </option>
            @else
            <option value="{{$graduation_grade_rank->id}}" @if ($person->graduation_grade_rank_id ==
                $graduation_grade_rank->id) selected
                @endif>{{$graduation_grade_rank->grade_en}}
            </option>
            @endif
            @endforeach

        </select>
        @error('graduation_grade_rank_id')
        <small class=" text-danger"> {{$errors->first('graduation_grade_rank_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
-->