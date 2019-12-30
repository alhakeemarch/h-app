@csrf

{{-- // to add some rouls --}}
@can('viewAny', App\Country::class)

<div class="card-header text-white bg-dark mb-3">
    {{__('country').' '.__('information')}}:
</div>

{{--START: country main info --}}
<div class="form-group">
    <label for="en_name" class="d-block">{{__('country name')}}
        <span class="small text-danger">({{__('required')}})</span>
        :</label>
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="en_name" class="form-control @error ('en_name') is-invalid @enderror"
                placeholder="{{ __('name (En)') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name (En)') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('en_name') ?? $country->en_name }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('en_name')
            <small class="text-danger"> {{$errors->first('en_name')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name" class="form-control @error ('ar_name') is-invalid @enderror"
                placeholder="{{ __('name (Ar)') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name (Ar)') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name') ?? $country->ar_name }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('ar_name')
            <small class="text-danger"> {{$errors->first('ar_name')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="code_2chracters"
                class="form-control @error ('code_2chracters') is-invalid @enderror"
                placeholder="{{ __('code 2 characters') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('code 2 characters') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('code_2chracters') ?? $country->code_2chracters }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('code_2chracters')
            <small class="text-danger"> {{$errors->first('code_2chracters')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}

        {{-- end form-row --}}
    </div>
</div>
{{-- END: country main info --}}
@endcan



<div class="card-header text-white bg-dark mb-3">
    {{__('nationality').' '.__('information')}}:
</div>

{{--START: country main info --}}
<div class="form-group">
    <label for="nationality" class="d-block">{{__('nationality')}}
        <span class="small text-danger">({{__('required')}})</span>
        :</label>
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="en_nationality" class="form-control @error ('en_nationality') is-invalid @enderror"
                placeholder="{{ __('(En) nationality') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('(En) nationality') }}..'" onkeypress="onlyEnglishString(event)"
                value="{{ old('en_nationality') ?? $country->en_nationality }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('en_nationality')
            <small class="text-danger"> {{$errors->first('en_nationality')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_nationality" class="form-control @error ('ar_nationality') is-invalid @enderror"
                placeholder="{{ __('(Ar) general nationality') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('(Ar) general nationality') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_nationality') ?? $country->ar_nationality }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('ar_nationality')
            <small class="text-danger"> {{$errors->first('ar_nationality')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_nationality_male"
                class="form-control @error ('ar_nationality_male') is-invalid @enderror"
                placeholder="{{ __('(Ar) male nationality') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('(Ar) male nationality') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_nationality_male') ?? $country->ar_nationality_male }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('ar_nationality_male')
            <small class="text-danger"> {{$errors->first('ar_nationality_male')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_nationality_female"
                class="form-control @error ('ar_nationality_female') is-invalid @enderror"
                placeholder="{{ __('(Ar) female nationality') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('(Ar) female nationality') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_nationality_female') ?? $country->ar_nationality_female }}" required pattern=".{2,}"
                title="{{__('minimum 2 letters')}}">
            @error('ar_nationality_female')
            <small class="text-danger"> {{$errors->first('ar_nationality_female')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}

        {{-- end form-row --}}
    </div>
</div>
{{-- END: country main info --}}