@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">

    <ul class="nav nav-tabs nav-justified text-uppercase" id="projects_tab_Just" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="runnig_projects-tab-just" data-toggle="tab" href="#runnig_projects-just" role="tab"
                aria-controls="runnig_projects-just" aria-selected="true">runnig projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="finshed_projects-tab-just" data-toggle="tab" href="#finshed_projects-just"
                role="tab" aria-controls="finshed_projects-just" aria-selected="false">finshed projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="all_projects-tab-just" data-toggle="tab" href="#all_projects-just" role="tab"
                aria-controls="all_projects-just" aria-selected="false">all projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="e_archive-tab-just" data-toggle="tab" href="#e_archive-just" role="tab"
                aria-controls="e_archive-just" aria-selected="false">e archive</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="zaied_projects-tab-just" data-toggle="tab" href="#zaied_projects-just" role="tab"
                aria-controls="zaied_projects-just" aria-selected="false">zaied projects</a>
        </li>
    </ul>

    <div class="tab-content card pt-5 text-capitalize" id="projects_tab_ContentJust">
        <div class="tab-pane fade" id="runnig_projects-just" role="tabpanel" aria-labelledby="runnig_projects-tab-just">
            {{-- ///////////////////////////////////////NOTE: running ////////////////////////////////////////////////////////// --}}
            <h3 class="h3 text-center">
                list of running projects <p class="small">total = {{ count($runningProjects) }}</p>
            </h3>
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th class="d-none" scope="col">#</th>
                        <th scope="col">
                            <p>project number</p>
                            <input type="text" name="project_number" id="project_no" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Number')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Number')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>project name</p>
                            <input type="text" id='projectNameInput' name="project_name" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php $i=1 @endphp

                    @foreach ($runningProjects as $project_no=>$project_name)
                    <tr>
                        <td class="d-none" scope="row">{{$i}}</td>
                        <td class="project_number">{{$project_no}}</td>
                        <td class="project_name">{{$project_name}}</td>
                    </tr>
                    @php $i ++ @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ///////////////////////////////////////NOTE: end of running /////////////////////////////////////////////////// --}}
        </div>

        <div class="tab-pane fade" id="finshed_projects-just" role="tabpanel"
            aria-labelledby="finshed_projects-tab-just">
            {{-- ///////////////////////////////////////NOTE: finised ////////////////////////////////////////////////////////// --}}
            <h3 class="h3 text-center">
                list of finished projects <p class="small">total = {{ count($finishedProjects) }}</p>
            </h3>
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th class="d-none" scope="col">#</th>
                        <th scope="col">
                            <p>project number</p>
                            <input type="text" name="project_number" id="project_no" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Number')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Number')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>project name</p>
                            <input type="text" id='projectNameInput' name="project_name" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                        @auth
                        <th scope="col">
                            <p>upload file</p>
                        </th>
                        <th scope="col">
                            <p>details</p>
                        </th>
                        @endauth
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i=1;
                    $finished_projects_path="\\100.0.0.6\Finished-Projects";
                    @endphp


                    @foreach ($finishedProjects as $project_no=>$project_name)
                    <tr>
                        <td class="d-none" scope="row">{{$i}}</td>
                        <td class="project_number">{{$project_no}}</td>
                        <td class="project_name">{{$project_name}}</td>
                        @auth
                        <td class="m-0 p-0 text-center">
                            @if (!$project_no == 0 )
                            <form action="{{ url('/project/showUplodeView') }}" method="GET" class="m-0 p-0">
                                @csrf
                                <input type="hidden" name="project_no" value={{$project_no}}>
                                <input type="hidden" name="project_name" value="{{$project_name}}">
                                <input type="hidden" name="path"
                                    value="{{$finished_projects_path}}\{{$project_no}} - {{$project_name}}">
                                <input type="hidden" name="project_location" value="finished project">
                                <button type="submit" class="btn btn-info m-1">
                                    <i class="fas fa-file-upload"></i>
                                    <small class="mx-1">upload file</small>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td>
                            @if (!$project_no == 0)
                            <a href="#">
                                show project details
                            </a>
                            @endif
                        </td>
                        @endauth
                        {{-- </tr> --}}
                        @php $i ++ @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ///////////////////////////////////////NOTE: end of finised ////////////////////////////////////////////////////////// --}}
        </div>

        {{-- ///////////////////////////////////////NOTE: all projects ////////////////////////////////////////////////////////// --}}
        <div class="tab-pane fade show active" id="all_projects-just" role="tabpanel"
            aria-labelledby="all_projects-tab-just">
            <h3 class="h3 text-center">
                list of all projects <p class="small">total = {{ count($projects) }}</p>
            </h3>
            <a class="btn btn-info btn-block w-75 mx-auto mb-4" href="{{route('project.check')}}">crate new project</a>
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">
                            <p>project number</p>
                            <input type="text" name="project_number" id="project_no" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Number')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Number')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>project name</p>
                            <input type="text" id=' projectNameInput' name="project_name" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="col">
                            <p>project type</p>
                            <input type="text" id=' projectTypeInput' name="project_type" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project type')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project type')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="col">
                            <p>project location</p>
                            <input type="text" id=' projectLocationInput' name="project_location" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project location')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project location')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="col">
                            <p>project date</p>
                            <input type="text" id=' projectLocationInput' name="project_created_at_note"
                                class="form-control" autocomplete="off" required placeholder="{{__( 'project date')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project date')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="col">
                            <p>project notes</p>
                            <input type="text" id=' projectNotesInput' name="project_notes" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project notes')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project notes')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="link">details</th>
                    </tr>
                </thead>
                <tbody>

                    @php $i=1 @endphp

                    @foreach ($projects as $project)
                    <tr>
                        {{-- <td scope="row">{{$i}}</td> --}}
                        <td class="project_number">{{$project->project_no}}</td>
                        <td class="project_name">{{$project->project_name_ar}}</td>
                        <td class="project_type">{{$project->project_type}}</td>
                        <td class="project_location">{{$project->project_location}}</td>
                        <td class="project_created_at_note">{{$project->created_at_note}}</td>
                        <td class="project_notes">{{$project->notes}}</td>
                        <td scope="link">
                            <a href="{{ url('/project/'.$project->id) }}">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @php $i ++ @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ///////////////////////////////////////NOTE: end of all projects//////////////////////////////////////////////// --}}
        </div>

        <div class="tab-pane fade" id="e_archive-just" role="tabpanel" aria-labelledby="e_archive-tab-just">
            {{-- ///////////////////////////////////////NOTE: all projects ////////////////////////////////////////////////////////// --}}
            <h3 class="h3 text-center">
                list of e_archive <p class="small">total = {{ count($e_archive) }}</p>
            </h3>
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <p>project name</p>
                            <input type="text" id='projectNameInput' name="project_name" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="col">
                            <p>project number</p>
                            <input type="text" name="project_number" id="project_no" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Number')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Number')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php $i=1 @endphp

                    @foreach ($e_archive as $project_no=>$project_name)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td class="project_name">{{$project_name}}</td>
                        <td class="project_number">{{$project_no}}</td>
                    </tr>
                    @php $i ++ @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ///////////////////////////////////////NOTE: end of all projects//////////////////////////////////////////////// --}}
        </div>

        <div class="tab-pane fade" id="zaied_projects-just" role="tabpanel" aria-labelledby="zaied_projects-tab-just">
            {{-- ///////////////////////////////////////NOTE: zaied projects ////////////////////////////////////////////////////////// --}}
            <h3 class="h3 text-center">
                list of zaied_projects <p class="small">total = {{ count($zaied_projects) }}</p>
            </h3>
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th class="d-none" scope="col">#</th>
                        <th scope="col">
                            <p>project location</p>
                            <input type="text" name="project_number" id="project_no" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project location')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project location')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>project name</p>
                            <input type="text" id='projectNameInput' name="project_name" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php $i=1 @endphp

                    @foreach ($zaied_projects as $project_no=>$project_name)
                    <tr>
                        @php
                        $position = stripos($project_no, '|');
                        $project_no = substr($project_no, $position + 1);
                        @endphp
                        <td class="d-none" scope="row">{{$i}}</td>
                        <td class="project_number">{{$project_no}}</td>
                        <td class="project_name">{{$project_name}}</td>
                    </tr>
                    @php $i ++ @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ///////////////////////////////////////NOTE: end of a zaied projects//////////////////////////////////////////////// --}}
        </div>
    </div>

</div><!-- /End of container-fluid  -->


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection

@section('script')
<script>

</script>
@endsection