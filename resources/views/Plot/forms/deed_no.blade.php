<x-input name='deed_no' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>{{__( 'deed number')}}</x-slot>
    <x-slot name='is_required'>true</x-slot>
    <x-slot name='input_value'>{{old('deed_no')}}</x-slot>
</x-input>