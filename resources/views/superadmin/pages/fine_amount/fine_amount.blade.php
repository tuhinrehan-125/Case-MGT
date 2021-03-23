@extends('superadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-green"><i class="fas fa-star mr-1"></i> Crime </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-green">Home</a></li>
              <li class="breadcrumb-item active text-green">Crime </li>
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
                      <i class="fas fa-star mr-1"></i>
                      <b>Add Crime Type</b>
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
                    <form action="{{route('superadmin.crime')}}" method="POST">
                      {{csrf_field()}}
                      <input type="hidden" name="type" value="cantroment">

                      <div class="form-group">
                        <label for="vehicle" col-lg-2">Crime Type</label>
                        <input type="text" class="form-control col-lg-4" name="crime" id="crime" placeholder="Type Crime Type">
                                @if ($errors->has('crime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('crime') }}</strong>
                                    </span>
                                @endif
                      </div>

                      <div class="form-group">
                        <label for="fine_crime" col-lg-2">Fine Amount</label>
                        <input type="text" class="form-control col-lg-4" name="fine_crime" id="fine_crime" placeholder="Fine Amount">
                                @if ($errors->has('fine_crime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fine_crime') }}</strong>
                                    </span>
                                @endif
                      </div>


                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success"><span><i class="fa fa-plus" aria-hidden="true"></i></span>ADD</button>
                </div>
              </form>
            </div>
          </div>



         <div class="col-lg-12 col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                      <!-- <i class="fas fa-map-marker mr-1"></i> -->
                      <b>All Crime List </b>
                    </h3>
                </div>
                <div class="card-body">

                 <table class="table table-bordered table-striped example1">
                  <thead>
                    <tr>
                      <th>Sl./No</th>
                      <th>Crime list</th>
                      <th>Fine Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($crime as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->crime}}</td>
                      <td>{{$data->fine_crime}}</td>
                      <td>

<!--                           <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> -->
                          <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <!-- Edit -->
                          <div class="modal fade" id="exampleModalCenter{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog model-md" role="document">


                              <form action="{{route('superadmin.crime_update',$data->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Change Crime Name</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="vehicle" col-lg-2">Crime Type</label>
                                        <input type="text" class="form-control col-lg-12" name="crime" value="{{$data->crime}}" id="crime" placeholder="Type Crime Type">
                                        @if ($errors->has('crime'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('crime') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="fine_crime" col-lg-2">Fine Amount</label>
                                        <input type="text" class="form-control col-lg-12" name="fine_crime" value="{{$data->fine_crime}}" id="fine_crime" placeholder="Fine Amount">
                                        @if ($errors->has('fine_crime'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('fine_crime') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="modal-footer">
                                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                  <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                              </div>
                              </form>


                            </div>
                          </div>
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
                    @empty
                    @endforelse
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
