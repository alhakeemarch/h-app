<div class="card-header text-white bg-dark mb-3">
    {{__('password')}}:
</div>
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="password">{{ __('Password') }}</label>
        <input name="password" type="text" class="form-control @error ('password') is-invalid @enderror"
            placeholder="{{__( 'password')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{ __('password') }}..'" value="{{ old('password') ?? $user->password }}" required
            readonly>
        @error('password')
        <small class=" text-danger invalid-feedback" role="alert"> {{$errors->first('password')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="pass_char">{{ __('pass_char') }}</label>
        <input name="pass_char" type="text" placeholder="{{__( 'password')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='pass_char" class="form-control @error ('pass_char') is-invalid @enderror"
            value="{{ old('pass_char') ?? $user->pass_char }}" required>
        @error('pass_char')
        <small class=" text-danger invalid-feedback" role="alert"> {{$errors->first('pass_char')}}
        </small>
        @enderror
    </div>
</div>