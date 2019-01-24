@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="container">
                    <div class="card">
        
                        <div class="card-body">
                            <h4 class="card-title">إنشاء عميل جديد</h4>
                            <p class="card-text">يرجى التأكد من صحة البيانات المدخلة</p> 
                            <form action="{{ url('person/check') }}" method="post">
                                @csrf
                                <label for="fname">{{__( 'nId')}}:</label>
                                <input type="text" name="n_id" id="" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}..">
                                <input type="submit" value="{{__('submit')}}" class="btn btn-secondary btn-block">
                            </form>
            
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label for="fname" class="d-block">{{__('the name')}}:</label>
                                    <div class="form-row mb-3">
                                        <div class="col-md">
                                            <input type="text" name="fname" id="" class="form-control" placeholder="{{ __('name1') }}.." required>
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="name2" id="" class="form-control" placeholder="{{__( 'name2')}}..">
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="name3" id="" class="form-control" placeholder="{{__( 'name3')}}..">
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="name4" id="" class="form-control" placeholder="{{__( 'name4')}}..">
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="name5" id="" class="form-control" placeholder="{{__( 'name5')}}.." required>
                                        </div>
                                    </div>
                                    <!-- end form-row -->
                                    <label for="fname">{{__( 'nId')}}:</label>
                                    <input type="text" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.." aria-describedby="helpId">
                                    <label for="fname">{{__( 'phoneNo')}}:</label>
                                    <input type="text" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'phoneNo')}}.." aria-describedby="helpId">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>
                                <!-- end form-group -->
                                <input type="submit" value="{{__('submit')}}" class="btn btn-secondary btn-block">
                            </form>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
        
    </div><!-- end of row --> 
</div>
@endsection
