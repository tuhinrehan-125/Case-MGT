@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Drop Case</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/superadmin/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Drop Case</li>
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
                                <h3 class="card-title text-bold">Drop Case List</h3>
                            </div>
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
                                        <button input="submit" class="btn btn-info filter-data-case" disabled><i class="fa fa-search" aria-hidden="true"></i> Find</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive">

                            <div class=" text-center d-none" id="preloader">
                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                                </div>
                                <div id="tag_container">
                                    @include('superadmin.pages.case.drop-table')
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
            </div>

    </div>

    <!--Details Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Case Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <tbody>

                        <tr>
                            <th>Crime Type:</th>
                            <td><span id="crime_type"></span></td>
                        </tr>
                        <tr>
                            <th>Vehicle Type</th>
                            <td><span id="vehicle_type"></span></td>
                        </tr>
                        <tr>
                            <th>Victim Type</th>
                            <td><span id="victime_type"></span></td>
                        </tr>
                        <tr>
                            <th>Paper Type:</th>
                            <td><span id="paper_type"></span></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="modal-footer"> </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(".datepickeoff").datepicker({dateFormat: 'dd/mm/yy'});

        $(document).ready(function() {
            $(document).ready(function() {
                $(document).on('click', '.view-data', function(e) {
                    e.preventDefault();
                    $('.assign_form_class').trigger('reset');
                    var id=$(this).data('id');
                    $.ajax({
                        url: 'superadmin-case-details/'+id,
                        type: 'GET',
                        data: { id: id },
                        success: function(response)
                        {
                            console.log(response)
                            $('#crime_type').html(response[1])
                            $('#victime_type').html(response[0].victim);
                            $('#vehicle_type').html(response[0].vehical_type);

                            var paper=JSON.parse(response[0].paper)
                            $.each(paper, function(key, value){
                                $('#paper_type').html(value)
                            });
                        }
                    });

                })
            });
            $(document).ready(function() {
                datatable();
                function display(){
                    $("#drop-table tbody").css("opacity", ".5")
                        $("#preloader").addClass('d-block')
                        $("#preloader").removeClass('d-none')
                }
                function datatable(){
                    $("#drop-table").DataTable({
                        pageLength: 50,
                        "paging":   false,
                        searching:false,
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

                $(document).ready(function(){
                    $(document).on('click', '.pagination a',function(event)
                    {
                        display();
                        event.preventDefault();

                        $('li').removeClass('active');
                        $(this).parent('li').addClass('active');

                        var myurl = $(this).attr('href');
                        var page=$(this).attr('href').split('page=')[1];
                        getData(page);
                    });

                });

                function getData(page,field_name='', query=''){
                    display();
                    $.ajax(
                    {
                        url: '?page=' + page,
                        type: "get",
                        datatype: "html",
                        data: {field_name: field_name, value: query},

                    }).done(function(data){
                    $("#preloader").addClass('d-none')
                    $("#preloader").removeClass('d-block')
                        $("#tag_container").empty().html(data);
                        location.hash = page;
                        datatable();

                    $("#forward-table-data tbody").removeClass('d-none')

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
        });
    </script>
@endsection
