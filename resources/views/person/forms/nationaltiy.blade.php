<div class="card-subtitle d-flex justify-content-between">
    <span>nationality information:</span>
    <span>بيانات الهوية</span>
</div>

@php $national_id = $national_id ?? $person->national_id; @endphp

<div class="row form-group">
    @if (substr($national_id,0,1)=='1')
    {{-- START: of Sudi ID info --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="national_id">{{__( 'nId')}} <span class="small text-danger">({{__('required')}})</span>
            :</label>
        <input type="text" name="national_id" class="form-control mb-3 @error ('nId') is-invalid @enderror"
            value="{{ $national_id ?? $person->national_id }}" readonly required>
        @error('nId')
        <small class="text-danger"> {{$errors->first('nId')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="nationality_code">{{__( 'nationality')}} <span class="small text-danger">({{__('required')}})</span>
            :</label>
        <input type="hidden" name="nationality_code" value="SA">
        <input type="text" class="form-control mb-3 @error ('nationality_code') is-invalid @enderror"
            {{-- ..................................................................................... --}}
            @if(App::isLocale('ar')) value="{{ $person->nationality_ar ?? 'Saudi Arabia'}}"
            {{-- ..................................................................................... --}} @else
            value="{{ $person->nationality_en ?? 'Saudi Arabia'}}"
            {{-- ..................................................................................... --}} @endif
            readonly required>
        @error('nationality_code')
        <small class="text-danger"> {{$errors->first('nationality_code')}} </small>
        @enderror
    </div>
    {{-- END: of Sudi ID info --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    @else
    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- START: of Non Sudi ID info --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="national_id">{{__( 'Muqeem ID')}}
            <span class="small text-danger">({{__('required')}})</span> :</label>
        <input type="text" name="national_id" class="form-control mb-3 @error ('national_id') is-invalid @enderror"
            value="{{$national_id}}" required readonly>
        @error('national_id')
        <small class=" text-danger"> {{$errors->first('national_id')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <x-select_searchable name='nationality_code' title="" :resource=$person :list=$countries>
            <x-slot name='db_data_field'>code_2chracters</x-slot>
            @if (App::isLocale('ar'))
            <x-slot name='show_field'>ar_name</x-slot>
            @else
            <x-slot name='show_field'>en_name</x-slot>
            @endif
            <x-slot name='resource_field'>nationality_code</x-slot>
            <x-slot name='title'>nationality</x-slot>
            <x-slot name='is_required'>true</x-slot>
        </x-select_searchable>
    </div>{{-- END: of Non Sudi ID info --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
    @endif
</div>