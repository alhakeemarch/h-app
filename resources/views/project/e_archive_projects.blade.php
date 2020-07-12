@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
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
                        <input type="text" name="project_number" id="project_no" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'project Number')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'project Number')}}..'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">

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