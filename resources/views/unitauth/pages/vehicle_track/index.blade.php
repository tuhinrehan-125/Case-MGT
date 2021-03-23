@extends('unitauth.layout.airforce-master')
@section('title', 'Vehicale Track')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Vehicale Track</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Vehicale track</li>
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

                    <h3 class="card-title text-bold text-center m-3">Vehicale track list</h3>
                    <div class="card-header text-center">
                    </div>

                        <!---===============================Filtering===============================================--->

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">

                        <div class=" text-center d-none" id="preloader">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                        </div>
                        <div id="tag_container">
                            @include('unitauth.pages.vehicle_track.table')
                        </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                </div>
            </div>

        </section>

    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('#accept-table').DataTable();
    })
</script>
@endsection
