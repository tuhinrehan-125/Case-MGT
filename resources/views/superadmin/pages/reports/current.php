<table id="account-table" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Unit</th>
                                    <th>
                                   <p class="text-center"> Cases</p>
                                       <table class="table ">
                                       <tr>
                                            <th width="25%">Total</th>
                                            <th width="25%">Accept Cases</th>
                                            <th width="25%">Drop Cases</th>
                                            <th width="25%">Release Cases</th>
                                        </tr>
                                       </table>
                                    </th>
                                    <th>Total Collection of amount</th>
                                    <th >
                                    <table class="table ">
                                       <tr>
                                       <p class="text-center">Through</p>
                                            <th width="40%">Cash</th>
                                            <th width="40%">Mobile Banking</th>
                                            <th width="30%">Bank</th>
                                        </tr>
                                       </table>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($date as $data)
                                 @php
                                $collection= $release->where('release_date',$data->forward_date)->sum('total');
                                @endphp
                                <tr>
                                    <td>{{$data->forward_date.'/' ?? ''}} {{date('D', strtotime($data->forward_date))}}</td>
                                    <td>
                                       <table class="table ">
                                       @foreach($unit as $udata)
                                       <tr>
                                            <td>{{$udata->name ?? ''}}</td>
                                        </tr>
                                        @endforeach
                                       </table>
                                    </td>
                                    <td>
                                       <table class="table ">
                                           {{-- {{$release}} --}}
                                       @foreach($unit as $udata)
                                       @php
                                       $total=$forward->where('forward_date',$data->forward_date)->where('unit_id',$udata->id)->count();
                                       $acp=$forward->where('accept_date',$data->forward_date)->where('accept_status',1)->where('forward_status',1)->where('unit_id',$udata->id)->count();
                                       $drop=$drops->where('forward_date',$data->forward_date)->where('drop_status',1)->where('unit_id',$udata->id)->count();
                                        $rdata= $release->where('release_date',$data->forward_date)->where('unit_id',$udata->id)->count();
                                       @endphp
                                       <tr>
                                            <td width="25%">{{ $total}}</td>
                                            <td width="25%">{{ $acp}}</td>
                                            <td width="25%" class="text-danger">{{ $drop}}</td>
                                            <td width="25%">{{$rdata}}</td>
                                        </tr>
                                        @endforeach
                                       </table>
                                    </td>
                                    <td>{{$collection }}</td>
                                    <td >
                                    <table class="table ">
                                    @foreach($unit as $udata)
                                    @php
                                    $cash=$account->where('date',$data->forward_date)->where('unit_id',$udata->id)->where('payment_method','Cash')->sum('total');
                                    $mobile=$account->where('date',$data->forward_date)->where('unit_id',$udata->id)->where('payment_method','Mobile Banking')->sum('total');
                                    $bank=$account->where('date',$data->forward_date)->where('unit_id',$udata->id)->where('payment_method','Cheque')->sum('total');
                                    @endphp
                                       <tr>
                                            <td  width="40%">{{ $cash}}</td>
                                            <td width="40%">{{ $mobile}}</td>
                                            <td width="20%">{{ $bank}}</td>
                                        </tr>
                                    @endforeach
                                       </table>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>

                                <tfoot>
                                <tr>
                                    <th colspan="2">Total all </th>
                                    <th>
                                    <table class="table ">
                                       @php
                                       $total_cases=$totalCases->count();
                                       $acp_cases=$totalCases->where('accept_status',1)->where('forward_status',1)->count();
                                       $drop_cases=$totalCases->where('drop_status',1)->count();
                                       $rdata_relased=$total_release->count();
                                       @endphp
                                       <tr>
                                            <td width="25%">{{ $total_cases}}</td>
                                            <td width="25%">{{ $acp_cases}}</td>
                                            <td width="25%" class="text-danger">{{ $drop_cases}}</td>
                                            <td width="25%">{{$rdata_relased}}</td>
                                        </tr>
                                       </table>
                                    </th>
                                    <th>
                                    {{$total_collection->sum('total')}}
                                    </th>
                                    <th >
                                    <table class="table ">
                                    @php
                                    $cash_total=$total_collection->where('payment_method','Cash')->sum('total');
                                    $mobile_total=$total_collection->where('payment_method','Mobile Banking')->sum('total');
                                    $bank_total=$total_collection->where('payment_method','Cheque')->sum('total');
                                    @endphp
                                       <tr>
                                            <td  width="40%">{{ $cash_total}}</td>
                                            <td width="30%">{{ $mobile_total}}</td>
                                            <td width="30%">{{ $bank_total}}</td>
                                        </tr>
                                       </table>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
