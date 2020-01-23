<div class="card-header text-white bg-dark mb-3">
    pasport information:
</div>

<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="pasport_no"> {{__( 'pasport number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="pasport_no" class="form-control mb-3 @error ('pasport_no') is-invalid @enderror"
            placeholder="{{ __('pasport number') }}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{ __('pasport number') }}..'"
            value="{{ old('pasport_no') ?? $person->pasport_no }}" onkeypress="onlyNumber(event)">
        @error('pasport_no')
        <small class="text-danger"> {{$errors->first('pasport_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="pasport_issue_date"> {{__( 'pasport issue date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="pasport_issue_date"
            class="form-control mb-3 @error ('pasport_issue_date') is-invalid @enderror"
            placeholder="{{ 'dd-mm-yyyy' }}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{ 'dd-mm-yyyy' }}..'"
            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="DD-MM-YYYY"
            value="{{ old('pasport_issue_date') ?? $person->pasport_issue_date }}" onkeypress="onlyNumber(event)">
        @error('pasport_issue_date')
        <small class="text-danger"> {{$errors->first('pasport_issue_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="pasport_expire_date"> {{__( 'pasport expire date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="pasport_expire_date"
            class="form-control mb-3 @error ('pasport_expire_date') is-invalid @enderror"
            placeholder="{{ 'dd-mm-yyyy' }}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{ 'dd-mm-yyyy' }}..'"
            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="DD-MM-YYYY"
            value="{{ old('pasport_expire_date') ?? $person->pasport_expire_date }}" onkeypress="onlyNumber(event)">
        @error('pasport_expire_date')
        <small class="text-danger"> {{$errors->first('pasport_expire_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="pasport_issue_place"> {{__( 'pasport issue place')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="pasport_issue_place"
            class="form-control mb-3 @error ('pasport_issue_place') is-invalid @enderror"
            placeholder="{{ __('pasport issue place') }}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{ __('pasport issue place') }}..'"
            value="{{ old('pasport_issue_place') ?? $person->pasport_issue_place }}" onkeypress="onlyNumber(event)">
        @error('pasport_issue_place')
        <small class="text-danger"> {{$errors->first('pasport_issue_place')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>