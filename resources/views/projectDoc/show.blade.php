<ul class="list-group">
    @foreach ($project_docs as $project_doc)
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">{{$project_doc->name_ar}}</span>
        <span class="d-flex">
            <form action="{{route('projectDoc.get_pdf')}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="project_doc_type_id" value="{{$project_doc->id}}">
                <button type="submit" class="btn btn-link m-0 p-0">{{__('print')}} |
                    <i class="fa fa-print" aria-hidden="true"></i>
                </button>
            </form>
        </span>
    </li>
    @endforeach
</ul>
{{-- ----------------------------------------------------------------------------------------------------------------------- --}}
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
    <button type="submit" class="btn btn-link m-0 align-self-end">{{__('print')}} |
        <i class="fa fa-print" aria-hidden="true"></i>
    </button>
</form>