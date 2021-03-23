@extends('superadmin.layout.app')
@section('title', 'Users Management')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-green"><i class="fas fa-star mr-1"></i> Users </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-green">Home</a></li>
                            <li class="breadcrumb-item active text-green">Users </li>
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
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <!-- <i class="fas fa-map-marker mr-1"></i> -->
                                    <i class="fas fa-user mr-1"></i>
                                    <b>User List </b>
                                </h3>
                            </div>
                            <div class="card-body text-center">
                                <div class="form-row">
                                    <div class="col-md-3 col-sm-6">
                                    <label>Select Field</label>
                                       <select name="field_name" class="form-control" id="field_name">
                                       <option value="">Select</option>
                                       <option value="name">Name</option>
                                       <option value="phone">Phone Number</option>
                                       <option value="email">Email</option>
                                       <option value="vehicle_number">Vehicle reg no</option>
                                       </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                    <label>Search Keyword</label>
                                        <input type="text" name="query" id="query" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <button input="submit" class="btn btn-info filter-data-case mt-4" disabled><i class="fa fa-search" aria-hidden="true"></i> Find</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <div class=" text-center d-none" id="preloader">
                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span>
                                </div>
                                <div id="tag_container">
                                    @include('superadmin.pages.users.table')
                                </div>

                            </div>
                            {{$user->links() }}
                        </div>
                    </div>

                        <!-- Modal -->
                        <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <table class="assign_form_class">
                                           <tr>
                                               <td>Name</td>
                                               <td><span id="name_modal"></span></td>
                                           </tr>
                                           <tr>
                                               <td>Phone</td>
                                               <td><span id="phone_modal"></span></td>
                                           </tr>
                                           <tr>
                                               <td>Email</td>
                                               <td><span id="email_modal"></span></td>
                                           </tr>
                                           <tr>
                                               <td>Address</td>
                                               <td><span id="address_modal"></span></td>
                                           </tr>
                                           <tr>
                                               <td>Vehicle Reg No.</td>
                                               <td><span id="reg_modal"></span></td>
                                           </tr>
                                       </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="min-width: 1000px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Information Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form assign_form_class edit-user" action="#" method="Post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" id="edit-id" value="">
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 control-label">Name</label>

                                                <div class="col-md-10">
                                                    <input id="edit-name" type="text" class="form-control" name="name" value=""  placeholder="Example John">

                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">phone </label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="edit-phone" name="phone" class="form-control" placeholder="Phone Number ">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                                                <div class="col-md-10">
                                                    <input id="edit-email" type="email" class="form-control" name="email" value="" placeholder="Example example@email.com ">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-2 control-label"> Address</label>

                                                <div class="col-md-10">
                                                    <input id="address" type="text" class="form-control" name="address" value="" placeholder="Address">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-2 control-label">Vehicle Reg No.</label>

                                                <div class="col-md-10">
                                                    <input id="reg" type="text" class="form-control" name="vehicle_number" value="" placeholder="Vehicle Reg No. ">

                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                                <label for="password" class="col-sm-2  control-label">Password</label>

                                                <div class="col-md-10">
                                                    <input id="password" type="password" class="form-control" name="password" placeholder="xxxxxxxxxx ">

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('password') }}</strong>
                                                         </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>

        $(document).ready(function() {
            $(document).on('click', '.view-data', function(e) {
                e.preventDefault();
                $('.assign_form_class').trigger('reset');
                $('#name_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('name'));
                $('#phone_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('phone'));
                $('#email_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('email'));
                $('#address_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('address'));
                $('#reg_modal').empty().append("&nbsp&nbsp&nbsp;" + $(this).data('reg'));
                // console.log($(this).data('email'))

            });
            $(document).on('click', '.edit-data', function(e) {
                e.preventDefault();
                $('.assign_form_class').trigger('reset');
                var id = $(this).data('id');
                var name = $(this).data('name');
                var phone = $(this).data('phone');
                var address = $(this).data('address');
                var vehicle = $(this).data('vehicle');
                var email = $(this).data('email');
                $("#edit-name").empty().val(name);
                $("#edit-id").empty().val(id);
                // $("#edit-unit select").empty().val(unit);
                $("#edit-phone").empty().val(phone);
                $("#edit-email").empty().val(email);
                $("#reg").empty().val(vehicle);
                $("#address").empty().val(address);
            });
        });

        $(document).ready(function() {
            datatable();
            function display(){
                $("#all-unit-user tbody").css("opacity", ".5")
                    $("#preloader").addClass('d-block')
                    $("#preloader").removeClass('d-none')
            }
            function removePre(){
                        $("#preloader").addClass('d-none')
                        $("#preloader").removeClass('d-block')
            }
            function datatable(){
                $("#all-unit-user").DataTable({
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
            $(document).on('click', '.pagination a',function(event){
                display();
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];
                getData(page);
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

            $(document).on('submit','.edit-user', function(event){
                // console.log('paise');
                event.preventDefault();
                $.ajax({
                    url:"{{route('superadmin.user-update')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        console.log(data);
                        if (data.success){
                            var current_page = window.location.hash.replace('#', '')
                            getData(page=current_page)
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
            $(document).on('submit','.status', function(event){
                // console.log(id);
                event.preventDefault();
                $.ajax({
                    url:"{{route('superadmin.user.active')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        console.log(data);
                        if (data.success){
                            var current_page = window.location.hash.replace('#', '')
                            getData(page=current_page)
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
            $(document).on('submit','.delete', function(event){
                // console.log(id);
                event.preventDefault();
                $.ajax({
                    url:"{{route('superadmin.user.delete')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        console.log(data);
                        if (data.success){
                            var current_page = window.location.hash.replace('#', '')
                            getData(page=current_page)
                            toastr.success('Delete Success full ','Success');
                        }else{
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });
            });
        });
    </script>
@endsection
