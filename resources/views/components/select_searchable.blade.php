@php
// ------------------------------------------
if ($is_required ?? false) {
$is_required = (strtolower($is_required)=='true' ) ? true : false ;
} else {
$is_required = false;
}
// ------------------------------------------
if ($is_readonly ?? false) {
$is_readonly = (strtolower($is_readonly)=='true' &&(!auth()->user()->is_admin)) ? true : false ;
} else {
$is_readonly = false;
}
// ------------------------------------------
$value='';
foreach ($list as $item) {
if ($resource->$name == $item->$db_data_field) {
$value=$item->$show_field;
}
}
// ------------------------------------------
@endphp


<div class="col-md">
    <label for="{{$name}}">{{$title}}
        @if ($is_required)
        <span class="small text-danger">({{__('required')}})</span>
        @else
        <small class="small text-muted">({{__('optional')}})</small>
        @endif
        :</label>

    <div class="select-list">
        <input type="text" name="select_title" placeholder="select" class=" form-control select-optin-search"
            autocomplete="off"
            {{-- ................................................................................................................ --}}
            onclick="activeatList(event)" onkeyup="filterSselect(event)" onblur="checkSearchBoxValue(event)"
            {{-- ................................................................................................................ --}}
            @if ($is_required) required @endif
            {{-- ................................................................................................................ --}}
            @if ($is_readonly ) readonly='true' @endif
            {{-- ................................................................................................................ --}}
            value="{{old('select_title') ?? $value}}"
            {{-- ................................................................................................................ --}}>
        <div class="options-container">
            @foreach ( $list as $item )
            <label style="display:block;" class="select-optin
                @if ($resource->$name == $item->$db_data_field ) selected-optin @endif ">
                <input type="radio" class="select-optin-radio"
                    {{-- ................................................................................................................ --}}
                    name="{{$name}}" value="{{$item->$db_data_field}}" onclick="selectOption(event)"
                    {{-- ................................................................................................................ --}}
                    @if ($resource->$name == $item->$db_data_field ) checked class="selected-optin" @endif
                {{-- ................................................................................................................ --}}
                @if ($is_required) required @endif
                {{-- ................................................................................................................ --}}
                @if ($is_readonly) readonly @endif
                {{-- ................................................................................................................ --}}>
                {{-- ................................................................................................................ --}}
                {{$item->$show_field}}
                {{-- ................................................................................................................ --}}
            </label>
            @endforeach
        </div>
    </div>

</div>