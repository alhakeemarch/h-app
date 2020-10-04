<table class="table table-striped table-hover text-center mt-2">
    <thead class="bg-thead">
        <tr>
            <th>العقد</th>
            <th>القيمة</th>
            <th>حفظ</th>
        </tr>
    </thead>
    @foreach ($contract_types as $contract_type)
    @if (in_array( $contract_type->name_ar , $quick_form_contracts))
    <tr>
        <td class="p-0">
            <form action="{{route('contract.store')}}" method="post">
                @csrf
                <input name="project_id" type="text" value="{{$project->id}}" hidden>
                {{$contract_type->name_ar}}
        <td>
            <input name="{{'contract_name__'.$contract_type->id}}" type="text" value="{{$contract_type->name_ar}}"
                hidden>
            <input type="text" name="{{'cost__'.$contract_type->id}}" class="form-control m-0"
                placeholder="enter the price" onfocus="this.placeholder=''" onblur="this.placeholder='enter the price'"
                title="price" minlength="3" maxlength="7" onkeypress="onlyNumber(event)">
        </td>
        </td>
        <td>
            <button type="submit" class="btn btn-primary btn-block">save</button>
        </td>
        </form>
    </tr>
    @endif
    @endforeach
</table>