{{-- ------------------------------------------------------------------------------------------------------------------------- --}}
<ul class="card-body list-group">
    @foreach ($project_contracts as $contract)
    <li class="list-group-item d-flex justify-content-between">
        {{$contract->contract_type()->first()->name_ar}}
        <form action="{{route('contract.contract_to_pdf')}}" method="get">
            @csrf
            <input type="hidden" name="project_id" value="{{$project->id}}">
            <input type="hidden" name="contract_id" value="{{$contract->id}}">
            <button type="submit" class="btn btn-link">print |
                <i class="fa fa-print" aria-hidden="true"></i>
            </button>
        </form>
    </li>
    @endforeach
    {{-- ------------------------------------------------------------ --}}