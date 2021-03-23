
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="a73297b07d8ed75b52a9e3e2-text/javascript">
    var host = "startbootstrap.com";
    if ((host == window.location.host) && (window.location.protocol != "https:"))
      window.location.protocol = "https";
  </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Start Bootstrap">
    <meta name="google-site-verification" content="37Tru9bxB3NrqXCt6JT5Vx8wz2AJQ0G4TkC-j8WL3kw">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Case Print</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        @media print{@page {size: landscape}}

    </style>
</head>
<body onload="window.print()">

<div class="table-responsive"  >
    <div class="float-right">
        <h6>ANX A TO</h6>
        <h6>Logistics area military police unit</h6>
        <h6>Letter No:...............</h6>
        <h6>Date:........................</h6>
    </div>
    <h4 class="text-center mt-5"><u>List of accused vehicles with seized documents</u></h4>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Sl./No</th>
            <th>Case No</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Date of Offence(Time)</th>
            <th>Date of Diposal</th>
            <th>Vehical Type</th>
            <th>Vehicle Reg.No</th>
            <th>Location</th>
            <th>Type of offence<!-- Case Type --></th>
            <th>Paper Ceased</th>
            <th><small>Date of Send CEO Office</small></th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>
        @forelse($allcase as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->case_no}}</td>
                <td>{{$data->victim_name}}</td>
                <td>{{$data->victim_mb}}</td>
                <td>{{$data->date_off}},{{$data->time_off}}</td>
                <td>{{$data->date_disposal}}</td>
                <td>{{$data->vehical_type}}</td>
                <td>{{$data->vehical_reg}}</td>
                <td>{{$data->loc}}</td>
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
                <td>
                    @if($data->paper == 'null')
                        null
                    @else
                        @forelse(json_decode($data->paper, true) as $datapaper)
                            {{$datapaper}}
                        @empty
                        @endforelse
                        {{-- @if(empty($data->paper_number))
                        @else
                        ( {{$data->paper_number}} )
                        @endif --}}
                    @endif
                </td>
                <td></td>
                <td></td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

