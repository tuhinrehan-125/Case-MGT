@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Report-Current</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/superadmin/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Report-Current</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                <div class="col-md-12 col-sm-12">

                    <div class="card ">
                        <div class="card-header text-center">
                            <h3 class="card-title text-bold">{{date('M Y')}} Report</h3>
                            <br>
                            <hr>
                                <form  action="{{route('superadmin.custom.report')}}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <label>From</label>
                                        <div class="col">
                                        <input type="text" value="{{date('Y-m-d')}}" name="from_date" class="form-control datepickeoff from_date" placeholder="Example dd-mm-yyyy">
                                        </div>
                                        <label>To</label>
                                        <div class="col">
                                            <input type="text" value="{{date('Y-m-d')}}" name="to_date" class="form-control datepickeoff to_date" placeholder="Example dd-mm-yyyy">
                                        </div>
                                        <div class="col">
                                            <button input="submit" class="btn btn-success filter-data-case"><i class="fa fa-search" aria-hidden="true"></i> Show collection</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                        </div>

                        <!---===============================Filtering===============================================--->
                        <div class="card-header text-rigth">

                        <button class="btn btn-default btn-primary printBtn" onclick="printDiv('printableArea')" disabled><i class="fa fa-print" aria-hidden="true" style="    font-size: 17px;"> Print</i></button>
                        </div>
                        <!---===============================Filtering===============================================--->

                        <!-- /.card-header -->
                        <div class="card-body table-responsive" id="printableArea">
                           <div class="d-none" id="header">
                                <div class="text-center  mx-auto">
                                    <img src="{{asset('/frontend/image/can_logo.png')}}" class="v-hidden" alt="logo" height="50px" width="50px">
                                </div>
                                <div class="text-center mx-auto">
                                    <h3><center class="text-uppercase">Cantonment Board,Dhaka</center></h3>
                                </div>
                           </div>


                           <div class="card-body">
                            <div class=" text-center" id="preloader">
                                <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                            </div>
                            <div id="table-body"></div>
                           </div>
                        {{-- @include('superadmin.pages.reports.current-table') --}}
                        </div>
                </div>

                </div>
            </div>

        </section>
    </div>

@endsection
@section('js')
<script>

function printDiv(divName) {
    $("#header").removeClass('d-none')
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
$(".datepickeoff").datepicker({dateFormat: 'yy-mm-dd'});
$(document).ready(function(){
    $.ajax({
        type: "get",
        url: "{{route('superadmin.current.report')}}",
        success: function (response){
            $("#table-body").html(response);
            $("#preloader").addClass('d-none');
            $(".printBtn").attr('disabled',false);

        }
        })
    });
</script>
@endsection
