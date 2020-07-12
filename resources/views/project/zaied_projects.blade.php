@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <h3 class="h3 text-center">
            list of zaied_projects <p class="small">total = {{ count($zaied_projects) }}</p>
        </h3>
        <table class="table table-hover table-bordered">
            <thead class="bg-thead">
                <tr>
                    <th class="d-none" scope="col">#</th>
                    <th scope="col">
                        <p>project location</p>
                        <input type="text" name="project_number" id="project_no" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'project location')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'project location')}}..'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">
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