<ul class="list-group">
    @foreach ($project_invoices as $invoice)
    <li class="list-group-item d-flex justify-content-between">
        <span class=" align-self-center">{{$invoice->invoice_no_prefix}} / {{$invoice->invoice_no}}</span>
        <span class="d-flex">
            <form action="{{route('invoice.get_pdf')}}" method="get">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                <x-btn btnText='print'>
                    <x-slot name='is_btn_link'>true</x-slot>
                </x-btn>
            </form>
            <form action="{{route('invoice.edit',$invoice)}}" method="get">
                <x-btn btnText='edit'>
                    <x-slot name='is_btn_link'>true</x-slot>
                </x-btn>
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
    <input type="hidden" name="coming_from" value="create_invoice_for_project">
    <input type="hidden" name="form_action" value="create_new_invoice">
    <div class="d-flex">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label class="my-1">نقدي / أجل
                <span class="small text-danger">({{__('required')}})</span>:</label>
            <select name="credit_or_cash" class="form-control @error ('credit_or_cash') is-invalid @enderror" required>
                <option selected disabled> {{__('pick')}}..</option>
                <option value='cridet'>آجل</option>
                <option value='cash'>نقدي</option>

            </select>
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        @if ($beneficiaries_list)
        <div class="col-md">
            <label class="my-1">{{__( 'beneficiary')}}
                <span class="small text-danger">({{__('required')}})</span>:</label>
            <select name="invoice_beneficiary" class="form-control @error ('invoice_beneficiary') is-invalid @enderror"
                required>
                <option selected disabled> {{__('pick')}}..</option>
                @foreach ($beneficiaries_list as $beneficiary)
                <option value='{{$beneficiary['value']}}'> {{$beneficiary['name']}}</option>
                @endforeach
            </select>
        </div>
        @endif
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
    <x-input name='notes' title="{{__('notes')}}" />
    <div class="mt-2">
        <x-btn btnText='create' />
    </div>
</form>
@endif