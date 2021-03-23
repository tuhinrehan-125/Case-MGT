<table id="release-table" class="table table-sm table-bordered table-striped ">
    <thead>
    <tr>
        <th>Sl.</th>
        <th>Case No.</th>
        <th>Vehicle Reg.No</th>
        <th>Unit</th>
        <th>Box</th>
        <th >Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($release as $data)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$data->CaseDetails->case_no ?? ''}}</td>
        <td>{{$data->CaseDetails->vehical_reg ??''}}</td>
        <td>{{$data->Unit->name ?? ''}}</td>
        <td>{{$data->box_no ?? ''}}</td>
        <td>
            <table>
                <tr>
                    <td>
                        <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="{{$data->CaseDetails->id ?? ''}}"
                        >Detail</button>
                    </td>
                    <td>
                        @if(Auth::user()->role_id==1)
                        <button class="btn btn-md btn-success edit-data" data-box="{{$data->box_no ?? ''}}" data-forward_id="{{$data->box_no ?? ''}}" data-toggle="modal" data-id="{{$data->CaseDetails->id ?? ''}}" data-target="#release-edit"
                        >Edit Release</button>
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
        <th>Vehicle Reg.No</th>
        <th>Unit</th>
        <th>Box</th>
        <th >Action</th>
    </tr>
    </tfoot>
</table>
{{$release->links()}}
