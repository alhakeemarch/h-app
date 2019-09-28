@extends('layouts.app')
@section('title', 'Plot Create Form')
@section('content')


<form action="{{ route ('plot.store') }}" method="POST" class="container-fluid">
    @csrf

    <div class="form-group">
        // بيانات الصك
        <div class="form-row mb-3">
            <div class="col-md">
                <label for="fname">{{__( 'Deed Number')}} <span
                        class="small text-danger">({{__('required')}})</span>:</label>
                <input type="text" name="deed_no" id="" class="form-control mb-3" placeholder="{{__( 'Deed Number')}}.."
                    aria-describedby="helpId" onkeypress="onlyNumber(event)" required>
            </div>

            <div class="col-md">
                <label for="fname">{{__( 'Deed Date')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="deed_date" id="" class="form-control mb-3" placeholder="{{__( 'Deed Date')}}.."
                    required>
            </div>
        </div>
        //بيانات القطعة
        <div class="form-row mb-3">
            <div class="col-md">
                <label for="fname">{{__( 'Plot Number')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="plot_no" id="" class="form-control mb-3" placeholder="{{__( 'Plot Number')}}.."
                    required>
            </div>
            //ما يدخل غير أرقام
            <div class="col-md">
                <label for="fname">{{__( 'Area')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="area" id="" class="form-control mb-3" placeholder="{{__( 'Area')}}.." required>
            </div>
            <div class="col-md">
                <label for="fname">{{__( 'Road Code')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="road_code" id="" class="form-control mb-3" placeholder="{{__( 'Road Code')}}.."
                    required>
            </div>
            <div class="col-md">
                <label for="fname">{{__( 'Road Name')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="road_name" id="" class="form-control mb-3" placeholder="{{__( 'Road Name')}}.."
                    required>
            </div>
        </div>

        // بيانات المخطط
        <div class="form-row mb-3">

            <div class="col-md">
                <label for="fname">{{__( 'Plan Number')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="plan_no" id="" class="form-control mb-3" placeholder="{{__( 'Plan Number')}}.."
                    required>
            </div>

            <div class="col-md">
                <label for="fname">{{__( 'Plan Name')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="plan_name" id="" class="form-control mb-3" placeholder="{{__( 'Plan Name')}}.."
                    required>
            </div>

            <div class="col-md">
                <label for="fname">{{__( 'District')}} <span class="small text-danger">({{__('required')}})</span>
                    :</label>
                <input type="text" name="district" list="district_list" value="" class="custom-select form-control mb-3"
                    placeholder="{{__('Pick a District')}}" required>
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
                <input type="text" name="municipality_branch" id="" class="form-control mb-3"
                    placeholder="{{__( 'Municipality Branch')}}.." required>
                حط الليست
            </div>
        </div>


    </div>




    <button type="submet" name="submet" id="submet" class="btn btn-light" btn-lg btn-block">Submet</button>

</form>

<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection