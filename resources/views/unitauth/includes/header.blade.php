<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashboard | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('/frontend/assets/images/favicon.png')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/backend/plugins/fontawesome-free\css\all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/backend/dist/css/adminlte.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/backend/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <!--Toster-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/backend/plugins\select2\css\select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
      #livestream_scanner  video {
        height: 250px;
        width: 200px;
    }
    #livestream_scanner .modal-dialog,
    #livestream_scanner .modal-content {
        height: 80%;
    }

    #livestream_scanner .modal-body {
        max-height: calc(100% - 120px);
        overflow-y: scroll;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #5a5e63;
      color: #fff;
  }
  .page-item.active .page-link {
      z-index: 1;
      color: #fff;
      background-color: #5a5e63;
      border-color: #a8aaab;
  }
    </style>
    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
