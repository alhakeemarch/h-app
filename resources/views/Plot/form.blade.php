@csrf
<div class="form-group">

    <h5 class="card-header text-light bg-secondary  rounded my-2">{{ __('Deed Information') }} </h5>
    <div class="form-row ">
        <div class="col-md">
            <label for="fname">{{__( 'Deed Number')}} <span
                    class="small text-danger">({{__('required')}})</span>:</label>
            <input type="text" name="deed_no" id="" class="form-control " value="{{$new_deed_no ?? $plot->deed_no}}"
                placeholder="{{__( 'Deed Number')}}.." readonly required>
            <small id="" class="text-danger"> {{$errors->first('deed_no')}} </small>
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Deed Date')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="deed_date" id="" class="form-control "
                value="{{old('deed_date') ?? $plot->deed_date }}" placeholder="{{__( 'Deed Date')}}.." required>
            <small id="" class="text-danger"> {{$errors->first('deed_date')}} </small>
        </div>
    </div>
    <hr class="">
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('Plot Information') }} </h5>
    <div class="form-row ">
        <div class="col-md">
            <label for="fname">{{__( 'Plot Number')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="plot_no" id="" class="form-control " value="{{old('plot_no') ?? $plot->plot_no }}"
                placeholder="{{__( 'Plot Number')}}.." required>
            <small id="" class="text-danger"> {{$errors->first('plot_no')}} </small>
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Area')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="area" id="" class="form-control " placeholder="{{__( 'Area')}}.."
                value="{{old('area') ?? $plot->area }}" onkeypress="onlyNumber(event)" required>
            <small id="" class="text-danger"> {{$errors->first('area')}} </small>
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Road Code')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="road_code" id="" class="form-control" placeholder="{{__( 'Road Code')}}.."
                onkeypress="onlyNumber(event)" value="{{old('road_code') ?? $plot->road_code }}" required>
            <small id="" class="text-danger"> {{$errors->first('road_code')}} </small>
        </div>
        <div class="col-md">
            <label for="fname">{{__( 'Road Name')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="road_name" id="" class="form-control " placeholder="{{__( 'Road Name')}}.."
                onkeypress="onlyArabicString(event)" value="{{old('road_name') ?? $plot->road_name }}" required>
            <small id="" class="text-danger"> {{$errors->first('road_name')}} </small>
        </div>
    </div>
    <hr class="">
    <h5 class="card-header text-white bg-secondary  rounded my-2">{{ __('Plan Information') }} </h5>
    <div class="form-row ">
        <div class="col-md">
            <label for="fname">{{__( 'Plan Number')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="plan_no" id="" class="form-control " placeholder="{{__( 'Plan Number')}}.."
                value="{{old('plan_no') ?? $plot->plan_no }}" required>
            <small id="" class="text-danger"> {{$errors->first('plan_no')}} </small>
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'Plan Name')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="plan_name" id="" class="form-control " placeholder="{{__( 'Plan Name')}}.."
                onkeypress="onlyArabicString(event)" value="{{old('plan_name') ?? $plot->plan_name }}" required>
            <small id="" class="text-danger"> {{$errors->first('plan_name')}} </small>
        </div>

        <div class="col-md">
            <label for="fname">{{__( 'District')}} <span class="small text-danger">({{__('required')}})</span>
                :</label>
            <input type="text" name="district" list="district_list" value="{{old('district') ?? $plot->district }}"
                class="custom-select form-control " placeholder="{{__('Pick a District')}}" required
                onkeypress="onlyArabicString(event)" autocomplete="off">
            <small id="" class="text-danger"> {{$errors->first('district')}} </small>
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
            <input type="text" name="municipality_branch" id="" class="custom-select form-control "
                value="{{old('municipality_branch') ?? $plot->municipality_branch }}" list="municipality_branch_list"
                placeholder="{{__( 'Municipality Branch')}}.." required onkeypress="onlyArabicString(event)"
                autocomplete="off">
            <small id="" class="text-danger"> {{$errors->first('municipality_branch')}} </small>
            <datalist id="municipality_branch_list">
                @foreach ($municipality_branchs as $municipality_branch)
                <option value="{{$municipality_branch}}">{{$municipality_branch}}</option>
                @endforeach
            </datalist>
        </div>

    </div>
    <hr class="">

</div>