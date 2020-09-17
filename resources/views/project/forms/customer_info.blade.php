<div class="card-header text-white bg-dark mb-3">
    {{__('customer information')}}
</div>
<div class="row">
    <x-input name='owner_name_ar' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>owner name</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>
            {{$person->ar_name1.' '}}{{$person->ar_name2.' '}}{{$person->ar_name3.' '}}{{$person->ar_name4.' '}}{{$person->ar_name5.' '}}
        </x-slot>
    </x-input>
    <x-input name='project_name_ar' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>project name</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>
            {{$person->ar_name1.' '}}{{$person->ar_name2.' '}}{{$person->ar_name3.' '}}{{$person->ar_name4.' '}}{{$person->ar_name5.' '}}
        </x-slot>
    </x-input>
    <x-input name='owner_national_id' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>owner national id</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$person->national_id}}</x-slot>
    </x-input>
    <x-input name='owner_main_mobile_no' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>owner mobile</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='is_readonly'>true</x-slot>
        <x-slot name='input_value'>{{$person->mobile}}</x-slot>
    </x-input>
</div>