<div class="card-header text-white bg-dark mb-3">
    {{__('name')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="name">{{__( 'name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="name" class="form-control mb-3 @error ('name') is-invalid @enderror"
            placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'name')}}..'"
            value="{{ old('name') ?? $user->name }}">
        @error('name')
        <small class=" text-danger"> {{$errors->first('name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="user_name">{{__( 'user_name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="user_name" class="form-control mb-3 @error ('user_name') is-invalid @enderror"
            placeholder="{{__( 'user_name')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'user_name')}}..'" value="{{ old('user_name') ?? $user->user_name }}">
        @error('user_name')
        <small class=" text-danger"> {{$errors->first('user_name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="email">{{__( 'email')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="email" name="email" class="form-control mb-3 @error ('email') is-invalid @enderror"
            placeholder="{{__( 'email')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'email')}}..'" value="{{ old('email') ?? $user->email }}">
        @error('email')
        <small class=" text-danger"> {{$errors->first('email')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>