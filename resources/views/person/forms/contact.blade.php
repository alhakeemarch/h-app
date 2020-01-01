<div class="card-header text-white bg-dark mb-3">
    Contact Information:
</div>
<div class="row">
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
</div>