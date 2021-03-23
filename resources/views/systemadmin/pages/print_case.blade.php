<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">







			<div class="table-responsive">
				<div class="float-right">
					<h6>Supplement</h6>
					<h6>Logistics area military police unit</h6>
					<h6>Letter No:</h6>
					<h6>Date:</h6>
				</div>
				<br>
				<br>
				<br>
				<div>
					<h3 class="text-center">List of accused vehicles with seized documents</h3>
				</div>
		    <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Sl./No</th>
                  <th>Date of Offence(Time)</th>
                  <th>Date of Diposal</th>
				  <th>Vehical Type</th>
				  <th>Vehicle Reg.No</th>
				  <th>Location</th>
				  <th>Type of offence<!-- Case Type --></th>
				  <th>Paper Ceased</th>
				  <th>Date of Send CEO Office</th>
				  <th>Comment</th>
                </tr>
                </thead>
                <tbody>
                @forelse($allcase as $data)
                <tr>
                  <td>{{$loop->iteration}}</td>
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
              <script type="text/javascript">
			  	window.addEventListener("load", window.print());
			  </script>
         </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
