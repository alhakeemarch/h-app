<h5 class="card-header text-white bg-dark my-2">{{ __('notes') }} </h5>
<div class="form-group row ">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'notes')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <textarea name="notes" class="form-control @error ('notes') is-invalid @enderror " rows="3"
            placeholder="add your notes.." onfocus="this.placeholder=''" onblur="this.placeholder='add your notes..'">
                {{old('notes') ?? $plot->notes }}</textarea>
        @error('notes')
        <small class="text-danger"> {{$errors->first('notes')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="fname">{{__( 'private_notes')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <textarea name="private_notes" class="form-control @error ('private_notes') is-invalid @enderror " rows="3"
            placeholder="add your private_notes.." onfocus="this.placeholder=''"
            onblur="this.placeholder='add your private_notes..'">
                {{old('private_notes') ?? $plot->private_notes }}</textarea>
        @error('private_notes')
        <small class="text-danger"> {{$errors->first('private_notes')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>