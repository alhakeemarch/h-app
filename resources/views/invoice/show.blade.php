<form action="{{route('invoice.store')}}" method="POST">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <button class="btn btn-link btn-block" type="submit">
        {{__('create')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>
{{--
<ul class="list-group">
    
     @foreach ($project_invoices as $invoice)
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">{{$invoice->name_ar}}</span>
<span class="d-flex">
    <form action="{{route('projectDoc.get_pdf')}}" method="get">
        @csrf
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="invoice_type_id" value="{{$invoice->id}}">
        <button type="submit" class="btn btn-link m-0 p-0">{{__('print')}} |
            <i class="fa fa-print" aria-hidden="true"></i>
        </button>
    </form>
</span>
</li>
@endforeach
</ul>
--}}