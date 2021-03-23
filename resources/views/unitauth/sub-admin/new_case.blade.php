@extends('unitauth.layout.airforce-master')
@section('title', 'Dashboard')
@section('css')
@endsection
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
                            <!---===============================Filtering===============================================--->
                            <div class="card-body">

                                <div class="table-responsive">
                                    <div class=" text-center d-none" id="preloader">
                                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                                    </div>
                                    <div id="tag_container">
                                        @include('unitauth.sub-admin.newcase-table')
                                    </div>
                                </div>
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
{{--                                        <option value="" selected>Select location</option>--}}
                                        @forelse($location as $loc)
                                            <option value="{{$loc->location}}">{{$loc->location}}</option>
                                        @empty
                                        @endforelse
                                        <option value="10000">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Vehical Type</th>
                                <td>
                                    <select class="form-control selectdata  vehical_type" name="vehical_type">
{{--                                        <option value="" selected>Select Vehicle</option>--}}
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
{{--                                            <option value="" selected>Select Crime</option>--}}
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
{{--                                        <option value="" selected>Select</option>--}}
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
{{--                                            <option value="" selected>Select Paper</option>--}}
                                            @foreach($papers as $paper)
                                                <option value="{{$paper->paper ?? ''}}">{{$paper->paper}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <br>
                                        <input type="text" class="form-control paper_number" name="paper_number"
                                               value="" placeholder="Number"> --}}
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
    <script type="text/javascript">
     $(document).ready(function(){
        datatable();
        function display(){
            $("#preloader").addClass('d-block')
            $("#preloader").removeClass('d-none')
            $("#newcase tbody").css("opacity", ".5");
        }
        function removePre(){
            $("#preloader").addClass('d-none')
            $("#preloader").removeClass('d-block')
        }
        function datatable(){
            $("#newcase").DataTable({
                pageLength: 50,
                "paging":   false,
                "searching":   false,
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
                    if (data.success){
                        var currentpages = window.location.hash.replace('#', '');
                        getData(page=currentpages)
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
                        var currentpages = window.location.hash.replace('#', '');
                            getData(page=currentpages)
                        toastr.success('Forward Success full ','Success');
                    }
            })
        });
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
                           var currentpages = window.location.hash.replace('#', '');
                            getData(page=currentpages)
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                            toastr.success('Update Success full ','Success');
                        }else{
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });
            });

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
</script>
@endsection
