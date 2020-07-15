<div class="card-header text-white bg-dark mb-3">
    {{__('project notes')}}:
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class="form-group row">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='notes' title="notes">
        <x-slot name='type'>textarea</x-slot>
        <x-slot name='placeholder'>notes</x-slot>
        <x-slot name='input_value'>{{$project->notes}}</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
    @if(auth()->user()->user_level > 19)
    <x-input name='private_notes' title="private notes">
        <x-slot name='type'>textarea</x-slot>
        <x-slot name='placeholder'>private notes</x-slot>
        <x-slot name='input_value'>{{$project->private_notes}}</x-slot>
    </x-input>
    @endif
    {{-- --------------------------------------------------------------------------------------------- --}}
    <x-input name='created_at_note' title="created at notes">
        <x-slot name='type'>textarea</x-slot>
        <x-slot name='placeholder'>created at notes</x-slot>
        <x-slot name='input_value'>{{$project->created_at_note}}</x-slot>
    </x-input>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>