<h5 class="card-header text-white bg-dark my-2">{{ __('Deed Information') }} </h5>
<div class="form-group row ">
    @if ($project->id)
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="project_no">{{__( 'Project No')}}
            <span class="small text-danger">({{__('required')}})</span>:</label>
        <input type="text" name="project_no" class="form-control @error ('project_no') is-invalid @enderror"
            value="{{$project->project_no}}" placeholder="{{__( 'Project Number')}}.." readonly required>
        @error('project_no')
        <small class="text-danger"> {{$errors->first('project_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    @endif
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="deed_no">{{__( 'deed')}} {{ __('number') }}
            <span class="small text-danger">({{__('required')}})</span>:</label>
        @if ($new_deed_no)
        <input type="text" name="deed_no" class="form-control @error ('deed_no') is-invalid @enderror"
            value="{{$new_deed_no}}" placeholder="{{__( 'Deed Number')}}.." readonly required>
        @error('deed_no')
        <small class="text-danger"> {{$errors->first('deed_no')}} </small>
        @enderror
        @else
        <input type="text" name="deed_no" class="form-control @error ('deed_no') is-invalid @enderror"
            value="{{$plot->deed_no}}" placeholder="{{__( 'Deed Number')}}.." readonly required>
        @error('deed_no')
        <small class="text-danger"> {{$errors->first('deed_no')}} </small>
        @enderror
        @endif
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="deed_date">{{__( 'deed')}} {{__('date')}}
            <span class="small text-danger">({{__('required')}})</span> :</label>
        <input type="text" name="deed_date" class="form-control @error ('deed_date') is-invalid @enderror "
            value="{{old('deed_date') ?? $plot->deed_date }}" placeholder="dd-mm-yyy" onfocus="this.placeholder=''"
            onblur="this.placeholder='dd-mm-yyy' " required>
        @error('deed_date')
        <small class=" text-danger"> {{$errors->first('deed_date')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="plot_no">{{__( 'Plot Number')}}
            <span class="small text-danger">({{__('required')}})</span> :</label>
        <input type="text" name="plot_no" class="form-control @error ('plot_no') is-invalid @enderror"
            value="{{old('plot_no') ?? $plot->plot_no }}" required placeholder="{{__( 'Plot Number')}}.."
            onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'Plot Number')}}..'">
        @error('plot_no')
        <small class="text-danger"> {{$errors->first('plot_no')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="area">{{__( 'area')}} <span class="small text-danger">({{__('required')}})</span>
            :</label>
        <input type="text" name="area" class="form-control @error ('area') is-invalid @enderror"
            value="{{old('area') ?? $plot->area }}" onkeypress="onlyNumber(event)" required
            placeholder="{{__( 'Area')}}.." onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'Area')}}..'">
        @error('area')
        <small class="text-danger"> {{$errors->first('area')}} </small>
        @enderror
    </div>
</div>