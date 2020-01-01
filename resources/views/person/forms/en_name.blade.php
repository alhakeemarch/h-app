{{-- ============================================================================================== --}}
{{-- <div class="card-header text-white bg-dark mb-3">
    {{__('English name')}}:
</div> --}}
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
{{-- ============================================================================================== --}}