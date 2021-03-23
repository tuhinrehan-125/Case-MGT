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
            <h1 class="m-0 text-dark"><!--Dashboard--></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Case List</li>
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
              <h3 class="card-title">New Case List</h3>
            </div>
            <!-- /.card-header -->
               <div class="card-header">

                <!-- Date range -->
               <div class="row">
                <div class="col-lg-2">
                <form action="{{route('unitauth.search_case')}}" method="GET">
                	<input type="text" class="form-control" name="case_no" placeholder="Type Case Number">
                </div>
                <div class="col-lg-8">
	                <div class="form-group">
	                  <div class="input-group">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text">
	                        <i class="far fa-calendar-alt"></i>
	                      </span>
	                    </div>
	                    <input type="text" name="custom_date" class="form-control float-right" id="reservation">
	                  </div>
	                  <!-- /.input group -->
	                </div>
            	</div>
            	<div  class="col-lg-2">
            		<input type="submit" class="btn btn-md btn-danger" value="search">
                </div>
                </form>
				</div>



	           </div>
	     	<!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Select</th>
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
                  <th>Type of offence<!-- Case Type --></th>
                  <th>Type of offender<!-- Victim Type --></th>
                  <th>Name of MP</th>
                  <th>Paper Ceased</th>
                  <th>action</th>
                </tr>
                </thead>
                <div class="icheck-danger d-inline">
	            	<input type="checkbox" id="select-all" onchange="checkAll(this)" name="chk[]">
	            	<label for="select-all"></label>
	           </div>
	            <label for="checkboxSuccess3">Select all &nbsp;</label>
                <tbody>
                <form action="{{route('unitauth.caseforward')}}" method="POST">
					{{csrf_field()}}
				           	<button type="submit" class="btn btn-sm btn-danger">Forward All &nbsp; <i class="fa fa-forward" aria-hidden="true"></i></button>
                @foreach($newcase as $data)
                <tr>
                  <td>{{$data->id}}{{$loop->iteration}}</td>
                  <td><span class="icheck-danger d-inline">
                        <input type="checkbox" id="newcase1{{$data->id}}" name="chk[]" value="{{$data->id}}">
                        <label for="newcase1{{$data->id}}"></label>
                  </span></td></td>

                  <td>{{$data->case_no}}</td>
                  <td>{{$data->victim_name}}</td>
                  <td>{{$data->victim_mb}}</td>
                  <td>{{$data->vehical_reg}}</td>

                  <td>{{$data->date_off}}</td>
                  <td>{{$data->time_off}}</td>
                  <td>{{$data->date_disposal}}</td>
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
                  <td>{{!empty($data->Unitauth->name) ? $data->Unitauth->name : ''}}</td>
                    <td>
                        @if($data->paper == 'null')
                            null
                        @else
                            @forelse(json_decode($data->paper, true) as $datapaper)
                                {{$datapaper}},
                            @empty
                            @endforelse
                        @endif
                    </td>
                  <td>
                     <table>
						<tr>
							<td>
	                    		<a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target=".exampleModaledit{{$data->id}}"><!-- <i class="fas fa-pencil-alt"> -->
                              </i> Edit
	                    		</a>
							</td>
	                    	<td>
                        		<a href="{{route('unitauth.caseforward_single',$data->id)}}" class="btn btn-sm btn-danger">Forward</a>
                    		</td>
                     	</tr>
                    </table>
                  </td>
                </tr>
                @endforeach
                </form>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
<!--             <div class="card-footer">
	<a href="{{route('unitauth.print_allcase')}}" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i>Print All</a>
</div> -->
          </div>
          <!-- /.card -->



         </div>

        </div>
      </div>
    </section>
 </div>

							@foreach($newcase as $data)
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

									<form action="{{route('unitauth.case_update',$data->id)}}" method="POST">
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
							                  <th>Name Of MP</th>
							                  <td>{{\App\Mp::find($data->id_mp)->name}}</td>
							                </tr>
							                <tr>
							                  <th>Date of Offence</th>
							                  <td>{{$data->date_off}}</td>
							                </tr>
							                <tr>
							                  <th>Time of Offence</th>
							                  <td><input type="time" class="form-control" name="time_off" value="{{$data->time_off}}" id="inputPassword3"></td>
							                </tr>
							                <tr>
							                  <th>Date of Diposal</th>
							                  <td>{{$data->date_disposal}}</td>
							                </tr>
							                <tr>
							                  <th>Location</th>
							                  <td>
							                  	<select class="form-control" name="loc" id="exampleFormControlSelect1">
				                                  <option value="" selected>Select location</option>
				                                  @forelse(\App\location_model::all() as $data)
				                                  	<option value="{{$data->location}}">{{$data->location}}</option>
				                                  @empty
				                                  @endforelse
				                                  <option value="10000">Other</option>
				                                </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Vehical Type</th>
							                  <td>
							                  	  <select class="form-control" name="vehical_type" id="exampleFormControlSelect1">
					                                  <option value="" selected>Select Vehicle</option>
					                                  @forelse(\App\vehicle_model::all() as $vehicle)
					                                  <option value="{{$vehicle->vehicle}}">{{$data->vehicle}}</option>
					                                  @empty
					                                  @endforelse
					                                  <option value="v_other">Other</option>
				                                </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Case Type</th>
							                  <td>
							                  	<select class="form-control" name="crime_type" id="exampleFormControlSelect1">
			                                  <option value="" selected>Select Crime List</option>
			                                  @forelse(\App\crime_model::all() as $data)
			                                  <option value="{{$data->crime}}">{{$data->crime}}</option>
			                                  @empty
			                                  @endforelse
			                                  <option value="crime_others">Others</option>
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
 								    </form> -->
								    </div>
								  </div>
								</div>
							@endforeach


























<script>
		function checkAll(ele)
		{
		var checkboxes = document.getElementsByTagName('input');
		if (ele.checked)
		{
					    for (var i = 0; i < checkboxes.length; i++)
					     {
					             if (checkboxes[i].type == 'checkbox')
					             {
					                 checkboxes[i].checked = true;
					             }
					     }
		}
						else
						 {
						         for (var i = 0; i < checkboxes.length; i++)
						          {
						             console.log(i)
						             if (checkboxes[i].type == 'checkbox')
						             {
						                 checkboxes[i].checked = false;
						             }
						          }
					     }
		}
</script>

 @endsection
