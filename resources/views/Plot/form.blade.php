@csrf
<div class="form-group text-capitalize">
    <!-- ============================================================================================================ -->
    <h5 class="card-header text-light bg-secondary  rounded my-2">{{ __('Deed Information') }} </h5>
    <div class="form-row ">
        @if ($project->id)
        <div class="col-md">
            <label for="project_no">{{__( 'Project No')}}
                <span class="small text-danger">({{__('required')}})</span>:</label>
            <input type="text" name="project_no" class="form-control @error ('project_no') is-invalid @enderror"
                value="{{$project->project_no}}" placeholder="{{__( 'Project Number')}}.." readonly required>
            @error('project_no')
            <small class="text-danger"> {{$errors->first('project_no')}} </small>
            @enderror
        </div>
        @endif
        <div class="col-md">
            <label for="deed_no">{{__( 'Deed Number')}}
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

        <div class="col-md">
            <label for="deed_date">{{__( 'Deed Date')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="deed_date" class="form-control @error ('deed_date') is-invalid @enderror "
                value="{{old('deed_date') ?? $plot->deed_date }}" placeholder="{{__( 'Deed Date')}}.." required>
            @error('deed_date')
            <small class="text-danger"> {{$errors->first('deed_date')}} </small>
            @enderror
        </div>
    </div>

    <hr>
    <!-- ============================================================================================================ -->
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('Plot Information') }} </h5>
    <div class="form-row ">
        {{-- ////////////////////////////////// --}}
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
        {{-- ////////////////////////////////// --}}
        <div class="col-md">
            <label for="area">{{__( 'area')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="area" class="form-control @error ('area') is-invalid @enderror"
                value="{{old('area') ?? $plot->area }}" onkeypress="onlyNumber(event)" required
                placeholder="{{__( 'Area')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'Area')}}..'">
            @error('area')
            <small class="text-danger"> {{$errors->first('area')}} </small>
            @enderror
        </div>
        {{-- ////////////////////////////////// --}}
        <div class="col-md form-group">
            <label for="allowed_building_ratio">{{__('building ratio')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <select class="form-control" name="allowed_building_ratio">
                {{-- //this is if this is edit and have value selected before --}}
                @if ($plot->allowed_building_ratio)
                @foreach ($building_ratios as $building_ratio)
                @if ($plot->allowed_building_ratio == $building_ratio->id)
                <option selected="true" value="{{$plot->allowed_building_ratio}}">{{$building_ratio->building_ratio}}
                </option>
                @endif
                @endforeach
                {{-- this is if form was not valid and returns with old value --}}
                @elseif(old('allowed_building_ratio'))
                @foreach ($building_ratios as $building_ratio)
                @if (old('allowed_building_ratio') == $building_ratio->id)
                <option selected="true" value="{{old('allowed_building_ratio')}}">{{$building_ratio->building_ratio}}
                </option>
                @endif
                @endforeach
                {{-- this is if new form only --}}
                @else
                <option selected="true" disabled="disabled">choose..</option>
                @endif

                {{-- // this is  to get the list --}}
                @foreach ($building_ratios as $building_ratio)
                <option value="{{$building_ratio->id}}">{{$building_ratio->building_ratio}}</option>
                @endforeach
            </select>
        </div>
        {{-- ////////////////////////////////// --}}
        <div class="col-md form-group">
            <label for="allowed_building_height">{{__('building height')}} <span
                    class="small text-danger">({{__('required')}})</span>
                : </label>
            <select class="form-control" name="allowed_building_height">

                @if ($plot->allowed_building_height)
                {{-- //this is if this is edit and have value selected before --}}
                @foreach ($building_heights as $building_height)
                @if ($plot->allowed_building_height == $building_height->id)
                <option selected="true" value="{{$plot->allowed_building_height}}">{{$building_height->building_height}}
                </option>
                @endif
                @endforeach

                {{-- this is if form was not valid and returns with old value --}}
                @elseif(old('allowed_building_height'))
                @foreach ($building_heights as $building_height)
                @if (old('allowed_building_height') == $building_height->id)
                <option selected="true" value="{{old('allowed_building_height')}}">{{$building_height->building_height}}
                </option>
                @endif
                @endforeach

                @else
                {{-- this is if new form only --}}
                <option selected="true" disabled="disabled">choose..</option>
                @endif

                {{-- // this is  to get the list --}}
                @foreach ($building_heights as $building_height)
                <option value="{{$building_height->id}}">{{$building_height->building_height}}</option>
                @endforeach
            </select>
        </div>
        {{-- ////////////////////////////////// --}}
        <div class="col-md form-group">
            <label for="allowed_usage">{{__('usage')}} <span class="small text-danger">({{__('required')}})</span>
                : </label>
            <select class="form-control" name="allowed_usage">
                @if ($plot->allowed_usage)
                {{-- //this is if this is edit and have value selected before --}}
                @foreach ($usages as $usage)
                @if ($plot->allowed_usage == $usage->id)
                <option selected="true" value="{{$plot->allowed_usage}}">{{$usage->usage}} </option>
                @endif
                @endforeach

                {{-- this is if form was not valid and returns with old value --}}
                @elseif(old('allowed_usage'))
                @foreach ($usages as $usage)
                @if (old('allowed_usage') == $usage->id)
                <option selected="true" value="{{old('allowed_usage')}}">{{$usage->usage}} </option>
                @endif
                @endforeach

                @else

                {{-- this is if new form only --}}
                <option selected="true" disabled="disabled">choose..</option>
                @endif

                {{-- // this is  to get the list --}}
                @foreach ($usages as $usage)
                <option value="{{$usage->id}}">{{$usage->usage}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <hr>
    <!-- ============================================================================================================ -->
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('borders information') }} </h5>
    <div class="form-row ">
        {{-- ////////////////////////////////// --}}
        <div class="col-md form-group">
            <label for="municipality_branch_id">{{__('municipality branch')}} <span
                    class="small text-danger">({{__('required')}})</span>
                : </label>
            <select class="form-control" name="municipality_branch_id">
                @if ($plot->municipality_branch_id)
                {{-- //this is if this is edit and have value selected before --}}
                @foreach ($municipality_branchs as $municipality_branch)
                @if ($plot->municipality_branch_id == $municipality_branch->id)
                <option selected="true" value="{{$plot->municipality_branch_id}}">
                    {{$municipality_branch->ar_name}} </option>
                @endif
                @endforeach

                {{-- this is if form was not valid and returns with old value --}}
                @elseif(old('municipality_branch_id'))
                @foreach ($municipality_branchs as $municipality_branch)
                @if (old('municipality_branch_id') == $municipality_branch->id)
                <option selected="true" value="{{old('municipality_branch_id')}}">
                    {{$municipality_branch->ar_name}} </option>
                @endif
                @endforeach

                @else

                {{-- this is if new form only --}}
                <option selected="true" disabled="disabled">choose..</option>
                @endif

                {{-- // this is  to get the list --}}
                @foreach ($municipality_branchs as $municipality_branch)
                <option value="{{$municipality_branch->id}}">{{$municipality_branch->ar_name}}</option>
                @endforeach
            </select>
        </div>
        {{-- ////////////////////////////////// --}}
        <div class="col-md form-group">
            <label for="district_id">{{__('district')}} <span class="small text-danger">({{__('required')}})</span>
                : </label>
            <select class="form-control" name="district_id">
                @if ($plot->district_id)
                {{-- //this is if this is edit and have value selected before --}}
                @foreach ($districts as $district)
                @if ($plot->district_id == $district->id)
                <option selected="true" value="{{$plot->district_id}}">
                    {{$district->ar_name}} </option>
                @endif
                @endforeach

                {{-- this is if form was not valid and returns with old value --}}
                @elseif(old('district_id'))
                @foreach ($districts as $district)
                @if (old('district_id') == $district->id)
                <option selected="true" value="{{old('district_id')}}">
                    {{$district->ar_name}} </option>
                @endif
                @endforeach

                @else

                {{-- this is if new form only --}}
                <option selected="true" disabled="disabled">choose..</option>
                @endif

                {{-- // this is  to get the list --}}
                @foreach ($districts as $district)
                <option value="{{$district->id}}">{{$district->ar_name}}</option>
                @endforeach
            </select>
        </div>
        {{-- ////////////////////////////////// --}}
        <div class="col-md form-group">
            <label for="plan_id">{{__('plan')}} <span class="small text-danger">({{__('required')}})</span>
                : </label>
            <select class="form-control" name="plan_id">
                @if ($plot->plan_id)
                {{-- //this is if this is edit and have value selected before --}}
                @foreach ($plans as $plan)
                @if ($plot->plan_id == $plan->id)
                <option selected="true" value="{{$plot->plan_id}}">
                    {{$plan->plan_no}} </option>
                @endif
                @endforeach

                {{-- this is if form was not valid and returns with old value --}}
                @elseif(old('plan_id'))
                @foreach ($plans as $plan)
                @if (old('plan_id') == $plan->id)
                <option selected="true" value="{{old('plan_id')}}">
                    {{$plan->plan_no}} </option>
                @endif
                @endforeach

                @else

                {{-- this is if new form only --}}
                <option selected="true" disabled="disabled">choose..</option>
                @endif

                {{-- // this is  to get the list --}}
                @foreach ($plans as $plan)
                <option value="{{$plan->id}}">{{$plan->plan_no}}</option>
                @endforeach
            </select>
        </div>
        {{-- ////////////////////////////////// --}}
        <div class="col-md form-group">
            <label for="street_id">{{__('street')}} <span class="small text-danger">({{__('required')}})</span>
                : </label>
            <select class="form-control" name="street_id">
                @if ($plot->street_id)
                {{-- //this is if this is edit and have value selected before --}}
                @foreach ($streets as $street)
                @if ($plot->street_id == $street->id)
                <option selected="true" value="{{$plot->street_id}}">
                    {{$street->ar_name}} </option>
                @endif
                @endforeach

                {{-- this is if form was not valid and returns with old value --}}
                @elseif(old('street_id'))
                @foreach ($streets as $street)
                @if (old('street_id') == $street->id)
                <option selected="true" value="{{old('street_id')}}">
                    {{$street->ar_name}} </option>
                @endif
                @endforeach

                @else

                {{-- this is if new form only --}}
                <option selected="true" disabled="disabled">choose..</option>
                @endif

                {{-- // this is  to get the list --}}
                @foreach ($streets as $street)
                <option value="{{$street->id}}">{{$street->ar_name}}</option>
                @endforeach
            </select>
        </div>
        {{-- ////////////////////////////////// --}}
    </div>

    <!-- ============================================================ -->
    <div class="row">
        <div class="col-md">
            <label for="x_coordinate">{{__( 'x coordinate')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="x_coordinate" class="form-control @error ('x_coordinate') is-invalid @enderror"
                value="{{old('x_coordinate') ?? $plot->x_coordinate }}" onkeypress="onlyNumber(event)" required
                placeholder="{{__( '5xxx')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( '5xxx')}}..'">
            @error('x_coordinate')
            <small class="text-danger"> {{$errors->first('x_coordinate')}} </small>
            @enderror
        </div>
        <div class="col-md">
            <label for="y_coordinate">{{__( 'y coordinate')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="y_coordinate" class="form-control @error ('y_coordinate') is-invalid @enderror"
                value="{{old('y_coordinate') ?? $plot->y_coordinate }}" onkeypress="onlyNumber(event)" required
                placeholder="{{__( '2xxx')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( '2xxx')}}..'">
            @error('y_coordinate')
            <small class="text-danger"> {{$errors->first('y_coordinate')}} </small>
            @enderror
        </div>
    </div>

    <hr>

    <!-- ============================================================================================================ -->
    <h5 class="card-header text-white bg-secondary  rounded my-3">{{ __('Plan Information') }} </h5>
    <div class="card-header text-center my-2">
        {{__('north')}}
    </div>
    <div class="row">
        <div class="col-md">
            <label for="north_border_name">{{__( 'name')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="north_border_name"
                class="form-control @error ('north_border_name') is-invalid @enderror"
                value="{{old('north_border_name') ?? $plot->north_border_name }}" onkeypress="onlyArabicString(event)"
                required placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'name')}}..'">
            @error('north_border_name')
            <small class="text-danger"> {{$errors->first('north_border_name')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="north_border_length">{{__( 'length')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="north_border_length"
                class="form-control @error ('north_border_length') is-invalid @enderror"
                value="{{old('north_border_length') ?? $plot->north_border_length }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'length')}}..'">
            @error('north_border_length')
            <small class="text-danger"> {{$errors->first('north_border_length')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="north_border_setback">{{__( 'setback')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="north_border_setback"
                class="form-control @error ('north_border_setback') is-invalid @enderror"
                value="{{old('north_border_setback') ?? $plot->north_border_setback }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'setback')}}..'">
            @error('north_border_setback')
            <small class="text-danger"> {{$errors->first('north_border_setback')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="north_border_cantilever">{{__( 'cantilever')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="north_border_cantilever"
                class="form-control @error ('north_border_cantilever') is-invalid @enderror"
                value="{{old('north_border_cantilever') ?? $plot->north_border_cantilever }}"
                onkeypress="onlyNumber(event)" required placeholder="{{__( 'cantilever')}}.."
                onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'cantilever')}}..'">
            @error('north_border_cantilever')
            <small class="text-danger"> {{$errors->first('north_border_cantilever')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="north_border_chamfer">{{__( 'chamfer')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="north_border_chamfer"
                class="form-control @error ('north_border_chamfer') is-invalid @enderror"
                value="{{old('north_border_chamfer') ?? $plot->north_border_chamfer }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'chamfer')}}..'">
            @error('north_border_chamfer')
            <small class="text-danger"> {{$errors->first('north_border_chamfer')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="north_border_note">{{__( 'note')}} <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="text" name="north_border_note"
                class="form-control @error ('north_border_note') is-invalid @enderror"
                value="{{old('north_border_note') ?? $plot->north_border_note }}" onkeypress="onlyArabicString(event)"
                placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'note')}}..'">
            @error('north_border_note')
            <small class="text-danger"> {{$errors->first('north_border_note')}} </small>
            @enderror
        </div>

    </div>
    <!-- ============================================================ -->
    <div class="card-header text-center my-2">
        {{__('south')}}
    </div>
    <div class="row">
        <div class="col-md">
            <label for="south_border_name">{{__( 'name')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="south_border_name"
                class="form-control @error ('south_border_name') is-invalid @enderror"
                value="{{old('south_border_name') ?? $plot->south_border_name }}" onkeypress="onlyArabicString(event)"
                required placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'name')}}..'">
            @error('south_border_name')
            <small class="text-danger"> {{$errors->first('south_border_name')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="south_border_length">{{__( 'length')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="south_border_length"
                class="form-control @error ('south_border_length') is-invalid @enderror"
                value="{{old('south_border_length') ?? $plot->south_border_length }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'length')}}..'">
            @error('south_border_length')
            <small class="text-danger"> {{$errors->first('south_border_length')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="south_border_setback">{{__( 'setback')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="south_border_setback"
                class="form-control @error ('south_border_setback') is-invalid @enderror"
                value="{{old('south_border_setback') ?? $plot->south_border_setback }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'setback')}}..'">
            @error('south_border_setback')
            <small class="text-danger"> {{$errors->first('south_border_setback')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="south_border_cantilever">{{__( 'cantilever')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="south_border_cantilever"
                class="form-control @error ('south_border_cantilever') is-invalid @enderror"
                value="{{old('south_border_cantilever') ?? $plot->south_border_cantilever }}"
                onkeypress="onlyNumber(event)" required placeholder="{{__( 'cantilever')}}.."
                onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'cantilever')}}..'">
            @error('south_border_cantilever')
            <small class="text-danger"> {{$errors->first('south_border_cantilever')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="south_border_chamfer">{{__( 'chamfer')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="south_border_chamfer"
                class="form-control @error ('south_border_chamfer') is-invalid @enderror"
                value="{{old('south_border_chamfer') ?? $plot->south_border_chamfer }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'chamfer')}}..'">
            @error('south_border_chamfer')
            <small class="text-danger"> {{$errors->first('south_border_chamfer')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="south_border_note">{{__( 'note')}} <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="text" name="south_border_note"
                class="form-control @error ('south_border_note') is-invalid @enderror"
                value="{{old('south_border_note') ?? $plot->south_border_note }}" onkeypress="onlyArabicString(event)"
                placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'note')}}..'">
            @error('south_border_note')
            <small class="text-danger"> {{$errors->first('south_border_note')}} </small>
            @enderror
        </div>
    </div>
    <!-- ============================================================ -->
    <div class="card-header text-center my-2">
        {{__('east')}}
    </div>
    <div class="row">
        <div class="col-md">
            <label for="east_border_name">{{__( 'name')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="east_border_name"
                class="form-control @error ('east_border_name') is-invalid @enderror"
                value="{{old('east_border_name') ?? $plot->east_border_name }}" onkeypress="onlyArabicString(event)"
                required placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'name')}}..'">
            @error('east_border_name')
            <small class="text-danger"> {{$errors->first('east_border_name')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="east_border_length">{{__( 'length')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="east_border_length"
                class="form-control @error ('east_border_length') is-invalid @enderror"
                value="{{old('east_border_length') ?? $plot->east_border_length }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'length')}}..'">
            @error('east_border_length')
            <small class="text-danger"> {{$errors->first('east_border_length')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="east_border_setback">{{__( 'setback')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="east_border_setback"
                class="form-control @error ('east_border_setback') is-invalid @enderror"
                value="{{old('east_border_setback') ?? $plot->east_border_setback }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'setback')}}..'">
            @error('east_border_setback')
            <small class="text-danger"> {{$errors->first('east_border_setback')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="east_border_cantilever">{{__( 'cantilever')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="east_border_cantilever"
                class="form-control @error ('east_border_cantilever') is-invalid @enderror"
                value="{{old('east_border_cantilever') ?? $plot->east_border_cantilever }}"
                onkeypress="onlyNumber(event)" required placeholder="{{__( 'cantilever')}}.."
                onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'cantilever')}}..'">
            @error('east_border_cantilever')
            <small class="text-danger"> {{$errors->first('east_border_cantilever')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="east_border_chamfer">{{__( 'chamfer')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="east_border_chamfer"
                class="form-control @error ('east_border_chamfer') is-invalid @enderror"
                value="{{old('east_border_chamfer') ?? $plot->east_border_chamfer }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'chamfer')}}..'">
            @error('east_border_chamfer')
            <small class="text-danger"> {{$errors->first('east_border_chamfer')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="east_border_note">{{__( 'note')}} <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="text" name="east_border_note"
                class="form-control @error ('east_border_note') is-invalid @enderror"
                value="{{old('east_border_note') ?? $plot->east_border_note }}" onkeypress="onlyArabicString(event)"
                placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'note')}}..'">
            @error('east_border_note')
            <small class="text-danger"> {{$errors->first('east_border_note')}} </small>
            @enderror
        </div>
    </div>
    <!-- ============================================================ -->
    <div class="card-header text-center my-2">
        {{__('west')}}
    </div>
    <div class="row">
        <div class="col-md">
            <label for="west_border_name">{{__( 'name')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="west_border_name"
                class="form-control @error ('west_border_name') is-invalid @enderror"
                value="{{old('west_border_name') ?? $plot->west_border_name }}" onkeypress="onlyArabicString(event)"
                required placeholder="{{__( 'name')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'name')}}..'">
            @error('west_border_name')
            <small class="text-danger"> {{$errors->first('west_border_name')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="west_border_length">{{__( 'length')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="west_border_length"
                class="form-control @error ('west_border_length') is-invalid @enderror"
                value="{{old('west_border_length') ?? $plot->west_border_length }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'length')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'length')}}..'">
            @error('west_border_length')
            <small class="text-danger"> {{$errors->first('west_border_length')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="west_border_setback">{{__( 'setback')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="west_border_setback"
                class="form-control @error ('west_border_setback') is-invalid @enderror"
                value="{{old('west_border_setback') ?? $plot->west_border_setback }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'setback')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'setback')}}..'">
            @error('west_border_setback')
            <small class="text-danger"> {{$errors->first('west_border_setback')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="west_border_cantilever">{{__( 'cantilever')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="west_border_cantilever"
                class="form-control @error ('west_border_cantilever') is-invalid @enderror"
                value="{{old('west_border_cantilever') ?? $plot->west_border_cantilever }}"
                onkeypress="onlyNumber(event)" required placeholder="{{__( 'cantilever')}}.."
                onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'cantilever')}}..'">
            @error('west_border_cantilever')
            <small class="text-danger"> {{$errors->first('west_border_cantilever')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="west_border_chamfer">{{__( 'chamfer')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="west_border_chamfer"
                class="form-control @error ('west_border_chamfer') is-invalid @enderror"
                value="{{old('west_border_chamfer') ?? $plot->west_border_chamfer }}" onkeypress="onlyNumber(event)"
                required placeholder="{{__( 'chamfer')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'chamfer')}}..'">
            @error('west_border_chamfer')
            <small class="text-danger"> {{$errors->first('west_border_chamfer')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="west_border_note">{{__( 'note')}} <span class="small text-muted">({{__('optional')}})</span>
                :</label>
            <input type="text" name="west_border_note"
                class="form-control @error ('west_border_note') is-invalid @enderror"
                value="{{old('west_border_note') ?? $plot->west_border_note }}" onkeypress="onlyArabicString(event)"
                placeholder="{{__( 'note')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder='{{__( 'note')}}..'">
            @error('west_border_note')
            <small class="text-danger"> {{$errors->first('west_border_note')}} </small>
            @enderror
        </div>
    </div>
    <!-- ============================================================ -->

    <!-- ============================================================================================================ -->
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('Additional Information') }} </h5>
    <div class="form-row ">

        <div class="col-md">
            <label for="fname">{{__( 'notes')}}
                <span class="small text-muted">({{__('optional')}})</span>
                :</label>

            <textarea name="notes" class="form-control @error ('notes') is-invalid @enderror " rows="3"
                placeholder="add your notes.." onfocus="this.placeholder=''"
                onblur="this.placeholder='add your notes..'">
                {{old('notes') ?? $plot->notes }}</textarea>

            @error('notes')
            <small class="text-danger"> {{$errors->first('notes')}} </small>
            @enderror


        </div>
    </div>

    <hr>
    <!-- ============================================================================================================ -->
</div>