<div class="card-header text-white bg-dark mb-3">
    employment information:
</div>

<div class="form-group row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="ah_hiring_date">{{__( 'hijri hiring date')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="ah_hiring_date"
            class="form-control mb-3 @error ('ah_hiring_date') is-invalid @enderror"
            placeholder="{{__( 'dd-mm-yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd-mm-yyyy')}}..'"
            value="{{ old('ah_hiring_date') ?? $person->ah_hiring_date }}"
            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="DD-MM-YYYY">
        @error('ah_hiring_date')
        <small class=" text-danger"> {{$errors->first('ah_hiring_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="ad_hiring_date">{{__( 'gregorian hiring date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="ad_hiring_date"
            class="form-control mb-3 @error ('ad_hiring_date') is-invalid @enderror"
            placeholder="{{__( 'dd-mm-yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd-mm-yyyy')}}..'"
            value="{{ old('ad_hiring_date') ?? $person->ad_hiring_date }}"
            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="DD-MM-YYYY">
        @error('ad_hiring_date')
        <small class=" text-danger"> {{$errors->first('ad_hiring_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
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
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="employment_no">{{__( 'employment number')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <input type="text" name="employment_no" class="form-control mb-3" placeholder="{{__( 'employment number')}}.."
            onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'employment number')}}..'"
            value="{{ old('employment_no') ?? $person->employment_no }}">
        @error('employment_no')
        <small class=" text-danger"> {{$errors->first('employment_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fingerprint_no">{{__( 'fingerprint number')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <input type="text" name="fingerprint_no" class="form-control mb-3" placeholder="{{__( 'fingerprint number')}}.."
            onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'fingerprint number')}}..'"
            value="{{ old('fingerprint_no') ?? $person->fingerprint_no }}">
        @error('fingerprint_no')
        <small class=" text-danger"> {{$errors->first('fingerprint_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>