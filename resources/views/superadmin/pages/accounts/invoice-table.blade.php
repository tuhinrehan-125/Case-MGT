<table id="invoice-table" class="table table-sm table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Case No.</th>
                                    <th>Unit</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoice as $key=>$data)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->CaseDetails->case_no ?? ''}}</td>
                                    <td>{{$data->Unit->name ?? ''}}</td>
                                    <td>{{$data->total ?? ''}}</td>
                                    <td>{{$data->date ?? ''}}</td>
                                    <td>{{$data->admin->name ?? ''}}</td>
                                    <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#view" data-id="{{$data->ReleaseDetails->case_id}}">Detail</button>
                                            </td>
                                            <td>
                                            <a href="{{route('superadmin.print.invoice',$data->ReleaseDetails->case_id)}}" class="btn btn-md btn-danger " data-id="{{$data->id}}" target="_blank"><i class="fa fa-print"></i>Print</a>
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
                                        <th>Unit</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Admin</th>
                                        <th >Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {{$invoice->links()}}
