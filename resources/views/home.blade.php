@extends('layouts.app')
@section('title', 'home')
@section('head')

@endsection
@section('content')

<div class="card">
    <h2 class="h2 text-center card-header">
        {{__('app name')}}
    </h2>

    <div class="card-body">
        <p class="text-center">
            {{-- هنا راح يكون الداش بورد للموظف --}}
        </p>
    </div>

    @php
    $list =[
    ['id'=>1,'name'=>'Fahad Bakhsh',],
    ['id'=>2,'name'=>'Almann Hakeem',],
    ['id'=>3,'name'=>'Ayham Alhaje',],
    ['id'=>4,'name'=>'Samher Almadani',],
    ['id'=>5,'name'=>'Abdullah Turkustani',],
    ];
    @endphp


    <div class="col-md form-group">
        <label for="municipality_branch_id">{{__('municipality branch')}}
            <span class="small text-muted">({{__('optional')}})</span> :</label>
        <select class="form-control" name="municipality_branch_id">
            <option selected disabled>choose..</option>
            <input type="text" class="w-100 border" placeholder="search..">
            @foreach ($list as $item)
            <option value="{{$item['id']}}"> {{$item['name']}}</option>
            @endforeach
        </select>
    </div>












</div>
@endsection

@section('script')


@endsection