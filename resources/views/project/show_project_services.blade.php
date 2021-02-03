{{-- ---------------------------------------------------------------------------------------------------- --}}
<table class="table table-bordered table-hover text-center">
    <thead class="bg-thead">
        <tr>
            <th>الخدمة</th>
            <th>القيمة</th>
            <th>الضريبة</th>
            <th>الإجمالي</th>
            <th>عرض السعر</th>
            @can('view-any', App\Invoice::class)<th>الفاتورة</th>@endcan
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
            <th>
                {{-- .....................................................................  --}}
                <form action="{{route('projectService.update',[$project_service->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="add_or_remove_form_quotation" value="1">
                    <button type="submit" class="btn btn-link  p-0 m-0">
                        @if ($project_service->is_in_quotation)
                        <span class="text-success">
                            <i class="fas fa-toggle-on" title="اخفاء"></i>
                            @else
                            <span class=" text-muted">
                                <i class="fas fa-toggle-off" title="اظهار"></i>
                            </span>
                            @endif
                    </button>
                </form>
                {{-- .....................................................................  --}}
            </th>
            @can('view-any', App\Invoice::class)
            {{-- .....................................................................  --}}
            <th class="text-nowrap">
                @if ($project_service->invoice_id)
                <small>رقم الفاتورة</small>
                <div>{{$project_service->invoice->invoice_no_prefix}} / {{$project_service->invoice->invoice_no}}
                </div>
                @else
                <form action="{{route('projectService.update',[$project_service->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="add_or_remove_form_invoice" value="1">
                    <button type="submit" class="btn btn-link  p-0 m-0">
                        @if ($project_service->is_in_invoice)
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
            </th>
            {{-- .....................................................................  --}}
            @endcan
            <th>
                {{-- .....................................................................  --}}
                <div class="d-flex justify-content-between text-nowrap">
                    @if (!($project_service->invoice_id) || auth()->user()->is_admin)
                    <form action="{{route('projectService.destroy',[$project_service->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="edit_needed" value="edit_price">
                        <x-btn btnText='delete' class="m-0 p-0 mr-2" onclick="return confirm('Are you sure?')">
                            <x-slot name='is_btn_link'>true</x-slot>
                        </x-btn>
                    </form>
                    <form action="{{route('projectService.edit',[$project_service->id])}}" method="get">
                        <input type="hidden" name="edit_needed" value="edit_price">
                        <x-btn btnText='edit' class="m-0 p-0">
                            <x-slot name='is_btn_link'>true</x-slot>
                        </x-btn>
                    </form>
                    @endif
                </div>
                {{-- .....................................................................  --}}
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- ---------------------------------------------------------------------------------------------------- --}}