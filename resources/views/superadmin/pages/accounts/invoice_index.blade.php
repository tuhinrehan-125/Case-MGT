@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Invoice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/superadmin/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
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
                            <h3 class="card-title text-bold">Invoice List</h3>
                        </div>

                        <!---===============================Filtering===============================================--->
                        <div class="card-header text-center">
                                <div class="form-row">
                                   <div class="col-sm-12 col-md-3 col-3">
                                       <select name="unit" class="form-control" id="unit_id">
                                           <option value="">Select</option>
                                           @foreach($unit as $udata)
                                               <option value="{{$udata->id}}">{{$udata->name ?? ''}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="col-sm-12 col-md-3 col-3">
                                       <input type="text" class="form-control date-of" name="date_to" id="date_to" placeholder="Date To">
                                   </div>
                                   <div class="col-sm-12 col-md-3 col-3">
                                       <input type="text" class="form-control date-of" name="date_from" id="date_from" placeholder="Date From">
                                   </div>
                                    <div class="col-sm-12 col-md-3 col-3">
                                        <button type="submit" id="click" class="btn btn-sm btn-success"><i class="fa fa-search" aria-hidden="true"></i>Filter</button>
                                    </div>
                                </div>
                        </div>
                        <!---===============================Filtering===============================================--->

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                        <div class=" text-center d-none" id="preloader">
                                <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                            </div>
                            <div id="tag_container">
                                @include('superadmin.pages.accounts.invoice-table')
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                </div>
            </div>

        </section>
    </div>

    <!--Details Modal -->
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <th>Name:</th>
                            <td><span id="v-name"></span></td>
                        </tr>

                        <tr>
                            <th>Mobile:</th>
                            <td><span id="v-mb"></span></td>
                        </tr>

                        <tr>
                            <th>Vehicle Reg No:</th>
                            <td><span id="v-reg"></span></td>
                        </tr>

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
        $(".date-of").datepicker({dateFormat: 'yy-mm-dd'});
        $(document).ready(function () {

            $(document).ready(function() {
                datatable();
                function display(){
                    $("#invoice-table tbody").css("opacity", ".5");
                        $("#preloader").addClass('d-block')
                        $("#preloader").removeClass('d-none')
                }
                function datatable(){
                    $("#invoice-table").DataTable({
                        pageLength: 50,
                        "paging":   false,
                    });
                }
                $(document).on('click','#click',function () {
                var unit=$('#unit_id').val();
                var date_to=$('#date_to').val();
                var date_from=$('#date_from').val();

                console.log(date_from);
                $('#account-table').DataTable().destroy();
                getData(page='1',unit,date_to,date_from)
            })
            $(document).on('click','.filter-data-case',function (e) {
            e.preventDefault();
             var unit=$('#unit_id').val();
                var date_to=$('#date_to').val();
                var date_from=$('#date_from').val();

                getData(page='1',unit,date_to,date_from)
        })
        $(document).on('change','#date_to',function(e){
            e.preventDefault();
                var unit=$('#unit_id').val();
                var date_to=$('#date_to').val();
                var date_from=$('#date_from').val();
                getData(page='1',unit,date_to,date_from)
        })
        $(document).on('change','#date_from',function(e){
            e.preventDefault();
                var unit=$('#unit_id').val();
                var date_to=$('#date_to').val();
                var date_from=$('#date_from').val();
            if(date_from!=''){
                getData(page='1',unit,date_to,date_from)
            }
        })
        $(document).on('change','#unit_id',function(e){
            e.preventDefault();
                var unit=$('#unit_id').val();
                var date_to=$('#date_to').val();
                var date_from=$('#date_from').val();
                console.log(unit)
            if(unit!=''){
                getData(page='1',unit,date_to,date_from)
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
                function getData(page,unit='',date_to='', date_from=''){
                    display();
                    $.ajax(
                    {
                        url: '?page=' + page,
                        type: "get",
                        datatype: "html",
                        data:{unit:unit, date_to:date_to, date_from:date_from},

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
            });

        })

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
                        $('#v-mb').html(response[0].victim_mb);
                        $('#v-name').html(response[0].victim_name);
                        $('#victime_type').html(response[0].victim);
                        $('#vehicle_type').html(response[0].vehical_type);
                        $('#v-reg').html(response[0].vehical_reg);

                        var paper=JSON.parse(response[0].paper)
                        $.each(paper, function(key, value){
                            $('#paper_type').html(value)
                        });
                    }
                });

            })
        });
    </script>
@endsection
