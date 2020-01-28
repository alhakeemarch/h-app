@extends('layouts.app')
@section('title', 'street index')
@section('content')

{{-- <div class="container-fluid text-center"> --}}
<div class="card">
    <h3 class="h3 text-center card-header">
        list of all streets <p class="small">total = {{ $street_cout }}</p>
    </h3>

    <div class="card-body">
        <div class="jumbotron my-2">
            @include('street.forms.find')
        </div>


        {{-- <div class="d-inline-flex my-2">{{ $streets->links() }}
    </div> --}}
    <div class="d-flex justify-content-center my-2">{{ $streets->links() }}</div>
    <table class="table table-hover text-capitalize">
        <thead class="bg-thead">
            <tr>
                <th scope="sequence">#</th>

                <th scope="street_ar_name">
                    <p class="pb-2">إسم الشارع</p>
                    <input type="text" id='street_ar_name' name="street_ar_name_input" class="form-control"
                        autocomplete="off" required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>
                <th scope="code">
                    <p class="pb-2">كود الشارع</p>
                    <input type="text" id='code' name="code_input" class="form-control" autocomplete="off" required
                        placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>
                <th scope="str_width">
                    <p class="pb-2">عرض الشارع</p>
                    <input type="text" id='str_width' name="str_width" class="form-control" autocomplete="off" required
                        placeholder="{{__( 'search here')}}.." onfocus="this.placeholder=''"
                        onblur="this.placeholder=' {{__( 'search here')}}..'" onkeyup="filterNames(event)"
                        onkeypress=" onlyArabicString(event)">
                </th>
                <th scope="link">details</th>
            </tr>
        </thead>

        <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($streets as $street)
            <tr>
                <td scope="sequence">{{$i}}</td>
                <td scope="street_ar_name" class="street_ar_name_input">{{$street->ar_name}}</td>
                <td scope="code" class="code_input">{{$street->code}}</td>
                <td scope="str_width" class="str_width">{{$street->str_width}}
                </td>

                <td scope="link">
                    <a href="{{ url('/street/'.$street->id) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
                @php $i ++ @endphp
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
{{-- </div> --}}














{{-- NOTE: هذا الكود يبين كل حقول الجدول --}}
{{-- ===================================================++ --}}
{{-- @foreach ($streets as $street)
    @php
    $obj = json_decode($street, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
</li>
@endforeach

<a class="btn btn-info btn-lg btn-block " href="{{ url('/street/'.$street->id) }}">
    <i class="far fa-eye"></i>
    Show
</a>

</ul>
<hr>
@endforeach --}}
{{-- ===================================================++ --}}





<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection