{{-- {{dd('1')}} --}}
@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <h3 class="h3 card-header text-center text-capitalize">
            <div>list of all projects</div>
            <div class="small">(total = {{$allProjectsCount}})</div>
        </h3>
        @if (auth()->user()->is_admin)
        <a class="btn btn-info btn-block w-75 mx-auto mb-4" href="{{route('project.check')}}">crate new project</a>
        @endif
        <div class="d-flex justify-content-center my-2">
            {{-- {{ $projects->links() }} --}}

            {!! $projects->withQueryString()->links('pagination::bootstrap-5') !!}

        </div>
        {{--
        -------------------------------------------------------------------------------------------------------------------------
        --}}
        <div class="jumbotron my-2"> @include('project.forms.find') </div>
        {{--
        -------------------------------------------------------------------------------------------------------------------------
        --}}
        <table class="table table-hover table-bordered">
            <thead class="bg-thead">
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">
                        <p>project number</p>
                        <input type="text" name="project_number" id="project_no" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'project Number')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'project Number')}}..'" onkeyup="filterNames(event)">
                    </th>
                    <th scope="col">
                        <p>project name</p>
                        <input type="text" id=' projectNameInput' name="project_name" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'project Name')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project Name')}}..'"
                            onkeyup="filterNames(event)">
                    </th>
                    <th scope="col">
                        <p>project type</p>
                        <input type="text" id=' projectTypeInput' name="project_type" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'project type')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project type')}}..'"
                            onkeyup="filterNames(event)">
                    </th>
                    <th scope="col">
                        <p>project location</p>
                        <input type="text" id=' projectLocationInput' name="project_location" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'project location')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project location')}}..'"
                            onkeyup="filterNames(event)">
                    </th>
                    <th scope="col">
                        <p>project date</p>
                        <input type="text" id=' projectLocationInput' name="project_created_at_note"
                            class="form-control" autocomplete="off" required placeholder="{{__( 'project date')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project date')}}..'"
                            onkeyup="filterNames(event)">
                    </th>
                    <th scope="col">
                        <p>project notes</p>
                        <input type="text" id=' projectNotesInput' name="project_notes" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'project notes')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'project notes')}}..'"
                            onkeyup="filterNames(event)">
                    </th>
                    <th scope="link">details</th>
                </tr>
            </thead>
            <tbody>

                @php $i=1 @endphp

                @foreach ($projects as $project)
                <tr>
                    {{-- <td scope="row">{{$i}}</td> --}}
                    <td class="project_number">
                        @if (! isset($project->project_no) && ($project->is_only_supervision))
                        اشراف فقط
                        @else
                        {{$project->project_no}}
                        @endif
                    </td>
                    <td class="project_name">{{$project->project_name_ar}}</td>
                    <td class="project_type">{{$project->project_type}}</td>
                    <td class="project_location">{{$project->project_location}}</td>
                    <td class="project_created_at_note">{{$project->created_at_note}}</td>
                    <td class="project_notes">{{$project->notes}}</td>
                    <td scope="link" class="text-center">
                        <form action="{{ url('/project/'.$project->id) }}">
                            <button type="submit" class="btn btn-link text-primary m-0 p-0">
                                <i class="far fa-eye"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @php $i ++ @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!-- /End of container-fluid  -->




@endsection

@section('script')
<script>

</script>
@endsection