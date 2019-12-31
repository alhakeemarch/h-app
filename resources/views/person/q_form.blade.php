{{-- ============================================================================================== --}}
<div class="card-header text-white bg-dark mb-3">
    {{__('name')}}:
</div>
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
    {{-- end form-row --}}
</div>
{{-- END: arabic Name --}}

{{-- ============================================================================================== --}}

{{-- START: ID Information --}}
<div class="card-header text-white bg-dark mb-3">
    Identity Information:
</div>
<div class="form-group row mb-3">
    @php $national_id = $national_id ?? $person->national_id; @endphp

    @if (substr($national_id,0,1)=='1')
    <input type="hidden" name="nationaltiy_code" value="SA">
    {{-- START: of Sudi ID info --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="national_id">{{__( 'nId')}} <span class="small text-danger">({{__('required')}})</span>
            :</label>
        <input type="text" name="national_id" class="form-control mb-3 @error ('nId') is-invalid @enderror"
            value="{{ $national_id ?? $person->national_id }}" readonly required>
        @error('nId')
        <small class="text-danger"> {{$errors->first('nId')}} </small>
        @enderror
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div> {{-- END: of Sudi ID info --}}

    @else
    {{-- START: of Non Sudi ID info --}}
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
        <label for="fname">{{__( 'Nationaltiy')}} <span class="small text-danger">({{__('required')}})</span>
            :</label>
        <select name="nationaltiy_code" class="form-control @error ('nationaltiy_code') is-invalid @enderror" required>
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
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>{{-- END: of Non Sudi ID info --}}
    @endif

    {{-- --------------------------------------------------------------------------------------------- --}}
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
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'Mobile')}} <span class="small text-danger">({{__('required')}})</span> :</label>
        <input type="text" name="mobile" class="form-control mb-3 @error ('mobile') is-invalid @enderror"
            placeholder="{{__( 'phoneNo')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'phoneNo')}}..'" value="{{ old('mobile') ?? $person->mobile }}"
            onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
        @error('mobile')
        <small class=" text-danger"> {{$errors->first('mobile')}} </small>
        @enderror
    </div>
    @endif
    {{-- --------------------------------------------------------------------------------------------- --}}

</div>
{{-- END: ID information --}}