@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Accept Case</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('superadmin/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accept Case</li>
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

                    <h3 class="card-title text-bold text-center m-3">Accept Case List</h3>
                    <div class="card-header text-center">
                        <div class="form-row">
                            <label>Select Field</label>
                            <div class="col-md-3 col-sm-6">
                               <select name="field_name" class="form-control" id="field_name">
                               <option value="">Select</option>
                               <option value="case_no">Case No</option>
                               {{-- <option value="victim_mb">Phone Number</option>
                               <option value="vehical_reg">Vehicle reg no</option>
                               <option value="victim_name">Victime Name</option> --}}

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

                        <!---===============================Filtering===============================================--->

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">

                        <div class=" text-center d-none" id="preloader">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                        </div>
                        <div id="tag_container">
                            @include('superadmin.pages.accept.accept-table')
                        </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

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
            <!-- Drop Modal -->
            <div class="modal fade" id="drop-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Drop Case</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" id="drop-form" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <input type="hidden" name="id" id="case_id">
                                <div class="form-group row justify-content-center">
                                    <label for="drop-comment" class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-6">
                                        <textarea name="comment" id="drop-comment" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <button class="btn btn-danger drop-submit">Drop Confirm</button>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer"> </div>
                    </div>
                </div>
            </div>
            <!-- Release Modal -->
            <div class="modal fade bd-example-modal-sm" id="exampleaccept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog model-sm" role="document" style="min-width: 1000px">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h3 class="text-center">Release Case and Payment Information</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="p-2 bg-danger">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row ">
                            <form action="#" method="post" id="release-form" class="col-md-12 col-lg-12">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="fid" name="fid">
                                <div class="form-group row justify-content-center">
                                    <label for="case_no" class="col-sm-2 col-form-label">Case No</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="case_no" class="form-control" id="case_no" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control" id="name" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="mobile" class="col-sm-2 col-form-label">Mobile No.</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="mobile" class="form-control" id="mobile" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="veh_reg_no" class="col-sm-2 col-form-label">Vehicle Reg no.</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="veh_reg_no" class="form-control" id="veh_reg_no" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="v_type" class="col-sm-2 col-form-label">Vehicle Type</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="v_type" class="form-control" id="v_type" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="victim" class="col-sm-2 col-form-label">Victim</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="victim" class="form-control" id="victim" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="crime" class="col-sm-2 col-form-label">Crime List</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="crime" class="form-control" id="crime" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="paper" class="col-sm-2 col-form-label">Paper Ceased</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="paper" class="form-control" id="paper" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="packet_no" class="col-sm-2 col-form-label">Packet No</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="packet_no" class="form-control" id="packet_no" readonly>
                                    </div>
                                    <label for="box" class="col-sm-2 col-form-label">Box No</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="box" class="form-control" id="box" readonly>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="unit" class="form-control" id="unit" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="fine" class="col-sm-2 col-form-label">Fine</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="fine" class="form-control" id="fine" readonly>
                                    </div>
                                    <label for="consider" class="col-sm-2 col-form-label">Consider</label>
                                    <div class="col-sm-2">
                                        <input type="number" min="0" name="consider" value="0" class="form-control" id="consider" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="total" class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" value="0" name="total" class="form-control" id="total" readonly>
                                    </div>
                                </div>

                                {{-- <div class="form-group row justify-content-center">
                                    <label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
                                    <div class="col-sm-2">
                                        <select name="payment_method" class="form-control payment_method" id="payment_method" required>
                                            <option value="">Select</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Mobile Banking">Mobile Banking</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="d-none cheque-option">
                                    <div class="form-group row justify-content-center">
                                        <label for="bank_name" class="col-sm-2 col-form-label bank_name_text"></label>
                                        <div class="col-sm-2">
                                            <select name="bank_name" id="bank_name" class="bank_name form-control">
                                                <option value="">Select</option>
                                                <option value="Trust Bank">Trust Bank</option>
                                                <option value="Brac Bank">Brac Bank</option>
                                                <option value="Dutch Bangla Bank">Dutch Bangla Bank</option>
                                            </select>
                                        </div>
                                        <label for="account_number" class="col-sm-2 col-form-label account_number_text"></label>
                                        <div class="col-sm-2">
                                                <input type="text" name="account_number" id="account_number" class="form-control" placeholder="Account Number">
                                        </div>
                                        <label for="cheque_number" class="col-sm-2 col-form-label cheque_number_text"></label>
                                        <div class="col-sm-2">
                                                <input type="text" name="cheque_number" id="cheque_number" class="form-control" placeholder="cheque number">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none mobile-option">
                                    <div class="form-group row justify-content-center">
                                        <label for="mobile_operator" class="col-sm-2 col-form-label ">Select Operator</label>
                                        <div class="col-sm-2">
                                            <select name="mobile_operator" id="mobile_operator" class="mobile_operator form-control" >
                                                <option value="">Select</option>
                                                <option value="Bkash">Bkash</option>
                                                <option value="Rocket">Rocket</option>
                                                <option value="Nogod">Nogod</option>
                                            </select>
                                        </div>
                                        <label for="mobile_number" class="col-sm-2 col-form-label"> Account Number</label>
                                        <div class="col-sm-2">
                                                <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Account Number">
                                        </div>
                                        <label for="tax_transaction_id" class="col-sm-2 col-form-label ">Tax Or Transaction ID</label>
                                        <div class="col-sm-2">
                                                <input type="text" name="tax_transaction_id" id="tax_transaction_id" class="form-control" placeholder="Tax Or Transaction ID">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label for="reference" class="col-sm-2 col-form-label ">Reference</label>
                                        <div class="col-sm-2">
                                                <input type="text" name="reference" id="reference" class="form-control" placeholder="Mobile Reference">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group row justify-content-center">
                                    <label for="comments" class="col-sm-2 col-form-label ">Comments</label>
                                    <div class="col-sm-6">
                                        <textarea name="comments" class="form-control" id="comments"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <button class="btn btn-success">Release Confirm</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Consider Modal -->
             <div class="modal fade" id="consider-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Consider Case</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" id="consider-form" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <input type="hidden" name="id" id="cas_id">
                                <div class="form-group row justify-content-center">
                                    <label for="consider-comment" class="col-sm-2 col-form-label">Comment</label>
                                    <div class="col-sm-6">
                                        <textarea name="comment" id="consider-comment" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label for="consider-amount" class="col-sm-2 col-form-label" >Amount</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="amount" id="consider-amount" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <button class="btn btn-success consider-submit">Confirm</button>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer"> </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('js')
    <script>
        $(".datepickeoff").datepicker({dateFormat: 'dd/mm/yy'});

        $(document).ready(function() {
                datatable();
                function display(){
                    $("#accept-table tbody").css("opacity", ".5")
                        $("#preloader").addClass('d-block')
                        $("#preloader").removeClass('d-none')
                }
                function datatable(){
                    $("#accept-table").DataTable({
                        pageLength: 50,
                        "paging":   false,
                        searching:false,
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
            data: {field_name: field_name, query_data: query},

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
                $(document).on('click', '.edit-data', function(e) {
                    e.preventDefault();
                    $('#accept-form').trigger('reset');
                    var id=$(this).data('id');
                    var box=$(this).data('box');
                    var f_id=$(this).data('forward_id');
                    console.log(box)
                        $('#box').val(box);
                    $.ajax({
                        url: 'superadmin-case-details/'+id,
                        type: 'GET',
                        data: { id: id },
                        success: function(response)
                        {
                            // console.log(response[3])
                            var con=response[3].amount;
                            var stotal=response[2];
                            var total=stotal-(con ? con : 0);
                            $('#id').val(response[0].id);
                            $('#fid').val(f_id);
                            $('#case_no').val(response[0].case_no);
                            $('#name').val(response[0].victim_name);
                            $('#mobile').val(response[0].victim_mb);
                            $('#veh_reg_no').val(response[0].vehical_reg);
                            $('#v_type').val(response[0].vehical_type);
                            $('#victim').val(response[0].victim);
                            $('#packet_no').val(response[0].packet_number);
                            // $('#crime').val(response.crime_type);
                            var paper=JSON.parse(response[0].paper)
                            $.each(paper, function(key, value){
                                $('#paper').val(value+',');
                            });
                            $('#crime').val(response[1])
                            $('#total').val(total);
                            $('#unit').val(response[0].unit.name);
                            $('#fine').val(response[2]);
                            $('#consider').val(con)
                            $('#consider').keyup(function (e) {
                                e.preventDefault();
                               var fine= $('#fine').val();
                               var con= $('#consider').val();
                               $('#consider').attr('max',fine);
                               total=parseInt(fine)-parseInt(con);
                                $('#total').val(total);
                                $('#total').attr('max',fine);
                            })
                            $('#payment_method').on('change',function (e) {
                                e.preventDefault();
                                var val=$(this).val();
                               if(val=='Cheque'){
                                   $('.mobile-option').addClass('d-none');
                                   $('.cheque-option').removeClass('d-none');
                                   $('.bank_name_text').html('Select Bank');
                                   $('.account_number_text').html('Account number');
                                   $('.cheque_number_text').html('Cheque number');
                               }else if(val=='Mobile Banking'){
                                   $('.cheque-option').addClass('d-none');
                                    $('.mobile-option').removeClass('d-none');
                               }else{
                                   $('.mobile-option').addClass('d-none');
                                   $('.cheque-option').addClass('d-none');
                               }

                            })
                        }
                    });

                })

            });
            $(document).ready(function() {
                $('.checkbox-all').click(function () {
                    if ($(this).is(':checked')) {
                        $('.box-no').addClass('d-block');
                        $('.box_number').attr('required',true);
                        $('.accept-btn').attr('disabled',false);
                    } else {

                        $('.box-no').removeClass('d-block');
                        $('.accept-btn').attr('disabled',true);
                    }
                });

                $('#release-form').on('submit',function (e) {
                    display();
                    e.preventDefault();
                    $.ajax({
                        url:"{{route('superadmin.release.case')}}",
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
                                var current_page = window.location.hash.replace('#', '')
                                getData(page=current_page)
                                $('#release-form').trigger('reset');
                                $("[data-dismiss=modal]").trigger({
                                    type: "click"
                                });
                                toastr.success('Release Success full ','Success');
                                window.open('{{url('superadmin/print-invoice-')}}'+data.id, "_blank");
                            }else{
                                toastr.error('You have something wrong','Error')
                            }
                        }
                    });
                })
                $(document).on('click','.drop-btn',function (e) {
                    e.preventDefault();
                    var id=$(this).data('id');
                    var box=$(this).data('box');
                    var f_id=$(this).data('forward_id');
                    $('#case_id').val(f_id);
                })
                $('#drop-form').on('submit',function (e) {
                    display()
                    e.preventDefault();
                    var id=$('#case_id').val();
                    $.ajax({
                        url: 'superadmin-case-drop/'+id,
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
                                var current_page = window.location.hash.replace('#', '')
                            getData(page=current_page)
                                $('#drop-form').trigger('reset');
                                $("[data-dismiss=modal]").trigger({
                                    type: "click"
                                });
                                toastr.success('Drop Success full ','Success');
                            }else{
                                toastr.error('You have something wrong','Error')
                            }
                        }
                    });

                })

                $(document).on('click','.discount-btn',function (e) {
                    e.preventDefault();
                    var id=$(this).data('case_id');
                    console.log(id);
                    $('#cas_id').val(id);
                })
                $('#consider-form').on('submit',function (e) {
                    display()
                    e.preventDefault();
                    var id=$('#cas_id').val();
                    $.ajax({
                        url: 'case-fine-consider/'+id,
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
                                var current_page = window.location.hash.replace('#', '')
                            getData(page=current_page)
                                $('#consider-form').trigger('reset');
                                $("[data-dismiss=modal]").trigger({
                                    type: "click"
                                });
                                toastr.success('Consider Success full ','Success');
                            }else{
                                toastr.error('You have something wrong','Error')
                            }
                        }
                    });

                })
            });
        });
    </script>
@endsection
