@php
if (isset ($is_read_only)) {
$is_read_only = ($is_read_only== true) ? true : false ;
}else {
$is_read_only = false;
}
@endphp
<h5 class="card-header text-white bg-dark my-2">{{ __('building regulations') }} </h5>
<div class="form-group row ">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group">
        <label for="allowed_building_ratio">{{__('allowed building ratio')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select class="form-control" name="allowed_building_ratio" @if($is_read_only)readonly @endif>
            <option selected disabled>choose..</option>
            @foreach ($building_ratios as $building_ratio)
            <option value="{{$building_ratio->id}}" @if($plot->allowed_building_ratio == $building_ratio->id)
                selected
                @elseif(old('allowed_building_ratio') == $building_ratio->id) selected
                @endif>
                {{$building_ratio->building_ratio}}</option>
            @endforeach
        </select>
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group">
        <label for="allowed_building_height">{{__('allowed building height')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select class="form-control" name="allowed_building_height" @if($is_read_only)readonly @endif>
            <option selected disabled>choose..</option>
            @foreach ($building_heights as $building_height)
            <option value="{{$building_height->id}}" @if($plot->allowed_building_height == $building_height->id)
                selected
                @elseif(old('allowed_building_height') == $building_height->id) selected
                @endif>
                {{$building_height->building_height}}</option>
            @endforeach
        </select>
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group">
        <label for="allowed_usage">{{__('allowed usage')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select class="form-control" name="allowed_usage" @if($is_read_only)readonly @endif>
            <option selected disabled>choose..</option>
            @foreach ($usages as $usage)
            <option value="{{$plot->allowed_usage}}" @if($plot-> allowed_usage == $usage->id) selected
                @elseif(old('allowed_usage') == $usage->id) selected
                @endif>
                {{$usage->usage}}</option>
            @endforeach
        </select>
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>