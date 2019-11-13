@extends('layouts.app')
@section('title', 'Project index')

@section('head')
{{-- // for css --}}
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <h4 class="card-header text-center">
            List of All projects
        </h4>
        <table class="table table-hover">
            <thead class="bg-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">
                        <input type="text" name="project_name" id="nameInput" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'project Name')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'project Name')}}..'">
                        {{-- onkeypress=" onlyArabicString(event)"> --}}
                    </th>
                    <th scope="col">
                        <input type="text" name="project_no" id="project_no" class="form-control" autocomplete="off"
                            required placeholder="{{__( 'project Number')}}.." onfocus="this.placeholder=''"
                            onblur="this.placeholder=' {{__( 'project Number')}}..'">
                        {{-- onkeypress=" onlyArabicString(event)"> --}}

                    </th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">1</th>
                    <td>Project1</td>
                    <td>123</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Project1</td>
                    <td>456</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Project1</td>
                    <td>789</td>
                </tr>





                {{-- @php $i=1 @endphp
                @foreach ($persons as $person)
                <tr>
                    <th scope="row">{{$i}}</th>
                <td>{{$person->ar_name1}} {{$person->ar_name2}} {{$person->ar_name3}} {{$person->ar_name4}}
                    {{$person->ar_name5}}</td>
                <td>{{$person->national_id}}</td>
                <td> {{$person->mobile}}</td>
                <td>
                    <a href="{{ url('/person/'.$person->id) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
                </tr>
                @php $i ++ @endphp
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div><!-- /End of container-fluid  -->
</div><!-- /End of container-fluid  -->


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection

@section('script')

<script>
    let i = document.getElementById('nameInput');
    i.addEventListener('keydown',function(event){

    console.log('a');
    });



    document.addEventListener('keydown', function(event) {
    if(event.keyCode == 37) {
        alert('Left was pressed');
    }
    else if(event.keyCode == 39) {
        alert('Right was pressed');
    }
});











    document.getElementById('nameInput').addEventListener('keydown',function(event){
        console.log(event);
        // e.preventDefault()
        // alert(1);
    // document.getElementById('nameInput').value = '111222';
    });
    /*
    let nameInput = document.getElementById('nameInput');
    
    nameInput.addEventListener('onkeypress', function(){
        console.log(1);
      let filterValue = document.getElementById('nameInput').value;
      console.log(filterValue);
      }

/*
    // Get input element
    let nameInput = document.getElementById('nameInput');
    // Add event listener
    nameInput.addEventListener('keyup', filterNames());
    // nameInput.addEventListener('onkeypress', filterNames());

    function filterNames(){
        console.log(1);
      // Get value of input
    //   let filterValue = document.getElementById('nameInput').value.toUpperCase();
      let filterValue = document.getElementById('nameInput').value;
      console.log(filterValue);

      // Get names ul
      let ul = document.getElementById('names');
      // Get lis from ul
      let li = ul.querySelectorAll('li.collection-item');

      // Loop through collection-item lis
      for(let i = 0;i < li.length;i++){
        let a = li[i].getElementsByTagName('a')[0];
        // If matched
        if(a.innerHTML.toUpperCase().indexOf(filterValue) > -1){
          li[i].style.display = '';
        } else {
          li[i].style.display = 'none';
        }
      }
    }
*/
</script>
@endsection