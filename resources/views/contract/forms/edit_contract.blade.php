<ul class="card-body list-group">
    <li class="list-group-item">
        <form action="{{route('contract.update',$contract)}}" method="post" class="m-0 row text-center">
            <div class="form-group col m-0">
                @csrf
                @method('PATCH')
                <div class="form-control m-0">{{$contract->contract_type()->first()->name_ar}}</div>
            </div>
            <div class="form-group col m-0">
                <input type="text" name="cost" class="form-control m-0" placeholder="enter the price"
                    onfocus="this.placeholder=''" onblur="this.placeholder='enter the price'" title="price"
                    minlength="3" maxlength="7" onkeypress="onlyNumber(event)" autocomplete="off"
                    value="{{$contract->cost}}">
            </div>
            <div class="form-group col  m-0">
                <x-btn-save />
                <x-btn-cancel />
            </div>
        </form>
    </li>
</ul>