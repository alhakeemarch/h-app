<form action="{{route('contract.update',$contract)}}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="coming_from" value="contract_edit">
    <input type="hidden" name="form_action" value="edit_contract_values">
    <input type="hidden" name="contract_id" value="{{$contract->id}}">
    <div class="row">
        {{-- -------------------------------------------------------------------------------- --}}
        <x-input name='' title="contract name">
            <x-slot name='input_value'>{{$contract->contract_type()->first()->name_ar}}</x-slot>
            <x-slot name='is_disabled'>true</x-slot>
        </x-input>
        {{-- -------------------------------------------------------------------------------- --}}
        <x-input name='cost' title="قيمة العقد">
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='tooltip'>only numbers</x-slot>
            <x-slot name='input_pattern'>([0-9.]*)</x-slot>
            <x-slot name='input_value'>{{$contract->cost}}</x-slot>
        </x-input>

        @if ($contract->contract_type()->first()->has_visit_fee)
        <x-input name='visit_fee' title="قيمة الزيارة">
            <x-slot name='tooltip'>only numbers</x-slot>
            <x-slot name='input_pattern'>([0-9.]*)</x-slot>
            <x-slot name='input_value'>{{$contract->visit_fee}}</x-slot>
        </x-input>
        @endif
        @if ($contract->contract_type()->first()->has_monthly_fee)
        <x-input name='monthly_fee' title="الدفعة الشهرية">
            <x-slot name='tooltip'>only numbers</x-slot>
            <x-slot name='input_pattern'>([0-9.]*)</x-slot>
            <x-slot name='input_value'>{{$contract->monthly_fee}}</x-slot>
        </x-input>
        @endif
        {{-- -------------------------------------------------------------------------------- --}}
    </div>
    <hr>
    <div class="row">

    </div>
    <div class="row">
        <x-btn btnText='ok' class="mx-2"></x-btn>
        <div class="col-md mx-2">
            <x-form-cancel />
        </div>
    </div>
</form>