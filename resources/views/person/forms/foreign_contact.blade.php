<div class="card-header text-white bg-dark mb-3">
    foreign contact information:
</div>

<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="foreign_phone1">{{__( 'primary foreign phone')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="foreign_phone1"
            class="form-control mb-3 @error ('foreign_phone1') is-invalid @enderror"
            placeholder="{{__( 'primary foreign phone')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'primary foreign phone')}}..'"
            value="{{ old('foreign_phone1') ?? $person->foreign_phone1 }}" onkeypress="onlyNumber(event)">
        @error('foreign_phone1')
        <small class=" text-danger"> {{$errors->first('foreign_phone1')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="foreign_phone2">{{__( 'additional foreign phone')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="foreign_phone2"
            class="form-control mb-3 @error ('foreign_phone2') is-invalid @enderror"
            placeholder="{{__( 'additional foreign phone')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'additional foreign phone')}}..'"
            value="{{ old('foreign_phone2') ?? $person->foreign_phone2 }}" onkeypress="onlyNumber(event)">
        @error('foreign_phone2')
        <small class=" text-danger"> {{$errors->first('foreign_phone2')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="foreign_address1">{{__( 'primary foreign address')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="foreign_address1"
            class="form-control mb-3 @error ('foreign_address1') is-invalid @enderror"
            placeholder="{{__( 'primary foreign address')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'primary foreign address')}}..'"
            value="{{ old('foreign_address1') ?? $person->foreign_address1 }}">
        @error('foreign_address1')
        <small class=" text-danger"> {{$errors->first('foreign_address1')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="foreign_address2">{{__( 'additional foreign address')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="foreign_address2"
            class="form-control mb-3 @error ('foreign_address2') is-invalid @enderror"
            placeholder="{{__( 'additional foreign address')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'additional foreign address')}}..'"
            value="{{ old('foreign_address2') ?? $person->foreign_address2 }}">
        @error('foreign_address2')
        <small class=" text-danger"> {{$errors->first('foreign_address2')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>