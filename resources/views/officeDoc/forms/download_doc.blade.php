<form action="{{route('officeDoc.edit',$officeDoc)}}" method="GET">
    <input type="hidden" name="form_action" value="download_office_doc">
    <x-btn btnText='download'>
        @if (isset($is_link))
        <x-slot name='is_btn_link'>true</x-slot>
        @endif
    </x-btn>
</form>