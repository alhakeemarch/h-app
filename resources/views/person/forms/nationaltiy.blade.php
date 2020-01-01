{{-- START: ID Information --}}
<div class="card-header text-white bg-dark mb-3">
    Nationaltiy Information:
</div>
<div class="row">
    @php $national_id = $national_id ?? $person->national_id; @endphp

    @if (substr($national_id,0,1)=='1')
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
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="nationaltiy_code">{{__( 'Nationaltiy')}} <span class="small text-danger">({{__('required')}})</span>
            :</label>
        <input type="hidden" name="nationaltiy_code" value="SA">
        <input type="text" class="form-control mb-3 @error ('nationaltiy_code') is-invalid @enderror"
            value="{{ $person->national_id ?? 'Saudi Arabia'}}" readonly required>
        @error('nationaltiy_code')
        <small class="text-danger"> {{$errors->first('nationaltiy_code')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- END: of Sudi ID info --}}

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
    </div>{{-- END: of Non Sudi ID info --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    @endif
</div>