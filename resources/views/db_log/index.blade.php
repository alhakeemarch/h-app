{{-- {{dd($db_logs)}} --}}
@extends('layouts.app')
@section('title','db_log index')

@section('content')

<div class="container-fluid card-body">
    <table class="table table-hover table-bordered">
        <thead class="bg-thead">
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">
                    <p>id</p>
                </th>
                <th scope="col">
                    <p>table</p>
                    <x-search_input name='table_name' />
                </th>
                <th scope="col">
                    <p>action</p>
                    <x-search_input name='action' />
                </th>
                <th scope="col">
                    <p>user</p>
                    <x-search_input name='user' />
                </th>
                <th scope="col">
                    <p>description</p>
                    <x-search_input name='description' />
                </th>

                <th scope="link">details</th>
            </tr>
        </thead>
        <tbody>

            @php $i=1 @endphp

            @foreach ($db_logs as $db_log)
            <tr>
                {{-- <td scope="row">{{$i}}</td> --}}
                <td class="id">{{$db_log->id}}</td>
                <td class="table_name">{{$db_log->table}}</td>
                <td class="action">{{$db_log->action}}</td>
                <td class="user">{{$db_log->created_by_name}}</td>
                <td class="description">{{$db_log->description}}</td>

                <td scope="link">
                    <a href="{{ route('dbLog.show',$db_log) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
            </tr>
            @php $i ++ @endphp
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



{{-- @if (auth()->user()->is_admin)

<div class="code">
    @foreach ($db_logs as $log)

    @php
    $obj = json_decode($log, TRUE);
    @endphp
    <ul class="card-body">
        @foreach ($obj as $a=>$b )
        <li>
            {{ $a}} : {{$b}}
</li>
@endforeach
</ul>
<hr>
@endforeach
</div>

@endif --}}




@endsection