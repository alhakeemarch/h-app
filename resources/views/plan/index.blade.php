@extends('layouts.app')
@section('title', 'plan index')
@section('content')

<div class="container-fluid text-center">
    <h1 class="h1"> جدل لعرض كل المخططات</h1>



    <div class="card">
        <table class="table table-hover text-capitalize">
            <thead class="bg-thead">
                <tr>
                    <th scope="sequence">#</th>
                    <th scope="plan_no">
                        <p class="pb-2">رقم المخطط</p>
                        <input type="text" id='plan_no_input' name="plan_no_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'إبحث هنا')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'"
                            onkeyup="filterNames(event)">
                    </th>
                    <th scope="plan_ar_name">
                        <p class="pb-2">إسم المخطط</p>
                        <input type="text" id='plan_ar_name' name="plan_ar_name_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'إبحث هنا')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="plan_year">
                        <p class="pb-2">سنة المخطط</p>
                        <input type="text" id='plan_year' name="plan_year_input" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'إبحث هنا')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'" onkeyup="filterNames(event)"
                            onkeypress=" onlyNumber(event)">
                    </th>
                    <th scope="paln_type_code">
                        <p class="pb-2">نوع المخطط</p>
                        <input type="text" id='paln_type_code' name="paln_type_code_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'إبحث هنا')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'إبحث هنا')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="gog_location">
                        <p class="pb-2">موقع المخطط</p>
                        <input type="text" id='gog_location_input' name="gog_location_input" class="form-control"
                            autocomplete="off" required placeholder="{{__( 'search here')}}.."
                            onfocus="this.placeholder=''" onblur="this.placeholder=' {{__( 'search here')}}..'"
                            onkeyup="filterNames(event)" onkeypress=" onlyArabicString(event)">
                    </th>
                    <th scope="link">details</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1 ;
                $plan_type='غير معرف';
                @endphp
                @foreach ($palns as $plan)
                @php
                if ($plan->paln_type_code == 1) {
                $plan_type = 'مخطط معتمد';
                } elseif($plan->paln_type_code == 2) {
                $plan_type = 'إفراز';
                }elseif($plan->paln_type_code == 3){
                $plan_type = 'عشوائي';
                }else {
                $plan_type = 'لم يعرف';
                }
                @endphp

                <tr>
                    <td scope="sequence">{{$i}}</td>
                    <td scope="plan_no" class="plan_no_input">{{$plan->plan_no }}</td>
                    <td scope="plan_ar_name" class="plan_ar_name_input">{{$plan->plan_ar_name}}</td>
                    <td scope="plan_year" class="plan_year_input">{{$plan->plan_year}}</td>
                    <td scope="paln_type_code" class="paln_type_code_input">{{$plan_type}}</td>
                    <td scope="gog_location" class="gog_location_input">
                        {{$plan->gog_location}}</td>

                    <td scope="link">
                        <a href="{{ url('/plan/'.$plan->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    @php $i ++ @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>





    {{-- NOTE: هذا الكود يبين كل حقول الجدول --}}
    {{-- ===================================================++ --}}
    {{-- @foreach ($palns as $plan)
    @php
    $obj = json_decode($plan, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
    </li>
    @endforeach

    <a class="btn btn-info btn-lg btn-block " href="{{ url('/plan/'.$plan->id) }}">
        <i class="far fa-eye"></i>
        Show
    </a>

    </ul>
    <hr>
    @endforeach --}}
    {{-- ===================================================++ --}}
</div>



<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection