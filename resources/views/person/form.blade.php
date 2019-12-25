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
    @php $national_id=$national_id ?? $person->national_id; @endphp

    @if (substr($national_id,0,1)=='1')
    <input type="hidden" name="nationaltiy_id" value="153">
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














        {{-- NOTE: Start from heer --}}

        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'National ID Issue Date')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_issue_date" class="form-control mb-3"
                placeholder="{{__( 'dd/mm/yyyy')}}.." pattern="\d{1,2}/\d{1,2}/\d{4}">
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'National ID Expiration Date')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_expire_date" class="form-control mb-3"
                placeholder="{{__( 'dd/mm/yyyy')}}.." pattern="\d{1,2}/\d{1,2}/\d{4}">
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="fname">{{__( 'National ID Issue Place')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_issue_place" class="form-control mb-3"
                placeholder="{{__( 'National ID Issue Place')}}..">
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>

    @else

    <div class="form-row mb-3">
        <div class="col-md">
            <label for="national_id">{{__( 'Muqeem ID')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" onkeypress="onlyNumber(event)" maxlenght="10" name="national_id"
                class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.." value="{{$national_id}}" maxlength="10"
                pattern=".{10,}" required title="{{__('must be 10 digits')}}" readonly>
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Muqeem ID Issue Date')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_issue_date" class="form-control mb-3"
                placeholder="{{__( 'dd/mm/yyyy')}}.." pattern="\d{1,2}/\d{1,2}/\d{4}">
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Muqeem ID Expiration Date')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_expire_date" class="form-control mb-3"
                placeholder="{{__( 'dd/mm/yyyy')}}.." pattern="\d{1,2}/\d{1,2}/\d{4}">
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Muqeem ID Issue Place')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="national_id_issue_place" class="form-control mb-3"
                placeholder="{{__( 'National ID Issue Place')}}..">
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Nationaltiy')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <select name="nationaltiy_id" class="form-control" required>
                <option selected value="">{{__( 'Nationaltiy')}}..</option>
                @foreach ($nationalitiesArr as $natioality)
                @if (App::isLocale('ar'))
                <option value="{{$natioality->id}}">{{$natioality->ar_name}}</option>
                @else
                <option value="{{$natioality->id}}">{{$natioality->en_name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
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
        <div class="col-md">
            <label for="fname">{{__( 'Mobile')}} <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="mobile" class="form-control mb-3" placeholder="{{__( 'phoneNo')}}.."
                value="{{ old('mobile') ?? $person->mobile }}" aria-describedby="helpId" onkeypress="onlyNumber(event)"
                maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
            {{-- <small id="helpId" class="text-muted">Help text</small> --}}
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Hijri Birth Date')}} <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="text" name="ah_birth_date" class="form-control mb-3" placeholder="{{__( 'Birth Date')}}..">
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Gregorian Birth Date')}} <span
                    class="small text-muted">({{__('optional')}})</span> :</label>
            <input type="text" name="ad_birth_date" class="form-control mb-3" placeholder="{{__( 'Birth Date')}}..">
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Birth Place')}} <span
                    class="small text-muted">({{__('optional')}})</span>:</label>
            <input type="text" name="birth_place" class="form-control mb-3" placeholder="{{__( 'Birth Place')}}..">
        </div>
    </div>
</div>