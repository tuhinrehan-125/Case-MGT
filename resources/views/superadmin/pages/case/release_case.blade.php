@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Release Case</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('superadmin/home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Release Case</li>
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
                            <h3 class="card-title text-bold">Release Case List</h3>
                        </div>

                        <!---===============================Filtering===============================================--->
                        <div class="card-header text-center">
                            <div class="form-row">
                                <label>From</label>
                                <div class="col-md-3 col-sm-6">
                                    <input type="text" name="from_date" class="form-control datepickeoff from_date">
                                </div>
                                <label>To</label>
                                <div class="col-md-3 col-sm-6">
                                    <input type="text" name="to_date" class="form-control datepickeoff to_date">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <button input="submit" class="btn btn-danger filter-data-case"><i class="fa fa-search" aria-hidden="true"></i> Show collection</button>
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
                                @include('superadmin.pages.case.release-table')
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

<!-- Release Edit Modal -->
<div class="modal fade bd-example-modal-sm" id="release-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" name="packet_no" class="form-control" id="packet_no" required>
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
                        <button class="btn btn-success">Release Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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
                            <th>Name:</th>
                            <td><span id="v_name"></span></td>
                        </tr>

                        <tr>
                            <th>Phone:</th>
                            <td><span id="phone"></span></td>
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
    $(".datepickeoff").datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $(document).ready(function() {
        $(document).ready(function() {
            datatable();

            function display() {
                $("#release-table tbody").css("opacity", ".5");
                $("#preloader").addClass('d-block')
                $("#preloader").removeClass('d-none')
            }

            function datatable() {
                $("#release-table").DataTable({
                    pageLength: 50,
                    "paging": false,
                    searching: false,
                });
            }
            $(window).on('hashchange', function() {
                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    } else {
                        getData(page);
                    }
                }

            });

            $(document).ready(function() {
                $(document).on('click', '.pagination a', function(event) {
                    display();
                    event.preventDefault();

                    $('li').removeClass('active');
                    $(this).parent('li').addClass('active');

                    var myurl = $(this).attr('href');
                    var page = $(this).attr('href').split('page=')[1];
                    getData(page);
                });

            });
            $(document).on('click', '.filter-data-case', function(e) {
                e.preventDefault();
                var date_to = $('.to_date').val();
                var date_from = $('.from_date').val();
                getData(page = '1', date_to, date_from)
            })
            $(document).on('change', '.to_date', function(e) {
                e.preventDefault();
                var date_to = $('.to_date').val();
                var date_from = $('.from_date').val();
                getData(page = '1', date_to, date_from)
            })
            $(document).on('change', '.from_date', function(e) {
                e.preventDefault();
                var date_to = $('.to_date').val();
                var date_from = $('.from_date').val();
                if (date_to != '') {
                    getData(page = '1', date_to, date_from)
                }
            })

            function getData(page, date_to = '', date_from = '') {
                display();
                $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html",
                    data: {
                        date_to: date_to,
                        date_from: date_from
                    },

                }).done(function(data) {
                    $("#preloader").addClass('d-none')
                    $("#preloader").removeClass('d-block')
                    $("#tag_container").empty().html(data);
                    location.hash = page;
                    datatable();

                    $("#forward-table-data tbody").removeClass('d-none')

                }).fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
            }
            $(document).on('click', '.view-data', function(e) {
                e.preventDefault();
                $('.assign_form_class').trigger('reset');
                var id = $(this).data('id');
                $.ajax({
                    url: 'superadmin-case-details/' + id,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response)
                        $('#crime_type').html(response[1])
                        $('#v_name').html(response[0].victim_name);
                        $('#phone').html(response[0].victim_mb);
                        $('#victime_type').html(response[0].victim);
                        $('#vehicle_type').html(response[0].vehical_type);
                        var paper = JSON.parse(response[0].paper)
                        $.each(paper, function(key, value) {
                            $('#paper_type').html(value)
                        });
                    }
                });

            })
            $(document).on('click', '.edit-data', function(e) {
                e.preventDefault();
                $('#release-form').trigger('reset');
                var id = $(this).data('id');
                var box = $(this).data('box');
                var f_id = $(this).data('forward_id');
                console.log(box)
                $('#box').val(box);
                $.ajax({
                    url: 'superadmin-case-details/' + id,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response)
                        console.log(response[4])
                        // var con=response[3].amount;
                        // var stotal=response[2];
                        // var total=stotal-(con ? con : 0);
                        $('#id').val(response[0].id);
                        $('#fid').val(f_id);
                        $('#case_no').val(response[0].case_no);
                        $('#name').val(response[0].victim_name);
                        $('#mobile').val(response[0].victim_mb);
                        $('#veh_reg_no').val(response[0].vehical_reg);
                        $('#v_type').val(response[0].vehical_type);
                        $('#victim').val(response[0].victim);
                        var paper = JSON.parse(response[0].paper)
                        $.each(paper, function(key, value) {
                            $('#paper').val(value + ',');
                        });
                        $('#crime').val(response[1])
                        $('#total').val(response[3].total);
                        $('#unit').val(response[0].unit.name);
                        $('#consider').val(response[3].consider)
                        $('#fine').val(response[2]);
                        $('#packet_no').val(response[3].packet_no);
                        $('#comments').val(response[3].comments);
                        var payment = response[4].payment_method;
                        // $('#unitrole option').each(function() {
                        //     if($(this).val() == unit_role_id) {
                        //         $(this).prop('selected','selected');
                        //     }
                        // });
                        $('.payment_method option').each(function() {
                            if ($(this).val() == payment) {
                                $(this).attr('selected', 'selected').prop('selected', true);
                            } else {
                                $(this).removeAttr('selected');
                            }
                        });
                        if (payment == 'Cash') {
                            $('.mobile-option').addClass('d-none');
                            $('.cheque-option').addClass('d-none');
                        } else if (payment == 'Cheque') {
                            $('.mobile-option').addClass('d-none');
                            $('.cheque-option').removeClass('d-none');
                            $('.bank_name_text').html('Select Bank');
                            $('.account_number_text').html('Account number');
                            $('.cheque_number_text').html('Cheque number');
                            var branch = response[4].bank_branch;
                            $('#account_number').val(response[4].account_number);
                            $('#cheque_number').val(response[4].cheque_number);
                            $('.bank_name option').each(function() {
                                if ($(this).val() == branch) {
                                    $(this).attr('selected', 'selected').prop('selected', true);
                                } else {
                                    $(this).removeAttr('selected');
                                }
                            });

                        } else if (payment == 'Mobile Banking') {
                            $('.cheque-option').addClass('d-none');
                            $('.mobile-option').removeClass('d-none');
                            var operator = response[4].mobile_operator;
                            $('.mobile_operator  option').each(function() {
                                if ($(this).val() == operator) {
                                    $(this).attr('selected', 'selected').prop('selected', true);
                                } else {
                                    $(this).removeAttr('selected');
                                }
                            });
                            $('#mobile_number').val(response[4].mobile_number)
                            $('#tax_transaction_id').val(response[4].tax_transaction_id)
                            $('#reference').val(response[4].reference)

                        }
                        $('#consider').keyup(function(e) {
                            e.preventDefault();
                            var fine = $('#fine').val();
                            var con = $('#consider').val();
                            $('#consider').attr('max', fine);
                            total = parseInt(fine) - parseInt(con);
                            $('#total').val(total);
                            $('#total').attr('max', fine);
                        })

                        $('#payment_method').on('change', function(e) {
                            e.preventDefault();
                            var val = $(this).val();
                            if (val == 'Cheque') {
                                $('.mobile-option').addClass('d-none');
                                $('.cheque-option').removeClass('d-none');
                                $('.bank_name_text').html('Select Bank');
                                $('.account_number_text').html('Account number');
                                $('.cheque_number_text').html('Cheque number');
                            } else if (val == 'Mobile Banking') {
                                $('.cheque-option').addClass('d-none');
                                $('.mobile-option').removeClass('d-none');
                            } else {
                                $('.mobile-option').addClass('d-none');
                                $('.cheque-option').addClass('d-none');
                                // $('#reference').attr('required',true);
                            }

                        })
                    }
                });

            })
            $('#release-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('superadmin.release.update')}}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        if (data.success) {
                            var current_page = window.location.hash.replace('#', '')
                            getData(page = current_page)
                            $('#release-form').trigger('reset');
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                            toastr.success('Release update Success full ', 'Success');
                            window.open('{{url('superadmin/print-invoice - ')}}' + data.id, "_blank");
                        } else {
                            toastr.error('You have something wrong', 'Error')
                        }
                    }
                });
            })
        });
    });
    $(document).ready(function() {
        // var table=   $('#release-table').DataTable({
        //     pageLength: 50,
        //     processing: true,

        //     language: {
        //         processing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span> '
        //     },
        //     serverSide: true,
        //     ajax:{
        //         url: "{{ route('superadmin.release.case.data') }}",

        //     },
        //     columns:[
        //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        //         // {data: 'select', name: 'select'},
        //         {data: 'case_no', name: 'case_no'},
        //         { data: 'reg', name: 'reg'},
        //         { data: 'unit', name: 'unit'},
        //         { data: 'box_no', name: 'box_no'},
        //         { data: 'action', name: 'action'},
        //     ]
        // });


    });
</script>
@endsection
