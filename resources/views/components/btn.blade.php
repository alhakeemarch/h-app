@php
// ------------------------------------------
if ($resource ?? false) {
$resource_name = strtolower(substr(get_class($resource), 4));
$resource_id = $resource->id;
$url= '/'.$resource_name.'/'.$resource_id.'/edit';
} else {
// $resource = false;
$url= '#';
}
// ------------------------------------------
if ($type ?? false) {
$type = (strlen($type)>0 ) ? $type : false ;
} else {
$type = '';
}
// ------------------------------------------

@endphp

@if (auth()->user()->user_level > 49)
<a href="{{ url($url) }}" class="btn btn-info btn-lg
btn-block "> <i class="fas fa-pen"></i> Edit</a>
@else
<a href="#" class="btn disabled btn-info btn-lg
    btn-block "> <i class="fas fa-pen"></i> Edit</a>
@endif