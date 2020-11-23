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
        @foreach ($project_serveices as $project_serveice)
        <tr>
            <td>{{$project_serveice->name_ar}}</td>
            <th>{{$project_serveice->price}}</th>
            <th>{{$project_serveice->vat_value}}</th>
            <th>{{$project_serveice->price_withe_vat}}</th>
            <th>
                {{-- .....................................................................  --}}
                <form action="{{route('projectService.update',[$project_serveice->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="add_or_remove_form_quotation" value="1">
                    <button type="submit" class="btn btn-link">
                        @if ($project_serveice->is_in_quotation)
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
                @if ($project_serveice->invoice_id)
                <small>رقم الفاتورة</small>
                <div>{{$project_serveice->invoice->invoice_no_prefix}} / {{$project_serveice->invoice->invoice_no}}
                </div>
                @else
                <form action="{{route('projectService.update',[$project_serveice->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="add_or_remove_form_invoice" value="1">
                    <button type="submit" class="btn btn-link">
                        @if ($project_serveice->is_in_invoice)
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
            <th>إجراءات</th>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- ---------------------------------------------------------------------------------------------------- --}}