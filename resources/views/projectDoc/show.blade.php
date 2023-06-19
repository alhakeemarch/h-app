<ul class="list-group">
    @if (auth()->user()->is_admin)

    <form action="{{route('projectDoc.get_pdf')}}" method="get"
        class="list-group-item d-flex justify-content-between align-items-center">
        @csrf
        <input type="hidden" name="form_action" value="get_all_docs">
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <span>{{__('all documnts')}}</span>
        <x-btn btnText='download' class="m-0 p-0">
            <x-slot name='is_btn_link'>true</x-slot>
        </x-btn>
    </form>
    @endif
    @foreach ($project_docs as $project_doc)
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">{{$project_doc->name_ar}}</span>
        <span class="d-flex">
            @if ($project_doc->id == 5)
            <form action="{{route('project.edit',$project->id)}}" method="get">
                <input type="hidden" name="form_action" value="edit_azel_data">
                <x-btn btnText='edit' class="m-0 p-0">
                    <x-slot name='is_btn_link'>true</x-slot>
                </x-btn>
            </form>
            &nbsp;&nbsp;
            @endif

            <form action="{{route('projectDoc.get_pdf')}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="project_doc_type_id" value="{{$project_doc->id}}">
                <x-btn btnText='print' class="m-0 p-0">
                    <x-slot name='is_btn_link'>true</x-slot>
                </x-btn>
            </form>
        </span>
    </li>
    @endforeach
</ul>
{{--
-----------------------------------------------------------------------------------------------------------------------
--}}
<form action="{{route('projectDoc.get_pdf')}}" method="get" class=" form-group m-0 d-flex jumbotron p-3 mt-2">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <div class="col">
        <label class="my-1">{{__('document')}}</label>
        <select name="project_doc_type_id" class="form-control">
            <option disabled selected>pick a document..</option>
            @foreach ( $project_docs_list as $project_doc_type )
            <option value="{{$project_doc_type->id}}">{{$project_doc_type->name_ar}}</option>
            @endforeach
        </select>
    </div>
    <x-btn btnText='print' class="m-0 p-0 align-self-end">
        <x-slot name='is_btn_link'>true</x-slot>
    </x-btn>
</form>