@extends('layouts.master')

@section('content')
<div class="login-area section-padding">
    <div class="container-fluid px-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="">New Case List</h3>
                <table id="new-case" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th >Sl.</th>
                            <th >Case No.</th>
                            <th >Name</th>
                            <th>Location</th>
                            <th>Crime</th>
                            <th>Paper Collect</th>
                            <th>Unit</th>
                            <th >Status</th>
                            {{-- <th >Payment Status</th> --}}
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($case)>0)
                            @foreach($case as $id=>$csData)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td >{{ $csData->case_no ?? ''}}</td>
                                    <td>{{ $csData->victim_name ?? ''}}</td>
                                    <td>{{ $csData->loc ?? ''}}</td>
                                    <td>
                                    @if($csData->crime_type!='null' && count( json_decode($csData->crime_type) ) >0 )
                                        @foreach(json_decode($csData->crime_type) as $cdata)
                                            <li>{{$crime->where('id',$cdata)->first()->crime ?? ''}}</li>
                                        @endforeach
                                    @endif
                                    </td>
                                    <td>
                                    @if(($csData->paper)!='null' && count(json_decode($csData->paper) ) >0)
                                        @foreach(json_decode($csData->paper) as $pdata)
                                            <li>{{$pdata ?? ''}}</li>
                                        @endforeach
                                    @endif
                                    </td>
                                    <td>{{ $csData->unit->name ?? ''}}</td>
                                    <td>
                                        @php
                                        $wdata=$csData->CaseWithdrawRequest->status ?? '';
                                        @endphp
                                        @if($wdata)
                                        <p class="text-light {{ $wdata=='Failed' || $wdata=='Canceled' ? 'bg-danger': 'bg-success'}}  rounded-circle text-center p-2">Payment {{$csData->CaseWithdrawRequest->status ?? ''}}</p>
                                        @else
                                            @if($csData->CaseWithdrawRequest && $csData->CaseWithdrawRequest->status=='Pending')
                                            <p class="text-light bg-warning rounded-circle text-center p-2">Request pending</p>
                                            @elseif(!empty($csData->ForwadAcceptCase) && $csData->ForwadAcceptCase->accept_status==1 )
                                            <p class="text-light bg-success rounded-circle text-center p-2">Accepted</p>
                                            @elseif(!empty($csData->ForwadAcceptCase))
                                            <p class="text-light bg-success rounded-circle text-center p-2">Forwarded</p>
                                            @elseif($csData->drop_status==1)
                                            <p class="text-light bg-danger rounded-circle text-center p-2">Droped</p>
                                            @elseif($csData->forwared==0)
                                            <p class="text-light bg-info rounded-circle text-center p-2">Pending</p>
                                            @endif

                                        @endif
                                    </td>

                                    <td >
                                        @if(!empty($csData->ForwadAcceptCase) &&$csData->ForwadAcceptCase->accept_status==1)
                                            @if(!empty($csData->CaseWithdrawRequest)&& ($csData->CaseWithdrawRequest->status=='Canceled'  || $csData->CaseWithdrawRequest->status=='Failed' ||$csData->CaseWithdrawRequest->status=='Pending' ))
                                            <a href="{{route('withdrawcheck.case',$csData->id)}}"  class="btn btn-success p-2">Check Request</a>
                                            @elseif(empty($csData->CaseWithdrawRequest))
                                            <a href="{{route('withdraw.case',$csData->id)}}" class="btn btn-danger p-2">Withdraw Case</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Case No.</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Crime</th>
                        <th>Paper Collect</th>
                        <th>Unit</th>
                        <th>Status</th>
                        {{-- <th >Payment Status</th> --}}
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#new-case').DataTable();
        });
    </script>
    @endsection
