<form class=" container form-group form-row" action="{{ action('StreetController@search') }}" accept-charset="UTF-8"
    method="GET">
    @csrf
    <div class="col-md-9">
        <label for="fname">{{__( 'street name in arabic')}}
            <span class="small text-danger">({{__('required')}})</span>:</label>
        <input type="text" name="street_name" class="form-control @error ('street_name') is-invalid @enderror"
            value="{{old('street_name')}}" placeholder="{{__( 'street name in arabic')}}.."
            onfocus="this.placeholder=''" onblur="this.placeholder='{{ __('street name in arabic') }}..'"
            onkeypress="onlyArabicString(event)" required>
        @error('street_name')
        <small class="text-danger"> {{$errors->first('street_name')}} </small>
        @enderror
    </div>
    <div class="col-md-3">
        <button class=" btn btn-info btn-block" type="submit">
            serch
        </button>
    </div>
</form>