<ul class="list-group">
    @foreach ($project_docs as $doc_name => $doc_route)
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">{{$doc_name}}</span>
        <span class="d-flex">
            @php
            $quotation = App\Quotation::where('project_id', $project->id)->first();
            @endphp
            @if (($doc_name == 'عرض سعر') && ($quotation))
            {{-- --------------------------------------------------------------------------------------- --}}
            <form action="{{route('quotation.update',$quotation)}}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="update_quotation_date" value='1'>
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <button type="submit" class="btn btn-link align-self-center p-0 m-0 text-secondary"
                    title="{{__('refresh')}}"><i class="fas fa-sync-alt"></i>
                </button>
            </form>
            <span>&nbsp;&nbsp;&nbsp;</span>
            {{-- --------------------------------------------------------------------------------------- --}}
            <form action="{{route('quotation.edit',$quotation)}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <button type="submit" class="btn btn-link m-0 p-0 text-success"><span>{{__('edit')}} |</span>
                    <i class="far fa-edit"></i>
                </button>
            </form>
            <span>&nbsp;&nbsp;</span>
            {{-- --------------------------------------------------------------------------------------- --}}
            @endif
            <form action="{{route($doc_route)}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <button type="submit" class="btn btn-link m-0 p-0">{{__('print')}} |
                    <i class="fa fa-print" aria-hidden="true"></i>
                </button>
            </form>
        </span>
    </li>
    @endforeach
</ul>