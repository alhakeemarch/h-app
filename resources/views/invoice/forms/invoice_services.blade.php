{{-- ---------------------------------------------------------------------------------------------------- --}}
<table class="table table-bordered table-hover text-center">
    <thead class="bg-thead">
        <tr>
            <th>الخدمة</th>
            <th>القيمة</th>
            <th>الضريبة</th>
            <th>الإجمالي</th>
            <th>رقم الفاتورة</th>
            <th>إجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($project_services as $project_service)
        <tr>
            <td>{{$project_service->name_ar}}</td>
            <th>{{$project_service->price}}</th>
            <th>{{$project_service->vat_value}}</th>
            <th>{{$project_service->price_withe_vat}}</th>
            {{-- .....................................................................  --}}
            <th>
                {{$project_service->invoice->invoice_no_prefix}} / {{$project_service->invoice->invoice_no}}
            </th>
            {{-- .....................................................................  --}}
            <th>
                {{-- .....................................................................  --}}
                <div class="d-flex justify-content-lg-around">
                    <form action="{{route('projectService.edit',[$project_service->id])}}" method="get">
                        <input type="hidden" name="edit_needed" value="edit_price">
                        <input type="hidden" name="coming_from" value="invoice_edit_form">
                        <input type="hidden" name="form_action" value="edit_invoice_service">
                        <x-btn btnText='edit' class="p-0 m-0">
                            <x-slot name='is_btn_link'>true</x-slot>
                        </x-btn>
                    </form>
                    <form action="{{route('projectService.update',$project_service)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="coming_from" value="invoice_edit_form">
                        <input type="hidden" name="form_action" value="remove_item_form_invoice">
                        <button type="submit" class="btn btn-link align-self-center text-danger p-0 m-0"
                            onclick="return confirm('Are you sure?')">ازالة من الفاتورة |
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>
                {{-- .....................................................................  --}}
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- ---------------------------------------------------------------------------------------------------- --}}