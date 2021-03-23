@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Forward Case</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/superadmin/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Forward Case</li>
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


                    <div class="card col-md-12 col-12 col-sm-12">
                        <div class="row mt-3">
                            @foreach($unit as $udata)
                            <div class="col-md-3 col-sm-12 m-1">
                            <form action="{{route('superadmin.sa_forward_case')}}" method="get">
                                <input type="hidden" name="unit_id" value="{{$udata->id ?? ''}}">
                                @if($udata->id==1)
                                <button class="btn btn-danger">Mp Logistics</button>
                                @elseif($udata->id==2)
                                <button class="btn btn-success">Army</button>
                                @elseif($udata->id==3)
                                <button class="btn btn-primary">Air Force</button>
                                @endif
                            </form>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-header text-center">
                            <h3 class="card-title text-bold">Forward case list of {{$unit->where('id',$uid)->first()->name ?? ''}}</h3>
                        </div>
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
                                    <button input="submit" class="btn btn-info filter-data-case" disabled><i class="fa fa-search" aria-hidden="true"></i> Find</button>
                                </div>
                            </div>
                        </div>
                          </div>
                        <!---===============================Filtering===============================================--->

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                        <form action="#" id="case-accept" class="accept-form" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="box-no d-none">
                                <div class="row " >
                                    <label class="p-2">Box No.</label>
                                    <div class="col-3">
                                    <select name="box_number" class="form-control box_number" id="">

                                        <option value=""> select</option>
                                        @foreach($box as $bdata)
                                            <option value="{{$bdata->number ?? ''}}">{{$bdata->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="select-all" class="checkbox-all" onchange="checkAll(this)" name="chk[]">
                                <label for="select-all"></label>
                            </div>
                            <label for="checkboxSuccess3">Select all &nbsp;</label>

                            <button type="submit" class="btn btn-sm btn-success accept-btn" name="accept" value="accept" disabled>
                                Accept &nbsp; <i class="fa fa-forward" aria-hidden="true"></i></button>
                                <div class=" text-center d-none" id="preloader">
                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                                </div>
                                <div id="tag_container">
                                    @include('superadmin.pages.case.forward-table')
                                </div>
                      </form>
                       </div>
                    </div>
                    <!-- /.card-body -->
                </div>

                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="exampleaccept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog model-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Accept Case</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table>
                        <form action="#" id="accept-single" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <input class="form-control form-control-lg" type="hidden" id="id" name="case_id" value="">
                            <div class="row " >
                                <label class="p-2">Box No.</label>
                                <div class="col-6">
                                    <select name="box_number" class="form-control box_number" id="">

                                        <option value=""> select</option>
                                        @foreach($box as $bdata)
                                            <option value="{{$bdata->number ?? ''}}">{{$bdata->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </table>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-success">Confirm</button>
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
                            <th>Crime Type:</th>
                            <td><span class="crime_type"></span></td>
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
                <div class="modal-footer">
                </div>
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


@endsection
@section('js')
    <!--=================custom datepicker======================-->
    <script type="text/javascript">
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
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }
        // $(document).ready(function(){
        //     $(".select-field").val();
        //     console.log($(".select-field").val())
        // })
// $("#forward-table-data").DataTable();
datatable();
// display();
function display(){
    $("#forward-table-data tbody").css("opacity", ".5")
        $("#preloader").addClass('d-block')
        $("#preloader").removeClass('d-none')
}
function removePre(){
        $("#preloader").addClass('d-none')
        $("#preloader").removeClass('d-block')
}
function datatable(){
    $("#forward-table-data").DataTable({
        pageLength: 50,
        "paging":   false,
        processing: true,
        searching:false,
    });
}
        $(".datepickeoff").datepicker({dateFormat: 'dd/mm/yy'});
        $(document).ready(function() {
            $(document).on('click','.filter-data-case',function (e) {
                display();
            e.preventDefault();
            var date_to=$('.to_date').val();
            var date_from=$('.from_date').val();
            // $("#newcase-complete-subadmin tbody tr").addClass('d-none')
            getData(page='1',date_to, date_from)
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
       display()
       var uid={{$uid!=0 ? $uid: 0 }};
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            // data: {date_to: date_to, date_from: date_from},


            data: {field_name: field_name, value: query,unit_id:uid ? uid : ''},

        }).done(function(data){
            removePre()
            $("#tag_container").empty().html(data);
            location.hash = page;
            datatable();
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
                        $('.crime_type').html(response[1])
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
                $('.assign_form_class').trigger('reset');
                $('#id').empty().val( $(this).data('id'));
            })
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
            $('#case-accept').on('submit',function (e) {
                display();
                e.preventDefault();
                $.ajax({
                    url:"{{route('superadmin.case.accept')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        if (data.success){
                           var current_page = window.location.hash.replace('#', '')
                            getData(page=current_page)
                            $('.accept-form').trigger('reset');
                            toastr.success('Accept Success full ','Success');
                            $("#select-all").prop("checked", false);
                            $('.box-no').removeClass('d-block');
                             $('.accept-btn').attr('disabled',true);
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
                e.preventDefault();
                display();
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
                            getData(page='1')
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
            $('#accept-single').on('submit',function (e) {
                e.preventDefault();
                var id=$('#case_id').val();
                $.ajax({
                    url: '{{route('superadmin.case.accept.single')}}',
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
                            $('#accept-single').trigger('reset');
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                            toastr.success('Accept Success full ','Success');
                        }else{
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });

            })
        });
    </script>
@endsection
