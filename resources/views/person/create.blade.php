@extends('layouts.app') 
@section('title','Create view') 
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="container">
            <div class="card mb-3">

                <div class="card-body">
                    <h4 class="card-title">إنشاء عميل جديد</h4>
                    <p class="card-text">يرجى التأكد من صحة البيانات المدخلة</p>
                    <!-- Main Information -->
                    <div class="card-header text-white bg-dark mb-3">
                        Main Information:
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fname" class="d-block">{{__('the name')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                            <div class="form-row mb-3">
                                <div class="col-md">
                                    <input type="text" name="fname" id="" class="form-control" placeholder="{{ __('name1') }}.." required onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="name2" id="" class="form-control" placeholder="{{__( 'name2')}}.." onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="name3" id="" class="form-control" placeholder="{{__( 'name3')}}.." onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="name4" id="" class="form-control" placeholder="{{__( 'name4')}}.." onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="name5" id="" class="form-control" placeholder="{{__( 'name5')}}.." required onkeypress="onlyArabicString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                            </div>
                            <!-- end form-row -->
                            <div class="form-group">
                                <label for="fname" class="d-block">{{__('The Name in English')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                <div class="form-row mb-3">
                                    <div class="col-md">
                                        <input type="text" name="fname" id="" class="form-control" placeholder="{{ __('name1') }}.." onkeypress="onlyEnglishString(event)"
                                            pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="name2" id="" class="form-control" placeholder="{{__( 'name2')}}.." onkeypress="onlyEnglishString(event)"
                                            pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="name3" id="" class="form-control" placeholder="{{__( 'name3')}}.." onkeypress="onlyEnglishString(event)"
                                            pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="name4" id="" class="form-control" placeholder="{{__( 'name4')}}.." onkeypress="onlyEnglishString(event)"
                                            pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="name5" id="" class="form-control" placeholder="{{__( 'name5')}}.." onkeypress="onlyEnglishString(event)"
                                            pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                    </div>
                                </div>
                                <!-- end form-row -->
                                <!-- end of  English Name -->
                                <div class="form-row mb-3">
                                    <div class="col-md">
                                        <label for="n_id">{{__( 'nId')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                        <input type="text" onkeypress="onlyNumber(event)" maxlenght="10" name="n_id" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.."
                                            value="{{$n_id}}" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                                    </div>
                                    <div class="col-md">
                                        <label for="fname">{{__( 'phoneNo')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                        <input type="text" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'phoneNo')}}.." aria-describedby="helpId"
                                            onkeypress="onlyNumber(event)" maxlenght="10" required title="{{__('must be 10 digits')}}">
                                        <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                    </div>
                                </div>
                                <!-- end of Main Information -->

                                <!-- Nationaltiy Information -->
                                <div class="card-header text-white bg-dark mb-3">
                                    Nationaltiy Information:
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-md">
                                        <label for="fname">{{__( 'Nationaltiy')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                        <select name="Nationaltiy" class="form-control" required >
                                            <option selected value="">{{__( 'Nationaltiy')}}..</option>
                                            @foreach ($nat as $key => $value)
                                                @if (App::isLocale('ar'))
                                                <option value="{{$key}}">{{$value}}</option>
                                                @else
                                                <option value="{{$key}}">{{$key}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md">
                                        <label for="fname">{{__( 'Hafizah Number')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                        <input type="text" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'Hafizah Number')}}..">
                                    </div>
                                    <div class="col-md">
                                        <label for="fname">{{__( 'National ID Issue Date')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                        <input type="date" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'National ID Issue Date')}}..">
                                    </div>
                                    <div class="col-md">
                                        <label for="fname">{{__( 'National ID Issue Place')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                        <input type="text" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'National ID Issue Place')}}..">
                                    </div>
                                    <!-- End of Nationaltiy Information -->
                                </div>

                                <!-- Personal Information -->
                                <div class="card-header text-white bg-dark mb-3">
                                    Personal Information:
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-md">
                                        <label for="fname">{{__( 'Birth Date')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                        <input type="text" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'Birth Date')}}..">
                                    </div>
                                    <div class="col-md">
                                        <label for="fname">{{__( 'Birth Place')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                        <input type="text" name="fname" id="" class="form-control mb-3" placeholder="{{__( 'Birth Place')}}..">
                                    </div>
                                    <!--/End of Personal Information -->
                                </div>
                            </div>
                            <!-- end form-group -->
                            <input type="submit" value="{{__('submit')}}" class="btn btn-secondary btn-block text-white bg-dark">
                    </form>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end of row -->
        </div>
@endsection