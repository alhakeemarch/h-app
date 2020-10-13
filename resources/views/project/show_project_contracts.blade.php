{{-- ------------------------------------------------------------------------------------------------------------------------- --}}
<ul class="list-group mb-2">
    @foreach ($project_contracts as $contract)
    <li class="list-group-item d-flex justify-content-between">
        <span class="align-self-center">
            {{$contract->contract_type()->first()->name_ar}}
        </span>
        <div class="d-flex">
            @if (!($project->project_no))
            <form action="{{route('contract.edit',[$contract->id])}}" method="get">
                <input type="hidden" name="edit_needed" value="edit_price">
                <button type="submit" class="btn btn-link align-self-center">edit |
                    <i class="far fa-edit"></i>
                </button>
            </form>
            @endif
            <form action="{{route('contract.contract_to_pdf')}}" method="get" class="align-self-center">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="contract_id" value="{{$contract->id}}">
                <button type="submit" class="btn btn-link align-self-center">print |
                    <i class="fa fa-print" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </li>
    @endforeach
    {{-- ------------------------------------------------------------ --}}