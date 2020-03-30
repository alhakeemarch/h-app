@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="card">
    <div class=" card-header mb-4">
        Upload File To Server
    </div>

    <form action="{{ route('project.uploadFile') }}" method="post" enctype="multipart/form-data" class="container">
        @csrf
        <div class="row">
            {{-- --------------------------------------------------------------------------------------------- --}}
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
            {{-- --------------------------------------------------------------------------------------------- --}}
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
            {{-- --------------------------------------------------------------------------------------------- --}}
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
            {{-- --------------------------------------------------------------------------------------------- --}}
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
            {{-- --------------------------------------------------------------------------------------------- --}}
        </div>
        {{-- ================================================================================================================ --}}
        <div class="row">
            {{-- --------------------------------------------------------------------------------------------- --}}
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
                    onchange="getDetails()">
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
                <label for="detail">{{__( 'file extra details')}}
                    <span class="small text-muted">({{__('optional')}})</span>:</label>
                <select id="detail" name="detail" class="form-control @error ('detail') is-invalid @enderror"
                    onchange="ifOthSelected(event)">
                    <option selected value="" disabled>{{__( 'please pick')}}..</option>
                </select>
                @error('detail')
                <small class=" text-danger"> {{$errors->first('detail')}} </small>
                @enderror
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="col-md form-group">
                <label for="detail">{{__( 'Or Type file extra details')}}
                    <span class="small text-danger">({{__('required')}})</span> :</label>
                <input type="text" name="detail" id="detail_text_input"
                    class="form-control @error ('detail') is-invalid @enderror"
                    value="{{old('detail') ?? $detail ?? '' }}" required placeholder="{{__( 'details')}}.."
                    onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'details')}}..'" maxlength="5"
                    title="Max 5 letters" disabled>
                @error('detail')
                <small class="text-danger"> {{$errors->first('detail')}} </small>
                @enderror
            </div>
        </div>



        <div class="d-flex">
            <div class="col-md form-group w-75 align-content-center">
                <label for="fiel">File</label>
                <input type="file" class="form-control-file" id="file">
            </div>
        </div>




        <button type="submit" class="btn btn-block btn-info">UpLoade</button>
    </form>
</div>


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->
@endsection

@section('script')
{{-- // for javascript --}}
<script type="text/javascript">
    // ===============================================
function clearSelectOptinons(select) {
    var length = select.options.length;
    for (i = length-1; i >= 0; i--) {
        select.remove(i);
}
}
// ===============================================
    function addFirstOptinoToSelect(select) {
    var opt = document.createElement('option');
        opt.innerHTML='please pick..';
        opt.selected = true;
        opt.disabled = true;
        select.appendChild(opt); 
}
// ===============================================
    function getDetails (){
    let main_type= document.getElementById('main_type');
    let detail_select= document.getElementById('detail');
    detail_select.disabled = false;
    let main_type_value = '';
        main_type_value = main_type.value;
    
    var detail_array;
    switch(main_type_value) {
    case "concept":
    case "preliminary":
    case "ARC":
    case "evacuation":
    case "tourism":
        detail_array = {!! json_encode($arc, JSON_HEX_TAG) !!};
        break;
    case "STR":
        detail_array = {!! json_encode($str, JSON_HEX_TAG) !!};
        break;
    case "Elec":
        detail_array = {!! json_encode($elec, JSON_HEX_TAG) !!};
        break;
    case "DR":
        detail_array = {!! json_encode($dr, JSON_HEX_TAG) !!};
        break;
    case "WS":
        detail_array = {!! json_encode($ws, JSON_HEX_TAG) !!};
        break;
    case "HAVAC":
    case "ff":
        detail_array = {!! json_encode($ff, JSON_HEX_TAG) !!};
        break;
    case "FA":
        detail_array = {!! json_encode($fa, JSON_HEX_TAG) !!};
        break;
    default:
            // 'Elec-Paper' => 'Elec-Paper- ورقة الكهرباء',
            // 'survey' => 'survey - مساحة'
        detail_array = ['other'];
    }
       
    clearSelectOptinons(detail_select);
    addFirstOptinoToSelect(detail_select);

    detail_array.forEach(element => {
        var opt = document.createElement('option');
        opt.innerHTML=element;
        opt.value=element;
        detail_select.appendChild(opt); 
    });
}

function ifOthSelected(event) {
    let selectedValue = event.target.value.toLowerCase();
    let detail_text_input = document.getElementById('detail_text_input');
    if (selectedValue == 'other') {
        theSelect = event.target;
        theSelect.disabled = true;
        detail_text_input.disabled = false;
    }
}

    
</script>
@endsection