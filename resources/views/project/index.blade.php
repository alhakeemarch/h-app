@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">

    <ul class="nav nav-tabs nav-justified text-uppercase" id="projects_tab_Just" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="runnig_projects-tab-just" data-toggle="tab" href="#runnig_projects-just"
                role="tab" aria-controls="runnig_projects-just" aria-selected="true">runnig projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="finshed_projects-tab-just" data-toggle="tab" href="#finshed_projects-just"
                role="tab" aria-controls="finshed_projects-just" aria-selected="false">finshed projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="all_projects-tab-just" data-toggle="tab" href="#all_projects-just" role="tab"
                aria-controls="all_projects-just" aria-selected="false">all projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="e_archive-tab-just" data-toggle="tab" href="#e_archive-just" role="tab"
                aria-controls="e_archive-just" aria-selected="false">e archive</a>
        </li>
    </ul>

    <div class="tab-content card pt-5 text-capitalize" id="projects_tab_ContentJust">
        <div class="tab-pane fade show active" id="runnig_projects-just" role="tabpanel"
            aria-labelledby="runnig_projects-tab-just">
            {{-- ///////////////////////////////////////NOTE: running ////////////////////////////////////////////////////////// --}}
            <h3 class="h3 text-center">
                list of running projects <p class="small">total = {{ count($runningProjects) }}</p>
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
            {{-- ///////////////////////////////////////NOTE: end of finised ////////////////////////////////////////////////////////// --}}
        </div>

        <div class="tab-pane fade" id="all_projects-just" role="tabpanel" aria-labelledby="all_projects-tab-just">
            {{-- ///////////////////////////////////////NOTE: all projects ////////////////////////////////////////////////////////// --}}
            <h3 class="h3 text-center">
                list of all projects <p class="small">total = {{ count($projects) }}</p>
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

                    @foreach ($projects as $project_no=>$project_name)
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
                        <th scope="row">{{$i}}</th>
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
    </div>

</div><!-- /End of container-fluid  -->
<hr>
<div class="alert alert-danger">
    <p>ممكن نضيف المشاريع الصادر لها رخصة من ملف زايد</p>
</div>


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