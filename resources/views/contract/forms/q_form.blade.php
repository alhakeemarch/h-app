<ul class="card-body list-group">
    @foreach ($contract_types as $contract_type)
    @if (in_array( $contract_type->name_ar , $quick_form_contracts))
    <li class="list-group-item">
        <form action="{{route('contract.store')}}" method="post" class="m-0 row text-center">
            <div class="form-group col m-0">
                @csrf
                <input name="project_id" type="text" value="{{$project->id}}" hidden>
                <input name="contract_type_name" type="text" value="{{$contract_type->name_ar}}" hidden>
                <input name="contract_type_id" type="text" value="{{$contract_type->id}}" hidden>
                <div class="form-control m-0">{{$contract_type->name_ar}}</div>
            </div>
            <div class="form-group col m-0">
                <input type="text" name="cost" class="form-control m-0" placeholder="enter the price"
                    onfocus="this.placeholder=''" onblur="this.placeholder='enter the price'" title="price"
                    minlength="3" maxlength="7" onkeypress="onlyNumber(event)" autocomplete="off">
            </div>
            <div class="form-group col  m-0">
                <button type="submit" class="btn btn-primary btn-block m-0">save</button>
            </div>
        </form>
    </li>
    @endif
    @endforeach
</ul>