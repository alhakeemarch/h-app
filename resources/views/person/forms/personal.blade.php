<div class="card-header text-white bg-dark mb-3">
    personal information:
</div>
<div class="form-group row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="gender">{{__( 'gender')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="gender" class="form-control @error ('gender') is-invalid @enderror">
            <option selected value="">{{__( 'gender')}}..</option>
            @if (App::isLocale('ar'))
            <option value="M" @if ($person->gender == 'M') selected @endif>ذكر</option>
            <option value="F" @if ($person->gender == 'F') selected @endif>ذكر</option>
            <option value="U" @if ($person->gender == 'U') selected @endif>غير معروف</option>
            @else
            <option value="M" @if ($person->gender == 'M') selected @endif>male</option>
            <option value="F" @if ($person->gender == 'F') selected @endif>female</option>
            <option value="U" @if ($person->gender == 'U') selected @endif>unknown</option>
            @endif
        </select>
        @error('gender')
        <small class=" text-danger"> {{$errors->first('gender')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="relational_status">{{__( 'relational status')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="relational_status" class="form-control @error ('relational_status') is-invalid @enderror">
            <option selected value="">{{__( 'relational status')}}..</option>
            @if (App::isLocale('ar'))
            <option value="M" @if ($person->relational_status == 'M') selected @endif>متزوج</option>
            <option value="F" @if ($person->relational_status == 'F') selected @endif>خاطب</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>مطلق</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>ارمل</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>أخرى</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>غير معروف</option>
            @else
            <option value="M" @if ($person->relational_status == 'M') selected @endif>متزوج</option>
            <option value="F" @if ($person->relational_status == 'F') selected @endif>خاطب</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>مطلق</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>ارمل</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>أخرى</option>
            <option value="U" @if ($person->relational_status == 'U') selected @endif>غير معروف</option>
            @endif
        </select>
        @error('relational_status')
        <small class=" text-danger"> {{$errors->first('relational_status')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="religion">{{__( 'religion')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="religion" class="form-control @error ('religion') is-invalid @enderror">
            <option selected value="">{{__( 'religion')}}..</option>
            @if (App::isLocale('ar'))
            <option value="islam" @if ($person->religion == 'islam') selected @endif>مسلم</option>
            <option value="Other" @if ($person->religion == 'Other') selected @endif>غير مسلم</option>
            @else
            <option value="islam" @if ($person->religion == 'islam') selected @endif>Islam</option>
            <option value="other" @if ($person->religion == 'other') selected @endif>Other</option>
            @endif
        </select>
        @error('religion')
        <small class=" text-danger"> {{$errors->first('religion')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="prefer_language">{{__( 'prefer_language')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="prefer_language" class="form-control @error ('prefer_language') is-invalid @enderror">
            <option selected value="">{{__( 'prefer_language')}}..</option>
            @if (App::isLocale('ar'))
            <option value="AR" @if ($person->prefer_language == 'AR') selected @endif>عربي</option>
            <option value="EN" @if ($person->prefer_language == 'EN') selected @endif>انجليزي</option>
            @else
            <option value="AR" @if ($person->prefer_language == 'AR') selected @endif>Arabic</option>
            <option value="EN" @if ($person->prefer_language == 'EN') selected @endif>English</option>
            @endif
        </select>
        @error('prefer_language')
        <small class=" text-danger"> {{$errors->first('prefer_language')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>