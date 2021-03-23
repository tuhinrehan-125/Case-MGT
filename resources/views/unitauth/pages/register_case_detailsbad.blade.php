@extends('unitauth.layout.airforce-master')
@section('title', 'Register Case')
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Register Case</li>
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
              <h3 class="card-title">Register List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Case No.</th>
                  <th>Name</th>
                  <th>Mobile No.</th>
                  <th>Vehicle Reg.No</th>

                  <th>Date of offence</th>
                  <th>Time of offence</th>
                  <th>Date of Diposal</th>
                  <!--<th>Time Diposal</th>-->
                  <th>Location</th>

                  <th>Vehical Type</th>
                  <th>Case Type</th>
                  <th>Victim Type</th>
                  <th>Name of MP</th>
                  <th>Paper Ceased</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allcase as $data)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$data->case_no}}</td>
                  <td>{{$data->victim_name}}</th>
                  <td>{{$data->victim_mb}}</td>
                  <td>{{$data->vehical_reg}}</td>

                  <td>{{$data->date_off}}</td>
                  <td>{{$data->time_off}}</td>
                  <td>{{$data->date_disposal}}</td>
                  <!--<td>{{$data->time_disposal}}</td>-->
                  <td>{{$data->loc}}</td>

                  <td>{{$data->vehical_type}}</td>
                  <td>{{$data->crime_type}}</th>
                  <td>{{$data->victim}}</td>
                  <td>{{!empty($data->Unitauth->name) ? $data->Unitauth->name : ''}}</td>
                  <td>{{$data->paper}}</td>
                  <td>
                    <table>
                    	<tr>
                    		<td>
	                    		<a href="" class="btn btn-primary" data-toggle="modal" data-target=".exampleModaledit{{$data->id}}">
	                            	Edit
	                    		</a>

								<!-- Modal -->
								<div class="modal fade exampleModaledit{{$data->id}}" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">

									<form action="{{route('mp.case_update',$data->id)}}" method="POST">
										{{csrf_field()}}
										{{method_field('PATCH')}}
									<table class="table table-bordered table-striped">
						                <thead>
							                <tr>
							                  <th>Name</th>
							                  <td><input type="text" class="form-control" value="{{$data->victim_name}}" name="victim_name" id="inputEmail3" placeholder="Name"></td>
							                </tr>
							                <tr>
							                  <th>Mobile No.</th>
							                  <td><input type="number" class="form-control" value="{{$data->victim_mb}}" name="victim_mb"</td>
							                </tr>
							                <tr>
							                  <th>Vehicle Reg.No</th>
							                  <td><input type="text" class="form-control" value="{{$data->vehical_reg}}" name="vehical_reg" ></td>
							                </tr>
							                <tr>
							                  <th>Location</th>
							                  <td>
							                  	<select class="form-control" name="loc" id="exampleFormControlSelect1">
				                                  <option value="lima1">Lima-1</option>
				                                  <option value="lima2">Lima-2</option>
				                                  <option value="lima3">Lima-3</option>
				                                  <option value="lima4">Lima-4</option>
				                                  <option value="lima5">Lima-5</option>
				                                  <option value="lima6">Lima-6</option>
				                                  <option value="lima7">Lima-7</option>
				                                  <option value="lima8">Lima-8</option>
				                                  <option value="lima9">Lima-9</option>
				                                  <option value="lima10">Lima-10</option>
				                                  <option value="Others">Others</option>
				                                </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Vehical Type</th>
							                  <td>
							                  	  <select class="form-control" name="vehical_type" id="exampleFormControlSelect1">
				                                  <option value="motorcycle">Motorcycle</option>
				                                  <option value="car">Car</option>
				                                  <option value="jeep">Jeep</option>
				                                  <option value="bus">Bus</option>
				                                  <option value="cng">CNG</option>
				                                  <option value="others">Others</option>
				                                </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Case Type</th>
							                  <td>
							                  	<select class="form-control" name="crime_type" id="exampleFormControlSelect1">
				                                  <option value="crime1">Crime 1</option>
				                                  <option value="crime2">Crime 2</option>
				                                  <option value="crime3">Crime 3</option>
				                                  <option value="crime4">Crime 4</option>
				                                  <option value="crime5">Others</option>
				                                </select>

							                  </td>
							                </tr>
							                <tr>
							                  <th>Victim Type</th>
							                  <td>
				                                <select class="form-control" name="victim" id="exampleFormControlSelect1">
				                                  <option value="driver">Driver</option>
				                                  <option value="owner">Owner</option>
				                                  <option value="others">Others</option>
				                                </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Paper Ceased</th>
							                  <td>
							                    <select class="form-control" name="paper" id="exampleFormControlSelect1">
				                                  <option value="Driving License">Driving License</option>
				                                  <option value="Reg.Paper">Reg.Paper</option>
				                                  <option value="Finess paper">Finess paper</option>
				                                </select>
							                  </td>
							                </tr>
						                </thead>
						            </table>
								      </div>
								      <div class="modal-footer">
								        <button type="submit" class="btn btn-success">Save changes</button>
								      </div>
								    </form>
								    </div>
								  </div>
								</div>

















	                    	</td>
	                    	<td>
                   				<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-message">
                            		Delete
                        		</a>
                    		</td>
                    		<td>
                    			<a href="" class="btn btn-info" data-toggle="modal" data-target=".exampleModal{{$data->id}}">
                            		Paper
                    			</a>


                    			<!-- View Paper -->
								<div class="modal fade exampleModal{{$data->id}}" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">All Papers</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<table>
								      		<thead>
								      			<tr>
									      			<th>Paper Ceased Type 1</th>
													<td>
													@if(!empty($data->paper_image))
											        <img src="{{asset('frontend/image/register_case/paper_image/'.$data->paper_image)}}" class="img-thumbnail" alt="logo" height="300px" width="300px">
											        @else
											        	No Paper
											        @endif
													</td>
												</tr>
								      		</thead>
											<tbody>
												<tr>
													<th>Paper Ceased Type 1</th>

													<td>
														@if(!empty($data->outher_image))
												        <img src="{{asset('frontend/image/register_case/profile_image/'. $data->outher_image)}}" class="img-thumbnail" alt="logo" height="300px" width="300px">
												        @else
												        	No Paper
												        @endif
													</td>
												</tr>
											</tbody>

								      	</table>
								      </div>
								      <div class="modal-footer">
								 <!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button type="button" class="btn btn-primary">Save changes</button> -->
								      </div>
								    </div>
								  </div>
								</div>
								<!--View paper-->


                    		</td>
                    	</tr>
                    </table>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <!--<tfoot>
                <tr>
                  <th>Sl.</th>
                  <th>Case No.</th>
                  <th>Name</th>
                  <th>Mobile No.</th>
                  <th>Vehicle Reg.No</th>

                  <th>Date offence</th>
                  <th>Time offence</th>
                  <th>Date Diposal</th>
                  <!--<th>Time Diposal</th>
                  <th>Location<</th>

                  <th>Vehical Type</th>
                  <th>Case Type</th>
                  <th>Victim Type</th>
                  <th>Name of MP</th>
                  <th>Paper Ceased</th>
                  <th>action</th>
                </tr>
                </tfoot>
            	-->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

         </div>

        </div>
      </div>
    </section>



 </div>


 @endsection
