<div class="card-header text-white bg-dark mb-3">
    notes:
</div>
<div class="form-group">
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="notes">{{__( 'notes')}}
                <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <textarea name="notes" class="form-control @error ('notes') is-invalid @enderror " rows="3"
                placeholder="add your notes.." onfocus="this.placeholder=''"
                onblur="this.placeholder='add your notes..'">
                {{old('notes') ?? $user->notes }}</textarea>
            @error('notes')
            <small class="text-danger"> {{$errors->first('notes')}} </small>
            @enderror


        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}

        <div class="col-md">
            <label for="private_notes">{{__( 'private_notes')}}
                <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <textarea name="private_notes" class="form-control @error ('private_notes') is-invalid @enderror " rows="3"
                placeholder="add your private_notes.." onfocus="this.placeholder=''"
                onblur="this.placeholder='add your private_notes..'">
                {{old('private_notes') ?? $user->private_notes }}</textarea>
            @error('private_notes')
            <small class="text-danger"> {{$errors->first('private_notes')}} </small>
            @enderror
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
</div>