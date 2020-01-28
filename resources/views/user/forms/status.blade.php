<div class="card-header text-white bg-dark mb-3">
    user status:
</div>

<div class="form-group">
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="is_admin">{{__( 'admin')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="is_admin" class="form-control @error ('is_admin') is-invalid @enderror" required>
                <option value=0 selected> {{__('no')}}</option>
                <option value=1 @if(old('is_admin') or $user->is_admin )selected @endif
                    > {{__('yes')}}</option>
            </select>
            @error('is_admin')
            <small class=" text-danger"> {{$errors->first('is_admin')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="is_manager">{{__( 'manager')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="is_manager" class="form-control @error ('is_manager') is-invalid @enderror" required>
                <option value=0 selected> {{__('no')}}</option>
                <option value=1 @if(old('is_manager') or $user->is_manager )selected @endif
                    > {{__('yes')}}</option>
            </select>
            @error('is_manager')
            <small class=" text-danger"> {{$errors->first('is_manager')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="is_active">{{__( 'active')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="is_active" class="form-control @error ('is_active') is-invalid @enderror" required>
                <option value=0 selected> {{__('no')}}</option>
                <option value=1 @if(old('is_active') or $user->is_active )selected @endif
                    > {{__('yes')}}</option>
            </select>
            @error('is_active')
            <small class=" text-danger"> {{$errors->first('is_active')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
</div>