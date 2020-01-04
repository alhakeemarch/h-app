{{-- START: ID Information --}}
<div class="card-header text-white bg-dark mb-3">
    Identity Information:
</div>
<div class="form-group row">
    @php $national_id = $national_id ?? $person->national_id; @endphp

    @if (substr($national_id,0,1)=='1')
    {{-- START: of Sudi ID info --}}
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
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'National ID Issue Date')}} <span class="small text-muted">({{__('optional')}})</span>
            :</label>

        <input type="text" name="national_id_issue_date"
            class="form-control mb-3 @error ('national_id_issue_date') is-invalid @enderror"
            placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
            value="{{old('national_id_issue_date') ?? $person->national_id_issue_date}}"
            pattern="\d{1,2}/\d{1,2}/\d{4}">
        @error('national_id_issue_date')
        <small class="text-danger"> {{$errors->first('national_id_issue_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'National ID Expiration Date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="national_id_expire_date"
            class="form-control mb-3 @error ('national_id_expire_date') is-invalid @enderror"
            placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
            value="{{old('national_id_expire_date') ?? $person->national_id_expire_date}}"
            pattern="\d{1,2}/\d{1,2}/\d{4}">
        @error('national_id_expire_date')
        <small class="text-danger"> {{$errors->first('national_id_expire_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'National ID Issue Place')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="national_id_issue_place"
            class="form-control mb-3 @error ('national_id_issue_place') is-invalid @enderror"
            placeholder="{{__( 'National ID Issue Place')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'National ID Issue Place')}}..'"
            value="{{ old('national_id_issue_place') ?? $person->national_id_issue_place }}">
        @error('national_id_issue_place')
        <small class=" text-danger"> {{$errors->first('national_id_issue_place')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div> {{-- END: of Sudi ID info --}}

@else
{{-- START: of Non Sudi ID info --}}
<div class="form-row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'Muqeem ID Issue Date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="national_id_issue_date"
            class="form-control mb-3 @error ('national_id_issue_date') is-invalid @enderror"
            placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
            value="{{old('national_id_issue_date') ?? $person->national_id_issue_date}}"
            pattern="\d{1,2}/\d{1,2}/\d{4}">
        @error('national_id_issue_date')
        <small class=" text-danger"> {{$errors->first('national_id_issue_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'Muqeem ID Expiration Date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="national_id_expire_date"
            class="form-control mb-3 @error ('national_id_expire_date') is-invalid @enderror"
            placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
            value="{{ old('national_id_expire_date') ?? $person->national_id_expire_date}}"
            pattern="\d{1,2}/\d{1,2}/\d{4}">
        @error('national_id_expire_date')
        <small class="text-danger"> {{$errors->first('national_id_expire_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'Muqeem ID Issue Place')}} <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="national_id_issue_place"
            class="form-control mb-3 @error ('national_id_issue_place') is-invalid @enderror"
            placeholder="{{__( 'National ID Issue Place')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'National ID Issue Place')}}..'"
            value="{{ old('national_id_issue_place') ?? $person->national_id_issue_place}}">
        @error('national_id_issue_place')
        <small class=" text-danger"> {{$errors->first('national_id_issue_place')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>{{-- END: of Non Sudi ID info --}}
@endif