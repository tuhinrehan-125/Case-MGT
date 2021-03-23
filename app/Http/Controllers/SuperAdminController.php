<?php

namespace App\Http\Controllers;

use App\casereg_model;
use App\crime_model;
use App\DCB\Accounts;
use App\DCB\Box;
use App\DCB\ForwadAcceptCase;
use App\CaseWithdrawRequest;
use App\DCB\DCBDrop;
use App\DCB\ReleaseCase;
use App\FineConsideration;
use App\Models\Unit;
use App\Models\UnitRole;
use App\Unitauth;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class SuperAdminController extends Controller
{
    //forward_case
    public function forward_case(Request $request)
    {
        // return $request;

        $field=$request->field_name;
         $value=$request->value;
         $uid=$request->unit_id==0 ? '': $request->unit_id;
         $unit=Unit::where('delete_status',1)->get();
         $forwardData=ForwadAcceptCase::CaseData()->where('forward_status',1)->where('accept_status',0)->where('drop_status',0)->where('delete_status',1);
         if (!empty($field) && !empty($value)) {
            $findCase=casereg_model::where($field,'LIKE','%'.$value.'%')->where('forwared',1)->first();
            if(!empty($findCase)){
                if(!empty($uid)){
                  $forward=$forwardData->where('case_id','LIKE','%'.$findCase->id ?? ''.'%')->where('unit_id',$uid ?? '')
                          ->paginate(50);
                }else{
                  $forward=$forwardData->where('case_id','LIKE','%'.$findCase->id ?? ''.'%')
                          ->paginate(50);
                }
            }else{
              $forward=$forwardData->where('case_id',0)->where('unit_id',$uid ?? '')->paginate(50);
            }

        }elseif(!empty($uid)) {
          $forward=$forwardData->where('unit_id',$uid ?? '')->paginate(50);
        }else{
          $forward=$forwardData->paginate(50);
        }

        $box=Box::where('delete_status',1)->get();
        if(request()->ajax()){
            return view('superadmin.pages.case.forward-table',compact('forward'));
            }
        return view('superadmin.pages.case.forward',compact('forward','box','unit','uid'));
    }
    //box
    public function box_store(Request $request)
    {
        $forwared_case = casereg_model::where('id', '=', $request->id)->update(array('accept' => $request->box_number));
        return redirect()->back();
        //dd($request);
    }
    //accept_case
    public function accept_case(Request $request)
    {
        // return $request;
        $field_name=$request->field_name;
          $qeryDAta=$request->query_data;
       if (!empty($field_name) && !empty($qeryDAta)) {
                $accept=ForwadAcceptCase::with([
                    'Consider'=>function($query){$query->select(['id','forward_id']);},
                    'Unit'=>function($query){$query->select(['id','name']);},
                    'CaseDetails'=>function($query){
                $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
            }
        ])->where('release_status',0)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)
        ->where( $field_name,'LIKE','%'.$qeryDAta.'%')->doesntHave('WithdrawRequest')->paginate(50);
        }else {
            $accept=ForwadAcceptCase::with([
            'Consider'=>function($query){$query->select(['id','forward_id']);},
            'Unit'=>function($query){$query->select(['id','name']);},
            'CaseDetails'=>function($query) {
                $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
            }])->where('release_status',0)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)
            ->doesntHave('WithdrawRequest')
            ->where('delete_status',1)->paginate(50);
        }
        $box=Box::where('delete_status',1)->get();
        if(request()->ajax()){

            return view('superadmin.pages.accept.accept-table',compact('accept'));
            }
        return view('superadmin.pages.accept.accept_index',compact('accept'));
    }
    /*================================fine_index===========================*/
    public function fine_index()
    {
        $crime = crime_model::all();
       /* return view('admin.pages.crime.mpcrime',compact('crime'));*/
        return view('superadmin.pages.fine_amount.fine_amount',compact('crime'));
    }
    /*==============================forward search==========================*/
    public function filter_forwardcase(Request $request)
    {
//        return $request;
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

         $forwared_case = casereg_model::where('forwared', '=', 1)
            ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                $query->whereBetween('case_no', [$from_sl, $to_sl])
                    ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->get();
        return view('superadmin.pages.case.forward',compact('forwared_case'));
    }
    /*==============================End forward search==========================*/
    public function UnitUser(){
        $unit=Unit::where('delete_status',1)->get();
        $unitrole=UnitRole::where('delete_status',1)->get();
        $unituser=Unitauth::where('delete_status',1)->get();
        return view('superadmin.pages.unit-user.unit-user-index',compact('unitrole','unit','unituser'));
    }
    public function unitUserStore(Request $request){
        $validator=Validator::make($request->all(),[
           'unit_id' => 'required|max:255',
           'unit_role_id' => 'required|max:255',
           'ba_baf_number' => 'required|max:255',
           'name' => 'required|max:255',
           'email' => 'required|email|max:255|unique:unitauths',
           'password' => 'required|min:6|confirmed',
       ]);
        if ($validator->passes()) {
            $unit = new Unitauth();
            $unit->name = $request->name;
            $unit->unit_id = $request->unit_id;
            $unit->unit_role_id = $request->unit_role_id;
            $unit->ba_baf_no = $request->ba_baf_number;
            $unit->email = $request->email;
            $unit->phone = $request->phone;
            $unit->password = Hash::make($request->password);
            if ($unit->save()) {
                return response(json_encode(['success' => 'Your data inserted Success full']));
                Toastr::success('Add Unit User successful', 'Success');
                return back();
            } else {
                Toastr::error('You have Something wrong', 'information');
            }
        } else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        }
    public function unitUserFind(Request $request){
//        return $request;
     return   $unituser=Unitauth::findOrFail($request->id);
    }
    public function unitUserUpdate(Request $request){

        $unituser=Unitauth::findOrFail($request->id);
        if (!empty($unituser)){
            $unituser->name=$request->name;
            $unituser->unit_id=$request->unit_id;
            $unituser->unit_role_id=$request->unit_role_id;
            $unituser->ba_baf_no=$request->ba_baf_number;
            $unituser->phone=$request->phone;
            $unituser->email=$request->email;
            $unituser->status=0;
            $unituser->save();
            Toastr::success('User Unit Update Success','Success');
            return response(json_encode(['success' => 'Your data update Success full']));
        }else{
            return response(json_encode(['error' => 'You have something wrong']));
        }
    }

    public function unitUserDelete(Request $request){
        $unituser=Unitauth::findOrFail($request->id);
        if ($unituser->delete_status==1){
            $unituser->delete_status=0;
            $unituser->status=0;
        }else{
            $unituser->delete_status=1;
            $unituser->status=1;
        }
        $unituser->save();
        return response(json_encode(['success' => 'Your data Update Success full']));
//        return back();
    }
    public function unitUserActive(Request $request){
        $unituser=Unitauth::findOrFail($request->id);
        if ($unituser->status==1){
            $unituser->status=0;
        }else{
            $unituser->status=1;
        }
        $unituser->save();
        return response(json_encode(['success' => 'Your data Delete Success full']));
//        Toastr::Success('Unit User Active Inactive Update Successful','Success');
//        return back();
    }
    public function acceptCase(Request $request){
//        return response(json_encode(['success' => 'your case accepted successfull']));
        $this->validate($request,[
            'box_number' => 'required',
        ]);

        $case_id=$request->chk;
//        if (count($case_id)>1){
            foreach ($case_id as $data){
                if ($data!='on') {
                    $accept = ForwadAcceptCase::where('case_id',$data)->first();
                    $accept->accept_status = 1;
                    $accept->box_no= $request->box_number;
                    $accept->accept_user = Auth::user()->id;
                    $accept->accept_date = date('Y-m-d');
                    $accept->save();
                }
            }
            return response(json_encode(['success' => 'your case accepted successfull']));
    }
    public function acceptCaseSingle(Request $request){
//        return $request;
//        return response(json_encode(['success' => 'your case accepted successfull']));
        $this->validate($request,[
            'box_number' => 'required',
        ]);
         $accept = ForwadAcceptCase::where('case_id',$request->case_id)->first();
                $accept->accept_status = 1;
                $accept->box_no= $request->box_number;
                $accept->accept_user = Auth::user()->id;
                $accept->accept_date = date('Y-m-d');
                $accept->save();
            return response(json_encode(['success' => 'your case accepted successfull']));
    }
    public function box(){
        $box=Box::where('delete_status',1)->get();
//        $forward=ForwadAcceptCase::where('forward_satus',1)->where('accept_status',1)->get();
        return view('superadmin.pages.box.box',compact('box'));
    }
    public function boxstore(Request $request){
        $this->validate($request ,[
            'name'=>'required',
            'number'=>'required | unique:boxes',

        ]);
        $box=new Box();
        $box->name=$request->name;
        $box->number=$request->number;
        $box->qty=$request->qty;
        $box->save();
        Toastr::success('Add box success full','Success');
        return back();
    }
    public function boxupdate(Request $request){
//        return $request;
        $box= Box::findOrFail($request->id);
        $box->name=$request->name_;
        $box->number=$request->number;
        $box->qty=$request->qty;
        $box->save();
        Toastr::success('Update box success full','Success');
        return back();
    }
    public function releaseCase(Request $request)
    {
        // return $request;
        $case = casereg_model::findOrFail($request->id);
        $forward = ForwadAcceptCase::findOrFail($request->fid);
        $forward->release_status = 1;
        if ($forward->save() == true) {
            $release = new ReleaseCase();
            $release->forward_accept_id = $request->fid;
            $release->case_id = $case->id;
            $release->case_no = $case->case_no;
            $release->unit_id = $case->unit_id;
            $release->release_status = 1;
            $release->packet_no = $request->packet_no;
            $release->release_user = Auth::user()->id;
            $release->release_date = date('Y-m-d');
            $release->box_no = $request->box;
            $release->total_fine = $request->fine;
            $release->consider = $request->consider;
            $release->total = $request->total;
            $release->comments = $request->comments;
            if ($release->save() == true) {
                $account = new Accounts();
                $account->release_id = $release->id;
                $account->unit_id = $case->unit_id;
                $account->case_id = $case->id;
                $account->payment_method = 'Cash';
                $account->cheque_number = $request->cheque_number;
                $account->account_number = $request->account_number;
                $account->mobile_operator = $request->mobile_operator;
                $account->mobile_number = $request->mobile_number;
                $account->tax_transaction_id = $request->tax_transaction_id;
                $account->reference = $request->reference;
                $account->bank_branch = $request->bank_name;
                $account->total = $request->total;
                $account->user_id = Auth::user()->id;
                $account->date = date('Y-m-d');
                $account->save();
                return response(json_encode(['success' => 'your case released successfull', 'id' =>$case->id]));
            }
        }
    }
    public function relaseData(Request $request){

         $date_form=$request->date_from;
         $date_to=$request->date_to;
        //  $date_form=$request->date_from;
        //  $date_to=$request->date_to;
        //  return $date_to .'  to '.$date_form;
// return $request;
        if (!empty($date_to) && !empty($date_form)) {
              $release=ReleaseCase::with([
                'Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){
                    $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
                }
            ])
            ->where('delete_status',1)
            ->whereBetween('created_at', [$date_form.' 00:00:00',$date_to.' 23:59:59'])
            ->paginate(50);
         }else {
             $release=ReleaseCase::with([
                'Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){
                    $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
                }
            ])->where('delete_status',1)->paginate(50);
         }
         if(request()->ajax()){
             return view('superadmin.pages.case.release-table',compact('release'));
            }

        return view('superadmin.pages.case.release_case',compact('release'));
    }
    public function releaseUpdate(Request $request){
    // return $request;

        $case = casereg_model::findOrFail($request->id ?? '');
        $forward = ForwadAcceptCase::findOrFail($request->fid ?? '');
        $forward->release_status = 1;
        if ($forward->save() == true) {

            $release =  ReleaseCase::where('case_id',$case->id ?? '')->first();
            $release->forward_accept_id = $request->fid;
            $release->case_id = $case->id;
            $release->case_no = $case->case_no;
            $release->unit_id = $case->unit_id;
            $release->release_status = 1;
            $release->packet_no = $request->packet_no;
            $release->release_user = Auth::user()->id;
            $release->release_date = date('Y-m-d');
            $release->box_no = $request->box;
            $release->total_fine = $request->fine;
            $release->consider = $request->consider;
            $release->total = $request->total;
            $release->comments = $request->comments;
            if ($release->save() == true) {
                $account =  Accounts::where('case_id',$case->id ?? '')->first();
                $account->release_id = $release->id;
                $account->unit_id = $case->unit_id;
                $account->case_id = $case->id;
                // $account->payment_method = 'Cash';
                $account->cheque_number = $request->cheque_number;
                $account->account_number = $request->account_number;
                $account->mobile_operator = $request->mobile_operator;
                $account->mobile_number = $request->mobile_number;
                $account->tax_transaction_id = $request->tax_transaction_id;
                $account->reference = $request->reference;
                $account->bank_branch = $request->bank_name;
                $account->total = $request->total;
                $account->user_id = Auth::user()->id;
                $account->date = date('Y-m-d');
                $account->save();
                return response(json_encode(['success' => 'your case released update successfull', 'id' =>$case->id]));
            }
        }
    }
    public function DropCase(Request $request){

        $field=$request->field_name;
         $value=$request->value;
         if (!empty($field) && !empty($value)) {
            $findCase=casereg_model::where($field,'LIKE','%'.$value.'%')->where('forwared',1)->first();
            if(!empty($findCase)){
            $drops=ForwadAcceptCase::CaseData()->where('drop_status',1)->where('delete_status',1)
            ->where('case_id','LIKE','%'.$findCase->id ?? ''.'%')
            ->paginate(50);
        }else{
            $drops=ForwadAcceptCase::CaseData()->where('drop_status',1)->where('delete_status',1)->paginate(50);
            }
         }else {
            $drops=ForwadAcceptCase::CaseData()->where('drop_status',1)->where('delete_status',1)->paginate(50);
         }
         if(request()->ajax()){
             return view('superadmin.pages.case.drop-table',compact('drops'));
            }
        return view('superadmin.pages.case.drop_case',compact('drops'));
    }
    public function invoice(Request $request){
        $date_to=$request->date_to;
        $date_form=$request->date_from;
// return $request;
        if ($request->unit!=null && $request->date_to!=null && $request->date_from!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->whereBetween('date', [$request->date_to,$request->date_from])->paginate(1000);

        }else if($request->unit!=null && $request->date_to!=null){

            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->where('date',$request->date_to)->paginate(1000);

        }else if($request->unit!=null && $request->date_from!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->where('date',$request->date_from)->paginate(1000);

        }else if($request->date_to!=null && $request->date_from!=null){
             $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->whereBetween('date', [$request->date_to,$request->date_from])->paginate(1000);

        }else if($request->date_to!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('date',$request->date_to)->paginate(1000);
        }else if($request->date_from!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('date',$request->date_from)->paginate(1000);
        }else if($request->unit!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->paginate(1000);
        }else {
            $invoice = Accounts::with(['Unit' => function ($query) {$query->select(['id', 'name']);}, 'CaseDetails' => function ($query) {
                    $query->select(['id', 'case_no']);
                }
                , 'ReleaseDetails', 'admin'])->where('delete_status', 1)->paginate(50);
        }
        if(request()->ajax()){
            return view('superadmin.pages.accounts.invoice-table',compact('invoice'));
           }
        $unit=Unit::where('delete_status',1)->get();
        return view('superadmin.pages.accounts.invoice_index',compact('invoice','unit'));
    }
    public function PrintInvoice($id)
    {

       $case=casereg_model::findOrFail($id);
       $crime=crime_model::all();
       $accounts=Accounts::where('case_id',$case->id)->first();
       $release=ReleaseCase::where('case_id',$id)->first();
       $withdraData=CaseWithdrawRequest::where('case_id',$id)->first();
        return view('superadmin.pages.accounts.invoice_print',compact('case','crime','accounts','release','withdraData'));
    }
    public function homeData(){
        $forwardCase=ForwadAcceptCase::where('forward_status',1)->where('accept_status',0)->where('drop_status',0)->get();
        $acceptCase=ForwadAcceptCase::where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->get();
        $release=ReleaseCase::where('delete_status',1)->get();
        $total=Accounts::where('delete_status',1)->sum('total');
        $drop=ForwadAcceptCase::where('drop_status',1)->get();
        $f=count($forwardCase);
        $a=count($acceptCase);
        $r=count($release);
        $d=count($drop);
        $army=ForwadAcceptCase::where('delete_status',1)->where('unit_id',2)->count();
        $mp=ForwadAcceptCase::where('delete_status',1)->where('unit_id',1)->count();
        $ar=ForwadAcceptCase::where('delete_status',1)->where('unit_id',3)->count();
        return array($f,$a,$r,$total,$d,$army,$mp,$ar);

    }
    public function CaseFinder(Request $request){
        // return $request;
        $field=$request->field_name;
        $value=$request->value;
        $box=Box::where('delete_status',1)->get();
        $cases=[];
                if (!empty($field) && !empty($value)) {
                    //  return $request;
                    $findCase=casereg_model::where($field,'LIKE','%'.$value.'%')->where('forwared',1)->first();
                        if(!empty($findCase)){
                        $cases=ForwadAcceptCase::CaseData()->where('delete_status',1)
                        ->where('case_id','LIKE','%'.$findCase->id ?? ''.'%')
                        ->paginate(50);
                    }
                }
         if(request()->ajax()){
             return view('superadmin.pages.case.case-finder-table',compact('cases','box'));
            }
        return view('superadmin.pages.case.case-finder',compact('cases','box'));
    }
    public function CaseFinderPOST(Request $request){
        // return $request;
        $field=$request->field_name;
        $value=$request->value;
        $box=Box::where('delete_status',1)->get();
         if (!empty($field) && !empty($value)) {
            //  return $request;
              $findCase=casereg_model::where($field,'LIKE','%'.$value.'%')->where('forwared',1)->first();
            if(!empty($findCase)){
            $cases=ForwadAcceptCase::CaseData()->where('delete_status',1)
            ->where('case_id','LIKE','%'.$findCase->id ?? ''.'%')
            ->paginate(50);
        }
        else{
            $cases=ForwadAcceptCase::CaseData()->where('case_id',0)->where('delete_status',1)->paginate(50);
            }
         }else {
            $cases=ForwadAcceptCase::CaseData()->where('case_id',0)->where('delete_status',1)->paginate(50);
         }
         if(request()->ajax()){
             return view('superadmin.pages.case.case-finder-table',compact('cases','box'));
            }
    }
    public function PenndingWithdraw(Request $request){
        // return $request;
        $date_form=$request->date_from;
        $date_to=$request->date_to;
       if (!empty($date_to) && !empty($date_form)) {
              $checkWithdra=CaseWithdrawRequest::with('admin','CaseDetails')->where('delete_status',1)->whereBetween('created_at', [$date_form.' 00:00:00',$date_to.' 23:59:59'])->where('status','Processing')->paginate(50);
        }else{
            $checkWithdra=CaseWithdrawRequest::with('admin','CaseDetails')->where('delete_status',1)->where('status','Processing')->paginate(50);
        }
         if(request()->ajax()){
            return view('superadmin.pages.withdraw-request.table',compact('checkWithdra'));
           }
        return view('superadmin.pages.withdraw-request.index',compact('checkWithdra'));
    }
    public function UndoDrop($id){
         $case=ForwadAcceptCase::where('case_id',$id)->latest()->first();
          $drop=DCBDrop::where('case_id',$id)->latest()->first();
         if($case->drop_status==1 && $drop){
            $case->drop_status=0;
            $case->save();
            // return 'ok'
             $drop->delete_status=0;
             $drop->user=Auth::user()->id;
             $drop->save();
             Toastr::success('This case is drop undo','Successfull');
             return back();
         }else{
            Toastr::error("You have something wrong",'Error');
            return back();

         }
    }
    public function FineConsider(Request $request,$id){
        // return $request;
        $cid=$request->id;
          $forward=ForwadAcceptCase::with('consider')->where('case_id',$cid)->first();
        $cons=FineConsideration::where('case_id',$cid)->first();
        if($forward ){
            $consider=new FineConsideration();
            $consider->case_id=$cid;
            $consider->forward_id=$forward->id;
            $consider->amount=$request->amount;
            $consider->comments=$request->comment;
            $consider->user_id=Auth::user()->id;
            $consider->date=date('Y-m-d');
            $consider->save();
            return response(json_encode(['success' => 'your consideration successfull']));
        }else{
            return response(json_encode(['error' => 'you have something wrong']));
        }
    }
    public function ConfirmWithdra(Request $request){
        $case = casereg_model::findOrFail($request->id);
        $forward = ForwadAcceptCase::where('case_id',$request->id)->first();
        $withdraData = CaseWithdrawRequest::findOrFail($request->w_id);
        if($case && $forward && $withdraData){
            $forward->release_status = 1;
            if ($forward->save() == true) {
                $release = new ReleaseCase();
                $release->forward_accept_id = $forward->id;
                $release->case_id = $case->id;
                $release->case_no = $case->case_no;
                $release->unit_id = $case->unit_id;
                $release->release_status = 1;
                $release->packet_no = $request->packet_no;
                $release->release_user = Auth::user()->id;
                $release->release_date = date('Y-m-d');
                $release->box_no =  $forward->box_no;
                $release->total_fine = $request->fine;
                $release->consider = $request->consider;
                $release->total = $request->total;
                $release->comments = $request->comments;
                if ($release->save() == true) {
                    $account = new Accounts();
                    $account->release_id = $release->id;
                    $account->unit_id = $case->unit_id;
                    $account->case_id = $case->id;
                    $account->payment_method = $withdraData->payment_method;
                    $account->cheque_number = $request->cheque_number;
                    $account->account_number = $request->account_number;
                    $account->mobile_operator = $withdraData->mobile_operator;
                    $account->mobile_number = $request->mobile_number;
                    $account->tax_transaction_id = $withdraData->tax_transaction_id;
                    $account->reference = $request->reference;
                    $account->bank_branch = $withdraData->bank_branch;
                    $account->total = $request->total;
                    $account->user_id = Auth::user()->id;
                    $account->date = date('Y-m-d');
                    $account->save();
                    $withdraData->status='Complete';
                    $withdraData->admin_id= Auth::user()->id;
                    $withdraData->save();
                    return response(json_encode(['success' => 'your case released successfull', 'id' =>$case->id]));
                    Toastr::success('Your release complete','Success');
                    return redirect()->route('superadmin.print.invoice',$case->id);

                    // return response(json_encode(['success' => 'your case released successfull', 'id' =>$case->id]));
                }
            }
        }else{
            Toastr::error('Your have something wrong','Error');
            return back();
        }
    }
    public function UserManagement(Request $request){
        $field=$request->field_name;
        $value=$request->value;
        if($field && $value){
            $user=User::where('delete_status',1)->where($field,'LIKE','%'.$value.'%')->paginate(50);
        }else{
            $user=User::where('delete_status',1)->paginate(50);
        }
        if(request()->ajax()){
            return view('superadmin.pages.users.table',compact('user'));
        }
    return view('superadmin.pages.users.index',compact('user'));
    }
}
