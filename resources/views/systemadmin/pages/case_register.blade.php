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
                            <li class="breadcrumb-item"><a href="#"><!--Home--></a></li>
                            <li class="breadcrumb-item active"><!--Dashboard v1--></li>
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

                    <div class="col-lg-2 col-md-2 col-sm-12">
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-uppercase text-center text-red">
                                    <!--<i class="fas fa-chart-pie mr-1"></i>-->
                                    <b>register case</b>
                                </h3>
                            </div>

                            <div class="card-body">
                                <form action="{{route('systemadmin.register_case')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{--<input type="hidden" name="id_mp" value="{{ Auth::user()->id }}">--}}
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Case No</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="case_no" id="inputEmail3" placeholder="Case No">
                                            @if ($errors->has('case_no'))
                                                <span class="help-block text-danger">
                                        <strong>{{ $errors->first('case_no') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">MP Name</label>
                                        <div class="col-sm-10">
{{--                                            <select class="form-control" name="id_mp" >
                                                --}}{{--<option value="" selected>Select MP Name</option>--}}{{--
                                                @forelse(\App\Mp::all() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @empty
                                                @endforelse
                                                --}}{{--<option value="other">Other</option>--}}{{--
                                            </select>--}}
                                            <select class="form-control select2bs4" name="id_mp" style="width: 100%;">
                                                <option selected="selected" value="">Select Mp Name</option>
                                                @forelse(\App\addmp_model::all() as $mp)
                                                    <option value="{{$mp->id}}">{{$mp->name_mp}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="victim_name" id="inputEmail3" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile No</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="victim_mb" id="inputPassword3" placeholder="Mobile No. Ex. 01888888888">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Vehical Reg. No</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="vehical_reg" id="inputPassword3" placeholder="Vehical Reg. No">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Date offence</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control datepickeoff" name="date_off" value="<?php echo date('d/m/Y'); ?>" id="datepicker" >
                                        </div>

                                        <label for="inputPassword3" class="col-sm-1 col-form-label">Time</label>
                                        <div class="col-sm-3">
                                            <input type="time" class="form-control" name="time_off" value="<?php echo date('H:i'); ?>" id="inputPassword3">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Date Diposal</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control datepickeoff" name="date_disposal" value="<?php echo \Carbon\Carbon::now()->addDays('30')->format('d/m/Y'); ?>">
                                     </div>

{{--                                       <label for="inputPassword3" class="col-sm-2 col-form-label">Time</label>
                                       <div class="col-sm-4">
                                                                    <input type="text" class="form-control datepickerrrrrppp">
                                        </div>--}}

                                    </div>


                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-2 col-form-label">Location</label>
                                            <div class="col-sm-4">
                                                <select class="form-control select2bs4" name="loc" id=""  {{--onchange="if (this.value=='10000'){userselect.style.display='block'}else {userselect.style.display='none'};"--}}>
                                                    <option value="" selected>Select location</option>
                                                    @forelse(\App\location_model::all() as $data)
                                                        <option value="{{$data->location}}">{{$data->location}}</option>
                                                    @empty
                                                    @endforelse
                                                    {{--                               <option value="10000">Other</option>--}}
                                                </select>
                                                {{--                                <input type="text" class="form-control" name="loc" id="loc_text" style="display:none;" placeholder="Enter Location"/>
                                                                                <script>
                                                                                      var userselect = document.getElementById('loc_text');
                                                                                </script>--}}
                                            </div>
                                            <!--                         </div>
                                                                  </fieldset>


                                                                  <fieldset class="form-group">
                                            <div class="row"> -->
                                            <label class="col-form-label col-sm-2 col-form-label">Vehical Type</label>
                                            <div class="col-sm-4">
                                                <select class="form-control select2bs4" value="" name="vehical_type" id="" {{--onchange="if (this.value=='v_other'){v_select.style.display='block'}else {v_select.style.display='none'};"--}}>
                                                    <option value="" selected>Select Vehicle</option>
                                                    @forelse(\App\vehicle_model::all() as $data)
                                                        <option value="{{$data->vehicle}}">{{$data->vehicle}}</option>
                                                    @empty
                                                    @endforelse
                                                    {{--<option value="v_other">Other</option>--}}
                                                </select>
                                                {{--                                <input type="text" class="form-control" name="vehical_type" id="vehical_text" style="display:none;" placeholder="Enter Vehical Type"/>
                                                                                <script>
                                                                                      var v_select = document.getElementById('vehical_text');
                                                                                </script>--}}
                                            </div>
                                        </div>
                                    </fieldset>


                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-3 col-form-label"><!-- Victim -->Type of offender</label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2bs4" name="victim" id="" id="" {{--onchange="if (this.value=='victim_others'){victim_select.style.display='block'}else {victim_select.style.display='none'};"--}}>
                                                    <option value="">Select victim</option>
                                                    <option value="driver">Driver</option>
                                                    <option value="owner">Owner</option>
                                                    {{--<option value="victim_others">Others</option>--}}
                                                </select>
                                            </div>

                                            {{--                          <div class="col-sm-4">
                                                                            <input type="textbox" class="form-control" name="victim" id="victim_text" style="display:none;" placeholder="Enter Victim Type"/>
                                                                            <script>
                                                                                  var victim_select = document.getElementById('victim_text');
                                                                            </script>
                                                                      </div>--}}
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-2 col-form-label">Crime List</label>
                                            <div class="col-sm-10">
{{--                                                <select class="form-control" name="crime_type[]" multiple>
                                                    @forelse(\App\crime_model::all() as $data)
                                                        <option value="{{$data->crime}}">{{$data->crime}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>--}}
                                                <div class="select2-purple">
                                                    <select class="select23" name="crime_type[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        @forelse(\App\crime_model::all() as $data)
                                                            <option value="{{$data->crime}}">{{$data->crime}}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-2 col-form-label">Paper Ceased</label>
                                            <div class="col-sm-7">
                                                <div class="select2-purple">
                                                    <select class="select23" name="paper[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        @foreach(\App\paper_model::all() as $paper)
                                                            <option value="{{$paper->paper}}" >{{$paper->paper}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-sm-3">
                                                <input type="text" class="form-control" name="paper_number" placeholder="Number">
                                            </div> --}}
                                        </div>
                                    </fieldset>


                                    <!--                     <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Upload Paper</label>
                                        <div class="col-sm-10">
                                          <input type="file" class="form-control" name="paper_image" id="inputEmail3" placeholder="Case No">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Upload Photo</label>
                                        <div class="col-sm-10">
                                          <input type="file" class="form-control" name="outher_image" id="inputEmail3" placeholder="Case No">
                                        </div>
                                      </div> -->




                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-block btn-md btn-success float-right">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>








                    </div>



                    <div class="col-lg-2 col-2">
                    </div>




                </div>
            </div>
        </section>
    </div>
@endsection
