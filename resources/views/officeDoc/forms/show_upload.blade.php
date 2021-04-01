<form action="{{route('officeDoc.edit',$officeDoc)}}" method="GET">
    <input type="hidden" name="form_action" value="show_uplod_form">
    <x-btn btnText='upload'>
        <x-slot name='is_btn_link'>true</x-slot>
    </x-btn>
</form>