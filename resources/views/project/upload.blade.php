@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="card">

    <form action="" method="post" enctype="multipart/form-data" class="container">
        @csrf
        <div class="row">
            <div class="col-md form-group">
                <label for="project_no">{{__( 'project number')}}
                    <span class="small text-danger">({{__('required')}})</span> :</label>
                <input type="text" name="project_no" class="form-control @error ('project_no') is-invalid @enderror"
                    value="{{old('project_no') ?? $project_no }}" onkeypress="onlyNumber(event)" required
                    placeholder="{{__( 'project number')}}.." onfocus="this.placeholder=''"
                    onblur="this.placeholder='{{__( 'project number')}}..'" readonly>
                @error('project_no')
                <small class="text-danger"> {{$errors->first('project_no')}} </small>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="project_name">{{__( 'project name')}}
                    <span class="small text-danger">({{__('required')}})</span> :</label>
                <input type="text" name="project_name" class="form-control @error ('project_name') is-invalid @enderror"
                    value="{{old('project_name') ?? $project_name }}" onkeypress="onlyname(event)" required
                    placeholder="{{__( 'project name')}}.." onfocus="this.placeholder=''"
                    onblur="this.placeholder='{{__( 'project name')}}..'" readonly>
                @error('project_name')
                <small class="text-danger"> {{$errors->first('project_name')}} </small>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="project_location">{{__( 'project location')}}
                    <span class="small text-danger">({{__('required')}})</span> :</label>
                <input type="text" name="project_location"
                    class="form-control @error ('project_location') is-invalid @enderror"
                    value="{{old('project_location') ?? $project_location }}" onkeypress="onlyname(event)" required
                    placeholder="{{__( 'project location')}}.." onfocus="this.placeholder=''"
                    onblur="this.placeholder='{{__( 'project location')}}..'" readonly>
                @error('project_location')
                <small class="text-danger"> {{$errors->first('project_location')}} </small>
                @enderror
            </div>

        </div>

        <div class="row">

            <div class="col-md form-group">
                <label for="employment_no">{{__( 'employment number')}}
                    <span class="small text-danger">({{__('required')}})</span> :</label>
                <input type="text" name="employment_no"
                    class="form-control @error ('employment_no') is-invalid @enderror"
                    value="{{old('employment_no') ?? $employment_no }}" onkeypress="onlyname(event)" required
                    placeholder="{{__( 'employment number')}}.." onfocus="this.placeholder=''"
                    onblur="this.placeholder='{{__( 'employment number')}}..'" readonly>
                @error('employment_no')
                <small class="text-danger"> {{$errors->first('employment_no')}} </small>
                @enderror
            </div>
            {{-- ================================================================================================================ --}}

            {{-- // 2020-06-15_12-20_arc_1003_aaaaa.dwg --}}

            {{-- ================================================================================================================ --}}
            <div class="col-md">
                <label for="file_type">{{__( 'file type')}}
                    <span class="small text-muted">({{__('optional')}})</span>:</label>
                <select name="file_type" class="form-control @error ('file_type') is-invalid @enderror">
                    <option selected value="" disabled>{{__( 'please pick')}}..</option>
                    @foreach ($file_types as $file_type)

                    <option value="{{$file_type}}"> {{$file_type}} </option>

                    @endforeach
                </select>
                @error('file_type')
                <small class=" text-danger"> {{$errors->first('file_type')}} </small>
                @enderror
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="col-md">
                <label for="main_type">{{__( 'file specificity')}}
                    <span class="small text-muted">({{__('optional')}})</span>:</label>
                <select name="main_type" id="main_type" class="form-control @error ('main_type') is-invalid @enderror"
                    onchange="test()">
                    <option selected value="" disabled>{{__( 'please pick')}}..</option>
                    @foreach ($main_types as $main_type =>$description)
                    <option value="{{$main_type}}"> {{$description}} </option>
                    @endforeach
                </select>
                @error('main_type')
                <small class=" text-danger"> {{$errors->first('main_type')}} </small>
                @enderror
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="col-md">
                <label for="main_type">{{__( 'file extra details')}}
                    <span class="small text-muted">({{__('optional')}})</span>:</label>
                <select name="main_type" class="form-control @error ('main_type') is-invalid @enderror">
                    <option selected value="" disabled>{{__( 'please pick')}}..</option>
                    @foreach ($main_types as $main_type)
                    @if (App::isLocale('ar'))
                    <option value="{{$main_type}}"> {{$main_type}} </option>
                    @endif
                    @if (App::isLocale('en'))
                    <option value="{{$main_type}}"> {{$main_type}} </option>
                    @endif
                    @endforeach
                </select>
                @error('main_type')
                <small class=" text-danger"> {{$errors->first('main_type')}} </small>
                @enderror
            </div>
        </div>












        <div class="col-md form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>




        <button type="submit" class="btn btn-block btn-info">UpLoade</button>
    </form>
</div>
@php
// dd($sub_types);
$arc= $sub_types['ARC'];
$str= $sub_types['STR'];
$elec= $sub_types['ELEC'];
$dr= $sub_types['DR'];
$ws= $sub_types['WS'];
$ff= $sub_types['FF'];
$fa= $sub_types['FA'];
// dd($fa);
@endphp


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
<script type="text/javascript">
    function test (){
    let main_type= document.getElementById('main_type');
        main_type_value = main_type.value;
    console.log(main_type_value);
    let arc = {!! json_encode($sub_types, JSON_HEX_TAG) !!};
    for (var arr in arc){
        arr.forEach(element => {
                console.log(element);
        });
    }
}
    
</script>
@endsection