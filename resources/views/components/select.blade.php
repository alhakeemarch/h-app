{{-- $resource  --}}
{{-- $name --}}
{{-- $list --}}
{{-- $title --}}
{{-- $is_required --}}
{{-- $is_disabled --}}

<div class="col-md @if ($is_hidden ?? false) d-none @endif">
    <label for="{{$name}}">{{$title}}
        @if ($is_required ?? false)
        <span class="small text-danger">({{__('required')}})</span>
        @else
        <small class="small text-muted">({{__('optional')}})</small>
        @endif
        :</label>

    <select class="form-control" name="owner_type" @if ($is_disabled ?? false) disabled="disabled" @endif>
        {{-- //this is if this is edit and have value selected before --}}
        @if ($resource->$name)
        @foreach ($list as $item)
        @if ($resource->$name == $item->id)
        <option selected="true" value="{{$resource->$name}}">
            {{$item->$option_name}}
        </option>
        @endif
        @endforeach
        {{-- this is if form was not valid and returns with old value --}}
        @elseif(old('$name'))
        @foreach ($list as $item)
        @if (old('name') == $item->id)
        <option selected="true" value="{{old('$name')}}">{{$item->$option_name}}
        </option>
        @endif
        @endforeach
        {{-- this is if new form only --}}
        @else
        <option selected="true" disabled="disabled">choose..</option>
        @endif
        {{-- // this is  to get the list --}}
        @foreach ($list as $item)
        <option value="{{$item->id}}">{{$item->$option_name}}</option>
        @endforeach
    </select>
</div>