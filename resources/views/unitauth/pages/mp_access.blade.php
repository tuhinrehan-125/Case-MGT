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
            <h1 class="m-0 text-red"><i class="fas fa-user-plus mr-1"></i>Desk Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><i class="fas fa-user-plus"></i> Desk Admin</li>
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
                      <b><i class="fas fa-user-plus"></i> Add Desk Admin</b>
                    </h3>
                </div>
                <div class="card-body">

                      <form class="form-horizontal" role="form" method="POST" action="{{ route('unitauth.mpregister') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('banumber') ? ' has-error' : '' }}">
                            <label for="banumber" class="col-md-4 control-label">BA Number</label>

                            <div class="col-md-6">
                                <input id="banumber" type="text" class="form-control" name="banumber" value="{{ old('banumber') }}">

                                @if ($errors->has('banumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-user plus"></i> Add Desk Admin
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-footer">

                </div>
              </form>
            </div>
          </div>


                   <div class="col-lg-12 col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-user-plus mr-1"></i>
                      <b>ALL Desk Admin</b>
                    </h3>
                </div>
                <div class="card-body">

                 <table class="table table-bordered table-striped example1">
                  <thead>
                    <tr>
                      <th>Sl./No</th>
                      <th>Name Of Desk Admin</th>
                      <th>BA Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($mp as $data)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->banumber}}</td>
                      <td>

<!--                           <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> -->
                          <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target=".bd-example-modal-lg{{$data->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <!--edit-->
                          <div class="modal fade bd-example-modal-lg{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit MP</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="{{route('unitauth.mpuser_update',$data->id)}}" method="POST">
                                          {{csrf_field()}}
                                          {{method_field('PATCH')}}
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">MP Name:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="name" value="{{$data->name}}">
                                          </div>
<!--                                           <div class="form-group">
  <label for="banumber" class="col-form-label">BA Number:</label>
  <input type="text" value="{{$data->banumber}}" id="banumber" class="form-control" name="banumber">
</div> -->


                                      </div>
                                      <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        <button type="submit" class="btn btn-primary">Change Recoard</button>
                                      </form>
                                      </div>
                              </div>
                            </div>
                          </div>
                          <!--end Edit-->
<!--                           <a class="btn btn-danger btn-sm" href="#">
    <i class="fas fa-trash">
    </i>
    Delete
</a> -->

<!--
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->




                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                 </table>

                </div>
            </div>
          </div>




        </div>
      </div>
    </section>
</div>
@endsection
