<div class="card-header text-white bg-dark mb-3">
    Contact Information:
</div>
{{-- ============================================================================================= --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='mobile' title="">
        <x-slot name='type'>tel</x-slot>
        <x-slot name='title'>{{__( 'primary mobile')}}</x-slot>
        <x-slot name='tooltip'>{{__('must be 10 digits')}}</x-slot>
        <x-slot name='placeholder'>05xxxxxxxx</x-slot>
        <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='input_pattern'>.{10,}</x-slot>
        <x-slot name='input_min'>5</x-slot>
        <x-slot name='input_max'>10</x-slot>
        <x-slot name='input_value'>{{ old('mobile') ?? $person->mobile }}</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='email' title="">
        <x-slot name='type'>email</x-slot>
        <x-slot name='title'>{{__( 'primary email')}}</x-slot>
        <x-slot name='input_value'>{{ old('email') ?? $person->email }}</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>