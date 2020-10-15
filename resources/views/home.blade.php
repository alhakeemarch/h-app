@extends('layouts.app')
@section('title', 'home')
@section('head')
@if (true)
<style>
    .container {
        /* margin-top: 100px; */
        /* padding: 32px; */
    }

    .select-box {
        /* position: relative;
        display: flex;
        width: 400px;
        flex-direction: column; */
    }

    .options-container {
        max-height: 0;
        /* width: 100%; */
        opacity: 0;
        transition: all 0.4s;
        /* border-radius: 8px; */
        overflow: hidden;
        /* order: 1; */
    }

    .options-container.active {
        max-height: 240px;
        opacity: 1;
        overflow-y: scroll;
        margin-top: 0.8rem;
    }

    .select-box-title {
        background: #2f3640;
        border-radius: 8px;
        margin-bottom: 8px;
        color: #f5f6fa;
        position: relative;

        order: 0;
    }

    .selected::after {
        content: "";
        background: url("img/arrow-down.svg");
        background-size: contain;
        background-repeat: no-repeat;

        position: absolute;
        height: 100%;
        width: 32px;
        right: 10px;
        top: 5px;

        transition: all 0.4s;
    }



    .select-box .options-container.active+.selected::after {
        transform: rotateX(180deg);
        top: -6px;
    }

    .select-box .options-container::-webkit-scrollbar {
        width: 8px;
        background: #0d141f;
        border-radius: 0 8px 8px 0;
    }

    .select-box .options-container::-webkit-scrollbar-thumb {
        background: #525861;
        border-radius: 0 8px 8px 0;
    }

    .select-box .option,
    .selected {
        padding: 12px 24px;
        cursor: pointer;
    }

    .select-box .option:hover {
        background: #414b57;
    }

    .select-box label {
        cursor: pointer;
    }

    .select-box .option .radio {
        display: none;
    }

    /* Searchbox */

    .search-box input {
        width: 100%;
        padding: 12px 16px;
        /* font-family: "Roboto", sans-serif; */
        /* font-size: 16px; */
        position: absolute;
        border-radius: 8px 8px 0 0;
        z-index: 100;
        border: 8px solid #2f3640;

        opacity: 0;
        pointer-events: none;
        transition: all 0.4s;
    }

    .search-box input:focus {
        outline: none;
    }

    .select-box .options-container.active~.search-box input {
        opacity: 1;
        pointer-events: auto;
    }

</style>
@endif
@endsection
@section('content')

<div class="card">
    <h2 class="h2 text-center card-header">
        {{__('app name')}}
    </h2>

    <div class="card-body">

    </div>

    @php
    $list =[
    ['id'=>1,'name'=>'Fahad Bakhsh',],
    ['id'=>2,'name'=>'Almann Hakeem',],
    ['id'=>3,'name'=>'Ayham Alhaje',],
    ['id'=>4,'name'=>'Samher Almadani',],
    ['id'=>5,'name'=>'Abdullah Turkustani',],
    ['id'=>6,'name'=>'Abdullah Turkustani',],
    ['id'=>7,'name'=>'Abdullah Turkustani',],
    ['id'=>8,'name'=>'Abdullah Turkustani',],
    ['id'=>9,'name'=>'Abdullah Turkustani',],
    ['id'=>10,'name'=>'Abdullah Turkustani',],
    ];
    @endphp


    {{-- <form action="{{route('home')}}" method="GET">
    <div class="select-box">
        <div class="options-container active">
            @foreach ( $list as $itme )

            <div class="option" onclick="selectOption(event)">
                <input type="radio" class="radio" id="{{$itme['id']}}" name="category" / value="kkk">
                <label for="{{$itme['id']}}">{{$itme['name']}}</label>
            </div>
            @endforeach
        </div>

        <input type="text" readonly name="select_title" id="" value="select.." class="select-box-title"
            onclick="activeat_list()">

        <div class="search-box">
            <input type="text" placeholder="Start Typing..." />
        </div>
    </div>
    <button type="submit" class="btn btn-danger btn-block">send</button>
    </form> --}}

    <form action="{{route('home')}}" method="get" class=" form-group p-5">
        @php
        $select_name = 'plan_id';
        @endphp
        <div class="select-list">
            <input type="text" name="select_title" placeholder="select" class=" form-control" required
                autocomplete="off" onclick="activeatList(event)">
            <div class="options-container">
                @foreach ( $list as $item )
                <label class=" d-block">
                    <input type="radio" name="{{$select_name}}" value="{{$item['id']}}" onclick="selectOption(event)">
                    {{$item['name']}}
                </label>
                @endforeach
            </div>

        </div>
        <button type="submit" class="btn btn-danger btn-block">send</button>
    </form>
</div>











</div>
@endsection
{{-- // for javascript --}}
@section('script')

<script type="text/javascript">
    function activeatList(event){
    // console.log(event.target);
    console.log(event.target.nextElementSibling.children);
    arr = event.target.nextElementSibling.children;
    arr.forEach(element => {
        console.log(element);
    });
    event.target.nextElementSibling.classList.toggle('active');
}

function selectOption(event){
    // console.log(event.target.parentElement.innerText);
    // console.log(event.target.parentElement.parentElement.previousSibling.previousSibling);
    event.target.parentElement.parentElement.previousSibling.previousSibling.value = event.target.parentElement.innerText;
    event.target.parentElement.parentElement.classList.toggle('active');
}












const optionsList = document.querySelectorAll(".option");
optionsList.forEach(o => {
    
  o.addEventListener("click", (selected, optionsContainer) => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

searchBox.addEventListener("keyup", function(e) {
  filterList(e.target.value);
});

const filterList = searchTerm => {
  searchTerm = searchTerm.toLowerCase();
  optionsList.forEach(option => {
    let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
    if (label.indexOf(searchTerm) != -1) {
      option.style.display = "block";
    } else {
      option.style.display = "none";
    }
  });
};
</script>

@endsection