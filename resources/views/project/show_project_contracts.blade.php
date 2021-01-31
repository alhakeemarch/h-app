{{-- ------------------------------------------------------------------------------------------------------------------------- --}}
@php
$total_price = 0;
$total_vat = 0;
$total_price_with_vat = 0;
$total_1st_payment = 0;
@endphp
<ul class="list-group mb-2">
    <li class="list-group-item">
        <table class="table table-bordered table-hover text-center">
            <thead class="bg-thead">
                <th>اسم العقد</th>
                <th>القيمة</th>
                <th>الضريبة</th>
                <th>الإجمالي</th>
                <th>عرض السعر</th>
                @can('view-any', App\Invoice::class)<th>الفاتورة</th>@endcan
                <th>إجراءات</th>
            </thead>
            @foreach ($project_contracts as $contract)
            <tr>
                <td>
                    <span class="align-self-center">
                        {{$contract->contract_type()->first()->name_ar}}
                    </span>
                </td>
                <td>
                    <span class="align-self-center">
                        {{$contract->cost}}
                    </span>
                </td>
                <td>
                    <span class="align-self-center">
                        {{$contract->vat_value}}
                    </span>
                </td>
                <td>
                    <span class="align-self-center">
                        {{$contract->price_withe_vat}}
                    </span>
                </td>
                <td>
                    <form action="{{route('contract.update',[$contract->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="add_or_remove_form_quotation" value="1">
                        <button type="submit" class="btn btn-link">
                            @if ($contract->is_in_quotation)
                            <span class="text-success">
                                <i class="fas fa-toggle-on" title="اخفاء"></i>
                                @else
                                <span class=" text-muted">
                                    <i class="fas fa-toggle-off" title="اظهار"></i>
                                </span>
                                @endif
                        </button>
                    </form>
                </td>
                @can('view-any', App\Invoice::class)
                <td>
                    @if ($contract->invoice_id)
                    <small>رقم الفاتورة</small>
                    <div>{{$contract->invoice->invoice_no_prefix}} / {{$contract->invoice->invoice_no}}</div>
                    @else
                    <form action="{{route('contract.update',[$contract->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="add_or_remove_form_invoice" value="1">
                        <button type="submit" class="btn btn-link">
                            @if ($contract->is_in_invoice)
                            <span class="text-success">
                                <i class="fas fa-toggle-on" title="اخفاء"></i>
                                @else
                                <span class=" text-muted">
                                    <i class="fas fa-toggle-off" title="اظهار"></i>
                                </span>
                                @endif
                        </button>
                    </form>
                    @endif
                </td>
                @endcan
                <td>
                    <div class="d-flex justify-content-between">
                        @if (!($contract->invoice_id) || auth()->user()->is_admin)
                        <form action="{{route('contract.destroy',[$contract->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="edit_needed" value="edit_price">
                            <button type="submit" class="btn btn-link align-self-center text-danger p-0 m-0"
                                onclick="return confirm('Are you sure?')">{{__('delet')}} |
                                <i class="far fa-edit"></i>
                            </button>
                        </form>
                        <form action="{{route('contract.edit',[$contract->id])}}" method="get">
                            <input type="hidden" name="edit_needed" value="edit_price">
                            <button type="submit" class="btn btn-link align-self-center p-0 m-0">{{__('edit')}} |
                                <i class="far fa-edit"></i>
                            </button>
                        </form>
                        @endif
                        <form action="{{route('contract.contract_to_pdf')}}" method="get" class="">
                            @csrf
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <input type="hidden" name="contract_id" value="{{$contract->id}}">
                            <button type="submit" class="btn btn-link align-self-center p-0 m-0">{{__('print')}} |
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </button>
                        </form>
                        <form action="{{route('contract.re_render')}}" method="POST" class="">
                            @csrf
                            <input type="hidden" name="contract_id" value="{{$contract->id}}">
                            <button type="submit" class="btn btn-link align-self-center p-0 m-0 text-secondary"
                                title="{{__('refresh')}}"> <i class="fas fa-sync-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @php
            $total_price = $total_price + $contract->cost;
            $total_vat = $total_vat + $contract->vat_value;
            $total_price_with_vat = $total_price_with_vat + $contract->price_withe_vat;
            if ($contract->contract_type_id == '1') {
            $total_1st_payment = $total_1st_payment + ($contract->cost*0.5) + $contract->vat_value;
            } else{
            $total_1st_payment = $total_1st_payment + $contract->price_withe_vat;
            }
            @endphp
            @endforeach
        </table>
        {{-- ---------------------------------------------------------------------------------------------------- --}}
        @include('project.show_project_services')
        {{-- ---------------------------------------------------------------------------------------------------- --}}

    </li>
    <li class="list-group-item">
        <table class="table table-bordered table-hover text-center">
            <thead class="bg-thead">
                <th colspan="2">
                    ملخص الأسعار
                </th>
            </thead>
            <tr>
                <td class="col-md w-50">اجمالي الأتعاب بدون ضريبة</td>
                <td class="col-md w-50">{{$total_price}}</td>
            </tr>
            <tr>
                <td>اجمالي الضريبة</td>
                <td>{{$total_vat}}</td>
            </tr>
            <tr>
                <td>اجمالي القيمة مع الضريبة</td>
                <td>{{$total_price_with_vat}}</td>
            </tr>
            <tr>
                <td>اجمالي الدفعة الأولى</td>
                <td>{{$total_1st_payment}}</td>
            </tr>
        </table>
    </li>
</ul>

{{-- ------------------------------------------------------------ --}}