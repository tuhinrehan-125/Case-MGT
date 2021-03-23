@extends('unitauth.layout.airforce-master')
@section('title', 'Dashboard')
@section('content')
<style type="text/css" media="print">
    @page { size: landscape; }
  </style>
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
              <h3 class="card-title text-danger text-bold">Forward Case List</h3>
            </div>
            <!--==========================================================Filtering============================-->
            <div class="card-header text-center">
                {{-- <div class="form-row">
                    <label>From</label>
                    <div class="col">
                        <input type="text" name="from_date" class="form-control datepickeoff from_date">
                    </div>
                    <label>To</label>
                    <div class="col">
                        <input type="text" name="to_date" class="form-control datepickeoff to_date">
                    </div>
                    <div class="col">
                        <button input="submit" class="btn btn-danger filter-data-case"><i class="fa fa-search" aria-hidden="true"></i> Show collection</button>
                    </div>
                </div>
            </div> --}}
            <!--==========================================================Filtering============================-->

            <!-- /.card-header -->
            <div class="card-header text-rigth">

                <button class="btn btn-default btn-primary" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true" style="    font-size: 17px;"> Print</i></button>
                </div>
            <div class="card-body table-responsive" id="printableArea" style="@page { size: landscape; }">
                <div class="row">
                    <div class="col-md-3">
                        <div class="m-0">
                            <div style="margin-left: 100px">
                                <img src="{{asset('/frontend/image/can_logo.png')}}" class="m-0" alt="logo" height="50px" width="50px"> <br>
                            </div>
                        <p class="text-left" style="margin-left: 100px">Cantonment Board Office <br>
                        Dhaka Cantonment, Dhaka-1206 <br>
                        Phone : 02-9835595 (T&T), 7210 (Army) <br>
                        Email: ceocbd@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3><center class="text-uppercase mt-5 font-weight-bold"><u>Seized documents List of accused vehicles</u></center></h3>
                    </div>
                    <div class="col-md-3">
                        <div style="margin-left: 100px">
                        <img src="@if(Auth::user()->unit_id==1) {{asset('/logo/lmp.png')}} @elseif(Auth::user()->unit_id==2)   {{asset('/logo/army.png')}} @else {{asset('/logo/airforce.png')}} @endif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="50px" width="50px" >
                        </div>
                            @if(Auth::user()->unit_id==1)
                            <p class="text-left" style="margin-left: 100px">Defence Military Police <br>
                                Logistics area MP Unit, <br>
                                Dhaka Cantonment. <br>
                                Phone : 02-9835595 (T&T), 7210 (Army) <br>
                            </p>
                            @elseif(Auth::user()->unit_id==2)
                            <p class="text-left" style="margin-left: 100px">Defence Military Police <br>
                                Army MP Unit, <br>
                                Dhaka Cantonment. <br>
                                Phone : 02-9835595 (T&T), 7210 (Army) <br>
                            </p>
                            @elseif(Auth::user()->unit_id==3)
                            <p class="text-left" style="margin-left: 100px">Defence Military Police <br>
                                Airforce MP Unit, <br>
                                Dhaka Cantonment. <br>
                                Phone : 02-9835595 (T&T), 7210 (Army) <br>
                            </p>
                            @endif
                    </div>
                </div>
              <table id="forward-case" class="table table-striped table-bordered dt-responsive nowrap w-100">
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
                  <!--<th>Time Diposal</th>-->
                  <th>Location</th>

                  <th>Vehical Type</th>
                  <th>Case Type</th>
                  <th>Victim Type</th>
                  <th>Name of MP</th>
                  <th>Paper Ceased</th>
                </tr>
                </thead>
              <tbody>
              @foreach($forward as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->CaseDetails->case_no}}</td>
                <td>{{$data->CaseDetails->victim_name}}</td>
                <td>{{$data->CaseDetails->victim_mb}}</td>
                <td>{{$data->CaseDetails->vehical_reg}}</td>

                <td>{{$data->CaseDetails->date_off}}</td>
                <td>{{$data->CaseDetails->time_off}}</td>
                <td>{{$data->CaseDetails->date_disposal}}</td>
                <!--<td>{{$data->CaseDetails->time_disposal}}</td>-->
                <td>{{$data->CaseDetails->loc}}</td>

                <td>{{$data->CaseDetails->vehical_type}}</td>
                <td>
                @if($data->CaseDetails->crime_type!='null')
                    @foreach(json_decode($data->CaseDetails->crime_type, true) as $info)
                        @php
                            $cr=$crimes->where('id',$info ?? '')->first();
                        @endphp
                        {{$cr->crime ?? ''}},
                    @endforeach
                @else
                    Null
                @endif
                </td>
                <td>{{$data->CaseDetails->victim}}</td>
                <td>{{!empty($data->CaseDetails->Unitauth->name) ? $data->CaseDetails->Unitauth->name : ''}}</td>
                <td>
                    @if($data->CaseDetails->paper == 'null')
                        null
                    @else
                        @forelse(json_decode($data->CaseDetails->paper, true) as $datapaper)
                            {{$datapaper}}
                        @empty
                        @endforelse
                            {{-- @if(empty($data->CaseDetails->paper_number))
                            @else
                            ({{$data->CaseDetails->paper_number}})
                            @endif --}}
                    @endif
                </td>
              </tr>
              @endforeach
              </tbody>
              </table>


            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
         </div>

        </div>
      </div>
    </section>
 </div>
 @endsection
@section('js')
 <script>

    // function printDiv(divName) {
    //     $("#header").removeClass('d-none')
    //      var printContents = document.getElementById(divName).innerHTML;
    //      var originalContents = document.body.innerHTML;
    //      document.body.innerHTML = printContents;
    //      window.print();
    //      document.body.innerHTML = originalContents;
    // }
    function printDiv(divName) {
        $("#header").removeClass('d-none')
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;


         var css = '@media print {body { font-size: 10px }} @page { size: landscape; }',
        //   var css = 'div#printableArea tbody { font-size: 13px;}',
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet){
        style.styleSheet.cssText = css;
        } else {
        style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);
        document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
    }
    </script>
    @endsection
