    <table id="forward-table-data" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed ">
        <thead>
        <tr>
            <th>Sl.</th>
            <th>Select</th>
            <th>Case No.</th>
            <th>Name</th>
            <th>Mobile No.</th>
            <th>Vehicle Reg.No</th>
            <th>Date of Forwarding</th>
            <th>Unit</th>
            <th>Date Disposal</th>
            <th>Vehicle Type</th>
            <th >Action</th>
        </tr>
        </thead>
    <tbody>
    @foreach($forward as $key=>$data)
    <tr>
    <td>{{$loop->iteration}}</td>
    <td><span class="icheck-success d-inline "><input type="checkbox" class="select-field" id="newcase1{{$data->CaseDetails->id ?? ''}}" name="chk[]" value="{{$data->CaseDetails->id ?? ''}}">
            <label for="newcase1{{$data->CaseDetails->id ?? ''}}"></label>
        </span>
    </td>
    <td>{{$data->CaseDetails->case_no ?? ''}}</td>
    <td>{{$data->CaseDetails->victim_name ?? ''}}</td>
    <td>{{$data->CaseDetails->victim_mb ?? ''}}</td>
    <td>{{$data->CaseDetails->vehical_reg ?? ''}}</td>
    <td>{{$data->forward_date ?? ''}}</td>
    <td>{{$data->Unit->name ?? ''}}</td>
    <td>{{$data->CaseDetails->date_disposal ?? ''}}</td>
    <td>{{$data->CaseDetails->vehical_type ?? ''}}</td>
    <td>
    <table>
        <tr>
            <td>
                <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="{{$data->CaseDetails->id ?? ''}}"
                >Detail</button>
            </td>
            <td>
                <button class="btn btn-md btn-success edit-data" data-toggle="modal"  data-id="{{$data->CaseDetails->id ?? ''}}" data-target="#exampleaccept">Accept</button>
                @if(Auth::user()->role_id==1 || Auth::user()->role_id==2)
                <button class="btn btn-md btn-danger drop-btn" data-box="{{$data->box_no ?? ''}}" data-forward_id="{{$data->id ?? ''}}" data-toggle="modal" data-target="#drop-modal "  data-id="{{$data->CaseDetails->id ?? ''}}" >Drop</button>
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
            <th>Select</th>
            <th>Case No.</th>
            <th>Name</th>
            <th>Mobile No.</th>
            <th>Vehicle Reg.No</th>
            <th>Date of Forwarding</th>
            <th>Unit</th>
            <th>Date Disposal</th>
            <th>Vehicle Type</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

{{$forward->links()}}
