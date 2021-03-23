@extends('superadmin.layout.app')
@section('title', 'Dashboard')

@section('css')

<style>
    .ui-datepicker {
        width: 33em;
        padding: .2em .2em 0;
        display: none;
    }

    .ui-datepicker table {
        width: 100%;
        font-size: .9em;
        border-collapse: collapse;
        margin: 0 0 .4em;
    }

    .ui-datepicker-current-day .ui-state-active {
        background: #00c054;
    }

    @import 'https://fonts.googleapis.com/css?family=Open+Sans';

    * {
        margin: 0;
        padding: 0;
    }

    body {
        background: radial-gradient(#eee, #668);
        height: 100vh;
        width: 100vw;
    }

    #date {
        background: rgba(0, 0, 0, 0.1);
        color: #fff;
        font-family: "Open Sans", sas-serif;
        font-size: 2em;
        padding: 0.5em;
        text-align: center;
    }

    #clock {
        align-items: center;
        -webkit-align-items: center;
        display: flex;
        display: -webkit-flex;
        height: 130px;
        justify-content: space-around;
        -webkit-justify-content: space-around;
        left: calc(50% - 300px);
        position: absolute;
        top: calc(50% - 65px);
        width: 600px;
        margin-top: 40px;
    }

    .unit {
        background: linear-gradient(#aaa, #777);
        border-radius: 15px;
        box-shadow: 0 2px 2px #444;
        color: #fff;
        font-family: "Open Sans", sans-serif;
        font-size: 5em;
        height: 100%;
        line-height: 130px;
        margin: 0 10px;
        text-align: center;
        text-shadow: 0 2px 2px #666;
        width: 23%;
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 640px) {
        .unit {
            font-size: 2em;
            height: 70px;
            width: 64px;
            margin-right: 0;
            margin-left: 0;
            line-height: 79px;
        }

        #clock {
            margin-top: 40px;
            margin-left: 150px;
            width: 300px;
        }
    }
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="forward-case"></h3>

                            <p>Forward Case</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('superadmin.sa_forward_case')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="accept-case"></h3>

                            <p>Accept Case</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('superadmin.accept_case')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="release-case"></h3>

                            <p>Release Case</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('superadmin.release.data')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3 id="total"></h3>

                            <p>Total Collection Amount</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('superadmin.all.invoice')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="drop-case"></h3>

                            <p>Drop Case</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{Auth::user()->role_id==1 || Auth::user()->role_id==2 ? route('superadmin.drop.case') : '#'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="army-case"></h3>

                            <p>Army Cases</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <p class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></p>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="mp"></h3>

                            <p>13-MP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <p class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></p>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="airforce-case"></h3>

                            <p>Airforce</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <p class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></p>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                {{-- <section class="col-lg-6 col-sm-12 ">
                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">

                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div class="datepickeoff  col-sm-12" style="width: 100%">

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section> --}}
                <section class="col-12 ">

                    <div class="card">
                        <div class="card-header">
                            <p id="date" class=" bg-gradient-olive"></p>
                        </div>
                        <div class="card-body" style="margin-top: 200px">
                            <div id="clock">
                                <p class="unit bg-gradient-olive" id="hours"></p>
                                <p class="unit bg-gradient-olive" id="minutes"></p>
                                <p class="unit bg-gradient-olive" id="seconds"></p>
                                <p class="unit bg-gradient-olive" id="ampm"></p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $(".datepickeoff").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $.ajax({
            type: 'GET',
            success: function(response) {
                $('#forward-case').html(response[0]);
                $('#release-case').html(response[2]);
                $('#accept-case').html(response[1]);
                $('#total').html(response[3]);
                $('#drop-case').html(response[4]);
                $('#army-case').html(response[5]);
                $('#mp').html(response[6]);
                $('#airforce-case').html(response[7]);
            }
        })

        var $dOut = $('#date'),
            $hOut = $('#hours'),
            $mOut = $('#minutes'),
            $sOut = $('#seconds'),
            $ampmOut = $('#ampm');
        var months = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];

        var days = [
            'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
        ];

        function update() {
            var date = new Date();

            var ampm = date.getHours() < 12 ?
                'AM' :
                'PM';

            var hours = date.getHours() == 0 ?
                12 :
                date.getHours() > 12 ?
                date.getHours() - 12 :
                date.getHours();

            var minutes = date.getMinutes() < 10 ?
                '0' + date.getMinutes() :
                date.getMinutes();

            var seconds = date.getSeconds() < 10 ?
                '0' + date.getSeconds() :
                date.getSeconds();

            var dayOfWeek = days[date.getDay()];
            var month = months[date.getMonth()];
            var day = date.getDate();
            var year = date.getFullYear();

            var dateString = dayOfWeek + ', ' + month + ' ' + day + ', ' + year;

            $dOut.text(dateString);
            $hOut.text(hours);
            $mOut.text(minutes);
            $sOut.text(seconds);
            $ampmOut.text(ampm);
        }

        update();
        window.setInterval(update, 1000);

    })
</script>
@endsection
