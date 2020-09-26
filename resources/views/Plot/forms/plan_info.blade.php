@php
if (isset ($is_read_only)) {
$is_read_only = ($is_read_only== true) ? true : false ;
}else {
$is_read_only = false;
}
@endphp
<h5 class="card-header text-white bg-dark my-2">{{ __('plan information') }} </h5>
<div class="form-group row ">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group">
        <label for="municipality_branch_id">{{__('municipality branch')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <select class="form-control" name="municipality_branch_id" @if($is_read_only)readonly @endif>
            <option selected disabled>choose..</option>
            @foreach ($municipality_branchs as $municipality_branch)
            <option value="{{$municipality_branch->id}}" @if($plot->municipality_branch_id == $municipality_branch->id)
                selected
                @elseif(old('municipality_branch_id') == $municipality_branch->id) selected
                @endif>
                {{$municipality_branch->ar_name}}</option>
            @endforeach
        </select>
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group">
        <label for="district_id">{{__('district')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <select class="form-control" name="district_id" @if($is_read_only)readonly @endif>
            <option selected disabled>choose..</option>
            @foreach ($districts as $district)
            <option value="{{$district->id}}" @if($plot->district_id == $district->id)
                selected
                @elseif(old('district_id') == $district->id) selected
                @endif>
                {{$district->ar_name}}</option>
            @endforeach
        </select>
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}

    <x-select name='neighbor_id' :resource=$project :list=$neighbors>
        <x-slot name='option_name'>ar_name</x-slot>
        <x-slot name='title'>{{__('neighbor')}}</x-slot>
    </x-select>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group">
        <label for="plan_id">{{__('plan')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <select class="form-control" name="plan_id" @if($is_read_only)readonly @endif>
            <option selected disabled>choose..</option>
            @foreach ($plans as $plan)
            <option value="{{$plan->id}}" @if($plot->plan_id == $plan->id)
                selected
                @elseif(old('plan_id') == $plan->id) selected
                @endif>
                {{$plan->plan_no}}</option>
            @endforeach
        </select>
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    @if (auth()->user()->is_admin)
    <div class="col-md form-group">
        <label for="street_id">{{__('street')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <select class="form-control" name="street_id" @if($is_read_only)readonly @endif>
            <option selected disabled>choose..</option>
            @foreach ($streets as $street)
            <option value="{{$street->id}}" @if($plot->street_id == $street->id)
                selected
                @elseif(old('street_id') == $street->id) selected
                @endif>
                {{$street->ar_name}}</option>
            @endforeach
        </select>
    </div>
    @endif
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>