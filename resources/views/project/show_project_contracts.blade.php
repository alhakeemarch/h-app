{{-- ------------------------------------------------------------------------------------------------------------------------- --}}
<ul class="card-body list-group">
    @foreach ($project_contracts as $contract)
    <li class="list-group-item d-flex justify-content-between">
        <span class="align-self-center">
            {{$contract->contract_type()->first()->name_ar}}
        </span>
        <form action="{{route('contract.contract_to_pdf')}}" method="get" class="align-self-center">
            @csrf
            <input type="hidden" name="project_id" value="{{$project->id}}">
            <input type="hidden" name="contract_id" value="{{$contract->id}}">
            <a class="btn btn-link align-self-center">edit |
                <i class="far fa-edit"></i>
            </a>
            <button type="submit" class="btn btn-link align-self-center">print |
                <i class="fa fa-print" aria-hidden="true"></i>
            </button>
        </form>
    </li>
    @endforeach
    {{-- ------------------------------------------------------------ --}}