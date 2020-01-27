<div class="card-header text-white bg-dark mb-3">
    user privileges:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="user_type_id">{{__( 'user_type_id')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="user_type_id" class="form-control mb-3 @error ('user_type_id') is-invalid @enderror"
            placeholder="{{__( 'user_type_id')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'user_type_id')}}..'"
            value="{{ old('user_type_id') ?? $user->user_type_id }}">
        @error('user_type_id')
        <small class=" text-danger"> {{$errors->first('user_type_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="user_type_name">{{__( 'user_type_name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="user_type_name"
            class="form-control mb-3 @error ('user_type_name') is-invalid @enderror"
            placeholder="{{__( 'user_type_name')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'user_type_name')}}..'"
            value="{{ old('user_type_name') ?? $user->user_type_name }}">
        @error('user_type_name')
        <small class=" text-danger"> {{$errors->first('user_type_name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="user_level">{{__( 'user_level')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="user_level" class="form-control mb-3 @error ('user_level') is-invalid @enderror"
            placeholder="{{__( 'user_level')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'user_level')}}..'" value="{{ old('user_level') ?? $user->user_level }}">
        @error('user_level')
        <small class=" text-danger"> {{$errors->first('user_level')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="job_level">{{__( 'job_level')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="job_level" class="form-control mb-3 @error ('job_level') is-invalid @enderror"
            placeholder="{{__( 'job_level')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'job_level')}}..'" value="{{ old('job_level') ?? $user->job_level }}">
        @error('job_level')
        <small class=" text-danger"> {{$errors->first('job_level')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>