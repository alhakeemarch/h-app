<h5 class="card-header text-white bg-dark my-2">{{ __('building regulations') }} </h5>
<div class="form-group row ">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group">
        <label for="allowed_building_ratio">{{__('building ratio')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select class="form-control" name="allowed_building_ratio">
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
        <label for="allowed_building_height">{{__('building height')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select class="form-control" name="allowed_building_height">
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
        <label for="allowed_usage">{{__('usage')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select class="form-control" name="allowed_usage">
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