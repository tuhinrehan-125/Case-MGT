@extends('systemadmin.layout.app')
@section('title', 'Dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><!--Dashboard--></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-danger">Home</a></li>
              <li class="breadcrumb-item active">All Case List</li>
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





			<div class="card">
            <div class="card-header text-center">
              <h3 class="card-title text-danger text-bold">All Case List</h3>
            </div>

                <!--==========================================================Filtering============================-->
                <div class="card-header text-center">
                    <form action="{{route('systemadmin.filter_allcase')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="from_sl" class="form-control" placeholder="From">
                            </div>
                            <div class="col">
                                <input type="text" name="to_sl" class="form-control" placeholder="To">
                            </div>
                            <label>From</label>
                            <div class="col">
                                <input type="text" name="from_date" class="form-control datepickeoff">
                            </div>
                            <label>To</label>
                            <div class="col">
                                <input type="text" name="to_date" class="form-control datepickeoff">
                            </div>
                            <div class="col">
                                <button input="submit" class="btn btn-danger"><i class="fa fa-search" aria-hidden="true"></i> Show collection</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--==========================================================Filtering============================-->
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="" class="table table-bordered table-striped example1ddd">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Case No.</th>
                  <th>Name</th>
                  <th>Mobile No.</th>
                  <th>Vehicle Reg.No</th>

                  <th>Date offence</th>
                  <th>Time offence</th>
                  <th>Date Diposal</th>
                  <th>Location</th>
                  <th>Vehical Type</th>
                  <th>Case Type</th>
                  <th>Victim Type</th>
                  <th>Name of MP</th>
                  <th>Paper Ceased</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allcase as $data)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$data->case_no}}</td>
                  <td>{{$data->victim_name}}</td>
                  <td>{{$data->victim_mb}}</td>
                  <td>{{$data->vehical_reg}}</td>

                  <td>{{$data->date_off}}</td>
                  <td>{{$data->time_off}}</td>
                  <td>{{$data->date_disposal}}</td>
                  <!--<td>{{$data->time_disposal}}</td>-->
                  <td>{{$data->loc}}</td>

                  <td>{{$data->vehical_type}}</td>
                  <td>

                      @if($data->crime_type == 'null')
                          null
                      @else
                          @forelse(json_decode($data->crime_type, true) as $info)
                              {{$info}},
                      @empty
                      @endforelse
                      @endif

                  </td>
                  <td>{{$data->victim}}</td>
                  <td>{{\App\addmp_model::find($data->id_mp)->name_mp ?? ''}}</td>
                  <td>

                      @if($data->paper == 'null')
                          null
                      @else
                          @forelse(json_decode($data->paper, true) as $datapaper)
                              {{$datapaper}},
                          @empty
                          @endforelse
                          {{-- @if(empty($data->paper_number))
                           @else
                              ({{$data->paper_number}})
                          @endif --}}
                      @endif

                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
          </div>
          <!-- /.card -->



         </div>

        </div>
      </div>
    </section>
 </div>


 @endsection
