@extends('layouts.app')
@section('title', 'invoice index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')
<div class="card">
    <h5 class="card-header d-flex justify-content-between">
        <span>show all invoices</span>
        <span>total = {{count($invoices)}}</span>
        <span>عرض كل الفواتير</span>
    </h5>
    <div class="card-body">
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>
                    <th>
                        <p class="pb-2">التاريخ الهجري</p>
                        {{-- <x-search_input name='h_date_input' /> --}}
                    </th>
                    <th>
                        <p class="pb-2">التاريخ الميلادي</p>
                        {{-- <x-search_input name='g_date_input' /> --}}
                    </th>
                    <th scope="en_ownerType">
                        <p class="pb-2">invoice number</p>
                        {{-- <x-search_input name='invoice_no_input' /> --}}
                    </th>
                    <th scope="en_ownerType">
                        <p class="pb-2">name</p>
                        <x-search_input name='invoice_no_input' />
                    </th>
                    <th>
                        <p class="pb-2">cash/credit</p>
                        {{-- <x-search_input name='invoice_cash_credit_input' /> --}}
                    </th>
                    <th>
                        <p class="pb-2 text-nowrap">القيمة مع الضريبة</p>
                        <x-search_input name='total_price_withe_vat_input' />
                    </th>
                    <th scope="link">details</th>
                </tr>
            </thead>

            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($invoices as $invoice)
                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td class="h_date_input text-nowrap">{{$invoice->h_date}}</td>
                    <td class="g_date_input text-nowrap">{{$invoice->g_date}}</td>
                    <td scope="invoice" class="invoice_no_input">
                        {{$invoice->invoice_no}}
                    </td>
                    <td scope="invoice" class="invoice_no_input" style="width: 100%;">
                        {{$invoice->project()->first()->project_name_ar}}
                    </td>
                    <td scope="invoice" class="invoice_cash_credit_input">
                        @if ($invoice->is_cash)نقدي @elseif($invoice->is_credit)آجل @endif
                    </td>
                    <td class="total_price_withe_vat_input">{{$invoice->total_price_withe_vat}}</td>
                    <td scope="link">
                        <form action="{{route('invoice.get_pdf')}}" method="get">
                            @csrf
                            <input type="hidden" name="project_id" value="{{$invoice->project_id}}">
                            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                            <button type="submit" class="btn btn-link m-0 p-0 text-nowrap">{{__('print')}} |
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                    @php $i ++ @endphp
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
@if (auth()->user()->is_admin)
@foreach ($invoices as $invoice)
@php
$obj = json_decode($invoice, TRUE);
@endphp
<ul class="">
    @foreach ($obj as $a=>$b )
    <li>
        {{$a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/invoice/'.$invoice->id) }}">
        <i class="far fa-print"></i>
        Show
    </a>
</ul>
<hr>
@endforeach
@endif
{{-- --------------------------------------------------------------------------------------------- --}}



@endsection














@section('script')
{{-- // for javascript --}}
@endsection