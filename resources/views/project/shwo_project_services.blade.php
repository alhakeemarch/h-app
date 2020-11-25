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
                    <button type="submit" class="btn btn-link">
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
            <th>
                @if ($project_service->invoice_id)
                <small>رقم الفاتورة</small>
                <div>{{$project_service->invoice->invoice_no_prefix}} / {{$project_service->invoice->invoice_no}}
                </div>
                @else
                <form action="{{route('projectService.update',[$project_service->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="add_or_remove_form_invoice" value="1">
                    <button type="submit" class="btn btn-link">
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
                <div class="d-flex justify-content-between">
                    @if (!($project->project_no) || auth()->user()->is_admin)
                    <form action="{{route('projectService.destroy',[$project_service->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="edit_needed" value="edit_price">
                        <button type="submit" class="btn btn-link align-self-center text-danger p-0 m-0"
                            onclick="return confirm('Are you sure?')">{{__('delet')}} |
                            <i class="far fa-edit"></i>
                        </button>
                    </form>
                    <form action="{{route('projectService.edit',[$project_service->id])}}" method="get">
                        <input type="hidden" name="edit_needed" value="edit_price">
                        <button type="submit" class="btn btn-link align-self-center p-0 m-0">{{__('edit')}} |
                            <i class="far fa-edit"></i>
                        </button>
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