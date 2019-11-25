@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        {{-- ========================================TODO:========================================== --}}
        <nav class="mb-3 text-uppercase">
            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active my-2" id="nav-running-tab" data-toggle="tab" href="#nav-running"
                    role="tab" aria-controls="nav-running" aria-selected="true">runnig projects</a>
                <a class="nav-item nav-link my-2" id="nav-finshed-tab" data-toggle="tab" href="#nav-finshed" role="tab"
                    aria-controls="nav-finshed" aria-selected="false">finshed projects</a>
                <a class="nav-item nav-link my-2" id="nav-all_projects-tab" data-toggle="tab" href="#nav-all_projects"
                    role="tab" aria-controls="nav-all_projects" aria-selected="false">all
                    projects</a>
            </div>
        </nav>
        <div class="tab-content text-capitalize" id="nav-tabContent">

            {{-- ///////////////////////////////////////NOTE: running ////////////////////////////////////////////////////////// --}}
            <div class="tab-pane fade show active" id="nav-running" role="tabpanel" aria-labelledby="nav-running-tab">
                <h4 class="card-header text-center">
                    list of running projects
                </h4>
                <table class="table table-hover table-bordered">
                    <thead class="bg-thead">
                        <tr>
                            <th scope="col">sequence</th>
                            <th scope="col">
                                <div>project name</div>
                                <input type="text" id='projectNameInput' name="project_name" class="form-control"
                                    autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                                    onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                                    onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                            </th>
                            <th scope="col">
                                <div>project number</div>
                                <input type="text" name="project_number" id="project_no" class="form-control"
                                    autocomplete="off" required placeholder="{{__( 'project Number')}}.."
                                    onfocus="this.placeholder=''"
                                    onblur="this.placeholder=' {{__( 'project Number')}}..'"
                                    onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">

                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $i=1 @endphp

                        @foreach ($runningProjects as $project_no=>$project_name)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td class="project_name">{{$project_name}}</td>
                            <td class="project_number">{{$project_no}}</td>
                        </tr>
                        @php $i ++ @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- ///////////////////////////////////////NOTE: end of running /////////////////////////////////////////////////// --}}

            {{-- ///////////////////////////////////////NOTE: finised ////////////////////////////////////////////////////////// --}}
            <div class="tab-pane fade" id="nav-finshed" role="tabpanel" aria-labelledby="nav-finshed-tab">
                <h4 class="card-header text-center">
                    list of finished projects
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
                                <input type="text" name="project_number" id="project_no" class="form-control"
                                    autocomplete="off" required placeholder="{{__( 'project Number')}}.."
                                    onfocus="this.placeholder=''"
                                    onblur="this.placeholder=' {{__( 'project Number')}}..'"
                                    onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">

                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $i=1 @endphp

                        @foreach ($finishedProjects as $project_no=>$project_name)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td class="project_name">{{$project_name}}</td>
                            <td class="project_number">{{$project_no}}</td>
                        </tr>
                        @php $i ++ @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- ///////////////////////////////////////NOTE: end of finised ////////////////////////////////////////////////////////// --}}

            {{-- ///////////////////////////////////////NOTE: all  ////////////////////////////////////////////////////////// --}}
            <div class="tab-pane fade" id="nav-all_projects" role="tabpanel" aria-labelledby="nav-all_projects-tab">
                this whare all projects go ..
            </div>
            {{-- ///////////////////////////////////////NOTE: end of all  ////////////////////////////////////////////////////////// --}}
        </div>



        {{-- ========================================TODO:========================================== --}}













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