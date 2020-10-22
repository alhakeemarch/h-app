<div class="row">
    <x-input name='name_ar' title="">
        <x-slot name='title'>{{__('arabic name')}}</x-slot>
        <x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$contractType->name_ar}}</x-slot>
    </x-input>
    <x-input name='name_en' title="">
        <x-slot name='title'>{{__('english name')}}</x-slot>
        <x-slot name='onkeypress_fun'>onlyEnglishString(event)</x-slot>
        <x-slot name='input_value'>{{$contractType->name_en}}</x-slot>
    </x-input>
</div>
<div class="row">
    <x-input name='description' title="">
        <x-slot name='title'>{{__('description')}}</x-slot>
        <x-slot name='input_value'>{{$contractType->description}}</x-slot>
    </x-input>
    <x-input name='view_template' title="">
        <x-slot name='title'>{{__('view_template')}}</x-slot>
        <x-slot name='input_value'>{{$contractType->view_template}}</x-slot>
    </x-input>
</div>
<div class="row">
    <x-input name='notes' title="">
        <x-slot name='type'>textarea</x-slot>
        <x-slot name='title'>{{__('notes')}}</x-slot>
        <x-slot name='input_value'>{{$contractType->notes}}</x-slot>
    </x-input>
    <x-input name='private_notes' title="">
        <x-slot name='type'>textarea</x-slot>
        <x-slot name='title'>{{__('private_notes')}}</x-slot>
        <x-slot name='input_value'>{{$contractType->private_notes}}</x-slot>
    </x-input>
</div>