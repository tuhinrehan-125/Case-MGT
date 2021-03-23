@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                            <h3 class="card-title text-bold">{{$dateFrom ?? '' }} to {{$dateTo ?? '' }} report</h3>
                            <br>
                            <hr>
                            <form  action="{{route('superadmin.custom.report')}}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <label>From</label>
                                        <div class="col">
                                            <input type="text" value="{{$dateFrom ?? '' }}" name="from_date" class="form-control datepickeoff from_date" placeholder="Example dd-mm-yyyy">
                                        </div>
                                        <label>To</label>
                                        <div class="col">
                                            <input type="text" value="{{$dateTo ?? '' }}" name="to_date" class="form-control datepickeoff to_date" placeholder="Example dd-mm-yyyy">
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

                        <button class="btn btn-default btn-primary" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true" style="    font-size: 17px;"> Print</i></button>
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
                        @include('superadmin.pages.reports.custom-report-table')
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
</script>
@endsection
