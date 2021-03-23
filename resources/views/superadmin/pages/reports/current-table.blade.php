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
                <th width="40%">Online Banking</th>
            </tr>
           </table>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($period as $date)
    @php

    $data=$date->format('Y-m-d');
    $collection= $release->where('release_date',$data)->sum('total');
    $dates = array("", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $day1=ltrim(date('d', strtotime($date->format('d-m-Y'))), "0");
    $day=1;
    @endphp
  {{-- {{$dates[$day]}} --}}
   {{-- @if(date('D', strtotime($data))=="Fri" || date('D', strtotime($data))=="Sat")

    <tr>
    <td>{{$data ?? ''}} /{{date('D', strtotime($data))}}</td>
     <td colspan="4"><p class="text-uppercase text-danger">public holyday</p></td>
     </tr>
    @else --}}
    <tr>
        <td>{{$date->format('d-m-Y') ?? ''}} </td>
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
                $total=$forward->where('forward_date',$data)->where('unit_id',$udata->id)->count();
                $acp=$forward->where('accept_date',$data)->where('accept_status',1)->where('forward_status',1)->where('unit_id',$udata->id)->count();
                $drop=$forward->where('forward_date',$data)->where('drop_status',1)->where('unit_id',$udata->id)->count();
                $rdata= $release->where('release_date',$data)->where('unit_id',$udata->id)->count();
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
                $cash=$account->where('date',$data)->where('unit_id',$udata->id)->where('payment_method','Cash')->sum('total');
                $mobile=$account->where('date',$data)->where('unit_id',$udata->id)->where('payment_method','!=','Cash')->sum('total');
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
           $total_cases=$forward->whereBetween('forward_date',[date('Y-m-01'),date('Y-m-d')])->count();
           $acp_cases=$forward->whereBetween('forward_date',[date('Y-m-01'),date('Y-m-d')])->where('accept_status',1)->where('forward_status',1)->count();
           $drop_cases=$forward->whereBetween('forward_date',[date('Y-m-01'),date('Y-m-d')])->where('drop_status',1)->count();
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
        {{$account->whereBetween('date',[date('Y-m-01'),date('Y-m-d')])->sum('total')}}
        </th>
        <th >
        <table class="table ">
        @php
        $cash_total=$account->whereBetween('date',[date('Y-m-01'),date('Y-m-d')])->where('payment_method','Cash')->sum('total');
        $mobile_total=$account->whereBetween('date',[date('Y-m-01'),date('Y-m-d')])->where('payment_method','!=','Cash')->sum('total');
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
