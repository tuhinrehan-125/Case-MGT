@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Vehicle Tracking</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/superadmin/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Vehicle Tracking</li>
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
                        {{-- <div class="form-row">
                            <label>Select Field</label>
                            <div class="col-3">
                               <select name="field_name" class="form-control" id="field_name">
                               <option value="">Select</option>
                               <option value="case_no">Case No</option> --}}
                               {{-- <option value="victim_mb">Phone Number</option>
                               <option value="vehical_reg">Vehicle reg no</option>
                               <option value="victim_name">Victime Name</option> --}}

                               {{-- </select>
                            </div>
                            <label>Search Keyword</label>
                            <div class="col-3">
                                <input type="text" name="query" id="query" class="form-control" readonly>
                            </div>
                            <div class="col-3">
                                <button input="submit" class="btn btn-info filter-data-case" disabled><i class="fa fa-search" aria-hidden="true"></i> Find</button>
                            </div>
                        </div> --}}
                    </div>

                        <!---===============================Filtering===============================================--->

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">

                        <div class=" text-center d-none" id="preloader">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                        </div>
                        <div id="tag_container">
                            @include('superadmin.pages.vehicle_track.table')
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
