<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> @yield('title') </title>

    @include('systemadmin.partials.css')

    @yield('css')

</head>

<body>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('systemadmin.partials.header')
        @include('systemadmin.partials.sideber')
        @yield('content')
        @include('systemadmin.partials.footer')

    </div>
    <script>
            @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"


        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
            case 'towl':
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Successfull',
                    showConfirmButton: false,
                    timer: 3300
                })
                break;
        }
        @endif
    </script>
     @include('systemadmin.partials.js')

     @yield('js')

</body>
</html>
