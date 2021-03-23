<?php

namespace App\Http\Controllers;

use App\casereg_model;
use App\crime_model;
use App\DCB\ForwadAcceptCase;
use App\location_model;
use App\paper_model;
use App\Unitauth;
use App\User;
use App\vehicle_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseAPIController extends Controller
{
   public function RegisterCaseSuperAdmin(Request $request){
//       return 'ok';
       $date_to=$request->date_to;
       $date_form=$request->date_from;
       if (!empty($date_to) && !empty($date_form)) {
           $newcase = casereg_model::with(['unitauth'])->where('forwared', '=', '0')
               ->where('drop_type', '=', '0')
               ->where('unit_id', Auth::user()->unit_id)
               ->whereBetween('date_off', [$date_form, $date_to])
               ->orderBy('id', 'DESC')->get();
       }else {
           $newcase = casereg_model::with(['unitauth'])->where('forwared', '=', '0')
               ->where('drop_type', '=', '0')
               ->where('unit_id', Auth::user()->unit_id)
               ->orderBy('id', 'DESC')->get();
       }
       if(request()->ajax()){
           return datatables()->of($newcase)
               ->addColumn('select', function($data){
                   $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->id.'" name="chk[]" value="'.$data->id.'">
                        <label for="newcase1'.$data->id.'"></label>
                     </span>';
                   $button .= '&nbsp;&nbsp;';
                   return $button;
               })
               ->addColumn('edit', function($data){

                   if (Auth::user()->unit_role_id==1){

                       $button = '<table>
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i>
                                     Edit
                                    </a>
                                </td>
                                  <td>
                                <a href="#" name="buttton" value="singleforward" data-id="'.$data->id.'"  class="btn btn-sm btn-outline-success btn-forward">Forward</a>
                                </td>
                                <td>
                                    <a href="#"  data-id="'.$data->id.'" onclick="return confirm(\'Are you sure you want to drop this case?\');" class="btn btn-danger drop-btn">
                                        Drop
                                    </a>
                                </td>
                               </tr>
                               </table>';
                   }else{
                       $button = '<table>
                            <tr>
                                <td>
                                    <a href="" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i> Edit
                                    </a>
                                </td>
//                                <td>
//                                    <a href="'.route('unitauth.caseforward_single', $data->id).'" name="buttton" value="singleforward" data-id="'.$data->id.'"  class="btn btn-sm btn-danger">Forward</a>
//                                </td>
                               </tr>
                               </table>';
                   }
                   return $button;
               })
               ->addColumn('case_type',function ($data){
                   $case=json_decode($data->crime_type);
                   $crime=crime_model::all();
                   return view('unitauth.sub-admin.case_typeloop',compact('case','crime'));
               })
               ->addColumn('paper',function ($data){
                    $paper=$data->paper;
                   return view('unitauth.sub-admin.subadmin-case-paper',compact('paper','paperno'));
               })
               ->addIndexColumn()
               ->addColumn('mp',function ($data){
                    $user=Unitauth::where('id',$data->id_mp)->first();
                    if (!empty($user)){
                        return $user->name;
                    }else{
                        return '';
                    }
//                   return $data->Unitauth->name;
               })
               ->rawColumns(['select','edit','case_type','paper','mp','sl'])
               ->make(true);
       }
   }
   public function Newcase_unit_subadmin(Request $request){
//       return 'ok';
       $date_to=$request->date_to;
       $date_form=$request->date_from;
       if (!empty($date_to) && !empty($date_form)) {
           $newcase = casereg_model::with(['unitauth'])->where('forwared', '=', '0')
               ->where('drop_type', '=', '0')
               ->where('unit_id', Auth::user()->unit_id)
               ->whereBetween('date_off', [$date_form, $date_to])
               ->where(function ($query) {
                   $query->orwhereNull([
                       'id_mp', 'victim_name', 'victim_mb', 'vehical_reg', 'date_off',
                       'time_off', 'date_disposal', 'loc', 'victim',
                       'vehical_type', 'crime_type', 'paper'])
                       ->orwhere('crime_type', '=', 'null')
                       ->orwhere('paper', '=', 'null');
               })->orderBy('id', 'DESC')->get();
       }else {
           $newcase = casereg_model::with(['unitauth'])->where('forwared', '=', '0')
               ->where('drop_type', '=', '0')
               ->where('unit_id', Auth::user()->unit_id)
               ->where(function ($query) {
                   $query->orwhereNull([
                       'id_mp', 'victim_name', 'victim_mb', 'vehical_reg', 'date_off',
                       'time_off', 'date_disposal', 'loc', 'victim',
                       'vehical_type', 'crime_type', 'paper'])
                       ->orwhere('crime_type', '=', 'null')
                       ->orwhere('paper', '=', 'null');
               })->orderBy('id', 'DESC')->get();
       }

       if(request()->ajax()){
           return datatables()->of($newcase)
               ->addColumn('select', function($data){
                   $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->id.'" name="chk[]" value="'.$data->id.'">
                        <label for="newcase1'.$data->id.'"></label>
                     </span>';
                   $button .= '&nbsp;&nbsp;';
                   return $button;
               })
               ->addColumn('edit', function($data){

                   if (Auth::user()->unit_role_id==1){

                       $button = '<table>
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i> Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="#"  data-id="'.$data->id.'" onclick="return confirm(\'Are you sure you want to drop this case?\');" class="btn btn-danger drop-btn">
                                        Drop
                                    </a>
                                </td>

                               </tr>
                               </table>';
                   }else{
                       $button = '<table>
                            <tr>
                                <td>
                                    <a href="" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i> Edit
                                    </a>
                                </td>
                                <td>
                                <a href="#" name="buttton" value="singleforward" data-id="'.$data->id.'"  class="btn btn-sm btn-danger btn-forward">Forward</a>
                                </td>
                               </tr>
                               </table>';
                   }
                   return $button;
               })
               ->addColumn('case_type',function ($data){
                   $case=json_decode($data->crime_type);
                   $crime=crime_model::all();
                   return view('unitauth.sub-admin.case_typeloop',compact('case','crime'));
               })
               ->addColumn('paper',function ($data){
                    $paper=$data->paper;
                   return view('unitauth.sub-admin.subadmin-case-paper',compact('paper','paperno'));
               })
               ->addIndexColumn()
               ->addColumn('mp',function ($data){
                    $user=Unitauth::where('id',$data->id_mp)->first();
                    if (!empty($user)){
                        return $user->name;
                    }else{
                        return '';
                    }
//                   return $data->Unitauth->name;
               })
               ->rawColumns(['select','edit','case_type','paper','mp','sl'])
               ->make(true);
       }
   }
   public function allcase(Request $request){
       $date_to=$request->date_to;
       $date_form=$request->date_from;
       if (!empty($date_to) && !empty($date_form)){

           $allcase = casereg_model:: where('unit_id', Auth::user()->unit_id)->whereBetween('date_off', [$date_form,$date_to])->get();
       }else{
           $allcase = casereg_model:: where('unit_id', Auth::user()->unit_id)->get();
       }


       if(request()->ajax()){
           return datatables()->of($allcase)
               ->addColumn('select', function($data){
                   $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->id.'" name="chk[]" value="'.$data->id.'">
                        <label for="newcase1'.$data->id.'"></label>
                     </span>';
                   $button .= '&nbsp;&nbsp;';
                   return $button;
               })
               ->addColumn('edit', function($data){
                   $button = '<table>
                            <tr>
                                <td>
                                    <a href="" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i> Edit
                                    </a>
                                </td>
                                <td>
                                <a href="'.route('unitauth.caseforward_single', $data->id).'" name="buttton" value="singleforward" data-id="'.$data->id.'"  class="btn btn-sm btn-danger">Forward</a>
                                </td>
                               </tr>
                               </table>';
                   return $button;
               })
               ->addColumn('case_type',function ($data){
                   $case=json_decode($data->crime_type);
                   $crime=crime_model::all();
                   return view('unitauth.sub-admin.case_typeloop',compact('case','crime'));
               })
               ->addColumn('paper',function ($data){
                   $paper=$data->paper;
                   return view('unitauth.sub-admin.subadmin-case-paper',compact('paper','paperno'));
               })
               ->addIndexColumn()
               ->addColumn('mp',function ($data){
                   $user=Unitauth::where('id',$data->id_mp)->first();
                   if (!empty($user)){
                       return $user->name;
                   }else{
                       return '';
                   }
//                   return $data->Unitauth->name;
               })
               ->rawColumns(['select','edit','case_type','paper','mp','sl'])
               ->make(true);
       }
   }
   public function forwardCase(Request $request){
       $date_to=$request->date_to;
       $date_form=$request->date_from;
       if (!empty($date_to) && !empty($date_form)) {
           $forwared_case = casereg_model::where('forwared', '=', 1)->whereBetween('date_off', [$date_form, $date_to])->where('unit_id', Auth::user()->unit_id)->get();
       }else{

        $forwared_case = casereg_model::where('forwared', '=', 1)->where('unit_id', Auth::user()->unit_id)->get();
       }
       if(request()->ajax()){
           return datatables()->of($forwared_case)
               ->addColumn('select', function($data){
                   $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->id.'" name="chk[]" value="'.$data->id.'">
                        <label for="newcase1'.$data->id.'"></label>
                     </span>';
                   $button .= '&nbsp;&nbsp;';
                   return $button;
               })
               ->addColumn('edit', function($data){
                   $button = '<table>
                            <tr>
                                <td>
                                    <a href="" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i> Edit
                                    </a>
                                </td>
                                <td>
                                <a href="'.route('unitauth.caseforward_single', $data->id).'" name="buttton" value="singleforward" data-id="'.$data->id.'"  class="btn btn-sm btn-danger">Forward</a>
                                </td>
                               </tr>
                               </table>';
                   return $button;
               })
               ->addColumn('case_type',function ($data){
                   $case=json_decode($data->crime_type);
                   $crime=crime_model::all();
                   return view('unitauth.sub-admin.case_typeloop',compact('case','crime'));
               })
               ->addColumn('paper',function ($data){
                   $paper=$data->paper;
                   return view('unitauth.sub-admin.subadmin-case-paper',compact('paper','paperno'));
               })
               ->addIndexColumn()
               ->addColumn('mp',function ($data){
                   $user=Unitauth::where('id',$data->id_mp)->first();
                   if (!empty($user)){
                       return $user->name;
                   }else{
                       return '';
                   }
//                   return $data->Unitauth->name;
               })
               ->rawColumns(['select','edit','case_type','paper','mp','sl'])
               ->make(true);
       }
   }
   public function newcasecomplete(Request $request){
       $date_to=$request->date_to;
       $date_form=$request->date_from;
       $attributes = [
           'id_mp','victim_name','victim_mb','vehical_reg',/*'date_off',
            'time_off','date_disposal',*/'loc','victim',
           'vehical_type','crime_type','paper'];
       if (!empty($date_to) && !empty($date_form)) {
           $newcasecomplet = casereg_model::where('forwared', '=', '0')
               ->where('drop_type', '=', '0')
               ->where('unit_id', Auth::user()->unit_id)
               ->whereNotNull($attributes)
               ->where('crime_type', '!=', 'null')
               ->where('paper', '!=', 'null')
               ->whereBetween('date_off', [$date_form, $date_to])
               ->orderBy('id', 'DESC')->get();
       }else {


           $newcasecomplet = casereg_model::where('forwared', '=', '0')
               ->where('drop_type', '=', '0')
               ->where('unit_id', Auth::user()->unit_id)
               ->whereNotNull($attributes)
               ->where('crime_type', '!=', 'null')
               ->where('paper', '!=', 'null')
               ->orderBy('id', 'DESC')->get();
       }
       if(request()->ajax()){
           return datatables()->of($newcasecomplet)
               ->addColumn('select', function($data){
                   $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->id.'" name="chk[]" value="'.$data->id.'">
                        <label for="newcase1'.$data->id.'"></label>
                     </span>';
                   $button .= '&nbsp;&nbsp;';
                   return $button;
               })
               ->addColumn('edit', function($data){
                   $button = '<table>
                            <tr>
                                <td>
                                    <a href="" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i> Edit
                                    </a>
                                </td>
                                <td>
                                <a href="#" name="buttton" value="singleforward" data-id="'.$data->id.'"  class="btn btn-sm btn-danger btn-forward">Forward</a>
                                </td>
                               </tr>
                               </table>';
                   return $button;
               })
               ->addColumn('case_type',function ($data){
                   $case=json_decode($data->crime_type);
                   $crime=crime_model::all();
                   return view('unitauth.sub-admin.case_typeloop',compact('case','crime'));
               })
               ->addColumn('paper',function ($data){
                   $paper=$data->paper;
                   return view('unitauth.sub-admin.subadmin-case-paper',compact('paper','paperno'));
               })
               ->addIndexColumn()
               ->addColumn('mp',function ($data){
                   $user=Unitauth::where('id',$data->id_mp)->first();
                   if (!empty($user)){
                       return $user->name;
                   }else{
                       return '';
                   }
//                   return $data->Unitauth->name;
               })
               ->rawColumns(['select','edit','case_type','paper','mp','sl'])
               ->make(true);
       }
   }
   public function registercaseunitmp(Request $request){
       $date_to=$request->date_to;
       $date_form=$request->date_from;
       if (!empty($date_to) && !empty($date_form)) {
           $allcase = casereg_model::where('drop_type', '=', 0) ->whereBetween('date_off', [$date_form, $date_to])->where('forwared', '=', 0)->where('unit_id', Auth::user()->unit_id)->where('id_mp', Auth::user()->id)->orderBy('id', 'DESC')->get();

       }else{
           $allcase = casereg_model::where('drop_type', '=', 0)->where('forwared', '=', 0)->where('unit_id', Auth::user()->unit_id)->where('id_mp', Auth::user()->id)->orderBy('id', 'DESC')->get();

       }

       if(request()->ajax()){
           return datatables()->of($allcase)
               ->addColumn('select', function($data){
                   $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->id.'" name="chk[]" value="'.$data->id.'">
                        <label for="newcase1'.$data->id.'"></label>
                     </span>';
                   $button .= '&nbsp;&nbsp;';
                   return $button;
               })
               ->addColumn('edit', function($data){
                   $button = '<table>
                            <tr>
                                <td>
                                    <a href="" class="btn btn-sm btn-info edit-btn-case-desk" data-toggle="modal" data-id="'.$data->id.'" data-target="#exampleModaledit">
                                    <!-- <i class="fas fa-pencil-alt"> -->
                                    </i> Edit
                                    </a>
                                </td>
                               </tr>
                               </table>';
                   return $button;
               })
               ->addColumn('case_type',function ($data){
                   $case=json_decode($data->crime_type);
                   $crime=crime_model::all();
                   return view('unitauth.sub-admin.case_typeloop',compact('case','crime'));
               })
               ->addColumn('paper',function ($data){
                   $paper=$data->paper;
                   return view('unitauth.sub-admin.subadmin-case-paper',compact('paper','paperno'));
               })
               ->addIndexColumn()
               ->addColumn('mp',function ($data){
                   $user=Unitauth::where('id',$data->id_mp)->first();
                   if (!empty($user)){
                       return $user->name;
                   }else{
                       return '';
                   }
//                   return $data->Unitauth->name;
               })
               ->rawColumns(['select','edit','case_type','paper','mp','sl'])
               ->make(true);
       }
   }
   public function dropcase(Request $request){
       $date_to=$request->date_to;
       $date_form=$request->date_from;
       if (!empty($date_to) && !empty($date_form)) {
           $drop_case = casereg_model::where('drop_type', '=', 1)->whereBetween('date_off', [$date_form, $date_to])->where('unit_id', Auth::user()->unit_id)->get();
       }else {
           $drop_case = casereg_model::where('drop_type', '=', 1)->where('unit_id', Auth::user()->unit_id)->get();

       }
       if(request()->ajax()){
           return datatables()->of($drop_case)
               ->addColumn('case_type',function ($data){
                   $case=json_decode($data->crime_type);
                   $crime=crime_model::all();
                   return view('unitauth.sub-admin.case_typeloop',compact('case','crime'));
               })
               ->addColumn('paper',function ($data){
                   $paper=$data->paper;
                   return view('unitauth.sub-admin.subadmin-case-paper',compact('paper','paperno'));
               })
               ->addIndexColumn()
               ->addColumn('mp',function ($data){
                   $user=Unitauth::where('id',$data->id_mp)->first();
                   if (!empty($user)){
                       return $user->name;
                   }else{
                       return '';
                   }
//                   return $data->Unitauth->name;
               })
               ->rawColumns(['case_type','paper','mp','sl'])
               ->make(true);
       }
   }
   public function UnitUserajax(){
          $unituser=Unitauth::with('UnitRole')->where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->where('unit_role_id','!=',Auth::user()->unit_role_id)->get();
        if(request()->ajax()){
            return datatables()->of($unituser)
                ->addColumn('button',function ($data){
                    return view('unitauth.unit-user.unit-user-button',compact('data'));
                })
                ->addColumn('status',function ($data){
                    if ($data->status==1){
                        return '<p class="text-success"> Active</p>';
                    }else{
                        return '<p class="text-danger"> Inactive</p>';
                    }
                })
                ->addColumn('role',function ($data){
                    return $data->UnitRole->name;
                })
                ->setRowID(function ($data){
                    return $data->id;
                })
                ->addIndexColumn()
                ->rawColumns(['button','sl','status','role'])
                ->make(true);
        }
    }
    public function Checkpacket($packet){
        $case=casereg_model::where('delete_status',1)->where('packet_number',$packet)->first();
        if($case){
            return response(json_encode(['error' => 'You packet is duplicate']));
        }else{
            return response(json_encode(['success' => 'input success']));
        }
    }

}
