<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">العقد المجمع</span>
        <span class="d-flex">
            @php
            $quotation = App\Quotation::where('project_id', $project->id)->first();
            @endphp
            @if (($quotation && false))
            {{-- --------------------------------------------------------------------------------------- --}}
            <form action="{{route('quotation.update',$quotation)}}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="update_quotation_date" value='1'>
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <x-btn btnText='refresh' class="m-0 p-0">
                    <x-slot name='is_btn_link'>true</x-slot>
                    <x-slot name='btn_only_icon'>true</x-slot>
                </x-btn>
            </form>
            <span>&nbsp;&nbsp;&nbsp;</span>
            {{-- --------------------------------------------------------------------------------------- --}}
            <form action="{{route('quotation.edit',$quotation)}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <x-btn btnText='edit' class="m-0 p-0">
                    <x-slot name='is_btn_link'>true</x-slot>
                </x-btn>
            </form>
            <span>&nbsp;&nbsp;</span>
            {{-- --------------------------------------------------------------------------------------- --}}
            @endif

            <form action="{{route('contract.get_uni_contract_pdf')}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="print_uni_contract">
                <x-btn btnText='print' class="m-0 p-0">
                    <x-slot name='is_btn_link'>true</x-slot>
                </x-btn>
            </form>
        </span>
    </li>
</ul>