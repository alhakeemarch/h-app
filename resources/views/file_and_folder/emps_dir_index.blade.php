{{-- {{dd('1')}} --}}
@extends('layouts.app')
@section('title', 'emps dir index')

@section('head')
{{-- // for css --}}
@endsection
@section('content')
<div class="container-fluid">
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card">
        <h3 class="h3 text-center">
            list of on duty saudi employees <p class="small">total = {{ count($saudi_emps) }}</p>
        </h3>
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
                            <button type="submit" class=" btn btn-link">
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
    </div><!-- /End of card  -->
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="my-5"></div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card">
        <h3 class="h3 text-center">
            list of outduty saudi employees <p class="small">total = {{ count($saudi_emps_old) }}</p>
        </h3>
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
                        <input type="text" name="saudi_emps_old_name" class="form-control" autocomplete="off" required
                            placeholder="{{__( 'employee Name')}}.." onfocus="this.placeholder=''"
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
                            <button type="submit" class=" btn btn-link">
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
    </div><!-- /End of card  -->
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="my-5"></div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card">
        <h3 class="h3 text-center">
            list of on duty non saudi employees <p class="small">total = {{ count($non_saudi_emps) }}</p>
        </h3>
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
                        <input type="text" name="non_saudi_emps_name" class="form-control" autocomplete="off" required
                            placeholder="{{__( 'employee Name')}}.." onfocus="this.placeholder=''"
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
                            <button type="submit" class=" btn btn-link">
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
    </div><!-- /End of card  -->
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="my-5"></div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card">
        <h3 class="h3 text-center">
            list of outduty non saudi employees <p class="small">total = {{ count($non_saudi_emps_old) }}</p>
        </h3>
        <table class="table table-hover table-bordered">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">
                        <p>national id</p>
                        <input type="text" name="non_saudi_emps_old_national_id" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'national id')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'national id')}}..'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">
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
                            <button type="submit" class=" btn btn-link">
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
    </div><!-- /End of card  -->
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="my-5"></div>
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
    <div class="card">
        <h3 class="h3 text-center">
            list of others <p class="small">total = {{ count($other) }}</p>
        </h3>
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
                        <form action="{{ route('file_folder.show_emp_dir') }}" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="name" value="{{$name}}">
                            <input type="hidden" name="type" value="other">
                            <button type="submit" class=" btn btn-link">
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
    </div><!-- /End of card  -->
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}
</div><!-- /End of container-fluid  -->




@endsection

@section('script')
<script>

</script>
@endsection