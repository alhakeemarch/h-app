<div class="card-header text-white bg-dark mb-3">
    emergency contacts information:
</div>

<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="emergency_contact_name1">{{__( 'primary contact name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="emergency_contact_name1"
            class="form-control mb-3 @error ('emergency_contact_name1') is-invalid @enderror"
            placeholder="{{__( 'primary contact name')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'primary contact name')}}..'"
            value="{{ old('emergency_contact_name1') ?? $person->emergency_contact_name1 }}">
        @error('emergency_contact_name1')
        <small class=" text-danger"> {{$errors->first('emergency_contact_name1')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="emergency_contact_mobile1">{{__( 'primary contact phone')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="emergency_contact_mobile1"
            class="form-control mb-3 @error ('emergency_contact_mobile1') is-invalid @enderror"
            placeholder="{{__( 'primary contact phone')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'primary contact phone')}}..'"
            value="{{ old('emergency_contact_mobile1') ?? $person->emergency_contact_mobile1 }}"
            onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" title="{{__('must be 10 digits')}}">
        @error('emergency_contact_mobile1')
        <small class=" text-danger"> {{$errors->first('emergency_contact_mobile1')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="emergency_contact_relationship1">{{__( 'primary contact relationship')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="emergency_contact_relationship1"
            class="form-control mb-3 @error ('emergency_contact_relationship1') is-invalid @enderror"
            placeholder="{{__( 'primary contact relationship')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'primary contact relationship')}}..'"
            value="{{ old('emergency_contact_relationship1') ?? $person->emergency_contact_relationship1 }}"
            onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" title="{{__('must be 10 digits')}}">
        @error('emergency_contact_relationship1')
        <small class=" text-danger"> {{$errors->first('emergency_contact_relationship1')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>

<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="emergency_contact_name2">{{__( 'additional contact name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="emergency_contact_name2"
            class="form-control mb-3 @error ('emergency_contact_name2') is-invalid @enderror"
            placeholder="{{__( 'additional contact name')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'additional contact name')}}..'"
            value="{{ old('emergency_contact_name2') ?? $person->emergency_contact_name2 }}">
        @error('emergency_contact_name2')
        <small class=" text-danger"> {{$errors->first('emergency_contact_name2')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="emergency_contact_mobile2">{{__( 'additional contact phone')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="emergency_contact_mobile2"
            class="form-control mb-3 @error ('emergency_contact_mobile2') is-invalid @enderror"
            placeholder="{{__( 'additional contact phone')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'additional contact phone')}}..'"
            value="{{ old('emergency_contact_mobile2') ?? $person->emergency_contact_mobile2 }}"
            onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" title="{{__('must be 10 digits')}}">
        @error('emergency_contact_mobile2')
        <small class=" text-danger"> {{$errors->first('emergency_contact_mobile2')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="emergency_contact_relationship2">{{__( 'additional contact relationship')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="emergency_contact_relationship2"
            class="form-control mb-3 @error ('emergency_contact_relationship2') is-invalid @enderror"
            placeholder="{{__( 'additional contact relationship')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'additional contact relationship')}}..'"
            value="{{ old('emergency_contact_relationship2') ?? $person->emergency_contact_relationship2 }}"
            onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" title="{{__('must be 10 digits')}}">
        @error('emergency_contact_relationship2')
        <small class=" text-danger"> {{$errors->first('emergency_contact_relationship2')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>