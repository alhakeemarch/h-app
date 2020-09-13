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

    <form action="{{ route('file_folder.uploadFile') }}" method="POST" enctype="multipart/form-data" class="container">
        @csrf
        <input name="project_path" type="text" value="{{$project_path}}" hidden readonly>
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
                <label for="main_type">{{__( 'file specificity')}}
                    <span class="small text-danger">({{__('required')}})</span>:</label>
                <select name="main_type" id="main_type" class="form-control @error ('main_type') is-invalid @enderror"
                    onchange="getDetails()" required>
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
                <label for="detail">{{__( 'extra details')}}
                    <span class="small text-danger">({{__('required')}})</span>:</label>
                <select id="detail" name="detail" class="form-control @error ('detail') is-invalid @enderror"
                    onchange="ifOthSelected(event)" required>
                    <option selected value="" disabled>{{__( 'please pick')}}..</option>
                </select>
                @error('detail')
                <small class=" text-danger"> {{$errors->first('detail')}} </small>
                @enderror
            </div>
            {{-- --------------------------------------------------------------------------------------------- --}}
            <div class="col-md form-group">
                <label for="detail">{{__( 'extra details')}}
                    <span class="small text-muted">({{__('optional')}})</span> :</label>
                <input type="text" name="detail" id="detail_text_input"
                    class="form-control @error ('detail') is-invalid @enderror"
                    value="{{old('detail') ?? $detail ?? '' }}" placeholder="{{__( 'details')}}.."
                    onfocus="this.placeholder=''" onblur="this.placeholder='{{__( 'details')}}..'" maxlength="25"
                    title="Max 25 letters" disabled>
                @error('detail')
                <small class="text-danger"> {{$errors->first('detail')}} </small>
                @enderror
            </div>
        </div>
        {{-- ================================================================================================================ --}}
        <div class="row">
            <div class="col-md form-group">
                <label for="fiel_input">{{__( 'Please select file')}}
                    <span class="small text-danger">({{__('required')}})</span> :</label>
                <input type="file" name="file_input[]" multiple class="form-control" id="file_input" required>
            </div>
        </div>
        {{-- ================================================================================================================ --}}
        <div class="row text-center mb-4">
            <div class="col-md">
                <button type="submet" class="btn btn-info btn-block">
                    <i class="fas fa-file-upload"></i>
                    <span class="d-none d-md-inline-block">&nbsp; upload</span>
                </button>
            </div>
            <div class="col-md">
                {{-- <a href="{{ url()->previous()  }}" class="btn btn-info btn-block"> --}}
                <a href="{{ redirect()->getUrlGenerator()->previous()  }}" class="btn btn-info btn-block">
                    <i class="fas fa-undo-alt"></i>
                    <span class="d-none d-md-inline-block">&nbsp; cancel</span>
                </a>
            </div>
        </div>
        {{-- ================================================================================================================ --}}
    </form>
</div>

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->


<div class="my-5">
    {{-- to add space only  --}}
</div>

@include('file_and_folder.folder_files')


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
        disable_detail_input();
    var detail_array;
    switch(main_type_value) {
    case "all":
    case "doc":
    case "img":
    case "row":
        disable_detail_select();
        enable_detail_input();
        break;
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
    if (selectedValue == 'other') {
        disable_detail_select();
        enable_detail_input();
    }
}

function disable_detail_select() {
    let detail_select= document.getElementById('detail');
    detail_select.disabled = true;
}
function enable_detail_input() {
    let detail_select= document.getElementById('detail_text_input');
    detail_text_input.disabled = false;
}
function disable_detail_input() {
    let detail_select= document.getElementById('detail_text_input');
    detail_text_input.disabled = true;
}

function test() {
    console.log(axios.get('/api/get_main_types'));
        // axios.get('/api/get_main_types')
        //       .then((response) => {
        //         // handle success
        //         console.log(response.data);
        //         //now this refers to your vue instance and this can access you data property
        //         this.continents = response.data;
        //       })
        //       .catch((error) => {
        //         // handle error
        //         console.log(error);
        //       })
        //       .then(() => {
        //         // always executed
        //       });
 
}



    
</script>
@endsection