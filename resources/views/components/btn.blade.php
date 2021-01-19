@php
// ------------------------------------------

$btn_text = (isset($btn_text) && strlen(trim($btn_text))>0) ? trim($btn_text) : 'submit' ;
$btn_text = (isset($btnText) && strlen(trim($btnText))>0 ) ? trim($btnText) : 'submit' ;
// ------------------------------------------
$pipe_sign = (isset($btn_only_icon)) ? '' : ' | ' ;
// ------------------------------------------
$on_click_action ='';
// ------------------------------------------
$btnType ='button';
// ------------------------------------------
$btn_icon = '<i class="fas fa-exclamation"></i>';
$class_list = 'col btn m-0';
if (isset($is_btn_link)) {
$class_list = 'btn btn-link m-0';
}
// ------------------------------------------

// ------------------------------------------
if (in_array($btn_text, ['submit','save','ok','apply','update']) ) {
$btn_icon = '<i class="far fa-check-square"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-primary' : ' btn-primary';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['next']) ) {
$btn_icon = '<i class="fas fa-angle-right"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['add','new']) ) {
$btn_icon = '<i class="far fa-plus-square"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['search']) ) {
$btn_icon = '<i class="fas fa-search"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['view']) ) {
$btn_icon = '<i class="far fa-eye"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['show']) ) {
$btn_icon = '<i class="far fa-eye"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
$btnType = 'submit';
}
if (in_array($btn_text, ['cancel','back']) ) {
$btn_icon = '<i class="fas fa-undo"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-secondary' : ' btn-secondary';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['delete']) ) {
$btn_icon = '<i class="far fa-trash-alt"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-danger' : ' btn-danger';
$on_click_action = "return confirm('Are you sure?')";
$btnType = 'submit';
}
if (in_array($btn_text, ['edit']) ) {
$btn_icon = '<i class="far fa-edit"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-warning' : ' btn-warning';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['print']) ) {
$btn_icon = '<i class="fas fa-print"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['download']) ) { // ----------------------------------------->
$btn_icon = '<i class="fas fa-file-download"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['upload']) ) { // ----------------------------------------->
$btn_icon = '<i class="fas fa-file-upload"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-info' : ' btn-info';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['refresh','reload','re-rendr','sync']) ) {
$btn_icon = '<i class="fas fa-sync-alt"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-dark' : ' btn-dark';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['reset']) ) {
$btn_icon = '<i class="fas fa-retweet"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-danger' : ' btn-danger';
$on_click_action = "return confirm('Are you sure?')";
$btnType = 'submit';
}
if (in_array($btn_text, ['toggle-off']) ) {
$class_list .= (isset($is_btn_link)) ? ' text-success' : ' btn-success';
$btn_icon = '<i class="fas fa-toggle-off"></i>';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
if (in_array($btn_text, ['toggle-on']) ) {
$btn_icon = '<i class="fas fa-toggle-on"></i>';
$class_list .= (isset($is_btn_link)) ? ' text-muted' : ' btn-secondary';
// $on_click_action = 'show_loader()';
$btnType = 'submit';
}
// ------------------------------------------
if (isset($btn_type)) {
$btnType = $btn_type;
}
// ------------------------------------------
if (isset($btn_no_loader)) {
$on_click_action = '';
}
// ------------------------------------------



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
@if (isset($class))
@php $class_list .= ' '.$class; @endphp
@endif

{{-- --------------------------------------------------------------------------------------------------------------- --}}
<button type="{{$btnType}}" class="{{$class_list}}" title="{{$btn_text}}" onclick="{{$on_click_action}}">
    @if (!(isset($btn_only_icon)))
    {{$btn_text}}{{$pipe_sign}}
    @endif
    {!! $btn_icon !!}
</button>
{{-- --------------------------------------------------------------------------------------------------------------- --}}


@if (auth()->user()->user_level > 49 && false)
{{-- <a href="{{ url($url) }}" class="btn btn-info btn-lg
btn-block "> <i class="fas fa-pen"></i> Edit</a>
@else
<a href="#" class="btn disabled btn-info btn-lg
    btn-block "> <i class="fas fa-pen"></i> Edit</a> --}}
@endif




























{{-- ------------------------------------------ --}}
@if (false)
<br> <i class="fas fa-sign-in-alt"></i> // login
{{-- <br> <i class="fas fa-sign-out-alt"></i> // logout --}}
<br> <i class="fas fa-power-off"></i> // logout
<br>
<br> <i class="fas fa-search"></i> // search
<br> <i class="far fa-eye"></i> // view
<br>
<br> <i class="far fa-plus-square"></i> // add -- new
{{-- <br> <i class=" fas fa-plus"></i> // add - new --}}
<br>
{{-- <br> <i class="fas fa-check"></i> // save - ok -submet  --}}
<br> <i class="far fa-check-square"></i> // save - ok -submet
<br>
<br> <i class="fas fa-angle-right"></i> // next
{{-- <br> <i class="fas fa-chevron-right"></i> // next --}}
{{-- <br> <i class="far fa-caret-square-right"></i> // next --}}

<br>
{{-- <br> <i class="fas fa-undo-alt"></i> // cancel - back --}}
<br> <i class="fas fa-undo"></i> // cancel - back
{{-- <br> <i class="far fa-window-close"></i> // cancel - back --}}
{{-- <br> <i class="fas fa-window-close"></i> // cancel - back --}}
<br>
{{-- <br> <i class="fas fa-trash"></i> // delet --}}
<br> <i class="far fa-trash-alt"></i> // delet
{{-- <br> <i class="fas fa-trash-alt"></i> // delet --}}
<br>
<br> <i class="far fa-edit"></i> // edit
{{-- <br> <i class="fas fa-pen"></i> // edit --}}
<br>
<br> <i class="fas fa-print"></i> // print
<br> <i class="fas fa-sync-alt"></i> // refresh - reload - re-rendr - sync
<br> <i class="fas fa-retweet"></i> // reset
<br> <i class="fas fa-toggle-off"></i> // toggle-off
<br> <i class="fas fa-toggle-on"></i> // toggle-on
@endif
{{-- ------------------------------------------ --}}