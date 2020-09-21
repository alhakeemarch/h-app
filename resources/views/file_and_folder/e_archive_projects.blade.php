@extends('layouts.app')
@section('title', 'E Archive Project')

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
                    <th scope="col">
                        <p>upload file</p>
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
                    {{-- ------------------------------------ --}}
                    {{-- for upload form --}}
                    <td class="project_upload m-0 p-0 text-center">
                        @if (!$project_no == 0 )
                        <form action="{{ route('file_folder.showUplodeView') }}" method="GET" class="m-0 p-0">
                            @csrf
                            <input type="hidden" name="project_no" value={{$project_no}}>
                            <input type="hidden" name="project_name" value="{{$project_name}}">
                            <input type="hidden" name="project_location" value="e_archive">
                            {{-- @if (auth()->user()->is_admin)
                            <button type="submit" class="btn btn-info m-1">
                                <i class="fas fa-file-upload"></i>
                                <small class="mx-1">upload file</small>
                            </button>
                            @endif --}}
                            <button type="submit" class="btn btn-info m-1">
                                <i class="fas fa-file-upload"></i>
                                <small class="mx-1">upload file</small>
                            </button>
                        </form>
                        @endif
                    </td>
                    {{-- ------------------------------------ --}}
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