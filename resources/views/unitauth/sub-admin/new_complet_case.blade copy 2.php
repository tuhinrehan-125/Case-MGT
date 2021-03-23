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
                                <h3 class="card-title text-danger text-bold">New Case List</h3>
                            </div>
                            <!-- /.card-header -->
                            <!---===============================Filtering===============================================--->
                            <div class="card-header text-center">
                                <div class="form-row">
                                    <label>From</label>
                                    <div class="col">
                                        <input type="text" name="from_date" class="form-control datepickeoff from_date">
                                    </div>
                                    <label>To</label>
                                    <div class="col">
                                        <input type="text" name="to_date" class="form-control datepickeoff to_date">
                                    </div>
                                    <div class="col">
                                        <button input="submit" class="btn btn-danger filter-data-case"><i class="fa fa-search" aria-hidden="true"></i> Show collection</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <form action="#" id="forward_case_form" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <button  class="btn btn-sm btn-danger" name="buttton" value="forward">
                                        Forward All &nbsp; <i class="fa fa-forward" aria-hidden="true"></i></button>
                                    &nbsp;
{{--                                    <button type="submit" class="btn btn-sm btn-danger" name="buttton" value="print">--}}
{{--                                        Print &nbsp; <i class="fa fa-print" aria-hidden="true"></i></button>--}}
                                    <br>
                                    <br>
                                    <div>
                                        @error('chk')
                                        <span class="text-danger">Select at lest one Case<!--{{ $message }}--></span>
                                        @enderror
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="select-all" onchange="checkAll(this)" name="chk[]">
                                        <label for="select-all"></label>
                                    </div>
                                    <label for="checkboxSuccess3">Select all &nbsp;</label>
                                    <div class=" table-responsive">
                                        <table id="newcase-complete-subadmin" class="table table-striped table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th data-priority="1">Sl.</th>
                                                <th data-priority="2">Case No.</th>
                                                <th>Select</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th >Vehicle Reg.No</th>

                                                <th>Date of offence</th>
                                                <th>Time of offence</th>
                                                <th>Date Disposal</th>
                                                <!--<th>Time Diposal</th>-->
                                                <th>Location</th>

                                                <th>Vehicle Type</th>
                                                <th >Case Type</th>
                                                <th>Victim Type</th>
                                                <th>Name of MP</th>
                                                <th >Paper Ceased</th>
                                                <th data-priority="3">Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th data-priority="1">Sl.</th>
                                                <th data-priority="2">Case No.</th>
                                                <th>Select</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th >Vehicle Reg.No</th>

                                                <th>Date of offence</th>
                                                <th>Time of offence</th>
                                                <th>Date Disposal</th>
                                                <!--<th>Time Diposal</th>-->
                                                <th>Location</th>

                                                <th>Vehicle Type</th>
                                                <th >Case Type</th>
                                                <th>Victim Type</th>
                                                <th>Name of MP</th>
                                                <th >Paper Ceased</th>
                                                <th data-priority="3">Actions</th>
                                            </tr>
                                            </tfoot>
                                </form>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" class="edit-case subadmin-new-case-edit-submit" method="POST">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" class="form-control case_no" value="" name="case_no" placeholder="Case No">
                        <input type="hidden" class="form-control case_id" value="" name="id">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" class="form-control victim_name" value="" name="victim_name"
                                           id="inputEmail3" placeholder="Name"></td>
                            </tr>
                            <tr>
                                <th>Mobile No.</th>
                                <td><input type="number" class="form-control victim_mb" value="" name="victim_mb"></td>
                            </tr>
                            <tr>
                                <th>Vehicle Reg.No</th>
                                <td><input type="text" class="form-control vehical_reg" value="" name="vehical_reg">
                                </td>
                            </tr>
                            <tr>
                                <th>Name Of MP</th>
                                <td>
                                    <select class="form-control selectdata mp-data" name="id_mp">
                                        <option value="" selected>Select MP Name</option>
                                        @forelse($mpdata as $mp)
                                            @if($mp->unit_role_id!=1)
                                                <option value="{{$mp->id}}">{{$mp->name}} </option>
                                            @endif
                                        @empty
                                        @endforelse
                                        <option value="other">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Date of Offence</th>
                                <td><input type="text" class="form-control datepickeoff date_off" name="date_off"
                                           value=""></td>
                            </tr>
                            <tr>
                                <th>Time of Offence</th>
                                <td><input type="time" class="form-control time_off" name="time_off" value=""></td>
                            </tr>
                            <tr>
                                <th>Date of Diposal</th>
                                <td><input type="text" class="form-control datepickeoff date_disposal"
                                           name="date_disposal" value=""></td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>
                                    <select class="form-control selectdata loc" name="loc" id="">
                                        <option value="" selected>Select location</option>
                                        @forelse($location as $loc)
                                            <option value="{{$loc->location}}">{{$loc->location}}</option>
                                        @empty
                                        @endforelse
                                        <option value="10000">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Vehicle Type</th>
                                <td>
                                    <select class="form-control selectdata  vehical_type" name="vehical_type">
                                        <option value="" selected>Select Vehicle</option>
                                        @forelse($vehicles as $vehicle)
                                            <option value="{{$vehicle->vehicle}}">{{$vehicle->vehicle}}</option>
                                        @empty
                                        @endforelse
                                        <option value="v_other">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Case Type</th>
                                <td>
                                    <div class="select2-purple">
                                        <select class="form-control selectdata crime_type" name="crime_type[]"
                                                multiple="multiple" data-placeholder="Select a State"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            <option value="" selected>Select Crime</option>
                                            @foreach($crimes as $crime)
                                                <option value="{{$crime->id ?? ''}}"> {{$crime->crime ?? ''}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <th>Victim Type</th>
                                <td>
                                    <select class="form-control select2bs4 victim" name="victim">
                                        <option value="" selected>Select</option>
                                        <option class="option" value="driver">Driver</option>
                                        <option class="option" value="owner">Owner</option>
                                        <option class="option" value="others">Others</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Paper Ceased</th>
                                <td>
                                    <div class="select2-purple">
                                        <select class="selectdata paper" name="paper[]" multiple="multiple"
                                                data-placeholder="Select a State"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            <option value="" selected>Select Paper</option>
                                            @foreach($papers as $paper)
                                                <option value="{{$paper->paper ?? ''}}">{{$paper->paper ?? ''}}</option>
                                            @endforeach
                                        </select>
                                        <!-- <br>
                                        <input type="text" class="form-control paper_number" name="paper_number" value="" placeholder="Number"> -->
                                    </div>
                                </td>
                            </tr>
                            </thead>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    console.log(i)
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }
        $(document).ready(function() {
            filterData();
            function filterData(date_to='', date_from='') {
                var table = $('#newcase-complete-subadmin').DataTable({
                    pageLength: 50,
                    processing: true,
                    language: {
                        processing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span> '
                    },

                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 3, 4, 5, 7, 9, 10, 11, 13] //Your Colume value those you want
                            }
                        }
                    ],
                    serverSide: true,
                    ajax: {
                        url: "{{ route('unitauth.new-complete.subadmin') }}",
                        data: {date_to: date_to, date_from: date_from},

                    },
                    columns: [

                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'case_no', name: 'case_no'},
                        {data: 'select', name: 'select'},
                        {data: 'victim_name', name: 'victim_name'},
                        {data: 'victim_mb', name: 'victim_mb'},
                        {data: 'vehical_reg', name: 'vehical_reg'},
                        {data: 'date_off', name: 'date_off'},
                        {data: 'time_off', name: 'time_off'},
                        {data: 'date_disposal', name: 'date_disposal'},
                        {data: 'loc', name: 'loc'},
                        {data: 'vehical_type', name: 'vehical_type'},
                        // { data: 'vehical_type', name: 'vehical_type'},
                        {data: 'case_type', name: 'case_type'},
                        {data: 'victim', name: 'victim'},
                        // { data: 'unitauth.name', name: 'unitauth'},
                        {data: 'mp', name: 'mp'},
                        {data: 'paper', name: 'paper'},
                        {data: 'edit', name: 'edit'}
                    ]

                });
            }

            $(document).on('click','.filter-data-case',function (e) {
                e.preventDefault();
                var date_to=$('.to_date').val();
                var date_from=$('.from_date').val();
                $('#newcase-complete-subadmin').DataTable().destroy();
                filterData(date_to, date_from)

            })
            $('.subadmin-new-case-edit-submit').on('submit', function(event){
                // console.log('paise');
                event.preventDefault();
                $.ajax({
                    url:"{{route('unitauth.case_update')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        if (data.success){
                            $('#newcase-complete-subadmin').DataTable().draw();
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                            toastr.success('Update Success full ','Success');
                            $('#newcase-subadmin').DataTable().ajax.reload();
                        }else{
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });
            });

            $('#forward_case_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{route('unitauth.caseforward')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        console.log(data)
                        if (data.success){
                            $('#newcase-complete-subadmin').DataTable().draw();
                            toastr.success('Case forward Success full ','Success');
                        }else{
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });
            });
            $(document).on('click','.btn-forward',function (e) {
                e.preventDefault()
                var id=$(this).data('id');
                console.log(id)
                $.ajax({
                    url: 'caseforward_single/'+id,
                    type: 'GET',
                    data: { id: id },
                    success:function(data)
                    {
                        $('#newcase-complete-subadmin').DataTable().draw();
                        toastr.success('Forward Success full ','Success');
                        // console.log(data)
                        // if (data.success){
                        //
                        // }else{
                        //     toastr.error('You have something wrong','Error')
                        // }
                    }
            })
        });
        });
    </script>
@endsection
