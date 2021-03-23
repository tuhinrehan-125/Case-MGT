<table id="allcase" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
    <thead>
    <tr>
    <th data-priority="1">Sl.</th>
    <th data-priority="2">Case No.</th>
    <th>Name</th>
    <th>Mobile No.</th>
    <th>Vehicle Reg.No</th>

    <th>Date of offence</th>
    <th>Time of offence</th>
    <th>Date Diposal</th>
    <!--<th>Time Diposal</th>-->
    <th>Location</th>

    <th>Vehical Type</th>
    <th>Case Type</th>
    <th>Victim Type</th>
    <th>Name of MP</th>
    <th>Paper Ceased</th>
    <th data-priority="3">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($allcase as $data)
    <tr>
        <td>{{$loop->iteration}}</td>
        </td>
        <td>{{$data->case_no}}</td>
        <td>{{$data->victim_name}}</td>
        <td>{{$data->victim_mb}}</td>
        <td>{{$data->vehical_reg}}</td>
        <td>{{$data->date_off}}</td>
        <td>{{$data->time_off}}</td>
        <td>{{$data->date_disposal}}</td>
        <td>{{$data->loc}}</td>
        <td>{{$data->vehical_type}}</td>
        <td>
        @if($data->crime_type!='null')
        @foreach(json_decode($data->crime_type ?? '', true) as $info)
            @php
                $cr=$crimes->where('id',$info ?? '')->first();
            @endphp
            {{$cr->crime ?? ''}},
        @endforeach
    @else
        Null
    @endif
        </td>
        <td>{{$data->victim}}</td>
        <td>{{!empty($data->Unitauth->name) ? $data->Unitauth->name : '' }}</td>
        <td>

            @if($data->paper == 'null')
                null
            @else
                @forelse(json_decode($data->paper, true) as $datapaper)
                    {{$datapaper}},
                @empty
                @endforelse
                {{-- @if(empty($data->paper_number))
                @else
                    {{$data->paper_number}}
                @endif --}}
            @endif
        </td>
        <td>
            <table>
                <tr>
                    <td>
                        <a href=""
                            class="btn btn-sm btn-info edit-btn-case-desk"
                            data-toggle="modal" data-id="{{$data->id}}"
                            data-target="#exampleModaledit">
                            <!-- <i class="fas fa-pencil-alt"> -->
                            </i> Edit
                        </a>
                    </td>
                    <td><a href="{{route('unitauth.case-slip',$data->id ?? '')}}" class="btn btn-sm btn-danger" target="_blank"> <i class="fa fa-print"></i> Case Slip</a></td>

                </tr>
            </table>
        </td>
    </tr>
    @endforeach
    </tbody>
    </tbody>
    </table>
    {{$allcase->links()}}
