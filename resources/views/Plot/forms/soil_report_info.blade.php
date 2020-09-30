@php
if (isset ($is_read_only)) {
$is_read_only = ($is_read_only== true) ? true : false ;
}else {
$is_read_only = false;
}
@endphp
<h5 class="card-header text-white bg-dark my-2">{{ __('deed information') }} </h5>
<div class="form-group row ">
    <x-select name='soil_report_laboratory_id' :resource=$plot :list=$soil_laboratories>
        <x-slot name='option_name'>name_ar</x-slot>
        <x-slot name='title'>{{__('soil laboratory')}}</x-slot>
    </x-select>
    <x-input name='soil_report_no' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('soil report no')}}</x-slot>
        <x-slot name='input_value'>{{$plot->soil_report_no}}</x-slot>
    </x-input>
    <x-input name='soil_report_date' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('soil report date')}}</x-slot>
        <x-slot name='placeholder'>DD-MM-YYYY</x-slot>
        <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
        <x-slot name='input_value'>{{$plot->soil_report_date}}</x-slot>
    </x-input>
    <x-input name='soil_report_notes' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('soil report notes')}}</x-slot>
        <x-slot name='input_value'>{{$plot->soil_report_notes}}</x-slot>
    </x-input>
</div>