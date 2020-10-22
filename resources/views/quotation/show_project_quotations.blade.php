<ul class="list-group">
    {{-- @foreach ($project_docs as $doc_name => $doc_route) --}}
    <li class="list-group-item d-flex justify-content-between">
        عرض سعر رقم 1
        {{-- <span class=" align-self-center">{{$doc_name}}</span>
        <form action="{{route($doc_route)}}" method="get">
            @csrf
            <input type="hidden" name="project_id" value="{{$project->id}}">
            <button type="submit" class="btn btn-link m-0 p-0">{{__('print')}} |
                <i class="fa fa-print" aria-hidden="true"></i>
            </button>
        </form> --}}
    </li>
    {{-- @endforeach --}}
</ul>
<form action="{{route('quotation.create')}}" method="GET" class="form-group m-0 d-flex flex-column">
    @csrf
    <input type="hidden" name="project_id" value={{"$project->id"}}>
    <button type="submit" class="btn btn-link align-self-end">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>