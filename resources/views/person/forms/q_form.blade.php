<div class="form-group row mb-3">
    <div class="col-8">
        @include('person.forms.ar_name')
    </div>
    <div class="col-4">
        @include('person.forms.nationality')
    </div>
</div>
{{-- ============================================================================================== --}}
@if (auth()->user()->is_admin)
@include('person.forms.contact')
@endif
{{-- ============================================================================================== --}}