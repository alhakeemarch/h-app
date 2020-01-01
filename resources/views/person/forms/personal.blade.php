<div class="card-header text-white bg-dark mb-3">
    Personal Information:
</div>
<div class="form-group">
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="ah_birth_date">{{__( 'Hijri Birth Date')}}
                <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="text" name="ah_birth_date"
                class="form-control mb-3 @error ('ah_birth_date') is-invalid @enderror"
                placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
                value="{{ old('ah_birth_date') ?? $person->ah_birth_date }}" pattern="\d{1,2}/\d{1,2}/\d{4}">
            @error('ah_birth_date')
            <small class=" text-danger"> {{$errors->first('ah_birth_date')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="ad_birth_date">{{__( 'Gregorian Birth Date')}}
                <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="ad_birth_date"
                class="form-control mb-3 @error ('ad_birth_date') is-invalid @enderror"
                placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
                value="{{ old('ad_birth_date') ?? $person->ad_birth_date }}" pattern="\d{1,2}/\d{1,2}/\d{4}">
            @error('ad_birth_date')
            <small class=" text-danger"> {{$errors->first('ad_birth_date')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="birth_place">{{__( 'Birth Place')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <input type="text" name="birth_place" class="form-control mb-3" placeholder="{{__( 'Birth Place')}}.."
                onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'Birth Place')}}..'"
                value="{{ old('birth_place') ?? $person->birth_place }}">
            @error('birth_place')
            <small class=" text-danger"> {{$errors->first('birth_place')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="gender">{{__( 'gender')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="gender" class="form-control @error ('gender') is-invalid @enderror" required>
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
            <select name="relational_status" class="form-control @error ('relational_status') is-invalid @enderror"
                required>
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
    </div>
</div>