<?php

namespace App\Http\Controllers;

use App\addmp_model;
use App\casereg_model;
use App\crime_model;
use App\DCB\ForwadAcceptCase;
use App\location_model;
use App\paper_model;
use App\Unitauth;
use App\vehicle_model;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class SystemAdminCotroller extends Controller
{
    //============================================Register Case=====================
    public function case_register_home()
    {
        $location=location_model::where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->get();
        $vehicle=vehicle_model::where('delete_status',1)->get();
        $crime=crime_model::where('delete_status',1)->get();
        $papers=paper_model::where('delete_status',1)->get();
        $mp=Unitauth::where('unit_id',Auth::user()->unit_id)->get();

        $unit=Auth::user()->unit_id;
        $case_model=casereg_model::where('unit_id',$unit)->latest()->first();

        return view('unitauth.sub-admin.case_register',compact('location','vehicle','crime','papers','mp'));
    }
    public function registercase_store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'case_no' => 'required|unique:casereg',
        ]);
        $data = [
            'id_mp' => $request->id_mp,
            'case_no' => $request->case_no,
            'victim_name' => $request->victim_name,
            'victim_mb' => $request->victim_mb,
            'vehical_reg' => $request->vehical_reg,
            'date_off' => $request->date_off,
            'time_off' => $request->time_off,
            'date_disposal' => $request->date_disposal,
            'time_disposal' => $request->time_disposal,
            'loc' => $request->loc,
            'vehical_type' => $request->vehical_type,
            'victim' => $request->victim,
            'crime_type' => json_encode($request->crime_type,true),
            'paper' => json_encode($request->paper,true),
            // 'paper_number' => $request->paper_number,
            'unit_id' => Auth::user()->unit_id,
        ];
        casereg_model::create($data);
        $notification = array(
            'message' => 'Case Saved Successfully!',
            'alert-type' => 'towl'
        );
        return Redirect()->back()->with($notification);
    }
    //============================================End Register Case==================
    //=================================new caselist=======================
    public function new_caselist(Request $request)
    {
        // return $request;
        $field=$request->field_name;
        $value=$request->value;
            $mpdata=Unitauth::where('unit_id',Auth::user()->unit_id)->where('delete_status',1)->where('status',1)->get();
            $location=location_model::where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->get();
            $vehicles=vehicle_model::where('delete_status',1)->get();
            $crimes=crime_model::where('delete_status',1)->get();
            $papers=paper_model::where('delete_status',1)->get();
             $queryData=casereg_model::NewCaseInComplete();
            if (!empty($field) && !empty($value)) {
                $newcase = $queryData
                //   ->where($field, $value)
                  ->where($field,'LIKE','%'.$value.'%')
                  ->paginate(50);
          }else {
            $newcase = $queryData->paginate(50);
          }
          if(request()->ajax()){
          return view('unitauth.sub-admin.newcase-table',compact('newcase','crimes'));
          }
    	return view('unitauth.sub-admin.new_case',compact('newcase','mpdata','location','vehicles','crimes','papers'));
    }
    //search_case
    public function findcase(Request $request,$id){
//        return $id;
     return    $data=casereg_model::where('delete_status',1)->where('id',$id)->first();
        return response(json_encode($data));
    }
    public function case_update(Request $request,$id)
    {
        // return $request;
        $data = [
            'id_mp' => $request->id_mp,
            'case_no' => $request->case_no,
            'victim_name' => $request->victim_name,
            'victim_mb' => $request->victim_mb,
            'vehical_reg' => $request->vehical_reg,
            'date_off' => $request->date_off,
            'time_off' => $request->time_off,
            'date_disposal' => $request->date_disposal,
            'time_disposal' => $request->time_disposal,
            'loc' => $request->loc,
            'vehical_type' => $request->vehical_type,
            'victim' => $request->victim,
            'crime_type' => json_encode($request->crime_type,true),
            'paper' => json_encode($request->paper,true),
            'paper_number' => $request->paper_number,
        ];
        casereg_model::find($id)->update($data);
        return redirect()->back()->with('message','Update Successfully!');
    }
    /*=================================Complet New Case========================*/
    public function complet_caselist(Request $request)
    {
        $field=$request->field_name;
        $value=$request->value;
        $mpdata=Unitauth::where('unit_id',Auth::user()->unit_id)->where('delete_status',1)->where('status',1)->get();
        $location=location_model::where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->get();
        $vehicles=vehicle_model::where('delete_status',1)->get();
        $crimes=crime_model::where('delete_status',1)->get();
        $papers=paper_model::where('delete_status',1)->get();
        if (!empty($field) && !empty($value)) {
               $newcasecomplet = casereg_model::NewCaseComplete()
               ->where($field,'LIKE','%'.$value.'%')
               ->paginate(50);
        }else {
            $newcasecomplet = casereg_model::NewCaseComplete()->paginate(50);
        }
        if(request()->ajax()){
        return view('unitauth.sub-admin.completecase-table',compact('newcasecomplet','crimes'));
        }
        return view('unitauth.sub-admin.new_complet_case',compact('newcasecomplet','mpdata','location','vehicles','crimes','papers'));
    }
    //===========================================forwardoffsofficer_index=======================
    public function forwardallstore(Request $request)
    {
        // return $request;

        $validatedData = $request->validate([
            'chk' => 'required',
        ]);
        $x = casereg_model::whereIn('id', $request['chk'])
            ->where('drop_type', '=', 0)
            ->where('unit_id', Auth::user()->unit_id)
            ->update(array('forwared' => 1));
        foreach ($request->chk as $fdata){
            if ($fdata!='on'){
                $caseDetail=casereg_model::findorFail($fdata);
                $forward=new ForwadAcceptCase();
                $forward->case_id=$caseDetail->id;
                $forward->case_no=$caseDetail->case_no;
                $forward->unit_id=$caseDetail->unit_id;
                $forward->forward_status=1;
                $forward->forward_user=Auth::user()->id;
                $forward->forward_date=date('Y-m-d');
                $forward->save();
            }
        }
        return response(json_encode(['success' => 'your case Forward success full']));
//        exit();
//        dd($request);
        if ($request->buttton == 'forward') {

            $x = casereg_model::whereIn('id', $request['chk'])
                ->where('drop_type', '=', 0)
                ->where('unit_id', Auth::user()->unit_id)
                ->update(array('forwared' => 1));
            foreach ($request->chk as $fdata){
                if ($fdata!='on'){
                    $caseDetail=casereg_model::findorFail($fdata);
                    $forward=new ForwadAcceptCase();
                    $forward->case_id=$caseDetail->id;
                    $forward->case_no=$caseDetail->case_no;
                    $forward->unit_id=$caseDetail->unit_id;
                    $forward->forward_status=1;
                    $forward->forward_user=Auth::user()->id;
                    $forward->forward_date=date('Y-m-d');;
                    $forward->save();
                }
            }
            return response(json_encode(['success' => 'your case accepted successfull']));
//            Toastr::success('Your case forward success full','Success');
//            return back();
//            return view('unitauth.sub-admin.new_complet_case',compact('newcasecomplet'))->with($notification);
        }
        elseif($request->buttton == 'print')
        {
            $allcase =casereg_model::whereIn('id', $request['chk'])->where('unit_id', Auth::user()->unit_id)->get();
            return view('unitauth.sub-admin.print_case',compact('allcase'));
        }
        else
        {
            return Redirect()->back();
        }
    }
    public function caseforwardsingle_store(Request $request,$id)
    {
//        return $id;
        $caseDetail=casereg_model::findorFail($id);
        $caseDetail->forwared=1;
        if ($caseDetail->save()) {
            $forward = new ForwadAcceptCase();
            $forward->case_id = $caseDetail->id;
            $forward->case_no = $caseDetail->case_no;
            $forward->unit_id = $caseDetail->unit_id;
            $forward->forward_status = 1;
            $forward->forward_user = Auth::user()->id;
            $forward->forward_date = date('Y-m-d');;
            $forward->save();
            return response(json_encode(['success' => 'your case forward successfull']));
//           Toastr::Success('Thank you forward success','Success');
//           return redirect()->route('unitauth.completnewcase');
        }
    }
    //================search_case
    public function search_case_complet(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $newcasecomplet = casereg_model::where('forwared', '=', '0')
                            ->where('drop_type', '=', '0')
                            ->where('unit_id', Auth::user()->unit_id)
                             ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                            $query->whereBetween('case_no', [$from_sl, $to_sl])
                            ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->get();
            return view('unitauth.sub-admin.new_complet_case',compact('newcasecomplet'));
            //return redirect()->back()->with( ['newcasecomplet' => $newcasecomplet] );
    }
    public function search_case(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $newcase =casereg_model::where('forwared', '=', '0')->where('drop_type', '=', '0')
                                ->where('unit_id', Auth::user()->unit_id)
                                ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                                $query->whereBetween('case_no', [$from_sl, $to_sl])
                               ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->get();
            return view('unitauth.sub-admin.new_case',compact('newcase'));
    }
    public function filter_forwardcase(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $forwared_case =casereg_model::where('forwared', '=', 1)
            ->where('unit_id', Auth::user()->unit_id)
            ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                $query->whereBetween('case_no', [$from_sl, $to_sl])
                    ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->get();
        return view('unitauth.sub-admin.forwared_case',compact('forwared_case'));
    }
    public function filter_allcase(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $allcase = casereg_model::where('drop_type', '=', 0)
            ->where('unit_id', Auth::user()->unit_id)
            ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                $query->whereBetween('case_no', [$from_sl, $to_sl])
                    ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->get();
        return view('unitauth.sub-admin.allcase',compact('allcase'));
    }
    //=============================end filter=========================
    public function forwardoffsofficer_index(Request $request)
    {
        // return $request;

        $date_to=$request->date_to;
       $date_form=$request->date_from;
        $crimes=crime_model::where('delete_status',1)->get();
        if (!empty($date_to) && !empty($date_form)) {
             $forwared_case = ForwadAcceptCase::with(['CaseDetails'=>function($q){
                $q->select(['id','case_no','id_mp','victim_name','victim_mb','vehical_reg','date_off','time_off','date_disposal','loc','victim','vehical_type','paper','crime_type','unit_id']);
            }
            ])->where('unit_id', Auth::user()->unit_id)->whereBetween('forward_date', [$date_form, $date_to])->orderBy('id','desc')->paginate(10000);
      }else {
         $forwared_case = ForwadAcceptCase::with(['CaseDetails'=>function($q){
            $q->select(['id','case_no','id_mp','victim_name','victim_mb','vehical_reg','date_off','time_off','date_disposal','loc','victim','vehical_type','paper','crime_type','unit_id']);
            }
            ])->where('unit_id', Auth::user()->unit_id)->orderBy('id','desc')->paginate(50);
     }
        if(request()->ajax()){
            return view('unitauth.sub-admin.forward-table',compact('forwared_case','crimes'));
                // return $newcasecomplet;
                // return Response::json(View::make('newcasecomplet', array('newcasecomplet' => $newcasecomplet))->render());
            }
    	return view('unitauth.sub-admin.forwared_case',compact('forwared_case','crimes'));
    }
    //allcase_index
    public function allcase_index(Request $request)
    {
        //
        // return $request;
        $field=$request->field_name;
        $value=$request->value;
        // $date_to=$request->date_to;
        // $date_form=$request->date_from;
        $crimes=crime_model::where('delete_status',1)->get();

    	// $allcase = casereg_model::where('unit_id', Auth::user()->unit_id)->get();
        //  if (!empty($date_to) && !empty($date_form)) {
         if (!empty($field) && !empty($value)) {
             $allcase = casereg_model::where('unit_id', Auth::user()->unit_id)
                                // ->whereBetween('date_off', [$date_form, $date_to])
                                ->where($field,'LIKE','%'.$value.'%')
                                ->orderBy('id', 'DESC')->paginate(50);
       }else {
          $allcase =casereg_model::where('unit_id', Auth::user()->unit_id)->orderBy('id', 'DESC')->paginate(50);
       }
         if(request()->ajax()){
             return view('unitauth.sub-admin.allcase-table',compact('allcase','crimes'));
             }
    	return view('unitauth.sub-admin.allcase',compact('allcase','crimes'));
    }
    //allcase_print
    public function allcase_print()
    {
    	$allcase =casereg_model::where('forwared', '=', '0')
                                       ->where('drop_type', '=', '0')
                                       ->where('unit_id', Auth::user()->unit_id)
                                       ->get();
        $affected = DB::table('casereg')->where('forwared', '=', 0)
                                        ->where('drop_type', '=', 0)
                                        ->update(array('forwared' => 1));
    	return view('unitauth.sub-admin.print_case',compact('allcase'));
    }
    public function Case_finder(Request $request){
        // return $request;
          $field=$request->field_name;
         $value=$request->value;
        //  return $case = casereg_model::where('unit_id', Auth::user()->unit_id)
        //                 ->where($field,'LIKE','%'.$query.'%')
        //                 ->orderBy('id', 'DESC')->paginate(50);

        $mpdata=Unitauth::where('unit_id',Auth::user()->unit_id)->where('delete_status',1)->where('status',1)->get();
        $location=location_model::where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->get();
        $vehicles=vehicle_model::where('delete_status',1)->get();
        $crimes=crime_model::where('delete_status',1)->get();
        $papers=paper_model::where('delete_status',1)->get();
        if (!empty($field) && !empty($value)) {
               $case = casereg_model::where('unit_id', Auth::user()->unit_id)
                        ->where($field,'LIKE','%'.$value.'%')
                        ->orderBy('id', 'DESC')->paginate(50);
      }else {
          $case =casereg_model::where('unit_id', Auth::user()->unit_id)->where('case_no','0000')->orderBy('id', 'DESC')->paginate(50);
      }
    if(request()->ajax()){
        return view('unitauth.case_finder_table',compact('case','mpdata','location','vehicles','crimes','papers'));
    }
        return view('unitauth.case_finder',compact('case','mpdata','location','vehicles','crimes','papers'));
    }
    public function Case_finderPost(Request $request){
          $field=$request->field_name;
         $value=$request->value;

        $crimes=crime_model::where('delete_status',1)->get();
        $papers=paper_model::where('delete_status',1)->get();
        if (!empty($field) && !empty($value)) {
        $case = casereg_model::where('unit_id', Auth::user()->unit_id)
                        ->where($field,'LIKE','%'.$value ?? ''.'%')
                        ->orderBy('id', 'DESC')->paginate(50);
      }else {
          $case =casereg_model::where('unit_id', Auth::user()->unit_id)->where('case_no','0000')->orderBy('id', 'DESC')->paginate(50);
      }
    if(request()->ajax()){
        return view('unitauth.case_finder_table',compact('case','crimes'));
    }
    }
    public function ForwardReport(Request $request){
        $date_to=$request->date_to;
        $date_form=$request->date_from;
         if (!empty($date_to) && !empty($date_form)) {
            $forward=ForwadAcceptCase::select(['forward_date'])->groupBy('forward_date')
            ->whereBetween('created_at', [$date_form.' 00:00:00',$date_to.' 23:59:59'])
            ->where('unit_id',Auth::user()->unit_id)->paginate(50);
         }else{
            $forward=ForwadAcceptCase::select(['forward_date'])->groupBy('forward_date')->where('unit_id',Auth::user()->unit_id)->paginate(10);
         }

        $caseCount=ForwadAcceptCase::where('delete_status',1)->get();

        if(request()->ajax()){
            return view('unitauth.forward-report-table',compact('forward','caseCount'));
        }

        return view('unitauth.forward-report',compact('forward','caseCount'));
    }
    public function ForwardReportDate($date){
          $forward=ForwadAcceptCase::with(['CaseDetails'])->where('forward_date',$date)->where('unit_id',Auth::user()->unit_id)->get();

        $crimes=crime_model::where('delete_status',1)->get();
          return view('unitauth.forwared_case-print',compact('forward','crimes'));
    }
     public function CaseSlip($id)
    {
        $case=casereg_model::findOrFail($id);
        $crime=crime_model::where('delete_status',1)->get();
        if($case){
            return view('unitauth.caseslip',compact('case','crime'));
        }
    }
}
