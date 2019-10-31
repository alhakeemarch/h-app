@csrf
<div class="form-group">

    <h5 class="card-header text-light bg-secondary  rounded my-2">{{ __('Deed Information') }} </h5>
    <div class="form-row ">
        <div class="col-md">
            <label for="fname">{{__( 'Deed Number')}}
                <span class="small text-danger">({{__('required')}})</span>:</label>
            <input type="text" name="deed_no" class="form-control @error ('deed_no') is-invalid @enderror"
                value="{{$new_deed_no ?? $plot->deed_no}}" placeholder="{{__( 'Deed Number')}}.." readonly required>
            @error('deed_no')
            <small class="text-danger"> {{$errors->first('deed_no')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Deed Date')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="deed_date" class="form-control @error ('deed_date') is-invalid @enderror "
                value="{{old('deed_date') ?? $plot->deed_date }}" placeholder="{{__( 'Deed Date')}}.." required>
            @error('deed_date')
            <small class="text-danger"> {{$errors->first('deed_date')}} </small>
            @enderror
        </div>
    </div>
    <hr class="">
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('Plot Information') }} </h5>
    <div class="form-row ">
        <div class="col-md">
            <label for="fname">{{__( 'Plot Number')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="plot_no" class="form-control @error ('plot_no') is-invalid @enderror"
                value="{{old('plot_no') ?? $plot->plot_no }}" placeholder="{{__( 'Plot Number')}}.." required>
            @error('plot_no')
            <small class="text-danger"> {{$errors->first('plot_no')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Area')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="area" class="form-control @error ('area') is-invalid @enderror"
                placeholder="{{__( 'Area')}}.." value="{{old('area') ?? $plot->area }}" onkeypress="onlyNumber(event)"
                required>
            @error('area')
            <small class="text-danger"> {{$errors->first('area')}} </small>
            @enderror
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Road Code')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="road_code" class="form-control @error ('road_code') is-invalid @enderror"
                placeholder="{{__( 'Road Code')}}.." onkeypress="onlyNumber(event)"
                value="{{old('road_code') ?? $plot->road_code }}" required>
            @error('road_code')
            <small class="text-danger"> {{$errors->first('road_code')}} </small>
            @enderror
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Road Name')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="road_name" class="form-control @error ('road_name') is-invalid @enderror"
                placeholder="{{__( 'Road Name')}}.." onkeypress="onlyArabicString(event)"
                value="{{old('road_name') ?? $plot->road_name }}" required>
            @error('road_name')
            <small class="text-danger"> {{$errors->first('road_name')}} </small>
            @enderror

        </div>
    </div>
    <hr class="">
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('Plan Information') }} </h5>
    <div class="form-row ">
        <div class="col-md">
            <label for="fname">{{__( 'Plan Number')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="plan_no" class="form-control @error ('plan_no') is-invalid @enderror"
                placeholder="{{__( 'Plan Number')}}.." value="{{old('plan_no') ?? $plot->plan_no }}" required>
            @error('plan_no')
            <small class="text-danger"> {{$errors->first('plan_no')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Plan Name')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="plan_name" class="form-control @error ('plan_name') is-invalid @enderror"
                placeholder="{{__( 'Plan Name')}}.." onkeypress="onlyArabicString(event)"
                value="{{old('plan_name') ?? $plot->plan_name }}" required>
            @error('plan_name')
            <small class="text-danger"> {{$errors->first('plan_name')}} </small>
            @enderror
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'District')}}
                <span class="small text-danger">({{__('required')}})</span> :</label>
            <input type="text" name="district" list="district_list" value="{{old('district') ?? $plot->district }}"
                class="custom-select form-control @error ('district') is-invalid @enderror"
                placeholder="{{__('Pick a District')}}" required onkeypress="onlyArabicString(event)"
                autocomplete="off">
            @error('district')
            <small class="text-danger"> {{$errors->first('district')}} </small>
            @enderror
            <datalist id="district_list">
                @foreach ($districts as $district)
                <option value="{{$district}}">{{$district}}</option>
                @endforeach
            </datalist>

        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Municipality Branch')}} <span
                    class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="municipality_branch_name" id="mu"
                class="custom-select form-control @error ('municipality_branch_name') is-invalid @enderror"
                value="{{old('municipality_branch_name') ?? $plot->municipality_branch_name }}"
                list="municipality_branch_list" autocomplete="off" required
                placeholder="{{__( 'Municipality Branch')}}.." onfocus="this.placeholder=''"
                onblur="this.placeholder=' {{__( 'Municipality Branch')}}..'" onkeypress=" onlyArabicString(event)">

            @error('municipality_branch_name')
            <small class="text-danger"> {{$errors->first('municipality_branch_name')}} </small>
            @enderror
            <datalist id="municipality_branch_list">
                @foreach ($municipality_branchs as $municipality_branch)

                <option value="{{$municipality_branch->ar_name}}">
                    {{$municipality_branch->ar_name}} : {{$municipality_branch->en_name}}
                </option>

                @endforeach
            </datalist>
        </div>




    </div>
    <hr class="">
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('Additional Information') }} </h5>
    <div class="form-row ">

        <div class="col-md">
            <label for="fname">{{__( 'Notes')}}
                <span class="small text-muted">({{__('Optional')}})</span>
                :</label>

            <textarea name="notes" class="form-control @error ('notes') is-invalid @enderror " rows="3"
                placeholder="add your Notes.." onfocus="this.placeholder=''"
                onblur="this.placeholder='add your Notes..'">
                {{old('notes') ?? $plot->notes }}</textarea>

            @error('notes')
            <small class="text-danger"> {{$errors->first('notes')}} </small>
            @enderror


        </div>
    </div>

    <hr class="">

</div>