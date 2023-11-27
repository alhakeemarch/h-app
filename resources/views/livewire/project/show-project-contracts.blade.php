<div class="card">
    {{---------------------------------------------------------------------------------------------------}}
    <table class=" card-body table table-bordered table-hover text-center">
        <thead class="bg-thead">
            <th>اسم العقد</th>
            <th>القيمة</th>
            <th>الضريبة</th>
            <th>الإجمالي</th>
            <th>عرض السعر</th>
            <th>العقد المجمع</th>
            @can('view-any', App\Invoice::class)<th>الفاتورة</th>@endcan
            <thead>إجراءات</th>
            </thead>
            {{---------------------------------------------------------------------------------------------------}}
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
                    {{---------------------------------------------------------------------------------------------------}}
                    <form action="{{route('contract.update',[$contract->id])}}" method="post"
                        wire:submit.prevent="submit">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="add_or_remove_form_quotation" value="1">
                        <button type="submit" class="btn btn-link  p-0 m-0" wire:click="add_remove_from_qutation">
                            @if ($contract->is_in_quotation)
                            <span class="text-success">
                                <i class="fas fa-toggle-on" title="اخفاء"></i>
                                @else
                                <span class="text-muted">
                                    <i class="fas fa-toggle-off" title="اظهار"></i>
                                </span>
                                @endif
                        </button>
                    </form>
                    {{---------------------------------------------------------------------------------------------------}}
                </td>
                <td>
                    {{---------------------------------------------------------------------------------------------------}}
                    @if ($contract->contract_type->can_be_in_uni_contract)
                    <form action="{{route('contract.update',[$contract->id])}}" method="post"
                        wire:submit.prevent="submit">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="add_or_remove_form_uni_contract" value="1">
                        <button type="submit" class="btn btn-link  p-0 m-0" wire:click="add_remove_from_qutation">
                            @if ($contract->is_in_uni_contract)
                            <span class="text-success">
                                <i class="fas fa-toggle-on" title="اخفاء"></i>
                                @else
                                <span class="text-muted">
                                    <i class="fas fa-toggle-off" title="اظهار"></i>
                                </span>
                                @endif
                        </button>
                    </form>
                    @endif
                    {{---------------------------------------------------------------------------------------------------}}
                </td>
                @can('view-any', App\Invoice::class)
                <td>
                    @if ($contract->invoice_id)
                    <small>رقم الفاتورة</small>
                    <div>{{$contract->invoice->invoice_no_prefix}} / {{$contract->invoice->invoice_no}}</div>
                    @else
                    <form action="{{route('contract.update',[$contract->id])}}" method="post"
                        wire:submit.prevent="submit">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="add_or_remove_form_invoice" value="1">
                        <button type="submit" class="btn btn-link  p-0 m-0">
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
                        <form action="{{route('contract.destroy',[$contract->id])}}" method="post"
                            wire:submit.prevent="submit">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="edit_needed" value="edit_price">
                            <x-btn btnText='delete' class="m-0 p-0 mr-2" onclick="return confirm('Are you sure?')">
                                <x-slot name='is_btn_link'>true</x-slot>
                            </x-btn>
                        </form>
                        <form action="{{route('contract.edit',[$contract->id])}}" method="get">
                            <input type="hidden" name="edit_needed" value="edit_price">
                            <x-btn btnText='edit' class="m-0 p-0">
                                <x-slot name='is_btn_link'>true</x-slot>
                            </x-btn>
                        </form>
                        @endif
                        <form action="{{route('contract.contract_to_pdf')}}" method="get" class="">
                            @csrf
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <input type="hidden" name="contract_id" value="{{$contract->id}}">
                            <x-btn btnText='print' class="m-0 p-0">
                                <x-slot name='is_btn_link'>true</x-slot>
                            </x-btn>
                        </form>
                        <form action="{{route('contract.re_render')}}" method="POST" class="">
                            @csrf
                            <input type="hidden" name="contract_id" value="{{$contract->id}}">
                            <x-btn btnText='refresh' class="m-0 p-0">
                                <x-slot name='is_btn_link'>true</x-slot>
                                <x-slot name='btn_only_icon'>true</x-slot>
                            </x-btn>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            <tr class=" bg-light-blue">
                <td>الإجمالي</td>
                <td>{{$total_price}}</td>
                <td>{{$total_vat}}</td>
                <td>{{$total_price_with_vat}}</td>
                <td colspan="@if (auth()->user()->is_admin)4 @else 3 @endif">
                    <span>اجمالي الدفعة الأولى</span>
                    <span> =({{$total_1st_payment}})</span>
                </td>
            </tr>
    </table>
    {{-- ---------------------------------------------------------------------------------------------------- --}}
</div>