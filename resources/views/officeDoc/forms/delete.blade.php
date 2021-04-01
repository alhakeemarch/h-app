<form action="{{route('officeDoc.destroy',$officeDoc)}}" method="post">
    @csrf
    @method('delete')
    <x-btn btnText='delete'>
        <x-slot name='is_btn_link'>true</x-slot>
    </x-btn>
</form>