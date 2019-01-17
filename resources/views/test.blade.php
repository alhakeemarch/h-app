<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css" integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz"
        crossorigin="anonymous">
    <link rel="icon" href="logo.png">

    <title>js-test</title>
</head>

<body class="bg-secondary">

    <div class="container">
        <div class="card">

            <div class="card-header text-center">
                <img class="mx-auto" src="logo.png" alt="LOGO" style="width:60px;">
                <span>Test App برنامج إضافة العملاء</span>
            </div><!-- end card-header -->

            <div class="card-body">
                <!-- <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p> -->
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="fname" class="d-block">Name الاسم:</label>

                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="fname" id="" class="form-control" placeholder="Frist Name..الإسم الأول"
                                    required>
                            </div>
                            <div class="col">
                                <input type="text" name="name2" id="" class="form-control" placeholder="Second Name..الإسم الثاني">
                            </div>
                            <div class="col">
                                <input type="text" name="name3" id="" class="form-control" placeholder="Third Name.. الإسم الثالث">
                            </div>
                            <div class="col">
                                <input type="text" name="name4" id="" class="form-control" placeholder="Fourth Name..الإسم الرابع">
                            </div>
                            <div class="col">
                                <input type="text" name="name5" id="" class="form-control" placeholder="Last Name..الإسم الأخير"
                                    required>
                            </div>
                        </div><!-- end form-row -->
                        <label for="fname">ID No رقم الهوية:</label>
                        <input type="text" name="fname" id="" class="form-control" placeholder="ID.. رقم الهوية" aria-describedby="helpId">
                        <label for="fname">Phone NO رقم الجوال:</label>
                        <input type="text" name="fname" id="" class="form-control" placeholder="Phone NO.. رقم الجوال" aria-describedby="helpId">
                        <!-- <small id="helpId" class="text-muted">Help text</small> -->
                    </div><!-- end form-group -->
                    <input type="submit" value="submit" class="btn btn-secondary btn-block" >
                </form>
            </div><!-- end card-body -->
            <div class="card-footer text-muted">
                Footer
            </div><!-- end card-footer -->
        </div><!-- end card -->
    </div>
    <script src="main.js"></script>
</body>

</html>