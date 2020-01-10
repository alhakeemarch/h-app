<div class="card-header text-white bg-dark mb-3">
    Bank Account information:
</div>

<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="bank_id">{{__( 'bank name')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="bank_id" class="form-control @error ('bank_id') is-invalid @enderror">
            <option selected value="" disabled>{{__( 'please pick')}}..</option>
            @foreach ($banks as $bank)
            @if (App::isLocale('ar'))
            <option value="{{$bank->id}}" @if ($person->bank_id == $bank->id) selected @endif>{{$bank->name_ar}}
            </option>
            @else
            <option value="{{$bank->id}}" @if ($person->bank_id == $bank->id) selected @endif>{{$bank->name_en}}
            </option>
            @endif
            @endforeach
        </select>
        @error('bank_id')
        <small class=" text-danger"> {{$errors->first('bank_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="bank_account_no">{{__( 'account number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="bank_account_no"
            class="form-control mb-3 @error ('bank_account_no') is-invalid @enderror"
            placeholder="{{__( 'account number')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'account number')}}..'"
            value="{{ old('bank_account_no') ?? $person->bank_account_no }}" onkeypress="onlyNumber(event)">
        @error('bank_account_no')
        <small class=" text-danger"> {{$errors->first('bank_account_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="bank_IBAN_no">{{__( 'IBAN number')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="bank_IBAN_no" class="form-control mb-3 @error ('bank_IBAN_no') is-invalid @enderror"
            placeholder="{{__( 'IBAN number')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'IBAN number')}}..'"
            value="{{ old('bank_IBAN_no') ?? $person->bank_IBAN_no }}" minlength="24" maxlength="24" pattern=".{24,}"
            title="{{__('must be 24 digits')}}">
        @error('bank_IBAN_no')
        <small class=" text-danger"> {{$errors->first('bank_IBAN_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>