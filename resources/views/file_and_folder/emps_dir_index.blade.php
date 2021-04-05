{{-- {{dd('1')}} --}}
@extends('layouts.app')
@section('title', 'emps dir index')

@section('head')
{{-- // for css --}}
<style>

</style>
@endsection
@section('content')
<div class="container-fluid">
    {{-- ////////////////////////////////////////////////////////////////////////////////////// --}}
    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="saudi_on_duty-tab" data-toggle="tab" href="#saudi_on_duty" role="tab"
                aria-controls="saudi_on_duty" aria-selected="true">
                <span>list of on duty saudi employees</span>
                <p class="small">total = {{ count($saudi_emps) }}</p>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="saudi_outduty-tab" data-toggle="tab" href="#saudi_outduty" role="tab"
                aria-controls="saudi_outduty" aria-selected="false">
                <span>list of outduty saudi employees</span>
                <p class="small">total = {{ count($saudi_emps_old) }}</p>
            </a>

        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="non_saudi_emp-tab" data-toggle="tab" href="#non_saudi_emp" role="tab"
                aria-controls="non_saudi_emp" aria-selected="false">
                <span>list of on duty non saudi employees</span>
                <p class="small">total = {{ count($non_saudi_emps) }}</p>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="non_saudi_outduty-tab" data-toggle="tab" href="#non_saudi_outduty" role="tab"
                aria-controls="non_saudi_outduty" aria-selected="false">
                <span>list of outduty non saudi employees</span>
                <p class="small">total = {{ count($non_saudi_emps_old) }}</p>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="others-tab" data-toggle="tab" href="#others" role="tab" aria-controls="others"
                aria-selected="false">
                <span>list of others</span>
                <p class="small">total = {{ count($other) }}</p>
            </a>
        </li>
    </ul>
    {{-- ////////////////////////////////////////////////////////////////////////////////////// --}}
    <div class="card tab-content mt-4">
        {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
        <div class="tab-pane active" id="saudi_on_duty" role="tabpanel" aria-labelledby="saudi_on_duty-tab">
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <p>national id</p>
                            <input type="text" name="saudi_emps_national_id" class="form-control" autocomplete="off"
                                required placeholder="{{__( 'national id')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'national id')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>employee name</p>
                            <input type="text" name="saudi_emps_name" class="form-control" autocomplete="off" required
                                placeholder="{{__( 'employee Name')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'employee Name')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="link">details</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($saudi_emps as $id => $name)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td class="saudi_emps_national_id">{{$id}}</td>
                        <td class="saudi_emps_name">{{$name}}</td>
                        <td scope="link">
                            <form action="{{ route('file_folder.show_emp_dir') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="name" value="{{$name}}">
                                <input type="hidden" name="type" value="saudi_emps">
                                <button type="submit" class=" btn btn-link m-0 p-0">
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
        {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
        <div class="tab-pane" id="saudi_outduty" role="tabpanel" aria-labelledby="saudi_outduty-tab">
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <p>national id</p>
                            <input type="text" name="saudi_emps_old_national_id" class="form-control" autocomplete="off"
                                required placeholder="{{__( 'national id')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'national id')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>employee name</p>
                            <input type="text" name="saudi_emps_old_name" class="form-control" autocomplete="off"
                                required placeholder="{{__( 'employee Name')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'employee Name')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="link">details</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($saudi_emps_old as $id => $name)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td class="saudi_emps_old_national_id">{{$id}}</td>
                        <td class="saudi_emps_old_name">{{$name}}</td>
                        <td scope="link">
                            <form action="{{ route('file_folder.show_emp_dir') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="name" value="{{$name}}">
                                <input type="hidden" name="type" value="saudi_emps_old">
                                <button type="submit" class=" btn btn-link m-0 p-0">
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
        {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
        <div class="tab-pane" id="non_saudi_emp" role="tabpanel" aria-labelledby="non_saudi_emp-tab">
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <p>national id</p>
                            <input type="text" name="non_saudi_emps_national_id" class="form-control" autocomplete="off"
                                required placeholder="{{__( 'national id')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'national id')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>employee name</p>
                            <input type="text" name="non_saudi_emps_name" class="form-control" autocomplete="off"
                                required placeholder="{{__( 'employee Name')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'employee Name')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="link">details</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($non_saudi_emps as $id => $name)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td class="non_saudi_emps_national_id">{{$id}}</td>
                        <td class="non_saudi_emps_name">{{$name}}</td>
                        <td scope="link">
                            <form action="{{ route('file_folder.show_emp_dir') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="name" value="{{$name}}">
                                <input type="hidden" name="type" value="non_saudi_emps">
                                <button type="submit" class=" btn btn-link m-0 p-0">
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
        {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
        <div class="tab-pane" id="non_saudi_outduty" role="tabpanel" aria-labelledby="non_saudi_outduty-tab">
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <p>national id</p>
                            <input type="text" name="non_saudi_emps_old_national_id" class="form-control"
                                autocomplete="off" required placeholder="{{__( 'national id')}}.."
                                onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'national id')}}..'"
                                onkeyup="filterNames(event)" onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>employee name</p>
                            <input type="text" name="non_saudi_emps_old_name" class="form-control" autocomplete="off"
                                required placeholder="{{__( 'employee Name')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'employee Name')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="link">details</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($non_saudi_emps_old as $id => $name)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td class="non_saudi_emps_old_national_id">{{$id}}</td>
                        <td class="non_saudi_emps_old_name">{{$name}}</td>
                        <td scope="link">
                            <form action="{{ route('file_folder.show_emp_dir') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="name" value="{{$name}}">
                                <input type="hidden" name="type" value="non_saudi_emps_old">
                                <button type="submit" class=" btn btn-link m-0 p-0">
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
        {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
        <div class="tab-pane" id="others" role="tabpanel" aria-labelledby="others-tab">
            <table class="table table-hover table-bordered">
                <thead class="bg-thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <p>national id</p>
                            <input type="text" name="other_national_id" class="form-control" autocomplete="off" required
                                placeholder="{{__( 'national id')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'national id')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyNumber(event)">
                        </th>
                        <th scope="col">
                            <p>employee name</p>
                            <input type="text" name="other_name" class="form-control" autocomplete="off" required
                                placeholder="{{__( 'employee Name')}}.." onfocus="this.placeholder=''"
                                onblur="this.placeholder=' {{__( 'employee Name')}}..'" onkeyup="filterNames(event)"
                                onkeypress=" onlyArabicString(event)">
                        </th>
                        <th scope="link">details</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($other as $id => $name)

                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td class="other_national_id">{{$id}}</td>
                        <td class="other_name">{{$name}}</td>
                        <td scope="link">
                            @if (! strpos($name, '.'))
                            <form action="{{ route('file_folder.show_emp_dir') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="name" value="{{$name}}">
                                <input type="hidden" name="type" value="other">
                                <button type="submit" class=" btn btn-link m-0 p-0">
                                    <i class="far fa-eye"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @php $i ++ @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    </div>
    {{-- ////////////////////////////////////////////////////////////////////////////////////// --}}
</div>


@endsection

@section('script')

<script>
    $(function () {
      $('#myTab li:last-child a').tab('show')
    })
</script>
@endsection