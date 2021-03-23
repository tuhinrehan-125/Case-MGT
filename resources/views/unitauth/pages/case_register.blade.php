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
            <h1 class="m-0 text-dark"><i class="fas fa-map-marker mr-1"></i> Location</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Location</li>
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
                    <h3 class="">
                      <!-- <i class="fas fa-map-marker mr-1"></i> -->
                      <b>Add Location</b>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('unitauth.location')}}" method="POST">
                      {{csrf_field()}}
                      <input type="hidden" name="type" value="mp">
                      <div class="form-group">
                        <!-- <label for="exampleFormControlInput1 col-lg-2">Location</label> -->
                        <input type="text" class="form-control col-lg-4" name="location" id="exampleFormControlInput1" placeholder="Type Location">
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
                    <h3 class="">
                      <!-- <i class="fas fa-map-marker mr-1"></i> -->
                      <b>ALL Location</b>
                    </h3>
                </div>
                <div class="card-body">

                 <table class="table table-bordered table-striped example1">
                  <thead>
                    <tr>
                      <th>Sl./No</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($location as $data)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$data->location}}</td>
                      <td>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>

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
