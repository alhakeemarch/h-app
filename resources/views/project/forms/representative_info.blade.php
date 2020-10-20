<div class="card col-lg my-3">
    <h3 class="card-header">representative info</h3>
    <div class="card-body">
        <div class="row">
            <x-input name='representative_id' title="">
                <x-slot name='title'>representative_id</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                @if (!auth()->user()->is_admin)
                <x-slot name='is_hidden'>true</x-slot>
                @endif
                <x-slot name='input_value'>{{$project->representative_id}}</x-slot>
            </x-input>
            <x-input name='representative_national_id' title="">
                <x-slot name='title'>representative_national_id</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_national_id}}</x-slot>
            </x-input>
            <x-input name='representative_type' title="">
                <x-slot name='title'>representative_type</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_type}}</x-slot>
                to representative_type_id and list
            </x-input>
            <x-input name='representative_name_ar' title="">
                <x-slot name='title'>representative_name_ar</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_name_ar}}</x-slot>
            </x-input>
            <x-input name='representative_name_en' title="">
                <x-slot name='title'>representative_name_en</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_name_en}}</x-slot>
            </x-input>
            <x-input name='representative_main_mobile_no' title="">
                <x-slot name='title'>representative_main_mobile_no</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_main_mobile_no}}</x-slot>
            </x-input>
        </div>
        <div class="row">
            <x-input name='representative_authorization_type' title="">
                <x-slot name='title'>representative_authorization_type</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_type}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_no' title="">
                <x-slot name='title'>representative_authorization_no</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_no}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_issue_date' title="">
                <x-slot name='title'>representative_authorization_issue_date</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_issue_date}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_issue_place' title="">
                <x-slot name='title'>representative_authorization_issue_place</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_issue_place}}</x-slot>
            </x-input>
            <x-input name='representative_authorization_expire_date' title="">
                <x-slot name='title'>representative_authorization_expire_date</x-slot>
                <x-slot name='is_readonly'>true</x-slot>
                <x-slot name='input_value'>{{$project->representative_authorization_expire_date}}</x-slot>
            </x-input>
        </div>
        <x-input name='extra_representatives_list' title="">
            <x-slot name='title'>extra_representatives_list</x-slot>
            <x-slot name='is_readonly'>true</x-slot>
            <x-slot name='input_value'>{{$project->extra_representatives_list}}</x-slot>
            list
        </x-input>
    </div>
</div>