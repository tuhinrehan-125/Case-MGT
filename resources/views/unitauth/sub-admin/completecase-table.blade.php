                                    <table id="newcase-complete-subadmin" class="table table-striped table-bordered dt-responsive nowrap w-100 newcase-complete-subadmin">
                                            <thead>
                                            <tr>
                                                <th data-priority="1">Sl.</th>
                                                <th data-priority="2">Case No.</th>
                                                <th>Select</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th >Vehicle Reg.No</th>

                                                <th>Date of offence</th>
                                                <th>Time of offence</th>
                                                <th>Date Disposal</th>
                                                <!--<th>Time Diposal</th>-->
                                                <th>Location</th>

                                                <th>Vehicle Type</th>
                                                <th >Case Type</th>
                                                <th>Victim Type</th>
                                                <th>Name of MP</th>
                                                <th >Paper Ceased</th>
                                                <th data-priority="3">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($newcasecomplet as $key=>$caseData)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$caseData->case_no ?? ''}}</td>
                                            <td>
                                            <span class="icheck-success d-inline"><input class="check-box" type="checkbox" id="newcase1{{$caseData->id}}" name="chk[]" value="{{$caseData->id}}">
                                                <label for="newcase1{{$caseData->id}}"></label>
                                            </span>
                                            </td>
                                            <td>{{$caseData->victim_name ?? ''}}</td>
                                            <td>{{$caseData->victim_mb ?? ''}}</td>
                                            <td>{{$caseData->vehical_reg ?? ''}}</td>
                                            <td>{{$caseData->date_off ?? ''}}</td>
                                            <td>{{$caseData->time_off ?? ''}}</td>
                                            <td>{{$caseData->date_disposal ?? ''}}</td>
                                            <td>{{$caseData->loc ?? ''}}</td>
                                            <td>{{$caseData->vehical_type ?? ''}}</td>
                                            <td>
                                            @if($caseData->crime_type!='null')
                                                @foreach(json_decode($caseData->crime_type, true) as $info)
                                                    @php
                                                        $cr=$crimes->where('id',$info ?? '')->first();
                                                    @endphp
                                                    {{$cr->crime ?? ''}},
                                                @endforeach
                                            @else
                                                Null
                                            @endif
                                            </td>
                                            <td>{{$caseData->victim ?? ''}}</td>
                                            <td>{{!empty($caseData->Unitauth->name) ? $caseData->Unitauth->name : '' }}</td>
                                            <td>
                                            @if($caseData->paper == 'null')
                                                null
                                                @else
                                                    @forelse(json_decode($caseData->paper, true) as $datapaper)
                                                        {{$datapaper}},
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="{{$caseData->id}}" data-target="#exampleModaledit">
                                                        <!-- <i class="fas fa-pencil-alt"> -->
                                                        </i> Edit
                                                        </a>
                                                    </td>
                                                    <td>
                                                    <a href="#" name="buttton" value="singleforward" data-id="{{$caseData->id}}"  class="btn btn-sm btn-danger btn-forward">Forward</a>
                                                    </td>
                                                </tr>
                                                </table>
                                                </td>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th data-priority="1">Sl.</th>
                                                <th data-priority="2">Case No.</th>
                                                <th>Select</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th >Vehicle Reg.No</th>

                                                <th>Date of offence</th>
                                                <th>Time of offence</th>
                                                <th>Date Disposal</th>
                                                <!--<th>Time Diposal</th>-->
                                                <th>Location</th>

                                                <th>Vehicle Type</th>
                                                <th >Case Type</th>
                                                <th>Victim Type</th>
                                                <th>Name of MP</th>
                                                <th >Paper Ceased</th>
                                                <th data-priority="3">Actions</th>
                                            </tr>
                                            </tfoot>
                                </form>
                                </table>
                                {{$newcasecomplet->links()}}
