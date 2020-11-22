<ul class="list-group">
    @foreach ($project_invoices as $invoice)
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">{{$invoice->invoice_no_prefix}} / {{$invoice->invoice_no}}</span>
        <span class="d-flex">
            <form action="{{route('invoice.get_pdf')}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                <button type="submit" class="btn btn-link m-0 p-0">{{__('print')}} |
                    <i class="fa fa-print" aria-hidden="true"></i>
                </button>
            </form>
        </span>
    </li>
    @endforeach
</ul>
{{-- -------------------------------------------------------------------------------------------------------------------- --}}
@if ($can_create_invoice)
<form action="{{route('invoice.store')}}" method="POST" class="jumbotron p-3">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <div class=" d-flex justify-content-between align-content-center ml-4">
        <label class="mt-3">
            <input type="radio" name="credit_or_cash" value="cridet" checked> آجل
        </label>
        <label class="mt-3">
            <input type="radio" name="credit_or_cash" value="cash"> نقدي
        </label>
        <button class="btn btn-link" type="submit">
            {{__('create')}} |
            <i class="far fa-plus-square"></i>
        </button>
    </div>
</form>
@endif