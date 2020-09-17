@php
if (isset ($is_read_only)) {
$is_read_only = ($is_read_only== true) ? true : false ;
}else {
$is_read_only = false;
}
@endphp
<h5 class="card-header text-white bg-dark my-2">{{ __('guide coordinate') }} </h5>
<div class="form-group row ">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="x_coordinate">{{__( 'x coordinate')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="x_coordinate" class="form-control @error ('x_coordinate') is-invalid @enderror"
            value="{{old('x_coordinate') ?? $plot->x_coordinate }}" onkeypress="onlyNumber(event)"
            @if($is_read_only)readonly @endif placeholder="{{__( '5xxx')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( '5xxx')}}..'">
        @error('x_coordinate')
        <small class="text-danger"> {{$errors->first('x_coordinate')}} </small>
        @enderror
    </div>
    <div class="col-md">
        <label for="y_coordinate">{{__( 'y coordinate')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="y_coordinate" class="form-control @error ('y_coordinate') is-invalid @enderror"
            value="{{old('y_coordinate') ?? $plot->y_coordinate }}" onkeypress="onlyNumber(event)"
            @if($is_read_only)readonly @endif placeholder="{{__( '2xxx')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( '2xxx')}}..'">
        @error('y_coordinate')
        <small class="text-danger"> {{$errors->first('y_coordinate')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>