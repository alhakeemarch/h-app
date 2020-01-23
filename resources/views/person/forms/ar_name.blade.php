{{-- ============================================================================================== --}}
<div class="card-header text-white bg-dark mb-3">
    {{__('name')}}:
</div>
{{--START: arabic Name --}}
<div class="form-group">
    <label for="fname" class="d-block">{{__('arabic name')}} <span class="small text-danger">({{__('required')}})</span>
        :</label>
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name1" class="form-control @error ('ar_name1') is-invalid @enderror"
                placeholder="{{ __('name1') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name1') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name1') ?? $person->ar_name1 }}" required pattern=".{2,}"
                title="1st name minimum 2 letters">
            @error('ar_name1')
            <small class="text-danger"> {{$errors->first('ar_name1')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name2" class="form-control @error ('ar_name2') is-invalid @enderror"
                placeholder="{{ __('name2') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name2') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name2') ?? $person->ar_name2 }}" pattern=".{2,}" title="2nd name minimum 2 letters">
            @error('ar_name2')
            <small class="text-danger"> {{$errors->first('ar_name2')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name3" class="form-control @error ('ar_name3') is-invalid @enderror"
                placeholder="{{ __('name3') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name3') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name3') ?? $person->ar_name3 }}" pattern=".{2,}" title="3rd name minimum 2 letters">
            @error('ar_name3')
            <small class="text-danger"> {{$errors->first('ar_name3')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <input type="text" name="ar_name4" class="form-control @error ('ar_name4') is-invalid @enderror"
                placeholder="{{ __('name4') }}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{ __('name4') }}..'" onkeypress="onlyArabicString(event)"
                value="{{ old('ar_name4') ?? $person->ar_name4 }}" pattern=".{2,}" title="4th name minimum 2 letters">
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
                title="{{__('last name minimum 2 letters')}}">
            @error('ar_name5')
            <small class="text-danger"> {{$errors->first('ar_name5')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
    {{-- end form-row --}}
</div>
{{-- END: arabic Name --}}

{{-- ============================================================================================== --}}