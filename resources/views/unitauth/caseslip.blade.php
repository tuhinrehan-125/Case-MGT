<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Dashboard | Case Slip</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('/frontend/assets/images/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    {{-- <title>Hello, world!</title> --}}
	<style>
	#invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 250px;
  background: #FFF;
  }

::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}

#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;}
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url({{asset('/frontend/image/can_logo.png')}}) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}



	</style>
  </head>
  <body  onload="generateBarcode()">

  <div id="invoice-POS">

    <center id="top">
      <div class="logo">

      </div>
      <div class="info">
        <h2>Dhaka Cantonment Board</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->

    <div id="mid">
      <div class="info">
        @if($case->packet_number!=null)
        <h2>Packet No</h2>
        @else
        <h2>Case No : {{$case->case_no ?? ''}}</h2>
        @endif
        @if($case->packet_number!=null)
        <p>
            <div id="barcodeTarget" class="barcodeTarget"></div>
        </p>
        @endif
        <h2>Victime Information</h2>
        <p>
            @if($case->packet_number!=null)
            Case No : {{$case->case_no ?? ''}}</br>
            @endif
            Name : {{$case->victim_name ?? ''}}</br>
            Phone   : {{$case->victim_mb ?? ''}}</br>
            Vehicle Reg No: {{$case->vehical_reg ?? ''}}</br>
        </p>

      </div>
    </div><!--End Invoice Mid-->
    <div id="bot">
        <div id="table">
            @if(!empty($case->crime_type) && $case->crime_type!='null')
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Crime</h2></td>
                    <td class="Rate"><h2>fine</h2></td>
                </tr>
                <?php

                $total=0;
                ?>
                @foreach(json_decode($case->crime_type) as $crimeId)
                <?php
                    $total+=$crime->where('id',$crimeId)->first()->fine_crime;
                ?>
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">{{$crime->where('id',$crimeId)->first()->crime ?? ''}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{$crime->where('id',$crimeId)->first()->fine_crime ?? ''}}</p></td>
                </tr>
                @endforeach

                <tr class="tabletitle">
                    <td class="Rate"><h2>Total</h2></td>
                <td class="payment"><h2>{{$total}}</h2></td>
                </tr>

            </table>
            @endif
        </div><!--End Table-->
        <div id="legalcopy">
            <p class="legal"><strong>Thank you for your business!</strong> </p>
        </div>

    </div><!--End InvoiceBot-->
  </div>
    <!--End Invoice-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{asset('backend/js/barcode-gen')}}/prototype.js" type="text/javascript"></script>
    <script src="{{asset('backend/js/barcode-gen')}}/prototype-barcode.js" type="text/javascript"></script>
    <script type="text/javascript">
      function generateBarcode(){
        $("barcodeTarget").update();
        var value = '{{$case->packet_number ? $case->packet_number : $case->case_no}}';
        var btype='code11'
        var settings = {
          barWidth: '2',
          barHeight: '30',
          addQuietZone: false
        };
        $("barcodeTarget").update().show().barcode(value, btype, settings);
      }
    </script>
</body>
</html>
