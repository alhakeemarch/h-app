@extends('layouts.app')
@section('title', 'Finished Project')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <h3 class="h3 text-center">
            list of finished projects <p class="small">total = {{ count($finishedProjects) }}</p>
        </h3>
        <table class="table table-hover table-bordered">
            <thead class="bg-thead">
                <tr>
                    <th class="d-none" scope="col">#</th>
                    <th scope="col">
                        <p>project number</p>
                        <input type="text" name="project_number" id="project_no" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'project Number')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'project Number')}}..'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">
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
                @endphp


                @foreach ($finishedProjects as $project_no=>$project_name)
                <tr>
                    <td class="d-none" scope="row">{{$i}}</td>
                    <td class="project_number">{{$project_no}}</td>
                    <td class="project_name">{{$project_name}}</td>
                    @auth
                    <td class="m-0 p-0 text-center">
                        @if (!$project_no == 0 )
                        <form action="{{ route('file_folder.showUplodeView') }}" method="GET" class="m-0 p-0">
                            @csrf
                            <input type="hidden" name="project_no" value={{$project_no}}>
                            <input type="hidden" name="project_name" value="{{$project_name}}">
                            <input type="hidden" name="project_location" value="finished project">
                            <button type="submit" class="btn btn-info m-1">
                                <i class="fas fa-file-upload"></i>
                                <small class="mx-1">upload file</small>
                            </button>
                        </form>
                        @endif
                    </td>
                    <td>
                        @if (!$project_no == 0 && auth()->user()->is_admin)
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
    </div>
</div><!-- /End of container-fluid  -->


@endsection

@section('script')
<script>

</script>
@endsection