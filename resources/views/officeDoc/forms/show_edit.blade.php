<form action="{{route('officeDoc.edit',$officeDoc)}}" method="GET">
    <input type="hidden" name="form_action" value="show_edit_office_doc_info">
    <x-btn btnText='edit'>
        <x-slot name='is_btn_link'>true</x-slot>
    </x-btn>
</form>