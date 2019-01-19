<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir={{ __( 'dir') }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> @if (App::isLocale('ar'))
    <link href="{{ asset('css/bootstrab_ar.css') }}" rel="stylesheet"> @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> @endif


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">


    <link rel="icon" href="{{ asset('img/logo.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="bg-secondary">

    <div class="container">
        <div class="card">

            <div class="card-header text-center">
                <img class="mx-auto" src="{{ asset('img/logo.png') }}" alt="LOGO" style="width:60px;">
                <span>{{ __('app name') }}</span>
            </div>
            <!-- end card-header -->

            <div class="card-body">
                <!-- <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p> -->
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
            <div class="card-footer text-muted d-flex justify-content-between">
                <div class="">
                    {{__('footer')}}
                </div>
                <div class="">
                    @if (App::isLocale('ar'))
                    <a href="locale/en">
                    <i class="fas fa-globe-asia fa-2x"></i>
                    </a> 
                    @else
                    <a href="locale/ar">
                    <i class="fas fa-globe-asia fa-2x"></i>
                    </a>
                    @endif
                </div>

            </div>
            <!-- end card-footer -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</body>

</html>