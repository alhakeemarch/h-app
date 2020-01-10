<div class="card-header text-white bg-dark mb-3">
    saudi national address information:
</div>
{{-- =============================================================================================== --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_application_no">{{__( 'application number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_application_no"
                class="form-control mb-3 @error ('SNA_application_no') is-invalid @enderror"
                placeholder="{{__( 'application number')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'application number')}}..'"
                value="{{ old('SNA_application_no') ?? $person->SNA_application_no }}" onkeypress="onlyNumber(event)">
            @error('SNA_application_no')
            <small class=" text-danger"> {{$errors->first('SNA_application_no')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_service_no">{{__( 'service number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_service_no"
                class="form-control mb-3 @error ('SNA_service_no') is-invalid @enderror"
                placeholder="{{__( 'service number')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'service number')}}..'"
                value="{{ old('SNA_service_no') ?? $person->SNA_service_no }}" onkeypress="onlyNumber(event)">
            @error('SNA_service_no')
            <small class=" text-danger"> {{$errors->first('SNA_service_no')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_account_no">{{__( 'account number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_account_no"
                class="form-control mb-3 @error ('SNA_account_no') is-invalid @enderror"
                placeholder="{{__( 'account number')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'account number')}}..'"
                value="{{ old('SNA_account_no') ?? $person->SNA_account_no }}" onkeypress="onlyNumber(event)">
            @error('SNA_account_no')
            <small class=" text-danger"> {{$errors->first('SNA_account_no')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<hr>
{{-- =============================================================================================== --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_building_no">{{__( 'building number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_building_no"
                class="form-control mb-3 @error ('SNA_building_no') is-invalid @enderror"
                placeholder="{{__( 'building number')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'building number')}}..'"
                value="{{ old('SNA_building_no') ?? $person->SNA_building_no }}" onkeypress="onlyNumber(event)">
            @error('SNA_building_no')
            <small class=" text-danger"> {{$errors->first('SNA_building_no')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_street_name">{{__( 'street name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_street_name"
                class="form-control mb-3 @error ('SNA_street_name') is-invalid @enderror"
                placeholder="{{__( 'street name')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'street name')}}..'"
                value="{{ old('SNA_street_name') ?? $person->SNA_street_name }}" onkeypress="onlyNumber(event)">
            @error('SNA_street_name')
            <small class=" text-danger"> {{$errors->first('SNA_street_name')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_district_name">{{__( 'district name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_district_name"
                class="form-control mb-3 @error ('SNA_district_name') is-invalid @enderror"
                placeholder="{{__( 'district name')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'district name')}}..'"
                value="{{ old('SNA_district_name') ?? $person->SNA_district_name }}" onkeypress="onlyNumber(event)">
            @error('SNA_district_name')
            <small class=" text-danger"> {{$errors->first('SNA_district_name')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_city_name">{{__( 'city name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_city_name"
                class="form-control mb-3 @error ('SNA_city_name') is-invalid @enderror"
                placeholder="{{__( 'city name')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'city name')}}..'"
                value="{{ old('SNA_city_name') ?? $person->SNA_city_name }}" onkeypress="onlyNumber(event)">
            @error('SNA_city_name')
            <small class=" text-danger"> {{$errors->first('SNA_city_name')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<hr>
{{-- =============================================================================================== --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_zip_code">{{__( 'zip code')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_zip_code"
                class="form-control mb-3 @error ('SNA_zip_code') is-invalid @enderror"
                placeholder="{{__( 'zip code')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'zip code')}}..'"
                value="{{ old('SNA_zip_code') ?? $person->SNA_zip_code }}" onkeypress="onlyNumber(event)">
            @error('SNA_zip_code')
            <small class=" text-danger"> {{$errors->first('SNA_zip_code')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_additional_no">{{__( 'additional number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_additional_no"
                class="form-control mb-3 @error ('SNA_additional_no') is-invalid @enderror"
                placeholder="{{__( 'additional number')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'additional number')}}..'"
                value="{{ old('SNA_additional_no') ?? $person->SNA_additional_no }}" onkeypress="onlyNumber(event)">
            @error('SNA_additional_no')
            <small class=" text-danger"> {{$errors->first('SNA_additional_no')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_unit_no">{{__( 'unit number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="SNA_unit_no" class="form-control mb-3 @error ('SNA_unit_no') is-invalid @enderror"
                placeholder="{{__( 'unit number')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'unit number')}}..'"
                value="{{ old('SNA_unit_no') ?? $person->SNA_unit_no }}" onkeypress="onlyNumber(event)">
            @error('SNA_unit_no')
            <small class=" text-danger"> {{$errors->first('SNA_unit_no')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_residence_type">{{__( 'city name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <select name="SNA_residence_type" class="form-control @error ('SNA_residence_type') is-invalid @enderror">
                <option selected value="" disabled>{{__( 'residence type')}}..</option>
                @if (App::isLocale('ar'))
                <option value="apartment" @if ($person->SNA_residence_type == 'apartment') selected @endif>شقة</option>
                <option value="villa" @if ($person->SNA_residence_type == 'villa') selected @endif>فيلا</option>
                <option value="classic" @if ($person->SNA_residence_type == 'classic') selected @endif>شعبي</option>
                <option value="palace" @if ($person->SNA_residence_type == 'palace') selected @endif>قصر</option>
                <option value="duplex" @if ($person->SNA_residence_type == 'duplex') selected @endif>دبلكس</option>
                <option value="hotel" @if ($person->SNA_residence_type == 'hotel') selected @endif>فندقي</option>
                <option value="other" @if ($person->SNA_residence_type == 'other') selected @endif>اخرى</option>
                @else
                <option value="apartment" @if ($person->SNA_residence_type == 'apartment') selected @endif>apartment
                </option>
                <option value="villa" @if ($person->SNA_residence_type == 'villa') selected @endif>villa</option>
                <option value="classic" @if ($person->SNA_residence_type == 'classic') selected @endif>classic</option>
                <option value="palace" @if ($person->SNA_residence_type == 'palace') selected @endif>palace</option>
                <option value="duplex" @if ($person->SNA_residence_type == 'duplex') selected @endif>duplex</option>
                <option value="hotel" @if ($person->SNA_residence_type == 'hotel') selected @endif>hotel</option>
                <option value="other" @if ($person->SNA_residence_type == 'other') selected @endif>other</option>
                @endif
            </select>
            @error('SNA_residence_type')
            <small class=" text-danger"> {{$errors->first('SNA_residence_type')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <span for="SNA_residence_ownership">{{__( 'city name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
            <select name="SNA_residence_ownership"
                class="form-control @error ('SNA_residence_ownership') is-invalid @enderror">
                <option selected value="" disabled>{{__( 'ownership')}}..</option>
                @if (App::isLocale('ar'))
                <option value="own" @if ($person->SNA_residence_ownership == 'own') selected @endif>ملك</option>
                <option value="rent" @if ($person->SNA_residence_ownership == 'rent') selected @endif>مستأجر</option>
                <option value="work_residence" @if ($person->SNA_residence_ownership == 'work_residence') selected
                    @endif>سكن عمل</option>
                <option value="charity" @if ($person->SNA_residence_ownership == 'charity') selected @endif>خيري
                </option>
                <option value="other" @if ($person->SNA_residence_ownership == 'other') selected @endif>اخرى</option>
                @else
                <option value="own" @if ($person->SNA_residence_ownership == 'own') selected @endif>own</option>
                <option value="rent" @if ($person->SNA_residence_ownership == 'rent') selected @endif>rent</option>
                <option value="work_residence" @if ($person->SNA_residence_ownership == 'work_residence') selected
                    @endif>work residence</option>
                <option value="charity" @if ($person->SNA_residence_ownership == 'charity') selected @endif>charity
                </option>
                <option value="other" @if ($person->SNA_residence_ownership == 'other') selected @endif>other</option>
                @endif
            </select>
            @error('SNA_residence_ownership')
            <small class=" text-danger"> {{$errors->first('SNA_residence_ownership')}} </small>
            @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
<hr>