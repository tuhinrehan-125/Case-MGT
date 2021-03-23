@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{!empty(Auth::user()->image) ? asset(Auth::user()->image) : asset('/unit-user/image/avatar.png')}}" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

{{--                                    <p class="text-muted text-center">{{Auth::user()->Unit->name}}</p>--}}
{{--                                    <p class="text-muted text-center">{{Auth::user()->UnitRole->name}}</p>--}}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                       <table class="table">
                                           <tr>
                                               <td>Name : </td>
                                               <td>{{!empty(Auth::user()->name) ? Auth::user()->name : ''}}</td>
                                           </tr>
                                           <tr>
                                               <td>Email : </td>
                                               <td>{{!empty(Auth::user()->email) ? Auth::user()->email : ''}}</td>
                                           </tr>
                                           <tr>
                                               <td>Phone : </td>
                                               <td>{{!empty(Auth::user()->phone) ? Auth::user()->phone : ''}}</td>
                                           </tr>
                                           <tr>
                                               <td>Role : </td>
                                               <td>{{!empty(Auth::user()->UnitRole->name) ? Auth::user()->UnitRole->name : ''}}</td>
                                           </tr>
                                       </table>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->

                                        <form class="form" action="{{route('superadmin.update')}}" method="Post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                                <label for="name" class="col-md-2 control-label">Name</label>

                                                <div class="col-md-10">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{!empty(Auth::user()->name) ? Auth::user()->name : ''}}" autofocus placeholder="Example John">

                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">phone </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="phone" class="form-control" value="{{!empty(Auth::user()->phone) ? Auth::user()->phone : ''}}" placeholder="Phone Number ">
                                                    @if ($errors->has('phone'))
                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                                <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                                                <div class="col-md-10">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{!empty(Auth::user()->email) ? Auth::user()->email : ''}}" placeholder="Example example@email.com ">

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="file" class="col-md-2 control-label">Image</label>

                                                <div class="col-md-10">
                                                    <input id="file" type="file" class="form-control" name="image" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">

                                        <form class="form" action="{{route('superadmin.passupdate')}}" method="Post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2  control-label">Old Password</label>

                                                <div class="col-md-10">
                                                    <input id="password" type="password" class="form-control" name="oldPassword" placeholder="xxxxxxxxxx ">

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2  control-label">Password</label>

                                                <div class="col-md-10">
                                                    <input id="password" type="password" class="form-control" name="password" placeholder="xxxxxxxxxx ">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>
                                                <div class="col-md-10">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="xxxxxxxxxxxxxx ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
