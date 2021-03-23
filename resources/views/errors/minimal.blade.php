<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="{{asset('/backend/plugins/fontawesome-free\css\all.min.css')}}">

     <link rel="icon" type="image/png" href="{{asset('/frontend/assets/images/favicon.png')}}">
     <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{asset('/backend/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .code {
        border-right: 2px solid;
        font-size: 26px;
        padding: 0 15px 0 15px;
        text-align: center;
    }

    .message {
        font-size: 18px;
        text-align: center;
    }
    .content-wrapper {
    background: white;
    }
</style>
</head>
<body >
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
        <div class="flex-center position-ref full-height">
        <div class="error-page ">
            <h2 class="headline text-danger">@yield('code')</h2>
            <div class="error-content" style="margin-bottom: -200px">
                <div class="error-content mt-5">
                    <div class="message" style="padding: 10px;">
                        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! @yield('message').</h3>
                        <a href="{{url('/')}}" class="btn btn-sm btn-primary"><i class="fas fa-backward"></i> Back </a>
                    </div>
                </div>
            </div>
          </div>
        </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('superadmin.partials.footer')
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/backend/dist/js/demo.js')}}"></script>
</body>
</html>
