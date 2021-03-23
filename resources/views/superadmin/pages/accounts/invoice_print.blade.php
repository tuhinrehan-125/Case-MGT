
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DCB Case| Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/backend/plugins/fontawesome-free\css\all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/backend/dist/css/adminlte.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice p-5">
        <p class="text-center">Office Copy</p>
        <!-- title row -->
        <div class="row">

            <div class="col-12">
                <h2 class="page-header">
                    <img src="{{asset('/frontend/image/can_logo.png')}}" alt="log" height="40px" width="40px"> CANTONMENT BOARD,DHAKA.
                    <small class="float-right">Date: {{$accounts->date ?? date('d-m-Y')}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Cantonment Board,Dhaka.</strong><br>
                    Cantonment Board Office<br>
                    Dhaka Cantonment, Dhaka-1206<br>
                    Phone : 02-9835565 (T&T), 7210 (Army)<br>
                    Email: ceocbd@gmail.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>Name: {{$case->victim_name ?? ''}}</strong><br>
                    Phone: {{$case->victim_mb ?? ''}}<br>
                    Vehicle Reg No: {{$case->vehical_reg ?? ''}}<br>
                    @if(!empty($withdraData))

                   <b>Courier Address: {{$withdraData->courier_address ?? ''}}</b><br>
                    @endif
{{--                    Phone: {{$case->victim_name ?? ''}}<br>--}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #00{{$accounts->id}}</b><br>
                <b>Case No:</b> {{$case->case_no ?? ''}}<br>
                <b>Paper Collect: <br> @foreach(json_decode($case->paper) as  $pdata) </b> <li>{{$pdata ?? ''}}</li>@endforeach
{{--                <b>Account:</b> 968-34567--}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">

            <div class="col-12 table-responsive ">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Crime</th>
                        <th>Fine</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(json_decode($case->crime_type) as $crimed)
                        @php
                        $crimeData=$crime->where('id',$crimed)->first();
                        @endphp
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$crimeData->crime ?? ''}}</td>
                        <td>{{$crimeData->fine_crime ?? ''}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Payment Methods:  <b>{{$accounts->payment_method?? ''}}</b></p>
                Date:  {{$accounts->date?? ''}} <br>
                Banking:  {{$accounts->bank_branch ?? ''}} <br>
                Tax Or Transaction ID:  {{$accounts->tax_transaction_id?? ''}} <br>
                {{-- @if($accounts->payment_method=='Cache')
                    <br>
                    Date:  {{$accounts->date?? ''}} <br>
                @elseif($accounts->payment_method=='Cheque')
                    <br>
                    Bank:  {{$accounts->bank_branch ?? ''}} <br>
                    Account number:  {{$accounts->account_number ?? ''}} <br>
                    Cheque number:  {{$accounts->cheque_number ?? ''}} <br>
                    Date:  {{$accounts->date?? ''}} <br>
                @elseif($accounts->payment_method=='Mobile Banking')
                    <br>
                    Mobile Banking Operator:  {{$accounts->mobile_operator?? ''}} <br>
                    Account Number:  {{$accounts->mobile_number?? ''}} <br>
                    Tax Or Transaction ID:  {{$accounts->tax_transaction_id?? ''}} <br>
                    Reference:  {{$accounts->reference?? ''}} <br>
                    Date:  {{$accounts->date?? ''}} <br>
                @endif --}}
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                </p>

                <img src="{{asset('/frontend/image/paid.png')}}" alt="" height="100px" width="200px" style="margin-left: 250px; margin-top: -200px;">
            </div>
            <!-- /.col -->
            <div class="col-6">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{$release->total_fine ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Consider</th>
                            <td>{{$release->consider ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>{{$accounts->total ?? ''}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <section class="invoice p-5">
        <p class="text-center">User Copy</p>
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h2 class="page-header">
                    <img src="{{asset('/frontend/image/can_logo.png')}}" alt="log" height="40px" width="40px"> CANTONMENT BOARD,DHAKA.
                    <small class="float-right">Date: {{$accounts->date ?? date('d-m-Y')}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Cantonment Board,Dhaka.</strong><br>
                    Cantonment Board Office<br>
                    Dhaka Cantonment, Dhaka-1206<br>
                    Phone : 02-9835565 (T&T), 7210 (Army)<br>
                    Email: ceocbd@gmail.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>Name: {{$case->victim_name ?? ''}}</strong><br>
                    Phone: {{$case->victim_mb ?? ''}}<br>
                    Vehicle Reg No: {{$case->vehical_reg ?? ''}}<br>
                    @if(!empty($withdraData))

                    <b>Courier Address: {{$withdraData->courier_address ?? ''}}</b><br>
                     @endif
{{--                    Phone: {{$case->victim_name ?? ''}}<br>--}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #00{{$accounts->id}}</b><br>
                <b>Case No:</b> {{$case->case_no ?? ''}}<br>
                <b>Paper Collect: <br> @foreach(json_decode($case->paper) as  $pdata) </b> <li>{{$pdata ?? ''}}</li>@endforeach
{{--                <b>Payment Due:</b> 2/22/2014<br>--}}
{{--                <b>Account:</b> 968-34567--}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive ">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Crime</th>
                        <th>Fine</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(json_decode($case->crime_type) as $crimed)
                        @php
                        $crimeData=$crime->where('id',$crimed)->first();
                        @endphp
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$crimeData->crime ?? ''}}</td>
                        <td>{{$crimeData->fine_crime ?? ''}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Payment Methods:  <b>{{$accounts->payment_method?? ''}}</b></p>
                <br>
                Date:  {{$accounts->date?? ''}} <br>
                Banking:  {{$accounts->bank_branch ?? ''}} <br>
                Tax Or Transaction ID:  {{$accounts->tax_transaction_id?? ''}} <br>
                {{-- @if($accounts->payment_method=='Cache')
                    <br>
                    Date:  {{$accounts->date?? ''}} <br>
                @elseif($accounts->payment_method=='Cheque')
                    <br>
                    Bank:  {{$accounts->bank_branch ?? ''}} <br>
                    Account number:  {{$accounts->account_number ?? ''}} <br>
                    Cheque number:  {{$accounts->cheque_number ?? ''}} <br>
                    Date:  {{$accounts->date?? ''}} <br>
                @elseif($accounts->payment_method=='Mobile Banking')
                    <br>
                    Mobile Banking Operator:  {{$accounts->mobile_operator?? ''}} <br>
                    Account Number:  {{$accounts->mobile_number?? ''}} <br>
                    Tax Or Transaction ID:  {{$accounts->tax_transaction_id?? ''}} <br>
                    Reference:  {{$accounts->reference?? ''}} <br>
                    Date:  {{$accounts->date?? ''}} <br>
                @endif --}}
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                </p>
                <img src="{{asset('/frontend/image/paid.png')}}" alt="" height="100px" width="200px" style="margin-left: 250px; margin-top: -200px;">

            </div>
            <!-- /.col -->
            <div class="col-6">
{{--                <p class="lead">Amount Due {{date('d-m-Y')}}</p>--}}

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{$release->total_fine ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Consider</th>
                            <td>{{$release->consider ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>{{$accounts->total ?? ''}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
</body>
</html>
