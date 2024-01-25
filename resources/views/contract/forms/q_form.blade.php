<ul class="list-group my-2">
    @foreach ($quick_form_contracts as $contract_type)
    @if (!(in_array( $contract_type->id , $project_contracts_type_id)))
    <li class="list-group-item">
        <form action="{{route('contract.store')}}" method="post"
            class="m-0 row text-center d-flex justify-content-between">
            <div class="form-group align-self-center col m-0">
                @csrf
                <input name="project_id" type="text" value="{{$project->id}}" hidden>
                <input name="contract_type_name" type="text" value="{{$contract_type->name_ar}}" hidden>
                <input name="contract_type_id" type="text" value="{{$contract_type->id}}" hidden>
                <div class="form-control m-0">{{$contract_type->name_ar}}</div>
            </div>
            <div class="form-group align-self-center col m-0">
                <input type="text" name="cost" class="form-control m-0" placeholder="enter the price"
                    onfocus="this.placeholder=''" onblur="this.placeholder='enter the price'" title="price"
                    minlength="3" maxlength="7" onkeypress="onlyNumber(event)" autocomplete="off">
            </div>
            <div class="form-group col align-self-center  m-0">
                <x-btn btnText='save' />
            </div>
        </form>
    </li>
    @endif
    @endforeach
</ul>

{{--
-----------------------------------------------------------------------------------------------------------------------------------------
--}}

<form action="{{route('contract.store')}}" method="POST" class=" form-group m-0 d-flex jumbotron p-3">
    @csrf
    <input type="hidden" name="form_action" value="add_contract">
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <div class="col">
        <label class="my-1">{{__('contract')}}</label>
        <select name="contract_type_id" class="form-control">
            <option disabled selected>pick a contract..</option>
            @foreach ($list_form_contracts as $contract_type)
            @php
            $test1 = !(in_array( $contract_type->id , $project_contracts_type_id));
            $test2 = strpos($contract_type->name_ar, 'مدن') == false;
            $test3 = auth()->user()->is_admin;
            $test4 = false;
            if ($project->plot()->first()) {
            if($project->plot()->first()->district()->first()){
            $test4 = (isset($project->plot()->first()->district()->first()->id))
            ? $project->plot()->first()->district()->first()->id == 40
            : false ;
            }
            }

            @endphp
            @if ($test1)
            @if ($test2|| $test3 ||$test4)
            <option value="{{$contract_type->id}}">{{$contract_type->name_ar}}</option>
            @endif
            @endif
            @endforeach
            <option value="11">تعديل تصميم</option>
        </select>
    </div>
    <div class="col">
        <x-input name='cost' title="">
            <x-slot name='title'>{{__('price')}}</x-slot>
            <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_min'>3</x-slot>
            <x-slot name='input_max'>7</x-slot>
        </x-input>
    </div>
    <x-btn btnText='add' class="m-0 p-0 align-self-end">
        <x-slot name='is_btn_link'>true</x-slot>
    </x-btn>
</form>



{{--
-----------------------------------------------------------------------------------------------------------------------------------------
--}}