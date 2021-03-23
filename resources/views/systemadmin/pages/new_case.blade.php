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
              <h3 class="card-title text-danger text-bold">New Case List</h3>
            </div>
            <!-- /.card-header -->
                <!---===============================Filtering===============================================--->
                <div class="card-header text-center">
                    <form action="{{route('systemadmin.search_case')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="from_sl" class="form-control" placeholder="Case Number (From)">
                            </div>
                            <div class="col">
                                <input type="text" name="to_sl" class="form-control" placeholder="Case Number (To)">
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
                <!---===============================Filtering===============================================--->
                <div class="card-body">

                    <form action="{{route('systemadmin.caseforward')}}" method="POST">
                        {{csrf_field()}}
{{--                        <button type="submit" class="btn btn-sm btn-success" name="buttton" value="forward">Forward All &nbsp; <i class="fa fa-forward" aria-hidden="true"></i></button>
                        &nbsp;--}}
                        <button type="submit" class="btn btn-sm btn-danger" name="buttton" value="print">Print &nbsp; <i class="fa fa-print" aria-hidden="true"></i></button><br>
                        <br>
                        <div>
                            @error('chk')
                            <span class="text-danger">Select at lest one Case<!--{{ $message }}--></span>
                            @enderror
                        </div>
                        <div class="icheck-success d-inline">
                            <input type="checkbox" id="select-all" onchange="checkAll(this)" name="chk[]">
                            <label for="select-all"></label>
                        </div>
                        <label for="checkboxSuccess3">Select all &nbsp;</label>
            <div class="table-responsive">
              <table id="" class="table table-bordered table-striped example1ddd">
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
                  <th>Date Diposal</th>
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
                @foreach($newcase as $data)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><span class="icheck-success d-inline">
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
                  <td>{{\App\addmp_model::find($data->id_mp)->name_mp ?? '' }}</td>
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
                          {{$data->paper_number}}
                          @endif --}}
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
                        		<a href="{{route('systemadmin.caseforward_single',$data->id)}}" name="buttton" value="singleforward" class="btn btn-sm btn-danger">Forward</a>
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
	<a href="{{route('systemadmin.print_allcase')}}" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i>Print All</a>
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

									<form action="{{route('systemadmin.case_update',$data->id)}}" method="POST">
										{{csrf_field()}}
										{{method_field('PATCH')}}
                                    <input type="hidden" class="form-control" value="{{$data->case_no}}" name="case_no" placeholder="Case No">
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
							                  <td>
{{--                                                  <select class="form-control" name="id_mp" >
                                                      --}}{{--<option value="" selected>Select MP Name</option>--}}{{--
                                                      @forelse(\App\addmp_model::all() as $mp)
                                                          <option value="{{$mp->id}}">{{$mp->name}} {{$mp->id === $data->id_mp ? 'selected' : ''}}</option>
                                                      @empty
                                                      @endforelse
                                                      --}}{{--<option value="other">Other</option>--}}{{--
                                                  </select>--}}
                                                  <select class="form-control select2bs4" name="id_mp" style="width: 100%;">
                                                      <option selected="selected" value="">Select Mp Name</option>
                                                      @forelse(\App\addmp_model::all() as $mp)
                                                          <option value="{{$mp->id}}" {{$data->id_mp == $mp->id ? 'selected' : ''}}>{{$mp->name_mp}}</option>
                                                      @empty
                                                      @endforelse
                                                  </select>
                                              </td>
							                </tr>
							                <tr>
							                  <th>Date of Offence</th>
							                  <td><input type="text" class="form-control datepickeoff" name="date_off" value="{{$data->date_off}}" ></td>
							                </tr>
							                <tr>
							                  <th>Time of Offence</th>
							                  <td><input type="time" class="form-control" name="time_off" value="{{$data->time_off}}"></td>
							                </tr>
							                <tr>
							                  <th>Date of Diposal</th>
							                  <td><input type="text" class="form-control datepickeoff" name="date_disposal" value="{{$data->date_disposal}}"></td>
							                </tr>
							                <tr>
							                  <th>Location</th>
							                  <td>
                                                  <select class="form-control select2bs4" name="loc" id=""  {{--onchange="if (this.value=='10000'){userselect.style.display='block'}else {userselect.style.display='none'};"--}}>
                                                      <option value="" selected>Select location</option>
                                                      @forelse(\App\location_model::all() as $loc)
                                                          <option value="{{$loc->location}}" {{$data->loc == $loc->location ? 'selected' : ''}}>{{$loc->location}}</option>
                                                      @empty
                                                      @endforelse
                                                      {{--                               <option value="10000">Other</option>--}}
                                                  </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Vehical Type</th>
							                  <td>
                                                  <select class="form-control select2bs4" name="vehical_type">
                                                      <option value="" selected>Select Vehicle</option>
                                                      @forelse(\App\vehicle_model::all() as $vehicle)
                                                          <option value="{{$vehicle->vehicle}}" {{$data->vehical_type ==  $vehicle->vehicle  ? 'selected' : ''}}>{{$vehicle->vehicle}}</option>
                                                      @empty
                                                      @endforelse
                                                      {{--<option value="v_other">Other</option>--}}
                                                  </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Case Type</th>
							                  <td>
                                                  <div class="select2-purple">
                                                      <select class="select23" name="crime_type[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                          @forelse(\App\crime_model::all() as $crime)

                                                              @if($data->crime_type == 'null')
                                                                  <option value="{{$crime->crime}}"> {{$crime->crime}}</option>
                                                              @else
                                                                  @php $flag=false @endphp
                                                                  @forelse(json_decode($data->crime_type, true) as $crimee)

                                                                      @if($crimee == $crime->crime)
                                                                          @php $flag=true @endphp

                                                                      @endif
                                                                  @empty
                                                                  @endforelse
                                                                  @if($flag)
                                                                      <option value="{{$crime->crime}}"    selected   > {{$crime->crime}}</option>

                                                                  @else
                                                                      <option value="{{$crime->crime}}"> {{$crime->crime}}</option>
                                                                  @endif
                                                              @endif
                                                          @empty
                                                          @endforelse
                                                      </select>
                                                  </div>

							                  </td>
							                </tr>
							                <tr>
							                  <th>Victim Type</th>
							                  <td>
                                                  <select class="form-control select2bs4" name="victim" >
                                                      <option value="driver" {{'driver' === $data->victim ? 'selected' : ''}} >Driver</option>
                                                      <option value="owner" {{'owner' === $data->victim ? 'selected' : ''}} >Owner</option>
                                                      <option value="others" {{'others' === $data->victim ? 'selected' : ''}} >Others</option>
                                                  </select>
							                  </td>
							                </tr>
							                <tr>
							                  <th>Paper Ceased</th>
							                  <td>
                                                  <div class="select2-purple">
                                                      <select class="select23" name="paper[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                          @foreach(\App\paper_model::all() as $paper)
                                                              @if($data->paper == 'null')
                                                                  <option value="{{$paper->paper}}">{{$paper->paper}}</option>
                                                              @else
                                                                  @php $flagg=false @endphp
                                                                  @foreach(json_decode($data->paper, true) as $papere)

                                                                      @if($papere == $paper->paper)
                                                                          @php $flagg=true @endphp
                                                                      @endif

                                                                  @endforeach
                                                                  @if($flagg)
                                                                      <option value="{{$paper->paper}}" selected>{{$paper->paper}}</option>

                                                                  @else
                                                                      <option value="{{$paper->paper}}">{{$paper->paper}}</option>
                                                                  @endif
                                                              @endif
                                                          @endforeach
                                                      </select>
                                                      {{-- <br>
                                                      <input type="text" class="form-control" name="paper_number" value="{{$data->paper_number}}" placeholder="Number"> --}}
                                                  </div>



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
