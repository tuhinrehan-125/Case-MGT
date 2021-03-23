                            <table id="accept-table" class="table table-sm table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Case No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Vehicle Reg.No</th>
                                    <th>Date of Accepting</th>
                                    <th>Unit</th>
                                    <th>Date Disposal</th>
                                    <th>Box</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($accept as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->CaseDetails->case_no ?? ''}}</td>
                                            <td>{{$data->CaseDetails->victim_name ??''}}</td>
                                            <td>{{$data->CaseDetails->victim_mb ??''}}</td>
                                            <td>{{$data->CaseDetails->vehical_reg ??''}}</td>

                                            <td>{{$data->accept_date ?? ''}}</td>
                                            <td>{{$data->Unit->name ?? ''}}</td>
                                            <td>{{$data->CaseDetails->date_disposal ?? ''}}</td>
                                            <td>{{$data->box_no ?? ''}}</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="{{$data->CaseDetails->id}}"
                                                            >Detail</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-md btn-success edit-data" data-box="{{$data->box_no ?? ''}}" data-forward_id="{{$data->id ?? ''}}" data-toggle="modal" data-id="{{$data->CaseDetails->id}}" data-target="#exampleaccept"
                                                            >Release</button>
                                                            @if(Auth::user()->role_id==1 || Auth::user()->role_id==2)
                                                                @if(Auth::user()->role_id==2 && $data->consider==null)
                                                            <button class="btn btn-md btn-secondary discount-btn" data-toggle="modal" data-target="#consider-modal "  data-case_id="{{$data->CaseDetails->id}}" >Consider {{$data->consider}}</button>
                                                                @endif
                                                                <button class="btn btn-md btn-danger drop-btn" data-box="{{$data->box_no ?? ''}}" data-forward_id="{{$data->id ?? ''}}" data-toggle="modal" data-target="#drop-modal "  data-id="{{$data->CaseDetails->id}}" >Drop</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                <tr>
                                    <th>Sl.</th>
                                    <th>Case No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Vehicle Reg.No</th>
                                    <th>Date of Accepting</th>
                                    <th>Unit</th>
                                    <th>Date Disposal</th>
                                    <th>Box</th>
                                    <th >Action</th>
                                </tr>
                                </tfoot>
                            </table>
                            {{$accept->links()}}
