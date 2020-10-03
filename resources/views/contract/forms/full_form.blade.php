<x-input name='' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>project name</x-slot>
    <x-slot name='is_readonly'>true</x-slot>
    <x-slot name='input_value'>{{$project->project_name_ar }}</x-slot>
</x-input>
{{-- -------------------------------------------------------------- --}}
<x-input name='contract_no' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>contract no</x-slot>
    <x-slot name='input_value'>{{$project->contract_no}}</x-slot>
</x-input>
{{-- -------------------------------------------------------------- --}}
<x-input name='contract_no_acc' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>contract no acc</x-slot>
    <x-slot name='input_value'>{{$project->contract_no_acc}}</x-slot>
</x-input>
{{-- -------------------------------------------------------------- --}}
<x-input name='period' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>period</x-slot>
    <x-slot name='input_value'>{{$project->period}}</x-slot>
</x-input>
{{-- -------------------------------------------------------------- --}}
<x-input name='period_scale' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>period scale</x-slot>
    <x-slot name='input_value'>{{$project->period_scale}}</x-slot>
</x-input>

{{-- -------------------------------------------------------------- --}}
<x-input name='vat_percentage' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>vat_percentage</x-slot>
    <x-slot name='input_value'>{{$project->vat_percentage}}</x-slot>
</x-input>
{{-- -------------------------------------------------------------- --}}
<x-input name='vat_value' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>vat_value</x-slot>
    <x-slot name='input_value'>{{$project->vat_value}}</x-slot>
</x-input>
{{-- -------------------------------------------------------------- --}}
<x-input name='price_withe_vat' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>price_withe_vat</x-slot>
    <x-slot name='input_value'>{{$project->price_withe_vat}}</x-slot>
</x-input>
{{-- -------------------------------------------------------------- --}}
<x-input name='price_withe_vat' title="">
    <x-slot name='type'>text</x-slot>
    <x-slot name='title'>price_withe_vat</x-slot>
    <x-slot name='input_value'>{{$project->price_withe_vat}}</x-slot>
</x-input>