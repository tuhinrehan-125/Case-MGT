                        <table id="account-table" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Month</th>
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
                                            <th width="40%">Online Banking</th>
                                        </tr>
                                       </table>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $data)
                                    @php
                                    $query_date = date("Y").'-'.$data.'-'.'01';
                                    $startDate= date('Y-m-01', strtotime($query_date));
                                    $endDate= date('Y-m-t', strtotime($query_date));
                                    $collection= $release->whereBetween('release_date',[$startDate, $endDate])->sum('total');
                                    $dateObj   = DateTime::createFromFormat('!m', $data);
                                    $monthName = $dateObj->format('F');
                                    @endphp
                                <tr>
                                <td>
                                {{$monthName}}-{{date("Y")}}
                                <br>
                                {{ $startDate}}
                                <br>
                                {{ $endDate}}
                                 </td>
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
                                       @foreach($unit as $udata)
                                        @php
                                        $total=$forward->whereBetween('forward_date',[$startDate,$endDate])->where('unit_id',$udata->id)->count();
                                        $acp=$forward->whereBetween('accept_date',[$startDate,$endDate])->where('accept_status',1)->where('forward_status',1)->where('unit_id',$udata->id)->count();
                                        $drop=$forward->whereBetween('forward_date',[$startDate,$endDate])->where('drop_status',1)->where('unit_id',$udata->id)->count();
                                        $rdata= $release->whereBetween('release_date',[$startDate,$endDate])->where('unit_id',$udata->id)->count();
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
                                    $cash=$account->whereBetween('date',[$startDate,$endDate])->where('unit_id',$udata->id)->where('payment_method','Cash')->sum('total');
                                    $mobile=$account->whereBetween('date',[$startDate,$endDate])->where('unit_id',$udata->id)->where('payment_method','!=','Cash')->sum('total');
                                 @endphp
                                       <tr>
                                            <td  width="40%">{{ $cash}}</td>
                                            <td width="40%">{{ $mobile}}</td>
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
                                       $total_cases=$forward->count();
                                       $acp_cases=$forward->where('accept_status',1)->where('forward_status',1)->count();
                                       $drop_cases=$forward->where('drop_status',1)->count();
                                       $rdata_relased=$release->count();
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
                                    {{$release->sum('total')}}
                                    </th>
                                    <th >
                                    <table class="table ">
                                    @php
                                    $cash_total=$account->where('payment_method','Cash')->sum('total');
                                    $mobile_total=$account->where('payment_method','!=','Cash')->sum('total');
                                    @endphp
                                       <tr>
                                            <td  width="40%">{{ $cash_total}}</td>
                                            <td width="30%">{{ $mobile_total}}</td>
                                        </tr>
                                       </table>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
