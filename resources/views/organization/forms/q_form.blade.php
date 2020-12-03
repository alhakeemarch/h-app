<div class="row form-group">
    <x-select_searchable name='organization_typ_id' title="organization typ" :resource=$organization
        :list=$organization_typs>
        <x-slot name='db_data_field'>id</x-slot>
        <x-slot name='show_field'>name_ar</x-slot>
        <x-slot name='is_required'>true</x-slot>
    </x-select_searchable>
    <x-input name='name_ar' title="orgnization name arabic">
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_value'>{{$organization->name_ar}}</x-slot>
    </x-input>
    <x-input name='name_en' title="orgnization name english">
        <x-slot name='input_value'>{{$organization->name_en}}</x-slot>
    </x-input>
</div>

<div style="border: 1px crimson solid;" class="p-2 mb-3 text-center">
    <u class="h3 mx-auto underline">
        <span>One of these field must be filled</span> -
        <span>يجب تعبئة خانة واحدة على الأقل</span>
    </u>
    <div class="row form-group">
        <x-input name='unified_code' title="unified code">
            <x-slot name='input_value'>{{$organization->unified_code}}</x-slot>
        </x-input>
        <x-input name='license_number' title="license number">
            <x-slot name='input_value'>{{$organization->license_number}}</x-slot>
        </x-input>
        <x-input name='commercial_registration_no' title="commercial registration no">
            <x-slot name='input_value'>{{$organization->commercial_registration_no}}</x-slot>
        </x-input>
        <x-input name='special_code' title="special code">
            <x-slot name='input_value'>{{$organization->special_code}}</x-slot>
        </x-input>
    </div>
</div>