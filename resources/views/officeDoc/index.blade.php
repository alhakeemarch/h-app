@if (count($office_docs) > 0)
<table class="table table-hover table-bordered">
    <thead class=" bg-thead">
        <th>
            <x-search_input name='doc_number' />
        </th>
        <th>
            <x-search_input name='doc_name' />
        </th>
        <th>تاريخ الإصدار</th>
        <th>تاريخ الإنتهاء</th>
        <th>اجراءات</th>

    </thead>
    <tbody>
        @foreach ($office_docs as $officeDoc)
        <tr>
            <td class="doc_number">{{$officeDoc->number}}</td>
            <td class="doc_name">{{$officeDoc->name_ar}}</td>
            <td>{{$officeDoc->issue_date}}</td>
            <td>{{$officeDoc->expire_date}}</td>
            <td class="d-flex">
                @include('officeDoc.forms.show_edit')
                @if (isset($officeDoc->full_url))
                @include('officeDoc.forms.download_doc',['is_link'=>true])
                @endif
                @include('officeDoc.forms.show_upload')
                @if (auth()->user()->is_admin)
                @include('officeDoc.forms.delete')
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
{{-- ------------------------------------------------------------------------------------------------------------------------ --}}
@if (auth()->user()->is_admin)
<form action="{{route('officeDoc.store')}}" method="post" class="jumbotron py-2">
    @csrf
    <input type="hidden" name="form_action" value="create_new_office_doc">
    <input type="hidden" name="comming_from" value="show_office_info_and_doc">
    <input type="hidden" name="office_data_id" value="{{$office_data->id}}">
    @include('officeDoc.forms.all',['add_new_doc'=>true])
    <x-btn btnText='save' class="my-2" />
</form>
@endif