<h5 class="card-header text-white bg-dark my-2">{{ __('borders information') }} </h5>
<div class="card-header text-center my-2">
    {{__('north')}}
</div>
{{-- ============================================================================================= --}}
<div class="row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="north_border_name">{{__( 'name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="north_border_name"
            class="form-control @error ('north_border_name') is-invalid @enderror"
            value="{{old('north_border_name') ?? $plot->north_border_name }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'name')}}..'">
        @error('north_border_name')
        <small class="text-danger"> {{$errors->first('north_border_name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="north_border_length">{{__( 'length')}}
            <small class="small text-muted">({{__('optional')}})</small> :</label>
        <input type="text" name="north_border_length"
            class="form-control @error ('north_border_length') is-invalid @enderror"
            value="{{old('north_border_length') ?? $plot->north_border_length }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'length')}}..'">
        @error('north_border_length')
        <small class="text-danger"> {{$errors->first('north_border_length')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="north_border_setback">{{__( 'setback')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="north_border_setback"
            class="form-control @error ('north_border_setback') is-invalid @enderror"
            value="{{old('north_border_setback') ?? $plot->north_border_setback }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'setback')}}..'">
        @error('north_border_setback')
        <small class="text-danger"> {{$errors->first('north_border_setback')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="north_border_cantilever">{{__( 'cantilever')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="north_border_cantilever"
            class="form-control @error ('north_border_cantilever') is-invalid @enderror"
            value="{{old('north_border_cantilever') ?? $plot->north_border_cantilever }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'cantilever')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'cantilever')}}..'">
        @error('north_border_cantilever')
        <small class="text-danger"> {{$errors->first('north_border_cantilever')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="north_border_chamfer">{{__( 'chamfer')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="north_border_chamfer"
            class="form-control @error ('north_border_chamfer') is-invalid @enderror"
            value="{{old('north_border_chamfer') ?? $plot->north_border_chamfer }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'chamfer')}}..'">
        @error('north_border_chamfer')
        <small class="text-danger"> {{$errors->first('north_border_chamfer')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="north_border_note">{{__( 'note')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="north_border_note"
            class="form-control @error ('north_border_note') is-invalid @enderror"
            value="{{old('north_border_note') ?? $plot->north_border_note }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'note')}}..'">
        @error('north_border_note')
        <small class="text-danger"> {{$errors->first('north_border_note')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
{{-- ============================================================================================= --}}
<div class="card-header text-center my-2">
    {{__('south')}}
</div>
<div class="row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="south_border_name">{{__( 'name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="south_border_name"
            class="form-control @error ('south_border_name') is-invalid @enderror"
            value="{{old('south_border_name') ?? $plot->south_border_name }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'name')}}..'">
        @error('south_border_name')
        <small class="text-danger"> {{$errors->first('south_border_name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="south_border_length">{{__( 'length')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="south_border_length"
            class="form-control @error ('south_border_length') is-invalid @enderror"
            value="{{old('south_border_length') ?? $plot->south_border_length }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'length')}}..'">
        @error('south_border_length')
        <small class="text-danger"> {{$errors->first('south_border_length')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="south_border_setback">{{__( 'setback')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="south_border_setback"
            class="form-control @error ('south_border_setback') is-invalid @enderror"
            value="{{old('south_border_setback') ?? $plot->south_border_setback }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'setback')}}..'">
        @error('south_border_setback')
        <small class="text-danger"> {{$errors->first('south_border_setback')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="south_border_cantilever">{{__( 'cantilever')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="south_border_cantilever"
            class="form-control @error ('south_border_cantilever') is-invalid @enderror"
            value="{{old('south_border_cantilever') ?? $plot->south_border_cantilever }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'cantilever')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'cantilever')}}..'">
        @error('south_border_cantilever')
        <small class="text-danger"> {{$errors->first('south_border_cantilever')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="south_border_chamfer">{{__( 'chamfer')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="south_border_chamfer"
            class="form-control @error ('south_border_chamfer') is-invalid @enderror"
            value="{{old('south_border_chamfer') ?? $plot->south_border_chamfer }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'chamfer')}}..'">
        @error('south_border_chamfer')
        <small class="text-danger"> {{$errors->first('south_border_chamfer')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="south_border_note">{{__( 'note')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="south_border_note"
            class="form-control @error ('south_border_note') is-invalid @enderror"
            value="{{old('south_border_note') ?? $plot->south_border_note }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'note')}}..'">
        @error('south_border_note')
        <small class="text-danger"> {{$errors->first('south_border_note')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
{{-- ============================================================================================= --}}
<div class="card-header text-center my-2">
    {{__('east')}}
</div>
<div class="row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="east_border_name">{{__( 'name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="east_border_name" class="form-control @error ('east_border_name') is-invalid @enderror"
            value="{{old('east_border_name') ?? $plot->east_border_name }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'name')}}..'">
        @error('east_border_name')
        <small class="text-danger"> {{$errors->first('east_border_name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="east_border_length">{{__( 'length')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="east_border_length"
            class="form-control @error ('east_border_length') is-invalid @enderror"
            value="{{old('east_border_length') ?? $plot->east_border_length }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'length')}}..'">
        @error('east_border_length')
        <small class="text-danger"> {{$errors->first('east_border_length')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="east_border_setback">{{__( 'setback')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="east_border_setback"
            class="form-control @error ('east_border_setback') is-invalid @enderror"
            value="{{old('east_border_setback') ?? $plot->east_border_setback }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'setback')}}..'">
        @error('east_border_setback')
        <small class="text-danger"> {{$errors->first('east_border_setback')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="east_border_cantilever">{{__( 'cantilever')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="east_border_cantilever"
            class="form-control @error ('east_border_cantilever') is-invalid @enderror"
            value="{{old('east_border_cantilever') ?? $plot->east_border_cantilever }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'cantilever')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'cantilever')}}..'">
        @error('east_border_cantilever')
        <small class="text-danger"> {{$errors->first('east_border_cantilever')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="east_border_chamfer">{{__( 'chamfer')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="east_border_chamfer"
            class="form-control @error ('east_border_chamfer') is-invalid @enderror"
            value="{{old('east_border_chamfer') ?? $plot->east_border_chamfer }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'chamfer')}}..'">
        @error('east_border_chamfer')
        <small class="text-danger"> {{$errors->first('east_border_chamfer')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="east_border_note">{{__( 'note')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="east_border_note" class="form-control @error ('east_border_note') is-invalid @enderror"
            value="{{old('east_border_note') ?? $plot->east_border_note }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'note')}}..'">
        @error('east_border_note')
        <small class="text-danger"> {{$errors->first('east_border_note')}} </small>
        @enderror
    </div>
</div>
{{-- ============================================================================================= --}}
<div class="card-header text-center my-2">
    {{__('west')}}
</div>
<div class="row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="west_border_name">{{__( 'name')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="west_border_name" class="form-control @error ('west_border_name') is-invalid @enderror"
            value="{{old('west_border_name') ?? $plot->west_border_name }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'name')}}..'">
        @error('west_border_name')
        <small class="text-danger"> {{$errors->first('west_border_name')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="west_border_length">{{__( 'length')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="west_border_length"
            class="form-control @error ('west_border_length') is-invalid @enderror"
            value="{{old('west_border_length') ?? $plot->west_border_length }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'length')}}..'">
        @error('west_border_length')
        <small class="text-danger"> {{$errors->first('west_border_length')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="west_border_setback">{{__( 'setback')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="west_border_setback"
            class="form-control @error ('west_border_setback') is-invalid @enderror"
            value="{{old('west_border_setback') ?? $plot->west_border_setback }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'setback')}}..'">
        @error('west_border_setback')
        <small class="text-danger"> {{$errors->first('west_border_setback')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="west_border_cantilever">{{__( 'cantilever')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="west_border_cantilever"
            class="form-control @error ('west_border_cantilever') is-invalid @enderror"
            value="{{old('west_border_cantilever') ?? $plot->west_border_cantilever }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'cantilever')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'cantilever')}}..'">
        @error('west_border_cantilever')
        <small class="text-danger"> {{$errors->first('west_border_cantilever')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="west_border_chamfer">{{__( 'chamfer')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="west_border_chamfer"
            class="form-control @error ('west_border_chamfer') is-invalid @enderror"
            value="{{old('west_border_chamfer') ?? $plot->west_border_chamfer }}" onkeypress="onlyNumber(event)"
            placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'chamfer')}}..'">
        @error('west_border_chamfer')
        <small class="text-danger"> {{$errors->first('west_border_chamfer')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="west_border_note">{{__( 'note')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="west_border_note" class="form-control @error ('west_border_note') is-invalid @enderror"
            value="{{old('west_border_note') ?? $plot->west_border_note }}" onkeypress="onlyArabicString(event)"
            placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'note')}}..'">
        @error('west_border_note')
        <small class="text-danger"> {{$errors->first('west_border_note')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>
{{-- ============================================================================================= --}}