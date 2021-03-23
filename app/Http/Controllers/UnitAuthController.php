<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitRole;
use App\Unitauth;
use App\casereg_model;
use App\DCB\ForwadAcceptCase;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Validation\Validator;
use Validator;

class UnitAuthController extends Controller
{
   public function UnitProfile(){
      return view('unitauth.profile.index');
   }
    public function UnitProfileUpdate(Request $request){
//       return $request;
       $this->validate($request,[
           'name' => 'required|max:255',
           'email' => 'required|email|max:255',
           'image' => '| image | mimes:jpeg,png,jpg | max:400',
       ]);
       $unit= Unitauth::findOrFail(Auth::user()->id);
       $unit->name=$request->name;
       $unit->email=$request->email;
       $unit->phone=$request->phone;
       $image = $request->file('image');
       if(isset($image)){
           $imageName ='/unit-user/image/'.uniqid().'.'.$image->getClientOriginalExtension();
           //for image unlink
           if(!empty($unit->image)) {
               if (file_exists(public_path( $unit->image))) {
                   unlink(public_path( $unit->image));
               }
           }
           $image->move(public_path().'/unit-user/image', $imageName);
           $unit->image=$imageName;
       }
       if ($unit->save()){
           Toastr::success('update Unit User successful','Success');
           return back();
       }else{

           Toastr::error('You have Something wrong','information');
           return back();
       }
   }
    public function UnitProfilePasswordUpdate(Request $request){
       $this->validate($request, [
           'oldPassword' => 'required',
           'password' => 'required|confirmed'
       ]);
       $hashedPassword = Auth::user()->password;
//       return 'ok';
       if (Hash::check($request->oldPassword, $hashedPassword))
       {

           if (!Hash::check($request->password,$hashedPassword))
           {
               $user = Unitauth::find(Auth::user()->id);
               $user->password = Hash::make($request->password);
               $user->save();
               Toastr::success('Password Successfully Changed :)' ,'Success');
               Auth::logout();
               return back();
//               return redirect()->route('login');
           }else{
               Toastr::error('New Password can not be same as old password :)' ,'Error');
               return redirect()->back();
           }
       }else{
           Toastr::error('Current Password does match. :)' ,'Error');
           return redirect()->back();
       }

   }
    public function UnitUser(){
        $unitrole=UnitRole::where('delete_status',1)->get();
        $unituser=Unitauth::where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->get();
        $rank=DB::table('ranks')->where('status',1)->get();
        return view('unitauth.unit-user.unit-user-index',compact('unitrole','unituser','rank'));
    }
    public function UnitUserajax(){
      return  $unituser=Unitauth::with('UnitRole')->where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->where('unit_role_id','!=',Auth::user()->unit_role_id)->get();

    }
    public function unitUserStore(Request $request){
        $validator=Validator::make($request->all(),[
            'unit_role_id' => 'required|max:255',
            'ba_baf_number' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:unitauths',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->passes()) {
            $unit=new Unitauth();
            $unit->name=$request->name;
            $unit->rank_id=$request->rank_id;
            $unit->unit_id=$request->unit_id;
            $unit->unit_role_id=$request->unit_role_id;
            $unit->ba_baf_no=$request->ba_baf_number;
            $unit->email=$request->email;
            $unit->phone=$request->phone;
            $unit->unit_id=Auth::user()->unit_id;
            $unit->password=Hash::make($request->password);
            if ($unit->save()){
                return response(json_encode(['success' => 'Your data inserted Success full']));
    //            Toastr::success('Add  User successful','Success');
                return back();
            }else{
                return response()->json(['error'=>'You have something wrong']);
            }
        }else
            return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function unitUserFind(Request $request){
    //        return $request;
        return   $unituser=Unitauth::findOrFail($request->id);
    }
    public function unitUserUpdate(Request $request){
        $unituser=Unitauth::findOrFail($request->id);
        if (!empty($unituser)){
            $unituser->name=$request->name;
            $unituser->ba_baf_no=$request->ba_baf_number;
            $unituser->phone=$request->phone;
            $unituser->email=$request->email;
            $unituser->unit_role_id=$request->unit_role_id;
            $unituser->status=0;
            $unituser->save();
    //            return array($unituser);
            return response(json_encode(['success' => 'Your data inserted Success full']));
    //            Toastr::success('User Unit Update Success','Success');
    //            return back();
        }else{
            return response()->json(['error'=>'You have something wrong']);
    //            return back();
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
    public function HompageData(){
        $newcase=casereg_model::where('unit_id',Auth::user()->unit_id)->where('delete_status',1)->where('date_off',date('d-m-Y'))->count();
        $CompleteCase=casereg_model::NewCaseInComplete()->count();
        $InCompleteCase=casereg_model::NewCaseComplete()->count();
        $newforward=ForwadAcceptCase::where('unit_id',Auth::user()->unit_id)->where('forward_date',date('d-m-Y'))->count();
        $drop=casereg_model::where('unit_id',Auth::user()->unit_id)->where('drop_type',1)->where('date_off',date('d-m-Y'))->count();

        $totalCase=casereg_model::where('unit_id',Auth::user()->unit_id)->where('delete_status',1)->count();
        $forward=casereg_model::where('unit_id',Auth::user()->unit_id)->where('forwared',1)->where('delete_status',1)->count();
        $alldrop=casereg_model::where('unit_id',Auth::user()->unit_id)->where('drop_type',1)->where('delete_status',1)->count();
        $mp=Unitauth::where('unit_id',Auth::user()->unit_id)->count();

        return array($newcase,$CompleteCase,$InCompleteCase,$newforward,$drop,$totalCase,$forward,$alldrop,$mp);
    }
    public function SidebarCount(){
        $newComCase=casereg_model::where('forwared', '=', '0')->where('drop_type', '=', '0')->where('unit_id',Auth::user()->unit_id)
                                    ->whereNotNull(['id_mp','victim_name','victim_mb','vehical_reg','date_off','time_off','date_disposal','loc','victim',
                                    'vehical_type','crime_type','paper'])->where('crime_type', '!=', 'null')->where('paper', '!=', 'null')->count();
        $newcaseInCom=casereg_model::where('forwared', '=', '0')->where('drop_type', '=', '0')->where(function ($query) {$query->orwhereNull([
                                                'id_mp','victim_name','victim_mb','vehical_reg','date_off','time_off','date_disposal','loc','victim',
                                                'vehical_type','crime_type','paper'])->orwhere('crime_type', '=', 'null')->orwhere('paper', '=', 'null');})->where('unit_id',Auth::user()->unit_id)->count();
    $forwardCase=ForwadAcceptCase::where('delete_status',1)->where('unit_id',Auth::user()->unit_id)->count();
    $allCase=casereg_model::where('unit_id',Auth::user()->unit_id)->count();
    return array($newComCase,$newcaseInCom,$forwardCase,$allCase);
    }
}
