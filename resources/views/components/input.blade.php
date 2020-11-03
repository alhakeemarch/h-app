@php
// ------------------------------------------
if ($input_id ?? false) {
$input_id = (strlen($input_id)>0 ) ? $input_id : false ;
} else {
$input_id = false;
}
// ------------------------------------------
if ($is_required ?? false) {
$is_required = (strtolower($is_required)=='true' ) ? true : false ;
} else {
$is_required = false;
}
// ------------------------------------------
if ($input_pattern ?? false) {
$have_pattern = (strlen($input_pattern)>0) ? true : false ;
} else {
$have_pattern = false;
}
// ------------------------------------------
if ($input_min ?? false) {
$have_min_length = (strlen($input_min)>0) ? true : false ;
} else {
$have_min_length = false;
}
// ------------------------------------------
if ($input_max ?? false) {
$have_max_length = (strlen($input_max)>0) ? true : false ;
} else {
$have_max_length = false;
}
// ------------------------------------------
if ($tooltip ?? false) {
$have_tooltip = (strlen($tooltip)>0) ? true : false ;
} else {
$have_tooltip = false;
}

// ------------------------------------------
if ($is_hidden ?? false) {
$is_hidden = (strtolower($is_hidden)=='true' ) ? true : false ;
} else {
$is_hidden = false;
}
// ------------------------------------------
if ($is_readonly ?? false) {
$is_readonly = (strtolower($is_readonly)=='true' &&(!auth()->user()->is_admin)) ? true : false ;
} else {
$is_readonly = false;
}
// ------------------------------------------
if ($is_disabled ?? false) {
if (strtolower($is_disabled)=='true') {
$is_required = false;
$is_readonly = false;
$is_disabled = true;
}
} else {
$is_disabled = false;
}
// ------------------------------------------
if ($input_value ?? false) {
$value = (strlen($input_value)>0) ? $input_value : '' ;
} else {
$value = '';
}
// ------------------------------------------
if ($input_row ?? false) {
$rows = (strlen($input_row)>0) ? $input_row : '' ;
} else {
$rows = 3;
}
// ------------------------------------------
@endphp


<div class="col-md @if ($is_hidden) d-none @endif">
    <label for="{{$name}}" class="my-1">{{$title}}
        @if ($is_required)
        <small class="small text-danger">({{__('required')}})</small>
        @else
        <small class="small text-muted">({{__('optional')}})</small>
        @endif
        :</label>
    @if($type == 'textarea')
    <textarea
        {{-- ................................................................................................................ --}}
        name="{{$name}}"
        {{-- ................................................................................................................ --}}
        @if($input_id) id="{{ $input_id }}" @endif
        {{-- ................................................................................................................ --}}
        rows="{{ $rows }}"
        {{-- ................................................................................................................ --}}
        @if($have_tooltip) title="{{$tooltip}}" @elseif($title ?? false) title="{{$title}}" @endif
        {{-- ................................................................................................................ --}}
        @if ($is_hidden ) hidden='true' @endif
        {{-- ................................................................................................................ --}}
        @if ($is_readonly ) readonly='true' @endif
        {{-- ................................................................................................................ --}}
        @if ($is_disabled ) disabled='true' @endif
        {{-- ................................................................................................................ --}}
        @if ($is_required) required='true' @endif
        {{-- ................................................................................................................ --}}
        class="form-control @error ($name) is-invalid @enderror @if($input_class ?? false){{$input_class}} @endif"
        {{-- ................................................................................................................ --}}
        @if ($onkeypress_fun ?? false) onkeypress="{{$onkeypress_fun}}" @endif
        {{-- ................................................................................................................ --}}
        placeholder="{{$placeholder}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{$placeholder}}..'"
        {{-- ................................................................................................................ --}}
        @if ($have_pattern ) pattern="{{$input_pattern}}" @endif
        {{-- ................................................................................................................ --}}
        @if ($have_min_length ) minlength="{{$input_min}}" @endif
        {{-- ................................................................................................................ --}}
        @if ($have_max_length ) maxlength="{{$input_max}}" @endif>{{old($name) ?? $value}}</textarea>
    @else
    <input
        {{-- ................................................................................................................ --}}
        type="{{$type}}"
        {{-- ................................................................................................................ --}}
        name="{{$name}}"
        {{-- ................................................................................................................ --}}
        @if($input_id) id="{{ $input_id }}" @endif
        {{-- ................................................................................................................ --}}
        @if($have_tooltip) title="{{$tooltip}}" @elseif($title ?? false) title="{{$title}}" @endif
        {{-- ................................................................................................................ --}}
        @if ($is_hidden ) hidden='true' @endif
        {{-- ................................................................................................................ --}}
        @if ($is_readonly ) readonly='true' @endif
        {{-- ................................................................................................................ --}}
        @if ($is_disabled ) disabled='true' @endif
        {{-- ................................................................................................................ --}}
        @if ($is_required) required='true' @endif
        {{-- ................................................................................................................ --}}
        class="form-control @error ($name) is-invalid @enderror @if($input_class ?? false){{$input_class}} @endif"
        {{-- ................................................................................................................ --}}
        @if ($onkeypress_fun ?? false) onkeypress="{{$onkeypress_fun}}" @endif
        {{-- ................................................................................................................ --}}
        placeholder="{{$placeholder}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{$placeholder}}..'"
        {{-- ................................................................................................................ --}}
        @if ($have_pattern ) pattern="{{$input_pattern}}" @endif
        {{-- ................................................................................................................ --}}
        @if ($have_min_length ) minlength="{{$input_min}}" @endif
        {{-- ................................................................................................................ --}}
        @if ($have_max_length ) maxlength="{{$input_max}}" @endif
        {{-- ................................................................................................................ --}}
        value="{{old($name) ?? $value}}">
    @endif

    @error($name)
    <small class="text-danger"> {{$errors->first($name)}} </small>
    @enderror

    @if ($slot)
    @if (strlen($slot)>0)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert...!</strong> <br>
        <strong>main Slot...!</strong>
        <small> {{$slot}}</small>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @endif

</div>