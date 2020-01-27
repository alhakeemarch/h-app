<div class="card-header text-white bg-dark mb-3">
    user status:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="is_admin">{{__( 'is_admin')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="is_admin" class="form-control mb-3 @error ('is_admin') is-invalid @enderror"
            placeholder="{{__( 'is_admin')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'is_admin')}}..'" value="{{ old('is_admin') ?? $user->is_admin }}">
        @error('is_admin')
        <small class=" text-danger"> {{$errors->first('is_admin')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="is_manager">{{__( 'is_manager')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="is_manager" class="form-control mb-3 @error ('is_manager') is-invalid @enderror"
            placeholder="{{__( 'is_manager')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'is_manager')}}..'" value="{{ old('is_manager') ?? $user->is_manager }}">
        @error('is_manager')
        <small class=" text-danger"> {{$errors->first('is_manager')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="is_active">{{__( 'is_active')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="is_active" class="form-control mb-3 @error ('is_active') is-invalid @enderror"
            placeholder="{{__( 'is_active')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'is_active')}}..'" value="{{ old('is_active') ?? $user->is_active }}">
        @error('is_active')
        <small class=" text-danger"> {{$errors->first('is_active')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>