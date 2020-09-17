<x-input name='national_id' title="">
    <x-slot name='title'>{{__('national id number')}}</x-slot>
    <x-slot name='tooltip'>Enter customer National Id Number </x-slot>
    <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
    <x-slot name='is_required'>true</x-slot>
    <x-slot name='input_pattern'>.{10,}</x-slot>
    <x-slot name='input_min'>10</x-slot>
</x-input>