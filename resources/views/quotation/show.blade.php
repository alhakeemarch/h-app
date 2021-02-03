<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">{{__('quotation')}}</span>
        <span class="d-flex">
            @php
            $quotation = App\Quotation::where('project_id', $project->id)->first();
            @endphp
            @if (($quotation))
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
            {{-- <form action="{{route($project_doc->view_template)}}" method="get"> --}}
            <form action="{{route('quotation.get_pdf')}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                {{-- <input type="hidden" name="project_doc_type_id" value="{{$project_doc->id}}"> --}}
                <x-btn btnText='print' class="m-0 p-0">
                    <x-slot name='is_btn_link'>true</x-slot>
                </x-btn>
            </form>
        </span>
    </li>
</ul>