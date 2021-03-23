<table id="case-table" class="table table-sm table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Case No.</th>
                                    <th>Banking</th>
                                    <th>Transaction ID</th>
                                    <th>Querier </th>
                                    <th>Paid Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($checkWithdra as $key=>$data)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->CaseDetails->case_no ?? ''}}</td>
                                    <td>{{$data->bank_branch ?? ''}}</td>
                                    <td>{{$data->tax_transaction_id ?? ''}}</td>
                                    <td>{{$data->courier_address ?? ''}}</td>
                                    <td>{{$data->total ?? ''}}</td>
                                    <td>{{$data->status ?? ''}}</td>
                                    <td>{{$data->created_at->format('d-m-Y') ?? ''}}</td>
                                    <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#view" data-id="{{$data->CaseDetails->id}}">Detail</button>
                                            </td>
                                            <td>
                                            <button class="btn btn-md btn-success payment-confirm edit-data" data-box="{{$data->box_no ?? ''}}" data-withdraw_id="{{$data->id}}"  data-qurier_address="{{$data->courier_address ?? ''}}"   data-id="{{$data->CaseDetails->id}}">Confirm</button>
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
                                        <th>Banking</th>
                                        <th>Transaction ID</th>
                                        <th>Querier </th>
                                        <th>Paid Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {{$checkWithdra->links()}}
