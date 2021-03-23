
<table id="forward-table-data" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed ">
    <thead>
    <tr>
        {{-- <th>Sl.</th> --}}
        {{-- <th>Select</th> --}}
        <th>Case No.</th>
        <th>Name</th>
        <th>Mobile No.</th>
        <th>Vehicle Reg.No</th>
        <th>Date of Forwarding</th>
        <th>Unit</th>
        <th>Status</th>
        <th >Action</th>
    </tr>
    </thead>
<tbody>
    @if ($cases)
@foreach($cases as $key=>$data)
<tr>
<td>{{$data->CaseDetails->case_no ?? ''}}</td>
<td>{{$data->CaseDetails->victim_name ?? ''}}</td>
<td>{{$data->CaseDetails->victim_mb ?? ''}}</td>
<td>{{$data->CaseDetails->vehical_reg ?? ''}}</td>
<td>{{$data->forward_date ?? ''}}</td>
<td>{{$data->Unit->name ?? ''}}</td>
<td>
    @if($data->forward_status==1 && $data->drop_status==0 && $data->delete_status==1 && $data->accept_status==0 && $data->release_status==0)
    Forwarded
    @elseif($data->forward_status==1 && $data->drop_status==0 && $data->delete_status==1 && $data->accept_status==1 && $data->release_status==0)
    Accepted
    @elseif($data->forward_status==1 && $data->drop_status==0 && $data->delete_status==1 && $data->accept_status==1 && $data->release_status==1)
    Released
    @elseif($data->forward_status==1 && $data->drop_status==1 && $data->delete_status==1)
    Droped
    @endif
</td>
<td>
<table>
    <tr>
        <td>
            <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="{{$data->CaseDetails->id ?? ''}}"
            >Detail</button>
        </td>
        @if($data->forward_status==1 && $data->drop_status==0 && $data->delete_status==1 && $data->accept_status==0 && $data->release_status==0)
        <td>
            <button class="btn btn-md btn-success edit-data" data-toggle="modal"  data-id="{{$data->CaseDetails->id ?? ''}}" data-target="#exampleaccept">Accept</button>
        </td>
        @endif
        @if($data->forward_status==1 && $data->drop_status==0 && $data->delete_status==1 && $data->accept_status==1 && $data->release_status==0)

       <td> <button class="btn btn-md btn-success release" data-box="{{$data->box_no ?? ''}}" data-forward_id="{{$data->id ?? ''}}" data-toggle="modal" data-id="{{$data->CaseDetails->id}}" data-target="#exampleaccept-release"
        >Release</button></td>
        @endif
        @if($data->forward_status==1 && $data->drop_status==0 && $data->delete_status==1 && $data->accept_status==1 && $data->release_status==1)
        <td>
            <a href="{{route('superadmin.print.invoice',$data->case_id)}}" class="btn btn-md btn-danger " data-id="{{$data->id}}" target="_blank"><i class="fa fa-print"></i>Print</a>
        </td>
        @endif
        @if(Auth::user()->role_id==1 || Auth::user()->role_id==2)

        @if($data->drop_status==0 && $data->delete_status==1  && $data->release_status==0)
            @if(Auth::user()->role_id==2 && $data->consider==null)
            <td>
            <button class="btn btn-md btn-secondary discount-btn" data-toggle="modal" data-target="#consider-modal "  data-case_id="{{$data->CaseDetails->id}}" >Consider {{$data->consider}}</button>
            </td>
            @endif
        <td>
            <button class="btn btn-md btn-danger drop-btn" data-box="{{$data->box_no ?? ''}}" data-forward_id="{{$data->id ?? ''}}" data-toggle="modal" data-target="#drop-modal "  data-id="{{$data->CaseDetails->id ?? ''}}" >Drop</button>
        </td>
        @endif
        @if($data->drop_status==1 && $data->delete_status==1 && $data->accept_status==1 && $data->release_status==0)

        <td>
            <a href="{{route('superadmin.undo.drop',$data->case_id)}}" class="btn btn-md btn-danger" data-id="{{$data->CaseDetails->id}}"
            onclick="return confirm('Are you sure')">Undo Drop </a>
        </td>
        @endif
        @endif

    </tr>
</table>
</td>
</tr>
@endforeach
@endif
</tbody>
    <tfoot>
    <tr>
        <th>Case No.</th>
        <th>Name</th>
        <th>Mobile No.</th>
        <th>Vehicle Reg.No</th>
        <th>Date of Forwarding</th>
        <th>Unit</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </tfoot>
</table>
@if ($cases)

{{$cases->links()}}
@endif
