<table id="drop-table" class="table table-sm table-bordered table-striped ">
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
        <th>Dropped By</th>
        <th >Action</th>
    </tr>
    </thead>
    <tfoot>
    <tbody>
    @foreach($drops as $key=>$data)
    <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$data->CaseDetails->case_no ?? ''}}</td>
    <td>{{$data->CaseDetails->victim_name ?? ''}}</td>
    <td>{{$data->CaseDetails->victim_mb ?? ''}}</td>
    <td>{{$data->CaseDetails->vehical_reg ?? ''}}</td>
    <td>{{$data->accept_date ?? ''}}</td>
    <td>{{$data->Unit->name ?? ''}}</td>
    <td>{{$data->CaseDetails->date_disposal ?? ''}}</td>
    <td>{{$data->DropUser->name ?? ''}}</td>
    <td>
    <table>
        <tr>
            <td>
                <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="{{$data->CaseDetails->id}}"
                >Detail</button>
            </td>
            @if(Auth::user()->role_id==1)
            <td>
            <a href="{{route('superadmin.undo.drop',$data->case_id)}}" class="btn btn-md btn-danger" data-id="{{$data->CaseDetails->id}}"
            onclick="return confirm('Are you sure')">Undo Drop </a>
            </td>
            @endif
        </tr>
    </table>
    </td>
    </tr>
    @endforeach
    </tbody>
    <tr>
        <th>Sl.</th>
        <th>Case No.</th>
        <th>Name</th>
        <th>Mobile No.</th>
        <th>Vehicle Reg.No</th>
        <th>Date of Accepting</th>
        <th>Unit</th>
        <th>Date Disposal</th>
        <th>Dropped By</th>
        <th >Action</th>
    </tr>
    </tfoot>
</table>
{{$drops->links()}}
