<div class="form-group row mb-3">
    <div class="col-8">
        @include('person.forms.ar_name')
    </div>
    <div class="col-4">
        @include('person.forms.nationaltiy')
    </div>
</div>
{{-- ============================================================================================== --}}
@if (auth()->user()->user_level > 19)
@include('person.forms.contact')
@endif
{{-- ============================================================================================== --}}