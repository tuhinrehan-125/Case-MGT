<?php

namespace App\Http\Controllers;

use App\addmp_model;
use App\casereg_model;
use App\crime_model;
use App\location_model;
use App\paper_model;
use App\Systemadmin;
use App\Unitauth;
use App\User;
use App\vehicle_model;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MpAdminController extends Controller
{
/*============cases====================*/
    /*==================================new_case=============*/
    public function newcase_index(Request $request)
    {
        // return $request;
        $date_to=$request->date_to;
        $date_form=$request->date_from;

        $field=$request->field_name;
         $value=$request->value;

        // if (!empty($date_to) && !empty($date_form)) {
            if (!empty($field) && !empty($value)) {
            $newcase = casereg_model::where('forwared', '=', '0')
            ->where('drop_type', '=', '0')
            ->where('unit_id', Auth::user()->unit_id)
            // ->whereBetween('date_off', [$date_form, $date_to])
            ->where($field,'LIKE','%'.$value.'%')
            ->orderBy('id', 'DESC')->paginate(50);
        }else {
            $newcase = casereg_model::where('forwared', '=', '0')
            ->where('drop_type', '=', '0')
            ->where('unit_id', Auth::user()->unit_id)
            ->orderBy('id', 'DESC')->paginate(50);
        }
        $mpdata=Unitauth::where('unit_id',Auth::user()->unit_id)->where('delete_status',1)->where('status',1)->get();
        $location=location_model::where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->get();
        $vehicles=vehicle_model::where('delete_status',1)->get();
        $crimes=crime_model::where('delete_status',1)->get();
        $papers=paper_model::where('delete_status',1)->get();
        if(request()->ajax()){
            return view('unitauth.pages.cases.newcase-table',compact('newcase','crimes'));
          }
        return view('unitauth.pages.cases.new_case',compact('newcase','mpdata','location','vehicles','crimes','papers'));
    }
    /*=================================case_update================*/
    public function case_update(Request $request,$id)
    {
//        return $request;
        $data = [
            'id_mp' => $request->id_mp,
            'case_no' => $request->case_no,
            'victim_name' => $request->victim_name,
            'victim_mb' => $request->victim_mb,
            'vehical_reg' => $request->vehical_reg,
            'date_off' => date('Y-m-d'),
            'time_off' => $request->time_off,
            'date_disposal' => \Carbon\Carbon::now()->addDays('30')->format('Y-m-d'),
            'time_disposal' => $request->time_disposal,
            'loc' => $request->loc,
            'vehical_type' => $request->vehical_type,
            'victim' => $request->victim,
            'crime_type' => json_encode($request->crime_type,true),
            'paper' => json_encode($request->paper,true),
            'paper_number' => $request->paper_number,
        ];
        casereg_model::find($id)->update($data);
}
    /*==================================forward case*/
    public function forwardcase_index(Request $request)
    {
        $field=$request->field_name;
         $value=$request->value;

         $crimes=crime_model::where('delete_status',1)->get();
        // if (!empty($date_to) && !empty($date_form)) {
            if (!empty($field) && !empty($value)) {
            $forwared_case =  casereg_model::where('forwared', '=', 1)->where('unit_id', Auth::user()
            ->unit_id)
            ->where($field,'LIKE','%'.$value.'%')
            ->orderBy('id', 'DESC')->paginate(50);
        }else {
            $forwared_case = casereg_model::where('forwared', '=', 1)->where('unit_id', Auth::user()
            ->unit_id)
            ->orderBy('id', 'DESC')->paginate(50);
        }
        if(request()->ajax()){
            return view('unitauth.pages.cases.forwardcase-table',compact('forwared_case','crimes'));
          }
        return view('unitauth.pages.cases.forwared_case',compact('forwared_case','crimes'));
    }
    /*=================================Drop Case*/
    public function dropcase_index(Request $request)
    {
        $field=$request->field_name;
        $value=$request->value;

       // if (!empty($date_to) && !empty($date_form)) {
        $crimes=crime_model::where('delete_status',1)->get();
        if (!empty($field) && !empty($value)) {
            $drop_case =casereg_model::where('drop_type', '=', 1) ->where('unit_id', Auth::user()->unit_id)
            ->where($field,'LIKE','%'.$value.'%')
            ->orderBy('id', 'DESC')->paginate(50);
        }else {
            $drop_case =casereg_model::where('drop_type', '=', 1) ->where('unit_id', Auth::user()->unit_id)
            ->orderBy('id', 'DESC')->paginate(50);
        }
        if(request()->ajax()){
            return view('unitauth.pages.cases.dropcase-table',compact('drop_case','crimes'));
          }
        // $drop_case =casereg_model::where('drop_type', '=', 1) ->where('unit_id', Auth::user()->unit_id)->get();
        return view('unitauth.pages.cases.drop_case',compact('drop_case','crimes'));
    }
    public function casedrop_store($id)
    {
        $case=casereg_model::findOrFail($id);
        $case->drop_type=1;
        if ($case->save()){
            return response(json_encode(['success' => 'Your data drop Success full']));
        }
     }
    public function allcases_index(Request $request)
    {
        $field=$request->field_name;
        $value=$request->value;


        $crimes=crime_model::where('delete_status',1)->get();
        if (!empty($field) && !empty($value)) {
            $allcase = casereg_model:: where('unit_id', Auth::user()->unit_id)
            ->where($field,'LIKE','%'.$value.'%')
            ->orderBy('id', 'DESC')->paginate(50);
        }else {
            $allcase = casereg_model:: where('unit_id', Auth::user()->unit_id)
            ->orderBy('id', 'DESC')->paginate(50);
        }
        if(request()->ajax()){
            return view('unitauth.pages.cases.allcase-table',compact('allcase','crimes'));
          }
        // $allcase = casereg_model:: where('unit_id', Auth::user()->unit_id)->get();
        return view('unitauth.pages.cases.all_case',compact('allcase','crimes'));
    }
    /*==========location==================*/
    public function mplocation_index()
    {
    	$location = location_model::where('unit_id', Auth::user()->unit_id)->get();
    	return view('unitauth.pages.mplocation',compact('location'));
    }
    public function location_store(Request $request)
    {
//        return $request;
        $this->validate($request,[
            'type'=>'required',
            'location'=>'required',
        ]);
    	 $data=new location_model();
    	 $data->type=$request->type;
    	 $data->location=$request->location;
    	 $data->unit_id=Auth::user()->unit_id;
    	 $data->save();
    	 Toastr::Success('Add Location Success','Success');
    	 return back();
    }
    public function locatione_update(Request $request,$id)
    {
       location_model::find($id)->update($request->all());
        Toastr::Success('Location Update Success','Success');
        return back();
    }
    /*======================================================location==========================================*/

    /*======================================================mpvehicletype======================================*/
    public function mpvehicletype_index()
    {
        $vehicle = vehicle_model::where('delete_status',1)->get();
        return view('superadmin.pages.vehicale.mpvehicle',compact('vehicle'));
    }
    public function vehicle_store(Request $request)
    {
         $validatedData = $request->validate([
            'type' => 'required',
            'vehicle' => 'required|unique:vehicle_models',
         ]);
        vehicle_model::create($request->all());
        Toastr::Success('Vehicle data Successfully Add', 'Success');
        return back();
        //dd($request);
    }
    public function vehicle_update(Request $request,$id)
    {
       vehicle_model::find($id)->update($request->all());
        $notification = array(
                'message' => 'Vehicle data Updated Successfully!',
                'alert-type' => 'success'
        );
        Toastr::Success('Vehicle data Successfully Update', 'Success');
        return back();
    }
    public function vehicle_delete($id)
    {

        $vehicle= vehicle_model::findOrFail($id);
        if ($vehicle->id==$id){
            $vehicle->delete_status=0;
        }
        $vehicle->save();
        Toastr::success('vehicle list Delete success','Success');
        return back();
    }
    /*======================================================mpvehicletype=================================*/

    /*======================================================mp_store========================================*/
    public function mp_index()
    {
            $mp =addmp_model::all();
            return view('unitauth.pages.mp.add_mp',compact('mp'));
    }
    public function mp_store(Request $request)
    {

        $validatedData = $request->validate([
            'name_mp' => 'required',
            'ba_no' => 'required|unique:addmp',
            /*'mp_mb' => 'required|unique:addmp',*/
        ]);
/*        dd($request);*/
        \App\addmp_model::create($request->all());
        $notification = array(
            'message' => 'MP Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function mp_update(Request $request,$id)
    {
        //dd($request);
        $validatedData = $request->validate([
            'name_mp' => 'required',
            'ba_no' => 'required',
            /*'mp_mb' => 'required',*/
        ]);
        //dd($request);
        \App\addmp_model::find($id)->update($request->all());
        $notification = array(
            'message' => 'MP Information updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /*======================================================mp_store========================================*/

    /*======================================================paper_index=========================================*/
    public function paper_index()
    {
        $paper = paper_model::where('delete_status',1)->get();
        return view('superadmin.pages.paper.paper',compact('paper'));
    }
    public function paper_store(Request $request)
    {
        $validatedData = $request->validate([
            'paper' => 'required',
        ]);
        //dd($request);
        paper_model::create($request->all());
        $notification = array(
            'message' => 'Successfull!',
            'alert-type' => 'success'
        );
        Toastr::Success('Paper data Successfully Add', 'Success');
        return back();
    }

    public function paper_update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'paper' => 'required',
        ]);

        paper_model::find($id)->update($request->all());
        $notification = array(
            'message' => 'Paper updated Successfully!',
            'alert-type' => 'success'
        );
        Toastr::Success('Paper data Successfully Update', 'Success');
        return back();
    }
    public function paper_delete($id)
    {
        $paper= paper_model::findOrFail($id);
        if ($paper->id==$id){
            $paper->delete_status=0;
        }
        $paper->save();
        Toastr::success('Paper list Delete success','Success');
        return back();
    }
    /*======================================================end paper_index=====================================*/

   /*=======================================================crime==============================================*/
    public function mpcrimelist_index()
    {
        $crime = crime_model::where('delete_status',1)->orderBy('id', 'DESC')->get();
        return view('superadmin.pages.crime.mpcrime',compact('crime'));
    }
    public function crime_store(Request $request)
    {
         $this->validate($request,[
            'type' => 'required',
            'crime' => 'required|unique:crime_models',
         ]);
       $crime=new crime_model();
       $crime->crime=$request->crime;
       $crime->fine_crime=$request->fine_crime;
       $crime->save();
       Toastr::success('Crime list Add success','Success');
       return back();
        //dd($request);
    }
    public function crime_update(Request $request,$id)
    {
        $crime= crime_model::findOrFail($id);
        $crime->crime=$request->crime;
        $crime->fine_crime=$request->fine_crime;
        $crime->save();
        Toastr::success('Crime list Update success','Success');
        return back();
    }
    public function crime_delete($id)
    {
        $crime= crime_model::findOrFail($id);
        if ($crime->id==$id){
            $crime->delete_status=0;
        }
        $crime->save();
        Toastr::success('Crime list Delete success','Success');
        return back();
    }
    /*==========location===================*/

    /*==========mpaccess_index===============*/
    public function mpaccess_index()
    {
        $mp = \App\Mp::all();
        return view('admin.pages.mp_access',compact('mp'));
    }
    public  function mpuser_update(Request $request,$id)
    {
        \App\Mp::find($id)->update($request->all());
        $notification = array(
                'message' => 'Updated!',
                'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /*============================systemadminaccess_index===================*/
    public function systemadminaccess_index()
    {
        $system_admin = \App\Systemadmin::all();
        return view('admin.pages.systemadmin_access',compact('system_admin'));
    }
    public function deskuser_update(Request $request,$id)
    {
        \App\Systemadmin::find($id)->update($request->all());
        $notification = array(
                'message' => 'Updated!',
                'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /*===========================filter_searchnewcase===============*/
    public function filter_searchnewcase(Request $request)
    {
        //dd($request);
/*        dd($from_date);*/
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $newcase = casereg_model::where('forwared', '=', '0')->where('drop_type', '=', '0')
            ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                $query->whereBetween('case_no', [$from_sl, $to_sl])
                    ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->where('unit_id', Auth::user()->unit_id)
            ->get();
        return view('admin.pages.cases.new_case',compact('newcase'));
    }
    /*===========================filter_forwaredcase===============*/
    public function filter_forwaredcase(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $forwared_case = casereg_model::where('forwared', '=', 1)
            ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                $query->whereBetween('case_no', [$from_sl, $to_sl])
                    ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->where('unit_id', Auth::user()->unit_id)
            ->get();
        return view('admin.pages.cases.forwared_case',compact('forwared_case'));
    }
    /*===========================filter_allcase===============*/
    public function filter_allcase(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $allcase =casereg_model::whereBetween('case_no', [$from_sl, $to_sl])->orWhereBetween('date_off', [$from_date, $to_date]) ->where('unit_id', Auth::user()->unit_id)->get();
        return view('admin.pages.cases.all_case',compact('allcase'));
    }
    /*===========================filter_dropcase===============*/
    public function filter_dropcase(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        /*$drop_case = \App\casereg_model::where('drop_type', '=', 1)->get();*/

        $drop_case =casereg_model::where('drop_type', '=', 1)
            ->where(function ($query) use ($from_date,$to_date,$from_sl,$to_sl) {
                $query->whereBetween('case_no', [$from_sl, $to_sl])
                    ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->where('unit_id', Auth::user()->unit_id)
            ->get();
        return view('admin.pages.cases.drop_case',compact('drop_case'));
    }
    /*=======================Register Create======================*/
    public function mpregister_store(Request $request)
    {
        \App\Mp::create([
            'name' => $request->name,
            'email' => $request->email,
            'banumber' => $request->banumber,
            'password' => bcrypt($request->password),
        ]);
        $notification = array(
            'message' => 'MP Login Access Created Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function sadminregister_store(Request $request)
    {
        Systemadmin::create([
            'name' => $request->name,
            'email' => $request->email,
            'banumber' => $request->banumber,
            'password' => bcrypt($request->password),
        ]);
        $notification = array(
            'message' => 'Desk Admin Login Access Created Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function MpCases(Request $request){
        $date_to=$request->date_to;
        $date_form=$request->date_from;
        // return $request;
         if (!empty($date_to) && !empty($date_form)) {
             $mp=Unitauth::with(['UnitRole','CaseDetails'=>function($query)use($date_form,$date_to){
                $query->select(['id','id_mp','created_at','delete_status'])->whereBetween('created_at', [$date_form.' 00:00:00',$date_to.' 23:59:59']);
            }])->where('unit_id',Auth::user()->unit_id)->get()->sortByDesc(function($product) {
                return $product->CaseDetails->count();
           });
         }else{
            $mp=Unitauth::with(['UnitRole','CaseDetails'=>function($query){
                $query->select(['id','id_mp','created_at']);
            }])->where('unit_id',Auth::user()->unit_id)->get()->sortByDesc(function($product) {
                return $product->CaseDetails->count();
           });
         }
         if(request()->ajax()){
            return view('unitauth.pages.mp.mp-cases-table',compact('mp'));}


        return view('unitauth.pages.mp.mp-cases',compact('mp'));
    }
    public function VehicleTracking(){
        $case=User::with(['Case'=>function($q){
                    $q->select(['id','id_mp','user_id'])->where('delete_status',1);
                }
                ])->select(['id','name','phone','vehicle_number'])
                ->where('delete_status',1)->get()->sortByDesc(function($qr) {
                    return $qr->Case->count();
                });
    return view('unitauth.pages.vehicle_track.index',compact('case'));
    }

}
