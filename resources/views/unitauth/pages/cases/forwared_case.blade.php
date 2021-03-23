@extends('unitauth.layout.airforce-master')
@section('title', 'Forward Cases')
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
              <li class="breadcrumb-item"><a href="#" class="text-danger">Home</a></li>
              <li class="breadcrumb-item active">Forward Case List</li>
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
              <h3 class="card-title text-bold text-danger">Forward Case List</h3>
            </div>


        <!---===============================Filtering===============================================--->
        <div class="card-header text-center">
            <div class="form-row">
                <label>Select Field</label>
                <div class="col-md-3 col-sm-6">
                   <select name="field_name" class="form-control" id="field_name">
                   <option value="">Select</option>
                   <option value="case_no">Case No</option>
                   <option value="victim_mb">Phone Number</option>
                   <option value="vehical_reg">Vehicle reg no</option>
                   <option value="victim_name">Victime Name</option>

                   </select>
                </div>
                <label>Search Keyword</label>
                <div class="col-md-3 col-sm-6">
                    <input type="text" name="query" id="query" class="form-control" readonly>
                </div>
                <div class="col-md-3 col-sm-6">
                    <button input="submit" class="btn btn-sm btn-secondary filter-data-case" disabled><i class="fa fa-search" aria-hidden="true"></i> Find</button>
                </div>
            </div>
        </div>
          </div>
          <div class="card-body table-responsive">
            <div class=" text-center d-none" id="preloader">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                </div>
                <div id="tag_container">
                @include('unitauth.pages.cases.forwardcase-table')
                </div>
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
    function getData(page,field_name='', query=''){
       display()
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            // data: {date_to: date_to, date_from: date_from},

            data: {field_name: field_name, value: query},

        }).done(function(data){
            removePre()
            $("#tag_container").empty().html(data);
            location.hash = page;
            datatable();
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
    $(document).on('keyup','#query',function (e) {
                e.preventDefault();
                display();
                var field=$('#field_name').val();
                var query=$('#query').val();
                getData(page='1',field, query)
                })
                $(document).on('click','.filter-data-case',function (e) {
                e.preventDefault();
                display();
                var field=$('#field_name').val();
                var query=$('#query').val();
                getData(page='1',field, query);
                })
                $("#field_name").on('change',function(){
                    var field=$('#field_name').val();
                    var query=$('#query').val();
                    if(query!=''){
                        getData(page='1',field, query)
                    }
                    if(field!=''){
                        $("#query").attr('readonly',false)
                        $(".filter-data-case").attr('disabled',false)
                    }else{
                        $("#query").attr('readonly',true)
                        $(".filter-data-case").attr('disabled',true)
                    }
                })
});
$(".datepickeoff").datepicker({dateFormat: 'dd-mm-yy'});
</script>
@endsection
