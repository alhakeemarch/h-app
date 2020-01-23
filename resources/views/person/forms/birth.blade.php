<div class="card-header text-white bg-dark mb-3">
    birth information:
</div>
<div class="form-group row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="ah_birth_date">{{__( 'hijri birth date')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="ah_birth_date" class="form-control mb-3 @error ('ah_birth_date') is-invalid @enderror"
            placeholder="{{__( 'dd-mm-yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd-mm-yyyy')}}..'"
            value="{{ old('ah_birth_date') ?? $person->ah_birth_date }}"
            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="DD-MM-YYYY">
        @error('ah_birth_date')
        <small class=" text-danger"> {{$errors->first('ah_birth_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="ad_birth_date">{{__( 'gregorian birth date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="ad_birth_date" class="form-control mb-3 @error ('ad_birth_date') is-invalid @enderror"
            placeholder="{{__( 'dd-mm-yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd-mm-yyyy')}}..'"
            value="{{ old('ad_birth_date') ?? $person->ad_birth_date }}"
            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="DD-MM-YYYY">
        @error('ad_birth_date')
        <small class=" text-danger"> {{$errors->first('ad_birth_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="birth_place">{{__( 'birth place')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>

        <select name="birth_place" class="form-control @error ('birth_place') is-invalid @enderror">
            <option selected value="" disabled>{{__( 'birth place')}}..</option>
            @foreach ($countries as $country)

            @if (App::isLocale('ar'))
            <option value="{{$country->code_2chracters}}" @if(old('birth_place')==$country->code_2chracters or
                $person->birth_place == $country->code_2chracters )selected
                @endif >
                {{$country->ar_name}} </option>
            @else
            <option value="{{$country->code_2chracters}}" @if(old('birth_place')==$country->code_2chracters or
                $person->birth_place==$country->code_2chracters )selected
                @endif>
                {{$country->en_name}}</option>
            @endif
            @endforeach
        </select>

        @error('birth_place')
        <small class=" text-danger"> {{$errors->first('birth_place')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="birth_city">{{__( 'birth city')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <input type="text" name="birth_city" class="form-control mb-3" placeholder="{{__( 'birth city')}}.."
            onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'birth city')}}..'"
            value="{{ old('birth_city') ?? $person->birth_city }}">
        @error('birth_city')
        <small class=" text-danger"> {{$errors->first('birth_city')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}

</div>