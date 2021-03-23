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
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <form action="#" class="register-case-mp" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{--<input type="hidden" name="id_mp" value="{{ Auth::user()->id }}">--}}
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Packate No</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <input id="scanner_input" name="packet_number" class="form-control" placeholder="Click the button to scan or write" type="text" readonly/>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="#" id="scan" class="btn btn-sm btn-primary"data-toggle="modal" data-target="#livestream_scanner">
                                                        Scan
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="#" id="write-btn" class="btn btn-sm btn-success">
                                                        Write
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Vehicle Reg. No</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="vehical_reg" id="inputPassword3" placeholder="Vehical Reg. No">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">MP Name</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" name="id_mp" style="width: 100%;">
                                                <option selected="selected" value="">Select Mp Name</option>
                                                @forelse($mp as $mp)
                                                    <option value="{{$mp->id}}">{{$mp->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Date offence</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control datepickeoff" name="date_off" value="<?php echo date('d-m-Y'); ?>" >
                                        </div>
                                        <label for="inputPassword3" class="col-sm-1 col-form-label">Time</label>
                                        <div class="col-sm-3">
                                            <input type="time" class="form-control" name="time_off" value="<?php echo date('H:i'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Date Disposal</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control datepickeoff" name="date_disposal" value="<?php echo \Carbon\Carbon::now()->addDays('30')->format('d-m-Y'); ?>">
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-2 col-form-label">Location</label>
                                            <div class="col-sm-4">
                                                <select class="form-control selectdata" name="loc" id=""  {{--onchange="if (this.value=='10000'){userselect.style.display='block'}else {userselect.style.display='none'};"--}}>
                                                    <option value="" selected>Select location</option>
                                                    @forelse($location as $loc)
                                                        <option value="{{$loc->location}}" >{{$loc->location}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <label class="col-form-label col-sm-2 col-form-label">Vehicle Type</label>
                                            <div class="col-sm-4">
                                                <select class="form-control select2bs4" value="" name="vehical_type" id="" {{--onchange="if (this.value=='v_other'){v_select.style.display='block'}else {v_select.style.display='none'};"--}}>
                                                    <option value="" selected>Select Vehicle</option>
                                                    @forelse($vehicle as $data)
                                                        <option value="{{$data->vehicle}}">{{$data->vehicle}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
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
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-2 col-form-label">Crime List</label>
                                            <div class="col-sm-10">
                                                <div class="select2-purple">
                                                    <select class="selectdata" name="crime_type[]" multiple="multiple" data-placeholder="Select a crime" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        @forelse($crime as $data)
                                                            <option value="{{$data->id ?? ''}}">{{$data->crime}}</option>
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
                                            <div class="col-sm-10">
                                                <div class="select2-purple">
                                                    <select class="selectdata" name="paper[]" multiple="multiple" data-placeholder="Select a Paper" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        @foreach($papers as $paper)
                                                            <option value="{{$paper->paper ?? ''}}" >{{$paper->paper}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-sm-3">
                                                <input type="text" class="form-control" name="paper_number" placeholder="Number">
                                            </div> --}}
                                        </div>
                                    </fieldset>

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
    <div class="modal" id="livestream_scanner">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">

                    <h4 class="modal-title">Barcode Scanner</h4>

    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body" style="position: static">
    				<div id="interactive" class="viewport"></div>
    				<div class="error"></div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#write-btn").click(function(e){
              $("#scanner_input").removeAttr('readonly');
              $("#scanner_input").focus();
          });
          $("#scan").click(function(e){
              $("#scanner_input").attr('readonly',true);
          });
    //barcode scanner code//
          Quagga.onDetected(function(result) {
            if (result.codeResult.code){
                $('#scanner_input').val(result.codeResult.code);
                Quagga.stop();
                setTimeout(function(){ $('#livestream_scanner').modal('hide'); }, 1000);
            }
            });
            $('.register-case-mp').on('submit', function(event){
                // console.log('paise');
                event.preventDefault();
                $.ajax({
                    url:"{{route('unitauth.register_case')}}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        if (data.success){
                            $('.register-case-mp').trigger("reset");
                            $(".selectdata").trigger("change");
                            toastr.success('Your data inserted Success full','Success');
                            window.open('{{url('unitauth/case-slip/')}}/'+data.id, "_blank");
                        }else{
                            printErrorMsg(data.error)
                            toastr.error('You have something wrong','Error')
                        }
                    }
                });
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
    </script>
@endsection
