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
            <h1 class="m-0 text-danger">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-danger">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->






<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <!---Dahboard-->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ \App\casereg_model::where('forwared', '=', '0')
                                        ->where('drop_type', '=', '0')
                                        ->where(function ($query) {
                                            $query->orwhereNull([
                                                  'id_mp','victim_name','victim_mb','vehical_reg','date_off',
                                                  'time_off','date_disposal','loc','victim',
                                                  'vehical_type','crime_type','paper'])
                                                  ->orwhere('crime_type', '=', 'null')
                                                  ->orwhere('paper', '=', 'null');
                                        })->count() ?? ''}}</h3>

                <p>New Case (In complet)</p>
              </div>
              <div class="icon">
                {{--<i class="ion ion-bag"></i>--}}
              </div>
              <a href="{{route('systemadmin.newcaselist')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-12">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{\App\casereg_model::where('forwared', '=', '0')->where('drop_type', '=', '0')->whereNotNull([
                                                                                                        'id_mp','victim_name','victim_mb','vehical_reg','date_off',
                                                                                                        'time_off','date_disposal','loc','victim',
                                                                                                        'vehical_type','crime_type','paper'])
                                                                                                       ->where('crime_type', '!=', 'null')
                                                                                                       ->where('paper', '!=', 'null')->count() ?? ''}}</h3>

                                <p>New Case (Complet)</p>
                            </div>
                            <div class="icon">
                                {{--<i class="ion ion-person-add"></i>--}}
                            </div>
                            <a href="{{route('systemadmin.completnewcase')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                  <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{\App\casereg_model::where('forwared', '=', 1)->where('drop_type', '=', 0)->count() ?? ''}}</h3>

                <p>Forward case</p>
              </div>
              <div class="icon">
                  <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
              </div>
              <a href="{{route('systemadmin.forward_offsofficer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
<!--           <div class="col-lg-3 col-6">
  small box
  <div class="small-box bg-danger">
    <div class="inner">
      <h3>65</h3>

      <p>Total Case</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div> -->
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\casereg_model::whereDate('created_at', \Carbon\Carbon::today())->where('drop_type', '=', '0')->count() }}</h3>

                    <p>Total Number of Case(Today)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
{{--                <a href="{{route('mp.register_case')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\casereg_model::whereMonth('created_at', \Carbon\Carbon::now()->month)->where('drop_type', '=', '0')->count() }}<!-- <sup style="font-size: 20px"></sup> --></h3>

                    <p>Total Number of Case(Monthly)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
 {{--               <a href="{{route('mp.register_case')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{\App\casereg_model::whereYear('created_at', Carbon\Carbon::now()->year)->where('drop_type', '=', '0')->count() }}</h3>

                    <p>Total Number of Case(Yearly)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
{{--                <a href="{{route('mp.register_case')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{\App\casereg_model::whereYear('created_at', Carbon\Carbon::now()->year)->where('drop_type', '=', '0')->count() }}</h3>

                    <p>Total Case</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
{{--                <a href="{{route('mp.register_case')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>

    </div>
</div>
</section>
</div>
@endsection
