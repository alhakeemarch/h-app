@php
if (isset ($is_read_only)) {
$is_read_only = ($is_read_only== true) ? true : false ;
}else {
$is_read_only = false;
}
@endphp
<h5 class="card-header text-white bg-dark my-2">{{ __('deed information') }} </h5>
<div class="form-group row ">
    @if ($project->id)
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="project_no">{{__( 'Project No')}}
            <span class="small text-danger">({{__('required')}})</span>:</label>
        <input type="text" name="project_no" class="form-control @error ('project_no') is-invalid @enderror"
            @if($is_read_only)readonly @endif value="{{$project->project_no}}" placeholder="{{__( 'Project Number')}}.."
            readonly required>
        @error('project_no')
        <small class="text-danger"> {{$errors->first('project_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    @endif
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="deed_no">{{__( 'deed')}} {{ __('number') }}
            <span class="small text-danger">({{__('required')}})</span>:</label>
        <input type="text" name="deed_no" class="form-control @error ('deed_no') is-invalid @enderror"
            value="{{$plot->deed_no ?? $new_deed_no}}" placeholder="{{__( 'Deed Number')}}.." @if($is_read_only)readonly
            @endif required>
        @error('deed_no')
        <small class="text-danger"> {{$errors->first('deed_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="deed_date">{{__( 'deed')}} {{__('date')}}
            <span class="small text-danger">({{__('required')}})</span> :</label>
        <input type="text" name="deed_date" class="form-control @error ('deed_date') is-invalid @enderror "
            value="{{old('deed_date') ?? $plot->deed_date }}" placeholder="dd-mm-yyy" onfocus="this.placeholder=''"
            onblur="this.placeholder='dd-mm-yyy'" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}"
            title="DD-MM-YYYY" required @if($is_read_only)readonly @endif>
        @error('deed_date')
        <small class=" text-danger"> {{$errors->first('deed_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='deed_issue_place' title="">
        <x-slot name='title'>deed issue place</x-slot>
        <x-slot name='placeholder'>كتابة عدل</x-slot>
        {{-- ------------------------------------------------------- --}}
        <x-slot name='input_value'>{{$plot->deed_issue_place}}</x-slot>
        {{-- ------------------------------------------------------- --}}
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="plot_no">{{__( 'Plot Number')}}
            <span class="small text-danger">({{__('required')}})</span> :</label>
        <input type="text" name="plot_no" class="form-control @error ('plot_no') is-invalid @enderror"
            value="{{old('plot_no') ?? $plot->plot_no }}" required placeholder="{{__( 'Plot Number')}}.."
            @if($is_read_only)readonly @endif onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'Plot Number')}}..'">
        @error('plot_no')
        <small class="text-danger"> {{$errors->first('plot_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="area">{{__( 'area')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <input type="text" name="area" class="form-control @error ('area') is-invalid @enderror"
            value="{{old('area') ?? $plot->area }}" onkeypress="onlyNumber(event)" @if($is_read_only)readonly @endif
            placeholder="{{__( 'Area')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'Area')}}..'">
        @error('area')
        <small class="text-danger"> {{$errors->first('area')}} </small>
        @enderror
    </div>
</div>