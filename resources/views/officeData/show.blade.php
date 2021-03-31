@extends('layouts.app')
@section('title', 'office data')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="card">
    <h3 class="card-header d-flex justify-content-between">
        <span>office information</span>
        <span>بيانات المكتب</span>
    </h3>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class=" bg-thead">
                <th>
                    <x-search_input name='field_name' />
                </th>
                <th>
                    <x-search_input name='field_data' />
                </th>
            </thead>
            <tbody>
                <tr>
                    <td class="field_name"><span>الإسم</span><br><span>name</span></td>
                    <td class="field_data">{{$office_data->name_ar}}<br>{{$office_data->name_en}}</td>
                </tr>
                <tr>
                    <td class="field_name"><span>الهاتف</span><br><span>phone</span></td>
                    <td class="field_data">{{$office_data->phone}}<br>{{$office_data->phone1 }}</td>
                </tr>
                <tr>
                    <td class="field_name"><span>ايميل</span><br><span>Email</span></td>
                    <td class="field_data">{{$office_data->email}}<br>{{$office_data->email1}}</td>
                </tr>
                <tr>
                    <td class="field_name"><span>الرقم الضريبي</span><br><span>VAT NO</span></td>
                    <td class="field_data">{{$office_data->VAT_account_no}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    @can('view-any', App\OfficeDoc::class)
    <h3 class="card-header d-flex justify-content-between">
        <span>Office documents</span>
        <span>Total = {{count($office_docs)}}</span>
        <span>مستندات المكتب</span>
    </h3>
    <div class="card-body">
        @include('officeDoc.index')
    </div>
    @endcan

</div><!-- /End of card  -->






@if (auth()->user()->is_admin && false)

<div class="container-fluid text-center">
    <h1 class="h1">بيانات المكتب</h1>
    @php
    $obj = json_decode($office_data, TRUE);
    @endphp
    <ul class="">
        @foreach ($obj as $a=>$b )
        <li>
            {{$a}} : {{$b}}
        </li>
        @endforeach
    </ul>
    <hr>
</div><!-- /End of container-fluid  -->
@endif





@endsection

@section('script')
<script>

</script>
@endsection