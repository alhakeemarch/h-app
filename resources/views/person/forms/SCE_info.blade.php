<div class="card-header text-white bg-dark mb-3">
    saudi council of engineers information:
</div>

<div class="form-group row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="SCE_membership_no">{{__( 'SCE membership number')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="SCE_membership_no"
            class="form-control mb-3 @error ('SCE_membership_no') is-invalid @enderror"
            placeholder="{{__( 'SCE membership number')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'SCE membership number')}}..'"
            value="{{ old('SCE_membership_no') ?? $person->SCE_membership_no }}">
        @error('SCE_membership_no')
        <small class=" text-danger"> {{$errors->first('SCE_membership_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="SCE_membership_type_id">{{__( 'SCE membership type')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="SCE_membership_type_id"
            class="form-control @error ('SCE_membership_type_id') is-invalid @enderror">
            <option selected value="" disabled>{{__( 'please pick')}}..</option>
            @foreach ($SCE_membership_types as $SCE_membership_type)
            @if (App::isLocale('ar'))
            <option value="{{$SCE_membership_type->id}}" @if ($person->SCE_membership_type_id ==
                $SCE_membership_type->id) selected
                @endif>{{$SCE_membership_type->name_ar}}
            </option>
            @else
            <option value="{{$SCE_membership_type->id}}" @if ($person->SCE_membership_type_id ==
                $SCE_membership_type->id) selected
                @endif>{{$SCE_membership_type->name_en}}
            </option>
            @endif
            @endforeach
        </select>
        @error('SCE_membership_type_id')
        <small class=" text-danger"> {{$errors->first('SCE_membership_type_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="SCE_membership_expire_date">{{__( 'SCE membership expire date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="SCE_membership_expire_date"
            class="form-control mb-3 @error ('SCE_membership_expire_date') is-invalid @enderror"
            placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
            value="{{ old('SCE_membership_expire_date') ?? $person->SCE_membership_expire_date }}"
            pattern="\d{1,2}/\d{1,2}/\d{4}">
        @error('SCE_membership_expire_date')
        <small class=" text-danger"> {{$errors->first('SCE_membership_expire_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="SCE_classification_expire_date">{{__( 'SCE classification expire date')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="SCE_classification_expire_date"
            class="form-control mb-3 @error ('SCE_classification_expire_date') is-invalid @enderror"
            placeholder="{{__( 'dd/mm/yyyy')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'dd/mm/yyyy')}}..'"
            value="{{ old('SCE_classification_expire_date') ?? $person->SCE_classification_expire_date }}"
            pattern="\d{1,2}/\d{1,2}/\d{4}">
        @error('SCE_classification_expire_date')
        <small class=" text-danger"> {{$errors->first('SCE_classification_expire_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>