<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Case Management Software</title>
    <!--<title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>-->

    <link rel="icon" type="image/png" href="{{asset('/frontend/assets/images/favicon.png')}}">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
     <!-- Stylesheets -->
     <link rel="stylesheet" href="{{asset('/frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="{{asset('/frontend/style2.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/superadmin/style.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/responsive.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
    .lr-section .left-sidebar {
        width: 300px;
        border-left: 1px solid #ddd;
        box-sizing: border-box;
        padding-left: 15px;
        padding-right: 54px;
        text-align-last: left;
    }

    .text-9 {
        margin-top: 20px;
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 640px) {
        .text-9 {
            margin-top: 0px;
        }
    }

    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) {
        .text-9 {
            margin-top: 0px;
        }
    }
</style>
</head>
<body>
    <header class="site-header">
        <div class="logo-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 logo-menu">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <div class="row d-flex justify-content-center" justify="center">
                                    <div class="col-md-3 d-flex justify-content-center">
                                        <img src="{{asset('/frontend/assets/images/logo.png')}}" alt="logo">
                                    </div>
                                    <div class="com-md-9 text-9">
                                        <span class="site-title">
                                            <strong>
                                                ক্যান্টনমেন্ট বোর্ড, ঢাকা
                                            </strong>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="contact-info-1">
                            <div class="row">
                                <div class="contact-content">
                                    <div class="col-md-12">
                                        <span><i class="fa fa-phone"></i> Tel: 02-9835565 (T&T), 7210 (Army)</span><br>
                                    </div>
                                    <div class="col-md-12">
                                        <span><i class="fa fa-envelope"></i> Email: ceocbd@gmail.com</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <span><i class="fa fa-globe"></i> Web: http://www.dcb.gov.bd/</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <span><i class="fa fa-map-marker"></i> Dhaka Cantonment, Dhaka-1206</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Scripts -->
    <script src="{{asset('/js/app.js')}}"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
