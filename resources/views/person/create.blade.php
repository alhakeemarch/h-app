@extends('layouts.app') 
@section('title','Create view') 
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-3">
            <h5 class="card-header">{{ __('Registration') }} of {{$persontype}} 2/2</h5>
            <div class="card-body">
                <!-- Nmae -->

                <form action="{{ url('person') }}" method="POST">
                    @csrf
                    <div class="card-header text-white bg-dark mb-3 rounded">
                        {{__('Name')}}:
                    </div>
                    <div class="form-group">
                        <label for="fname" class="d-block">{{__('the name')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                        <div class="form-row mb-3">
                            <div class="col-md">
                                <input type="text" name="ar_name1" id="" class="form-control" placeholder="{{ __('name1') }}.." required onkeypress="onlyArabicString(event)"
                                    pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                            </div>
                            <div class="col-md">
                                <input type="text" name="ar_name2" id="" class="form-control" placeholder="{{__( 'name2')}}.." onkeypress="onlyArabicString(event)"
                                    pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                            </div>
                            <div class="col-md">
                                <input type="text" name="ar_name3" id="" class="form-control" placeholder="{{__( 'name3')}}.." onkeypress="onlyArabicString(event)"
                                    pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                            </div>
                            <div class="col-md">
                                <input type="text" name="ar_name4" id="" class="form-control" placeholder="{{__( 'name4')}}.." onkeypress="onlyArabicString(event)"
                                    pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                            </div>
                            <div class="col-md">
                                <input type="text" name="ar_name5" id="" class="form-control" placeholder="{{__( 'name5')}}.." required onkeypress="onlyArabicString(event)"
                                    pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                            </div>
                        </div>
                        <!-- end form-row -->
                        <div class="form-group">
                            <label for="fname" class="d-block">{{__('The Name in English')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                            <div class="form-row mb-3">
                                <div class="col-md">
                                    <input type="text" name="en_name1" id="" class="form-control" placeholder="{{ __('name1') }}.." onkeypress="onlyEnglishString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="en_name2" id="" class="form-control" placeholder="{{__( 'name2')}}.." onkeypress="onlyEnglishString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="en_name3" id="" class="form-control" placeholder="{{__( 'name3')}}.." onkeypress="onlyEnglishString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="en_name4" id="" class="form-control" placeholder="{{__( 'name4')}}.." onkeypress="onlyEnglishString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="en_name5" id="" class="form-control" placeholder="{{__( 'name5')}}.." onkeypress="onlyEnglishString(event)"
                                        pattern=".{2,}" title="{{__('minimum 2 letters')}}">
                                </div>
                            </div>
                            <!-- end form-row -->
                            <!-- end of  English Name -->
                            <!-- end of Main Information -->

                            <!-- Nationaltiy Information -->
                            <div class="card-header text-white bg-dark mb-3 rounded">
                                Identity Information:
                            </div>

                            @if (substr($national_id,0,1)=='1')
                            <div class="form-row mb-3">
                                <div class="col-md">
                                    <label for="national_id">{{__( 'nId')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                    <input type="text" onkeypress="onlyNumber(event)" maxlenght="10" name="national_id" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.."
                                        value="{{$national_id}}" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}"
                                        disabled>
                                </div>
                                <div class="col-md">
                                    <label for="fname">{{__( 'Hafizah Number')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                    <input type="text" name="hafizah_number" id="" class="form-control mb-3" placeholder="{{__( 'Hafizah Number')}}..">
                                </div>
                                                                
                                <div class="col-md">
                                    <label for="fname">{{__( 'National ID Issue Date')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                    <input type="text" name="national_id_issue_date" id="" class="form-control mb-3" placeholder="{{__( 'dd/mm/yyyy')}}.." pattern="\d{1,2}/\d{1,2}/\d{4}">
                                </div>


                                <div class="col-md">
                                    <label for="fname">{{__( 'National ID Issue Place')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                    <input type="text" name="national_id_issue_place" id="" class="form-control mb-3" placeholder="{{__( 'National ID Issue Place')}}..">
                                </div>

                            </div>

                            <h1>you are saudi</h1>

                            @else
                            <h1>you are Agnabi</h1>
                            @endif

                            <div class="form-row mb-3">
                                <div class="col-md">
                                    <label for="national_id">{{__( 'nId')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                    <input type="text" onkeypress="onlyNumber(event)" maxlenght="10" name="national_id" class="form-control mb-3" placeholder="{{__( 'nIdNumber')}}.."
                                        value="{{$national_id}}" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                                </div>
                                <div class="col-md">
                                    <label for="fname">{{__( 'phoneNo')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                    <input type="text" name="phone_no" id="" class="form-control mb-3" placeholder="{{__( 'phoneNo')}}.." aria-describedby="helpId"
                                        onkeypress="onlyNumber(event)" maxlength="10" pattern=".{10,}" required title="{{__('must be 10 digits')}}">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>
                            </div>





                            <div class="form-row mb-3">
                                <div class="col-md">
                                    <label for="fname">{{__( 'Nationaltiy')}} <span class="small text-danger">({{__('required')}})</span> :</label>
                                    <select name="nationaltiy" class="form-control" required>
                                            <option selected value="">{{__( 'Nationaltiy')}}..</option>
                                            @foreach ($nationalitiesArr as $key => $value)
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
                                    <input type="text" name="hafizah_number" id="" class="form-control mb-3" placeholder="{{__( 'Hafizah Number')}}..">
                                </div>
                                <div class="col-md">
                                    <label for="fname">{{__( 'National ID Issue Date')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                    <input type="date" name="national_id_issue_date" id="" class="form-control mb-3" placeholder="{{__( 'National ID Issue Date')}}..">
                                </div>
                                <div class="col-md">
                                    <label for="fname">{{__( 'National ID Issue Place')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                    <input type="text" name="national_id_issue_place" id="" class="form-control mb-3" placeholder="{{__( 'National ID Issue Place')}}..">
                                </div>
                                <!-- End of Nationaltiy Information -->
                            </div>

                            <!-- Personal Information -->
                            <div class="card-header text-white bg-dark mb-3 rounded">
                                Personal Information:
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md">
                                    <label for="fname">{{__( 'Birth Date')}} <span class="small text-muted">({{__('optional')}})</span> :</label>
                                    <input type="text" name="birth_date" id="" class="form-control mb-3" placeholder="{{__( 'Birth Date')}}..">
                                </div>
                                <div class="col-md">
                                    <label for="fname">{{__( 'Birth Place')}} <span class="small text-muted">({{__('optional')}})</span>:</label>
                                    <input type="text" name="birth_place" id="" class="form-control mb-3" placeholder="{{__( 'Birth Place')}}..">
                                </div>
                                <!--/End of Personal Information -->
                            </div>
                        </div>
                        <!-- end form-group -->
                        <input type="submit" value="{{__('submit')}}" class="btn btn-secondary btn-block text-white bg-dark my-2">
                </form>
                </div>
                <!-- ///////////////////////////////-->
                @if ($errors->any())
    @include('layouts.errors') @endif
                <!-- ///////////////////////////////-->
            </div>
            <!-- end card-body -->
        </div>
        <!-- end of card -->
    </div>
    <!-- end of col -->
</div>
<!-- end of row -->
@endsection