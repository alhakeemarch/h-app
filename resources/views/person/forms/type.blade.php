<div class="card-header text-white bg-dark mb-3">
    {{__('person').' '.__('type')}}:
</div>
{{--START: person type --}}
@if(auth()->user()->is_admin or auth()->user()->is_manager)
<div class="form-group">
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="is_employee">{{__( 'employee')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="is_employee" class="form-control @error ('is_employee') is-invalid @enderror" required>
                <option value=0 selected> {{__('no')}}</option>
                <option value=1 @if(old('is_employee') or $person->is_employee )selected @endif
                    > {{__('yes')}}</option>
            </select>
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="is_customer">{{__( 'customer')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="is_customer" class="form-control @error ('is_customer') is-invalid @enderror" required>
                <option value=0 selected> {{__('no')}}</option>
                <option value=1 @if ( old('is_customer') or $person->is_customer ) selected @endif
                    > {{__('yes')}}</option>
            </select>
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
</div>
@else
<div class="form-group">
    <div class="form-row mb-3">
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="is_employee">{{__( 'employee')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="is_employee" class="form-control @error ('is_employee') is-invalid @enderror">
                <option value=0 selected disabled> {{__('no')}}</option>
                <option value=1 @if(old('is_employee') or $person->is_employee )selected @endif disabled>
                    {{__('yes')}} </option>
            </select>
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
        <div class="col-md">
            <label for="is_customer">{{__( 'customer')}}
                <span class="small text-muted">({{__('optional')}})</span>:</label>
            <select name="is_customer" class="form-control @error ('is_customer') is-invalid @enderror">
                <option value=0 disabled> {{__('no')}}</option>
                <option value=1 selected disabled> {{__('yes')}}</option>
            </select>
        </div>
        {{-- --------------------------------------------------------------------------------------------- --}}
    </div>
</div>
@endif