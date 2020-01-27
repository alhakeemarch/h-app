<div class="card-header text-white bg-dark mb-3">
    {{__('id')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="id">{{__( 'id')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="id" class="form-control mb-3 @error ('id') is-invalid @enderror"
            placeholder="{{__( 'id')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'id')}}..'"
            value="{{ old('id') ?? $user->id }}" readonly>
        @error('id')
        <small class=" text-danger"> {{$errors->first('id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="person_id">{{__( 'person_id')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="person_id" class="form-control mb-3 @error ('person_id') is-invalid @enderror"
            placeholder="{{__( 'person_id')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'person_id')}}..'" value="{{ old('person_id') ?? $user->person_id }}"
            readonly>
        @error('person_id')
        <small class=" text-danger"> {{$errors->first('person_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="national_id">{{__( 'national_id')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="national_id" class="form-control mb-3 @error ('national_id') is-invalid @enderror"
            placeholder="{{__( 'national_id')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'national_id')}}..'" value="{{ old('national_id') ?? $user->national_id }}"
            readonly>
        @error('national_id')
        <small class=" text-danger"> {{$errors->first('national_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>