@extends('layouts.app')
@section('title', 'Eror')
@section('content')

<div class="row">
    <!-- Button trigger modal -->
    <button hidden id="123" type="button" class="btn btn-primary hidden" data-toggle="modal"
        data-target="#exampleModal">
        Not Found
    </button>
    <!-- Modal -->
    {{-- to enable escab button to cloas modal we should add tabindex="-1" --}}
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false"> --}}

    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                    <button type="button" class="close" onClick="goBack()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h6 class="text-center mt-2">404 | Not Found </h6>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="goBack()"
                        autofocus>Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function(){
    document.getElementById('123').click();
            });
            
function goBack(){
        //if it was the first page
        if(history.length === 1){
            document.location.href="{!! route('home'); !!}";
        } else {
            history.back();
        }
    }
</script>


<!-- ///////////////////////////////-->
@if ($errors->any())
@include('layouts.errors')
@endif
<!-- ///////////////////////////////-->

@endsection