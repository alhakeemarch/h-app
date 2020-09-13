<div class="card-header text-white bg-dark mb-3">
    Contact Information:
</div>
{{-- ============================================================================================= --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- <div class="col-md">
        <label for="mobile">{{__( 'primary mobile')}}
    <span class="small text-danger">({{__('required')}})</span> :</label>
    <input type="text" name="mobile" class="form-control mb-3 @error ('mobile') is-invalid @enderror"
        placeholder="{{__( 'primary mobile no')}}.." onfocus="this.placeholder=''"
        onblur="this.placeholder='{{__( 'primary mobile no')}}..'" value="{{ old('mobile') ?? $person->mobile }}"
        onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
    @error('mobile')
    <small class=" text-danger"> {{$errors->first('mobile')}} </small>
    @enderror
</div> --}}


<x-input name='mobile' title="">
    <x-slot name='type'>tel</x-slot>
    <x-slot name='title'>{{__( 'primary mobile')}}</x-slot>
    <x-slot name='tooltip'>{{__('must be 10 digits')}}</x-slot>
    <x-slot name='placeholder'>05xxxxxxxx</x-slot>
    {{-- ------------------------------------------------------- --}}
    <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
    {{-- ------------------------------------------------------- --}}
    <x-slot name='is_required'>true</x-slot>
    {{-- ------------------------------------------------------- --}}
    <x-slot name='input_pattern'>.{10,}</x-slot>
    {{-- ------------------------------------------------------- --}}
    <x-slot name='input_min'>5</x-slot>
    <x-slot name='input_max'>10</x-slot>
    {{-- ------------------------------------------------------- --}}
    <x-slot name='input_value'>{{ old('mobile') ?? $person->mobile }}</x-slot>
    {{-- ------------------------------------------------------- --}}
</x-input>



{{-- --------------------------------------------------------------------------------------------- --}}
<div class="col-md">
    <label for="email">{{__( 'primary email')}}
        <span class="small text-muted">({{__('optional')}})</span> :</label>
    <input type="email" name="email" class="form-control mb-3 @error ('email') is-invalid @enderror"
        placeholder="{{ __('primary email') }}.." onfocus="this.placeholder=''"
        onblur="this.placeholder='{{ __('primary email') }}..'" value="{{ old('email') ?? $person->email }}">
    @error('email')
    <small class="text-danger"> {{$errors->first('email')}} </small>
    @enderror
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class="col-md">
    <label for="phone">{{__( 'land phone')}}
        <span class="small text-muted">({{__('optional')}})</span> :</label>
    <input type="text" name="phone" class="form-control mb-3 @error ('phone') is-invalid @enderror"
        placeholder="{{__( 'land phone no')}}.." onfocus="this.placeholder=''"
        onblur="this.placeholder='{{__( 'land phone no')}}..'" value="{{ old('phone') ?? $person->phone }}"
        onkeypress="onlyNumber(event)">
    @error('phone')
    <small class=" text-danger"> {{$errors->first('phone')}} </small>
    @enderror
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class="col-md">
    <label for="phone_extension">{{__( 'phone extension')}}
        <span class="small text-muted">({{__('optional')}})</span> :</label>
    <input type="text" name="phone_extension" class="form-control mb-3 @error ('phone_extension') is-invalid @enderror"
        placeholder="{{__( 'phone_extension no')}}.." onfocus="this.placeholder=''"
        onblur="this.placeholder='{{__( 'phone_extension no')}}..'"
        value="{{ old('phone_extension') ?? $person->phone_extension }}" onkeypress="onlyNumber(event)">
    @error('phone_extension')
    <small class=" text-danger"> {{$errors->first('phone_extension')}} </small>
    @enderror
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
</div>
{{-- ============================================================================================= --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="mobile2">{{__( 'additional phone 1')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="mobile2" class="form-control mb-3 @error ('mobile2') is-invalid @enderror"
            placeholder="{{__( 'additional phone 1 no')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'additional phone 1 no')}}..'"
            value="{{ old('mobile2') ?? $person->mobile2 }}" onkeypress="onlyNumber(event)">
        @error('mobile2')
        <small class=" text-danger"> {{$errors->first('mobile2')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="mobile3">{{__( 'additional phone 2')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="mobile3" class="form-control mb-3 @error ('mobile3') is-invalid @enderror"
            placeholder="{{__( 'additional phone 2 no')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'additional phone 2 no')}}..'"
            value="{{ old('mobile3') ?? $person->mobile3 }}" onkeypress="onlyNumber(event)">
        @error('mobile3')
        <small class=" text-danger"> {{$errors->first('mobile3')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="personal_email">{{__( 'personal email')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="personal_email" name="personal_email"
            class="form-control mb-3 @error ('personal_email') is-invalid @enderror"
            placeholder="{{ __('personal email') }}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{ __('personal email') }}..'"
            value="{{ old('personal_email') ?? $person->personal_email }}">
        @error('personal_email')
        <small class="text-danger"> {{$errors->first('personal_email')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>