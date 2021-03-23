@extends('unitauth.layout.airforce-master')
@section('title', 'Dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><!--Dashboard--></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Case List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

         <div class="col-lg-12 col-12">





			<div class="card">
            <div class="card-header text-center">
              <h3 class="card-title text-danger text-bold">Forward Case List</h3>
            </div>
            <!--==========================================================Filtering============================-->
            <div class="card-header text-center">
                <div class="form-row">
                    <label>From</label>
                    <div class="col-md-3 col-sm-6">
                        <input type="text" name="from_date" class="form-control datepickeoff from_date">
                    </div>
                    <label>To</label>
                    <div class="col-md-3 col-sm-6">
                        <input type="text" name="to_date" class="form-control datepickeoff to_date">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <button input="submit" class="btn btn-sm btn-secondary filter-data-case"><i class="fa fa-search" aria-hidden="true"></i> Show collection</button>
                    </div>
                </div>
            </div>
            <!--==========================================================Filtering============================-->

            <!-- /.card-header -->
            <div class="card-body table-responsive" >
            <div id="tag_container">
            <div class=" text-center d-none" id="preloader">
              <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
              </div>
            @include('unitauth.sub-admin.forward-table')
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
         </div>

        </div>
      </div>
    </section>
 </div>


 @endsection
@section('js')
  <script type="text/javascript">
     $(document).ready(function(){
        datatable();
        function display(){
             $("#forward-case tbody").css("opacity", ".5");
                $("#preloader").addClass('d-block')
                $("#preloader").removeClass('d-none')
        }
        function removePre(){
            $("#preloader").addClass('d-none')
            $("#preloader").removeClass('d-block')
        }
        function datatable(){
            $("#forward-case").DataTable({
                pageLength: 50,
                "paging":   false,
                dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'print',
                        }
                    ],
            });
        }
        $(document).on('click','.filter-data-case',function (e) {
            e.preventDefault();
            var date_to=$('.to_date').val();
            var date_from=$('.from_date').val();
            getData(page='1',date_to, date_from)
        })
        $(document).on('change','.to_date',function(e){
            e.preventDefault();
            var date_to=$('.to_date').val();
            var date_from=$('.from_date').val();
            getData(page='1',date_to, date_from)
        })
        $(document).on('change','.from_date',function(e){
            e.preventDefault();
            var date_to=$('.to_date').val();
            var date_from=$('.from_date').val();
            if(date_to!=''){
                getData(page='1',date_to, date_from)
            }
        })
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];

            getData(page);
        });

    });
    function getData(page,date_to='', date_from='',finder=''){
        display();
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            data: {date_to: date_to, date_from: date_from},

        }).done(function(data){
          removePre()
            $("#tag_container").empty().html(data);
            location.hash = page;
            datatable();

        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
    // $('input[type=search]').keyup(function(e){
    //     var finder=$('input[type=search]').val();
    //     getData(page='1',date_to='', date_from='',finder);
    // });
});
</script>
@endsection
