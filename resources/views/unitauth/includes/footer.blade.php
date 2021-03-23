
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="http://ennvisio.com">Ennvisio Digital Private Limited</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block text-uppercase">
      <b>Cantonment Board</b>
    </div>
  </footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <h3> test</h3>
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="{{asset('/backend/plugins\select2\js\select2.full.min.js')}}"></script>
<script src="{{asset('/backend/js/backend.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
<script type="text/javascript" src="{{asset('backend/js/barcode.js')}}"></script>
<script>
$(document).ready(function(e){
    $.ajax({
            url: '{{route('unitauth.sidebar.count')}}',
            type: 'GET',
            success: function(response)
            {
               $('.in-complete').html(response[1]);
               $('.complete').html(response[0]);
               $('.forward').html(response[2]);
               $('.all').html(response[3]);
            console.log(response);
            }
        })
})
</script>
{!! Toastr::message() !!}

@yield('js')
</body>
</html>
