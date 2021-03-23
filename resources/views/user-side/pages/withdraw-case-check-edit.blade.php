@extends('layouts.master')

@section('content')
<div class="login-area section-padding">
    <div class="container-fluid px-3">
        <div class="row justify-content-center">
        <div class="col-md-8">
        <h3 class="text-center m-3">Witdraw Case request details</h3>
        <div class="card m-2 text-danger">
        <p class="p-1">
        <b> Note:</b> First provide the service charge through your mobile banking and provide the information and click on the withdraw request button.
You will receive a message within 24 hours. Please do not give wrong information.
        </p>
        </div>
        <table class="table table-striped table-bordered">
            <tr>
                <th width="50%">Case No</th>
                <td>{{ $case->case_no?? ''}}</td>
            </tr>
            <tr>
                <th width="50%">Victime Name</th>
                <td>{{ $case->victim_name?? ''}}</td>
            </tr>
            <tr>
                <th width="50%">Mobile No.</th>
                <td>{{ $case->victim_mb?? ''}}</td>
            </tr>
            <tr>
                <th width="50%">Vehicle Reg no.</th>
                <td>{{ $case->vehical_reg?? ''}}</td>
            </tr>
            <tr>
                <th width="50%">Vehicle Type</th>
                <td>{{ $case->vehical_type?? ''}}</td>
            </tr>
            <tr>
                <th width="50%">Victim</th>
                <td>{{ $case->victim?? ''}}</td>
            </tr>
            <tr>
                <th width="50%">Crime List</th>
                <td>
                    @if($case->crime_type!='null' && count( json_decode($case->crime_type) ) >0 )
                        @foreach(json_decode($case->crime_type) as $cdata)
                            <li>{{$crime->where('id',$cdata)->first()->crime ?? ''}}</li>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th width="50%">Paper Ceased</th>
                <td>
                    @if(($case->paper)!='null' && count(json_decode($case->paper) ) >0)
                        @foreach(json_decode($case->paper) as $pdata)
                            <li>{{$pdata ?? ''}}</li>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th width="50%">Unit</th>
                <td>{{ $case->unit->name?? ''}}</td>
            </tr>
            <!-- <tr>
                <th width="50%">Fine</th>
                <td>{{ $case->veh_reg_no?? ''}}</td>
            </tr> -->
        </table>
                <form action="{{route('withdra.request.update')}}" method="post" class="col-md-12 col-lg-12">
                    @csrf
                    <input type="hidden" name="case_id" value="{{$case->id}}">
                    <input type="hidden" name="withdraw_id" value="{{$widrawReqeust->id}}">
                    <div class="form-group row justify-content-center">
                        <label for="fine" class="col-sm-2 col-form-label">Fine</label>
                        <div class="col-sm-6">
                            <input type="text" name="fine" class="form-control" id="fine" value="{{$widrawReqeust->fine}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="comments" class="col-sm-2 col-form-label ">Service Charge</label>
                        <div class="col-sm-6">
                         <input type="number" min="0" value="{{$widrawReqeust->service_charge}}" name="service_charge" class="form-control" id="service_charge" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="total" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-6">
                            <input type="number" min="0" value="{{$widrawReqeust->total}}" name="total" class="form-control" id="total" readonly>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
                        <div class="col-sm-6">
                            <select name="payment_method" class="form-control payment_method" id="payment_method" required readonly>
                                <option value="Mobile Banking" selected>Mobile Banking</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group row justify-content-center">
                            <label for="reference" class="col-sm-2 col-form-label ">Select Operator</label>
                            <div class="col-sm-6">
                            <select name="mobile_operator" id="mobile_operator" class="mobile_operator form-control" required readonly>
                                    <option value="">Select</option>
                                    <option value="Bkash" {{ $widrawReqeust->mobile_operator=='Bkash' ?'selected' : ''}}>Bkash</option>
                                    <option value="Rocket" {{ $widrawReqeust->mobile_operator=='Rocket' ?'Rocket' : ''}}>Rocket</option>
                                    <option value="Nogod" {{ $widrawReqeust->mobile_operator=='Nogod' ?'selected' : ''}}>Nogod</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="reference" class="col-sm-2 col-form-label ">Account Number</label>
                            <div class="col-sm-6">
                            <input type="text" name="mobile_number" id="mobile_number" value="{{$widrawReqeust->mobile_number ?? ''}}" class="form-control" placeholder="Account Number" required readonly>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="reference" class="col-sm-2 col-form-label ">Tax Or Transaction ID</label>
                            <div class="col-sm-6">
                            <input type="text" name="tax_transaction_id" value="{{$widrawReqeust->tax_transaction_id ?? ''}}" id="tax_transaction_id" class="form-control" placeholder="Tax Or Transaction ID" required readonly>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="reference" class="col-sm-2 col-form-label ">Reference</label>
                            <div class="col-sm-6">
                                    <input type="text" name="reference" value="{{$widrawReqeust->reference ?? ''}}" id="reference" class="form-control" placeholder="Mobile Reference"required readonly>
                            </div>
                        </div>
                    
                    <div class="form-group row justify-content-center">
                        <label for="comments" class="col-sm-2 col-form-label ">Courier Address</label>
                        <div class="col-sm-6">
                            <textarea name="courier_address" class="form-control"  id="courier_address" required readonly>{{$widrawReqeust->courier_address ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <button class="d-none btn btn-success" id="update" >Update Request</button>
                        <a hre="#" class="btn btn-info mx-2" id="edit">Edit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
           $("#edit").click(function(e){
               e.preventDefault();
               $("#mobile_operator").attr("readonly", false);
               $("#mobile_number").attr("readonly", false);
               $("#tax_transaction_id").attr("readonly", false);
               $("#reference").attr("readonly", false);
               $("#courier_address").attr("readonly", false);
               $("#edit").addClass('d-none');
               $("#update").removeClass('d-none');
           });
        });
    </script>
    @endsection
