@if (isset($add_new_doc))
@php
$officeDoc=null;
@endphp
@endif
<div class="row">
    <x-input name='number' title="document number">
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$officeDoc->number ??''}}</x-slot>
        @if (!auth()->user()->is_admin)
        <x-slot name='is_readonly'>true</x-slot>
        @endif
    </x-input>
    <x-input name='name_ar' title="document arabic name">
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$officeDoc->name_ar ??''}}</x-slot>
    </x-input>
    <x-input name='name_en' title="document english name">
        <x-slot name='input_value'>{{$officeDoc->name_en ??''}}</x-slot>
    </x-input>
</div>
<div class="row">
    <x-input name='issue_date' title="document issue date">
        <x-slot name='input_value'>{{$officeDoc->issue_date ??''}}</x-slot>
    </x-input>
    <x-input name='expire_date' title="document expire date">
        <x-slot name='input_value'>{{$officeDoc->expire_date ??''}}</x-slot>
    </x-input>
    <x-input name='issue_place' title="document issue place">
        <x-slot name='input_value'>{{$officeDoc->issue_place ??''}}</x-slot>
    </x-input>
</div>
<div class="row">
    <x-input name='organization_name_ar' title="الجهة المصدرة للمستند">
        <x-slot name='input_value'>{{$officeDoc->organization_name_ar ??''}}</x-slot>
    </x-input>
    <x-input name='organization_name_en' title="issued by">
        <x-slot name='input_value'>{{$officeDoc->organization_name_en ??''}}</x-slot>
    </x-input>
</div>
<div class="row">
    <x-input name='notes' title="notes">
        <x-slot name='input_value'>{{$officeDoc->notes ??''}}</x-slot>
        <x-slot name='type'>textarea</x-slot>
    </x-input>
    @if (auth()->user()->is_admin)
    <x-input name='private_notes' title="private notes">
        <x-slot name='input_value'>{{$officeDoc->private_notes ??''}}</x-slot>
        <x-slot name='type'>textarea</x-slot>
    </x-input>
    @endif
</div>