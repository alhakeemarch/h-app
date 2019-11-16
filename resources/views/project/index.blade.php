@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <h4 class="card-header text-center">
            List of All projects
        </h4>
        <table class="table table-hover table-bordered">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">
                        <input type="text" id='projectNameInput' name="project_name" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="col">
                        <input type="text" name="project_number" id="project_no" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'project Number')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'project Number')}}..'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">

                    </th>
                </tr>
            </thead>
            <tbody>

                @php $i=1 @endphp
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td class="project_name">{{$project}}</td>
                    <td class="project_number"><span class="text-danger">يفترض الرقم</span> {{$project}}</td>
                </tr>
                @php $i ++ @endphp
                </tr>
                @endforeach


            </tbody>
        </table>
    </div><!-- /End of container-fluid  -->
</div><!-- /End of container-fluid  -->


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection

@section('script')
<script>
    function filterNames(event){
    let inputID = event.target.id;
    let inputName = event.target.name;
      let inputValue = event.target.value;

      let tds = document.querySelectorAll('.'+inputName);
      
      tds.forEach(td => {
          if(td.innerHTML.indexOf(inputValue) > -1){
            td.parentNode.style.display = '';
            } else {
            td.parentNode.style.display = 'none';
            }
      });
    }

</script>
@endsection