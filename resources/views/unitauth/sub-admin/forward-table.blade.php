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
              @foreach($forwared_case as $data)
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
                            {{$datapaper}},
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

              {{$forwared_case->links()}}
