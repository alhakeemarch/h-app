@csrf
<h1 class="h1 text-danger">Gender</h1>
<div class="card-header text-white bg-dark mb-3">
    {{__('person').' '.__('type')}}:
</div>
{{--START: person type --}}
@if(auth()->user()->is_admin or auth()->user()->is_manager)
<div class="form-group">
    <div class="form-row mb-3">
        <div class="col-md">
            <label for="is_employee">{{__( 'employee')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <select name="is_employee" class="form-control @error ('is_employee') is-invalid @enderror" required>
                <option value=0 selected> {{__('no')}}</option>
                <option value=1 @if(old('is_employee') or $person->is_employee )selected @endif
                    > {{__('yes')}}</option>
            </select>
        </div>
        @if (auth()->user()->is_admin)
        <div class="col-md">
            <label for="email">{{__( 'email')}} <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="email" name="email" class="form-control mb-3 @error ('email') is-invalid @enderror"
                placeholder="{{ __('email') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('email') }}..'" value="{{ old('email') ?? $person->email }}">
            @error('email')
            <small class="text-danger"> {{$errors->first('email')}} </small>
            @enderror
        </div>
        @endif
        <div class="col-md">
            <label for="is_customer">{{__( 'customer')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <select name="is_customer" class="form-control @error ('is_customer') is-invalid @enderror" required>
                <option value=0 selected> {{__('no')}}</option>
                <option value=1 @if ( old('is_customer') or $person->is_customer ) selected @endif
                    > {{__('yes')}}</option>
            </select>
        </div>
    </div>
</div>
@else
<div class="form-group">
    <div class="form-row mb-3">
        <div class="col-md">
            <label for="is_employee">{{__( 'employee')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <select name="is_employee" class="form-control @error ('is_employee') is-invalid @enderror" required>
                <option value=0 selected disabled> {{__('no')}}</option>
                <option value=1 @if(old('is_employee') or $person->is_employee )selected @endif disabled>
                    {{__('yes')}} </option>
            </select>
        </div>
        <div class="col-md">
            <label for="is_customer">{{__( 'customer')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <select name="is_customer" class="form-control @error ('is_customer') is-invalid @enderror" required>
                <option value=0 disabled> {{__('no')}}</option>
                <option value=1 selected disabled> {{__('yes')}}</option>
            </select>
        </div>
    </div>
</div>
@endif

{{-- END: person type --}}

{{-- ============================================================================================== --}}

<div class="card-header text-white bg-dark mb-3">
    {{__('name')}}:
</div>

{{-- ============================================================================================== --}}

{{--START: arabic Name --}}
<div class="form-group">
    <label for="fname" class="d-block">{{__('the name')}} <span class="small text-danger">({{__('required')}})</span>
        :</label>
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name1" class="form-control @error ('ar_name1') is-invalid @enderror"
                placeholder="{{ __('name1') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name1') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name1') ?? $person->ar_name1 }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('ar_name1')
            <small class="text-danger"> {{$errors->first('ar_name1')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name2" class="form-control @error ('ar_name2') is-invalid @enderror"
                placeholder="{{ __('name2') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name2') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name2') ?? $person->ar_name2 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('ar_name2')
            <small class="text-danger"> {{$errors->first('ar_name2')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name3" class="form-control @error ('ar_name3') is-invalid @enderror"
                placeholder="{{ __('name3') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name3') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name3') ?? $person->ar_name3 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('ar_name3')
            <small class="text-danger"> {{$errors->first('ar_name3')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name4" class="form-control @error ('ar_name4') is-invalid @enderror"
                placeholder="{{ __('name4') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name4') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name4') ?? $person->ar_name4 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('ar_name4')
            <small class="text-danger"> {{$errors->first('ar_name4')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name5" class="form-control @error ('ar_name5') is-invalid @enderror"
                placeholder="{{ __('name5') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name5') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name5') ?? $person->ar_name5 }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('ar_name5')
            <small class="text-danger"> {{$errors->first('ar_name5')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
    {{-- hiefdls --}}
    {{-- end form-row --}}
</div>
{{-- END: arabic Name --}}

{{-- START: english Name --}}
<div class="form-group">
    <label for="fname" class="d-block">{{__('The Name in English')}} <span
            class="small text-muted">({{__('optional')}})</span> :</label>
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="en_name1" class="form-control @error ('en_name1') is-invalid @enderror"
                placeholder="{{ __('name1') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name1') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('en_name1') ?? $person->en_name1 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('en_name1')
            <small class="text-danger"> {{$errors->first('en_name1')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="en_name2" class="form-control @error ('en_name2') is-invalid @enderror"
                placeholder="{{ __('name2') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name2') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('en_name2') ?? $person->en_name2 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('en_name2')
            <small class="text-danger"> {{$errors->first('en_name2')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="en_name3" class="form-control @error ('en_name3') is-invalid @enderror"
                placeholder="{{ __('name3') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name3') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('en_name3') ?? $person->en_name3 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('en_name3')
            <small class="text-danger"> {{$errors->first('en_name3')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="en_name4" class="form-control @error ('en_name4') is-invalid @enderror"
                placeholder="{{ __('name4') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name4') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('en_name4') ?? $person->en_name4 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('en_name4')
            <small class="text-danger"> {{$errors->first('en_name4')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="en_name5" class="form-control @error ('en_name5') is-invalid @enderror"
                placeholder="{{ __('name5') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name5') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('en_name5') ?? $person->en_name5 }}" pattern=".{2,}" title="{{__('minimum 2 letters')}}">
            @error('en_name5')
            <small class="text-danger"> {{$errors->first('en_name5')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
    {{-- end form-row --}}
</div>
{{-- END: english Name --}}

{{-- ============================================================================================== --}}

{{-- START: ID Information --}}
<div class="card-header text-white bg-dark mb-3">
    Identity Information:
</div>
<div class="form-group">
    @php $national_id = $national_id ?? $person->national_id; @endphp

    @if (substr($national_id,0,1)=='1')
    <input type="hidden" name="nationaltiy_code" value="153">
    {{-- START: of Sudi ID info --}}
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="national_id">{{__( 'nId')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="national_id" class="form-control mb-3 @error ('nId') is-invalid @enderror"
                value="{{ $national_id ?? $person->national_id }}" readonly required>
            @error('nId')
            <small class="text-danger"> {{$errors->first('nId')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'Hafizah Number')}} <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="text" name="hafizah_no" class="form-control mb-3 @error ('hafizah_no') is-invalid @enderror"
                placeholder="{{ __('HafizahNumber') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('HafizahNumber') }}..'"
                value="{{ old('hafizah_no') ?? $person->hafizah_no }}" onkeypress="onlyNumber(event)">
            @error('hafizah_no')
            <small class="text-danger"> {{$errors->first('hafizah_no')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'National ID Issue Date')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>

            <input type="text" name="national_id_issue_date"
                class="form-control mb-3 @error ('national_id_issue_date') is-invalid @enderror"
                placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
                value="{{old('national_id_issue_date') ?? $person->national_id_issue_date}}"
                pattern="\d{1,2}/\d{1,2}/\d{4}">
            @error('national_id_issue_date')
            <small class="text-danger"> {{$errors->first('national_id_issue_date')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'National ID Expiration Date')}}
                <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_expire_date"
                class="form-control mb-3 @error ('national_id_expire_date') is-invalid @enderror"
                placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
                value="{{old('national_id_expire_date') ?? $person->national_id_expire_date}}"
                pattern="\d{1,2}/\d{1,2}/\d{4}">
            @error('national_id_expire_date')
            <small class="text-danger"> {{$errors->first('national_id_expire_date')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'National ID Issue Place')}}
                <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_issue_place"
                class="form-control mb-3 @error ('national_id_issue_place') is-invalid @enderror"
                placeholder="{{__( 'National ID Issue Place')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'National ID Issue Place')}}..'"
                value="{{ old('national_id_issue_place') ?? $person->national_id_issue_place }}">
            @error('national_id_issue_place')
            <small class=" text-danger"> {{$errors->first('national_id_issue_place')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div> {{-- END: of Sudi ID info --}}

    @else
    {{-- START: of Non Sudi ID info --}}
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="national_id">{{__( 'Muqeem ID')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="national_id" class="form-control mb-3 @error ('national_id') is-invalid @enderror"
                value="{{$national_id}}" required readonly>
            @error('national_id')
            <small class=" text-danger"> {{$errors->first('national_id')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'Muqeem ID Issue Date')}}
                <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_issue_date"
                class="form-control mb-3 @error ('national_id_issue_date') is-invalid @enderror"
                placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
                value="{{old('national_id_issue_date') ?? $person->national_id_issue_date}}"
                pattern="\d{1,2}/\d{1,2}/\d{4}">
            @error('national_id_issue_date')
            <small class=" text-danger"> {{$errors->first('national_id_issue_date')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'Muqeem ID Expiration Date')}}
                <span class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_expire_date"
                class="form-control mb-3 @error ('national_id_expire_date') is-invalid @enderror"
                placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
                value="{{ old('national_id_expire_date') ?? $person->national_id_expire_date}}"
                pattern="\d{1,2}/\d{1,2}/\d{4}">
            @error('national_id_expire_date')
            <small class="text-danger"> {{$errors->first('national_id_expire_date')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'Muqeem ID Issue Place')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_issue_place"
                class="form-control mb-3 @error ('national_id_issue_place') is-invalid @enderror"
                placeholder="{{__( 'National ID Issue Place')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'National ID Issue Place')}}..'"
                value="{{ old('national_id_issue_place') ?? $person->national_id_issue_place}}">
            @error('national_id_issue_place')
            <small class=" text-danger"> {{$errors->first('national_id_issue_place')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'Nationaltiy')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <select name="nationaltiy_code" class="form-control @error ('nationaltiy_code') is-invalid @enderror"
                required>
                <option selected value="">{{__( 'Nationaltiy')}}..</option>
                @foreach ($countries as $country)

                @if (App::isLocale('ar'))
                <option value="{{$country->code_2chracters}}" @if(old('nationaltiy_code')==$country->code_2chracters or
                    $person->nationaltiy_code == $country->code_2chracters )selected
                    @endif >
                    {{$country->ar_name}} </option>
                @else
                <option value="{{$country->code_2chracters}}" @if(old('nationaltiy_code')==$country->code_2chracters or
                    $person->nationaltiy_code==$country->code_2chracters )selected
                    @endif>
                    {{$country->en_name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>{{-- END: of Non Sudi ID info --}}
    @endif
</div>
{{-- END: ID information --}}

{{-- ============================================================================================== --}}

{{-- Personal Information --}}
<div class="card-header text-white bg-dark mb-3">
    Personal Information:
</div>
<div class="form-group">
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'Mobile')}} <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="mobile" class="form-control mb-3 @error ('mobile') is-invalid @enderror"
                placeholder="{{__( 'phoneNo')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'phoneNo')}}..'" value="{{ old('mobile') ?? $person->mobile }}"
                onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" required
                title="{{__('must be 10 digits')}}">
            @error('mobile')
            <small class=" text-danger"> {{$errors->first('mobile')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'Hijri Birth Date')}} <span class="small text-muted">({{__('optional')}})</span>
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
            <label for="fname">{{__( 'Gregorian Birth Date')}}
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
            <label for="fname">{{__( 'Birth Place')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <input type="text" name="birth_place" class="form-control mb-3" placeholder="{{__( 'Birth Place')}}.."
                onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'Birth Place')}}..'"
                value="{{ old('birth_place') ?? $person->birth_place }}">
            @error('birth_place')
            <small class=" text-danger"> {{$errors->first('birth_place')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
</div>
{{-- ============================================================================================== --}}

{{-- notes  --}}
@if(auth()->user()->is_admin)
<div class="card-header text-white bg-dark mb-3">
    Personal Information:
</div>
<div class="form-group">
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="notes">{{__( 'notes')}}
                <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <textarea name="notes" class="form-control @error ('notes') is-invalid @enderror " rows="3"
                placeholder="add your notes.." onfocus="this.placeholder=''"
                onblur="this.placeholder='add your notes..'">
                {{old('notes') ?? $person->notes }}</textarea>
            @error('notes')
            <small class="text-danger"> {{$errors->first('notes')}} </small>
            @enderror


        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}

        <div class="col-md">
            <label for="private_notes">{{__( 'private_notes')}}
                <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <textarea name="private_notes" class="form-control @error ('private_notes') is-invalid @enderror " rows="3"
                placeholder="add your private_notes.." onfocus="this.placeholder=''"
                onblur="this.placeholder='add your private_notes..'">
                {{old('private_notes') ?? $person->private_notes }}</textarea>
            @error('private_notes')
            <small class="text-danger"> {{$errors->first('private_notes')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
</div>
@endif