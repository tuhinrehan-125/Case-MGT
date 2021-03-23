@extends('unitauth.layout.airforce-master')
@section('title', 'Unit User')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-green"><i class="fas fa-star mr-1"></i> Unit User </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-green">Home</a></li>
                            <li class="breadcrumb-item active text-green">User</li>
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
                                    <i class="fas fa-user mr-1"></i>
                                    <b>Add Unit User</b>
                                    <!--Error handaler-->
                                    @if ($errors->any())
                                        <span class="help-block text-red errorrr">
                                @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                          </span>
                                @endif

                                <!-- Error handaler -->
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleModal"><span><i class="fa fa-plus"
                                                                                 aria-hidden="true"></i></span>ADD
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="min-width:1000px">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Unit User Form</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center">
                                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <form class="form add-data" action="#"
                                                              method="Post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="inputPassword"
                                                                       class="col-sm-2 col-form-label">Select Unit
                                                                    Role</label>
                                                                <div class="col-sm-10">
                                                                    <select name="unit_role_id" class="form-control"
                                                                            id="">
                                                                        <option value=""> Select</option>

                                                                        @foreach($unitrole as $unitData)
                                                                            @if($unitData->id!=1)
                                                                                <option
                                                                                    value="{{!empty($unitData->id) ? $unitData->id : ''}}">{{!empty($unitData->name) ? $unitData->name : ''}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('unit_role_id'))
                                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('unit_role_id') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                                                <label for="name"
                                                                       class="col-md-2 control-label">Name</label>

                                                                <div class="col-md-10">
                                                                    <input id="name" type="text" class="form-control"
                                                                           name="name" value="{{ old('name') }}"
                                                                           autofocus placeholder="Example John">

                                                                    @if ($errors->has('name'))
                                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-group row {{ $errors->has('ba_baf_number') ? ' has-error' : '' }}">
                                                                <label for="inputPassword"
                                                                       class="col-sm-2 col-form-label">BA/BAF
                                                                    Number </label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="ba_baf_number"
                                                                           class="form-control"
                                                                           placeholder="Example BA-123 or BAF-123">
                                                                    @if ($errors->has('ba_baf_number'))
                                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('ba_baf_number') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                                <label for="inputPassword"
                                                                       class="col-sm-2 col-form-label">phone </label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="phone" class="form-control"
                                                                           placeholder="Phone Number ">
                                                                    @if ($errors->has('phone'))
                                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                                                <label for="email" class="col-md-2 control-label">E-Mail
                                                                    Address</label>

                                                                <div class="col-md-10">
                                                                    <input id="email" type="email" class="form-control"
                                                                           name="email" value="{{ old('email') }}"
                                                                           placeholder="Example example@email.com ">

                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                                                <label for="password" class="col-sm-2  control-label">Password</label>

                                                                <div class="col-md-10">
                                                                    <input id="password" type="password"
                                                                           class="form-control" name="password"
                                                                           placeholder="xxxxxxxxxx ">

                                                                    @if ($errors->has('password'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
                                                                <label for="password-confirm"
                                                                       class="col-sm-2 control-label">Confirm
                                                                    Password</label>

                                                                <div class="col-md-10">
                                                                    <input id="password-confirm" type="password"
                                                                           class="form-control"
                                                                           name="password_confirmation"
                                                                           placeholder="xxxxxxxxxxxxxx ">

                                                                    @if ($errors->has('password_confirmation'))
                                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <button type="submit" class="btn btn-primary">Submit
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <!-- <i class="fas fa-map-marker mr-1"></i> -->
                                        <b>Unit User List </b>
                                    </h3>
                                </div>
                                <div class="card-body">

                                    <table id="unituser" class=" table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>Sl./No</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th>Sl./No</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <td>Unit Name</td>
                                                <td><span id="unit_modal"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Role</td>
                                                <td><span id="unit_role_modal"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><span id="phone_modal"></span></td>
                                            </tr>
                                            <tr>
                                                <td>BA/BAF No</td>
                                                <td><span id="ba_modal"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><span id="email_modal"></span></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="min-width: 1000px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Information Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-form" class="form assign_form_class"
                                              action="#" method="Post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Select Unit
                                                    Role</label>
                                                <div class="col-sm-10">
                                                    <select name="unit_role_id" class="form-control " id="unitrole">
                                                        <option value=""> Select</option>
                                                        @foreach($unitrole as $unitData)
                                                            @if($unitData->id!=1)
                                                                <option
                                                                    value="{{!empty($unitData->id) ? $unitData->id : ''}}">{{!empty($unitData->name) ? $unitData->name : ''}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="edit-id" value="">
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 control-label">Name</label>

                                                <div class="col-md-10">
                                                    <input id="edit-name" type="text" class="form-control" name="name"
                                                           value="" placeholder="Example John">

                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">BA/BAF
                                                    Number </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="ba_baf_number" id="edit-ba_number" value=""
                                                           class="form-control" placeholder="Example BA-123 or BAF-123">

                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label for="inputPassword"
                                                       class="col-sm-2 col-form-label">phone </label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="edit-phone" name="phone" value=""
                                                           class="form-control" placeholder="Phone Number ">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                                                <div class="col-md-10">
                                                    <input id="edit-email" type="email" class="form-control"
                                                           name="email" value=""
                                                           placeholder="Example example@email.com ">

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

        $(document).ready(function () {
            $.ajax({
                url:'{{route('unitauth.unit-user-ajax')}}',
                method: 'get',
                success: function (response) {
                    console.log(response);
                }
            })
        })
        $(document).ready(function() {

            var table= $('#unituser').DataTable({
                pageLength: 10,
                processing: true,

                language: {
                    processing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw text-info"></i><span class="sr-only">Loading...</span> '
                },
                serverSide: true,
                ajax:{
                    url: "{{ route('unitauth.unit-user.details') }}",
                },
                columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'name'},
                    {data: 'role', name: 'role'},
                    {data: 'status', name: 'status'},
                    {data: 'button', name: 'button'},
                ]

            });
            $(document).on('submit','#edit-form', function(event){
                // console.log('paise');
                event.preventDefault();
                $.ajax({
                    url:"{{route('unitauth.unit-user-update')}}",
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
                            table.draw();
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                            toastr.success('Update Success full ','Success');
                            $('#unituser').DataTable().ajax.reload();
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
                    url:"{{route('unitauth.unituser.active')}}",
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
                            table.draw();
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                            toastr.success('Update Success full ','Success');
                            $('#unituser').DataTable().ajax.reload();
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
                    url:"{{route('unitauth.unituser.delete')}}",
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
                            table.draw();
                            toastr.success('Delete Success full ','Success');
                            $('#unituser').DataTable().ajax.reload();
                        }else{
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });
            });
            $('.add-data').on('submit', function(event){
                // console.log(id);
                event.preventDefault();
                $.ajax({
                    url:"{{route('unitauth.unit-user-store')}}",
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
                            table.draw();
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                            toastr.success('Delete Success full ','Success');
                            $('#unituser').DataTable().ajax.reload();
                        }else{
                            printErrorMsg(data.error)
                            $('#exampleModal').show()
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });
                function printErrorMsg (msg) {
                    $(window).scrollTop(0);
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display','block');
                    $.each( msg, function( key, value ) {
                        toastr.info(value,'info');
                        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
            });
        });
    </script>
@endsection
